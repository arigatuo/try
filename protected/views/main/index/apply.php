<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.cityselect.js"></script>
<script type="text/javascript">
    $(function () {
        $(".box3 .close").bind("click", function () {
            $(".box3 .cbd").toggle();
            if ($('#close_open').text() == '展开') {
                $("#close_open").html('收起');
            }
            else {
                $("#close_open").html('展开');
            }
        })
        $(".box3 .close").click();
        $("#citySelect").citySelect({nodata: "none", prov: "北京"});
    })
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'apply-form',
        'enableAjaxValidation' => false,
    ));
?>

<input type="hidden" name="Apply[item_id]" value="<?php echo $item_id;?>" />

<div class="applybox">
<div class="box1">
    <div class="chd">申请理由</div>
    <dl class="mod-list dlly fn-clear">
        <dt><span class="bt">*</span></dt>
        <dd>
            <?php echo $form->textArea($model,'apply_text',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'apply_text'); ?>

        </dd>
    </dl>
</div>
<div class="box2">
    <div class="chd">快递信息</div>
    <p class="writetips">请认真填写详细信息，以便您能顺利收到我们寄出的试用产品！</p>
    <dl class="mod-list name fn-clear">
        <dt><span class="bt">*</span>真实姓名</dt>
        <dd>
            <?php echo $form->textField($model,'addr_name',array('size'=>20,'maxlength'=>10, 'class'=>'mod-input')); ?>
            <?php echo $form->error($model,'addr_name'); ?>
        </dd>
    </dl>
    <dl class="mod-list phone fn-clear">
        <dt><span class="bt">*</span>移动电话</dt>
        <dd>
            <?php echo $form->textField($model, 'addr_phone', array('class'=>'mod-input', 'size' => 20,
            'maxlength' => 11)); ?>
            <?php echo $form->error($model, 'addr_phone'); ?>
        </dd>
    </dl>
    <dl class="mod-list region fn-clear">
        <dt><span class="bt">*</span>所在地区</dt>
        <div id="citySelect">
            <dd>
                <select class="prov mod-input" name="Apply[addr_province]" id="apply_addr_province"></select>
            </dd>
            <dd>
                <select class="city mod-input" name="Apply[addr_city]" id="apply_addr_city"></select>
            </dd>
        </div>
    </dl>
    <dl class="mod-list address fn-clear">
        <dt><span class="bt">*</span>联系地址</dt>
        <dd>
            <?php echo $form->textField($model, 'addr_address', array('size' => 100, 'maxlength' => 100,
                'class'=>'mod-input')); ?>
            <?php echo $form->error($model, 'addr_address'); ?>
        </dd>
    </dl>
    <dl class="mod-list email fn-clear">
        <dt><span class="bt">*</span>常用邮箱</dt>
        <dd>
            <?php echo $form->textField($model, 'addr_email', array('class'=>'mod-input','size' => 100,
            'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'addr_email'); ?>
        </dd>
    </dl>
</div>
<div class="box3">
<div class="chd">
    <div class="close"><span class="jiajian">-</span><span id="close_open">收起</span></div>
</div>
<div class="cbd">
<div class="backline"></div>
<dl class="mod-list sex  fn-clear">
    <dt>性别</dt>
    <dd>
        <label class="girl">
            <input name="Apply[userDetails][sex]" type="radio" value="0">
            女</label>
        <label class="boy">
            <input name="Apply[userDetails][sex]" type="radio" value="1">
            男</label>
    </dd>
</dl>
<dl class="mod-list born fn-clear">
    <dt>出生年月</dt>
    <dd>
        <input type="text" name="Apply[userDetails][birthday]" class="mod-input">
    </dd>
</dl>
<dl class="mod-list eduback fn-clear">
    <dt>教育程度</dt>
    <dd>
        <select name="Apply[userDetails][education]" class="mod-selected">
            <option value="">请选择</option>
            <option value="大专以下">大专以下</option>
            <option value="大专">大专</option>
            <option value="本科">本科</option>
            <option value="硕士">硕士</option>
            <option value="博士">博士</option>
            <option value="博士以上">博士以上</option>
        </select>
    </dd>
</dl>
<dl class="mod-list marriage fn-clear">
    <dt>婚姻状况</dt>
    <dd>
        <select name="Apply[userDetails][marriage]" class="mod-selected">
            <option value="">请选择</option>
            <option value="1">未婚</option>
            <option value="2">已婚</option>
            <option value="3">保密</option>
        </select>
    </dd>
</dl>
<dl class="mod-list income fn-clear">
    <dt>收入</dt>
    <dd>
        <select name="Apply[userDetails][income]" class="mod-selected">
            <option value="0">请选择</option>
            <option value="1">2000以下</option>
            <option selected="" value="2">2000-3000</option>
            <option value="3">3000-5000</option>
            <option value="4">5000-7000</option>
            <option value="5">7000-1万</option>
            <option value="6">1万以上</option>
        </select>
    </dd>
</dl>
<dl class="mod-list skin fn-clear">
    <dt>肤质</dt>
    <dd>
        <select name="Apply[userDetails][skin]" class="mod-selected">
            <option value="">请选择</option>
            <option selected value="中性">中性</option>
            <option value="混合性">混合性</option>
            <option value="油性">油性</option>
            <option value="干性">干性</option>
            <option value="过敏性">过敏性</option>
            <option value="先天敏感型">先天敏感型</option>
        </select>
    </dd>
</dl>
<dl class="mod-list hair fn-clear">
    <dt>发质</dt>
    <dd>
        <select name="Apply[userDetails][hairstyle]" class="mod-selected">
            <option value="">请选择</option>
            <option value="干性">干性</option>
            <option value="油性">油性</option>
            <option value="混合性">混合性</option>
            <option value="中性">中性</option>
            <option value="受损发质">受损发质</option>
        </select>
    </dd>
</dl>
<dl class="mod-list makeup fn-clear">
    <dt>妆容习惯</dt>
    <dd>
        <select name="Apply[userDetails][prink_custom]" class="mod-selected">
            <option value="">请选择</option>
            <option value="淡妆型">淡妆型</option>
            <option value="派对妆容型">派对妆容型</option>
        </select>
    </dd>
</dl>
<dl class="mod-list care fn-clear">
    <dt>日常护理方式</dt>
    <dd>
        <select name="Apply[userDetails][nurse_mode]" class="mod-selected">
            <option value="">请选择</option>
            <option selected="" value="1">DIY</option>
            <option value="2">定期去专业美容院</option>
            <option value="3">基本不做护理</option>
        </select>
    </dd>
</dl>
<span class="fn-clearfix"></span>
<dl class="mod-list brandlove fn-clear">
    <dt>品牌喜好</dt>
    <dd>
        <ul class="fn-clear">
            <li>
                <label>
                    <input name="Apply[userDetails][brand][]" type="checkbox" value="欧美系品牌粉丝">
                    欧美系品牌粉丝</label>
            </li>
            <li>
                <label>
                    <input name="Apply[userDetails][brand][]" type="checkbox" value="偏好日韩系品牌">
                    偏好日韩系品牌</label>
            </li>
        </ul>
        <ul class="ul2 fn-clear">
            <li>
                <label>
                    <input name="Apply[userDetails][brand][]" type="checkbox" value="国产品牌支持者">
                    国产品牌支持者</label>
            </li>
            <li>
                <label>
                    <input name="Apply[userDetails][brand][]" type="checkbox" value="药妆粉丝">
                    药妆粉丝</label>
            </li>
            <li>
                <label>
                    <input name="Apply[userDetails][brand][]" type="checkbox" value="其它">
                    其它</label>
            </li>
        </ul>
    </dd>
</dl>
<dl class="mod-list productlove fn-clear">
    <dt>产品喜好</dt>
    <dd class="fn-clear">
        <ul class="fn-clear">
            <li>
                <label>
                    <input name="Apply[userDetails][loveproduct][]" type="checkbox" value="0">
                    护肤</label>
            </li>
            <li>
                <label>
                    <input name="Apply[userDetails][loveproduct][]" type="checkbox" value="1">
                    彩妆</label>
            </li>
            <li>
                <label>
                    <input name="Apply[userDetails][loveproduct][]" type="checkbox" value="2">
                    底妆</label>
            </li>
            <li>
                <label>
                    <input name="Apply[userDetails][loveproduct][]" type="checkbox" value="3">
                    香水</label>
            </li>
        </ul>
        <ul class="ul2 fn-clear">
            <li>
                <label>
                    <input name="Apply[userDetails][loveproduct][]" type="checkbox" value="4">
                    美体</label>
            </li>
            <li>
                <label>
                    <input name="Apply[userDetails][loveproduct][]" type="checkbox" value="5">
                    精油</label>
            </li>
            <li>
                <label>
                    <input name="Apply[userDetails][loveproduct][]" type="checkbox" value="4">
                    美发</label>
            </li>
            <li>
                <label>
                    <input name="Apply[userDetails][loveproduct][]" type="checkbox" value="5">
                    小工具</label>
            </li>
        </ul>
    </dd>
</dl>
<dl class="mod-list consumption fn-clear">
    <dt>美容月消费</dt>
    <dd>
        <select name="Apply[userDetails][beauty_month_consume]" class="mod-selected">
            <option value="">请选择</option>
            <option value="1">500元以下</option>
            <option value="2">500~2500元</option>
            <option selected="" value="3">2500~5000元</option>
            <option value="4">5000~10000元</option>
            <option value="5">1万~3万元</option>
            <option value="6">3万元以上</option>
        </select>
    </dd>
</dl>
<dl class="mod-list waystobuy fn-clear">
    <dt>购买方式</dt>
    <dd>
        <select name="Apply[userDetails][buy_mode]" class="mod-selected">
            <option value="">请选择</option>
            <option selected="" value="商场专柜">商场专柜</option>
            <option value="专卖店">专卖店</option>
            <option value="品牌官网">品牌官网</option>
            <option value="超市">超市</option>
            <option value="网上拍卖">网上拍卖</option>
        </select>
    </dd>
</dl>
<span class="fn-clearfix"></span>
<dl class="mod-list whethertry fn-clear">
    <dt>是否愿意试用美妆新品</dt>
    <dd>
        <label>
            <input name="Apply[userDetails][willingtotry]" type="radio" value="0" class="willing">
            是</label>
        <label>
            <input name="Apply[userDetails][willingtotry]" type="radio" value="1" class="nowilling">
            否</label>
    </dd>
</dl>
<dl class="mod-list whethershare fn-clear">
    <dt>是否愿意分享试用心</dt>
    得
    <dd>
        <label>
            <input name="Apply[userDetails][willingtotry]" type="radio" value="0" class="willing">
            是</label>
        <label>
            <input name="Apply[userDetails][willingtotry]" type="radio" value="1" class="nowilling">
            否</label>
    </dd>
</dl>
<dl class="mod-list howtoknow fn-clear">
    <dt>得知美妆新品的方式</dt>
    <dd>
        <select name="Apply[userDetails][newproduct_mode]" class="mod-selected">
            <option value="">请选择</option>
            <option value="论坛">论坛</option>
            <option value="网站新闻">网站新闻</option>
            <option value="报刊杂志">报刊杂志</option>
            <option selected="" value="电视广告">电视广告</option>
            <option value="朋友推荐">朋友推荐</option>
        </select>
    </dd>
</dl>
<dl class="mod-list siteorbbs fn-clear">
    <dt>经常去的化妆品网站/论坛</dt>
    <dd>
        <input class="mod-input" type="text">
    </dd>
</dl>
</div>
</div>
<?php echo CHtml::submitButton('提交', array('class'=>'submit')); ?>
<?php $this->endWidget(); ?>
</div>
