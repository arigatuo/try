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
    public function init(){
        $debug = Yii::app()->params['debug'];
        if(!empty($debug))
            ;
        else
            die();
    }

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

    public function actionTest(){
        $str = "&lt;div align=&quot;center&quot;&gt;&lt;span style=&quot;background-color: rgb(255, 0, 0);&quot;&gt;&lt;strong&gt;总之，然后，所以，应该， 本&lt;/strong&gt;&lt;/span&gt;来&lt;span style=&quot;color:#FF9966;&quot;&gt;，确实，不仅，而且&lt;/span&gt;&lt;br /&gt;&lt;/div&gt;";
        echo CHtml::decode($str);
        var_dump($str);
    }

    public function actionBbsPost(){
        $bbsCtrl = new BbsSync();
        $postInfo =array(
            'tid'=>'321487',
            'author'=>'arigatuo',
            'authorid'=>'419358',
            'subject'=>'帖子标题',
            'message'=>'回复内容',
            'CLIENT_IP'=>'127.0.0.1',
        );

        $bbsCtrl->syncPost($postInfo);
    }

    public function actionTestHostinfo(){
        var_dump(Yii::app()->request->hostInfo);
    }

    public function actionTestThread(){
        ob_start();
        $this->renderPartial("////common/item_thread");
        $content = ob_get_clean();

        var_dump($content);
    }

    public function actionTest1(){
        $item_id = Yii::app()->request->getParam("item_id");
        if(!empty($item_id))
            var_dump(Apply::model()->countApplyByItemIdMore($item_id, false));
    }

    public function actionTest2(){
    }


}