<div class="right">
    <div class="mod-user-login">
        <div class="thd"></div>
        <div class="tbd">

                    <div  class="afterLogin user-loginout fn-clear"> <a href="javascript:void(0)" class="pic"><img id="loginUserHead" src="<?php echo MyUcenter::getUserHeadByUid($this->curUid);?>" width="80" height="80" /></a>
                        <div class="txt">
                            <div class="welcome">欢迎您，</div>
                            <div class="username"><a href="javascript:void(0)" class="loginUsername"><?php echo MyUcenter::getUsernameByUid($this->curUid)?></a></div>
                            <!--<div class="trynum">我的试用申请：<span>2</span></div>-->
                            <div class="loginout-link"><a id="logoutSubmit" href="javascript:void(0)">[退出登录]</a></div>
                        </div>
                    </div>
                    <div class="beforeLogin">
                        <form onkeydown="if(event.keyCode==13){$('#loginSubmit').click()}">
                            <div class="user-login fn-clear">
                                <ul class="user-login-left">
                                    <li class="mb fn-clear"> <label for="username">账号：</label><span><input type="text" name="username" id="username" class="logkuang" /></span></li>
                                    <li class="fn-clear"> <label for="pwd">密码：</label><span><input type="password" value="" name="pwd" id="pwd" class="logkuang" /></li></span></ul>
                                <div class="user-login-right"><button type="button" id="loginSubmit" class="submit"></button></div>
                            </div>
                            <p class="user-tips"><a href="http://bbs.lady8844.com/register2012.php" target="_blank" class="register">注册新用户</a><a href="http://bbs.lady8844.com/logging.php?action=login&todo=password" target="_blank" class="forget">忘记密码</a></p>
                        </form>
                    </div>
            <div class="baidu-share">
                <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare fn-clear"> <a class="bds_qzone">QQ空间</a> <a class="bds_tsina">新浪微博</a> <a class="bds_tqq">腾讯微博</a> </div>
                <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0" ></script>
                <script type="text/javascript" id="bdshell_js"></script>
                <script type="text/javascript">
                    document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
                </script>
                完成分享，可以增加你的中奖机会 </div>
        </div>
    </div>
    <a href="<?php echo Yii::app()->createUrl("/main/Index/Article")?>" class="submitreports" title="提交试用报告">提交试用报告</a>
    <div class="trialreport">
        <div class="thd">最新试用报告</div>
        <ul class="tbd">
            <?php
                    if(!empty($this->latestArticle)) :
                        foreach($this->latestArticle as $article) :
                            $theUid = $article->getAttribute("user_id");
                            $itemUrl = Yii::app()->createUrl("/main/Index/Detail", array("item_id"=>$article->getAttribute("item_id")));
             ?>
            <li> <a href="javascript:void(0)" class="pic"><img src="<?php echo MyUcenter::getUserHeadByUid($theUid)?>"  width="48" height="48" alt="<?php echo MyUcenter::getUsernameByUid($theUid);?>" /></a>
                <div class="txt">
                    <h3 class="title">
                        <a href="<?php echo $itemUrl;?>" target="_blank">
                            <?php echo $article->getAttribute('article_title'); ?>
                        </a>
                    </h3>
                    <p><span class="name"><?php echo MyUcenter::getUsernameByUid($theUid)?></span><span class="tj"></span></p>
                </div>
            </li>
            <?php       endforeach;
                    endif; ?>
        </ul>
    </div>
    <div class="trialules">
        <div class="thd">试用规则</div>
        <div class="tbd">
            <dl class="step-1">
                <dt>获得试用资格</dt>
                <dd>注册成为爱美妈妈网会员，即可获得试用资格。</dd>
            </dl>
            <dl  class="step-2">
                <dt>提交申请</dt>
                <dd>选择你希望尝试的商品，提交试用申请。</dd>
            </dl>
            <dl  class="step-3">
                <dt>获得试用</dt>
                <dd>你提交的试用申请获得批准后，我们将通过邮件通知你，并按你在申请试用时填写的资料，将试用装邮寄到你手中。</dd>
            </dl>
            <dl class="step-4">
                <dt>获得试用资格</dt>
                <dd>在规定时间内提交试用报告的网友将获得一定的金币奖励，否则将扣除一定金币，并暂停一个月试用装申请资格。</dd>
            </dl>
        </div>
    </div>
</div>
