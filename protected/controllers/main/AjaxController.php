<?php
class AjaxController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    //todo 登陆判断, 上传文件个数限制, 上传图片记录

	public $layout = false;

    public function actionUserLogin(){
        $request = Yii::app()->request;
        $username = $request->getParam("username");
        $pwd = $request->getParam("pwd");
        if(!empty($username) && !empty($pwd)){
            $loginInfo = MyUcenter::login($username, $pwd);
            if(!empty($loginInfo))
                echo json_encode($loginInfo);
        }
    }

    public function actionUserLogout(){
        $logoutInfo = MyUcenter::logout();
        if(!empty($logoutInfo))
            echo json_encode($logoutInfo);
    }

    /**
     * xhediotr上传图片附件
     */
    public function actionUploadimg(){
        $uploadSettings = array(
            'inputName' => 'filedata',
            //最大上传大小
            'maxSize' => 500 * 1024,
            //允许扩展名
            'allowExt' => 'jpg,jpeg',
            //上传目录
            'attachDir' => 'upload/ucg',
            'dirType' => 1,
        );
        $err = "";

        $upfile=@$_FILES[$uploadSettings['inputName']];

        if(!empty($upfile) && !empty($uploadSettings)){
            $uploadInfo = CommonHelper::xhEditorUploadImg($upfile, $uploadSettings);
        }else{
            $uploadInfo = array('err'=>'upload fail');
        }

        echo json_encode($uploadInfo);
	}
}