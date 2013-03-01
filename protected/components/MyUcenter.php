<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 12-9-18
 * Time: 下午4:37
 * To change this template use File | Settings | File Templates.
 * ucenter_server 链接
 */
class MyUcenter extends CController
{
    public function init(){
        Yii::import('application.vendors.*');
        include_once('ucenter.php');
    }

    //登录
    public static function login($username, $password){
        self::init();

        list($uid, $username, $password, $email) = uc_user_login($username, $password);


        if(isset($uid) && ($uid > 0)){
            $userAuthCookie = uc_authcode($uid."\t".$username, 'ENCODE');
            $cookieTime = 86400;
            setcookie('aima_try_auth', '', -86400, '/');
            setcookie('aima_try_auth', $userAuthCookie, time() + $cookieTime, '/');

            /*
            list($uuid, $uusername) = explode("\t", uc_authcode($_COOKIE['aima_try_auth'], 'DECODE'));

            var_dump($uuid);
            var_dump($uusername);
            */
            /*
            $ucsynlogin = uc_user_synlogin($uid);
            echo $ucsynlogin;
            */
            $ucsynlogin = uc_user_synlogin($uid);

            $returnVal = array($uid, $username, $ucsynlogin);
        }else{
            $returnVal = null;
        }

        return $returnVal;
    }

    //注销
    public static function logout(){
        self::init();

        $logoutScript = uc_user_synlogout();

        setcookie('aima_try_auth', '', -86400, '/');

        return $logoutScript;
    }

    //判断是否已登录, 返回uid和username
    public static function isLogin(){
        self::init();

        $r = !empty($_COOKIE['aima_try_auth']);

        if(!empty($_COOKIE['aima_try_auth'])){
            list($uid, $username) = explode("\t", uc_authcode($_COOKIE['aima_try_auth'], 'DECODE'));
            if(!empty($uid) && $uid > 0){
                $returnVal = array($uid, $username);
            }else{
                $returnVal = FALSE;
            }
        }else{
            $returnVal = FALSE;
        }

        return $returnVal;
    }

    //获取用户信息
    public static function getUserInfo($username, $isUid=0){
        self::init();
        return uc_get_user($username, $isUid);
    }

    //通过用户id取得用户名
    public static function getUsernameByUid($uid){
        $userInfo = self::getUserInfo($uid, 1);
        return $userInfo[1];
    }

    public static function getUserHeadByUid($uid){
        return  "http://bbs.lady8844.com/uc_server/avatar.php?uid={$uid}&size=middle";
    }

    /**
     * 取得登陆用户的uid
     * @return int $uid
     */
    public static function getUserId(){
        $userInfo = self::isLogin();
        if(!empty($userInfo))
            return $userInfo[0];
    }
}
