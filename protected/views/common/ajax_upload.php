<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-26
 * Time: 上午10:13
 * To change this template use File | Settings | File Templates.
 */
/**
 * 用于ajax上传图片组件
 * require $var
 *  $sizeLimit 上传大小限制, 非必须, 默认为1m
 *  $allowExt 允许上传的后缀名, 非必须, 默认jpg
 *  $input_id 输入框的id, 必须
 */
    $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadpic',
            'config'=>array(
                'action'=>Yii::app()->createUrl('bg/Ajax/Uploadimg'),
                'allowedExtensions'=> array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>!empty($sizeLimit) ? $sizeLimit : 1*1024*1024,// maximum file size in bytes
                'onComplete'=>"js:function(id, fileName, responseJSON){
                                        photoUrl = siteSettings.baseUrl + responseJSON.folder+responseJSON .filename;
                                        jQuery('#{$input_id}').val(photoUrl);
                                        preview_image();}",
            )
    ));
?>

