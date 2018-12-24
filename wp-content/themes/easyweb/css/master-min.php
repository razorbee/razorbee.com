<?php 
	header("Content-type: text/css",true); 
	ob_start("easyweb_webnus_compress");
	function easyweb_webnus_compress($buffer) {
	  /* remove comments */
	  $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	  /* remove tabs, spaces, newlines, etc. */
	  $buffer = str_replace(array("\r\n", "\r", "\n", "\t",'    '), '', $buffer);
	  return $buffer;
	}
	  
	/* css files */
	 /* Import Modified Visual Composer Stylesheet */
	 /* Import Basic Styles, Typography, Forms etc stylesheet */
	 /* Import Responsive Grid System Stylesheet */
	 /* Import Full width Sections + Parallax Stylesheet */
	 /* Import fancyBox Stylesheet */
	 /* Import Flex Slider Stylesheet */
	 /* Import Vector Icons Stylesheet */
	 /* Import Blog stylesheet */
	 /* Import Elements stylesheet */
	 /* Import Widgets stylesheet */
	 /* Import Icon Boxes stylesheet */
	 /* Import Color Skins Stylesheet */
	 /* Import Woocommerce Stylesheet */
	 /* Import Color Skins Stylesheet */
	 /* Import Menu Stylesheet */
	 /* Import Main Stylesheet */
	 /* Import Color Skins Stylesheet */

	ob_end_flush();
?>