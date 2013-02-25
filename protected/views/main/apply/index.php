<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/xheditor/xheditor-1.1.14-zh-cn.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#textBox').xheditor({tools:'Cut,Copy,Paste,|,Bold,Italic,Underline,|,FontSize,FontColor,BackColor,|,SelectAll,Align, Outdent,Indent,|,Img,Fullscreen', width:900, height:500, html5Upload:false, upImgExt:'jpg,jpeg',
            upImgUrl:'<?php echo Yii::app()->createUrl('main/Ajax/Uploadimg');?>'});
    });
</script>
<textarea name="content" id="textBox">test</textarea>