<?php
    /*
     *
     * cgridView里面的多选
     input : baseUrl,
              selectIdName,
   */
    if(!empty($selectIdName)){
        $selectIdName .= "_c0";
    }
?>
<script type="text/javascript">
    jQuery(function(){
        jQuery('.multi-button').click(function(){
            var atLeastOneIsChecked = $('input[name=\"<?php echo !empty($selectIdName) ? $selectIdName : "defaultId" ;?>[]\"]:checked').length > 0;
            if (!atLeastOneIsChecked)
            {
                alert('请至少选择一条记录');
            }else{
                var theFormAction;
                var alertText;
                switch($(this).attr('name')){
                    case 'btndeleteall':
                        theFormAction = 'delete';
                        alertText = "删除";
                        break;
                    case 'btn_apply_accept':
                        theFormAction = 'apply_accept';
                        alertText = "审核通过";
                        break;
                    case 'btn_apply_deny':
                        theFormAction = 'apply_deny';
                        alertText = "忽略";
                        break;
                    case 'btn_apply_select':
                        theFormAction = 'apply_select';
                        alertText = "确定试用装资格";
                        break;
                }
                if (!window.confirm('确定要' + alertText + '记录吗?')){
                    return false;
                }
                var baseFormSubmitUrl = '<?php echo !empty($baseUrl) ? $baseUrl : "";?>/action/';
                $('#upload-search-form').attr('action', baseFormSubmitUrl + theFormAction + "/inputName/<?php echo $selectIdName;?>");
                $('#upload-search-form').submit();
            }
        });
    })
</script>

<div class="row buttons">
    <?php echo CHtml::button('删除',array('name'=>'btndeleteall','class'=>'multi-button')); ?>

    <?php
        if( in_array($selectIdName, array("apply-grid_c0", "article-grid_c0")) ){
            echo CHtml::button('通过审核',array('name'=>'btn_apply_accept','class'=>'multi-button'));
            echo CHtml::button('忽略',array('name'=>'btn_apply_deny','class'=>'multi-button'));
            if($selectIdName == "apply-grid_c0")
                echo CHtml::button('确定试用装资格',array('name'=>'btn_apply_select','class'=>'multi-button'));
        }
    ?>
</div>
