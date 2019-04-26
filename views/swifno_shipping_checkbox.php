<!--<div id="swifno_service_checkbox">-->
<!--    <h3>Use Swifno shipping:</h3> -->
<!--    <input type="checkbox" name="swifno_shipping_service" class="swifno_shipping" id="swifno_shipping_service"></h3>-->
<!--</div>-->

<script>
    jQuery("#billing_country").change(function () {
    var country = this.value;
    if (country == 'NG'){
    	jQuery('#swifno_service_checkbox').show();
	    jQuery(document).on("change", "#swifno_shipping_service", function(){
            if (this.checked) {
                alert('You are currently using swifno as a shipping Service');
                request_all_bids();
            }else{
                alert('You have removed swifno as a shipping Service');
            }
        });
    }else{
    	jQuery('#swifno_service_checkbox').hide();
    }
});

function request_all_bids()
{
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
    
     if(pickup_state_db == 'NG:AB'){
    	var pickup_state = 'Abia';
    }
    if(pickup_state_db == 'NG:FC'){
    	var pickup_state = 'Abuja';
    }
    if(pickup_state_db == 'NG:AD'){
    	var pickup_state = 'Adamawa';
    }
    if(pickup_state_db == 'NG:AK'){
    	var pickup_state = 'Akwa Ibom';
    }
    if(pickup_state_db == 'NG:AN'){
    	var pickup_state = 'Anambra';
    }
    if(pickup_state_db == 'NG:BA'){
    	var pickup_state = 'Bauchi';
    }
    if(pickup_state_db == 'NG:BY'){
    	var pickup_state = 'Bayelsa';
    }
    if(pickup_state_db == 'NG:BE'){
    	var pickup_state = 'Benue';
    }
    if(pickup_state_db == 'NG:BO'){
    	var pickup_state = 'Borno';
    }
    if(pickup_state_db == 'NG:CR'){
    	var pickup_state = 'Cross River';
    }
    if(pickup_state_db == 'NG:DE'){
    	var pickup_state = 'Delta';
    }
    if(pickup_state_db == 'NG:EB'){
    	var pickup_state = 'Ebonyi';
    }
    if(pickup_state_db == 'NG:ED'){
    	var pickup_state = 'Edo';
    }
    if(pickup_state_db == 'NG:EK'){
    	var pickup_state = 'Ekiti';
    }
    if(pickup_state_db == 'NG:EN'){
    	var pickup_state = 'Enugu';
    }
    if(pickup_state_db == 'NG:GO'){
    	var pickup_state = 'Gombe';
    }
    if(pickup_state_db == 'NG:IM'){
    	var pickup_state = 'Imo';
    }
    if(pickup_state_db == 'NG:JI'){
    	var pickup_state = 'Jigawa';
    }
    if(pickup_state_db == 'NG:KD'){
    	var pickup_state = 'Kaduna';
    }
    if(pickup_state_db == 'NG:KN'){
    	var pickup_state = 'Kano';
    }
    if(pickup_state_db == 'NG:KT'){
    	var pickup_state = 'Katsina';
    }
    if(pickup_state_db == 'NG:KE'){
    	var pickup_state = 'Kebbi';
    }
    if(pickup_state_db == 'NG:KO'){
    	var pickup_state = 'Kogi';
    }
    if(pickup_state_db == 'NG:KW'){
    	var pickup_state = 'Kwara';
    }
    if(pickup_state_db == 'NG:LA'){
    	var pickup_state = 'Lagos';
    }
    if(pickup_state_db == 'NG:NA'){
    	var pickup_state = 'Nasarawa';
    }
    if(pickup_state_db == 'NG:NI'){
    	var pickup_state = 'Niger';
    }
    if(pickup_state_db == 'NG:OG'){
    	var pickup_state = 'Ogun';
    }
    if(pickup_state_db == 'NG:ON'){
    	var pickup_state = 'Ondo';
    }
    if(pickup_state_db == 'NG:OS'){
    	var pickup_state = 'Osun';
    }
    if(pickup_state_db == 'NG:OY'){
    	var pickup_state = 'Oyo';
    }
    if(pickup_state_db == 'NG:PL'){
    	var pickup_state = 'Plateau';
    }
    if(pickup_state_db == 'NG:RI'){
    	var pickup_state = 'Rivers';
    }
    if(pickup_state_db == 'NG:SO'){
    	var pickup_state = 'Sokoto';
    }
    if(pickup_state_db == 'NG:TA'){
    	var pickup_state = 'Taraba';
    }
    if(pickup_state_db == 'NG:YO'){
    	var pickup_state = 'Yobe';
    }
    if(pickup_state_db == 'NG:ZA'){
    	var pickup_state = 'Zamfara';
    }

    if(jQuery("#shipping_state").val() == 'AB'){
    	var drop_state = 'Abia';
    }
    if(jQuery("#shipping_state").val() == 'FC'){
    	var drop_state = 'Abuja';
    }
    if(jQuery("#shipping_state").val() == 'AD'){
    	var drop_state = 'Adamawa';
    }
    if(jQuery("#shipping_state").val() == 'AK'){
    	var drop_state = 'Akwa Ibom';
    }
    if(jQuery("#shipping_state").val() == 'AN'){
    	var drop_state = 'Anambra';
    }
    if(jQuery("#shipping_state").val() == 'BA'){
    	var drop_state = 'Bauchi';
    }
    if(jQuery("#shipping_state").val() == 'BY'){
    	var drop_state = 'Bayelsa';
    }
    if(jQuery("#shipping_state").val() == 'BE'){
    	var drop_state = 'Benue';
    }
    if(jQuery("#shipping_state").val() == 'BO'){
    	var drop_state = 'Borno';
    }
    if(jQuery("#shipping_state").val() == 'CR'){
    	var drop_state = 'Cross River';
    }
    if(jQuery("#shipping_state").val() == 'DE'){
    	var drop_state = 'Delta';
    }
    if(jQuery("#shipping_state").val() == 'EB'){
    	var drop_state = 'Ebonyi';
    }
    if(jQuery("#shipping_state").val() == 'ED'){
    	var drop_state = 'Edo';
    }
    if(jQuery("#shipping_state").val() == 'EK'){
    	var drop_state = 'Ekiti';
    }
    if(jQuery("#shipping_state").val() == 'EN'){
    	var drop_state = 'Enugu';
    }
    if(jQuery("#shipping_state").val() == 'GO'){
    	var drop_state = 'Gombe';
    }
    if(jQuery("#shipping_state").val() == 'IM'){
    	var drop_state = 'Imo';
    }
    if(jQuery("#shipping_state").val() == 'JI'){
    	var drop_state = 'Jigawa';
    }
    if(jQuery("#shipping_state").val() == 'KD'){
    	var drop_state = 'Kaduna';
    }
    if(jQuery("#shipping_state").val() == 'KN'){
    	var drop_state = 'Kano';
    }
    if(jQuery("#shipping_state").val() == 'KT'){
    	var drop_state = 'Katsina';
    }
    if(jQuery("#shipping_state").val() == 'KE'){
    	var drop_state = 'Kebbi';
    }
    if(jQuery("#shipping_state").val() == 'KO'){
    	var drop_state = 'Kogi';
    }
    if(jQuery("#shipping_state").val() == 'KW'){
    	var drop_state = 'Kwara';
    }
    if(jQuery("#shipping_state").val() == 'LA'){
    	var drop_state = 'Lagos';
    }
    if(jQuery("#shipping_state").val() == 'NA'){
    	var drop_state = 'Nasarawa';
    }
    if(jQuery("#shipping_state").val() == 'NI'){
    	var drop_state = 'Niger';
    }
    if(jQuery("#shipping_state").val() == 'OG'){
    	var drop_state = 'Ogun';
    }
    if(jQuery("#shipping_state").val() == 'ON'){
    	var drop_state = 'Ondo';
    }
    if(jQuery("#shipping_state").val() == 'OS'){
    	var drop_state = 'Osun';
    }
    if(jQuery("#shipping_state").val() == 'OY'){
    	var drop_state = 'Oyo';
    }
    if(jQuery("#shipping_state").val() == 'PL'){
    	var drop_state = 'Plateau';
    }
    if(jQuery("#shipping_state").val() == 'RI'){
    	var drop_state = 'Rivers';
    }
    if(jQuery("#shipping_state").val() == 'SO'){
    	var drop_state = 'Sokoto';
    }
    if(jQuery("#shipping_state").val() == 'TA'){
    	var drop_state = 'Taraba';
    }
    if(jQuery("#shipping_state").val() == 'YO'){
    	var drop_state = 'Yobe';
    }
    if(jQuery("#shipping_state").val() == 'ZA'){
    	var drop_state = 'Zamfara';
    }

    // alert(API_URL_MODE + ' ' +pickup_state +' '+ pickup_location);
    // need field
    
    var drop_area=jQuery("#shipping_city").val();
    var drop_location=jQuery("#shipping_address_1").val();
    var recipient_name = jQuery("#shipping_first_name").val() + ' ' + jQuery("#shipping_last_name").val();
    var recipient_mobile = jQuery("#billing_phone").val();
    var recipient_email= jQuery("#billing_email").val();
    
    var package_group=19;
    var package_category='appliance parts';
    var package_name='Testforcomplete';
    var package_size='large';
    var package_deliveryspeed='3 business days';
    var pickupfrom_time='04:00:00';
    var pickupto_time='05:00:00';
    var insurance=0;
    var itemvalue=0;
    

    jQuery.ajax ({
        type: "GET",
        url: BASEURL+API_URL_MODE,
        data: {"action":"request_bids",
        		"merchant_key":merchant_key,
        		"pickup_state":pickup_state,
        		"pickup_location":pickup_location,
        		"drop_state":drop_state,
        		"drop_area":drop_area,
        		"drop_location":drop_location,
        		"recipient_name":recipient_name,
        		"recipient_mobile":recipient_mobile,
        		"recipient_email":recipient_email, 
        		"package_group":package_group, 
        		"package_category":package_category,
        		"package_name":package_name,
        		"package_size":package_size,
        		"package_deliveryspeed":package_deliveryspeed,
        		"pickupfrom_time":pickupfrom_time,
        		"pickupto_time":pickupto_time,
        		"insurance":insurance,
        		"itemvalue":itemvalue},

        		// https://swifno.com/swifnoapi.php?action=request_bids&merchant_key=thjdkifufi12jdik&pickup_state=borno&pickup_area=auno&pickup_location=borno, nigeria&drop_state=adamawa&drop_area=mayo&drop_location=abia, umuahia, nigeria&recipient_name=new test kiran&recipient_mobile=08067832456&recipient_email=amit.patel.oms@gmail.com&package_group=19&package_category=appliance parts&package_name=Testforcomplete&package_size=large&package_deliveryspeed=3 business days&pickupfrom_time=04:00:00&pickupto_time=05:25:00&%20 insurance=0&itemvalue=0

        crossDomain: true,
        success:function(responceData)
        {
            console.log(responceData);
            var data=JSON.parse(responceData);
            // alert(this.url);
            
            if(data.RESPONSECODE==1)
            {
                var options='';
                jQuery.each(data.COURIERLIST,function(field,value) {
                    options+='<input type="radio" name="swifno_rate_option" id="swifno_rate_option" value="'+value['bid_amount']+'" class="swifno_shipping_method">'+'<label for="shipping_method_rate">'+value['company_name']+': <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₦</span>'+value['bid_amount']+'.00</span></label><br><input name="vendor_id" type="hidden" id="vendor_id" value="'+value['vendor_id']+'" class="vendor_id">';
                    
                    // '<li><input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate '+value['vendor_id']+' " value="flat_rate:'+value['vendor_id']+'" class="shipping_method">'+'<label for="shipping_method_0_flat_rate'+value['vendor_id']+'">Swifno Shipping: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₦</span>'+value['bid_amount']+'.00</span></label></li>';
                    
                });
                jQuery('#swifno_flat_api_rates').html(options);
            }
            else
            {
                jQuery('#swifno_flat_api_rates').html('<div class="status error"><p class="closestatus"><a href="javascript:void(0);" onclick="$(\'.status\').remove()" title="Close">x</a></p><p><img src="http://swifno.com/manage/images/icon_error.png" align="absmiddle">  '+data.RESPONSEMESSAGE+'</p></div>');
            }
            console.log("patel");
            return false;
        }
    });
    console.log("amid");
    return false;
}

jQuery(window).load(function () {
    // alert('page is loaded');
    
    // alert(jQuery("#shipping_address_1").val());
    
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
    
     if(pickup_state_db == 'NG:AB'){
    	var pickup_state = 'Abia';
    }
    if(pickup_state_db == 'NG:FC'){
    	var pickup_state = 'Abuja';
    }
    if(pickup_state_db == 'NG:AD'){
    	var pickup_state = 'Adamawa';
    }
    if(pickup_state_db == 'NG:AK'){
    	var pickup_state = 'Akwa Ibom';
    }
    if(pickup_state_db == 'NG:AN'){
    	var pickup_state = 'Anambra';
    }
    if(pickup_state_db == 'NG:BA'){
    	var pickup_state = 'Bauchi';
    }
    if(pickup_state_db == 'NG:BY'){
    	var pickup_state = 'Bayelsa';
    }
    if(pickup_state_db == 'NG:BE'){
    	var pickup_state = 'Benue';
    }
    if(pickup_state_db == 'NG:BO'){
    	var pickup_state = 'Borno';
    }
    if(pickup_state_db == 'NG:CR'){
    	var pickup_state = 'Cross River';
    }
    if(pickup_state_db == 'NG:DE'){
    	var pickup_state = 'Delta';
    }
    if(pickup_state_db == 'NG:EB'){
    	var pickup_state = 'Ebonyi';
    }
    if(pickup_state_db == 'NG:ED'){
    	var pickup_state = 'Edo';
    }
    if(pickup_state_db == 'NG:EK'){
    	var pickup_state = 'Ekiti';
    }
    if(pickup_state_db == 'NG:EN'){
    	var pickup_state = 'Enugu';
    }
    if(pickup_state_db == 'NG:GO'){
    	var pickup_state = 'Gombe';
    }
    if(pickup_state_db == 'NG:IM'){
    	var pickup_state = 'Imo';
    }
    if(pickup_state_db == 'NG:JI'){
    	var pickup_state = 'Jigawa';
    }
    if(pickup_state_db == 'NG:KD'){
    	var pickup_state = 'Kaduna';
    }
    if(pickup_state_db == 'NG:KN'){
    	var pickup_state = 'Kano';
    }
    if(pickup_state_db == 'NG:KT'){
    	var pickup_state = 'Katsina';
    }
    if(pickup_state_db == 'NG:KE'){
    	var pickup_state = 'Kebbi';
    }
    if(pickup_state_db == 'NG:KO'){
    	var pickup_state = 'Kogi';
    }
    if(pickup_state_db == 'NG:KW'){
    	var pickup_state = 'Kwara';
    }
    if(pickup_state_db == 'NG:LA'){
    	var pickup_state = 'Lagos';
    }
    if(pickup_state_db == 'NG:NA'){
    	var pickup_state = 'Nasarawa';
    }
    if(pickup_state_db == 'NG:NI'){
    	var pickup_state = 'Niger';
    }
    if(pickup_state_db == 'NG:OG'){
    	var pickup_state = 'Ogun';
    }
    if(pickup_state_db == 'NG:ON'){
    	var pickup_state = 'Ondo';
    }
    if(pickup_state_db == 'NG:OS'){
    	var pickup_state = 'Osun';
    }
    if(pickup_state_db == 'NG:OY'){
    	var pickup_state = 'Oyo';
    }
    if(pickup_state_db == 'NG:PL'){
    	var pickup_state = 'Plateau';
    }
    if(pickup_state_db == 'NG:RI'){
    	var pickup_state = 'Rivers';
    }
    if(pickup_state_db == 'NG:SO'){
    	var pickup_state = 'Sokoto';
    }
    if(pickup_state_db == 'NG:TA'){
    	var pickup_state = 'Taraba';
    }
    if(pickup_state_db == 'NG:YO'){
    	var pickup_state = 'Yobe';
    }
    if(pickup_state_db == 'NG:ZA'){
    	var pickup_state = 'Zamfara';
    }

    if(jQuery("#shipping_state").val() == 'AB'){
    	var drop_state = 'Abia';
    }
    if(jQuery("#shipping_state").val() == 'FC'){
    	var drop_state = 'Abuja';
    }
    if(jQuery("#shipping_state").val() == 'AD'){
    	var drop_state = 'Adamawa';
    }
    if(jQuery("#shipping_state").val() == 'AK'){
    	var drop_state = 'Akwa Ibom';
    }
    if(jQuery("#shipping_state").val() == 'AN'){
    	var drop_state = 'Anambra';
    }
    if(jQuery("#shipping_state").val() == 'BA'){
    	var drop_state = 'Bauchi';
    }
    if(jQuery("#shipping_state").val() == 'BY'){
    	var drop_state = 'Bayelsa';
    }
    if(jQuery("#shipping_state").val() == 'BE'){
    	var drop_state = 'Benue';
    }
    if(jQuery("#shipping_state").val() == 'BO'){
    	var drop_state = 'Borno';
    }
    if(jQuery("#shipping_state").val() == 'CR'){
    	var drop_state = 'Cross River';
    }
    if(jQuery("#shipping_state").val() == 'DE'){
    	var drop_state = 'Delta';
    }
    if(jQuery("#shipping_state").val() == 'EB'){
    	var drop_state = 'Ebonyi';
    }
    if(jQuery("#shipping_state").val() == 'ED'){
    	var drop_state = 'Edo';
    }
    if(jQuery("#shipping_state").val() == 'EK'){
    	var drop_state = 'Ekiti';
    }
    if(jQuery("#shipping_state").val() == 'EN'){
    	var drop_state = 'Enugu';
    }
    if(jQuery("#shipping_state").val() == 'GO'){
    	var drop_state = 'Gombe';
    }
    if(jQuery("#shipping_state").val() == 'IM'){
    	var drop_state = 'Imo';
    }
    if(jQuery("#shipping_state").val() == 'JI'){
    	var drop_state = 'Jigawa';
    }
    if(jQuery("#shipping_state").val() == 'KD'){
    	var drop_state = 'Kaduna';
    }
    if(jQuery("#shipping_state").val() == 'KN'){
    	var drop_state = 'Kano';
    }
    if(jQuery("#shipping_state").val() == 'KT'){
    	var drop_state = 'Katsina';
    }
    if(jQuery("#shipping_state").val() == 'KE'){
    	var drop_state = 'Kebbi';
    }
    if(jQuery("#shipping_state").val() == 'KO'){
    	var drop_state = 'Kogi';
    }
    if(jQuery("#shipping_state").val() == 'KW'){
    	var drop_state = 'Kwara';
    }
    if(jQuery("#shipping_state").val() == 'LA'){
    	var drop_state = 'Lagos';
    }
    if(jQuery("#shipping_state").val() == 'NA'){
    	var drop_state = 'Nasarawa';
    }
    if(jQuery("#shipping_state").val() == 'NI'){
    	var drop_state = 'Niger';
    }
    if(jQuery("#shipping_state").val() == 'OG'){
    	var drop_state = 'Ogun';
    }
    if(jQuery("#shipping_state").val() == 'ON'){
    	var drop_state = 'Ondo';
    }
    if(jQuery("#shipping_state").val() == 'OS'){
    	var drop_state = 'Osun';
    }
    if(jQuery("#shipping_state").val() == 'OY'){
    	var drop_state = 'Oyo';
    }
    if(jQuery("#shipping_state").val() == 'PL'){
    	var drop_state = 'Plateau';
    }
    if(jQuery("#shipping_state").val() == 'RI'){
    	var drop_state = 'Rivers';
    }
    if(jQuery("#shipping_state").val() == 'SO'){
    	var drop_state = 'Sokoto';
    }
    if(jQuery("#shipping_state").val() == 'TA'){
    	var drop_state = 'Taraba';
    }
    if(jQuery("#shipping_state").val() == 'YO'){
    	var drop_state = 'Yobe';
    }
    if(jQuery("#shipping_state").val() == 'ZA'){
    	var drop_state = 'Zamfara';
    }

    
    
    // alert(API_URL_MODE + ' ' +pickup_state +' '+ pickup_location);
    // need field
    
    var drop_area=jQuery("#shipping_city").val();
    var drop_location=jQuery("#shipping_address_1").val();
    var recipient_name = jQuery("#shipping_first_name").val() + ' ' + jQuery("#shipping_last_name").val();
    var recipient_mobile = jQuery("#billing_phone").val();
    var recipient_email= jQuery("#billing_email").val();
    
    var package_group=19;
    var package_category='appliance parts';
    var package_name='Testforcomplete';
    var package_size='large';
    var package_deliveryspeed='3 business days';
    var pickupfrom_time='04:00:00';
    var pickupto_time='05:00:00';
    var insurance=0;
    var itemvalue=0;
    

    jQuery.ajax ({
        type: "GET",
        url: BASEURL+API_URL_MODE,
        data: {"action":"request_bids",
        		"merchant_key":merchant_key,
        		"pickup_state":pickup_state,
        		"pickup_location":pickup_location,
        		"drop_state":drop_state,
        		"drop_area":drop_area,
        		"drop_location":drop_location,
        		"recipient_name":recipient_name,
        		"recipient_mobile":recipient_mobile,
        		"recipient_email":recipient_email, 
        		"package_group":package_group, 
        		"package_category":package_category,
        		"package_name":package_name,
        		"package_size":package_size,
        		"package_deliveryspeed":package_deliveryspeed,
        		"pickupfrom_time":pickupfrom_time,
        		"pickupto_time":pickupto_time,
        		"insurance":insurance,
        		"itemvalue":itemvalue},

        		// https://swifno.com/swifnoapi.php?action=request_bids&merchant_key=thjdkifufi12jdik&pickup_state=borno&pickup_area=auno&pickup_location=borno, nigeria&drop_state=adamawa&drop_area=mayo&drop_location=abia, umuahia, nigeria&recipient_name=new test kiran&recipient_mobile=08067832456&recipient_email=amit.patel.oms@gmail.com&package_group=19&package_category=appliance parts&package_name=Testforcomplete&package_size=large&package_deliveryspeed=3 business days&pickupfrom_time=04:00:00&pickupto_time=05:25:00&%20 insurance=0&itemvalue=0

        crossDomain: true,
        success:function(responceData)
        {
            console.log(responceData);
            var data=JSON.parse(responceData);
            // alert(this.url);
            
            if(data.RESPONSECODE==1)
            {
                // jQuery.ajax({
                //     type: 'POST',
                //     url: wc_checkout_params.ajax_url,
                //     data: {
                //         'action': 'calculate_shipping',
                //         'content': data,
                //     },
                //     success: function (result) {
                //         result=data;
                //         console.log(result);
                //     },
                //     error: function(error){
                //         console.log(error); // just for testing | TO BE REMOVED
                //     }
                // });
                
                // var options='';
                // jQuery.each(data.COURIERLIST,function(field,value) {
                //     options+='<input type="radio" name="swifno_rate_option" id="swifno_rate_option" value="'+value['bid_amount']+'" class="swifno_shipping_method">'+'<label for="shipping_method_rate">'+value['company_name']+': <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₦</span>'+value['bid_amount']+'.00</span></label><br><input name="vendor_id" type="hidden" id="vendor_id" value="'+value['vendor_id']+'" class="vendor_id">';
                    
                //     // '<li><input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate '+value['vendor_id']+' " value="flat_rate:'+value['vendor_id']+'" class="shipping_method">'+'<label for="shipping_method_0_flat_rate'+value['vendor_id']+'">Swifno Shipping: <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₦</span>'+value['bid_amount']+'.00</span></label></li>';
                    
                // });
                // jQuery('#swifno_flat_api_rates').html(options);
            }
            else
            {
                // jQuery('#swifno_flat_api_rates').html('<div class="status error"><p class="closestatus"><a href="javascript:void(0);" onclick="$(\'.status\').remove()" title="Close">x</a></p><p><img src="http://swifno.com/manage/images/icon_error.png" align="absmiddle">  '+data.RESPONSEMESSAGE+'</p></div>');
            }
            console.log("patel");
            return false;
        }
    });
    console.log("amid");
    return false;

    // setTimeout(function () {
    //     alert('page is loaded and 1 minute has passed');   
    // }, 60000);

});


jQuery( document.body ).on( 'updated_shipping_method', function(){
  // Code stuffs

  // has the function initialized after the event trigger?
  console.log('on updated_shipping_method: function fired'); 
});

jQuery( function($){
        if(jQuery('#swifno_flat_api_rates:has(input:radio[name="swifno_rate_option"])')){
            // jQuery('tr[data-title="Shipping"]').prop('<div id="swifno_checkbox>"<input type="checkbox" id="swifno_shipping_service" name="myCheckbox" /><div>');
            
            jQuery('form.checkout').on('change', 'input:radio[name="swifno_rate_option"]', function(e){
                e.preventDefault();
                // alert('good');
                var p = jQuery('input:radio[name="swifno_rate_option"]:checked').val();
                var v = jQuery('.vendor_id').val();
                alert(p);
                jQuery.ajax({
                    type: 'POST',
                    url: wc_checkout_params.ajax_url,
                    data: {
                        'action': 'woo_get_ajax_data',
                        'swifno_rate_option': p,
                        'vendor_id': v,
                    },
                    success: function (result) {
                        // $.session.set('swifo_rate', p);
                        $('body').trigger('update_checkout');
                        console.log('response: '+result); 
                        // just for testing | TO BE REMOVED
                    },
                    error: function(error){
                        console.log(error); // just for testing | TO BE REMOVED
                    }
                });
            });
        }   
    });
</script>