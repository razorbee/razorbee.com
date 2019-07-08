<?php
/**
 * @link              http://webnus.biz
 * @since             1.0.0
 * @package           time table
 */

/**
 * Shortcode class
 */
class Wb_Shortcodes {

	function __construct() {
		add_shortcode('wbtt', array($this,'wb_shortcode'));
	}

  function wb_shortcode($atts, $content){
    $user_id = shortcode_atts(array( 
     'id' => 'NULL'), $atts);

    $post_id = $user_id['id'];
    $queried_post = get_post($post_id);
    $title = $queried_post->post_content;   
    return html_entity_decode($title);
  }

}


