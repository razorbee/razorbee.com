<section class="footer-social-bar"><div class="container"><div class="row"><ul class="footer-social-items">
	<?php
	$easyweb_webnus_options = easyweb_webnus_options();
	$easyweb_webnus_options['easyweb_webnus_social_first'] = isset($easyweb_webnus_options['easyweb_webnus_social_first']) ? $easyweb_webnus_options['easyweb_webnus_social_first'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_second'] = isset($easyweb_webnus_options['easyweb_webnus_social_second']) ? $easyweb_webnus_options['easyweb_webnus_social_second'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_third'] = isset($easyweb_webnus_options['easyweb_webnus_social_third']) ? $easyweb_webnus_options['easyweb_webnus_social_third'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_fourth'] = isset($easyweb_webnus_options['easyweb_webnus_social_fourth']) ? $easyweb_webnus_options['easyweb_webnus_social_fourth'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_fifth'] = isset($easyweb_webnus_options['easyweb_webnus_social_fifth']) ? $easyweb_webnus_options['easyweb_webnus_social_fifth'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_sixth'] = isset($easyweb_webnus_options['easyweb_webnus_social_sixth']) ? $easyweb_webnus_options['easyweb_webnus_social_sixth'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_seventh'] = isset($easyweb_webnus_options['easyweb_webnus_social_seventh']) ? $easyweb_webnus_options['easyweb_webnus_social_seventh'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_first_url'] = isset($easyweb_webnus_options['easyweb_webnus_social_first_url']) ? $easyweb_webnus_options['easyweb_webnus_social_first_url'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_second_url'] = isset($easyweb_webnus_options['easyweb_webnus_social_second_url']) ? $easyweb_webnus_options['easyweb_webnus_social_second_url']  : '' ; 
	$easyweb_webnus_options['easyweb_webnus_social_third_url'] = isset($easyweb_webnus_options['easyweb_webnus_social_third_url']) ? $easyweb_webnus_options['easyweb_webnus_social_third_url'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_fourth_url'] = isset($easyweb_webnus_options['easyweb_webnus_social_fourth_url']) ? $easyweb_webnus_options['easyweb_webnus_social_fourth_url'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_fifth_url'] = isset($easyweb_webnus_options['easyweb_webnus_social_fifth_url']) ? $easyweb_webnus_options['easyweb_webnus_social_fifth_url'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_sixth_url'] = isset($easyweb_webnus_options['easyweb_webnus_social_sixth_url']) ? $easyweb_webnus_options['easyweb_webnus_social_sixth_url'] : '' ;
	$easyweb_webnus_options['easyweb_webnus_social_seventh_url'] = isset($easyweb_webnus_options['easyweb_webnus_social_seventh_url']) ? $easyweb_webnus_options['easyweb_webnus_social_seventh_url'] : '' ;
	
	$social = array();
	$social[1] = strtolower(trim($easyweb_webnus_options['easyweb_webnus_social_first']));
	$social[2] = strtolower(trim($easyweb_webnus_options['easyweb_webnus_social_second']));
	$social[3] = strtolower(trim($easyweb_webnus_options['easyweb_webnus_social_third']));
	$social[4] = strtolower(trim($easyweb_webnus_options['easyweb_webnus_social_fourth']));
	$social[5] = strtolower(trim($easyweb_webnus_options['easyweb_webnus_social_fifth']));
	$social[6] = strtolower(trim($easyweb_webnus_options['easyweb_webnus_social_sixth']));
	$social[7] = strtolower(trim($easyweb_webnus_options['easyweb_webnus_social_seventh']));
	$social_url = array();
	$social_url[1] = trim($easyweb_webnus_options['easyweb_webnus_social_first_url']);
	$social_url[2] = trim($easyweb_webnus_options['easyweb_webnus_social_second_url']);
	$social_url[3] = trim($easyweb_webnus_options['easyweb_webnus_social_third_url']);
	$social_url[4] = trim($easyweb_webnus_options['easyweb_webnus_social_fourth_url']);
	$social_url[5] = trim($easyweb_webnus_options['easyweb_webnus_social_fifth_url']);
	$social_url[6] = trim($easyweb_webnus_options['easyweb_webnus_social_sixth_url']);
	$social_url[7] = trim($easyweb_webnus_options['easyweb_webnus_social_seventh_url']);
	for ($x = 1; $x <= 7; $x++) {
		echo($social[$x] && $social_url[$x])?'<li><a target="_blank" href="'. $social_url[$x] .'" class="'.$social[$x].'"><i class="fa-'.$social[$x].'"></i><div><strong>'.$social[$x].'</strong><span>'.esc_html__('Join us on ','easyweb').$social[$x].'</span></div></a></li>':'';
	} ?>
</ul></div></div></section>