<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>试用装</title>
    <script type="text/javascript" src="<?php echo Yii::app()->createUrl('/BaseJs/'); ?>"></script>
    <?php
    Yii::app()->clientScript->registerCoreScript('jquery');
    ?>
</head>
<body>
    <?php echo $content;?>
</body>
</html>