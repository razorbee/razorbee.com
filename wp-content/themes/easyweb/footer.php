<?php
/***************************************/
/*	Close  head line if woocommerce available
/***************************************/
if( isset($post) ){
	if( 'product' == get_post_type( $post->ID )){
		echo '</section>';
	}
}
$footer_show = true;
if(isset($post)){
	$footer_show = rwmb_meta( 'easyweb_footer_show' );
} ?>
<?php
if ( $footer_show || is_archive() || is_single() || is_home() ) : ?>
<section id="pre-footer">
<?php //start footer bars
$easyweb_webnus_options = easyweb_webnus_options();
$easyweb_webnus_options['easyweb_webnus_footer_instagram_bar'] = isset($easyweb_webnus_options['easyweb_webnus_footer_instagram_bar']) ? $easyweb_webnus_options['easyweb_webnus_footer_instagram_bar'] : '' ;
$easyweb_webnus_options['easyweb_webnus_footer_social_bar'] = isset($easyweb_webnus_options['easyweb_webnus_footer_social_bar']) ? $easyweb_webnus_options['easyweb_webnus_footer_social_bar'] : '' ;
$easyweb_webnus_options['easyweb_webnus_footer_subscribe_bar'] = isset($easyweb_webnus_options['easyweb_webnus_footer_subscribe_bar']) ? $easyweb_webnus_options['easyweb_webnus_footer_subscribe_bar'] : '' ;
$easyweb_webnus_options['easyweb_webnus_footer_color'] = isset($easyweb_webnus_options['easyweb_webnus_footer_color']) ? $easyweb_webnus_options['easyweb_webnus_footer_color'] : '' ;
$easyweb_webnus_options['easyweb_webnus_footer_bottom_enable'] = isset($easyweb_webnus_options['easyweb_webnus_footer_bottom_enable']) ? $easyweb_webnus_options['easyweb_webnus_footer_bottom_enable'] : '' ;
if( $easyweb_webnus_options['easyweb_webnus_footer_instagram_bar'] )
	get_template_part('parts/instagram-bar');
if( $easyweb_webnus_options['easyweb_webnus_footer_social_bar'] ){
	get_template_part('parts/social-bar');
}
if( $easyweb_webnus_options['easyweb_webnus_footer_subscribe_bar'] )
	get_template_part('parts/subscribe-bar');
?>
</section>

	<footer id="footer" <?php if( $easyweb_webnus_options['easyweb_webnus_footer_color'] == 1 ) echo 'class="litex00"';?>>
	<section class="container footer-in">
	<div class="row">
	<?php $footer_type = isset($easyweb_webnus_options['easyweb_webnus_footer_type']) ? $easyweb_webnus_options['easyweb_webnus_footer_type'] : '' ;
	switch($footer_type){
	case 1: ?>
	<div class="col-md-4"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<div class="col-md-4"><?php if( is_active_sidebar( 'footer-section-2' ) ) dynamic_sidebar('footer-section-2'); ?></div>
	<div class="col-md-4"><?php if( is_active_sidebar( 'footer-section-3' ) ) dynamic_sidebar('footer-section-3'); ?></div>
	<?php break;
	case 2: ?>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-2' ) ) dynamic_sidebar('footer-section-2'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-3' ) ) dynamic_sidebar('footer-section-3'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-4' ) ) dynamic_sidebar('footer-section-4'); ?></div>
	<?php break;
	case 3: ?>
	<div class="col-md-6"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-2' ) ) dynamic_sidebar('footer-section-2'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-3' ) ) dynamic_sidebar('footer-section-3'); ?></div>
	<?php break;
	case 4: ?>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-2' ) ) dynamic_sidebar('footer-section-2'); ?></div>
	<div class="col-md-6"><?php if( is_active_sidebar( 'footer-section-3' ) ) dynamic_sidebar('footer-section-3'); ?></div>
	<?php break;
	case 5: ?>
	<div class="col-md-6"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<div class="col-md-6"><?php if( is_active_sidebar( 'footer-section-2' ) ) dynamic_sidebar('footer-section-2'); ?></div>
	<?php break;
	case 6: ?>
	<div class="col-md-12"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<?php break;
	 } ?>
	<div class="col-md-6">
		<div class="widget">
			<h5 class="subtitle">Address</h5>
			<div class="textwidget" style="border:2px dashed white;padding-left:15px;">
		<p style="font-size:25px;color:white;">Razorbee Online Solutions Pvt Ltd</p>
<p style="color:white;">
Gaurav building, 157/1, 2nd floor, Manipal County Rd,

Above Domino’s pizza, AECS C Block,
</p>
<p style="color:white;">
Singasandra, Bengaluru,

Karnataka 560068
</p>
</div>
</div>
</div>
	 </div>
	 </section>
	<!-- end-footer-in -->
	<?php if( $easyweb_webnus_options['easyweb_webnus_footer_bottom_enable'] )
		get_template_part('parts/footer','bottom'); ?>
	<!-- end-footbot -->
	</footer>
	<!-- end-footer -->
<?php endif; ?>
<span id="scroll-top"><a class="scrollup"><i class="fa-chevron-up"></i></a></span></div>
<!-- end-wrap -->
<!-- End Document
================================================== -->
<?php
echo isset($easyweb_webnus_options['easyweb_webnus_space_before_body']) ? $easyweb_webnus_options['easyweb_webnus_space_before_body'] : '';
//wp_footer(); 


?>
<link rel='stylesheet' id='animate-css-css'  href='http://razorbee.com/wp-content/plugins/js_composer/assets/lib/bower/animate-css/animate.min.css?ver=5.1.1' type='text/css' media='all' />
<script type='text/javascript' src='http://razorbee.com/wp-content/plugins/w-time-table/public/js/wb-tt.js?ver=1.0.0'></script>
<script type='text/javascript' src='http://razorbee.com/wp-content/themes/easyweb/js/jquery.plugins.js'></script>
<script type='text/javascript' src='http://razorbee.com/wp-content/themes/easyweb/js/jquery.masonry.min.js'></script>
<script type='text/javascript' src='http://razorbee.com/wp-content/themes/easyweb/js/webnus-custom.js'></script>
<script type='text/javascript' src='http://razorbee.com/wp-includes/js/wp-embed.min.js?ver=4.8'></script>
<script type='text/javascript' src='http://razorbee.com/wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min.js?ver=5.1.1'></script>
</body>
</html>
