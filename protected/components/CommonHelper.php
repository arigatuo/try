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

    public static function initRemoteCon(){
        $soapSettings = Yii::app()->params['soap_setting'];
        $client = new SoapClient($soapSettings['server_url'], array('trace'=>1));
        //设置soap header
        $soapHeader = new SoapHeader('http://localhost/namespace', 'auth', array("groupName"=>$soapSettings['group_name'], "groupSecret" => $soapSettings['group_secret']), false, SOAP_ACTOR_NEXT);
        $client->__setSoapHeaders(array($soapHeader));

        return $client;
    }

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
}