<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
    <div class="container">
        <!--        --><?php //echo $content_top; ?>
        <div id="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                        <?php echo $breadcrumb['separator']; ?>
                        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                    <?php } ?>
                </ol>
            </div>
        </div>
        <div id="group-content">
            <h1><?php echo $heading_title; ?></h1>
            <?php
            if ($error) {
                ?>
                <div class="error"><?php
                    print $error;
                    ?></div>
                <?php
            }
            ?>

            <?php
            if ($message) {
                ?>
                <div class="message"><?php
                    print $message;
                    ?></div>
                <?php
            }
            ?>

            <?php
            if (count($form)) {
                trigger_error(var_export($form, 1));
                ?>
                <form action="<?php print $post_url; ?>" method="post">
                    <table class="vin-form">
                        <tbody>
                        <tr>
                            <td>Марка</td>
                            <td><input name="mark" size="24" type="text" value="<?php print $form['mark'] ?>"></td>
                        </tr>
                        <tr>
                            <td>VIN</td>
                            <td><input name="vin" size="24" type="text" value="<?php print $form['vin'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Необходимые запчасти</td>
                            <td><textarea name="parts" cols="24" rows="8" type="text"><?php print $form['parts'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td>E-mail для ответа<span class="required">*</span></td>
                            <td><input name="mail" size="24" type="email" value="<?php print $form['mail'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Телефон для связи<span class="required">*</span></td>
                            <td><input name="phone" size="24" type="tel" value="<?php print $form['phone'] ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input value="Отправить запрос" type="submit"></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
                <style>
                    .vin-form td {
                        text-align: right;
                        padding: 5px;
                    }

                    .vin-form td textarea,
                    .vin-form td input {
                        text-align: left;
                        width: 400px;
                    }

                    .vin-form td input[type=submit] {
                        text-align: center;
                    }
                </style>
                <?php
            }
            ?>
            <?php echo $content_bottom; ?>
        </div>
    </div>
<?php echo $footer; ?>