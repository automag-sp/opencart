<?php require(DIR_TEMPLATE . $this->config->get('config_template') . "/template/common/config.tpl");
$themeConfig = $this->config->get('themecontrol');

$categoryConfig     = array(
  'listing_products_columns'           => 0,
  'listing_products_columns_small'     => 2,
  'listing_products_columns_minismall' => 1,
  'cateogry_display_mode'              => 'grid',
  'category_pzoom'                     => 1,
  'quickview'                          => 0,
  'show_swap_image'                    => 0,
);
$categoryConfig     = array_merge($categoryConfig, $themeConfig);
$DISPLAY_MODE       = $categoryConfig['cateogry_display_mode'];
$MAX_ITEM_ROW       = $themeConfig['listing_products_columns'] ? $themeConfig['listing_products_columns'] : 4;
$MAX_ITEM_ROW_SMALL = $categoryConfig['listing_products_columns_small'];
$MAX_ITEM_ROW_MINI  = $categoryConfig['listing_products_columns_minismall'];
$categoryPzoom      = $categoryConfig['category_pzoom'];
$quickview          = $categoryConfig['quickview'];
$swapimg            = $categoryConfig['show_swap_image'];
$found_count        = 0;
?>
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
            <h1 class="heading_title">
              <?php
              if (file_exists(DIR_IMAGE . 'data/general/types/' . strtolower(str_replace(' ', '_', $saleepc['manufacturer']['MFA_BRAND'])) . '/' . $saleepc['model']['MOD_ID'] . '.png')) {
                ?>
                  <img src="/image/data/general/types/<?= strtolower(str_replace(' ', '_', $saleepc['manufacturer']['MFA_BRAND'])) ?>/<?= $saleepc['model']['MOD_ID'] ?>.png" style="padding-right: 20px;"/>
                <?php
              }
              ?>
                <span><?php echo $heading_title; ?></span></h1>
          <?php
          if (!empty($add_car_text)) {
            ?>
              <a href="<?php print $add_car_link;?>" class="button"><?php print $add_car_text; ?></a>
            <?php
          }
          ?>
            <div class="tabs-group">


                <div id="tab-to" class="tab-content">
                    <table class="list tech111" style="margin: 0">
                      <?
                      $needs_parts = array('Свеча накаливания', 'Фильтр воздушный', 'Фильтр масляный', 'Фильтр салона');
                      foreach ($saleepc['TO'] as $row) {
                        if (in_array($row['PART_NAME'], $needs_parts)) {
                          $found_count++;
                          echo '<tr><td>' . $row['PART_NAME'] . '</td><td>' . $row['KOL'] . '</td><td>' . $row['DOP_IFO'] . '</td><td><a href="/index.php?route=product/search&search=' . $row['XLINK2'] . '">Найти</a></td>';
                        }
                      }
                      ?>
                    </table>
                  <?

                  ?>
                </div>

                <div id="tab-oil" class="tab-content" style="margin: 0">
                  <?php
                  foreach ($saleepc['lbrs'] as $lbr_system_id => $models) {
                    foreach ($models['models'] as $model) {
                      echo '<h2>' . $model['DESCRIPTION'] . ' ' . $model['ENGINECODE'] . '(' . $model['BUILD_FROM'] . '-' . $model['BUILD_TO'] . ') ' . $model['CAPACITY'] . 'ccm ' . $model['OUTPUT'] . 'kW</h2>';
                    }
                    echo '<b>Масла и жидкости для: ' . $saleepc['lbrs'][$lbr_system_id]['SYSTEM']['LBR_SYST_DESCRIPTION'] . '</b><br /><br />';
                    ?>
                      <table class="list">
                          <tbody>
                          <?php
                          foreach ($saleepc['lbrs'][$lbr_system_id]['LUB'] as $lub) {
                            if ('Engine' != $lub['NAME']['LBR_SENT_TEXT']) {
                              continue;
                            }
//                            echo '<thead><tr bgcolor="#ccc"><td colspan=4>' . $lub['NAME']['LBR_SENT_TEXT'] . '</td></tr></thead>';
                            foreach ($lub['ITEMS'] as $itm) {
                              if ($itm['LBR_LUBR_TEXT'] == 'Motor oil') {
                                $found_count++;
                                echo '<tr><td>Масло моторное</td><td>' . $itm['LBR_QLTY_TEXT'] . '</td><td>' . $itm['LBR_TMP_TEXT'] . '</td><td>' . $itm['LBR_VSC_TEXT'] . '</td></tr>';
                              }
                            }
                          }
                          ?>
                          </tbody>
                      </table>
                    <?php
                  }
                  ?>
                </div>

            </div>

          <?php
          if(!$found_count){
            ?>
              <h2>Ничего не найдено</h2>
            <?php
          }
          ?>
        </div>


  <?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
    $('#tabs a').tabs();
    //--></script>
</section>
<?php if ($SPAN[2]): ?>
    <aside class="col-lg-<?php echo $SPAN[2]; ?> col-md-<?php echo $SPAN[2]; ?> col-sm-12 col-xs-12">
      <?php echo $column_right; ?>
    </aside>
<?php endif; ?>
</div>

<?php echo $footer; ?>


<?
function dt($dt) {
  return ($dt ? substr($dt, 4, 2) . '/' . substr($dt, 0, 4) : 'Настоящее время');
}

?>
