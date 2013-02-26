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
    public function actionTest(){
        /*
        $itemRecord = Item::model()->findByPk(8);
        $a = CommonHelper::unlinkRelationPic($itemRecord->item_pic_small);
        var_dump($a);
        */
        $a = MyUcenter::login("arigatuo", "111111");
        var_dump($a);
        //MyUcenter::logout();
        var_dump(MyUcenter::isLogin());
    }
}