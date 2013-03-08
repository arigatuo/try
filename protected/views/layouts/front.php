<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <?php
        if(!empty($this->titleInfo)){
            if(!empty($this->titleInfo['title']))
                echo "<title>{$this->titleInfo['title']}</title>\n";
            if(!empty($this->titleInfo['keywords']))
                echo "<meta name='keywords' content='{$this->titleInfo['keywords']}' />\n";
            if(!empty($this->titleInfo['description']))
                echo "<meta name='description' content='{$this->titleInfo['description']}' />\n";
        }else{
            echo "<title>免费试用-爱美妈妈网</title>";
        }
    ?>
    <script type="text/javascript" src="<?php echo Yii::app()->createUrl('/BaseJs/')."?v=".date("YmdH"); ?>"></script>
    <?php
        Yii::app()->clientScript->registerCoreScript('jquery');
    ?>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/js/shiyong.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/css/global.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/css/baby.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/css/plus.css" />
    <script type="text/javascript">
        $(function(){
            <?php
                    if(!empty($this->curUid) && is_numeric($this->curUid)){
                        echo '$(".afterLogin").show();$(".beforeLogin").hide()';
                    } else {
                        echo '$(".afterLogin").hide();$(".beforeLogin").show()';
                    }
                ?>
        })
    </script>
</head>
<body>
    <!--headStart-->
    <div class="site-nav">
        <div class="site-nav-bd">
            <ul class="site-nav-left">
                <li class="J_Sd">
                    <dl>
                        <dt><a href="http://www.imeimama.com" target="_blank">爱美妈妈</a><b></b></dt>
                        <dd>
                            <div class="item"><a href="http://www.lady8844.com" target="_blank">爱美网</a></div>
                        </dd>
                    </dl>
                </li>
                <!--
                <li><a href="#" target="_blank">移动客户端</a></li>
                <li><a href="#" target="_blank">网站地图</a></li>
                <li><a href="#" target="_blank">帮助</a></li>
                -->
            </ul>
            <div class="hidden loginInfo"></div>
            <ul class="site-nav-right">
                <li class="welcome afterLogin">您好，<strong class="loginUsername"><?php echo MyUcenter::getUsernameByUid($this->curUid);?></strong> 欢迎来到爱美妈妈</li>
                <li class="login-reg beforeLogin hidden"><a href="http://bbs.imeimama.com/logging.php?action=login" target="_blank" class="login">[登录]</a><a href="http://bbs.imeimama.com/register.php" target="_blank" class="reg">[注册]</a></li>
                <li class="other-login beforeLogin hidden"><a rel='nofollow' href="http://bbs.lady8844.com/qqconnect/oauth/redirect_to_login2012.php" class="qqlogin">QQ登录</a><a rel='nofollow' href="http://bbs.lady8844.com/api/weibo/index.php" class="sinalogin">微博登录</a> </li> </ul>
        </div>
    </div>
    <div class="logo-quicknav" id="main">
        <div class="logo"><a href="http://www.imeimama.com"><img src="http://www.imeimama.com/ref/images/logo.png"  width="173" height="102" alt="爱美妈妈"/></a></div>
        <div class="quicknav">
            <dl class="huaiyun">
                <dt><a href="http://huaiyun.imeimama.com/" target="_blank">怀孕手册</a></dt>
                <dd>
                    <p><a href="http://huaiyun.imeimama.com/yunqian/" target="_blank">孕前准备</a><a href="http://huaiyun.imeimama.com/yunqi/" target="_blank">孕期护理</a></p>
                    <p><a href="http://huaiyun.imeimama.com/fenmian/" target="_blank">分娩生产</a><a href="http://xinma.imeimama.com/yuezi/" target="_blank">月子护理</a></p>
                </dd>
            </dl>
            <dl class="jiankang">
                <dt><a href="http://yuer.imeimama.com/" target="_blank">育儿手册</a></dt>
                <dd>
                    <p><a href="http://yuer.imeimama.com/" target="_blank">健康育儿</a><a href="http://edu.imeimama.com/" target="_blank">早期教育</a></p>
                    <p><a href="http://fashion.imeimama.com/ctfx/" target="_blank">潮童发型</a><a href="http://fashion.imeimama.com/qzzb/" target="_blank">亲子装扮</a></p>
                </dd>
            </dl>
            <dl class="zhaojiao">
                <dt><a href="http://bbs.imeimama.com" target="_blank">互动社区</a></dt>
                <dd>
                    <p><a href="http://try.imeimama.com" target="_blank">免费试用</a><a href="http://daogou.imeimama.com" target="_blank">用品导购</a></p>
                    <p><a href="http://bbs.imeimama.com/forum-2-1.html" target="_blank">亲子社区</a><a href="http://bbs.imeimama.com/forum-11-1.html" target="_blank">美食厨房</a></p>
                </dd>
            </dl>
        </div>
    </div>
<div class="nav">
  <ul class="nav-bd">
    <li class="stage-1"><a title="备孕" target="_blank" href="http://huaiyun.imeimama.com/yunqian/">备孕</a></li>
    <li class="stage-2"><a title="孕期" target="_blank" href="http://huaiyun.imeimama.com/yunqi/">孕期</a></li>
    <li class="stage-3"><a title="分娩" target="_blank" href="http://huaiyun.imeimama.com/fenmian/">分娩</a></li>
    <li class="stage-4"><a title="月子" target="_blank" href="http://xinma.imeimama.com/yuezi/">月子</a></li>
    <li class="stage-5"><a title="新生儿" target="_blank" href="http://xinma.imeimama.com/xse/">新生儿</a></li>
    <li class="stage-6"><a title="0-1岁" target="_blank" href="http://yuer.imeimama.com/yinger/">0-1岁</a></li>
    <li class="stage-7"><a title="1-3岁" target="_blank" href="http://yuer.imeimama.com/youer/">1-3岁</a></li>
    <li class="stage-8"> <a title="3-6岁" target="_blank" href="http://yuer.imeimama.com/xueqian/">3-6岁</a></li>
  </ul>
  <span class="share-left"></span> <span class="share-right"></span>
</div>
    <!--headEnd-->

    <div class="trycontent">
        <div class="trynav">
            <div class="c">
                <h2>免费试用</h2>
                <ul>
                    <?php
                        $tabClass[Yii::app()->controller->action->id] = "current";
                    ?>

                    <li class="<?php echo !empty($tabClass['home']) ? $tabClass['home'] : "";?>"><a href="<?php echo Yii::app()->request->hostInfo.Yii::app()->baseUrl; ?>" >试用首页</a></li>
                    <li class="<?php echo !empty($tabClass['now']) ? $tabClass['now']:"";?>"><a href="<?php echo Yii::app()->createUrl("/main/Index/now")?>" >正在试用</a></li>
                    <li class="<?php echo !empty($tabClass['article']) ? $tabClass['article'] : "";?>"><a href="<?php echo Yii::app()->createUrl ("/main/Index/article") ?>">提交报告</a></li>
                    <li class="<?php echo !empty($tabClass['rule']) ? $tabClass['rule'] : "";?>"><a href="<?php echo Yii::app()->createUrl("/main/Index/rule")?>">试用规则</a></li>
                    <li><a href="http://bbs.imeimama.com/forum-10-1.html" target="_blank">试用论坛</a></li>
                </ul>
            </div>
        </div>

    <?php echo $content;?>

    </div>

    <div class="footer">
        <?php
            if(Yii::app()->controller->action->id === "home" && 1==3) :
        ?>
        <div class="friend-links">
            <div class="friend-links-hd">友情链接</div>
            <div class="friend-links-bd fn-clear"> <a title="多多育儿网" href="http://www.duoduo.cn/" target="_blank">多多育儿网</a> <a title="PCbaby怀孕" href="http://huaiyun.pcbaby.com.cn/" target="_blank">PCbaby怀孕</a> <a title="丫丫网" href="http://guangzhou.iyaya.com/" target="_blank">丫丫网</a> <a title="中经网亲子" href="http://baby.ce.cn/" target="_blank">中经网亲子</a> <a title="爱早教" href="http://www.izaojiao.com/" target="_blank">爱早教</a> <a title="童装加盟网" href="http://www.kidsnet.cn/" target="_blank">童装加盟网</a> <a title="妈妈说育儿" href="http://zhishi.0-6.com/" target="_blank">妈妈说育儿</a> <a title="宝宝乐园" href="http://baby.vdolady.com/" target="_blank">宝宝乐园</a> <a title="成长树少儿教育网" href="http://www.baby321.com/" target="_blank">成长树少儿教育网</a> <a title="九叶网宝宝秀" href="http://baby.9ye.com/" target="_blank">九叶网宝宝秀</a> <a title="父母会育儿网" href="http://www.fumuhui.com/" target="_blank">父母会育儿网</a> <a title="宝宝妈妈网" href="http://www.baobaomm.com/" target="_blank">宝宝妈妈网</a> <a title="花花网母婴" href="http://baby.2hua.com/" target="_blank">花花网母婴</a> <a title="十月怀胎网" href="http://www.10month.com/" target="_blank">十月怀胎网</a> <a title="摇篮育儿帮" href="http://yuerbang.yaolan.com/" target="_blank">摇篮育儿帮</a> <a title="索宝吧育儿网" href="http://www.suobao8.com/" target="_blank">索宝吧育儿网</a> <a title="久久母婴网" href="http://baby.9939.com/" target="_blank">久久母婴网</a> <a title="中国童装时尚网" href="http://www.tz.ef360.com/" target="_blank">中国童装时尚网</a> <a title="星宝宝育教网" href="http://www.starbaby.cn/" target="_blank">星宝宝育教网</a> <a title="起跑线育儿网" href="http://www.qipaoxian.com/" target="_blank">起跑线育儿网</a> <a title="宝宝地带" href="http://www.ibabyzone.cn/" target="_blank">宝宝地带</a> <a title="39儿科" href="http://ek.39.net/" target="_blank">39儿科</a> <a title="女人志母婴" href="http://baby.onlylady.com/" target="_blank">女人志母婴</a> <a title="合肥亲子网" href="http://baby.365jia.cn/" target="_blank">合肥亲子网</a> <a title="湖南妈妈网" href="http://www.hnmama.com/" target="_blank">湖南妈妈网</a> <a title="育儿资讯" href="http://news.jkbaby.cn/" target="_blank">育儿资讯</a> <a title="爱宝网" href="http://www.kid520.com/" target="_blank">爱宝网</a> <a title="妈咪宝贝" href="http://www.izhufu.com/qinzi/" target="_blank">妈咪宝贝</a> <a title="妈妈网" href="http://www.mama.cn/" target="_blank">妈妈网</a> <a title="55BBS母婴" href="http://yunbao.55bbs.com/" target="_blank">55BBS母婴</a> <a title="凤凰网亲子" href="http://fashion.ifeng.com/baby/" target="_blank">凤凰网亲子</a> <a title="福州宝宝网" href="http://www.fzbbw.com/" target="_blank">福州宝宝网</a> <a title="东北亲子网" href="http://baby.nen.com.cn/" target="_blank">东北亲子网</a> <a title="中国幼儿教师网" href="http://www.yejs.com.cn/" target="_blank">中国幼儿教师网</a> </div>
        </div>
        <?php endif; ?>
        <div class="footer-nav"> <a target="_blank" href="http://huaiyun.imeimama.com/yunqian/">备孕</a> <a target="_blank" href="http://huaiyun.imeimama.com/yunqi/">孕期</a> <a target="_blank" href="http://huaiyun.imeimama.com/fenmian/">分娩</a> <a target="_blank" href="http://xinma.imeimama.com/yuezi/">月子</a> <a target="_blank" href="http://xinma.imeimama.com/xse/">新生儿</a> <a target="_blank" href="http://yuer.imeimama.com/yinger/">0-1岁</a> <a target="_blank" href="http://yuer.imeimama.com/youer/">1-3岁</a> <a target="_blank" href="http://yuer.imeimama.com/xueqian/">3-6岁</a> <a target="_blank" href="http://fashion.imeimama.com/qzzb/">亲子装扮</a> <a target="_blank" href="http://fashion.imeimama.com/ctfx/">潮童发型</a> <a target="_blank" href="http://bbs.imeimama.com">亲子社区</a> <a target="_blank" href="http://try.imeimama.com">免费试用</a> <a title="回到顶部" class="J_GoTop" href="javascript:void(0)"></a></div>
        <div class="copyright">
            <p><a target="_blank" href="#">关于我们</a> | <a target="_blank" href="#">加入我们</a> | <a target="_blank" href="#">联系方式</a> | <a target="_blank" href="#">联系客服</a> | <a target="_blank" href="#">网站地图</a> | <a target="_blank" href="#">版权声明</a></p>
            <p>&copy;2004-2013 <a target="_blank" href="http://www.imeimama.com/">爱美妈妈</a>版权所有&nbsp;本站言论纯属发表者个人意见，与本站立场无关<br>
                粤ICP证号：B2-20070037&nbsp;&nbsp;&nbsp;粤ICP备09011552号-3 </p>
            <p> <a rel="nofollow" class="an" href="#" target="_blank"><img width="36" height="43" alt="安网" src="http://www.imeimama.com/ref/images/gana.png"></a> <a rel="nofollow" href="http://www.gzjd.gov.cn/newgzjd/baojing/110.jsp?catid=318" target="_blank"><img width="51" height="60" alt="广警" src="http://www.imeimama.com/ref/images/baoj.png"></a> <a rel="nofollow" href="http://guangzhou.cyberpolice.cn/netalarm/netalarm/wangjian_index.jsp" target="_blank"><img width="99" height="53" alt="报警" src="http://www.imeimama.com/ref/images/baoji.png"></a> </p>
        </div>
</body>
</html>
<script src="<?php echo Yii::app()->baseUrl;?>/js/jquery.switchable-2.0.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/js/v.js" type="text/javascript"></script>
