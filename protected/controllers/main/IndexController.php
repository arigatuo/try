<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-27
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */
class IndexController extends Controller{
    public $latestArticle, $curUid;

    public function init(){
        $this->layout = "front";

        if(empty($this->curUid))
            $this->curUid = MyUcenter::getUserId();
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='apply-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * 规则页
     */
    public function actionRule(){
        $this->render("rule");
    }

    /**
     * 首页
     */
    public function actionHome(){
        //读取flash
        $flashContent = Media::model()->readList("homepage_flash", 5);
        //todo 读取limit的列表
        $itemList = Item::model()->readList();

        //取得最新试用心得列表
        $this->getLatestSelectedArticle();

        $this->render("home", array(
            'flashContent' => $flashContent,
            'itemList' => $itemList,
        ));
    }

    /**
     * 列表页
     */
    public function actionNow(){
        //todo  修改列表页分页每页个数
        $perPage = 1;
        $itemSearch = Item::model()->readList(0, 1, $perPage);
        if(!empty($itemSearch))
            list($itemList, $page) = $itemSearch;
        else
            throw new CHttpException(404);

        $this->getLatestSelectedArticle();

        $this->render("now", array(
            'itemList' => $itemList,
            'page' => $page,
        ));
    }

    /**
     * 详细页
     */
    public function actionDetail(){
        //todo 修改留言分页
        $perPage = 1;

        //取得单品资料
        $itemId = Yii::app()->request->getParam("item_id");
        if(!empty($itemId) && is_numeric($itemId))
            ;
        else
            throw new CHttpException(404, Yii::t('msg','item is not exist'));

        $curItem = Item::model()->with('brand')->findByPk($itemId);
        if(empty($curItem))
            throw new CHttpException(404, Yii::t('msg','item is not exist'));

        $this->getLatestSelectedArticle();

        //取得用户留言信息
        $curItemApplySearch = Apply::model()->getListByItemId(
            $itemId, "apply_id,user_id,item_id,apply_text, apply_time", array(), 5, 1, $perPage
        );
        list($curItemApply, $page) = $curItemApplySearch;

        //取得获得试用品的用户
        $selectedApply = Apply::model()->getListByItemId($itemId, "user_id", array("selected"), 6);

        //取得头图
        $topPic = Media::model()->readList("detail_top_pic", 1);

        $this->render("detail", array(
            'curItem' => $curItem,
            'curItemApply' => $curItemApply,
            'selectedApply' => $selectedApply,
            'page' => $page,
            'topPic' => $topPic,
        ));
    }

    /**
     * 试用报告填写页
     */
    public function actionArticle(){
        //没有前台登陆 则提示并跳回
        $uid = $this->curUid;
        if(!(!empty($uid) && is_numeric($uid) && $uid > 0) )
            $this->showMsg(Yii::t('msg','pls login first'));


        //判断该用户已获得的试用装
        $cacheKey = md5(__CLASS__.__FUNCTION__.$uid);
        $cacheTime = Yii::app()->params['cacheSetting']['5min'];
        $cacheVal = Yii::app()->cache->get($cacheKey);
        if(!empty($cacheVal))
            $haveAnyItems = $cacheVal;
        else{
            $criteria = new CDbCriteria();
            $criteria->addCondition("user_id=:user_id");
            $criteria->addCondition("apply_status=:apply_status");
            $criteria->params = array(
                'user_id' => $uid,
                'apply_status' => 'selected',
            );
            $criteria->select = "item_id";
            $haveAnyItems = Apply::model()->findAll($criteria);
            if(!empty($haveAnyItems))
                Yii::app()->cache->set($cacheKey, $haveAnyItems, $cacheTime);
        }

        if(!empty($haveAnyItems)){
            $itemArray = array();
            foreach($haveAnyItems as $applyRecord){
                $itemArray[] = $applyRecord->getAttribute("item_id");
            }
            $itemStr = join(",",$itemArray);
            $condition = "`item_id` IN ({$itemStr})";
            $itemList = Item::model()->readList(100, 1, 0, "item_id,item_name,brand.*", $condition);
        }else{
            $this->showMsg(Yii::t('msg','you have not get any items'));
        }

        $model = new Article;

        if(isset($_POST['Article'])){
            $purifier = new CHtmlPurifier;
            $purifierArray = array("article_content", "article_title");
            foreach($_POST['Apply'] as $k=>$v){
                if(in_array($k, $purifierArray)){
                    $_POST['Apply'][$k] = $purifier->purify($v);
                }
            }

            $model->Attributes = $_POST['Article'];
            $model->setAttributes(
                array('user_id'=>$uid)
            );
            if($model->save()){
                $this->showMsg(Yii::t('msg','success saved, pls wait for review'), Yii::app()->baseUrl);
            }else{
                //todo 保存失败了T_T
            }
        }


        $this->render("article", array(
                'itemList' => $itemList,
                'model' => $model,
            )
        );
    }

    /**
     * 申请页
     */
    public function actionApply()
    {
        //没有前台登陆 则提示并跳回
        $uid = $this->curUid;
        if(! (!empty($uid) && is_numeric($uid) && $uid > 0) )
            $this->showMsg(Yii::t('msg','pls login first'));

        $request = Yii::app()->request;
        $item_id = $request->getParam("item_id");

        //检查是否item_id有效性(是否过期， 是否存在对应item_id
        if(!is_numeric($item_id))
            throw new CHttpException(404);
        $item_exists = Item::model()->countByAttributes(array('item_id'=>$item_id), "`item_status`='online'");
        if(empty($item_exists)){
            throw new CHttpException(404);
        }

        $isExists = Apply::model()->countByAttributes(array("user_id"=>$uid, 'item_id'=>$item_id));
        if(!empty($isExists)){
            $this->showMsg(Yii::t('msg','you have applied for this item'));
        }

        $model = new Apply;
        // Uncomment the following line if AJAX validation is needed
        //$this->performAjaxValidation($model);

        if(isset($_POST['Apply']))
        {
            //purifier
            $purifier = new CHtmlPurifier;
            $purifierArray = array("apply_text", "addr_province", "addr_phone", "addr_address", "addr_name",
                "addr_email");
            foreach($_POST['Apply'] as $k=>$v){
                if(in_array($k, $purifierArray)){
                    $_POST['Apply'][$k] = $purifier->purify($v);
                }
            }

            $model->attributes=$_POST['Apply'];


            //设置用户id
            $model->setAttribute("user_id", $uid);
            if($model->save()){
                if(!empty($_POST['Apply']['userDetails'])){
                    //保存用户喜好数据
                    $userDetailsSerialize = serialize( $_POST['Apply']['userDetails'] );
                    $theUser = User::model()->findByAttributes(array("user_id"=>$uid));
                    if(!empty($theUser)){
                        $theUser->setAttribute("user_detail", $userDetailsSerialize);
                    }else{
                        $theUser = new User;
                        $theUser->setAttributes(
                            array(
                                'user_id' => $uid,
                                'user_name' => MyUcenter::getUsernameByUid($uid),
                                'userDetails' => $userDetailsSerialize,
                                'is_real_user' => 1,
                            )
                        );
                    }
                    if(!$theUser->save()){
                        //todo userDetails记录保存失败log
                    }
                }
                $this->showMsg(Yii::t('msg','success applied, pls wait for review'), Yii::app()->baseUrl);
            }else{
                //$this->redirect(Yii::app()->createUrl("/main/apply", array("item_id"=>$item_id)));
                //todo 保存失败后的动作
            }
        }

        $this->render('apply', array(
            'model' => $model,
            'item_id' => $item_id,
        ));
    }

    /**
     * 取得最新6条试用心得
     * @return array
     */
    public function getLatestSelectedArticle(){
        $this->latestArticle =  Article::model()->getList();
    }

    /**
     * 显示错误信息
     * @param $msg
     * @param string $url
     */
    public function showMsg($msg, $url=""){
        $this->render("////common/msg", array(
            'msg'=>$msg,
            'url'=>$url,
        ));
        exit();
    }
}