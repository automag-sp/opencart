<?php
/*
 * Панель администратора
 */
header("Content-type: text/html; charset=UTF-8");
require_once './config/admin_config.php';
?>
<!doctype html>
<html>
    <head>
        <title>Панель администратора callcons</title>
        <link type="text/css" rel="stylesheet" href="http://automag-sp.ru/callcons/css/admin_style.css" />
        <script type="text/javascript" src="http://automag-sp.ru/callcons/js/settings.js"></script>
        <script type="text/javascript" src="http://automag-sp.ru/callcons/js/jquery.js"></script>
        <script type="text/javascript" src="http://automag-sp.ru/callcons/js/admin_script.js"></script>
        <script type="text/javascript" src="http://automag-sp.ru/callcons/js/colorpicker.js"></script>
        <link rel="stylesheet" media="screen" type="text/css" href="http://automag-sp.ru/callcons/css/colorpicker.css" />
    </head>
    <body>
        <div id="content">
            <div id="content_head">
                <span>Панель администратора callcons</span>
                <a href="./index.php?logout=true"><div id="logout">Выйти</div></a>
            </div>

                    <?php
                        if (isset($mess_admin)) {
                            echo '<div class="admin_message"><span>'.$mess_admin.'</span></div>';
                        }
                    ?>
                
            <form action="http://automag-sp.ru/callcons/class/admin_settings.php" method="POST" id="settings_form">
                
            <div id="content_main">
                
                <div class="div_field"> <!-- Поля -->
                    
                    <div class="o_field" style="float: left;"> <!-- Поля к показу пользователю -->
                        <h3>Поля которые будут показаны</h3>
                        <label class="checkbox_div"><input type="checkbox" name="view_name" id="view_name" /><div class="checkbox_check"></div><span>Показать поле "Ваше имя"</span></label>
                        <label class="checkbox_div"><input type="checkbox" name="view_email" id="view_email" /><div class="checkbox_check"></div><span>Показать поле "Ваш e-mail"</span></label>
                        <label class="checkbox_div"><input type="checkbox" name="view_comment" id="view_comment" /><div class="checkbox_check"></div><span>Показать поле "Вопрос"</span></label>
                        <label class="checkbox_div"><input type="checkbox" name="view_time" id="view_time" /><div class="checkbox_check"></div><span>Показать поле "Время звонка"</span></label>
                    </div>

                    <div class="o_field" style="float: right;"> <!-- Обязательные поля -->
                        <h3>Обязательные поля</h3>
                        <label class="checkbox_div"><input type="checkbox" name="mand_name" id="mand_name" /><div class="checkbox_check"></div><span>"Ваше имя" обязательное поле</span></label>
                        <label class="checkbox_div"><input type="checkbox" name="mand_email" id="mand_email" /><div class="checkbox_check"></div><span>"Ваш e-mail" обязательное поле</span></label>
                        <label class="checkbox_div"><input type="checkbox" name="mand_comment" id="mand_comment" /><div class="checkbox_check"></div><span>"Вопрос" обязательное поле</span></label>
                        <label class="checkbox_div"><input type="checkbox" name="mand_time" id="mand_time" /><div class="checkbox_check"></div><span>"Время звонка" обязательное поле</span></label>
                    </div>
                </div>

                <div class="div_field"> <!-- Поля -->
                    
                    <div class="o_field" style="float: left; width: 100%"> <!-- Настрой окна -->
                        <h3>Другие настройки callcons</h3>
                        <label class="checkbox_div"><input type="checkbox" name="window_center" id="window_center" /><div class="checkbox_check"></div><span style="font-size: 17px;">Всегда показывать окно "callcons" по центру экрана</span></label>
                        <label class="checkbox_div"><input type="checkbox" name="st_button" id="st_button" /><div class="checkbox_check"></div><span style="font-size: 17px;">Показать стандартную кнопку "callcons"</span></label>
                        <label class="checkbox_div"><input type="checkbox" name="window_black" id="window_black" /><div class="checkbox_check"></div><span style="font-size: 17px;">При открытии окна фон затемняется</span></label>
                        <label class="checkbox_div"><input type="checkbox" name="view_asterisk" id="view_asterisk" /><div class="checkbox_check"></div><span style="font-size: 17px;">Показать звездочки для обязательных полей</span></label>
                    </div>

                </div>
                
                
                <div class="div_field"> <!-- Положение кнопки на сайте -->
                    <div style="float: left; text-align: center;">
                                    <div id="chat_position">
                                        <span>Выберите позицию чата на сайте</span>
                                        <div id="ok_left_center" class="position_id"></div>
                                        <div id="ok_right_center" class="position_id"></div>
                                        <div id="ok_top_center" class="position_id"></div>
                                        <div id="ok_bottom_center" class="position_id"></div>
                                        <div id="ok_bottom_right" class="position_id"></div>
                                        <div id="ok_bottom_left" class="position_id"></div>
                                        <div id="ok_top_left" class="position_id"></div>
                                        <div id="ok_top_right" class="position_id"></div>
                                    </div>
                               
                        </div>
                </div>
                
                
                <div class="div_field" style="width: 600px"> <!-- Цвет кнопки и чата -->
                            <div style="float: left; width: 280px;"><h3 class="my_h3">Цвет окна callcons</h3></div>
                            <div style="float: right; width: 280px;"><h3 class="my_h3">Цвет кнопки callcons</h3></div>
                            <div style="float: left; width: 280px; overflow: hidden; border-right: 3px solid #AAAEB0;">
                                
                                <div id="color_chat"></div>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#color_chat').ColorPicker({flat: true, color: '#0000ff', 
                                            onChange: function (hsb, hex, rgb) { //Выполняется непосредственно после выбора
                                                $('#ok_consultant').css('background-color', '#'+hex);
                                                $('#color_chat_h').val('#'+hex);
                                            }
                                        });
                                    });
                                </script>
                            </div>
                            
                            <div style="float: right; width: 280px; overflow: hidden; border-right: 3px solid #AAAEB0;">
                                
                                <div id="color_chat_button"></div>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#color_chat_button').ColorPicker({flat: true, color: '#ff0000', 
                                            onChange: function (hsb, hex, rgb) { //Выполняется непосредственно после выбора
                                                $('#ok_button').css('background-color', '#'+hex);
                                                $('#color_button_h').val('#'+hex);
                                            }
                                        });
                                    });
                                </script>
                            </div>
                </div>
                
                <div class="div_field"> <!-- Данные для администратора -->
                    
                    <div style="float: left; height: 30px; margin-top: 20px;">Настройка текстов callcons</div>
                    <div class="add_operator_line">
            <div class="add_operator_line_left">Заголовок окна:</div>
            <div class="add_operator_line_right"><input type="text" style="width:220px; height: 20px; padding: 4px; font-size: 16px;" name="call_text" id="call_text" value=""></div>
                    </div>

                    <div class="add_operator_line">
            <div class="add_operator_line_left">Надпись на кнопке:</div>
            <div class="add_operator_line_right"><input type="text" style="width:220px; height: 20px; padding: 4px; font-size: 16px;" name="call_b_text" id="call_b_text" value=""></div>
                    </div>

                    <div style="float: left; height: 30px; margin-top: 20px;">Данные администратора</div>


                    <div class="add_operator_line">
			<div class="add_operator_line_left">Адрес электронной почты:</div>
			<div class="add_operator_line_right"><input type="text" style="width:220px; height: 20px; padding: 4px; font-size: 16px;" name="admin_email" value="<?php echo OFFLINE_EMAIL ?>"></div>
                    </div>
                    
                    <div class="add_operator_line">
			<div class="add_operator_line_left">Логин администратора:</div>
			<div class="add_operator_line_right"><input type="text" style="width:220px; height: 20px; padding: 4px; font-size: 16px;" name="admin_login" value="<?php echo ADMIN_LOGIN ?>"></div>
                    </div>
                    <div class="add_operator_line">
			<div class="add_operator_line_left">Пароль администратора:</div>
			<div class="add_operator_line_right"><input type="text" style="width:220px; height: 20px; padding: 4px; font-size: 16px;" name="admin_password" value="<?php echo ADMIN_PASSWORD ?>"></div>
                    </div>
                    
                    
                </div>
                <div class="save_settings">Сохранить настройки</div>
            </div>
            
                
                <input type="hidden" value="" id="chat_position_h" name="chat_position" />
                <input type="hidden" value="#f00" id="color_chat_h" name="chat_color" />
                <input type="hidden" value="#00f" id="color_button_h" name="button_color" />
            </form>
            
        </div>
    </body>
</html>