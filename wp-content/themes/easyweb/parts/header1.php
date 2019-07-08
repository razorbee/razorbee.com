<?php
$easyweb_webnus_options = easyweb_webnus_options();
$easyweb_webnus_options['easyweb_webnus_enable_livesearch'] = isset($easyweb_webnus_options['easyweb_webnus_enable_livesearch']) ? $easyweb_webnus_options['easyweb_webnus_enable_livesearch'] : '' ;
$live_search = ($easyweb_webnus_options['easyweb_webnus_enable_livesearch'] == 1)?'live-search':'';
$hideheader = '';
$enable_breadcrumbs		= isset( $easyweb_webnus_options['easyweb_webnus_enable_breadcrumbs'] ) ? $easyweb_webnus_options['easyweb_webnus_enable_breadcrumbs'] : '';
if( is_page()){
$hideheader =rwmb_meta( 'easyweb_hide_header_meta' );
}
// News Ticker
$news_ticker	= isset( $easyweb_options['easyweb_webnus_news_ticker'] ) ? $easyweb_options['easyweb_webnus_news_ticker'] : '';

$mobile_sticky	= $easyweb_webnus_options['easyweb_webnus_header_sticky_phone'] == '1' ? ' mobistky ' : '' ;
?>
<header id="header" class="horizontal-w <?php echo $mobile_sticky;  ?> <?php $menu_icon = isset($easyweb_webnus_options['easyweb_webnus_header_menu_icon']) ? $easyweb_webnus_options['easyweb_webnus_header_menu_icon'] : '' ; 
$menu_type = isset($easyweb_webnus_options['easyweb_webnus_header_menu_type']) ? $easyweb_webnus_options['easyweb_webnus_header_menu_type'] : '' ;
$easyweb_webnus_options['easyweb_webnus_header_color_type'] = isset($easyweb_webnus_options['easyweb_webnus_header_color_type']) ? $easyweb_webnus_options['easyweb_webnus_header_color_type'] : '' ;
$easyweb_webnus_options['easyweb_webnus_header_search_enable'] = isset($easyweb_webnus_options['easyweb_webnus_header_search_enable']) ? $easyweb_webnus_options['easyweb_webnus_header_search_enable'] : '' ;
if(!empty($menu_icon)) echo ' sm-rgt-mn ';
if($menu_type==10) echo ' w-header-type-10 ';
echo ($hideheader)? ' hi-header ' : '';
echo ' '.$easyweb_webnus_options['easyweb_webnus_header_color_type']
 ?>">
<div class="container">
<div class="col-md-3 col-sm-3 logo-wrap">
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
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="' . $logo_width . '" id="img-logo-w1" alt="'.get_bloginfo( "name" ).'" class="img-logo-w1" style="width: '. $logo_width . 'px"></a>';
if(!empty($transparent_logo))
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($transparent_logo).'" width="' . $transparent_logo_width . '" id="img-logo-w2" alt="'.get_bloginfo( "name" ).'" class="img-logo-w2" style="width: ' . $transparent_logo_width  . 'px"></a>';
else 
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="' . (!empty($transparent_logo_width)?$transparent_logo_width:$logo_width) . '" id="img-logo-w2" alt="' .get_bloginfo( "name" ).'" class="img-logo-w2" style="width: '. ( !empty($transparent_logo_width) ? $transparent_logo_width : $logo_width ). '"></a>';

if(!empty($sticky_logo))
	echo '<span class="logo-sticky"><a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($sticky_logo).'" width="' . $sticky_logo_width . '" id="img-logo-w3" alt="'.get_bloginfo( "name" ).'" class="img-logo-w3"></a></span>';
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
<?php } ?></div></div>
<nav id="nav-wrap" class="nav-wrap1 col-md-9 col-sm-9">
	<div class="container">
		<?php 
		if(is_active_sidebar('woocommerce_header')) {
			dynamic_sidebar('woocommerce_header');
		} 
		if($easyweb_webnus_options['easyweb_webnus_header_search_enable']){			
		?>
		<div id="search-form">
		<a href="javascript:void(0)" class="search-form-icon"><i id="searchbox-icon" class="fa-search"></i></a>
	<div id="search-form-box" class="search-form-box">
			<form action="<?php echo esc_url(home_url( '/' )); ?>" method="get">
				<input type="text" class="search-text-box <?php echo esc_attr( $live_search ); ?>" id="search-box" name="s">
			</form>
			</div>
		</div>
		<?php }

// OnePage Menu
			$onepage_menu = '';
			if(is_page()){
				$onepage_menu = rwmb_meta( 'easyweb_onepage_menu_meta' );
			}

			if($onepage_menu){
				if ( has_nav_menu( 'onepage-header-menu' ) ) { 
					wp_nav_menu( array( 'theme_location' => 'onepage-header-menu', 'container' => 'false', 'menu_id' => 'nav', 'depth' => '5', 'fallback_cb' => 'wp_page_menu', 'items_wrap' => '<ul id="%1$s">%3$s</ul>',  'walker' => new easyweb_webnus_description_walker()) );	
				}
			}
			else{
				if ( has_nav_menu( 'header-menu' ) ) { 
					wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => 'false', 'menu_id' => 'nav', 'depth' => '5', 'fallback_cb' => 'wp_page_menu', 'items_wrap' => '<ul id="%1$s">%3$s</ul>',  'walker' => new easyweb_webnus_description_walker()) );
				}
			}
			?>
	</div>
</nav>
</div>
	<?php 		
		if( $news_ticker ) :
			get_template_part( 'parts/news-ticker' );
		endif;
	?>
	<?php if ( $enable_breadcrumbs == 1 ) { ?>
	<div class="breadcrumbs-w">
		<div class="container">
			<?php if ( 'easyweb_webnus_breadcrumbs' ) easyweb_webnus_breadcrumbs(); ?>
		</div>
	</div>
	<?php }?>
</header>
<!-- end-header -->