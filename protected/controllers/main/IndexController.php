<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-27
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */
class IndexController extends Controller{
    public function init(){
        $this->layout = "front";
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
            throw new CHttpException("server error");

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
            throw new CHttpException("不存在对应试用品");

        $curItem = Item::model()->with('brand')->findByPk($itemId);
        if(empty($curItem))
            throw new CHttpException("不存在对应试用品");

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
        /*
        $uid = MyUcenter::getUserId();
        if(! (!empty($uid) && is_numeric($uid) && $uid > 0) )
            throw new CHttpException("请先登陆");
        */

        $model = new Article;

        $this->render("Article");
        if(isset($_POST['Article'])){
            //todo 判断是否获得试用品否则不能继续填写
        }
    }

    /**
     * 申请页
     */
    public function actionApply()
    {
        //没有前台登陆 则提示并跳回
        $uid = MyUcenter::getUserId();
        if(! (!empty($uid) && is_numeric($uid) && $uid > 0) )
            throw new CHttpException("请先登陆");

        $request = Yii::app()->request;
        $item_id = $request->getParam("item_id");

        //检查是否item_id有效性(是否过期， 是否存在对应item_id
        if(!is_numeric($item_id))
            throw new CHttpException("404");
        $item_exists = Item::model()->countByAttributes(array('item_id'=>$item_id), "`item_status`='online'");
        if(empty($item_exists)){
            throw new CHttpException("404");
        }

        $isExists = Apply::model()->countByAttributes(array("user_id"=>$uid, 'item_id'=>$item_id));
        if(!empty($isExists)){
            throw new CHttpException("您已经申请过这一款试用装了， 请勿重复申请");
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
                //todo 转移到申请后页面
                die('申请成功');
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
}