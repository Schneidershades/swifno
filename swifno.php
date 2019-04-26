<?php

/**
 * @package Swifno Merchant API
 */
/*
Plugin Name: Swifno Shipping Merchant API
Plugin URI: https://swifno.com/
Description: Used by millions for shipping service delivery as we have several delivery services under the Swifno Platform. It relieves your client delivery stress and sends delivery activities to www.swifno.com to handle for your client. To get started: activate the swifno plugin and then go to your Swifno Settings page to set up your Merchant API key.
Version: 4.0.3
Author: SIT Consulting
Author URI: https://sitconsulting.org/
Version: 1.0
Text Domain: Swifno
*/

if (!defined("ABSPATH")) {
	exit;
}

if (!defined("SWIFNO_SHIPPING_PLUGIN_DIR_PATH")) {
	define("SWIFNO_SHIPPING_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
}

if (!defined("SWIFNO_SHIPPING_PLUGIN_URL")) {
	define("SWIFNO_SHIPPING_PLUGIN_URL", plugins_url() . "/swifno");
}

// echo SWIFNO_SHIPPING_PLUGIN_DIR_PATH;

// echo "<br/>";

// echo SWIFNO_SHIPPING_PLUGIN_URL;

// die;

function swifno_shipping_include_assets(){

	wp_enqueue_style('bootstrap', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/css/bootstrap.min.css", '');
	wp_enqueue_style('datatable', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/css/jquery.dataTables.min.css", '');
	wp_enqueue_style('notifybar', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/css/jquery.notifyBar.css", '');
	wp_enqueue_style('style', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/css/style.css", '');
	wp_enqueue_style('autocomplete', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/css/autocomplete.css", '');
	wp_enqueue_style('time', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/css/bootstrap-clockpicker.min.css", '');
// 	wp_enqueue_style('upload', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/css/Ajaxfile-upload.css", '');

	wp_enqueue_script('jquery');

	wp_enqueue_script('bootstrap.min.js', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/js/bootstrap.min.js","", true);
	wp_enqueue_script('validation.min.js', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/js/jquery.validate.min.js","", true);
	wp_enqueue_script('datatable.min.js', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/js/jquery.dataTables.min.js","", true);
	wp_enqueue_script('jquery.notifybar.min.js', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/js/jquery.notifyBar.js","", true);
	wp_enqueue_script('autocomplete.js', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/js/autocomplete.js","", true);
// 	wp_enqueue_script('jquery.session.js', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/js/jquery.session.js","", true);
// 	wp_enqueue_script('upload.js', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/js/ajaxupload.3.5.js","", true);
	wp_enqueue_script('dropdown.js', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/js/jquery.dropdown.min.js","", true);
	wp_enqueue_script('timepicker.js', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/js/bootstrap-clockpicker.min.js","", true);

	wp_enqueue_script('google', "https://maps.googleapis.com/maps/api/js?key=AIzaSyBGxC6s_Re6BY6680dbM231eBtYHbQz48Y&amp;libraries=places","", true);
	wp_enqueue_script('script.js', SWIFNO_SHIPPING_PLUGIN_URL . "/assets/js/script.js","", true);
	wp_localize_script('script.js', 'swifnoshippingajaxurl', admin_url('admin-ajax.php'));
	// wp_localize_script('jscustom', 'ajax_custom', array(
	//    'ajaxurl' => admin_url('admin-ajax.php')
	// ));
}

add_action('init', 'swifno_shipping_include_assets');

// if (class_exists( 'WooCommerce' ) ) {
//   wp_die(__('Please make sure woocommerce is installed and active on your development', 'swifno_shipping'));
// } 

function swifno_shipping_plugin_menus(){
    if( get_option('swifno_shipping_merchant_token') ){
	    add_menu_page('Swifno Shipping Merchant API', 'Swifno Shipping Merchant API', 'manage_options', 'swifno-shipping-list', 'swifno_shipping_list', 'dashicons-book-alt', 26);

	    add_submenu_page("swifno-shipping-list", 'Set Merchant Details', 'Set Merchant Details', 'manage_options', 'swifno-shipping-list', 'swifno_shipping_list');
	}
	

// 	add_submenu_page("swifno-shipping-list", 'Add New Shipping ', 'Add New Shipping', 'manage_options', 'add-new-shipping', 'swifno_shipping_add');
	
	add_submenu_page("swifno-shipping-list", 'Swifno Settings ', 'Swifno Settings', 'manage_options', 'set-swifno-shipping-merchant', 'swifno_shipping_merchant');
}

add_action('admin_menu', 'swifno_shipping_plugin_menus');

function swifno_shipping_list(){
	include_once SWIFNO_SHIPPING_PLUGIN_DIR_PATH . "views/swifno_shipping_list.php";
}

function swifno_shipping_add(){
	include_once SWIFNO_SHIPPING_PLUGIN_DIR_PATH . "views/swifno_shipping_add.php";
}

function swifno_shipping_merchant(){
	include_once SWIFNO_SHIPPING_PLUGIN_DIR_PATH . "views/swifno_shipping_merchant.php";
}

function swifno_shipping_table(){
	global $wpdb;
	return $wpdb->prefix . "swifno_shipping";
}

function general_options(){
	global $wpdb;
	return $wpdb->prefix . "options";
}

function swifno_shipping_table_generate_script(){
	global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$sql = "CREATE TABLE `".swifno_shipping_table()."` (
			 `ID` int(11) DEFAULT NULL AUTO_INCREMENT,
			 `pickup_state` varchar(225) DEFAULT NULL,
			 `pickup_area` varchar(225) DEFAULT NULL,
			 `pickup_location` varchar(225) DEFAULT NULL,
			 `drop_state` varchar(225) DEFAULT NULL,
			 `drop_area` varchar(225) DEFAULT NULL,
			 `drop_location` varchar(225) DEFAULT NULL,
			 `recipient_name` varchar(255) DEFAULT NULL,
			 `recipient_mobile` varchar(255) DEFAULT NULL,
			 `recipient_email` varchar(255) DEFAULT NULL,
			 `package_group` varchar(255) DEFAULT NULL,
			 `package_category` varchar(255) DEFAULT NULL,
			 `package_name` varchar(255) DEFAULT NULL,
			 `package_size` varchar(255) DEFAULT NULL,
			 `package_deliveryspeed` varchar(255) DEFAULT NULL,
			 `pickupfrom_time` time DEFAULT NULL,
			 `pickupto_time` time DEFAULT NULL,
			 `insurance` varchar(255) DEFAULT NULL,
			 `itemvalue` varchar(255) DEFAULT NULL,
			 `packageimage1` text DEFAULT NULL,
			 `packageimage2` text DEFAULT NULL,
			 `packageimage3` text DEFAULT NULL,
			 `packageimage4` text DEFAULT NULL,
			 `packageimage5` text DEFAULT NULL,
			 `additional_detail` text DEFAULT NULL,
			 `order_amount` text DEFAULT NULL,
			 `vendor_id` text DEFAULT NULL,
			 `status` text DEFAULT NULL,
			 `bid_amount` text DEFAULT NULL,
			 `woocommerce_order_id` text DEFAULT NULL,
			 `api_response` text DEFAULT NULL,
			 PRIMARY KEY (`ID`)
			) ENGINE=MyISAM DEFAULT CHARSET=latin1";

	dbDelta($sql);
}

register_activation_hook(__FILE__, "swifno_shipping_table_generate_script");

function swifno_shipping_table_drop_script(){
	global $wpdb;
	// die(swifno_shipping_table());
	$drop = $wpdb->query("DROP TABLE IF EXISTS " . swifno_shipping_table());
}

register_deactivation_hook(__FILE__, 'swifno_shipping_table_drop_script');


// Belongs to the other room
function swifno_shipping_save_options(){
	if( !current_user_can ('manage_options') ){
		wp_die(__('You are not allowed to access this page', 'swifno_shipping'));
	}
	
	if(!get_option('swifno_shipping_merchant_token') ){
		wp_die(__('Please set your Swifno Shipping API Merchant Key', 'swifno_shipping'));
	}
	check_admin_referer('swifno_shipping_options_verify');
	
// 	 update_option('swifno_shipping_merchant_token', sanitize_text_field($_POST['merchant_token']));
// 	 update_option('swifno_testing_mode', sanitize_text_field($_POST['swifno_testing_mode']));
	 update_option('swifno_package_group', sanitize_text_field($_POST['swifno_package_group']));
	 update_option('swifno_package_category', sanitize_text_field($_POST['swifno_package_category']));
	 update_option('swifno_package_size', sanitize_text_field($_POST['swifno_package_size']));
	 
	 update_option('swifno_package_deliveryspeed', sanitize_text_field($_POST['swifno_package_deliveryspeed']));
	 update_option('swifno_package_pickupfrom_time', sanitize_text_field($_POST['swifno_package_pickupfrom_time']));
	 update_option('swifno_package_pickupto_time', sanitize_text_field($_POST['swifno_package_pickupto_time']));
	 
	 if(isset($_POST['insurance'])){
	     update_option('swifno_insurance', 1);
	 }else{
	     update_option('swifno_insurance', 0);
	 }
	 
	 if(isset($_POST['swifno_item_value'])){
	     update_option('swifno_item_value', $_POST['swifno_item_value']);
	 }else{
	     update_option('swifno_item_value', 0);
	 }
	wp_redirect(admin_url('admin.php?page=set-swifno-shipping-merchant&status=1'));
}

add_action('admin_post_swifno_shipping_save_options', 'swifno_shipping_save_options');


function swifno_shipping_save_merchant_key(){
	if( !current_user_can ('manage_options') ){
		wp_die(__('You are not allowed to access this page', 'swifno_shipping'));
	}
	check_admin_referer('swifno_shipping_save_merchant_verify');
	
	
	$baseurl ="https://swifno.com/"; 
	$api_url = get_option('swifno_testing_mode');
	
	if ($api_url == "swifno_live"){
	    //for sandbox user below url 
	    $api_url_mode = 'swifnoapi.php';
	}else{
        //for sandbox user below url 
	    $api_url_mode = 'sandbox/swifnoapi.php';
	} 
	
	$url = $baseurl . $api_url_mode;
    $response = wp_remote_get( $url . '?action=show_pickup_state&merchant_key='.sanitize_text_field($_POST['merchant_token'])
    );
    
    $vars = json_decode($response['body'], true);
    
    if($vars['RESPONSECODE'] == 0 && $vars['RESPONSEMESSAGE'] == 'Invalid merchant key'){
        wp_redirect(admin_url('admin.php?page=swifno-shipping-list&status=0'));
    }else{
        update_option('swifno_shipping_merchant_token', sanitize_text_field($_POST['merchant_token']));
	    update_option('swifno_testing_mode', sanitize_text_field($_POST['swifno_testing_mode']));
	    wp_redirect(admin_url('admin.php?page=swifno-shipping-list&status=1'));
    }
    // wp_die(__('Invalid merchant key please contact your shipping merchant provider', 'swifno_shipping'));
}

add_action('admin_post_swifno_shipping_save_merchant_key', 'swifno_shipping_save_merchant_key');


add_action( 'woocommerce_after_checkout_billing_form', 'display_extra_fields_after_billing_address');

function display_extra_fields_after_billing_address () {
    include_once SWIFNO_SHIPPING_PLUGIN_DIR_PATH . "views/swifno_shipping_checkbox.php";
}

// add_action( 'wp_ajax_woo_get_ajax_data', 'woo_get_ajax_data' );
// add_action( 'wp_ajax_nopriv_woo_get_ajax_data', 'woo_get_ajax_data' );
// function woo_get_ajax_data() {
//     if ( isset($_POST['swifno_shipping_flat_rate']) ){
//         $swifno_rate = sanitize_key( $_POST['swifno_shipping_flat_rate'] );
//         WC()->session->set('swifno_rate', $swifno_rate );
//         echo json_encode( $swifno_rate );
//     }
//     die(); // Alway at the end (to avoid server error 500)
// }

// Customizing Woocommerce radio form field

// add_action( 'woocommerce_form_field_radio', 'custom_form_field_radio', 20, 4 );
// function custom_form_field_radio( $field, $key, $args, $value ) {
//     if ( ! empty( $args['options'] ) && is_checkout() ) {
//         $field = str_replace( '</label><input ', '</label><br><input ', $field );
//         $field = str_replace( '<label ', '<label style="display:inline;margin-left:8px;" ', $field );
//     }
//     return $field;
// }

// // Add a custom dynamic packaging fee
// add_action( 'woocommerce_cart_calculate_fees', 'add_packaging_fee', 20, 1 );
// function add_packaging_fee( $cart ) {
//     if ( is_admin() && ! defined( 'DOING_AJAX' ) )
//         return;

//     $packing_fee = WC()->session->get( 'ship_rate' ); // Dynamic packing fee
//     $fee = $packing_fee;
//     // die($packing_fee);
//     $cart->add_fee( __( 'Swifno shipping fee', 'woocommerce' ), $packing_fee );
// }

// Add a custom radio fields for packaging selection
// add_action( 'woocommerce_review_order_after_shipping', 'checkout_shipping_form_packing_addition', 20 );

// function checkout_shipping_form_packing_addition( )
// {
//     $domain       = 'wocommerce';

//     echo '<tr class="packing-select" id="packing-select"><th><div id="swifno_service_checkbox"><input type="checkbox" name="swifno_shipping_service" class="swifno_shipping" id="swifno_shipping_service"></h3></div>' . __('Swifno Shipping options', $domain) . '</th><td id="swifno_flat_api_rates">';

//     $chosen   = WC()->session->get('ship_rate');
//     $chosen   = empty($chosen) ? WC()->checkout->get_value('ship_rate') : $chosen;
//     // $chosen   = empty($chosen) ? 'bag' : $chosen;

//     // Add a custom checkbox field
//     // woocommerce_form_field( 'radio_packing', array(
//     //     'type' => 'radio',
//     //     'class' => array( 'form-row-wide packing' ),
//     //     'options' => array(
//     //         'bag' => __('In a bag '.wc_price(3.00), $domain),
//     //         'box' => __('In a gift box '.wc_price(9.00), $domain),
//     //     ),
//     //     'default' => $chosen,
//     // ), $chosen );

//     echo '</td></tr>';
// }


// Php Ajax (Receiving request and saving to WC session)
// add_action( 'wp_ajax_woo_get_ajax_data', 'woo_get_ajax_data' );
// add_action( 'wp_ajax_nopriv_woo_get_ajax_data', 'woo_get_ajax_data' );
// function woo_get_ajax_data() {
//     if ( isset($_POST['swifno_rate_option']) ){
//         $packing = sanitize_key( $_POST['swifno_rate_option'] );
//         $shipping_id = sanitize_key( $_POST['vendor_id'] );
//         WC()->session->set('ship_rate', $packing.'.00' );
//         WC()->session->set('v_id', $shipping_id );
//         echo json_encode( $packing );
//     }
//     die(); // Alway at the end (to avoid server error 500)
// }

// define the woocommerce_new_order callback 
// function action_woocommerce_new_order() { 
    
//     $pImagesUrl = array();
//     $lists = array();
    
//     $items = WC()->cart->get_cart();
//     foreach($items as $item => $values) { 
//         $_product =  wc_get_product( $values['data']->get_id() );
//         //product image
//         $getProductDetail = wc_get_product( $values['product_id'] );
        
//         $pImagesUrl[] = get_the_post_thumbnail_url($values['product_id']);
        
//         echo $getProductDetail->get_image(); // accepts 2 arguments ( size, attr )
//         echo $getProductDetail->get_permalink(); // accepts 2 arguments ( size, attr )
        

//         $lists[] = $_product->get_title() .' Quantity: '.$values['quantity'];
       
//         /*Regular Price and Sale Price*/
//         echo "Regular Price: ".get_post_meta($values['product_id'] , '_regular_price', true)."<br>";
//         echo "Sale Price: ".get_post_meta($values['product_id'] , '_sale_price', true)."<br>";
//     }
    
//     $first_image = $pImagesUrl[0];

//     foreach ($lists as $list){
//         echo "$list ";
//     }
    
    
//     $baseurl ="https://swifno.com/"; 
// 	$api_url = get_option('swifno_testing_mode');
	
// 	if ($api_url == "swifno_live"){
// 	    //for sandbox user below url 
// 	    $api_url_mode = 'swifnoapi.php';
// 	}else{
//         //for sandbox user below url 
// 	    $api_url_mode = 'sandbox/swifnoapi.php';
// 	} 
	
// 	$url = $baseurl . $api_url_mode;
//     $response = wp_remote_post( 
//         $url.'?action=upload_package_image&merchant_key='.get_option('swifno_shipping_merchant_token').'&uploadfile='.$first_image
//     );
    
//     $vars = json_decode($response['body'],true);
//     echo($vars['RESPONSE']);
// }
         
// // add the action 
// add_action( 'woocommerce_before_checkout_billing_form', 'action_woocommerce_new_order'); 



add_action( 'woocommerce_checkout_order_processed', 'my_status_pending',  1, 1  );

function my_status_pending($order_id){
    
    $order = wc_get_order( $order_id );
    
    if(!empty($_POST['billing_state'])){
        $drop_state = $_POST['billing_state'];
    }elseif(!empty($_POST['shipping_state'])){
        $drop_state = $_POST['shipping_state'];
    }
    
    if(get_option('woocommerce_default_country') == 'NG:AB'){
    	$pickup_state= 'Abia';
    }
    if(get_option('woocommerce_default_country') == 'NG:FC'){
    	$pickup_state= 'Abuja';
    }
    if(get_option('woocommerce_default_country') == 'NG:AD'){
    	$pickup_state= 'Adamawa';
    }
    if(get_option('woocommerce_default_country') == 'NG:AK'){
    	$pickup_state= 'Akwa Ibom';
    }
    if(get_option('woocommerce_default_country') == 'NG:AN'){
    	$pickup_state= 'Anambra';
    }
    if(get_option('woocommerce_default_country') == 'NG:BA'){
    	$pickup_state= 'Bauchi';
    }
    if(get_option('woocommerce_default_country') == 'NG:BY'){
    	$pickup_state= 'Bayelsa';
    }
    if(get_option('woocommerce_default_country') == 'NG:BE'){
    	$pickup_state= 'Benue';
    }
    if(get_option('woocommerce_default_country') == 'NG:BO'){
    	$pickup_state= 'Borno';
    }
    if(get_option('woocommerce_default_country') == 'NG:CR'){
    	$pickup_state= 'Cross River';
    }
    if(get_option('woocommerce_default_country') == 'NG:DE'){
    	$pickup_state= 'Delta';
    }
    if(get_option('woocommerce_default_country') == 'NG:EB'){
    	$pickup_state= 'Ebonyi';
    }
    if(get_option('woocommerce_default_country') == 'NG:ED'){
    	$pickup_state= 'Edo';
    }
    if(get_option('woocommerce_default_country') == 'NG:EK'){
    	$pickup_state= 'Ekiti';
    }
    if(get_option('woocommerce_default_country') == 'NG:EN'){
    	$pickup_state= 'Enugu';
    }
    if(get_option('woocommerce_default_country') == 'NG:GO'){
    	$pickup_state= 'Gombe';
    }
    if(get_option('woocommerce_default_country') == 'NG:IM'){
    	$pickup_state= 'Imo';
    }
    if(get_option('woocommerce_default_country') == 'NG:JI'){
    	$pickup_state= 'Jigawa';
    }
    if(get_option('woocommerce_default_country') == 'NG:KD'){
    	$pickup_state= 'Kaduna';
    }
    if(get_option('woocommerce_default_country') == 'NG:KN'){
    	$pickup_state= 'Kano';
    }
    if(get_option('woocommerce_default_country') == 'NG:KT'){
    	$pickup_state= 'Katsina';
    }
    if(get_option('woocommerce_default_country') == 'NG:KE'){
    	$pickup_state= 'Kebbi';
    }
    if(get_option('woocommerce_default_country') == 'NG:KO'){
    	$pickup_state= 'Kogi';
    }
    if(get_option('woocommerce_default_country') == 'NG:KW'){
    	$pickup_state= 'Kwara';
    }
    if(get_option('woocommerce_default_country') == 'NG:LA'){
    	$pickup_state= 'Lagos';
    }
    if(get_option('woocommerce_default_country') == 'NG:NA'){
    	$pickup_state= 'Nasarawa';
    }
    if(get_option('woocommerce_default_country') == 'NG:NI'){
    	$pickup_state= 'Niger';
    }
    if(get_option('woocommerce_default_country') == 'NG:OG'){
    	$pickup_state= 'Ogun';
    }
    
    
    if($drop_state == 'AB'){
        $drop_state= 'Abia';
    }
    if($drop_state == 'FC'){
        $drop_state= 'Abuja';
    }
    if($drop_state == 'AD'){
        $drop_state= 'Adamawa';
    }
    if($drop_state == 'AK'){
        $drop_state= 'Akwa Ibom';
    }
    if($drop_state == 'AN'){
        $drop_state= 'Anambra';
    }
    if($drop_state == 'BA'){
        $drop_state= 'Bauchi';
    }
    if($drop_state == 'BY'){
        $drop_state= 'Bayelsa';
    }
    if($drop_state == 'BE'){
        $drop_state= 'Benue';
    }
    if($drop_state == 'BO'){
        $drop_state= 'Borno';
    }
    if($drop_state == 'CR'){
        $drop_state= 'Cross River';
    }
    if($drop_state == 'DE'){
        $drop_state= 'Delta';
    }
    if($drop_state == 'EB'){
        $drop_state= 'Ebonyi';
    }
    if($drop_state == 'ED'){
        $drop_state= 'Edo';
    }
    if($drop_state == 'EK'){
        $drop_state= 'Ekiti';
    }
    if($drop_state == 'EN'){
        $drop_state= 'Enugu';
    }
    if($drop_state == 'GO'){
        $drop_state= 'Gombe';
    }
    if($drop_state == 'IM'){
        $drop_state= 'Imo';
    }
    if($drop_state == 'JI'){
        $drop_state= 'Jigawa';
    }
    if($drop_state == 'KD'){
        $drop_state= 'Kaduna';
    }
    if($drop_state == 'KN'){
        $drop_state= 'Kano';
    }
    if($drop_state == 'KT'){
        $drop_state= 'Katsina';
    }
    if($drop_state == 'KE'){
        $drop_state= 'Kebbi';
    }
    if($drop_state == 'KO'){
        $drop_state= 'Kogi';
    }
    if($drop_state == 'KW'){
        $drop_state= 'Kwara';
    }
    if($drop_state == 'LA'){
        $drop_state= 'Lagos';
    }
    if($drop_state == 'NA'){
        $drop_state= 'Nasarawa';
    }
    if($drop_state == 'NI'){
        $drop_state= 'Niger';
    }
    if($drop_state == 'OG'){
        $drop_state= 'Ogun';
    }
    if($drop_state == 'ON'){
        $drop_state= 'Ondo';
    }
    if($drop_state == 'OS'){
        $drop_state= 'Osun';
    }
    if($drop_state == 'OY'){
        $drop_state= 'Oyo';
    }
    if($drop_state == 'PL'){
        $drop_state= 'Plateau';
    }
    if($drop_state == 'RI'){
        $drop_state= 'Rivers';
    }
    if($drop_state == 'SO'){
        $drop_state= 'Sokoto';
    }
    if($drop_state == 'TA'){
        $drop_state= 'Taraba';
    }
    if($drop_state == 'YO'){
        $drop_state= 'Yobe';
    }
    if($drop_state == 'ZA'){
        $drop_state= 'Zamfara';
    }
    
    if(!empty($_POST['billing_city'])){
        $droparea = $_POST['billing_city'];
    }elseif(!empty($_POST['shipping_city'])){
        $droparea = $_POST['shipping_city'];
    }
    
    if(!empty($_POST['billing_address_1'])){
        $droplocation = $_POST['billing_address_1'];
    }elseif(!empty($_POST['shipping_address_1'])){
        $droplocation = $_POST['shipping_address_1'];
    }
    
    if(!empty($_POST['billing_first_name'])){
        $first_name = $_POST['billing_first_name'];
    }elseif(!empty($_POST['shipping_first_name'])){
        $first_name = $_POST['shipping_first_name'];
    }
    
    
    if(!empty($_POST['billing_last_name'])){
        $last_name = $_POST['billing_last_name'];
    }elseif(!empty($_POST['shipping_last_name'])){
        $last_name = $_POST['shipping_last_name'];
    }
    
    if(!empty($_POST['billing_phone'])){
        $billing_phone = $_POST['billing_phone'];
    }
    
    if(!empty($_POST['billing_email'])){
        $billing_email = $_POST['billing_email'];
    }
    
    if(!empty($_POST['vendor_id'])){
        $vendor_id = $_POST['vendor_id'];
    }
    
    if(!empty($_POST['bid_amount'])){
        $bid_amount = $_POST['bid_amount'];
    }
    
    if(!empty($_POST['order_comments'])){
        $order_comments = $_POST['order_comments'];
    }
    
    if(get_option('woocommerce_store_city')){
        $pickup_area = get_option('woocommerce_store_city');
    }
    
    if(get_option('woocommerce_store_address')){
        $pickup_location = get_option('woocommerce_store_address');
    }
    
    
    $bid_amount   = WC()->session->get('ship_rate');
    $bid_amount   = empty($bid_amount) ? WC()->checkout->get_value('ship_rate') : $bid_amount;
    
    $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
    $chosen_shipping = $chosen_methods[0];
    
    $res = preg_replace("/[^0-9]/", "", $chosen_shipping );
    
    $vendor_id   = $res;
    $vendor_id   = empty($vendor_id) ? $res : $vendor_id;
    
    $pImagesUrl = array();
    $lists = array();
    
    $items = WC()->cart->get_cart();
    foreach($items as $item => $values) { 
        $_product =  wc_get_product( $values['data']->get_id() );
        //product image
        // $getProductDetail = wc_get_product( $values['product_id'] );
        
        $pImagesUrl[] = get_the_post_thumbnail_url($values['product_id']);
        
        // echo $getProductDetail->get_image(); // accepts 2 arguments ( size, attr )
        // echo $getProductDetail->get_permalink(); // accepts 2 arguments ( size, attr )

        $price = get_post_meta($values['product_id'] , '_price', true);
        
        $lists[] = $_product->get_title() .' Quantity: '.$values['quantity'];
    
        // echo "  Price: ".$price."<br>";
        // /*Regular Price and Sale Price*/
        // echo "Regular Price: ".get_post_meta($values['product_id'] , '_regular_price', true)."<br>";
        // echo "Sale Price: ".get_post_meta($values['product_id'] , '_sale_price', true)."<br>";
    }
    
    $first_image = $pImagesUrl[0];
    
    $package_name = "";
    foreach ($lists as $list){
        $package_name .=  "$list ";
    }
    
    
    
    $baseurl ="https://swifno.com/"; 
	$api_url = get_option('swifno_testing_mode');
	
	if ($api_url == "swifno_live"){
	    //for sandbox user below url 
	    $api_url_mode = 'swifnoapi.php';
	}else{
        //for sandbox user below url 
	    $api_url_mode = 'sandbox/swifnoapi.php';
	} 
	
	$url = $baseurl . $api_url_mode;
    $response = wp_remote_post( 
        $url.'?action=upload_package_image&merchant_key='.get_option('swifno_shipping_merchant_token').'&uploadfile='.$first_image
    );
    
    $vars = json_decode($response['body'],true);
    $image1 = $vars['RESPONSE'];
    
    // array for inputs
    
    global $woocommerce;
    // Will get you cart object
    $cart = $woocommerce->cart;
    // Will get you cart object
    $cart_total = $woocommerce->cart->get_cart_total();
    
    $data = array(
        'pickup_state' => $pickup_state,
        'pickup_area' => $pickup_area,
        'pickup_location' => $pickup_location,
        'drop_state' => $drop_state,
        'drop_area' => $droparea,
        'drop_location' => $droplocation,
        'recipient_name' => $first_name .' '.$last_name,
        'recipient_mobile' => $billing_phone,
        'recipient_email' => $billing_email,
        'package_group' => 'Merchant Product',
        'package_category' => 'Electronic Accessories',
        'package_name' => $package_name,
        'package_size' => 'Large',
        'package_deliveryspeed' => '3 Business Days',
        'pickupfrom_time' => '5:30:00',
        'pickupto_time' => '22:30:00',
        'insurance' => 0,
        'itemvalue' => 0,
        'packageimage1' => $image1,
        'packageimage2' => '',
        'packageimage3' => '',
        'packageimage4' => '',
        'packageimage5' => '',
        'order_amount' => $cart_total,
        'additional_detail' => $order_comments . ' Shipping order from merchant api',
        'vendor_id' => $vendor_id,
        'status' => 'Pending',
        'bid_amount' => $bid_amount,
        'woocommerce_order_id' => $order_id,
    );
    
    global $wpdb;
    
    $tid = array('woocommerce_order_id'=> $order_id);
    
    $order_exists = $wpdb->get_results("SELECT * FROM ".swifno_shipping_table()." WHERE woocommerce_order_id = '".$order_id."'");
    
    if ($order_exists)
        $wpdb->update( swifno_shipping_table(), $data , $tid);
    else
        $wpdb->insert(swifno_shipping_table(), $data);
}


function mysite_woocommerce_order_status_completed( $order_id ) {
    global $wpdb;
    
    $data = array(
        'status' => 'Success',
    );
    
    $tid = array('woocommerce_order_id'=> $order_id);
    
    $order_exists = $wpdb->get_results("SELECT * FROM ".swifno_shipping_table()." WHERE woocommerce_order_id = '".$order_id."'");
    
    if ($order_exists)
        $success = $wpdb->update( swifno_shipping_table(), $data , $tid);
    
    
    
    $is_in_database = $wpdb->get_row( 
        $wpdb->prepare("SELECT * FROM ".swifno_shipping_table()." WHERE woocommerce_order_id = '$order_id'" ), ARRAY_A
    );
    
    if ($is_in_database ) { 
        if ($is_in_database["status"] == 'Success'){
                $baseurl ="https://swifno.com/"; 
            	$api_url = get_option('swifno_testing_mode');
            	
            	if ($api_url == "swifno_live"){
            	    //for sandbox user below url 
            	    $api_url_mode = 'swifnoapi.php';
            	}else{
                    //for sandbox user below url 
            	    $api_url_mode = 'sandbox/swifnoapi.php';
            	} 
            	
            	$url = $baseurl . $api_url_mode;
                $response = wp_remote_get( 
                    $url . '?action=add_request&merchant_key='.get_option('swifno_shipping_merchant_token').'&pickup_state='.$is_in_database["pickup_state"].'&pickup_location='.$is_in_database["pickup_area"].'&drop_state='.$is_in_database["drop_state"].'&drop_location='.$is_in_database["drop_location"].'&recipient_name='.$is_in_database["recipient_name"].'&recipient_mobile='.$is_in_database["recipient_mobile"].'&recipient_email='.$is_in_database["recipient_email"].'&package_category='.$is_in_database["package_category"].'&package_name='.$is_in_database["package_name"].'&package_size='.$is_in_database["package_size"].'&package_deliveryspeed='.$is_in_database["package_deliveryspeed"].'&pickupfrom_time='.$is_in_database["pickupfrom_time"].'&pickupto_time='.$is_in_database["pickupto_time"].'&insurance='.$is_in_database["insurance"].'&itemvalue='.$is_in_database["itemvalue"].'&packageimage1='.$is_in_database["packageimage1"].'&packageimage2=imagename2&packageimage3=imagename3&packageimage4=imagename4&packageimage5=imagename5&additional_detail='.$is_in_database["additional_detail"].'&vendor_id='.$is_in_database["vendor_id"]
                    
                    // https://swifno.com/swifnoapi.php?action=add_request
                    // &merchant_key=thjdkifufi12jdik
                    // &pickup_state=borno&pickup_location=borno, nigeria&drop_state=adamawa&drop_location=abia, umuahia, nigeria&recipient_name=new test kiran&recipient_mobile=08067832456&recipient_email=amit.patel.oms@gmail.com&package_category=appliance parts&package_name=Testforcomplete&package_size=large&package_deliveryspeed=3 business days&pickupfrom_time=04:00:00&pickupto_time=05:25:00&insurance=0&itemvalue=0&packageimage1=imagename1&packageimage2=imagename2&packageimage3=imagename3&packageimage4=imagename4&packageimage5=imagename5&additional_detail=testing api&vendor_id=202 

                );
                
                $vars = json_decode($response['body'],true);
                echo  $vars['RESPONSEMESSAGE'];
                
                $data = array(
                    'api_response' => $vars['RESPONSEMESSAGE'],
                );
                
                $tid = array('woocommerce_order_id'=> $order_id);
                
                $order_exists = $wpdb->get_results("SELECT * FROM ".swifno_shipping_table()." WHERE woocommerce_order_id = '".$order_id."'");
                
                if ($order_exists)
                    $success = $wpdb->update( swifno_shipping_table(), $data , $tid);
                        
        }
    }   
        
}
add_action( 'woocommerce_thankyou', 'mysite_woocommerce_order_status_completed');


if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
	function your_shipping_method_init() {
		if ( ! class_exists( 'WC_Your_Shipping_Method' ) ) {
			class WC_Your_Shipping_Method extends WC_Shipping_Method {
				/**
				 * Constructor for your shipping class
				 *
				 * @access public
				 * @return void
				 */
				public function __construct() {
					$this->id                 = 'swifno_shipping_vendor'; // Id for your shipping method. Should be uunique.
					$this->method_title       = __( 'Your Swifno Shipping Method' );  // Title shown in admin
					$this->method_description = __( 'Description of your shipping method' ); // Description shown in admin
					$this->enabled            = "yes"; // This can be added as an setting but for this example its forced enabled
					$this->title              = "My Shipping Method"; // This can be added as an setting but for this example its forced.
					$this->init();
				}
				/**
				 * Init your settings
				 *
				 * @access public
				 * @return void
				 */
				function init() {
					// Load the settings API
					$this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
					$this->init_settings(); // This is part of the settings API. Loads settings you previously init.
					// Save settings in admin if you have any defined
					add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
				}
				/**
				 * calculate_shipping function.
				 *
				 * @access public
				 * @param mixed $package
				 * @return void
				 */
				function calculate_shipping( $package ) {
				    if (WC()->customer->get_shipping_country() == "NG" && WC()->customer->get_shipping_state() && WC()->customer->get_shipping_city() && WC()->customer->get_shipping_address()){
				        
    				    
                        $baseurl ="https://swifno.com/"; 
                    	$api_url = get_option('swifno_testing_mode');
                    	
                    	if ($api_url == "swifno_live"){
                    	    //for sandbox user below url 
                    	    $api_url_mode = 'swifnoapi.php';
                    	}else{
                            //for sandbox user below url 
                    	    $api_url_mode = 'sandbox/swifnoapi.php';
                    	} 
                    	
                    	if(WC()->customer->get_shipping_state()){
                            $drop_state = WC()->customer->get_shipping_state();
                        }
                        
                        if(WC()->customer->get_shipping_address()){
                            $drop_location = WC()->customer->get_shipping_address();
                        }
                        
                        $package_group = get_option('swifno_package_group');
                        $package_category = get_option('swifno_package_category');
                        $package_name = "";
                        $package_size = get_option('swifno_package_size');
                        $package_deliveryspeed = get_option('swifno_package_deliveryspeed');
                        $pickupfrom_time =  get_option('swifno_package_pickupfrom_time');
                        $pickupto_time =  get_option('swifno_package_pickupto_time');
                        $insurance =  get_option('swifno_insurance');
                        $itemvalue = get_option('swifno_item_value');
                        
                        if(get_option('woocommerce_default_country') == 'NG:AB'){
                        	$pickup_state= 'Abia';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:FC'){
                        	$pickup_state= 'Abuja';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:AD'){
                        	$pickup_state= 'Adamawa';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:AK'){
                        	$pickup_state= 'Akwa Ibom';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:AN'){
                        	$pickup_state= 'Anambra';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:BA'){
                        	$pickup_state= 'Bauchi';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:BY'){
                        	$pickup_state= 'Bayelsa';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:BE'){
                        	$pickup_state= 'Benue';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:BO'){
                        	$pickup_state= 'Borno';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:CR'){
                        	$pickup_state= 'Cross River';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:DE'){
                        	$pickup_state= 'Delta';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:EB'){
                        	$pickup_state= 'Ebonyi';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:ED'){
                        	$pickup_state= 'Edo';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:EK'){
                        	$pickup_state= 'Ekiti';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:EN'){
                        	$pickup_state= 'Enugu';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:GO'){
                        	$pickup_state= 'Gombe';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:IM'){
                        	$pickup_state= 'Imo';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:JI'){
                        	$pickup_state= 'Jigawa';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:KD'){
                        	$pickup_state= 'Kaduna';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:KN'){
                        	$pickup_state= 'Kano';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:KT'){
                        	$pickup_state= 'Katsina';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:KE'){
                        	$pickup_state= 'Kebbi';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:KO'){
                        	$pickup_state= 'Kogi';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:KW'){
                        	$pickup_state= 'Kwara';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:LA'){
                        	$pickup_state= 'Lagos';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:NA'){
                        	$pickup_state= 'Nasarawa';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:NI'){
                        	$pickup_state= 'Niger';
                        }
                        if(get_option('woocommerce_default_country') == 'NG:OG'){
                        	$pickup_state= 'Ogun';
                        }
                        
                        
                        if($drop_state == 'AB'){
                            $drop_state= 'Abia';
                        }
                        if($drop_state == 'FC'){
                            $drop_state= 'Abuja';
                        }
                        if($drop_state == 'AD'){
                            $drop_state= 'Adamawa';
                        }
                        if($drop_state == 'AK'){
                            $drop_state= 'Akwa Ibom';
                        }
                        if($drop_state == 'AN'){
                            $drop_state= 'Anambra';
                        }
                        if($drop_state == 'BA'){
                            $drop_state= 'Bauchi';
                        }
                        if($drop_state == 'BY'){
                            $drop_state= 'Bayelsa';
                        }
                        if($drop_state == 'BE'){
                            $drop_state= 'Benue';
                        }
                        if($drop_state == 'BO'){
                            $drop_state= 'Borno';
                        }
                        if($drop_state == 'CR'){
                            $drop_state= 'Cross River';
                        }
                        if($drop_state == 'DE'){
                            $drop_state= 'Delta';
                        }
                        if($drop_state == 'EB'){
                            $drop_state= 'Ebonyi';
                        }
                        if($drop_state == 'ED'){
                            $drop_state= 'Edo';
                        }
                        if($drop_state == 'EK'){
                            $drop_state= 'Ekiti';
                        }
                        if($drop_state == 'EN'){
                            $drop_state= 'Enugu';
                        }
                        if($drop_state == 'GO'){
                            $drop_state= 'Gombe';
                        }
                        if($drop_state == 'IM'){
                            $drop_state= 'Imo';
                        }
                        if($drop_state == 'JI'){
                            $drop_state= 'Jigawa';
                        }
                        if($drop_state == 'KD'){
                            $drop_state= 'Kaduna';
                        }
                        if($drop_state == 'KN'){
                            $drop_state= 'Kano';
                        }
                        if($drop_state == 'KT'){
                            $drop_state= 'Katsina';
                        }
                        if($drop_state == 'KE'){
                            $drop_state= 'Kebbi';
                        }
                        if($drop_state == 'KO'){
                            $drop_state= 'Kogi';
                        }
                        if($drop_state == 'KW'){
                            $drop_state= 'Kwara';
                        }
                        if($drop_state == 'LA'){
                            $drop_state= 'Lagos';
                        }
                        if($drop_state == 'NA'){
                            $drop_state= 'Nasarawa';
                        }
                        if($drop_state == 'NI'){
                            $drop_state= 'Niger';
                        }
                        if($drop_state == 'OG'){
                            $drop_state= 'Ogun';
                        }
                        if($drop_state == 'ON'){
                            $drop_state= 'Ondo';
                        }
                        if($drop_state == 'OS'){
                            $drop_state= 'Osun';
                        }
                        if($drop_state == 'OY'){
                            $drop_state= 'Oyo';
                        }
                        if($drop_state == 'PL'){
                            $drop_state= 'Plateau';
                        }
                        if($drop_state == 'RI'){
                            $drop_state= 'Rivers';
                        }
                        if($drop_state == 'SO'){
                            $drop_state= 'Sokoto';
                        }
                        if($drop_state == 'TA'){
                            $drop_state= 'Taraba';
                        }
                        if($drop_state == 'YO'){
                            $drop_state= 'Yobe';
                        }
                        if($drop_state == 'ZA'){
                            $drop_state= 'Zamfara';
                        }
                        
                        if(!empty($_POST['shipping_city'])){
                            $droparea = $_POST['shipping_city'];
                        }
                        
                        if(!empty($_POST['shipping_address_1'])){
                            $droplocation = $_POST['shipping_address_1'];
                        }
                        
                        if(!empty($_POST['billing_first_name'])){
                            $first_name = $_POST['billing_first_name'];
                        }elseif(!empty($_POST['shipping_first_name'])){
                            $first_name = $_POST['shipping_first_name'];
                        }
                        
                        
                        if(!empty($_POST['billing_last_name'])){
                            $last_name = $_POST['billing_last_name'];
                        }elseif(!empty($_POST['shipping_last_name'])){
                            $last_name = $_POST['shipping_last_name'];
                        }
                        
                        if(!empty($_POST['billing_phone'])){
                            $billing_phone = $_POST['billing_phone'];
                        }
                        
                        if(!empty($_POST['billing_email'])){
                            $billing_email = $_POST['billing_email'];
                        }
                        
                        if(!empty($_POST['vendor_id'])){
                            $vendor_id = $_POST['vendor_id'];
                        }
                        
                        if(!empty($_POST['bid_amount'])){
                            $bid_amount = $_POST['bid_amount'];
                        }
                        
                        if(!empty($_POST['order_comments'])){
                            $order_comments = $_POST['order_comments'];
                        }
                        
                        if(get_option('woocommerce_store_city')){
                            $pickup_area = get_option('woocommerce_store_city');
                        }
                        
                        if(get_option('woocommerce_store_address')){
                            $pickup_location = get_option('woocommerce_store_address');
                        }
                        
                        $pImagesUrl = array();
                        $lists = array();
                        
                        $items = WC()->cart->get_cart();
                        foreach($items as $item => $values) { 
                            $_product =  wc_get_product( $values['data']->get_id() );
                            
                            $pImagesUrl[] = get_the_post_thumbnail_url($values['product_id']);
                    
                            $price = get_post_meta($values['product_id'] , '_price', true);
                            
                            $lists[] = $_product->get_title() .' Quantity: '.$values['quantity'];
                        
                        }
                        
                        $first_image = $pImagesUrl[0];
                        
                        $package_name = "";
                        foreach ($lists as $list){
                            $package_name .=  "$list ";
                        }
                        
                        
                    	
                    	$url = $baseurl . $api_url_mode;
                        $response = wp_remote_get( $url . '?action=request_bids&merchant_key='.get_option('swifno_shipping_merchant_token').'&pickup_state='.$pickup_state.'&pickup_location='.$pickup_area.'&drop_state='.$drop_state.'&drop_location='.$drop_location.'&package_category='.$package_category.'&package_name='.$package_name.'&package_size='.$package_size.'&package_deliveryspeed='.$package_deliveryspeed.'&pickupfrom_time='.$pickupfrom_time.'&pickupto_time='.$pickupto_time.'&insurance='.$insurance.'&itemvalue='.$itemvalue
                        );
                        
                        
                        
                        
                        $vars = json_decode($response['body']);
                        
                        foreach($vars->COURIERLIST as $mydata)
                        {
                            $rate = array(
                                'id'       => $this->id . $mydata->vendor_id,
                                'label'    => $mydata->company_name,
                                'cost'     => $mydata->bid_amount,
                            );
                            
                            $this->add_rate( $rate );
                        }    
				    }
				}
			}
		}
	}
	add_action( 'woocommerce_shipping_init', 'your_shipping_method_init' );
	function add_your_shipping_method( $methods ) {
		$methods['your_shipping_method'] = 'WC_Your_Shipping_Method';
		return $methods;
	}
	add_filter( 'woocommerce_shipping_methods', 'add_your_shipping_method' );
}

?>