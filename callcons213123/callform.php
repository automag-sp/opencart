<?php
 header('Access-Control-Allow-Origin: *'); header('Content-type: text/html; charset=UTF-8'); ?>

<div class="call_h">
        <span></span>
        <div id="call_close"></div>
    </div>

<div id="callcons">
    
    <div id="call_name_div" class="form_div_class">
        <span class="call_form_name">Ваше имя</span>
        <div class="call_form_div">
            <input class="call_form" type="text" maxlength="100" id="call_name" placeholder="Представьтесь пожалуйста" />
        </div>
    </div>

    <div id="call_tell_div" class="form_div_class">
        <span class="call_form_name">Ваш телефон</span>
        <div class="call_form_div">
            <input class="call_form" type="text" maxlength="25" id="call_tell" placeholder="Телефон для связи" />
        </div>
    </div>
    
    <div id="call_email_div" class="form_div_class">
        <span class="call_form_name">Ваш e-mail</span>
        <div class="call_form_div">
            <input class="call_form" type="text" maxlength="150" id="call_email" placeholder="Адрес электронной почты" />
        </div>
    </div>

    <div id="call_time_div" class="form_div_class">
        <span class="call_form_name">Время звонка</span>
        <div class="call_form_div">
            <input class="call_form" type="text" maxlength="25" id="call_time" placeholder="Удобное время звонка" />
        </div>
    </div>

    <div id="call_text_div">
        <span class="call_form_name">Вопрос или комментарий</span>
        <div class="call_form_div">
            <textarea class="call_form" type="text" id="call_text" placeholder="Вопрос или комментарий"></textarea>
        </div>
    </div>

    <div id="callcons_mess"></div>
    <div id="callcons_send">Отправка...</div>
    <div id="call_order">Заказать звонок</div>
</div>

