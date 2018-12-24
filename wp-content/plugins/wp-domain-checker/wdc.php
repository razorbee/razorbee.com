<?php
/*
	Plugin Name: WP Domain Checker
	Plugin URI: http://asdqwe.net/wordpress-plugins/wp-domain-checker/
	Description: Check domain name availability for all Top Level Domains using shortcode or widget with Ajax search.
	Author: Asdqwe Dev
	Version: 4.0.1
	Author URI: http://asdqwe.net/wordpress-plugins/wp-domain-checker/
	Text Domain: wdc
 */

require_once('titan-framework/titan-framework-embedder.php');
require_once('lib/DomainAvailability.php');  

add_action( 'init', 'wdc_load_textdomain' );

function wdc_load_textdomain() {
  load_plugin_textdomain( 'wdc', false, dirname( plugin_basename( __FILE__ ) ) . '/' ); 
}

function wdc_load_styles() {
	wp_register_style( 'wdc-main-styles', plugins_url( 'assets/style.css', __FILE__ ) );
	wp_register_style( 'wdc-styles-extras', plugins_url( 'assets/bootstrap-flat-extras.css', __FILE__ ) );
	wp_register_style( 'wdc-styles-flat', plugins_url( 'assets/bootstrap-flat.css', __FILE__ ) );
	wp_register_script( 'wdc-script', plugins_url( 'assets/script.js', __FILE__ ), array('jquery'), '1', 'true');
 	wp_localize_script( 'wdc-script', 'wdc_ajax', array(
        'ajaxurl'       => admin_url( 'admin-ajax.php', 'relative'),
        'wdc_nonce'     => wp_create_nonce( 'wdc_nonce' ))
    );
	if (wp_script_is( 'google-recaptcha', 'registered')) {
       return;}else{
  	wp_register_script('google-recaptcha', '//www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit', array(), '2.0', 'true');
	
	}
}
add_action( 'wp_enqueue_scripts', 'wdc_load_styles', 99 );
add_action( 'admin_enqueue_scripts', 'wdc_load_styles', 99 );

function wdc_load_fonts() {
        wp_register_style('wdcGoogleFonts', '//fonts.googleapis.com/css?family=Poppins:300');
        wp_enqueue_style( 'wdcGoogleFonts');
    }

add_action('wp_print_styles', 'wdc_load_fonts');

function wdc_render_recaptcha() {

?>
	<script type="text/javascript">
	var recaptchaCallback = function() {

	var forms = document.getElementsByTagName('form');
	var pattern = /(^|\s)g-recaptcha(\s|$)/;
	for (var i = 0; i < forms.length; i++) {
		var divs = forms[i].getElementsByTagName('div');
		for (var j = 0; j < divs.length; j++) {
			var sitekey = divs[j].getAttribute('data-sitekey');
			if (divs[j].className && divs[j].className.match(pattern) && sitekey) {
					grecaptcha.render(divs[j], {
					'sitekey': sitekey,
					'theme': divs[j].getAttribute('data-theme'),
					'type': divs[j].getAttribute('data-type'),
					'size': divs[j].getAttribute('data-size'),
					'tabindex': divs[j].getAttribute('data-tabindex'),
					'callback': divs[j].getAttribute('data-callback'),
					'expired-callback': divs[j].getAttribute('data-expired-callback')
				});
				break;
			}
		}
	}
}	

	</script>
<?php
}

function wdc_display_price($domain){
	global $woocommerce;
	$titan = TitanFramework::getInstance( 'wdc-options' );
	$extensions = $titan->getOption( 'wdc_custom_price' );
	$product_id = $titan->getOption( 'additional_button_link' );
	$price = get_post_meta( $product_id, '_regular_price', true);
	$currency = get_woocommerce_currency_symbol();
 	$extensions = preg_replace('/\s+/', '', $extensions);
 	$tlds = explode(',', $extensions);

    list($domain, $ext) = explode('.', $domain, 2);
	
	 foreach ($tlds as $key => $value) {
  		$tld = explode('|', $value);
		if($ext == $tld[0]){
     		$price = $tld[1];
		}
	}
	return $currency.$price;
		}

function wdc_display_func(){
	//check_ajax_referer( 'wdc_nonce', 'security' );

	$titan = TitanFramework::getInstance( 'wdc-options' );
 	$whois = $titan->getOption( 'whois_option' );
 	$whois_custom_url = $titan->getOption( 'whois_custom_url' );
 	$show_price = $titan->getOption( 'show_price' );
 	$whois_new_tab = $titan->getOption( '_blank1_option' );
 	$buy_new_tab = $titan->getOption( '_blank2_option' );
 	$integration = $titan->getOption( 'integration' );
 	$extensions = $titan->getOption( 'extensions' );
 	$multi_tlds = $titan->getOption( 'wdc_multi_tlds' );
 	$ext_message = $titan->getOption( 'ext_message' );
 	$additional_button_name = $titan->getOption( 'additional_button_name' );
 	$additional_button_link = $titan->getOption( 'additional_button_link' );
    $custom_found_result_texts = $titan->getOption( 'custom_found_result_text' );
    if($custom_found_result_texts == '') $custom_found_result_texts = __('Congratulations! {domain} is available!', 'wdc');
    $custom_not_found_result_texts = $titan->getOption( 'custom_not_found_result_text' );
    if($custom_not_found_result_texts == '') $custom_not_found_result_texts = __('Sorry! {domain} is already taken!', 'wdc');
    if($ext_message == '') $ext_message = __('Sorry, we currently do not handle that particular tld.', 'wdc');

    if($whois_new_tab){
    	$whois_new_tab = "target='_blank'";
    }else{
    	$whois_new_tab = "";
    }
    if($buy_new_tab){
    	$buy_new_tab = "target='_blank'";
    }else{
    	$buy_new_tab = "";
    }


if(isset($_POST['domain']))
{
	if($integration == 'woocommerce' OR $integration == 'custom'){
 		
 		if($_POST['item_id'] != ''){
 		$additional_button_link = $_POST['item_id'];
 		}

	}

	if($_POST['tld'] != ''){
		$multi_tlds = $_POST['tld'];
	}

	$domain = str_replace(array('www.', 'http://'), NULL, sanitize_text_field($_POST['domain']));
	if (strpos($domain,'.') == false) {
	
		if($multi_tlds == ''){
			$multi_tlds = array('com');
		}else{
			$multi_tlds = explode(',', $multi_tlds);
		}

	}else{
		list($sp, $split) = explode('.', $domain,2);
		$multi_tlds = array($split);
	}


	if (function_exists('idn_to_ascii')) {
		$punny_domain = idn_to_ascii($domain);
	}else{
		$punny_domain = $domain;
		$punny_domain = preg_replace("/[^-a-zA-Z0-9.]+/", "", $punny_domain);
		$domain = $punny_domain;
	}
	$punny_domain = preg_replace("/[^-a-zA-Z0-9.]+/", "", $punny_domain);
	if(strlen($punny_domain) > 0)
	{
 
		$Domains = new DomainAvailability();
    	list($dom, $ext) = explode('.', $punny_domain, 2);

		
		foreach($multi_tlds as $ex)
		{
	   	$domain = $dom.'.'.$ex;
	   	if($extensions != ''){
	   	$tlds = explode(',', $extensions);
		if (!in_array($ex, $tlds)) {
	    	$result = array('status'=>2,
	    					'domain'=>$domain, 
	    					'text'=> 	'<div class="callout callout-warning alert-warning clearfix">
										<div class="col-xs-10" style="padding-left:1px;text-align:left;">
										<i class="glyphicon glyphicon-exclamation-sign" style="margin-right:1px;"></i> '.__($ext_message, 'wdc').' 
										</div>
										</div>
										');
			echo $result['text'];
			wp_die();
		}
		}
			$available = json_decode($Domains->is_available($domain));
		
		$custom_found_result_text = str_replace( '{domain}', $domain, $custom_found_result_texts );


		if($whois != 'disable') {
				if($whois_custom_url != ''){
		    		$whoiss = $whois_custom_url;
			    }else{
			    	$whoiss = get_permalink($whois)."?&domain=$domain";
			    }

			$whois_link = "<a href='".$whoiss."' ".$whois_new_tab." ><button id='whois' class='btn btn-danger btn-xs pull-right whois-btn'>".__('WHOIS', 'wdc')."</button></a>";
		}else{
			$whois_link = '';
		}
		
		if($integration == 'whmcs'){
$check_ex = explode('.',$ex);

if(count($check_ex) == 2){
	$ex_name = $check_ex[0]."_".$check_ex[1];
}else{
	$ex_name = $check_ex[0];
}
			$additional_button = "<a href='javascript:void(0)' onclick='submitform_$dom_$ex_name()' ><button id='buy' class='btn btn-success btn-xs pull-right order-btn'>".__($additional_button_name, 'wdc')."</button></a>";
		}elseif($integration == 'woocommerce'){
			if($show_price){
				$show_price = '- '.wdc_display_price($domain).__('/year','wdc');
			}
			$additional_button = "<a href='?&add-to-cart=$additional_button_link&domain=$domain' id='buy' class='btn btn-success btn-xs pull-right order-btn' $buy_new_tab >".__($additional_button_name,'wdc')." $show_price</a>";
			}elseif($integration == 'custom'){
			if(!$additional_button_name == '' AND !$additional_button_link == ''){
				$additional_button_links = str_replace( '{domain}', $domain, $additional_button_link );
				$additional_button = "<a id='buy' class='btn btn-success btn-xs pull-right order-btn' href='$additional_button_links' $buy_new_tab >".__($additional_button_name,'wdc')."</a>";
			}else{
				$additional_button = '';
			}
		}else{
			$additional_button = '';
		}
		
		$custom_not_found_result_text = str_replace( '{domain}', $domain, $custom_not_found_result_texts );
		$whmcs = "<script type='text/javascript'>
				function submitform_$dom_$ex_name()
				{
				  document.whmcs_$dom_$ex_name.submit();
				}
				</script>
				<form method='post' name='whmcs_$dom_$ex_name' id='whmcs' action='$additional_button_link/cart.php?a=add&domain=register' $buy_new_tab>
				<input type='hidden' name='domains[]' value='$domain' >
				<input type='hidden' name='domainsregperiod[$domain]' value='1'>
				</form>";
		if ($available->status == 1) {
				$result = array('status'=>1,
								'domain'=>$domain, 
								'text'=> 	'<div class="callout callout-success alert-success clearfix available">
											<div class="col-xs-10" style="padding-left:1px;text-align:left;">
											<i class="glyphicon glyphicon-ok" style="margin-right:1px;"></i> '.__($custom_found_result_text,'wdc').' </div>
											<div class="col-xs-2" style="padding-right:1px">'.__($additional_button,'wdc').' '.$whmcs.'</div>
											</div>
											');
		    	echo $result['text'];

		} elseif($available->status == 0) {
				$result = array('status'=>0,
								'domain'=>$domain, 
								'text'=> 	'<div class="callout callout-danger alert-danger clearfix not-available">
											<div class="col-xs-10" style="padding-left:1px;text-align:left;">
											<i class="glyphicon glyphicon-remove" style="margin-right:1px;"></i> '.__($custom_not_found_result_text, 'wdc').' 
											</div>
											<div class="col-xs-2" style="padding-right:1px">'.$whois_link.'</div>
											</div>
											');
		    	echo $result['text'];
		}elseif ($available->status == 2) {
				$result = array('status'=>2,
								'domain'=> $domain, 
								'text'=> 	'<div class="callout callout-warning alert-warning clearfix notfound">
											<div class="col-xs-10" style="padding-left:1px;text-align:left;">
											<i class="glyphicon glyphicon-exclamation-sign" style="margin-right:1px;"></i> '.__('WHOIS server not found for that TLD','wdc').' 
											</div>
											</div>
											');
		    	echo $result['text'];
				
		}
	}
	}
	else
	{
		echo 'Please enter the domain name';
	}
}
wp_die();

}

add_action('wp_ajax_wdc_display','wdc_display_func');
add_action('wp_ajax_nopriv_wdc_display','wdc_display_func');

function wdc_display_dashboard(){
	echo do_shortcode('[wpdomainchecker]');
}

function wdc_add_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'wdc_dashboard_widget',         
                 'WP Domain Checker',        
                 'wdc_display_dashboard'
                 
        );	
}
add_action( 'wp_dashboard_setup', 'wdc_add_dashboard_widgets' );

function wdc_whois_shortcode(){

	if(isset($_GET['domain'])){
		$domain = sanitize_text_field($_GET['domain']);
		echo '<h3>'.__('Whois record for','wdc').' <b>'.$domain.'</b></h3>';

		require("lib/whoisClass.php");
		$whois=new Whois;
		echo "<pre>";
		if (function_exists('idn_to_ascii')) {
		echo $whois->whoislookup(idn_to_ascii($domain));
		}else{
		echo $whois->whoislookup($domain);
		}
		echo "</pre>";
	}


		
}
add_shortcode( 'wpdomainwhois', 'wdc_whois_shortcode' );

function wdc_display_shortcode($atts){
	wp_enqueue_style( 'wdc-main-styles' );
	wp_enqueue_style( 'wdc-styles-extras' );
	wp_enqueue_style( 'wdc-styles-flat' );
	wp_enqueue_script( 'wdc-script' );

	$titan = TitanFramework::getInstance( 'wdc-options' );
 	$item_id = $titan->getOption( 'additional_button_link' );
	$image = $titan->getOption( 'loading_image' );
	$recaptcha_enable = $titan->getOption( 'recaptcha' );
	$placeholder = $titan->getOption( 'input_placeholder' );
	$recaptcha_sitekey = $titan->getOption( 'recaptcha_sitekey' );
	$image = wp_get_attachment_image_src($image);
	if($image == '') {
		$image = plugins_url( '/images/load.gif', __FILE__ );
	}else{
		$image = $image[0];
	}
		$atts = shortcode_atts(
		array(
			'width' => '900',
			'button' => __('Check','wdc'),
			'recaptcha' => 'no',
			'item_id' => $item_id,
			'tld' => '',
			'size' => 'large'
		), $atts );
	if($atts['recaptcha'] == 'yes'){
	wp_enqueue_script( 'google-recaptcha' );
	add_action( 'wp_footer', 'wdc_render_recaptcha' );
		$show_recaptcha = '<p><div id="wdc-recaptcha" class="g-recaptcha" data-sitekey="'.$recaptcha_sitekey.'"></div>
<noscript>
  <div>
    <div style="width: 302px; height: 422px; position: relative;">
      <div style="width: 302px; height: 422px; position: absolute;">
        <iframe src="https://www.google.com/recaptcha/api/fallback?k='.$recaptcha_sitekey.'"
                frameborder="0" scrolling="no"
                style="width: 302px; height:422px; border-style: none;">
        </iframe>
      </div>
    </div>
    <div style="width: 300px; height: 60px; border-style: none;
                   bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px;
                   background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px;">
      <textarea id="g-recaptcha-response" name="g-recaptcha-response"
                   class="g-recaptcha-response"
                   style="width: 250px; height: 40px; border: 1px solid #c1c1c1;
                          margin: 10px 25px; padding: 0px; resize: none;" >
      </textarea>
    </div>
  </div>
</noscript></p>';
	}else{
		$show_recaptcha = "";
	}
$content = "<div id='domain-form'>
	<div id='wdc-style' >
		<form method='post' action='./' id='form' class='pure-form'> 

			<input type='hidden' name='item_id' value='{$atts['item_id']}'>
			<input type='hidden' name='tld' value='{$atts['tld']}'>
			<div class='input-group {$atts['size']}' style='max-width:{$atts["width"]}px;'>
     			<input type='text' class='form-control' autocomplete='off' id='Search' name='domain' placeholder='$placeholder'>
      				<span class='input-group-btn'>
					<button type='submit' id='Submit' class='btn btn-default btn-info'>{$atts["button"]}</button>
     	 			</span>
    		</div>
		{$show_recaptcha}
		<div id='loading'><img src='$image'></img></div>
	</form>
<div style='max-width:{$atts["width"]}px;'>
		<div id='results' class='result {$atts['size']}'></div>
</div>
	</div>
</div>";

return $content;

}


add_shortcode( 'wpdomainchecker', 'wdc_display_shortcode' );

/* Woocommerce Function */
function custom_add_to_cart_redirect() { 
	if(isset($_REQUEST['domain'])){
    return WC()->cart->get_cart_url(); 
	}
}
add_filter( 'woocommerce_add_to_cart_redirect', 'custom_add_to_cart_redirect' );

function save_name_on_wdc_field( $cart_item_key, $product_id = null, $quantity= null, $variation_id= null, $variation= null ) {

if(isset($_GET['domain'] )){
	WC()->session->set( $cart_item_key.'_domain', $_GET['domain'] );
	//WC()->session->set( $cart_item_key.'_price', $_GET['price'] );
}
}
add_action( 'woocommerce_add_to_cart', 'save_name_on_wdc_field', 1, 5 );

add_action( 'woocommerce_before_calculate_totals', 'add_custom_price');

function add_custom_price( $cart_object ) {
	$titan = TitanFramework::getInstance( 'wdc-options' );

	global $woocommerce;
	$tld = array();
 	$extensions = $titan->getOption( 'wdc_custom_price' );
 	$extensions = preg_replace('/\s+/', '', $extensions);
 	$tlds = explode(',', $extensions);
 	
	foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {
	if(WC()->session->get( $cart_item_key.'_domain')){
	$domain = WC()->session->get( $cart_item_key.'_domain');
    list($domain, $ext) = explode('.', $domain, 2);
	
	 foreach ($tlds as $key => $value) {
  		$tld = explode('|', $value);
		if($ext == $tld[0]){
     		$price = $tld[1];
     		$cart_item['data']->price = $price;
		}
	}
	}
	}
 }

function render_meta_on_cart_item( $title = null, $cart_item = null, $cart_item_key = null ) {
	global $product_id;
	if( $cart_item_key && is_cart() ) {
	
		if(WC()->session->get( $cart_item_key.'_domain')){
		echo $title. '<dl class="">
				 <dt class="">Domain : </dt>
				 <dd class=""><p>'. WC()->session->get( $cart_item_key.'_domain') .'</p></dd>			
			  </dl>';
		}else{
			echo $title;
		}
	}else {
		echo $title;
	}
}
add_filter( 'woocommerce_cart_item_name', 'render_meta_on_cart_item', 1, 3 );

function render_meta_on_checkout_order_review_item( $quantity = null, $cart_item = null, $cart_item_key = null ) {
	if( $cart_item_key ) {
		if(WC()->session->get( $cart_item_key.'_domain')){
		echo $quantity. '<dl class="">
				 <dt class="">'.__('Domain :','wdc').' </dt>
				 <dd class=""><p>'. WC()->session->get( $cart_item_key.'_domain') .'</p></dd>
			  </dl>';
		}else{
			echo $quantity;
		}
	}
}
add_filter( 'woocommerce_checkout_cart_item_quantity', 'render_meta_on_checkout_order_review_item', 1, 3 );

function wdc_order_meta_handler( $item_id, $values, $cart_item_key ) {
	if(WC()->session->get( $cart_item_key.'_domain')){
	wc_add_order_item_meta( $item_id, "Domain", WC()->session->get( $cart_item_key.'_domain') );
	}	
	
}
add_action( 'woocommerce_add_order_item_meta', 'wdc_order_meta_handler', 1, 3 );

function wdc_force_individual_cart_items($cart_item_data, $product_id)
{
	$titan = TitanFramework::getInstance( 'wdc-options' );
 	$id = $titan->getOption( 'additional_button_link' );
	$unique_cart_item_key = md5( microtime().rand() );
	$cart_item_data['unique_key'] = $unique_cart_item_key;

	return $cart_item_data;
	
}
add_filter( 'woocommerce_add_cart_item_data','wdc_force_individual_cart_items', 10, 2 );

add_filter('woocommerce_loop_add_to_cart_link','wdc_replace_add_to_cart');
function wdc_replace_add_to_cart() {
global $product;
 $link = sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button product_type_%s">%s</a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( $product->id ),
        esc_attr( $product->get_sku() ),
        esc_attr( isset( $quantity ) ? $quantity : 1 ),
        esc_attr( $product->product_type ),
        esc_html( $product->add_to_cart_text() )
    );
  $links = sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button product_type_%s">%s</a>',
        esc_url( get_permalink($product->id) ),
        esc_attr( $product->id ),
        esc_attr( $product->get_sku() ),
        esc_attr( isset( $quantity ) ? $quantity : 1 ),
        esc_attr( $product->product_type ),
        esc_html( $product->add_to_cart_text() )
    );
   
   if(get_post_meta( $product->id, 'wdc_hide_addtocart', true ) == 'yes'){
   	return $links;
   }else{
   	return $link;
   }
}

function wdc_remove_cart_button(){
$product_id = get_the_ID();
	if(get_post_meta( $product_id, 'wdc_hide_addtocart', true ) == 'yes'){
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	}
}
add_action('wp','wdc_remove_cart_button');

function wdc_woo_add_custom_general_fields() {
 
  global $woocommerce, $post;
  
  echo '<div class="options_group">';
  
 	woocommerce_wp_checkbox( 
	array( 
	'id'            => 'wdc_hide_addtocart', 
	'wrapper_class' => 'wdc_item_edit_class', 
	'label'         => __('WDC?', 'wdc' ), 
	'description'   => __( 'Check me if you want to hide Add to Cart button on single product page.', 'wdc' ) 
	)
);
  
  echo '</div>';
	
}

function wdc_woo_add_custom_general_fields_save( $post_id ){
	$woocommerce_checkbox = isset( $_POST['wdc_hide_addtocart'] ) ? 'yes' : 'no';
	update_post_meta( $post_id, 'wdc_hide_addtocart', $woocommerce_checkbox );
}

// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'wdc_woo_add_custom_general_fields' );

// Save Fields
add_action( 'woocommerce_process_product_meta', 'wdc_woo_add_custom_general_fields_save' );
/* Woocommerce End Function */

function wdc_url_get_contents($Url) {
    if (!function_exists('curl__init')){ 
        die('CURL is not installed!');
    }
    $ch = curl__init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function wdc_recaptcha_func() {
	//check_ajax_referer( 'wdc_nonce', 'security' );

	if(isset($_GET['response']))
	{
		$titan = TitanFramework::getInstance( 'wdc-options' );
		$captcha = $_GET['response'];
		$secret_key = $titan->getOption( 'recaptcha_secretkey' );
		$response=wdc_url_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
       	echo $response;
        
	}

wp_die();
}


add_action('wp_ajax_wdc_recaptcha','wdc_recaptcha_func');
add_action('wp_ajax_nopriv_wdc_recaptcha','wdc_recaptcha_func');


function wdc_options() {
    $titan = TitanFramework::getInstance( 'wdc-options' );
	global $panel;

	$panel = $titan->createContainer( array(
	'type'       => 'admin-page',
    'name' => 'WP Domain Checker',
    'parent' => 'options-general.php',
	) );

	$generaltab = $panel->createTab( array(
    'name' => 'General',
	) );

	$generaltab->createOption( array(
    'name' => __('Custom Available Result Text','wdc'),
    'id' => 'custom_found_result_text',
    'type' => 'textarea',
    'desc' => __('This is custom available result text. Use {domain} to replace domain name.','wdc')
	) );

	$generaltab->createOption( array(
    'name' => __('Custom Not Available Result Text','wdc'),
    'id' => 'custom_not_found_result_text',
    'type' => 'textarea',
    'desc' => __('This is custom not available result text. Use template tag {domain} to replace domain name.','wdc')
	) );

	$generaltab->createOption( array(
    'name' => __('Input Placeholder','wdc'),
    'id' => 'input_placeholder',
    'type' => 'text',
    'desc' => __('Placeholder for domain input.','wdc')
	) );

 	$generaltab->createOption( array(
    'name' => __('Loading Image','wdc'),
    'id' => 'loading_image',
    'type' => 'upload',
    'desc' => __('Upload your image','wdc')
	) );
	$pages=get_pages( array('post_type' => 'page','post_status' => 'publish') );
	foreach ($pages as $page) {
		$whois_page['disable'] = 'Disable';
		$whois_page['custom'] = 'Custom URL';
		$whois_page[$page->ID] = $page->post_title;
	}
	$generaltab->createOption( array(
    'name' => __('Whois Page','wdc'),
    'id' => 'whois_option',
    'type' => 'select',
    'options' => $whois_page,
    'desc' => __('Enable or disable whois button if domain not available, make sure you put shortcode <strong>[wpdomainwhois]</strong> in whois page.','wdc'),
    'default' => 'disable',
	) );

	$generaltab->createOption(array(
    'name' => __('Whois Custom URL','wdc'),
    'id' => 'whois_custom_url',
    'type' => 'text',
    'desc' => __('Use custom URL instead whois page','wdc')
));

	$generaltab->createOption( array(
    'name' => __('Open in new tab ?','wdc'),
    'id' => '_blank1_option',
    'type' => 'checkbox',
    'desc' => __('Open the Whois Link in new tab.','wdc'),
    'default' => false,
	) );
 	
 	$generaltab->createOption( array(
    'name' => __('Integration With','wdc'),
    'id' => 'integration',
    'type' => 'select',
    'options' => array(
    	'disable' => 'Disable',
        'whmcs' => 'WHMCS',
        'woocommerce' => 'Woocommerce',
        'custom' => 'Custom Link',
    ),
    'desc' => __('Enable or disable integration.','wdc'),
    'default' => 'disable',
	) );

 	$generaltab->createOption( array(
    'name' => __('Integration Button Text','wdc'),
    'id' => 'additional_button_name',
    'type' => 'text',
    'desc' => __('Integration Button Text. (e.g.: "ORDER NOW")','wdc')
	) );

	$generaltab->createOption( array(
    'name' => __('Integration Button Link','wdc'),
    'id' => 'additional_button_link',
    'type' => 'text',
    'desc' => __('Integration button link. (e.g. for WHMCS: "http://billing.host.com"). <a href="http://asdqwe.net/wordpress-plugins/wp-domain-checker-docs/" target="_blank">Documentation</a><br>
    			For custom link, you can use template tag {domain} to include domain in the link. <br>e.g: http://godaddy.com/?aff=12345&domain={domain}','wdc')
	) );

	$generaltab->createOption( array(
    'name' => __('Open in new tab ?','wdc'),
    'id' => '_blank2_option',
    'type' => 'checkbox',
    'desc' => __('Open the Integration Link in new tab.','wdc'),
    'default' => false,
	) );

	$generaltab->createOption( array(
    'name' => __('Supported TLD Extensions','wdc'),
    'id' => 'extensions',
    'type' => 'textarea',
    'desc' => __('Allow only specific extensions to check. separate by comma for each extension. (e.g: com,net,org,co.uk,co.id)<br>Leave it blank to allow all extensions.', 'wdc')
	) );

	$generaltab->createOption( array(
    'name' => __('Not Supported TLD Extensions Messages','wdc'),
    'id' => 'ext_message',
    'type' => 'text',
    'desc' => __('Not Supported TLD Extensions Messages. (e.g.: "Sorry, we currently do not handle that particular tld.")','wdc')
	) );

	$generaltab->createOption( array(
    'name' => __('WooCommerce Custom Price','wdc'),
    'id' => 'wdc_custom_price',
    'type' => 'textarea',
    'desc' => __('Allow custom price for specific tld. (e.g: com|9,net|10,org|11,co.uk|12,co.id|13)', 'wdc')
	) );

	$generaltab->createOption( array(
    'name' => __('Multiple TLDs Check','wdc'),
    'id' => 'wdc_multi_tlds',
    'type' => 'textarea',
    'desc' => __('Multiple TLDs check if user not define tld on the domain. (e.g: com,net,org,info)', 'wdc')
	) );

	$generaltab->createOption( array(
    'name' => __('Show Domain Price in Button?','wdc'),
    'id' => 'show_price',
    'type' => 'checkbox',
    'default' => false,
    'desc' => '<em>'.__('WooCommerce Integration Only.','wdc').'</em>'
	) );

	$recaptchaTab = $panel->createTab( array(
    'name' => 'reCaptcha',
	) );


	$recaptchaTab->createOption( array(
    'name' => __('reCaptcha Site Key','wdc'),
    'id' => 'recaptcha_sitekey',
    'type' => 'text',
    'desc' => __('Your reCaptcha Site Key. <a href="https://www.google.com/recaptcha/intro/index.html" target="_blank"> Get reCaptcha Key</a>','wdc')
	) );

	$recaptchaTab->createOption( array(
    'name' => __('reCaptcha Secret Key','wdc'),
    'id' => 'recaptcha_secretkey',
    'type' => 'text',
    'desc' => __('Your reCaptcha Secret Key.','wdc')
	) );

	$wdc_styles = $panel->createTab( array(
    'name' => 'Styles',
	) );

	$wdc_styles->createOption( array(
    'name' => __('Check Button Color','wdc'),
    'id' => 'check_button_color',
    'type' => 'color',
    'default' => '#5bc0de',
    'css' => '#wdc-style .btn-info { background-color: value !important;border-color:value! important; } #wdc-style input:focus {border-color:value !important}'
	));

	$wdc_styles->createOption( array(
    'name' => __('Check Button Text Color','wdc'),
    'id' => 'check_button_text_color',
    'type' => 'color',
    'default' => '#fff',
    'css' => '#wdc-style .btn-info { color: value !important; }'
	));

	$wdc_styles->createOption( array(
    'name' => __('Order Button Color','wdc'),
    'id' => 'order_button_color',
    'type' => 'color',
    'default' => '#5cb85c',
    'css' => '#wdc-style .order-btn { background-color: value !important;border-color: value !important; }'
	));

	$wdc_styles->createOption( array(
    'name' => __('Order Button Text Color','wdc'),
    'id' => 'order_button_text_color',
    'type' => 'color',
    'default' => '#fff',
    'css' => '#wdc-style .order-btn { color: value !important; }'
	));

	$wdc_styles->createOption( array(
    'name' => __('Whois Button Color','wdc'),
    'id' => 'whois_button_color',
    'type' => 'color',
    'default' => '#d9534f',
    'css' => '#wdc-style .whois-btn { background-color: value !important;border-color: value !important; }'
	));

	$wdc_styles->createOption( array(
    'name' => __('Whois Button Text Color','wdc'),
    'id' => 'whois_button_text_color',
    'type' => 'color',
    'default' => '#fff',
    'css' => '#wdc-style .whois-btn { color: value !important; }'
	));

	$wdc_styles->createOption( array(
    'name' => __('Available Result Background Color','wdc'),
    'id' => 'available_background_color',
    'type' => 'color',
    'default' => '#e7fadf',
    'css' => '#wdc-style .available { background-color: value !important; }'
	));

	$wdc_styles->createOption( array(
    'name' => __('Available Result Border Color','wdc'),
    'id' => 'available_border_color',
    'type' => 'color',
    'default' => '#b9ceab',
    'css' => '#wdc-style .available { border-color: value !important; }'
	));

	$wdc_styles->createOption( array(
    'name' => __('Available Result Text Color','wdc'),
    'id' => 'available_text_color',
    'type' => 'color',
    'default' => '#3c763d',
    'css' => '#wdc-style .available { color: value !important; }'
	));

	$wdc_styles->createOption( array(
    'name' => __('Not Available Background Color','wdc'),
    'id' => 'not_available_background_color',
    'type' => 'color',
    'default' => '#fcf2f2',
    'css' => '#wdc-style .not-available { background-color: value !important; }'
	));

	$wdc_styles->createOption( array(
    'name' => __('Not Available Border Color','wdc'),
    'id' => 'not_available_border_color',
    'type' => 'color',
    'default' => '#dFb5b4',
    'css' => '#wdc-style .not-available { border-color: value !important; }'
	));

	$wdc_styles->createOption( array(
    'name' => __('Not Available Result Text Color','wdc'),
    'id' => 'not_available_text_color',
    'type' => 'color',
    'default' => '#a94442',
    'css' => '#wdc-style .not-available { color: value !important; }'
	));

	$wdc_styles->createOption( array(
    'name' => __('Search Box Border Color','wdc'),
    'id' => 'search_box_border_color',
    'type' => 'color',
    'default' => '#fff',
    'css' => '#wdc-style .input-group { border: 1px solid value; }'
	));

	$customCSS = $panel->createTab( array(
    'name' => __('Custom CSS','wdc'),
	) );

	$customCSS->createOption( array(
    'name' => __('Custom CSS','wdc'),
    'id' => 'custom_css',
    'type' => 'code',
    'desc' => __('Put your custom CSS rules here','wdc'),
    'lang' => 'css',
	));

	$panel->createOption( array(
	    'type' => 'save'
	) );

}
add_action( 'tf_create_options', 'wdc_options' );


class wdc_widget extends WP_Widget {
	function __construct() {
		parent::__construct(false, $name = __('WP Domain Checker Widget','wdc'));
	}
	function form($instance) {
			if (isset($instance['title'])) {
				$title = $instance['title'];
				$width = $instance['width'];
				$button = $instance['button'];
				$recaptcha = $instance['recaptcha'];
				$size = $instance['size'];
			}else{
				$title = __("Domain Availability Check","wdc");
				$width = "";
				$button = "";
				$recaptcha = "no";
				$size = "small";
			}
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','wdc'); ?>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</label>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:','wdc'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
		</label>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('button'); ?>"><?php _e('Button Name:','wdc'); ?>
			<input class="widefat" id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" type="text" value="<?php echo $button; ?>" />
		</label>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('recaptcha'); ?>"><?php _e('reCaptcha:','wdc'); ?>
			<select id="<?php echo $this->get_field_id( 'recaptcha' ); ?>" name="<?php echo $this->get_field_name( 'recaptcha' ); ?>">
            <option <?php if ( 'no' == $recaptcha ) echo 'selected="selected"'; ?> value="no">Disable</option>
    		<option <?php if ( 'yes' == $recaptcha ) echo 'selected="selected"'; ?> value="yes">Enable</option>
            </select>
		</label>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('recaptcha'); ?>"><?php _e('Size:','wdc'); ?>
			<select id="<?php echo $this->get_field_id( 'recaptcha' ); ?>" name="<?php echo $this->get_field_name( 'recaptcha' ); ?>">
            <option <?php if ( 'small' == $size ) echo 'selected="selected"'; ?> value="no">Small</option>
    		<option <?php if ( 'large' == $size ) echo 'selected="selected"'; ?> value="yes">Large</option>
            </select>
		</label>
		</p>
	<?php
	}
	function update($new_instance, $old_instance) {
	    $instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
		$instance['button'] = ( ! empty( $new_instance['button'] ) ) ? strip_tags( $new_instance['button'] ) : '';
		$instance['recaptcha'] = ( ! empty( $new_instance['recaptcha'] ) ) ? strip_tags( $new_instance['recaptcha'] ) : '';
		$instance['size'] = ( ! empty( $new_instance['size'] ) ) ? strip_tags( $new_instance['size'] ) : '';

		return $instance;
	}

	function widget($args, $instance) {
		$title = $instance['title']; if ($title == '') $title = __('Domain Availability Check','wdc');
		$width = $instance['width']; if ($width == '') $width = '500';
		$button = $instance['button']; if ($button == '') $button = __('Check','wdc');
		$recaptcha = $instance['recaptcha']; if ($recaptcha == '') $recaptcha = 'no';
		$size = $instance['size']; if ($size == '') $size = 'small';

		echo $args['before_widget'];
	   
	 	if ( $title ) {
	      echo $args['before_title'] . $title. $args['after_title'];
	   	}
			
		echo do_shortcode("[wpdomainchecker width='$width' button='$button' recaptcha='$recaptcha' size='$size']");

	  	echo $args['after_widget'];
		}
}

function register_wdc_widget()
{
    register_widget( 'wdc_widget' );
}
add_action( 'widgets_init', 'register_wdc_widget');