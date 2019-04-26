<?php wp_enqueue_media();?>

<div class="wrap" >
	<div class="container">
	    <div class="row">
	        <div class="panel panel-primary">
	            <div class="panel-heading">Panel Heading</div>
	            <div class="panel-body">
	            	<form method="post" action="" onsubmit="return add_delivery_request()">
	    				<div class="col-md-4">
                			<div class="form-group">
	                			<label><?php _e('Merchant API Token', 'swifno_shipping');?></label>
	                			<input type="text" name="merchant_token" class="form-control" id="merchant_key" value="<?php echo get_option('swifno_shipping_merchant_token'); ?>">
	                		</div>
                		</div>
                		<div class="col-md-4">
                			<div class="form-group">
	                			<input type="text"  class="form-control" name="vendor_id" id="vendor_id" value="<?php echo get_option('swifno_shipping_vendor_id'); ?>" autofocus required placeholder="Merchant Key">
	                		</div>
                		</div>
                		<div class="col-md-4">
                			<div class="form-group">
	                			<select  class="form-control" name="pickup_state" id="pickup_state" required>
						            <option value="">Select Pickup State</option>
						        </select>
	                		</div>
                		</div>
	    				
                		<div class="col-md-4">
                			<div class="form-group">
	                			<input type="text" name="pickup_area" id="pickup_area" class="form-control" required placeholder="Pickup Area">
	                		</div>
                		</div>
                		
                		<div class="col-md-4">
                			<div class="form-group">
					        	<input type="text" name="pickup_location" id="pickup_location" class="form-control" required placeholder="Pickup Address">
	                		</div>
                		</div>


                		<div class="col-md-4">
                			<div class="form-group">
					        	<select onchange="showdropareaaddress()" name="drop_state" id="drop_state" required class="form-control">
						            <option value="">Select Dropoff State</option>
						        </select>
	                		</div>
                		</div>

                		<div class="col-md-4">
                			<div class="form-group">
					        	<input type="text" name="drop_area" id="drop_area" required placeholder="Dropoff Area" class="form-control">
	                		</div>
                		</div>


                		<div class="col-md-4">
                			<div class="form-group">
					        	<input type="text" name="drop_location" id="drop_location" required placeholder="Dropoff Address" class="form-control">
	                		</div>
                		</div>


                		<div class="col-md-4">
                			<div class="form-group">
					        	<input type="text" name="recepient_name" id="recepient_name" required placeholder="Recipient's Name" class="form-control">
	                		</div>
                		</div>


                		<div class="col-md-4">
                			<div class="form-group">
					        	<input type="tel" name="recepient_mobile" id="recepient_mobile" required placeholder="Recipient's Phone" class="form-control">
	                		</div>
                		</div>
				        
				    	<div class="col-md-4">
                			<div class="form-group">
					        	<input type="email" name="recepient_email" id="recepient_email" placeholder="Recipient's Email (Optional)" class="form-control">
	                		</div>
                		</div>

                		<div class="col-md-4">
                			 <div class="form-group">
					        	<input type="text" name="package_name" id="package_name" required placeholder="Package Name/Description">
	                		</div>
                		</div>

                		<div class="col-md-4">
                			<div class="form-group">
					        	<select onchange="showpackagecategory()" name="package_group" id="package_group" required class="form-control">
						            <option value="">Select Package Group</option>
						        </select>
	                		</div>
                		</div>

                		<div class="col-md-4">
                			<div class="form-group">    
						        <select name="package_category" id="package_category" required class="form-control">
						            <option value="">Select Category</option>
						        </select>
	                		</div>
                		</div>

                		<div class="col-md-4">
                			<div class="form-group">    
						        <select name="package_size" id="package_size" required class="form-control">
						            <option value="">Select Package Size</option>
						        </select>
	                		</div>
                		</div>

                		<div class="col-md-4">
                			<div class="form-group">    
						        <select name="package_deliveryspeed" id="package_deliveryspeed" required class="form-control">
						            <option value="">Select Delivery Speed</option>
						        </select>
	                		</div>
                		</div>

                		<div class="col-md-4">
                			<div class="form-group">    
						        <input type="time" name="pickupfrom_time" id="pickupfrom_time" required placeholder="Pickup From Time" class="form-control">
	                		</div>
                		</div>
				    
				        <div class="col-md-4">
                			<div class="form-group">    
						        <input type="time" name="pickupto_time" id="pickupto_time" required placeholder="Pickup To Time" class="form-control">
	                		</div>
                		</div>
				    
				       	<div class="col-md-4">
                			<div class="form-group">    
						        <input type="checkbox" name="insurance" id="insurance" onclick="showhideitemvalue()" class="form-control">  
	                		</div>
                		</div>

                		<div class="col-md-4">
                			<div class="form-group">    
						        <input type="number" name="itemvalue" id="itemvalue"  placeholder="Item Value (?)"  style="display:none" class="form-control">  
	                		</div>  
                		</div>

                		<div class="col-md-12">
                			<div class="form-group">    
						        <span id="uploadstatus" style="color:red;"></span>             
						        <button type="button" id="upload-image" >Upload  </button>                        
						        <input type="text" id="selectedfilename" placeholder="Select file for upload" />
						        <ul class="files" id="uploadfiles">
						        </ul>
						        <input type="hidden" name="image1" id="image1"/>
						        <input type="hidden" name="image2" id="image2"/>
						        <input type="hidden" name="image3" id="image3"/>
						        <input type="hidden" name="image4" id="image4"/>
						        <input type="hidden" name="image5" id="image5"/>  
	                		</div>
                		</div>

                		<div class="col-md-4">
                			 <div class="form-group">    
					        	<input type="text" name="additional_detail" id="additional_detail" required placeholder="Enter Additional Information e.g. number, weight, or special pickup/delivery considerations" class="form-control">   
	                		</div> 
                		</div> 

                		<div class="col-md-12">
                			 <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
                		</div>    	
				        
					</form>
	            </div>
	        </div>
	    </div>
	</div>
</div>