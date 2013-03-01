<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-27
 * Time: 下午4:24
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="trymain fn-clear">
    <div class="left">
        <div class="foucs">
            <div class="pic">
                <?php
                $count = 0;
                if(!empty($flashContent)) :
                    foreach($flashContent as $flash) :
                        ?>
                        <a href="<?php echo $flash->getAttribute("media_url");?>" target="_blank" <?php if($count++===0) :?>class="current"<?php endif;?> ><img src="<?php echo $flash->getAttribute("media_photo");?>" width="700" height="280" alt="标题"/></a>
                    <?php
                    endforeach;
                endif;
                ?>
            </div>
            <ul class="trigger"><li class="current">1</li><li>2</li><li>3</li><li>4</li><li>5</li></ul>
            <span class="l-t"></span><span class="r-t"></span> <span class="l-b"></span> <span class="r-b"></span></div>
        <div class="trying-products">
            <div class="thd">正在进行的试用</div>
            <div class="tbd">
                <?php if(!empty($itemList)) : ?>
                    <?php   foreach($itemList as $item) :?>
                        <?php $this->renderPartial('////common/singleItemBlock', array('item'=>$item)); ?>
                    <?php   endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="right">
        <div class="mod-user-login">
            <div class="thd"></div>
            <div class="tbd">

                <!-- <div class="user-login fn-clear">
             <ul class="user-login-left">
            <li class="mb fn-clear"> <label for="username">账号：</label><span><input type="text" name="username" id="username" class="logkuang" /></span></li>
            <li class="fn-clear"> <label for="pwd">密码：</label><span><input type="password" value="" name="pwd" id="pwd" class="logkuang" /></li></span></ul>

             <div class="user-login-right"><button type="submit"  class="submit"></button></div>

             </div>
             <p class="user-tips"><a href="#" target="_blank" class="register">注册新用户</a><a href="#" target="_blank" class="forget">忘记密码</a></p>-->

                <div class="user-loginout fn-clear"> <a href="#" target="_blank" class="pic"><img src="images/del_80803.jpg" width="80" height="80" alt="用户名称" /></a>
                    <div class="txt">
                        <div class="welcome">欢迎您，</div>
                        <div class="username"><a href="#" target="_blank">春天花花</a></div>
                        <div class="trynum">我的试用申请：<span>2</span></div>
                        <div class="loginout-link"><a href="#">[退出登录]</a></div>
                    </div>
                </div>
                <div class="baidu-share">
                    <!-- Baidu Button BEGIN -->
                    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare fn-clear"> <a class="bds_qzone">QQ空间</a> <a class="bds_tsina">新浪微博</a> <a class="bds_tqq">腾讯微博</a> </div>
                    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0" ></script>
                    <script type="text/javascript" id="bdshell_js"></script>
                    <script type="text/javascript">
                        document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
                    </script>
                    <!-- Baidu Button END -->
                    完成分享，可以增加你的中奖机会 </div>
            </div>
        </div>
        <a href="#" target="_blank" class="submitreports" title="提交试用报告">提交试用报告</a>
        <div class="trialreport">
            <div class="thd">最新试用报告</div>
            <ul class="tbd">
                <li> <a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
                    <div class="txt">
                        <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
                        <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
                    </div>
                </li>
                <li> <a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
                    <div class="txt">
                        <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
                        <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
                    </div>
                </li>
                <li> <a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
                    <div class="txt">
                        <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
                        <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
                    </div>
                </li>
                <li> <a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
                    <div class="txt">
                        <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
                        <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
                    </div>
                </li>
                <li class="last"> <a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
                    <div class="txt">
                        <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
                        <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
                    </div>
                </li>
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
</div>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/dayCount.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/js/jquery.soChange-min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        $('.foucs .pic a').soChange({
            thumbObj:$('.foucs .trigger li'),
            thumbNowClass:'current',
            thumbOverEvent:true,
            autoChange:true,
            overStop:true,
            slideTime:10,
            changeTime:5000,
            delayTime:300
        });
    })
</script>
