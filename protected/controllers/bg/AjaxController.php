<?php
class AjaxController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = false;

    /**
     *
     */
    public function init(){
        //header('P3P: CP=CAO PSA OUR');
    }

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
				array('allow',
						'roles'=>Yii::app()->params['roles'],
                ),
		);
	}

    /**
     * flashUpload插件上传ctrl
     */
    public function actionUploadimg(){
		Yii::import("ext.EAjaxUpload.qqFileUploader");
		
		$folder='upload/'.date("Ymd", time()).'/';// folder for uploaded files
        if(!is_dir("upload")){
            mkdir("upload");
        }
		if(!is_dir($folder)){
			mkdir($folder);
		}
		
		$allowedExtensions = array("jpg", "jpeg", "gif");//array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
		$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		$result = $uploader->handleUpload($folder);
		$result['folder'] = $folder;
		$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		
		$fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		$fileName=$result['filename'];//GETTING FILE NAME
		
		echo $return;// it's array
	}

    /**
     * XhEditor插件上传ctrl
     */
    public function actionXhEditorUploadimg(){
        $uploadSettings = array(
            'inputName' => 'filedata',
            //最大上传大小
            'maxSize' => 1000 * 1024,
            //允许扩展名
            'allowExt' => 'jpg,jpeg',
            //上传目录
            'attachDir' => 'upload/intro',
            'dirType' => 1,
        );

        $upfile=@$_FILES[$uploadSettings['inputName']];

        if(!empty($upfile) && !empty($uploadSettings)){
            $uploadInfo = CommonHelper::xhEditorUploadImg($upfile, $uploadSettings);
        }else{
            $uploadInfo = array('err'=>'upload fail');
        }

        echo json_encode($uploadInfo);
    }
}