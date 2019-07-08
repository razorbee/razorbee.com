<?php
$easyweb_webnus_options = easyweb_webnus_options();
$easyweb_webnus_options['easyweb_webnus_header_color_type'] = isset($easyweb_webnus_options['easyweb_webnus_header_color_type']) ? $easyweb_webnus_options['easyweb_webnus_header_color_type'] : '' ;
$easyweb_webnus_options['easyweb_webnus_header_menu_type'] = isset($easyweb_webnus_options['easyweb_webnus_header_menu_type']) ? $easyweb_webnus_options['easyweb_webnus_header_menu_type'] : '' ;
$enable_breadcrumbs		= isset( $easyweb_webnus_options['easyweb_webnus_enable_breadcrumbs'] ) ? $easyweb_webnus_options['easyweb_webnus_enable_breadcrumbs'] : '';

$hideheader = '';
if( is_page())
{
$hideheader =rwmb_meta( 'easyweb_hide_header_meta' );
}
$mobile_sticky = isset( $easyweb_webnus_options['easyweb_webnus_header_sticky_phone'] ) && $easyweb_webnus_options['easyweb_webnus_header_sticky_phone'] == '1' ? ' mobistky ' : '' ;
?>
<header id="header"  class="duplex-hd horizontal-w <?php echo $mobile_sticky;?> <?php
$menu_icon = isset($easyweb_webnus_options['easyweb_webnus_header_menu_icon']) ? $easyweb_webnus_options['easyweb_webnus_header_menu_icon'] : '' ;
if(!empty($menu_icon)) echo ' sm-rgt-mn ';
echo ($hideheader)? ' hi-header ' : '';
echo ' '.$easyweb_webnus_options['easyweb_webnus_header_color_type']
 ?>">
	<div class="container">
		<nav class="nav-wrap1 col-md-4 duplex-menu dm-left">
			<div class="container">	
				<?php
					if ( has_nav_menu( 'duplex-menu-left' ) ) { 
						wp_nav_menu( array( 'theme_location' => 'duplex-menu-left', 'container' => 'false', 'menu_id' => 'nav', 'depth' => '5', 'fallback_cb' => 'wp_page_menu', 'items_wrap' => '<ul class="duplex-menu" id="%1$s">%3$s</ul>',  'walker' => new easyweb_webnus_description_walker() ) );}
				?>
			</div>
		</nav>
	<div class="col-md-4 logo-wrap center">
			<div class="logo">
<?php
$logo 					= isset( $easyweb_webnus_options['easyweb_webnus_logo']['url'] ) ? $easyweb_webnus_options['easyweb_webnus_logo']['url'] : '';
$logo_width 			= isset( $easyweb_webnus_options['easyweb_webnus_logo_width'] ) ? $easyweb_webnus_options['easyweb_webnus_logo_width'] : '';
$transparent_logo 		= isset( $easyweb_webnus_options['easyweb_webnus_transparent_logo']['url'] ) ? $easyweb_webnus_options['easyweb_webnus_transparent_logo']['url'] : '';
$transparent_logo_width = isset( $easyweb_webnus_options['easyweb_webnus_transparent_logo_width'] ) ? $easyweb_webnus_options['easyweb_webnus_transparent_logo_width'] : '150px';
$sticky_logo 			= isset( $easyweb_webnus_options['easyweb_webnus_sticky_logo']['url'] ) ? $easyweb_webnus_options['easyweb_webnus_sticky_logo']['url'] : '';
$sticky_logo_width 		= isset( $easyweb_webnus_options['easyweb_webnus_sticky_logo_width'] ) ? $easyweb_webnus_options['easyweb_webnus_sticky_logo_width'] : '150px';
$has_logo				= false; /* Check if there is one logo exists at least. */

if( !empty($logo) || !empty($transparent_logo) || !empty($sticky_logo) ) $has_logo = true;
if((TRUE === $has_logo)){
if(!empty($logo))
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="' . $logo_width . '" id="img-logo-w1" alt="'.get_bloginfo( "name" ).'" class="img-logo-w1" style="width: ' . $logo_width . 'px"></a>';
if(!empty($transparent_logo))
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($transparent_logo).'" width="' . $transparent_logo_width . '" id="img-logo-w2" alt="'.get_bloginfo( "name" ).'" class="img-logo-w2" style="width: ' . $transparent_logo_width . 'px"></a>';
else 
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="' . (!empty($transparent_logo_width)?$transparent_logo_width:$logo_width). '" id="img-logo-w2" alt="'.get_bloginfo( "name" ).'" class="img-logo-w2" style="width: '. !empty($transparent_logo_width) ? $transparent_logo_width : $logo_width . '"></a>';
if(!empty($sticky_logo))
	echo '<span class="logo-sticky"><a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($sticky_logo).'" width="' . $sticky_logo_width . '" id="img-logo-w3" alt="'.get_bloginfo( "name" ).'" class="img-logo-w3"></a></span>';
else 
	echo '<span class="logo-sticky"><a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="'. (!empty($sticky_logo_width)?$sticky_logo_width:$logo_width). '" id="img-logo-w3" alt="'.get_bloginfo( "name" ).'" class="img-logo-w3"></a></span>'; 
}else{ ?>
<a id="site-title" href="<?php echo esc_url(home_url( '/' )); ?>"><?php bloginfo( 'name' ); ?></a>
<span class="site-slog"><a href="<?php echo esc_url(home_url( '/' )); ?>">
<?php             
	$slogan = isset($easyweb_webnus_options['easyweb_webnus_slogan']) ?  $easyweb_webnus_options['easyweb_webnus_slogan'] : '' ;
	if( empty($slogan))
		bloginfo( 'description' );
	else
		echo esc_html($slogan);                      
?>
</a></span>
<?php } ?>
		</div></div>
	<nav class="nav-wrap1 col-md-4 duplex-menu dm-right">
		<div class="container">	
			<?php
				if ( has_nav_menu( 'duplex-menu-right' ) ) { 
					wp_nav_menu( array( 'theme_location' => 'duplex-menu-right', 'container' => 'false', 'menu_id' => 'nav', 'depth' => '5', 'fallback_cb' => 'wp_page_menu', 'items_wrap' => '<ul class="duplex-menu" id="%1$s">%3$s</ul>',  'walker' => new easyweb_webnus_description_walker() ) );}
			?>
		</div>
	</nav>
	<nav id="nav-wrap" class="full-menu-duplex">
		<div class="container">	
		<ul id="nav" class="main-menu"><?php
				if ( has_nav_menu( 'duplex-menu-left' ) ) { 
					wp_nav_menu( array( 'theme_location' => 'duplex-menu-left', 'container' => 'false', 'depth' => '5', 'items_wrap' => '%3$s', 'fallback_cb' => 'wp_page_menu', 'walker' => new easyweb_webnus_description_walker() ) );}
				if ( has_nav_menu( 'duplex-menu-right' ) ) { 
					wp_nav_menu( array( 'theme_location' => 'duplex-menu-right', 'container' => 'false', 'depth' => '5', 'items_wrap' => '%3$s', 'fallback_cb' => 'wp_page_menu', 'walker' => new easyweb_webnus_description_walker() ) );}
			?></ul>
		</div>
	</nav>
</div>
	<?php if ( $enable_breadcrumbs == 1 && $easyweb_webnus_options['easyweb_webnus_header_menu_type'] != '8' ) { ?>
		<div class="breadcrumbs-w">
			<div class="container">
				<?php if ( 'easyweb_webnus_breadcrumbs' ) easyweb_webnus_breadcrumbs(); ?>
			</div>
		</div>
	<?php }?>
</header>
<!-- end-header -->