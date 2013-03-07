<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <script type="text/javascript" src="<?php echo Yii::app()->createUrl('/BaseJs/'); ?>"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
                array('label'=>'试用装', 'url'=>array('bg/item/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'试用装品牌', 'url'=>array('bg/brand/admin'), 'visible'=>!Yii::app()->user->isGuest),
                //array('label'=>'试用装类型', 'url'=>array('bg/itemType/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'试用申请', 'url'=>array('bg/apply/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'试用心得', 'url'=>array('bg/article/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'用户', 'url'=>array('bg/user/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'图文设置', 'url'=>array('bg/media/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'图文位设置', 'url'=>array('bg/MediaPosition/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'清空缓存', 'url'=>array('bg/Helper/ClearCache'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'注销 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
