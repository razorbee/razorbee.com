<?php
$easyweb_webnus_options = easyweb_webnus_options();
$easyweb_webnus_options['easyweb_webnus_enable_livesearch'] = isset($easyweb_webnus_options['easyweb_webnus_enable_livesearch']) ? $easyweb_webnus_options['easyweb_webnus_enable_livesearch'] : '' ;
$live_search = ($easyweb_webnus_options['easyweb_webnus_enable_livesearch'] == 1)?'live-search':'';
$enable_breadcrumbs		= isset( $easyweb_webnus_options['easyweb_webnus_enable_breadcrumbs'] ) ? $easyweb_webnus_options['easyweb_webnus_enable_breadcrumbs'] : '';
$hideheader = '';
if( is_page()){
$hideheader =rwmb_meta( 'easyweb_hide_header_meta' );
}
$mobile_sticky = isset( $easyweb_webnus_options['easyweb_webnus_header_sticky_phone'] ) && $easyweb_webnus_options['easyweb_webnus_header_sticky_phone'] == '1' ? ' mobistky ' : '' ;
?>
<header id="header"  class="horizontal-w <?php echo $mobile_sticky;  ?> <?php
$menu_icon = isset($easyweb_webnus_options['easyweb_webnus_header_menu_icon']) ? $easyweb_webnus_options['easyweb_webnus_header_menu_icon'] : '' ;
$menu_type = isset($easyweb_webnus_options['easyweb_webnus_header_menu_type']) ? $easyweb_webnus_options['easyweb_webnus_header_menu_type'] : '' ;
$easyweb_webnus_options['easyweb_webnus_header_color_type'] = isset($easyweb_webnus_options['easyweb_webnus_header_color_type']) ? $easyweb_webnus_options['easyweb_webnus_header_color_type'] : '' ;
$easyweb_webnus_options['easyweb_webnus_header_logo_alignment'] = isset($easyweb_webnus_options['easyweb_webnus_header_logo_alignment']) ? $easyweb_webnus_options['easyweb_webnus_header_logo_alignment'] : '' ;
$easyweb_webnus_options['easyweb_webnus_header_email'] = isset($easyweb_webnus_options['easyweb_webnus_header_email']) ? $easyweb_webnus_options['easyweb_webnus_header_email'] : '' ;
$easyweb_webnus_options['easyweb_webnus_header_phone'] = isset($easyweb_webnus_options['easyweb_webnus_header_phone']) ? $easyweb_webnus_options['easyweb_webnus_header_phone'] : '' ;
$easyweb_webnus_options['easyweb_webnus_header_address'] = isset($easyweb_webnus_options['easyweb_webnus_header_address']) ? $easyweb_webnus_options['easyweb_webnus_header_address'] : '' ;
if(!empty($menu_icon)) echo 'sm-rgt-mn ';
if($menu_type==9) echo 'box-menu ';
echo ($hideheader)? 'hi-header ' : '';
echo ' '.$easyweb_webnus_options['easyweb_webnus_header_color_type']
 ?>">
	<div  class="container">
		<?php if(!$menu_type==0){
			$logo_alignment = $easyweb_webnus_options['easyweb_webnus_header_logo_alignment'];
			if( 1 == $logo_alignment ) {
				echo '<div class="col-md-3 logo-wrap">';
			} elseif( 2 == $logo_alignment ) {
				echo '<div class="col-md-3 cntmenu-leftside"></div><div class="col-md-6 logo-wrap center">';
			} elseif( 3 == $logo_alignment ) {
				echo '<div class="col-md-3 logo-wrap right">';
			}
		}
		else {
			echo '<div class="col-md-12 logo-wrap center">';
		}
		?>
			<div class="logo">
<?php
$logo 					= isset( $easyweb_webnus_options['easyweb_webnus_logo']['url'] ) ? $easyweb_webnus_options['easyweb_webnus_logo']['url'] : '';
$logo_width 			= isset( $easyweb_webnus_options['easyweb_webnus_logo_width'] ) ? $easyweb_webnus_options['easyweb_webnus_logo_width'] : '';
$transparent_logo 		= isset( $easyweb_webnus_options['easyweb_webnus_transparent_logo']['url'] ) ? $easyweb_webnus_options['easyweb_webnus_transparent_logo']['url'] : '';
$transparent_logo_width = isset( $easyweb_webnus_options['easyweb_webnus_transparent_logo_width'] ) ? $easyweb_webnus_options['easyweb_webnus_transparent_logo_width'] : '';
$sticky_logo 			= isset( $easyweb_webnus_options['easyweb_webnus_sticky_logo']['url'] ) ? $easyweb_webnus_options['easyweb_webnus_sticky_logo']['url'] : '';
$sticky_logo_width 		= isset( $easyweb_webnus_options['easyweb_webnus_sticky_logo_width'] ) ? $easyweb_webnus_options['easyweb_webnus_sticky_logo_width'] : '150px';
$has_logo				= false; /* Check if there is one logo exists at least. */

if( !empty($logo) || !empty($transparent_logo) || !empty($sticky_logo) ) $has_logo = true;
if((TRUE === $has_logo)){
if(!empty($logo))
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="'. $logo_width . '" id="img-logo-w1" alt="'.get_bloginfo( "name" ).'" class="img-logo-w1" style="width: '. $logo_width . 'px"></a>';
if(!empty($transparent_logo))
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($transparent_logo).'" width="' . $transparent_logo_width . '" id="img-logo-w2" alt="'.get_bloginfo( "name" ).'" class="img-logo-w2" style="width: ' . $transparent_logo_width . 'px"></a>';
else 
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="'. (!empty($transparent_logo_width)?$transparent_logo_width:$logo_width). '" id="img-logo-w2" alt="'.get_bloginfo( "name" ).'" class="img-logo-w2" style="width: '. ( !empty($transparent_logo_width) ? $transparent_logo_width . 'px': $logo_width. 'px' ). '"></a>';
if(!empty($sticky_logo))
	echo '<span class="logo-sticky"><a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($sticky_logo).'" width="'. (!empty($sticky_logo_width)?$sticky_logo_width:"150"). '" id="img-logo-w3" alt="'.get_bloginfo( "name" ).'" class="img-logo-w3"></a></span>';
else 
	echo '<span class="logo-sticky"><a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="'. (!empty($sticky_logo_width)?$sticky_logo_width:$logo_width). '" id="img-logo-w3" alt="'.get_bloginfo( "name" ).'" class="img-logo-w3"></a></span>'; 
}else{ ?>
<a id="site-title" href="<?php echo esc_url(home_url( '/' )); ?>"><?php bloginfo( 'name' ); ?></a>
<span class="site-slog">
<a href="<?php echo esc_url(home_url( '/' )); ?>">
<?php             
	$slogan = isset($easyweb_webnus_options['easyweb_webnus_slogan']) ? $easyweb_webnus_options['easyweb_webnus_slogan'] : '' ;
	if( empty($slogan))
		bloginfo( 'description' );
	else
		echo esc_html($slogan);                       
?>
</a>
</span>
<?php } ?>
		</div></div>
	<?php if(!$menu_type==0){
		switch($logo_alignment){
			case 1:
				echo '<div class="col-md-9 alignright"><hr class="vertical-space" />';
			break;
			case 2:
				echo '<div class="col-md-3 right-side">';
			break;
			case 3:
				echo '<div class="col-md-9 left-side"><hr class="vertical-space" />';
			break;
			default:
			echo '';
		}
			$logo_rightside = isset($easyweb_webnus_options['easyweb_webnus_header_logo_rightside']) ? $easyweb_webnus_options['easyweb_webnus_header_logo_rightside'] : '' ;
			if( 1 == $logo_rightside ){
			?>
				<form action="<?php echo esc_url(home_url( '/' )); ?>" method="get">
				<input name="s" type="text" placeholder="<?php esc_html_e('Search...','easyweb') ?>" class="header-saerch <?php echo esc_attr( $live_search ); ?>" >
				</form>
			<?php }
			elseif(2 == $logo_rightside)
			{ ?>
				<h6><i class="sl-location-pin"></i><span><?php echo $easyweb_webnus_options['easyweb_webnus_header_email']; ?></span></h6>
				<h6><i class="sl-phone"></i><span><?php echo $easyweb_webnus_options['easyweb_webnus_header_phone']; ?></span></h6>
				<h6><i class="sl-envelope-open"></i><span><?php echo $easyweb_webnus_options['easyweb_webnus_header_address']; ?></span></h6>
			<?php }
			elseif(3 == $logo_rightside)
			{
				if(is_active_sidebar('header-advert'))
				dynamic_sidebar('header-advert');
				if(is_active_sidebar('woocommerce_header'))
				dynamic_sidebar('woocommerce_header');
			}
			?>
		</div>
		<?php } ?>
	</div>
	<?php
	$menu_alignment ='';
	if(!$menu_type==0){ 
		if($logo_alignment==3 ){
			$menu_alignment='left ';
		}elseif($logo_alignment==2 ){
			$menu_alignment='center ';
		}
	}
	?>
	<nav id="nav-wrap" class="nav-wrap2 <?php echo esc_attr( $menu_alignment );
		switch($menu_type){
			case 2:
				echo 'mn4';
				break;
			case 3:
				echo 'mn4 darknavi';
				break;
			case 5:
				echo 'darknavi';
				break;
			default:
				echo '';
		}
	?>">
		<div class="container">	
			<?php
			$onepage_menu = '';
			if(is_page()){
				$onepage_menu = rwmb_meta( 'easyweb_onepage_menu_meta' );
			}
			
				$menu_location = '';
				if($easyweb_webnus_options['easyweb_webnus_header_menu_type']==0){
					$menu_location = 'header-top-menu';
				}elseif($onepage_menu){
					$menu_location = 'onepage-header-menu';
				}else{					
					$menu_location = 'header-menu';
				}
				if ( has_nav_menu( $menu_location ) ) {
					wp_nav_menu( array( 'theme_location' => $menu_location, 'container' => 'false', 'menu_id' => 'nav', 'depth' => '5', 'fallback_cb' => 'wp_page_menu', 'items_wrap' => '<ul id="%1$s">%3$s</ul>',  'walker' => new easyweb_webnus_description_walker() ) );
				}
			?>
		</div>
	</nav>
	<?php if ( $enable_breadcrumbs == 1 ) { ?>
		<div class="breadcrumbs-w">
			<div class="container">
				<?php if ( 'easyweb_webnus_breadcrumbs' ) easyweb_webnus_breadcrumbs(); ?>
			</div>
		</div>
	<?php }?>
</header>
<!-- end-header -->