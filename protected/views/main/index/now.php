<?php
/**
 * Created by JetBrains PhpStorm.
 * User: k29-lizhen
 * Date: 13-2-27
 * Time: 下午4:56
 * To change this template use File | Settings | File Templates.
 */
?>
<script src="js/jquery.switchable-2.0.min.js" type="text/javascript"></script>
<script src="js/v.js" type="text/javascript"></script>
<div class="trymain fn-clear">
    <div class="left">
      <div class="trying-products">
        <div class="thd">正在进行的试用</div>
        <div class="tbd">
            <?php if(!empty($itemList)) : ?>
                <?php   foreach($itemList as $item) :?>
                    <?php $this->renderPartial('////common/singleItemBlock', array('item'=>$item)); ?>
                <?php   endforeach; ?>
            <?php endif; ?>
        </div>
          <div class="p-pagination">
              <div class="pagination-inner">
                  <?php
                  //分页
                  $this->widget('CLinkPager', array(
                      'header' => '',
                      'firstPageLabel' => '首页',
                      'lastPageLabel' => '尾页',
                      'prevPageLabel' => '上一页',
                      'nextPageLabel' => '下一页',
                      'pages' => $page,
                      'maxButtonCount' => 7,
                      'cssFile' => false,
                  ));
                  ?>
              </div>
          </div>
      </div>
    </div>
    <div class="right">
      <div class="mod-user-login">
        <div class="thd"></div>
        <div class="tbd">
          <div class="user-login fn-clear">
            <ul class="user-login-left">
              <li class="mb fn-clear">
                <label for="username">账号：</label>
                <span>
                <input type="text" name="username" id="username" class="logkuang" />
                </span></li>
              <li class="fn-clear">
                <label for="pwd">密码：</label>
                <span>
                <input type="password" value="" name="pwd" id="pwd" class="logkuang" />
                </span> </li>
            </ul>
            <div class="user-login-right">
              <button type="submit"  class="submit"></button>
            </div>
          </div>
          <p class="user-tips"><a href="#" target="_blank" class="register">注册新用户</a><a href="#" target="_blank" class="forget">忘记密码</a></p>
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
      <a href="#" target="_blank" class="submitreports">提交试用报告</a>
      <div class="trialreport">
        <div class="thd">最新试用报告</div>
        <ul class="tbd">
          <li><a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
            <div class="txt">
              <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
              <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
            </div>
          </li>
          <li><a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
            <div class="txt">
              <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
              <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
            </div>
          </li>
          <li><a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
            <div class="txt">
              <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
              <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
            </div>
          </li>
          <li><a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
            <div class="txt">
              <h3 class="title"><a href="#" target="_blank">膜法世家绿豆清肌祛痘精华试用心得</a></h3>
              <p><span class="name">琳妹妹</span><span class="tj">42/13534</span></p>
            </div>
          </li>
          <li class="last"><a href="#" target="_blank" class="pic"><img src="images/del_4848.jpg" width="48" height="48" alt="琳妹妹" /></a>
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
          <dl class="step-2">
            <dt>提交申请</dt>
            <dd>选择你希望尝试的商品，提交试用申请。</dd>
          </dl>
          <dl class="step-3">
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
