<div class="errorDiv">
    <p>
        <?php echo $code; ?>
    </p>
</div>
<script type="text/javascript">
    <?php
        $referUrl = Yii::app()->request->urlReferrer;
        $jumpUrl = !empty($referUrl) ? $referUrl : Yii::app()->baseUrl;
     ?>
    setTimeout("window.location.href='<?php echo $jumpUrl;?>';", 2000);
</script>
