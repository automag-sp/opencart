<?php
    $span = floor(12/$cols);
?>
<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?>
        <a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <div class="box productdeals">
        <div class="box-heading">
            <?php foreach ($head_titles as $item): ?>
                <?php if ($item['active']): ?>
                    <a style="color: red" href="<?php echo $item['href'];?>"><?php echo $item['text'];?></a> |
                <?php else: ?>
                    <a href="<?php echo $item['href'];?>"><?php echo $item['text'];?></a> |
                <?php endif;?>
            <?php endforeach;?>
        </div>
        <div class="box-content" >
            <div class="product-filter">
                <div class="limit"><b><?php echo $this->language->get('text_limit');?></b>
                    <select onchange="location = this.value;">
                        <?php foreach ($limits as $limits) { ?>
                        <?php if ($limits['value'] == $limit) { ?>
                        <option value="<?php echo $limits['href']; ?>" selected="selected"><?php echo $limits['text']; ?></option>
                        <?php } else { ?>
                        <option value="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div><!--end limit-->
                <div class="sort"><b><?php echo $this->language->get('text_sort');?></b>
                    <select onchange="location = this.value;">
                        <?php foreach ($sorts as $sorts) { ?>
                        <?php if ($sorts['value'] == $sort . '-' . $order) { ?>
                        <option value="<?php echo $sorts['href']; ?>" selected="selected"><?php echo $sorts['text']; ?></option>
                        <?php } else { ?>
                        <option value="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div><!--end sort-->
                <div class="category"><b><?php echo $this->language->get('text_category');?></b>
                    <select name="category_id" onchange="location = this.value;">
                        <option value="<?php echo $href_default;?>"><?php echo $this->language->get("text_category_all"); ?></option>
                        <?php foreach ($categories as $category_1) { ?>
                        <?php if ($category_1['category_id'] == $category_id) { ?>
                        <option value="<?php echo $category_1['href']; ?>" selected="selected"><?php echo $category_1['name']; ?></option>
                        <?php } else { ?>
                        <option value="<?php echo $category_1['href']; ?>"><?php echo $category_1['name']; ?></option>
                        <?php } ?>
                        <?php foreach ($category_1['children'] as $category_2) { ?>
                        <?php if ($category_2['child_id'] == $category_id) { ?>
                        <option value="<?php echo $category_2['href']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
                        <?php } else { ?>
                        <option value="<?php echo $category_2['href']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
                        <?php } ?>

                        <?php if (isset($category_2['children'])) { ?>
                        <?php foreach ($category_2['children'] as $category_3) { ?>
                        <?php if ($category_3['child_id'] == $category_id) { ?>
                        <option value="<?php echo $category_3['href']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
                        <?php } else { ?>
                        <option value="<?php echo $category_3['href']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
                        <?php } ?>
                        <?php } //endforeach categories_2?>
                        <?php } //endif endforeach categories_2?>

                        <?php } //endforeach categories_1?>
                        <?php } //endforeach categories_0?>
                    </select>
                </div><!--end category-->
            </div><!--end product-filter-->
            <div class="product-lst">

                <?php if (count($products) > 0): ?>
                <div class="carousel-inner">



                        <?php foreach( $products as $i => $product ):  $i=$i+1;?>
                        <?php if( $i%$cols == 1 || $cols == 1): ?><div class="row-fluid box-product"><?php endif; ?>

                            <div class="span<?php echo $span;?> product-block">
                                <div class="product-inner">
                                    <?php if ($product['thumb']): ?>
                                    <div class="image">
                                        <?php if( $product['special'] ):  ?>
                                        <div class="product-label-special label"><?php echo $this->language->get( 'text_sale' ); ?></div>
                                        <?php endif; ?>
                                        <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a>
                                    </div>
                                    <?php endif; ?>

                                    <div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>

                                    <?php if ($product['price']): ?>
                                    <div class="price">
                                        <?php if (!$product['special']): ?>
                                        <?php echo $product['price']; ?>
                                        <?php else: ?>
                                        <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if ($product['rating']): ?>
                                    <div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
                                    <?php endif; ?>

                                    <div class="cart"><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="button" /></div>

                                    <div class="deal_detail">
                                        <ul>
                                            <li>
                                                <span><?php echo $this->language->get("text_discount");?></span>
                                                <span class="deal_detail_num"><?php echo $product['deal_discount'];?>%</span>
                                            </li>
                                            <li>
                                                <span><?php echo $this->language->get("text_you_save");?></span>
                                                <span class="deal_detail_num"><span class="price"><?php echo $product["save_price"]; ?></span></span>
                                            </li>
                                            <li>
                                                <span><?php echo $this->language->get("text_bought");?></span>
                                                <span class="deal_detail_num"><?php echo $product['bought'];?></span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="deal-qty-box">
                                        <?php echo sprintf($this->language->get("text_quantity_deal"), $product["quantity"]);?>
                                    </div>

                                    <div class="item-detail">
                                        <div class="timer-explain">(<?php echo date($this->language->get("date_format_short"), strtotime($product['date_end_string'])); ?>)</div>
                                    </div>

                                    <div id="item<?php echo $module; ?>countdown_<?php echo $product['product_id']; ?>" class="item-countdown"></div>
                                    <script type="text/javascript">
                                        jQuery(document).ready(function($){
                                            $("#item<?php echo $module; ?>countdown_<?php echo $product['product_id']; ?>").lofCountDown({
                                                formatStyle:2,
                                                TargetDate:"<?php echo date('m/d/Y G:i:s', strtotime($product['date_end_string'])); ?>",
                                                DisplayFormat:"<ul><li>%%D%% <div><?php echo $this->language->get("text_days");?></div></li><li> %%H%% <div><?php echo $this->language->get("text_hours");?></div></li><li> %%M%% <div><?php echo $this->language->get("text_minutes");?></div></li><li> %%S%% <div><?php echo $this->language->get("text_seconds");?></div></li></ul>",
                                                FinishMessage: "<?php echo $this->language->get('text_finish');?>"
                                            });
                                        });
                                    </script>

                                </div>
                            </div>

                        <?php if($i%$cols == 0): ?>
                        </div>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </div><!--end carousel-inner-->

                <?php else: ?>
                <div class="product-empty"><?php echo $this->language->get('text_not_empty');?></div>
                <?php endif; ?>




            </div><!--end product-grid-->
        </div><!--end box-content-->

        <div class="pagination"><?php echo $pagination?></div>

    </div>
    <?php echo $content_bottom; ?>
</div>
<?php echo $footer; ?>