<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-3-5
 * Time: 上午11:22
 * To change this template use File | Settings | File Templates.
 * 同步信息到论坛
 */
class BbsSync {
    public $soap;

    /**
     * 初始化
     */
    public function __construct(){
        $this->soap = new SoapClient(
            null,array("location"=>Yii::app()->params['bbs_soap_setting']['location'],
            "uri"=>"WebServer.php")
        );
    }


    /**
     * 同步回复
     */
    public function syncPost($postInfo){
        $checkKey = array("tid", "author", "authorid", "message");
        foreach($checkKey as $check){
            if(array_key_exists($check, $postInfo) && !empty($postInfo[$check]))
                continue;
            else
                throw new CException("缺少参数");
        }
        try{
            $rs = $this->soap->add_post($postInfo);//结果返回pid表示成功，false表示失败
            return $rs;
        }catch(SoapFault $e){
            echo $e->getMessage();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    /**
     * 同步帖子
     */
    public function syncThread($threadInfo){
        $checkKey = array("fid", "author", "authorid", "subject", "message");
        foreach($checkKey as $check){
            if(array_key_exists($check, $threadInfo) && !empty($threadInfo[$check]))
                continue;
            else
                throw new CException("缺少参数".$check);
        }
        try{
            $rs = $this->soap->add_threads($threadInfo);//结果返回pid表示成功，false表示失败
            return $rs;
        }catch(SoapFault $e){
            echo $e->getMessage();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}