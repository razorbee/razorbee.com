<?php

// convert nhp media value to array
add_action( 'after_setup_theme', 'easyweb_convert_nhp_to_redux', 0 );
function easyweb_convert_nhp_to_redux() {
	if ( get_option( 'easyweb_convert_nhp_to_redux' ) == 'done' ) :
		return;
	endif;

	$thm_options		= get_option( 'easyweb_webnus_options' );
	$meida_options_list	= array(
		'easyweb_webnus_logo',
		'easyweb_webnus_transparent_logo',
		'easyweb_webnus_header_background',
		'easyweb_webnus_sticky_logo',
		'easyweb_webnus_favicon',
		'easyweb_webnus_apple_iphone_icon',
		'easyweb_webnus_apple_ipad_icon',
		'easyweb_webnus_admin_login_logo',
		'easyweb_webnus_footer_logo',
		'easyweb_webnus_no_image_src',
		'easyweb_webnus_custom_font1_woff',
		'easyweb_webnus_custom_font1_ttf',
		'easyweb_webnus_custom_font1_eot',
		'easyweb_webnus_custom_font2_woff',
		'easyweb_webnus_custom_font2_ttf',
		'easyweb_webnus_custom_font2_eot',
		'easyweb_webnus_custom_font3_woff',
		'easyweb_webnus_custom_font3_ttf',
		'easyweb_webnus_custom_font3_eot',
	);

	foreach ( $meida_options_list as $media_option ) :
		if ( isset( $thm_options[$media_option] ) && !empty( $thm_options[$media_option] ) && !is_array( $thm_options[$media_option] ) ) :
			$thm_options[$media_option] = array( 'url' => $thm_options[$media_option] );
			update_option( 'easyweb_webnus_options', $thm_options );
		endif;
	endforeach;

	add_option( 'easyweb_convert_nhp_to_redux', 'done' );
}


// prevent blog and latest from blog fatal error
add_action( 'wp_head', 'easyweb_redirect_frontend_user_to_admin_panel' );

function easyweb_redirect_frontend_user_to_admin_panel() {

	if ( get_option( 'easyweb_major_update_alert' ) == 'done' ) :
		return;
	endif;
	
	if ( is_super_admin() && !is_admin() ) :

		if ( get_option( 'easyweb_redirect_frontend_user_to_admin_panel' ) == 'done' ) :
			return;
		endif;

		add_option( 'easyweb_redirect_frontend_user_to_admin_panel', 'done' );

		$theme_name = wp_get_theme()->get( 'Name' );
		wp_redirect( admin_url('themes.php?page=' . $theme_name . '-page#w-update-notices' ) );

	endif;

}
// delete_option( 'easyweb_redirect_frontend_user_to_admin_panel' );



// Special message for admin alert
add_action( 'admin_print_scripts', 'easyweb_major_update_alert', 999 );

function easyweb_major_update_alert() {

	if ( get_option( 'easyweb_major_update_alert' ) == 'done' ) :
		return;
	endif;

	if ( is_super_admin() && is_admin() ) :

		global $pagenow;
		if ( $pagenow == 'themes.php' && isset( $_GET['activated'] ) ) :
			return;
		endif;

		$theme_name = wp_get_theme()->get( 'Name' );
		$update_url = admin_url("themes.php?page=$theme_name-page#w-update-notices");

		echo '
		<script>
			jQuery(document).ready(function() {
				swal({
					type: "success",
					title: "Special message for admin",
					text: "EasyWeb version 2.0 is a major update. If you have updated your theme from earlier version then click on “I updated the theme“ button  otherwise ” I am installing for first time“ click on",
					confirmButtonText: "I am installing for first time",
					cancelButtonText: "I updated the theme",
					closeOnConfirm: true,
					showCancelButton: true,
				}, function(isConfirm) {
					if ( isConfirm != true ) {
						// similar behavior as clicking on a link
						window.location.href = "' . $update_url . '";
					}
				});
			});
		</script>';

		add_option( 'easyweb_major_update_alert', 'done' );

	endif; // end is_super_admin() && is_admin()

}
// delete_option( 'easyweb_major_update_alert' );