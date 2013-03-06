<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lizhen
 * Date: 13-1-24
 * Time: 上午11:51
 * To change this template use File | Settings | File Templates.
 * 通用helper类
 */
class CommonHelper
{
    /**
     * 文件大小格式化
     * @param $bytes
     * @return string
     */
    public static function formatBytes($bytes) {
        if($bytes >= 1073741824) {
            $bytes = round($bytes / 1073741824 * 100) / 100 . 'GB';
        } elseif($bytes >= 1048576) {
            $bytes = round($bytes / 1048576 * 100) / 100 . 'MB';
        } elseif($bytes >= 1024) {
            $bytes = round($bytes / 1024 * 100) / 100 . 'KB';
        } else {
            $bytes = $bytes . 'Bytes';
        }
        return $bytes;
    }
    /**
     * 格式化时间戳
     * @param $date
     * @return string
     */
    public static function formatDate($date){
        return date("Y-m-d H:i:s", $date);
    }
    const BROWSER_IE = "ie";
    const BROWSER_FIREFOX = "firefox";
    const BROWSER_CHROME = "chrome";
    const BROWSER_OTH = "other";
    /**
     * 判断浏览器类型
     * @return string
     */
    public static function whichBrowser(){
        $curBrowser = "";
        $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $browsers = array(
            self::BROWSER_FIREFOX,
            self::BROWSER_CHROME,
            self::BROWSER_IE,
        );

        foreach($browsers as $browser){
            if(strpos($userAgent, $browser) !== false){
                $curBrowser = $browser;
                break;
            }
        }

        if(empty($curBrowser))
            $curBrowser = self::BROWSER_OTH;

        return $curBrowser;
    }

    /**
     * soap连接初始化
     * @return SoapClient
     */
    public static function initRemoteCon(){
        $soapSettings = Yii::app()->params['soap_setting'];
        $client = new SoapClient($soapSettings['server_url'], array('trace'=>1));
        //设置soap header
        $soapHeader = new SoapHeader('http://localhost/namespace', 'auth', array("groupName"=>$soapSettings['group_name'], "groupSecret" => $soapSettings['group_secret']), false, SOAP_ACTOR_NEXT);
        $client->__setSoapHeaders(array($soapHeader));

        return $client;
    }

    /**
     * 截取字数
     * @param $string 要截取的字符串
     * @param $length 截取的长度
     * @param string $etc 截取后字符串后缀
     * @return string 返回截取后的字符串
     */
    public static function truncate_utf8_string($string, $length, $etc = '...')
    {
        $result = '';
        $string = html_entity_decode(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
        $strlen = strlen($string);
        for ($i = 0; (($i < $strlen) && ($length > 0)); $i++)
        {
            if ($number = strpos(str_pad(decbin(ord(substr($string, $i, 1))), 8, '0', STR_PAD_LEFT), '0'))
            {
                if ($length < 1.0)
                {
                    break;
                }
                $result .= substr($string, $i, $number);
                $length -= 1.0;
                $i += $number - 1;
            }
            else
            {
                $result .= substr($string, $i, 1);
                $length -= 0.5;
            }
        }
        $result = htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
        if ($i < $strlen)
        {
            $result .= $etc;
        }
        return $result;
    }

    /**
     * 读取扩展名
     * @param $fileName
     * @return string
     */
    public static function readExtName($fileName){
        $theExt = "";

        if(!empty($fileName)){
            $fileNameArray = explode('.', $fileName);
            if(!empty($fileNameArray)){
                $countNum = count($fileNameArray);
                $theExt = strtolower($fileNameArray[$countNum-1]);
            }
        }

        return $theExt;
    }

    /**
     * 根据相对url删除文件
     * @param $url
     * @return bool
     */
    public static function unlinkRelationPic($url){
        $return = FALSE;
        $realFilePath = Yii::app()->basePath."/..".str_replace(Yii::app()->baseUrl, "", $url);
        if(file_exists($realFilePath))
            unlink($realFilePath) && $return = TRUE;
        return $return;
    }

    /**
     * 根据tid返回爱美妈妈网论坛帖子地址
     * @param $tid
     * @return string
     */
    public static function returnBbsUrlByTid($tid){
        return "http://bbs.imeimama.com/thread-{$tid}-1-1.html";
    }

    /**
     * xhEditor上传处理
     * @param $upfile 上传文件参数
     * @param $uploadSettings 上传设置
     * @return array
     */
    public static function xhEditorUploadImg($upfile, $uploadSettings){
        $err = $msg = "";
        if(!is_dir($uploadSettings['attachDir'])){
            mkdir($uploadSettings['attachDir']);
        }
        $tempPath=$uploadSettings['attachDir'].'/'.date("YmdHis").mt_rand(10000,99999).'.tmp';

        if(!isset($upfile))
            $err='inputName is error';
        elseif(!empty($upfile['error'])){
            switch($upfile['error'])
            {
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

        if(empty($err)){
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
                        'url' => Yii::app()->request->hostInfo."/".Yii::app()->baseUrl."/".$targetPath,
                        'localname' => $localName,
                        'id' => '1',
                    );
                }
            }
            else $err='上传文件扩展名必需为：'.$uploadSettings['allowExt'];
            @unlink($tempPath);
        }
        return array('err'=>$err, 'msg'=>$msg);
    }
}
