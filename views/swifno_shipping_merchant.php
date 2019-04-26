<?php
if(!get_option('swifno_shipping_merchant_token') ){
	wp_die(__('Please set your Swifno Shipping API Merchant Key', 'swifno_shipping'));
}
?>

<div class="wrap">
	<div class="container">
	    <div class="row">
	        <div class="panel panel-success">
	            <h3 class="panel-heading"><?php _e('Merchant Settings', 'swifno_shipping');?> </h3>
                        <div class="panel-body">
                                <?php
                                        if(isset($_GET['status']) && $_GET['status'] == 1){
                                                ?>
                                                <div class="alert alert-success">Option Successfully updated</div>
                                                <?php
                                        }
                                        
                                        if(!get_option('swifno_shipping_merchant_token')){
                                                ?>
                                                <div class="alert alert-danger">Please update your API Merchant Key</div>
                                                <?php
                                        }
                                ?>
                            <div class="col-md-7">
                                <form method="POST" action="admin-post.php">
                            		<input type="hidden" name="action" value="swifno_shipping_save_options">
                            		<?php wp_nonce_field('swifno_shipping_options_verify'); ?>
                            		
                            		
                            		<div class="form-group">
                            		    <label><?php _e('Package Group', 'package Group');?></label>
                            			<select name="swifno_package_group" id="package_group" class="form-control" required>
                            			    <?php
                                            if (get_option('swifno_package_group')){
                                                ?>
                                                <option value="<?php echo get_option('swifno_package_group'); ?>"><?php echo get_option('swifno_package_group'); ?></option>
                                                <?
                                            }
                                        ?>
                            			     <option value="">--- Select Package Group ----</option>
                            			</select>
                            		</div>
                            		
                            		<div class="form-group">
                            		    <label><?php _e('Package Category Name', 'Package Category Name');?></label>
                            			<select name="swifno_package_category" id="package_category" class="form-control" required>
                            			    <?php
                                            if (get_option('swifno_package_category')){
                                                ?>
                                                <option value="<?php echo get_option('swifno_package_category'); ?>"><?php echo get_option('swifno_package_category'); ?></option>
                                                <?
                                            }
                                        ?>
                            			</select>
                            		</div>
                            		
                            		<div class="form-group">
                            		    <label><?php _e('Package Size', 'Package Size');?></label>
                            			<select name="swifno_package_size" id="package_size" class="form-control" required>
                            			    <?php
                                            if (get_option('swifno_package_size')){
                                                ?>
                                                <option value="<?php echo get_option('swifno_package_size'); ?>"><?php echo get_option('swifno_package_size'); ?></option>
                                                <?
                                            }
                                        ?>
                            			</select>
                            		</div>
                            		
                            		<div class="form-group">
                            		    <label><?php _e('Package Delivery Speed');?></label>
                            			<select name="swifno_package_deliveryspeed" id="package_deliveryspeed" class="form-control" required>
                            			     <?php
                                            if (get_option('swifno_package_deliveryspeed')){
                                                ?>
                                                <option value="<?php echo get_option('swifno_package_deliveryspeed'); ?>"><?php echo get_option('swifno_package_deliveryspeed'); ?></option>
                                                <?
                                            }
                                        ?>
                            			     <option value="">--- Select Package Delivery Speed ----</option>
                            			</select>
                            		</div>
                            		
                            		<div class="form-group">
                            		    
                            		    <label><?php _e('Package Pickup From Time', 'Package Pickup From Time');?></label>
                            		    <div class="input-group pickupfrom_time">
                                            <input type="text" class="form-control" value="09:30"  name="swifno_package_pickupfrom_time">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                            		</div>
                            		
                            		<div class="form-group">
                            		    <label><?php _e('Select Package Pickup to Time', 'Select Package Pickup to Time');?></label>
                            		    
                            		    <div class="input-group pickupto_time">
                                            <input type="text" class="form-control" value="09:30"  name="swifno_package_pickupto_time">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                            		</div>
                            		
                            		<div class="form-group">
                            		    <label><?php _e('Insurance', 'Insurance');?></label>
                            			<input type="checkbox" name="insurance" id="insurance" class="form-control"> 
                            			
                            			<input type="number" class="form-control" name="swifno_item_value" id="itemvalue" class="form-control" placeholder="Item Value (?)"  style="display:none">
                            		</div>                  
                                    
                                
    
                            		<div class="form-group">
                            			<button type="submit" class="btn btn-primary"><?php _e('Update', 'swifno_shipping');?></button>
                            		</div>
                            	</form>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                        			<label><?php _e('Merchant Key');?></label>
                                    <h4>
                                        
                                    <?php 
                                        if(get_option('swifno_shipping_merchant_token')){
                                            echo get_option('swifno_shipping_merchant_token');
                                        }else{
                                            echo 'Not Available';
                                        }
                                    ?>
                                    
                                    </h4>
                        		</div>
                                <div class="form-group">
                        			<label><?php _e('Test Mode', 'swifno_test_mode');?></label>
                                    <h4>
                                        <?php 
                                        if(get_option('swifno_testing_mode')){
                                            echo get_option('swifno_testing_mode');
                                        }else{
                                            echo 'Not Available';
                                        }
                                    ?></h4>
                        		</div>
                        		<div class="form-group">
                        			<label><?php _e('Package Group', 'package_group');?></label>
                                    <h4>
                                        <?php 
                                        if(get_option('swifno_package_group')){
                                            echo get_option('swifno_package_group');
                                        }else{
                                            echo 'Not Available';
                                        }
                                    ?></h4>
                                    
                        		</div>
                        		
                        		<div class="form-group">
                        			<label><?php _e('Package Category', 'package_category');?></label>
                                     <h4>
                                        <?php 
                                        if(get_option('swifno_package_category')){
                                            echo get_option('swifno_package_category');
                                        }else{
                                            echo 'Not Available';
                                        }
                                    ?>
                                    </h4>
                        		</div>
                        		
                        		<div class="form-group">
                        			<label><?php _e('Package Size', 'package_size');?></label>
                                     <h4>
                                        <?php 
                                        if(get_option('swifno_package_size')){
                                            echo get_option('swifno_package_size');
                                        }else{
                                            echo 'Not Available';
                                        }
                                    ?>
                                    </h4>
                        		</div>
                        		
                        		<div class="form-group">
                        			<label><?php _e('Package Delivery Speed', 'package_deliveryspeed');?></label>
                        			<h4>
                                        <?php 
                                        if(get_option('swifno_package_deliveryspeed')){
                                            echo get_option('swifno_package_deliveryspeed');
                                        }else{
                                            echo 'Not Available';
                                        }
                                    ?>
                                    </h4>
                        		</div>
                        		
                        		<div class="form-group">
                        			<label><?php _e('Pickup time to', 'swifno_package_pickupfrom_time');?></label>
                        			<h4>
                                        <?php 
                                        if(get_option('swifno_package_pickupfrom_time')){
                                            echo get_option('swifno_package_pickupfrom_time');
                                        }else{
                                            echo 'Not Available';
                                        }
                                    ?>
                                    </h4>
                        		</div>
                        		
                        		<div class="form-group">
                        			<label><?php _e('Pickup time to', 'swifno_package_pickupto_time');?></label>
                        			<h4>
                                        <?php 
                                        if(get_option('swifno_package_pickupto_time')){
                                            echo get_option('swifno_package_pickupto_time');
                                        }else{
                                            echo 'Not Available';
                                        }
                                    ?>
                                    </h4>
                        		</div>
                        		
                        		<div class="form-group">
                        			<label><?php _e('Insurance', 'package_insurance');?></label>
                        			<h4>
                                        <?php 
                                        if(get_option('swifno_insurance')){
                                            echo get_option('swifno_insurance');
                                        }else{
                                            echo 'Not Available';
                                        }
                                    ?>
                                    </h4>
                        		</div
                        		
                        		<?php
                        		    if (get_option('swifno_insurance')){
                        		        ?>
                        		        <div class="form-group">
                                			<label><?php _e('Item Value', 'item_value');?></label>'
                                	<h4>
                                        <?php 
                                        if(get_option('swifno_item_value')){
                                            echo get_option('swifno_item_value');
                                        }else{
                                            echo 'Not Available';
                                        }
                                    ?>
                                    </h4>
                                </div>
                        		        <?php
                        		    }
                        		?>
                            </div>
                        	
                        </div>
	        </div>
	    </div>
	</div>
</div>

<script>
    jQuery('.pickupfrom_time').clockpicker();
    
    jQuery('.pickupto_time').clockpicker();

    var BASEURL="https://swifno.com/"; 
	var API_MODE="<?php echo get_option('swifno_testing_mode'); ?>";
	if (API_MODE == "swifno_live"){
	    //for sandbox user below url 
	    API_URL_MODE = 'swifnoapi.php';
	}else{
        //for sandbox user below url 
	     API_URL_MODE = 'sandbox/swifnoapi.php';
	}   
    var merchant_key ='<?php echo get_option('swifno_shipping_merchant_token'); ?>';
    var pickup_state_db ='<?php echo get_option('woocommerce_default_country'); ?>';
    var pickup_location ='<?php echo get_option('woocommerce_store_address') ?>';
        
        jQuery(document).on("change", "#insurance", function(){
            if (this.checked) {
                jQuery("#itemvalue").show();
                jQuery("#itemvalue").attr("required",true);
            }else{
                jQuery("#itemvalue").val("");
                jQuery("#itemvalue").hide();
                jQuery("#itemvalue").attr("required",false);
            }
        });
    
        jQuery.ajax ({
            type: "GET",
            url: BASEURL+API_URL_MODE,
            data: {"action":"package_deliveryspeed","merchant_key":merchant_key},
            crossDomain: true,
            success:function(responceData)
            {
                var data=JSON.parse(responceData);
                if(data.RESPONSECODE==1)
                {
                    var options='<option value="">Select Delivery Speed</option>';
                    jQuery.each(data.DELIVERYSPEEDLIST,function(field,value) {
                        options+='<option  value="'+value['deliveryspeed_name']+'" >'+value['deliveryspeed_name']+'</option>';
                    });
                    
                    jQuery("#package_deliveryspeed").html(options);
                }
            }
        });
        
        jQuery.ajax ({
            type: "GET",
            url: BASEURL+'swifnoapi.php',
            data: {"action":"package_size","merchant_key":merchant_key},
            crossDomain: true,
            success:function(responceData)
            {
                var data=JSON.parse(responceData);
                if(data.RESPONSECODE==1)
                {
                    var options='<option value="">Select Package Size</option>';
                    jQuery.each(data.SIZELIST,function(field,value) {
                        options+='<option  value="'+value['size_name']+'" >'+value['size_name']+'</option>';
                    });
                    
                    jQuery("#package_size").html(options);
                }
            }
        });
        
        jQuery('#package_group').change(function(){
            var group_id= jQuery(this).val();
            
            jQuery.ajax ({
                type: "GET",
                url: BASEURL+API_URL_MODE,
                data: {"action":"package_category","merchant_key":merchant_key,"group_id":group_id},
                crossDomain: true,
                success:function(responceData)
                {
                    var data=JSON.parse(responceData);
                    if(data.RESPONSECODE==1)
                    {
                        var options='<option value="">Select Category</option>';
                        jQuery.each(data.CATEGORYLIST,function(field,value) {
                            options+='<option  value="'+value['cat_name']+'" >'+value['cat_name']+'</option>';
                        });
                        jQuery("#package_category").html(options);
                    }
                }
            });
        });

    
        jQuery.ajax ({
            type: "GET",
            url: BASEURL+API_URL_MODE,
            data: {"action":"package_group","merchant_key":merchant_key},
            crossDomain: true,
            success:function(responceData)
            {
                
                var data=JSON.parse(responceData);
                if(data.RESPONSECODE==1)
                {
                    var options = '<option value="">--- Select Package Group ----</option>';
                    
                    console.log(responceData)
                    jQuery.each(data.GROUPLIST,function(field,value) {
                        options+='<option value="'+value['group_name']+'" >'+value['group_name']+'</option>';
                    });
                    
                    jQuery("#package_group").html(options);
                }
            }
        });
        
        jQuery.ajax ({
            type: "GET",
            url: BASEURL+API_URL_MODE,
            data: {"action":"package_size","merchant_key":merchant_key},
            crossDomain: true,
            success:function(responceData)
            {
                var data=JSON.parse(responceData);
                if(data.RESPONSECODE==1)
                {
                    var options='<option value="">Select Package Size</option>';
                    jQuery.each(data.SIZELIST,function(field,value) {
                        options+='<option  value="'+value['size_name']+'" >'+value['size_name']+'</option>';
                    });
                    
                    jQuery("#package_size").html(options);
                }
            }
        });
        
        jQuery.ajax ({
            type: "GET",
            url: BASEURL+API_URL_MODE,
            data: {"action":"package_deliveryspeed","merchant_key":merchant_key},
            crossDomain: true,
            success:function(responceData)
            {
                var data=JSON.parse(responceData);
                if(data.RESPONSECODE==1)
                {
                    var options='<option value="">Select Delivery Speed</option>';
                    jQuery.each(data.DELIVERYSPEEDLIST,function(field,value) {
                        options+='<option  value="'+value['deliveryspeed_name']+'" >'+value['deliveryspeed_name']+'</option>';
                    });
                    
                    jQuery("#package_deliveryspeed").html(options);
                }
            }
        });
</script>
