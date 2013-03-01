<?php
/**
 * require var
 *  $className 要预览的类名
 *  $photo_attr_array 判断是否需要预先预览
 */
$previewImgClass = !empty($className) ? $className : "item_photo";
?>
<script type="text/javascript" src="http://bbs.lady8844.com/images/js/imgpreview.min.js"></script>
<script type="text/javascript">
    var preview_image = function(){
        jQuery('.<?php echo $previewImgClass;?>').imgPreview({
            containerID: 'imgPreviewWithStyles',
            srcAttr:'value',
            imgCSS:{}
        });
    }
</script>
<script>
    <?php
    if(!empty($photo_attr_array)){
        foreach($photo_attr_array as $photo_attr){
            if(!empty($photo_attr))
                echo "jQuery(function(){preview_image();})";
        }
    }
    ?>
</script>
