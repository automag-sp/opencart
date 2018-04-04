<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); ?>
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
		<h1><?php echo $heading_title; ?></h1>
		
		<div class="wrapper">
			<p><?php echo $text_balance; ?><b> <?php echo $balance; ?></b>.</p>
			<table class="list">
				<thead>
					<tr>
						<td class="left"><?php echo $column_date_added; ?></td>
						<td class="left"><?php echo $column_description; ?></td>
						<td class="right"><?php echo $column_amount; ?></td>
					</tr>
				</thead>
				<tbody>
					<?php if ($transactions) { ?>
					<?php foreach ($transactions  as $transaction) { ?>
					<tr>
						<td class="left"><?php echo $transaction['date_added']; ?></td>
						<td class="left"><?php echo $transaction['description']; ?></td>
						<td class="right"><?php echo $transaction['amount']; ?></td>
					</tr>
					<?php } ?>
					<?php } else { ?>
					<tr>
						<td class="center" colspan="5"><?php echo $text_empty; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>		
		</div>
		
		<div class="pagination paging clearfix"><?php echo $pagination; ?></div>
		<div class="buttons">
			<div class="right"><a href="<?php echo $continue; ?>" class="button btn btn-theme-default"><?php echo $button_continue; ?></a></div>
		</div>
  
		<?php echo $content_bottom; ?>
	</div>
</section> 

<?php if( $SPAN[2] ): ?>
<aside class="col-lg-<?php echo $SPAN[2];?> col-md-<?php echo $SPAN[2];?> col-sm-12 col-xs-12">	
	<?php echo $column_right; ?>
</aside>
<?php endif; ?>

</div></div>

<?php echo $footer; ?>