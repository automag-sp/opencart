<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/config.tpl" ); ?>
<?php echo $header; ?>
<?php require( DIR_TEMPLATE.$this->config->get('config_template')."/template/common/breadcrumb.tpl" );  ?>

<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>

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
                <?php echo $text_description; ?>
            </div>

            
            <div class="wrapper no-margin">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <h2><?php echo $text_order; ?></h2>
                    <div class="content">
                        <div class="row">                        
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label> <span class="required">*</span> <?php echo $entry_firstname; ?> </label>
                                    <input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control" /> 
                                    <?php if ($error_firstname) { ?>
                                    <span class="error"><?php echo $error_firstname; ?></span>
                                    <?php } ?>
                                </div>   
                                <div class="form-group">
                                    <label> <span class="required">*</span> <?php echo $entry_lastname; ?> </label>
                                    <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control" />
                                     <?php if ($error_lastname) { ?>
                                    <span class="error"><?php echo $error_lastname; ?></span>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label><span class="required">*</span> <?php echo $entry_email; ?></label>
                                    <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" />
                                    <?php if ($error_email) { ?>
                                    <span class="error"><?php echo $error_email; ?></span>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label><span class="required">*</span> <?php echo $entry_telephone; ?></label>
                                    <input type="text" name="telephone" value="<?php echo $telephone; ?>" class="form-control" />
                                    <?php if ($error_telephone) { ?>
                                    <span class="error"><?php echo $error_telephone; ?></span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><span class="required">*</span> <?php echo $entry_order_id; ?></label>
                                    <input type="text" name="order_id" value="<?php echo $order_id; ?>" class="form-control" />
                                    <?php if ($error_order_id) { ?>
                                    <span class="error"><?php echo $error_order_id; ?></span>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo $entry_date_ordered; ?></label>
                                    <input type="text" name="date_ordered" value="<?php echo $date_ordered; ?>" class="date form-control" />
                                </div>
                            </div>
                        </div>
                    </div>


                    <h2><?php echo $text_product; ?></h2>
                    <div id="return-product">
                        <div class="content">
                            <div class="return-product">
                                <div class="row">                                        
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="return-name form-group">
                                            <label><span class="required">*</span> <b><?php echo $entry_product; ?></b></label>
                                            <input type="text" name="product" value="<?php echo $product; ?>" class="form-control" />
                                            <?php if ($error_product) { ?>
                                            <span class="error"><?php echo $error_product; ?></span>
                                            <?php } ?>                                             
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                         <div class="return-model">
                                            <label><span class="required">*</span> <b><?php echo $entry_model; ?></b></label>
                                            <input type="text" name="model" value="<?php echo $model; ?>" class="form-control" />                                                
                                            <?php if ($error_model) { ?>
                                            <span class="error"><?php echo $error_model; ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="return-quantity">
                                            <label><b><?php echo $entry_quantity; ?></b></label>
                                            <input type="text" name="quantity" value="<?php echo $quantity; ?>" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="return-detail">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="return-reason">
                                            <p><span class="required">*</span> <b><?php echo $entry_reason; ?></b></p>    
                                            <table>
                                                <?php foreach ($return_reasons as $return_reason) { ?>
                                                <?php if ($return_reason['return_reason_id'] == $return_reason_id) { ?>
                                                <tr>
                                                    <td>
                                                        <div class="radio">
                                                            <label for="return-reason-id<?php echo $return_reason['return_reason_id']; ?>">
                                                                <input type="radio" name="return_reason_id" value="<?php echo $return_reason['return_reason_id']; ?>" id="return-reason-id<?php echo $return_reason['return_reason_id']; ?>" checked="checked" />
                                                                <?php echo $return_reason['name']; ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } else { ?>
                                                <tr>                                                  
                                                    <td>
                                                        <div class="radio">
                                                            <label for="return-reason-id<?php echo $return_reason['return_reason_id']; ?>">
                                                                <input type="radio" name="return_reason_id" value="<?php echo $return_reason['return_reason_id']; ?>" id="return-reason-id<?php echo $return_reason['return_reason_id']; ?>" />
                                                                <?php echo $return_reason['name']; ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php  } ?>
                                                <?php  } ?>
                                            </table>
                                            <?php if ($error_reason) { ?>
                                            <span class="error"><?php echo $error_reason; ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="return-opened">
                                            <p><b><?php echo $entry_opened; ?></b></p>
                                            <?php if ($opened) { ?>
                                            <input type="radio" name="opened" value="1" id="opened" checked="checked" />
                                            <?php } else { ?>
                                            <input type="radio" name="opened" value="1" id="opened" />
                                            <?php } ?>
                                            <label for="opened"><?php echo $text_yes; ?></label>
                                            <?php if (!$opened) { ?>
                                            <input type="radio" name="opened" value="0" id="unopened" checked="checked" />
                                            <?php } else { ?>
                                            <input type="radio" name="opened" value="0" id="unopened" />
                                            <?php } ?>
                                            <label for="unopened"><?php echo $text_no; ?></label>                                        
                                            <p><?php echo $entry_fault_detail; ?></p>
                                            <textarea name="comment" cols="150" rows="6" class="form-control"><?php echo $comment; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="return-captcha">
                                        <p><b><?php echo $entry_captcha; ?></b></p>
                                        <input type="text" name="captcha" value="<?php echo $captcha; ?>" class="form-control" />
                                        <br>
                                        <img src="index.php?route=account/return/captcha" alt="" />                            
                                        <?php if ($error_captcha) { ?>
                                        <span class="error"><?php echo $error_captcha; ?></span>
                                        <?php } ?>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php if ($text_agree) { ?>
                    <div class="buttons">
                        <div class="left"><a href="<?php echo $back; ?>" class="button btn btn-theme-default"><?php echo $button_back; ?></a></div>
                        <div class="right">
                            <?php echo $text_agree; ?>
                            <?php if ($agree) { ?>
                            <input type="checkbox" name="agree" value="1" checked="checked" />
                            <?php } else { ?>
                            <input type="checkbox" name="agree" value="1" />
                            <?php } ?>
                            <input type="submit" value="<?php echo $button_continue; ?>" class="button btn btn-theme-default" />
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="buttons">
                        <div class="left"><a href="<?php echo $back; ?>" class="button btn btn-theme-default"><?php echo $button_back; ?></a></div>
                        <div class="right">
                            <input type="submit" value="<?php echo $button_continue; ?>" class="button btn btn-theme-default" />
                        </div>
                    </div>
                    <?php } ?>
                </form>
            </div>

        <?php echo $content_bottom; ?>

        </div>

    </section>    

<script type="text/javascript">
<!--
$(document).ready(function() {
  $('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//-->
</script> 

<?php if( $SPAN[2] ): ?>
<aside class="col-lg-<?php echo $SPAN[2];?> col-md-<?php echo $SPAN[2];?> col-sm-12 col-xs-12"> 
    <?php echo $column_right; ?>
</aside>
<?php endif; ?>

</div></div>

<?php echo $footer; ?>