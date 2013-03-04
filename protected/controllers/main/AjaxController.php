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
            'maxSize' => 5000 * 1024,
            //允许扩展名
            'allowExt' => 'jpg,jpeg',
            //上传目录
            'attachDir' => 'upload/ucg',
            'dirType' => 1,
        );
        $err = "";

        $upfile=@$_FILES[$uploadSettings['inputName']];

        if(!is_dir($uploadSettings['attachDir'])){
            mkdir($uploadSettings['attachDir']);
        }
        $tempPath=$uploadSettings['attachDir'].'/'.date("YmdHis").mt_rand(10000,99999).'.tmp';

        if(!isset($upfile))
            $err='inputName is error';
        elseif(!empty($upfile['error'])){
            switch($upfile['error'])
            {
                /*
                case '1':
                    $err = '文件大小超过了php.ini定义的upload_max_filesize值';
                    break;
                case '2':
                    $err = '文件大小超过了HTML定义的MAX_FILE_SIZE值';
                    break;
                case '3':
                    $err = '文件上传不完全';
                    break;
                case '4':
                    $err = '无文件上传';
                    break;
                case '6':
                    $err = '缺少临时文件夹';
                    break;
                case '7':
                    $err = '写文件失败';
                    break;
                case '8':
                    $err = '上传被其它扩展中断';
                    break;
                case '999':
                */
                default:
                    $err = '发生错误';
            }
        }
        elseif(empty($upfile['tmp_name']) || $upfile['tmp_name'] == 'none')
            $err = '无文件上传';
        else{
            move_uploaded_file($upfile['tmp_name'],$tempPath);
            $localName=$upfile['name'];
        }

        if($err==''){
            $fileInfo=pathinfo($localName);
            $extension=$fileInfo['extension'];
            if(preg_match('/^('.str_replace(',','|',$uploadSettings['allowExt']).')$/i',$extension))
            {
                $bytes=filesize($tempPath);
                if($bytes > $uploadSettings['maxSize'])$err='请不要上传大小超过'.CommonHelper::formatBytes($uploadSettings['maxSize'])
                    .'的文件';
                else
                {
                    switch($uploadSettings['dirType'])
                    {
                        case 1: $attachSubDir = 'day_'.date('ymd'); break;
                        case 2: $attachSubDir = 'month_'.date('ym'); break;
                        case 3: $attachSubDir = 'ext_'.$extension; break;
                    }
                    $attachDir = $uploadSettings['attachDir'].'/'.$attachSubDir;
                    if(!is_dir($attachDir))
                    {
                        @mkdir($attachDir, 0777);
                        @fclose(fopen($attachDir.'/index.htm', 'w'));
                    }
                    PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
                    $newFilename=date("YmdHis").mt_rand(1000,9999).'.'.$extension;
                    $targetPath = $attachDir.'/'.$newFilename;

                    rename($tempPath,$targetPath);
                    @chmod($targetPath,0755);
                    //$targetPath=jsonString($targetPath);

                    $msg = array(
                        'url' => Yii::app()->baseUrl."/".$targetPath,
                        'localname' => $localName,
                        'id' => '1',
                    );
                }
            }
            else $err='上传文件扩展名必需为：'.$uploadSettings['allowExt'];
            @unlink($tempPath);
        }

        echo json_encode(array('err'=>$err, 'msg'=>$msg));
	}
}