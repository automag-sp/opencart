/* 
 * Скрипты для панели администратора
 */

$(document).ready(function(){
    
    

    // Применяем настройки из файла settings.js
    
    if(view_name) $('#view_name').attr("checked", "");
    if(view_email) $('#view_email').attr("checked", "");
    if(view_comment) $('#view_comment').attr("checked", "");
    if(view_time) $('#view_time').attr("checked", "");

    if(mand_name) $('#mand_name').attr("checked", "");
    if(mand_email) $('#mand_email').attr("checked", "");
    if(mand_comment) $('#mand_comment').attr("checked", "");
    if(mand_time) $('#mand_time').attr("checked", "");

    if(window_center) $('#window_center').attr("checked", "");
    if(st_button) $('#st_button').attr("checked", "");
    if(window_black) $('#window_black').attr("checked", "");
    if(view_asterisk) $('#view_asterisk').attr("checked", "");
     
     
    $('#'+cc_position).css('background-color', 'rgb(116, 147, 201)');
    $('#chat_position_h').val(cc_position);

    $('#call_text').val(call_text);
    $('#call_b_text').val(call_b_text);

    // Перебераем все checkbox и показываем какие выброны
    $('input:checkbox').each(function(e){

        if($(this).attr('checked') == 'checked'){
            $(this).parent().find('.checkbox_check').css('background-position', '-19px 0');
        }

    })

    $('.checkbox_div').click(function(){ // Чекбоксы...
        
        if($(this).find('input').attr('checked') == undefined) {
            
            $(this).find('input').attr('checked', 'checked');
            $(this).find('.checkbox_check').css('background-position', '-19px 0');
            
        } else {
            
            $(this).find('input').removeAttr('checked');
            $(this).find('.checkbox_check').css('background-position', '0 0');
            
        }
        
    });
    
    $('.position_id').click(function(){ // Позиция окна на сайте
     
        $('.position_id').each(function(){
            $(this).css('background-color', '#666');
        });

        $(this).css('background-color', '#7493C9');

        $('#chat_position_h').val($(this).attr('id'));
        
    });
    
    
    
    $('.save_settings').click(function(){ // Обработчик формы
        
	   $('#settings_form').submit();
        
    });
    
});

$(window).load(function(){

    // Цвет окна
    $('#color_chat .colorpicker_new_color').css('background-color', cc_chat_color);

    $('#color_chat .colorpicker_hex input').val(cc_chat_color.substr(1,6));
    $('#color_chat .colorpicker_hex input').change();
    $('#color_chat_h').val(cc_chat_color);
    
    // Цвет кнопки
    $('#color_chat_button .colorpicker_new_color').css('background-color', ok_button_color);
    
    $('#color_chat_button .colorpicker_hex input').val(ok_button_color.substr(1,6));
    $('#color_chat_button .colorpicker_hex input').change();
    $('#color_button_h').val(ok_button_color);

})


