function addToCartQty(product_id, q) {
    var input=$(q).parent().parent().find('input[type=text]');
    var qty = input.val();

    if (!isNaN(qty)) {
       if(!qty || qty==0){qty=1;}       
  
        $.ajax({
            url: 'index.php?route=checkout/cart/add',
            type: 'post',
            data: 'product_id=' + product_id + '&quantity=' + qty,
            dataType: 'json',
            success: function(json) {
                $('.success, .warning, .attention, .information, .error').remove();
          
                if (json['redirect']) {
                    location = json['redirect'];
                }
          
                if (json['success']) {
                    $('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');
              
                    $('.success').fadeIn('slow');
              
                    $('#cart-total').html(json['total']);
              
                }
            }
        });
    }
}


function plusQty(q) {
    var input=$(q).parent().find('input[type=text]');
    if (isNaN(input.val())) {  
	input.val(1);    
    }
    input.val(parseInt(input.val())+1);
    input.change();
}

function minusQty(q) {
    var input=$(q).parent().find('input[type=text]');
    if (isNaN(input.val())) {
        input.val(1);
    }
    if ($(input).val()>1) {
        $(input).val(parseInt($(input).val())-1);   
    }
    input.change();
}