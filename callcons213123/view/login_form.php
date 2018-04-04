<?php
 header("Content-type: text/html; charset=UTF-8"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Форма для входа в систему</title>
        <link type="text/css" rel="stylesheet" href="http://automag-sp.ru/callcons/css/form_style.css" />
    </head>
    <body>
        <div id="content">
            <?php if(!empty($message)) echo "<h3>{$message}</h3><br />"; ?>
            
            <form class="form_style" action="http://automag-sp.ru/callcons/index.php" method="post" id="login_admin">
                <div class="operator_or_admin"><h2>Вход для администратора</h2></div>
                <div class="field">
                        <label>Логин администратора:</label>
                        <div class="input"><input type="text" name="admin_login" /></div>
                </div>

                <div class="field">
                        <label>Пароль администратора:</label>
                        <div class="input"><input type="password" name="admin_password" /></div>
                </div>

                <div class="submit">
                        <button type="submit" name="admin">Войти</button>
                        <label id="remember"><input name="" type="checkbox" value="" /> Запомнить меня</label>
                </div>

            </form>

        </div>
    </body>
</html>