<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/jquery.raty.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/xheditor/xheditor-1.1.14-zh-cn.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#textBox').xheditor({tools:'Cut,Copy,Paste,|,Bold,Italic,Underline,|,FontSize,FontColor,BackColor,|,SelectAll,Align, Outdent,Indent,|,Img,Fullscreen', width:889, height:368, html5Upload:false, upImgExt:'jpg,jpeg', upImgUrl:'<?php echo Yii::app()->createUrl('main/Ajax/Uploadimg');?>'});
        $('.score').raty({ score: 4 , starOff : siteSettings.baseUrl+"/images/star-off.png",
            starOn : siteSettings.baseUrl+"/images/star-on.png", scoreName : "Article[score]"});
    });
</script>
<div class="baogao">
    <form action="#" method="post">
        <h2>发表试用报告</h2>
        <div class="selpro-pinfen fn-clear">
            <div class="selpro">请选择你试用的产品：
                <select>
                    <option>请选择</option>
                    <option>陈力顺喊叫哇或者载转基因中</option>
                    <option>陈力顺喊叫哇或者载转基因中</option>
                    <option>陈力顺喊叫哇或者载转基因中</option>
                </select>
            </div>
            <div class="pinfen">总体评价：<span class="score"></span>点击图标为产品评分</div>
        </div>
        <div class="ct fn-clear">
            标题:
            <input type="text" class="title" />
            标题长度不超过30个中文字符 </div>
        <div class="editor">
            <textarea name="content" id="textBox">test</textarea>
        </div>
        <input type="submit" class="baogao-submit" title="提交" />
    </form>
</div>
