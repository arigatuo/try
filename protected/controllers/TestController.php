<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-25
 * Time: 下午12:18
 * To change this template use File | Settings | File Templates.
 */

//todo 删除test文件

class TestController extends Controller{
    public function actionLogin(){
        $a = MyUcenter::login("arigatuo", "111111");
        echo $a;
    }

    public function actionLogout(){
        MyUcenter::logout();
    }

    public function actionFlush(){
        Yii::app()->cache->flush();
    }
}