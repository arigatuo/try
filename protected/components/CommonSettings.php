<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-21
 * Time: 上午9:48
 * To change this template use File | Settings | File Templates.
 * 通用设置
 */
class CommonSettings{
    //通用controller权限配置
    public static function commonAccessRules(){
        return array(
            array('allow',
                'roles' => Yii::app()->params['roles'],
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
}