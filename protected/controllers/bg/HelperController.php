<?php
/**
 *
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 12-12-4
 * Time: 上午11:47
 * To change this template use File | Settings | File Templates.
 */
class HelperController extends Controller
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }


    /**
     * 进行多选操作, 配合////commmon/multiSelect.php使用
     * @throws HttpException
     */
    public function actionMultiAction(){
        $request = Yii::app()->request;
        $action = $request->getParam("action");
        $inputName = $request->getParam("inputName");
        $selectId = $request->getParam($inputName);


        if( !empty($action) && !empty($inputName) && !empty($selectId) ){
            //根据inputName,选model
            $theModel = "";

            switch($inputName){
                case "apply-grid_c0":
                    $theModel = Apply::model();
                    $statusColumn = "apply_status";
                    break;
                case "article-grid_c0":
                    $theModel = Article::model();
                    $statusColumn = "article_status";
                    break;
                case 'item-grid_c0':
                    $theModel = Item::model();
                    break;
                default :
                    die();
                    break;
            }


            $_successNum = 0;
            if(!empty($theModel)){
                foreach($selectId as $id){
                    $curId = $theModel->findByPk($id);
                    if($action === "delete"){
                        if($curId->delete()){
                            $_successNum++;
                        }
                    }elseif($action === "apply_accept" && !empty($statusColumn)){
                        if($curId->setAttribute($statusColumn, "accept") && $curId->save()){
                            $_successNum++;
                        }
                    }elseif($action === "apply_deny" && !empty($statusColumn)){
                        if($curId->setAttribute($statusColumn, "deny") && $curId->save()){
                            $_successNum++;
                        }
                    }elseif($action === "apply_select" && !empty($statusColumn)){
                        if($curId->setAttribute($statusColumn, "selected") && $curId->save()){
                            $_successNum++;
                        }
                    }elseif($action === "background"){
                    }
                }
            }

            if($_successNum){
                $this->redirect(Yii::app()->request->urlReferrer);
            }else{
                throw new HttpException("save error");
            }
        }
    }

    public function actionClearCache(){
        if(Yii::app()->cache->flush()){
            $str = "succ";
            echo $str;
            $refer = Yii::app()->request->urlReferrer;
            if(!empty($refer))
                $this->redirect($refer);
        }
    }
}
