<?php
/**
 * 站内基本js参数初始化设置
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-21
 * Time: 下午3:33
 * To change this template use File | Settings | File Templates.
 */
class BaseJsController extends Controller{
    public function actionIndex(){
        $baseSettings = array(
            'baseUrl' => Yii::app()->baseUrl."/",
        );

        echo "window.siteSettings = ".CJavaScript::encode($baseSettings);
    }
}