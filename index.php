
<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/object.php' );
require( dirname( __FILE__ ) . '/wp-blog-header.php' );

/*$obj=array("http://projects.razorbee.com/nagaraja"=>"100","http://maf.razorbee.com"=>"101","http://projects.razorbee.com/kayaka"=>"102");
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<br> <br>" .$actual_link;
	$url = $actual_link;
$str = substr(strrchr($url, '/'), 1);
echo "<br>" .$str;
$uur=array_search($str,$obj,true);
echo "<br>" .$uur;
header("location: $uur");*/
