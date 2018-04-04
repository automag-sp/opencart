<!--<h2>Инстркуции по оплате</h2>-->
<div class="content" style="display: none">
    Текст инструкции оплаты при получении
</div>
<div class="buttons" style="display: none">
    <div class="right">
        <input type="button" value="<?php echo $button_confirm; ?>" id="button-confirm" class="button"/>
    </div>
</div>
<script type="text/javascript"><!--
    //    $('#button-confirm').trigger('click');
    $.ajax({
        type: 'get',
        url: 'index.php?route=payment/cod/confirm',
        success: function () {
            location = '<?php echo $continue; ?>';
        }
    });
    //    $('#button-confirm').on('click', function () {
    //        $.ajax({
    //            type: 'get',
    //            url: 'index.php?route=payment/cod/confirm',
    //            success: function () {
    //                location = '<?php echo $continue; ?>';
    //            }
    //        });
    //    });
    //--></script>
