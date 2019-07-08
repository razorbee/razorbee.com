<?php
// Add Localization
load_theme_textdomain('easyweb', get_template_directory().'/languages');

// Include inc folder files
include_once get_template_directory(). '/inc/init.php';

// Sets up theme defaults and registers support for various WordPress features
add_action( 'after_setup_theme', 'easyweb_webnus_theme_setup' );
function easyweb_webnus_theme_setup() {
	add_theme_support('title-tag');
	add_theme_support('woocommerce');
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-formats', array( 'aside','gallery', 'link', 'quote','image','video','audio' ));

	// webnus thumbnails
	add_image_size("easyweb_webnus_tabs_img",		164, 124, true);
	add_image_size("easyweb_webnus_thumb300x200",	300, 200, true);
	add_image_size("easyweb_webnus_blog3_thumb",	420, 280, true);
	add_image_size("easyweb_webnus_blog2_thumb",	420, 330, true);
	add_image_size("easyweb_webnus_square",			460, 460, true);
	add_image_size("easyweb_webnus_latest_cover",	690, 460, true);
	add_image_size("easyweb_webnus_latestfromblog",	720, 388, true);

	add_action('init', 'easyweb_webnus_register_menus');
	add_action('widgets_init', 'easyweb_webnus_sidebar_init');
	add_action('wp_enqueue_scripts', 'easyweb_webnus_script_loader');
	add_action('wp_enqueue_scripts', 'easyweb_webnus_api', 10);
	add_action('admin_enqueue_scripts', 'easyweb_webnus_admin_enqueue' );
	add_action('wp_head', 'easyweb_webnus_wphead_action');
	add_action('login_head', 'easyweb_webnus_custom_login_logo' );
	add_action('wp_head', 'easyweb_webnus_open_graph_tags');
	add_action('admin_bar_menu', 'easyweb_webnus_admin_bar_link',25);
	add_action('template_redirect', 'easyweb_webnus_maintenance_mode');
	add_action( 'admin_bar_menu', 'remove_redux_themeoption_from_adminbar', 999 );

	add_filter('excerpt_length', 'easyweb_webnus_excerpt_length', 999);
	add_filter('excerpt_more', 'easyweb_webnus_excerpt_more');
	add_filter('the_content_more_link', 'easyweb_webnus_excerpt_more');
	add_filter('upload_mimes', 'easyweb_webnus_custom_font_mimes');
	add_filter('body_class', 'easyweb_webnus_body_classes');

	update_option( 'image_default_link_type', 'file' );
}

// Globals should always be within a function
function easyweb_webnus_options() {
	global $easyweb_webnus_options;
	return $easyweb_webnus_options;
}

/***************************************/
/*	    Maintenance Mode
/***************************************/
function easyweb_webnus_maintenance_mode() {
	$easyweb_webnus_options = easyweb_webnus_options();
	$is_maintenance = isset( $easyweb_webnus_options['easyweb_webnus_maintenance_mode'] ) ? $easyweb_webnus_options['easyweb_webnus_maintenance_mode'] : '';
	$maintenance_page = isset($easyweb_webnus_options['easyweb_webnus_maintenance_page']) ? $easyweb_webnus_options['easyweb_webnus_maintenance_page'] : '';
    if (!is_page( $maintenance_page ) && $is_maintenance && $maintenance_page && !current_user_can('edit_posts') && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ))){
        wp_redirect( esc_url( home_url( 'index.php?page_id='.$maintenance_page) ) );
        exit();
    }
}

/***************************************/
/*	    General Sidebars
/***************************************/

function easyweb_webnus_sidebar_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'easyweb' ),
		'id'            => 'left-sidebar',
		'description'   => esc_html__( 'Appears in left side in the blog page.', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="subtitle-wrap"><h4 class="subtitle">',
		'after_title'   => '</h4></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'easyweb' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Appears in right side in the blog page.', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="subtitle-wrap"><h4 class="subtitle">',
		'after_title'   => '</h4></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Custom Sidebar', 'easyweb' ),
		'id'            => 'custom-sidebar',
		'description'   => esc_html__( 'Appears in custom pages.', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="subtitle-wrap"><h4 class="subtitle">',
		'after_title'   => '</h4></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Toggle Top Area Section 1', 'easyweb' ),
		'id'            => 'top-area-1',
		'description'   => esc_html__( 'Appears in top area section 1', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Toggle Top Area Section 2', 'easyweb' ),
		'id'            => 'top-area-2',
		'description'   => esc_html__( 'Appears in top area section 2', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Toggle Top Area Section 3', 'easyweb' ),
		'id'            => 'top-area-3',
		'description'   => esc_html__( 'Appears in top area section 3', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Toggle Top Area Section 4', 'easyweb' ),
		'id'            => 'top-area-4',
		'description'   => esc_html__( 'Appears in top area section 4', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer Section 1', 'easyweb' ),
		'id'            => 'footer-section-1',
		'description'   => esc_html__( 'Appears in footer section 1', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Section 2', 'easyweb' ),
		'id'            => 'footer-section-2',
		'description'   => esc_html__( 'Appears in footer section 2', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer Section 3', 'easyweb' ),
		'id'            => 'footer-section-3',
		'description'   => esc_html__( 'Appears in footer section 3', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Section 4', 'easyweb' ),
		'id'            => 'footer-section-4',
		'description'   => esc_html__( 'Appears in footer section 4', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
	) );



	  register_sidebar( array(
		'name' => esc_html__( 'WooCommerce Page Sidebar', 'easyweb' ),
		'id' => 'shop-widget-area',
		'description' => esc_html__( 'Product page widget area', 'easyweb' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3><div class="sidebar-line"><span></span></div>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Header Sidebar', 'easyweb' ),
		'id' => 'header-advert',
		'description' => esc_html__( 'Header Sidebar', 'easyweb' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="subtitle">',
		'after_title' => '</h5>',
	) );

	    if(function_exists('is_woocommerce')) {

        register_sidebar(array(
            'name' => 'WooCommerce Header Widget Area',
            'id' => 'woocommerce_header',
            'description' => esc_html__('This widget area should be used only for WooCommerce header cart widget', 'easyweb' ),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        ));
}

}

/***************************************/
/*	    Excerpt Length
/***************************************/

function easyweb_webnus_excerpt_length($length) {
    return 300;
}

function easyweb_webnus_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	// $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

function easyweb_webnus_excerpt_more($more) {
	$easyweb_webnus_options = easyweb_webnus_options();
	$easyweb_webnus_options['easyweb_webnus_blog_readmore_text'] = isset($easyweb_webnus_options['easyweb_webnus_blog_readmore_text']) ? $easyweb_webnus_options['easyweb_webnus_blog_readmore_text'] : '' ;
	global $post;
	return '... <br><br><a class="readmore" href="' . get_permalink($post->ID) . '">' . esc_html($easyweb_webnus_options['easyweb_webnus_blog_readmore_text']) . '</a>';
}


/*********************/
/*	    LOGIN
/*********************/

function easyweb_webnus_login() {
	global $user_ID, $user_identity;
	if ($user_ID) : ?>
		<div id="user-logged">
			<span class="author-avatar"><?php echo get_avatar( $user_ID, $size = '100'); ?></span>
			<div class="user-welcome"><?php esc_html_e('Welcome','easyweb'); ?> <strong><?php echo esc_html($user_identity) ?></strong></div>
			<ul class="logged-links">
				<li><a href="<?php echo esc_url(home_url('/wp-admin/')); ?>"><?php esc_html_e('Dashboard','easyweb'); ?> </a></li>
				<li><a href="<?php echo esc_url(home_url('/wp-admin/profile.php')); ?>"><?php esc_html_e('My Profile','easyweb'); ?> </a></li>
				<li><a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>"><?php esc_html_e('Logout','easyweb'); ?> </a></li>
			</ul>
			<div class="clear"></div>
		</div>
	<?php else: ?>
		<h3 class="user-login-title"><?php esc_html_e( 'Account Login', 'easyweb' ); ?></h3>
		<div id="user-login">
		<?php wp_login_form(array('label_username' => esc_html__( 'Username','easyweb' ),'label_password' => esc_html__( 'Password','easyweb' ),'label_remember' => esc_html__( 'Remember Me','easyweb' ),
		'label_log_in'   => esc_html__( 'Log In','easyweb' ),));?>
			<ul class="login-links">
				<?php if ( get_option('users_can_register') ) : ?><?php echo wp_register() ?><?php endif; ?>
				<li><a href="<?php echo esc_url(wp_lostpassword_url(get_permalink()))?>"><?php esc_html_e('Foreget Password?','easyweb'); ?></a></li>
			</ul>
		</div>
	<?php endif;
}


/****************************/
/*	   Navigation Menu
/****************************/

/** Register Menus */
function easyweb_webnus_register_menus() {
	register_nav_menus(
		array(
			'header-menu' => esc_html__('Header Menu', 'easyweb'),
			'duplex-menu-left' => esc_html__('Duplex Menu - Left', 'easyweb'),
			'duplex-menu-right' => esc_html__('Duplex Menu - Right', 'easyweb'),
			'footer-menu' => esc_html__('Footer Menu', 'easyweb'),
			'header-top-menu' => esc_html__('Topbar Menu', 'easyweb'),
			'onepage-header-menu' => esc_html__('Onepage Header Menu', 'easyweb'),
		)
	);
}

/** Walker Nav Menu */
class easyweb_webnus_description_walker extends Walker_Nav_Menu{
	function start_el(&$output, $item, $depth=0, $args=array(),$current_object_id=0){
		$this->curItem = $item;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		$is_mega_menu = '';
		if('page'  == $item->object){
			$post_obj = get_post( $item->object_id, 'OBJECT' );
			$is_mega = get_post_meta($item->object_id,'easyweb_mega_menu_meta',true);
			if(!empty($is_mega))
				$is_mega_menu .= ' mega ';
		}
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
		$attributes = '';
		$item_output = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		if('page'  == $item->object){
			$post_obj = get_post( $item->object_id, 'OBJECT' );
			$is_mega = get_post_meta($item->object_id,'easyweb_mega_menu_meta',true);
			if(!empty($is_mega))
				$item_output .= do_shortcode($post_obj->post_content);
			else {
				$item_output .= $args->before;

/** colorize categories in menu */
				$color ='';
				if ($item->object == 'category'){
					$cat_data = get_option("category_$item->object_id");
					$color = (!empty($cat_data['catBG']))?'style="color:'. $cat_data['catBG'] .'"':'';
				}
				$item_output .= '<a '. $color . $attributes. ' data-description="' .$item->description .'">';
				if(!empty($item->icon))
				$item_output .= '<i class="'.$item->icon.'"></i>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= '</a>';
				$item_output .= $args->after;
			}
		}
		else{
			$item_output .= $args->before;
			$item_output .= '<a '. $attributes. ' data-description="' .$item->description .'">';
			if(!empty($item->icon))
				$item_output .= '<i class="'.$item->icon.'"></i>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
		}

/** mega posts start */
		if ( $depth == 0 && $item->object == 'category' && $item->classes['0'] == "mega" ) {
			$item_output .= '<ul class="sub-posts">';
				global $post;
				$menuposts = get_posts( array( 'posts_per_page' => 4, 'category' => $item->object_id ) );
				foreach( $menuposts as $post ):
					$post_title = get_the_title();
					$post_link = get_permalink();
					$post_time = get_the_time(get_option( 'date_format' ));
					$post_comments = get_comments_number();
					$post_views = easyweb_webnus_getViews(get_the_ID());
					$post_image = wp_get_attachment_image_src( get_post_thumbnail_id(), "easyweb_webnus_latestfromblog" );
					if ( $post_image != ''){
						$menu_post_image = '<img src="' . $post_image[0]. '" alt="' . $post_title . '" width="' . $post_image[1]. '" height="' . $post_image[2]. '" />';
					} else {
						$menu_post_image = esc_html__( 'No image','easyweb');
					}
					$item_output .= '
							<li>
								<figure>
									<a href="'  .esc_url($post_link) . '">' . $menu_post_image . '</a>
								</figure>
								<h5><a href="' . esc_url($post_link) . '">' . $post_title . '</a></h5>
							</li>';
				endforeach;
				wp_reset_postdata();
			$item_output .= '</ul>';
		}
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


/****************************/
/*		Enqueue Scripts
/***************************/
include_once get_template_directory() . '/inc/dynamicfiles/dyncss.php';

// Webnus Google Fonts
function easyweb_webnus_google_fonts_url() {
    $fonts_url 		= '';
    $font_families	= array();
    $subsets		= 'latin,latin-ext';

    // Default typography
    if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'easyweb' ) ) {
        $font_families[] = 'Open Sans:400,300,400italic,600,700,700italic,800';
    }
    if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'easyweb' ) ) {
        $font_families[] = 'Merriweather:400,400italic,700,700italic';
    }
    if ( 'off' !== _x( 'on', 'Lora font: on or off', 'easyweb' ) ) {
        $font_families[] = 'Lora:400,400italic,700,700italic';
    }
    if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'easyweb' ) ) {
        $font_families[] = 'Poppins:300,400,500,600,700';
    }

    if ( $font_families ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

    return esc_url( $fonts_url );
}

function easyweb_webnus_script_loader(){
	$easyweb_webnus_options = easyweb_webnus_options();

	$w_theme = wp_get_theme();
	$w_version = $w_theme->get('Version');

// main style
	$main_style_uri = ($easyweb_webnus_options['easyweb_webnus_css_minifier'])?get_template_directory_uri().'/css/master-min.php':get_template_directory_uri().'/css/master.css';
	wp_register_style( 'main-style', $main_style_uri,false,$w_version);
	wp_enqueue_style('main-style');

// dyncss
	if ( easyweb_webnus_dyncss_output() ) {
		wp_enqueue_style( 'webnus-dynamic-styles', get_template_directory_uri() . '/css/dyncss.css' );
		wp_add_inline_style( 'webnus-dynamic-styles', easyweb_webnus_dyncss_output() );
	}

// google font
	wp_enqueue_style( 'webnus-google-fonts', easyweb_webnus_google_fonts_url(), array(), null );

// Custom Google Fonts
	// w-r-r wp_enqueue_style( 'custom-google-fonts', $easyweb_webnus_options['easyweb_webnus_get_google_fonts'] );


// Comment Reply JS
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

// Webnus JS
	wp_enqueue_script('doubletab', get_template_directory_uri() . '>/js/jquery.plugins.js', array( 'jquery' ), null, true);
	if(!is_single())
		wp_enqueue_script('msaonry', get_template_directory_uri() . '/js/jquery.masonry.min.js', array( 'jquery' ), null, true);
	if($easyweb_webnus_options['easyweb_webnus_news_ticker'])
		wp_enqueue_script('ticker', get_template_directory_uri() . '/js/jquery.ticker.js', array( 'jquery' ), null, true);
	wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/js/webnus-custom.js', array( 'jquery' ), null, true );

// Woocommerce js error hack
	if (class_exists('Woocommerce')){
		global $post, $woocommerce;
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		if(file_exists($woocommerce->plugin_path() . '/assets/js/jquery-cookie/jquery.cookie'.$suffix.'.js')){
			rename($woocommerce->plugin_path() . '/assets/js/jquery-cookie/jquery.cookie'.$suffix.'.js', $woocommerce->plugin_path() . '/assets/js/jquery-cookie/jquery_cookie'.$suffix.'.js');
		}
		wp_deregister_script( 'jquery-cookie' );
		wp_register_script( 'jquery-cookie', $woocommerce->plugin_url() . '/assets/js/jquery-cookie/jquery_cookie'.$suffix.'.js', array( 'jquery' ), '1.3.1', true );
	}
}

function easyweb_webnus_api() {
	// Google Map api
	$easyweb_webnus_options = easyweb_webnus_options();
	$api_code 		= ( isset( $easyweb_webnus_options['easyweb_google_map_api'] ) && $easyweb_webnus_options['easyweb_google_map_api'] ) ? 'key=' . $easyweb_webnus_options['easyweb_google_map_api'] : '';
	$sign_in 		= ( isset( $easyweb_webnus_options['easyweb_google_map_api_sign_in'] ) && $easyweb_webnus_options['easyweb_google_map_api_sign_in'] ) ? 'signed_in=true' : '';
	$init_query 	= ( $api_code || $sign_in ) ? '?' : '';
	$merge_query 	= $api_code ? '&' : '';
	wp_register_script( 'easyweb-googlemap-api', 'https://maps.googleapis.com/maps/api/js' . $init_query . $api_code . $merge_query . $sign_in, array(), false, false );

	// youtube
	wp_register_script( 'youtube-api', get_template_directory_uri() . '/js/youtube-api.js', array(), false, false );
}

/****************************/
/*	Admin Enqueue Scripts
/****************************/

function easyweb_webnus_admin_enqueue() {
// IconFonts Style
	wp_enqueue_style( 'iconfonts-style', get_template_directory_uri() . '/css/iconfonts.css', null, null );
	wp_enqueue_style( 'sweetalert', get_template_directory_uri() . '/css/sweetalert.min.css', array(), 'all' );

	wp_enqueue_style( 'webnus-admin-style', get_template_directory_uri() .'/inc/webnus-admin-welcome/assets/css/webnus-admin.css', array(), 'all' );

// Webnus Admin JS
	wp_enqueue_script( 'sweetalert', get_template_directory_uri() . '/js/sweetalert.min.js', array(), null, true );
	wp_enqueue_script( 'easyweb-custom-scripts', get_template_directory_uri() . '/js/webnus-custom-admin.js', array( 'jquery' ), null, true );
}


/************************************************************/
/*	Add Page Background & Typekit & Header Area to Header
/************************************************************/

function easyweb_webnus_page_background_override(){
	$wrap_color	= rwmb_meta( 'easyweb_wrap_color_meta' );
	$bgcolor	= rwmb_meta( 'easyweb_body_bg_color_meta' );
	$bgimages	= rwmb_meta( 'easyweb_body_bg_img_meta' );
	$bgimage	= '';
	if ( $bgimages ) :
		foreach ( $bgimages as $bgimage ) :
			$bgimage = $bgimage['full_url'];
		endforeach;
	endif;
	$bgpercent	= rwmb_meta( 'easyweb_body_bg_image_100_meta' );
	$bgrepeat	= rwmb_meta( 'easyweb_body_bg_image_repeat_meta' );
		$out = "";
		$out .= '<style type="text/css" media="screen">body{ ';
		if(!empty($bgcolor)) {
			$out .= "background-image:url('');background-color:{$bgcolor};";
		}
		if(!empty($bgimage)) {
			if($bgrepeat == 1)
				$out .=  " background-image:url('{$bgimage}'); background-repeat:repeat;";
			else if($bgrepeat==2)
				$out .=  " background-image:url('{$bgimage}'); background-repeat:repeat-x;";
			else if($bgrepeat==3)
				$out .=  " background-image:url('{$bgimage}'); background-repeat:repeat-y;";
			else if($bgrepeat==0) {
				if($bgpercent)
					$out .=  " background-image:url('{$bgimage}'); background-repeat:no-repeat; background-size:100% auto; ";
				else
					$out .=  " background-image:url('{$bgimage}'); background-repeat:no-repeat; ";
			}
		}
	if($bgpercent && !empty($bgimage)){
		$out .= 'background-size:cover; background-attachment:fixed; background-position:center;';
	}
	if($wrap_color){
		$out .= '} #wrap{background:'.$wrap_color.';';
		if ( $bgimage ) {
			$out .= 'background: none;';
		}
	}
	if ( !$wrap_color && $bgimage ) {
		$out .= '} #wrap{background: none;';
	}
	$out .= ' }</style>';
	echo $out;
}

function easyweb_webnus_wphead_action(){
	$easyweb_webnus_options = easyweb_webnus_options();

// Header Area
	// w-r-r echo $easyweb_webnus_options['easyweb_webnus_background_image_style'];
	echo isset( $easyweb_webnus_options['easyweb_webnus_space_before_head'] ) ? $easyweb_webnus_options['easyweb_webnus_space_before_head'] : '';

// Page Background
	global $post;
	if(!is_404() && isset($post))
		easyweb_webnus_page_background_override(); // referred to up

// Typekit
	$w_adobe_typekit = ltrim ( isset( $easyweb_webnus_options['easyweb_webnus_typekit_id'] ) ? $easyweb_webnus_options['easyweb_webnus_typekit_id'] : '' );
    if(isset($w_adobe_typekit ) && !empty($w_adobe_typekit ))
        echo '<script src="//use.typekit.net/'.$w_adobe_typekit.'.js"></script><script>try{Typekit.load();}catch(e){}</script>';
}


/*******************************/
/*		Custom Admin Logo
/******************************/

function easyweb_webnus_custom_login_logo() {
	$easyweb_webnus_options = easyweb_webnus_options();
    $logo = isset($easyweb_webnus_options['easyweb_webnus_admin_login_logo']['url'])? $easyweb_webnus_options['easyweb_webnus_admin_login_logo']['url'] : '' ;
    if(isset($logo) && !empty($logo))
		echo '<style type="text/css">h1 a { background-image:url('.$logo.') !important; }</style>';
}


/*************************/
/*		Open Graph
**************************/

function easyweb_webnus_my_excerpt($text, $excerpt){
    if ($excerpt) return $excerpt;
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', 55);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $words = preg_split("/[\n
	 ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
    } else {
            $text = implode(' ', $words);
    }
    return apply_filters('wp_trim_excerpt', $text, $excerpt);
}


function easyweb_webnus_open_graph_tags() {
	if (is_single()) {
		global $post;
		if(get_the_post_thumbnail($post->ID, 'thumbnail')) {
			$thumbnail_id = get_post_thumbnail_id($post->ID);
			$thumbnail_object = get_post($thumbnail_id);
			$image = $thumbnail_object->guid;
		} else {
			$image = ''; // Change this to the URL of the logo you want beside your links shown on Facebook
		}
		$description = easyweb_webnus_my_excerpt( $post->post_content, $post->post_excerpt );
		$description = strip_tags($description);
		$description = str_replace("\"", "'", $description);
		?>
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="<?php echo esc_url($image); ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<meta property="og:description" content="<?php echo esc_attr($description); ?>" />
		<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
		<?php
	}
}


/**************************/
/*		Post View
/**************************/

function easyweb_webnus_setViews($postID) {
    $count_key = 'easyweb_webnus_views';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
    return $count;
}
function easyweb_webnus_getViews($postID) {
    $count_key = 'easyweb_webnus_views';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
	}
    return $count;
}


/*******************************/
/*	 Add to Admin Bar Menu
/******************************/

// Add Webnus Theme Options To Admin Menu
function easyweb_webnus_admin_bar_link() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
	'id' => 'easyweb_webnus_themeoption_link',
	'title' => esc_html__( 'Webnus Theme Option','easyweb'),
	'href' => site_url().'/wp-admin/themes.php?page=easyweb_webnus_theme_options',
	) );
}


/********************************/
/*   	Custom Functions
/********************************/

// MIMETYPE fonts
function easyweb_webnus_custom_font_mimes ( $existing_mimes=array() ) {
	$existing_mimes['woff'] = 'application/x-font-woff';
	$existing_mimes['ttf'] = 'application/x-font-ttf';
	$existing_mimes['eot'] = 'application/vnd.ms-fontobject"';
	return $existing_mimes;
}

// Validates a field's length.
if ( ! function_exists( 'easyweb_webnus_validate_length' ) ) {
	function easyweb_webnus_validate_length( $fieldValue, $minLength ) {
		return ( strlen( trim( $fieldValue ) ) > $minLength );
	}
}


if(function_exists('vc_set_as_theme')){
	add_action('init','easyweb_webnus_set_vc_as_theme');
	function easyweb_webnus_set_vc_as_theme(){vc_set_as_theme($notifier = false);}
}
if (!isset($content_width)){$content_width = 940;}
if(false){wp_link_pages(); posts_nav_link(); paginate_links(); the_tags();get_post_format(0);}



/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function easyweb_webnus_body_classes( $classes ) {
	$easyweb_webnus_options = easyweb_webnus_options();
	// Transparent Header
	$transparent_header = '';
	if(is_page()){
		$transparent_header = rwmb_meta( 'easyweb_transparent_header_meta' );
	}
	$classes[] = ($transparent_header=='light')?esc_attr( ' transparent-header-w' ):'';
	$classes[] = ($transparent_header=='dark')?esc_attr( ' transparent-header-w t-dark-w' ):'';

	// Post Show
	if (is_single()){
		$post_meta = rwmb_meta( 'easyweb_blogpost_meta' );
		if(!empty($post_meta)){
			if($post_meta=="postshow1" && $thumbnail_id = get_post_thumbnail_id()){
				$classes[] = esc_attr( " postshow1-hd transparent-header-w t-dark-w" );
			} elseif ( $post_meta=="postshow2" && $thumbnail_id = get_post_thumbnail_id() ) {
				$classes[] = esc_attr( " postshow2-hd" );
			}
		}
	}
	$easyweb_webnus_options['easyweb_webnus_header_topbar_enable'] = isset($easyweb_webnus_options['easyweb_webnus_header_topbar_enable']) ? $easyweb_webnus_options['easyweb_webnus_header_topbar_enable'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_fixed'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_fixed']) ? $easyweb_webnus_options['easyweb_webnus_topbar_fixed'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_enable_smoothscroll'] = isset($easyweb_webnus_options['easyweb_webnus_enable_smoothscroll']) ? $easyweb_webnus_options['easyweb_webnus_enable_smoothscroll'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_header_menu_type'] = isset($easyweb_webnus_options['easyweb_webnus_header_menu_type']) ? $easyweb_webnus_options['easyweb_webnus_header_menu_type'] : '' ;
	// topbar
	$classes[] =($easyweb_webnus_options['easyweb_webnus_header_topbar_enable'])?esc_attr( ' has-topbar-w' ):'';
	$classes[] =($easyweb_webnus_options['easyweb_webnus_topbar_fixed'])?esc_attr( ' topbar-fixed' ):'';

	// smooth scroll
	$classes[] = $easyweb_webnus_options['easyweb_webnus_enable_smoothscroll'] ? esc_attr( ' smooth-scroll' ) : '';

	// header 11
	$classes[] = $easyweb_webnus_options['easyweb_webnus_header_menu_type'] == '11' ? esc_attr( ' has-header-type11' ) : '';

	// whmcs
	if ( get_option('cc_whmcs_bridge_template') ) :
		$classes[] = get_option('cc_whmcs_bridge_template') == 'five' ? esc_attr( ' webnus-whmcs-t5' ) : esc_attr( ' webnus-whmcs-t6' );
	endif;

	return $classes;
}


/********************************/
/*   	Template Tags
/********************************/
function easyweb_webnus_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-info">
			<?php echo get_avatar( $comment, 90 ); ?>
			<cite>
				<?php comment_author_link() ?> :
				<span class="comment-data"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F j, Y'); ?> at <?php comment_time('g:i a'); ?></a><?php edit_comment_link('Edit',' | ',''); ?></span>
			</cite>
		</div>
		<div class="comment-text">
			<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php esc_html_e('Your comment is awaiting moderation.','easyweb'); ?></em></p>
			<?php endif; ?>
			<?php comment_text() ?>
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</div>
		</div>
<?php }

function easyweb_webnus_topbar($pos){
	$easyweb_webnus_options = easyweb_webnus_options();
	$class=($pos=='left')?'lftflot':'rgtflot';
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	echo '<div class="top-links '.$class.'">';

	$easyweb_webnus_options['easyweb_webnus_topbar_button_link'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_button_link']) ? $easyweb_webnus_options['easyweb_webnus_topbar_button_link'] : '';
	$easyweb_webnus_options['easyweb_webnus_topbar_search'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_search']) ? $easyweb_webnus_options['easyweb_webnus_topbar_search'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_social'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_social']) ? $easyweb_webnus_options['easyweb_webnus_topbar_social'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_login'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_login']) ? $easyweb_webnus_options['easyweb_webnus_topbar_login'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_polylang_flags'] = isset($easyweb_webnus_options['easyweb_webnus_polylang_flags']) ? $easyweb_webnus_options['easyweb_webnus_polylang_flags'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_contact'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_contact']) ? $easyweb_webnus_options['easyweb_webnus_topbar_contact'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_info'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_info']) ? $easyweb_webnus_options['easyweb_webnus_topbar_info'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_address'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_address']) ? $easyweb_webnus_options['easyweb_webnus_topbar_address'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_email'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_email']) ? $easyweb_webnus_options['easyweb_webnus_topbar_email'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_phone'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_phone']) ? $easyweb_webnus_options['easyweb_webnus_topbar_phone'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_menu'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_menu']) ? $easyweb_webnus_options['easyweb_webnus_topbar_menu'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_header_menu_type'] = isset($easyweb_webnus_options['easyweb_webnus_header_menu_type']) ? $easyweb_webnus_options['easyweb_webnus_header_menu_type'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_custom'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_custom']) ? $easyweb_webnus_options['easyweb_webnus_topbar_custom'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_text'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_text']) ? $easyweb_webnus_options['easyweb_webnus_topbar_text'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_topbar_language'] = isset($easyweb_webnus_options['easyweb_webnus_topbar_language']) ? $easyweb_webnus_options['easyweb_webnus_topbar_language'] : '' ;

	if( $easyweb_webnus_options['easyweb_webnus_topbar_custom_button']==$pos && $easyweb_webnus_options['easyweb_webnus_topbar_button_link'] ) {
		echo '<a href="' . esc_url_raw( $easyweb_webnus_options['easyweb_webnus_topbar_button_link'] ) . '" class="topbar-btn">' . $easyweb_webnus_options['easyweb_webnus_topbar_button_text'] . '</a>';
	}

	if($easyweb_webnus_options['easyweb_webnus_topbar_search']==$pos){
		echo '<form id="topbar-search" role="search" action="'.esc_url(home_url( '/' )).'" method="get" ><input name="s" type="text" class="search-text-box" ><i class="search-icon fa-search"></i></form>';
	}

	if ($easyweb_webnus_options['easyweb_webnus_topbar_social']==$pos){
		echo '<div class="socialfollow">';
		get_template_part('parts/social' );
		echo '</div>';
	}


	if ($easyweb_webnus_options['easyweb_webnus_topbar_login']==$pos){
		$login_text = $easyweb_webnus_options['easyweb_webnus_topbar_login_text'];
		if ( is_user_logged_in() ) {
			global $user_identity;
			$login_text = esc_html__('Welcome ','easyweb') . esc_html($user_identity);
		}
		$login_class =(is_plugin_active('user-pro/index.php'))? 'popup-login':'inlinelb';


		echo '<a href="#w-login" class="' . $login_class . ' topbar-login" target="_self">'.esc_html($login_text).'</a>
		<div style="display:none"><div id="w-login" class="w-login">';
		easyweb_webnus_login();
		echo '</div></div>';
	}
	// PolyLang flags
	if ( is_plugin_active('polylang/polylang.php' ) && $easyweb_webnus_options['easyweb_webnus_topbar_language']==$pos ) :
		echo '<div class="polylang-flags">';
			pll_the_languages(array('show_flags'=>1,'show_names'=>0));
		echo '</div>';
	endif; // is_plugin_active('polylang/polylang.php' ) && $easyweb_webnus_options['easyweb_webnus_topbar_language']==$pos

	if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) && $easyweb_webnus_options['easyweb_webnus_topbar_language']==$pos ) {
        do_action('wpml_add_language_selector');
    }
    // WPML dropdown
	if($easyweb_webnus_options['easyweb_webnus_topbar_contact']==$pos){
		echo'<a class="inlinelb topbar-contact" href="#w-contact" target="_self">'.esc_html__('CONTACT','easyweb').'</a>';
	}

	if ($easyweb_webnus_options['easyweb_webnus_topbar_info']==$pos){
		if( $easyweb_webnus_options['easyweb_webnus_topbar_address'] )
			echo '<h6><i class="sl-location-pin"></i>'. esc_html($easyweb_webnus_options['easyweb_webnus_topbar_address']) .'</h6>';
		if( $easyweb_webnus_options['easyweb_webnus_topbar_email'] )
			echo '<h6><i class="sl-envelope-open"></i>'. esc_html($easyweb_webnus_options['easyweb_webnus_topbar_email']) .'</h6>';
		if( $easyweb_webnus_options['easyweb_webnus_topbar_phone'] )
			echo '<h6><i class="sl-phone"></i>'. esc_html($easyweb_webnus_options['easyweb_webnus_topbar_phone']).'</h6>';
	}

	if ($easyweb_webnus_options['easyweb_webnus_topbar_menu']==$pos && has_nav_menu('header-top-menu')){
		if($easyweb_webnus_options['easyweb_webnus_header_menu_type']==0){
			$menuParameters = array('theme_location' => 'header-top-menu','container' => 'false','menu_id' => 'nav','depth' => '5','items_wrap' => '<ul id="%1$s">%3$s</ul>',);
		}else{
			$menuParameters = array('theme_location' => 'header-top-menu','container' => 'false', 'depth' => '1', 'echo'  => false,);
		}
		echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
	}

	if ($easyweb_webnus_options['easyweb_webnus_topbar_custom']==$pos){
		echo esc_html($easyweb_webnus_options['easyweb_webnus_topbar_text']);
	}

	if ($easyweb_webnus_options['easyweb_webnus_topbar_language']==$pos){
		do_action('icl_language_selector');
	}

	echo'</div>';
}


// Remove theme option from admin topbar
if ( ! function_exists( 'remove_redux_themeoption_from_adminbar' ) ) :
	function remove_redux_themeoption_from_adminbar( $wp_admin_bar ){
		$wp_admin_bar->remove_node( 'easyweb_webnus_theme_options' );
	}
endif;
