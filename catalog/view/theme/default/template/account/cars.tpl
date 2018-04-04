<?php require(DIR_TEMPLATE . $this->config->get('config_template') . "/template/common/config.tpl"); ?>
<?php echo $header; ?>
<?php require(DIR_TEMPLATE . $this->config->get('config_template') . "/template/common/breadcrumb.tpl"); ?>

    <div id="group-content">
      <?php if ($SPAN[0]): ?>
          <aside class="col-lg-<?php echo $SPAN[0]; ?> col-md-<?php echo $SPAN[0]; ?> col-sm-12 col-xs-12">
            <?php echo $column_left; ?>
          </aside>
      <?php endif; ?>
        <section class="col-lg-<?php echo $SPAN[1]; ?> col-md-<?php echo $SPAN[1]; ?> col-sm-12 col-xs-12">
            <div id="content"><?php echo $content_top; ?>

                <div class="box">
                    <div class="box-heading">
                        <span><?php echo $heading_title; ?></span>
                    </div>
                    <div class="box-content">
                        <ul>
                          <?php if ($logged) {
                          if (count($cars)) {
                          ?>
                            <table id="cars_list" class="list">
                                <tr>
                                    <th>#</th>
                                    <th>Добавлено</th>
                                    <th>Марка</th>
                                    <th>Модель</th>
                                    <th>Модификация</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                              <?php
                              foreach ($cars as $car) {
                                print <<<HTML
  
                                <tr id="my_car_$car[car_id]">
                                    <td><a target="_blank" href="$car[view]">$car[npp]</a></td>
                                    <td><a title="Информация"target="_blank" href="$car[view]">$car[date_created]</a></td>
                                    <td><a title="Информация"target="_blank" href="$car[view]">$car[mark_name]</a></td>
                                    <td><a title="Информация"target="_blank" href="$car[view]">$car[model_name]</a></td>
                                    <td><a title="Информация"target="_blank" href="$car[view]">$car[modification_name]</a></td>
                                    <td><a class="bt-ajx" title="Удалить из гаража" href="$car[del]"><span class="fa fa-remove fa-1"></span></a></td>                                    
                                    <td><a title="Информация"target="_blank" href="$car[view]"><span class="fa fa-table fa-1"></span></a></td>                                    
                                </tr>

HTML;

                              }
                              print '</table>';
                              }
                              else {
                                ?>
                                  <h2>Нет автомобилей в гараже</h2>
                                <?php
                              }
                              }
                              ?>
                        </ul>
                    </div>
                </div>
              <?php echo $content_bottom; ?></div>
        </section>
      <?php if ($SPAN[2]): ?>
          <aside class="col-lg-<?php echo $SPAN[2]; ?> col-md-<?php echo $SPAN[2]; ?> col-sm-12 col-xs-12">
            <?php echo $column_right; ?>
          </aside>
      <?php endif; ?>
    </div>
<?php echo $footer; ?>