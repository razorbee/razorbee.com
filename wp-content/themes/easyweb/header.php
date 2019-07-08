

<?php // Define variables

	// fetch easyweb options
	$easyweb_options 		= easyweb_webnus_options();

	// Mobile Specific Metas
	$enable_responsive		= isset( $easyweb_options['easyweb_webnus_enable_responsive'] ) ? $easyweb_options['easyweb_webnus_enable_responsive'] : '';

	// Site Icon
	$apple_iphone_icon		= isset( $easyweb_options['easyweb_webnus_apple_iphone_icon']['url'] ) ? $easyweb_options['easyweb_webnus_apple_iphone_icon']['url'] : '';
	$apple_ipad_icon		= isset( $easyweb_options['easyweb_webnus_apple_ipad_icon']['url'] ) ? $easyweb_options['easyweb_webnus_apple_ipad_icon']['url'] : '';
	$favicon				= isset( $easyweb_options['easyweb_webnus_favicon']['url'] ) ? $easyweb_options['easyweb_webnus_favicon']['url'] : '';

	// Sticky
	$header_sticky			= isset( $easyweb_options['easyweb_webnus_header_sticky'] ) ? $easyweb_options['easyweb_webnus_header_sticky'] : '';
	$header_sticky_scrolls	= isset( $easyweb_options['easyweb_webnus_header_sticky_scrolls'] ) ? $easyweb_options['easyweb_webnus_header_sticky_scrolls'] : '';


	// -> Start the #wrap div classes

	$wrap_class = '';

	// Colorskin
	$color_skin					= isset( $easyweb_options['easyweb_webnus_color_skin'] ) ? $easyweb_options['easyweb_webnus_color_skin'] : '';
	$custom_color_skin_enable	= isset( $easyweb_options['easyweb_webnus_custom_color_skin_enable'] ) ? $easyweb_options['easyweb_webnus_custom_color_skin_enable'] : '';

	if ( $custom_color_skin_enable == '1' ) :
		$wrap_class .= 'colorskin-custom ';
	else :
		if( $color_skin != '0' ) :
			$wrap_class .= 'colorskin-' . $color_skin . ' ';
		endif;
	endif;

	// Header Menu
	$header_menu_type	= isset( $easyweb_options['easyweb_webnus_header_menu_type'] ) ? $easyweb_options['easyweb_webnus_header_menu_type'] : '';
	$dark_submenu		= isset( $easyweb_options['easyweb_webnus_dark_submenu'] ) ? $easyweb_options['easyweb_webnus_dark_submenu'] : '';

	$wrap_class	.= ( $header_menu_type == 0 )? esc_attr( 'no-menu-header' ) . ' ' : '';
	$wrap_class	.= ( $header_menu_type == 6 )? esc_attr( 'vertical-header-enabled' ) . ' ' : '';
	$wrap_class	.= ( $header_menu_type == 7 )? esc_attr( 'vertical-toggle-header-enabled' ) . ' ' : '';
	$wrap_class	.= ( ! isset( $dark_submenu ) || ( $dark_submenu == '2' ) )? esc_attr( ' dark-submenu' ) . ' ' : '';

	// Background Layout
	$background_layout	= isset( $easyweb_options['easyweb_webnus_background_layout'] ) ? $easyweb_options['easyweb_webnus_background_layout'] : '';
	$wrap_class 		.= ( ( $background_layout == 'boxed-wrap' ) && ( $header_menu_type != 6 ) && ( $header_menu_type != 7 ) ) ? $background_layout . ' ' : '';

	// -> End the #wrap div classes


	// Toggle Toparea
	$toggle_toparea_enable	= isset( $easyweb_options['easyweb_webnus_toggle_toparea_enable'] ) ? $easyweb_options['easyweb_webnus_toggle_toparea_enable'] : '';

	// Top Bar
	$header_topbar_enable	= isset( $easyweb_options['easyweb_webnus_header_topbar_enable'] ) ? $easyweb_options['easyweb_webnus_header_topbar_enable'] : '';

	// News Ticker
	$news_ticker			= isset( $easyweb_options['easyweb_webnus_news_ticker'] ) ? $easyweb_options['easyweb_webnus_news_ticker'] : '';

	// Modal Contact Form
	$topbar_contact			= isset( $easyweb_options['easyweb_webnus_topbar_contact'] ) ? $easyweb_options['easyweb_webnus_topbar_contact'] : '';
	$topbar_form			= isset($easyweb_options['easyweb_webnus_topbar_form']) ? $easyweb_options['easyweb_webnus_topbar_form'] : '';

	// woocommerce
	$woo_product_title_enable 	= isset( $easyweb_options['easyweb_webnus_woo_product_title_enable'] ) ? $easyweb_options['easyweb_webnus_woo_product_title_enable'] : '';
	$woo_product_title			= isset( $easyweb_options['easyweb_webnus_woo_product_title'] ) ? $easyweb_options['easyweb_webnus_woo_product_title'] : '';
	$woo_shop_title_enable		= isset( $easyweb_options['easyweb_webnus_woo_shop_title_enable'] ) ? $easyweb_options['easyweb_webnus_woo_shop_title_enable'] : '';
	$woo_shop_title				= isset( $easyweb_options['easyweb_webnus_woo_shop_title'] ) ? $easyweb_options['easyweb_webnus_woo_shop_title'] : '';

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head/>
	<script>document.write = function(){};</script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="google-site-verification" content="irZ9jlsXfFJcCJiLFPf1kE-8KyfRExJVDTy6Gm9CvQk" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<?php
	// Mobile Specific Metas
	if( $enable_responsive ) : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php else : ?>
	<meta name="viewport" content="width=1200,user-scalable=yes">
	<?php endif; ?>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<?php
	// Site Icon
	if( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) :
		echo $apple_iphone_icon ? '<link rel="apple-touch-icon-precomposed" href="' . esc_url( $apple_iphone_icon ) . '">' : '';
		echo $apple_ipad_icon ? '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . esc_url( $apple_ipad_icon ) . '">' : '';
		echo $favicon ? '<link rel="shortcut icon" href="' . esc_url( $favicon ) . '">' : '<link rel="shortcut icon" href="' . esc_url( get_template_directory_uri() ) . '/images/favicon.ico">';
	endif; ?>

	<?php wp_head(); ?>

	<meta name="description" content="Razorbee Online Solutions Pvt Ltd, a Bangalore based fast growing company, provides sharp-edge solutions for all types of software development and software products  and IT services that enhances a business worldwide prosperity." />

<meta name="keywords" content="razorbee, razorbee online solutions, mobile application, mobile apps, website development" />

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NJ59V6B');</script>
<!-- End Google Tag Manager -->
</head>

<?php if ( ! $header_sticky ) : ?>
<body <?php body_class(); ?>>
<?php else: ?>
<body <?php body_class(); ?> data-scrolls-value="<?php echo esc_attr( $header_sticky_scrolls ); ?>">
<?php endif; ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJ59V6B"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Start the #wrap div -->
<?php
if (!is_front_page()){

?>
<script type="text/javascript"> jQuery("body").removeClass('transparent-header-w');
</script>

<?php


}
?>
<div id="wrap" class="<?php echo $wrap_class; ?>">

	<?php if ( $toggle_toparea_enable ) : ?>
		<section class="toggle-top-area footer-in">
			<div class="w_toparea container">
				<div class="col-md-3">
					<?php if( is_active_sidebar( 'top-area-1' ) ) dynamic_sidebar('top-area-1'); ?>
				</div>
				<div class="col-md-3">
					<?php if( is_active_sidebar( 'top-area-2' ) ) dynamic_sidebar('top-area-2'); ?>
				</div>
				<div class="col-md-3">
					<?php if( is_active_sidebar( 'top-area-3' ) ) dynamic_sidebar('top-area-3'); ?>
				</div>
				<div class="col-md-3">
					<?php if( is_active_sidebar( 'top-area-4' ) ) dynamic_sidebar('top-area-4'); ?>
				</div>
			</div>
			<a class="w_toggle" href="#"></a>
		</section>
	<?php endif;

	$topbar_show = $header_show = true;
	if( isset( $post ) ) :
		$topbar_show = rwmb_meta( 'easyweb_topbar_show' );
		$header_show = rwmb_meta( 'easyweb_header_show' );
	endif;

	// Top Bar
	if ( $topbar_show || is_archive() || is_single() || is_home() ) :
		 if ( $header_topbar_enable )
			get_template_part( 'parts/topbar' );
	endif;

	// Menu Type
	if ( $header_show || is_archive() || is_single() || is_home() ) :
		switch( $header_menu_type ) :
		 	case 0:
			case 2:
			case 3:
			case 4:
			case 5:
				get_template_part( 'parts/header2' );
			break;
			case 6:
			case 7:
				get_template_part( 'parts/header3' );
			break;
			case 8:
				get_template_part( 'parts/header4' );
			break;
			case 9:
				get_template_part( 'parts/header2' );
			break;
			case 11:
				get_template_part( 'parts/header5' );
			break;
			default: //case: 1
				get_template_part( 'parts/header1' );
			break;
		endswitch;
	endif;

	if ( $header_menu_type != 11 ) {
		// News Ticker
		if( $news_ticker ) :
			get_template_part( 'parts/news-ticker' );
		endif;
	}

	// Modal Contact Form
	if ( $topbar_contact ) :
		$form_id = esc_html( $topbar_form );
		echo '<div style="display:none">
				<div class="w-modal modal-contact" id="w-contact">
					<h3 class="modal-title"> ' . esc_html__( 'CONTACT', 'easyweb' ) . '</h3>
					<br>
					' . do_shortcode( '[contact-form-7 id="'.$form_id.'" title="' . esc_attr( 'Contact' ) . '"]' ) . '
				</div>
			</div>';
	endif;

	// Woocommerce - if woocommerce available add page headline section
	if ( isset( $post ) && get_post_type( $post->ID ) == 'product' ) :
		if ( function_exists( 'is_product' ) && is_product() && $woo_product_title_enable ) { ?>
			<section id="headline">
				<div class="container">
					<?php if ( $woo_product_title_enable ) { ?>
						<h2><?php echo esc_html( $woo_product_title ); ?></h2>
					<?php } ?>
				</div>
			</section>
		<?php }

		if ( function_exists( 'is_product'  ) && ! is_product() ) { ?>
			<section id="headline">
				<div class="container">
					<?php if ( $woo_shop_title_enable ) { ?>
						<h2><?php echo esc_html( $woo_shop_title ); ?></h2>
					<?php } ?>
				</div>
			</section>
		<?php } ?>

		<!-- Start Page Content -->
		<section class="container">
			<hr class="vertical-space">
	<?php endif; // end woocommerce
