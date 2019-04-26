<div class="container">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">Merchant Key Details</div>
                <div class="panel-body">
                    <?php
                            if(isset($_GET['status']) && $_GET['status'] == 1){
                                    ?>
                                    <div class="alert alert-success">Merchant Setting Successfully updated</div>
                                    <?php
                            }if(isset($_GET['status']) && $_GET['status'] == 0){
                                    ?>
                                    <div class="alert alert-danger">Invalid merchant key please contact your shipping merchant provider</div>
                                    <?php
                            }
                    ?>
                            <div class="col-md-7">
                                <form method="POST" action="admin-post.php">
                            		<input type="hidden" name="action" value="swifno_shipping_save_merchant_key">
                            		<?php wp_nonce_field('swifno_shipping_save_merchant_verify'); ?>
                            		<div class="form-group">
                            			<label><?php _e('Merchant API Token', 'swifno_shipping');?></label>
    
                            			<input type="text" name="merchant_token" class="form-control" value="<?php echo get_option('swifno_shipping_merchant_token'); ?>" required>
                            		</div>
    
                            		<div class="form-group">
                            			<label><?php _e('Test Mode', 'swifno_test_mode');?></label>
                                        <select name="swifno_testing_mode" class="form-control" required>
                                            <option value="">--- Select API Mode ----</option>
                                            <option value="swifno_sandbox">API Test Mode</option>
                                            <option value="swifno_live">API Live Mode</option>
                                        </select>
                            		</div>
                            		
                            		
    
                            		<div class="form-group">
                            			<button type="submit" class="btn btn-primary"><?php _e('Update', 'swifno_shipping');?></button>
                            		</div>
                            	</form>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                        			<label><?php _e('Merchant Key');?></label>
                                    <h4><?php echo get_option('swifno_shipping_merchant_token'); ?></h4>
                        		</div>
                                <div class="form-group">
                        			<label><?php _e('Test Mode', 'swifno_test_mode');?></label>
                                    <h4><?php echo get_option('swifno_testing_mode'); ?></h4>
                        		</div>
                        		
                            </div>
                        	
                        </div>
                </div>   
        </div>
    </div>
</div>