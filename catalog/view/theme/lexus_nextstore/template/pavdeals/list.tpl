<?php
require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); 
$span = floor(12/$cols);

$categoryConfig = array( 		
	'category_pzoom'       => 1,
);

$categoryPzoom 	= $categoryConfig['category_pzoom'];  	
?>

<?php echo $header; ?>
<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" );  ?>

<div class="container">
	<div class="row">
		<?php if( $SPAN[0] ): ?>
			<aside class="col-lg-<?php echo $SPAN[0];?> col-md-<?php echo $SPAN[0];?> col-sm-12 col-xs-12">
				<?php echo $column_left; ?>
			</aside>	
		<?php endif; ?>	

		<section class="col-lg-<?php echo $SPAN[1];?> col-md-<?php echo $SPAN[1];?> col-sm-12 col-xs-12">
			<div id="content">
				<?php echo $content_top; ?>
				<div class="box productdeals list-deals">
					<ul class="box-heading nav nav-tabs">
						<?php foreach ($head_titles as $item): ?>
							<?php if ($item['active']): ?>
								<li class="active"><a href="<?php echo $item['href'];?>"><?php echo $item['text'];?></a></li>
							<?php else: ?>
								<li><a href="<?php echo $item['href'];?>"><?php echo $item['text'];?></a></li>
							<?php endif;?>
						<?php endforeach;?>
					</ul>			

					<div class="box-content">
						<div class="product-filter clearfix">
							<div class="limit">
								<b><?php echo $this->language->get('text_limit');?></b>
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
							<div class="sort">
								<b><?php echo $this->language->get('text_sort');?></b>
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
							<div class="category">
								<b><?php echo $this->language->get('text_category');?></b>
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



						<div class="product-grid">
							<?php if (count($products) > 0): ?>
								<?php foreach( $products as $i => $product ):  $i=$i+1;?>
									<?php if( $i%$cols == 1 || $cols == 1): ?>
										<div class="row">
										<?php endif; ?>
										<div class="col-lg-<?php echo $span;?> col-md-<?php echo $span;?> col-sm-4 col-xs-6">
											<div class="product-block">
												<?php if ($product['thumb']): ?>
													<div class="image">
														<?php if( $product['special'] ):  ?>
															<span class="product-label product-label-special">
																<span><?php echo $this->language->get( 'text_sale' ); ?></span>
															</span>
														<?php endif; ?>
														<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a>
														<?php if( $categoryPzoom ) { $zimage = str_replace( "cache/","", preg_replace("#-\d+x\d+#", "",  $product['thumb'] ));  ?>
														<a href="<?php echo $zimage;?>" class="info-view colorbox product-zoom" rel="colorbox" title="<?php echo $product['name']; ?>"><i class="fa fa-search-plus"></i></a>
														<?php } ?>									
													</div>
												<?php endif; ?>

												<div class="product-meta">
													<h3 class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h3>
													<div class="rating">
														<?php if ($product['rating']): ?>
															<img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" />
														<?php endif; ?>
													</div>
													<?php if ($product['price']): ?>
														<div class="price">
															<?php if (!$product['special']): ?>
																<?php echo $product['price']; ?>
															<?php else: ?>
																<span class="price-old"><?php echo $product['price']; ?></span> 
																<span class="price-new"><?php echo $product['special']; ?></span>
															<?php endif; ?>
														</div>
													<?php endif; ?>													

													<div class="group-deals">
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
														<div class="deal-collection">
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
																		<span> <?php echo $this->language->get("text_bought");?> </span>
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
														</div>
													</div>
													
													<div class="action">							
														<div class="cart">						
							        						<!-- <input type="button" value="<?php //echo $button_cart; ?>" onclick="addToCart('<?php //echo $product['product_id']; ?>');" class="product-icon fa fa-shopping-cart shopping-cart" /> -->
															<button onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btn btn-shopping-cart">
																<span class="fa fa-shopping-cart product-icon hidden-sm hidden-md">&nbsp;</span>
																<span><?php echo $button_cart; ?></span>
															</button>
							      						</div>
														<div class="button-group">
															<div class="wishlist">
																<a onclick="addToWishList('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_wishlist"); ?>" class="fa fa-heart product-icon">
																	<?php // echo $this->language->get("button_wishlist"); ?>
																</a>	
															</div>
															<div class="compare">			
																<a onclick="addToCompare('<?php echo $product['product_id']; ?>');" title="<?php echo $this->language->get("button_compare"); ?>" class="fa fa-refresh product-icon">
																	<?php // echo $this->language->get("button_compare"); ?>
																</a>	
															</div>
														</div>														
													</div>
												</div>
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

				<div class="pagination paging clearfix"><?php echo $pagination?></div>
			</div>
			<?php echo $content_bottom; ?>

		</section>

		<?php if( $categoryPzoom ) {  ?>
		<script type="text/javascript">
			<!--
			$(document).ready(function() {
				$('.colorbox').colorbox({
					overlayClose: true,
					opacity: 0.5,
					rel: false,
					onLoad:function(){
						$("#cboxNext").remove(0);
						$("#cboxPrevious").remove(0);
						$("#cboxCurrent").remove(0);
					}
				});	 
			});
//-->
</script>
<?php } ?>

<?php if( $SPAN[2] ): ?>
	<aside class="col-lg-<?php echo $SPAN[2];?> col-md-<?php echo $SPAN[2];?> col-sm-12 col-xs-12">	
		<?php echo $column_right; ?>
	</aside>
<?php endif; ?>

</div></div>

<?php echo $footer; ?>