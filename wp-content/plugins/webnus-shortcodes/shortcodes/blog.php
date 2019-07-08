<?php
function easyweb_webnus_blog($attributes, $content = null){
	extract(shortcode_atts(array(
	'type'=>'1',
	'category'=>'',
	'count'=>'',
	'orderby'=>'',
	), $attributes));
	ob_start();
	$easyweb_webnus_options = easyweb_webnus_options();
	$p_count = '0';
	$paged = ( is_front_page() ) ? 'page' : 'paged' ;
	$easyweb_webnus_last_time = get_the_time(get_option( 'date_format' )); $easyweb_webnus_i=1; $easyweb_webnus_flag = false; //timeline

	// orderby query args
	switch ( $orderby ) :
		case 'comment_count':
			$orderby = '&orderby=comment_count&order=DESC';
		break;

		case 'view_count':
			$orderby = '&meta_key=easyweb_webnus_views&orderby=meta_value_num&order=DESC';
		break;

		case 'social_score':
			if ( class_exists( 'SocialMetricsTracker' ) ) {
				$orderby ='&post_type=post&meta_key=socialcount_total&orderby=meta_value_num&order=DESC';
			}
		break;

		default:
			$orderby = '&orderby=date&order=DESC';
		break;
	endswitch;

	$args = 'post_type=post&paged='.get_query_var($paged).'&category_name='.$category.'&posts_per_page='.$count.$orderby.'';
	$query = new WP_Query($args);
	if ($type == 6){ 
		echo'<section id="main-content-pin"><div class="container"><div id="pin-content">';
	}elseif ($type == 7){ 
		echo'<section id="main-content-timeline"><div class="container"><div id="tline-content">';
	}
	if ($query ->have_posts()) :
		if ($type == 3)
			echo '<div class="row">';
	while ($query -> have_posts()) : $query -> the_post();
	switch($type){
		case 2:
			get_template_part('parts/blogloop','type2');
		break;
		case 3:
			get_template_part('parts/blogloop','type3');
		break;
		case 4:
			if($p_count == '0')
				get_template_part('parts/blogloop');
			else
				get_template_part('parts/blogloop','type2');
			$p_count++;
		break;
		case 5:
			if($p_count == '0'){
				get_template_part('parts/blogloop');
				echo '<div class="row">';
			}else
				get_template_part('parts/blogloop','type3');
			$p_count++;
		break;
		case 6:
			get_template_part('parts/blogloop','masonry');
		break;
		case 7:
			global $post;
			$post_format = get_post_format(get_the_ID());	
			$content = get_the_content();	
			if( !$post_format ) $post_format = 'standard';	
			if(($easyweb_webnus_last_time != date(' F Y',strtotime($post->post_date)) ) || $easyweb_webnus_i==1){
				$easyweb_webnus_last_time = date(' F Y',strtotime($post->post_date));
				echo '<div class="tline-topdate">'.  date(' F Y',strtotime($post->post_date)) .'</div>';
				if( $easyweb_webnus_i>1 ) $easyweb_webnus_flag = true;
			} ?>
				<article id="post-<?php the_ID(); ?>"  class="tline-box <?php if(($easyweb_webnus_i%2)==0 && $easyweb_webnus_flag) { $easyweb_webnus_flag = false; $easyweb_webnus_i++; } elseif( ($easyweb_webnus_i%2)==0 ) echo ' rgtline'; ?>"> <span class="tline-row-<?php if(($easyweb_webnus_i%2)==0) echo 'r'; else echo 'l'; ?>"></span>
				<div class="tline-author-box">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 90 ); ?>
				<h6 class="tline-author">
				<?php the_author_posts_link(); ?>
				</h6>
				<h6 class="tline-date"><?php esc_html_e('Posted at: ','webnus-shortcodes'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date('d M Y');?></a></h6>
				</div>
				 <?php
				if(  $easyweb_webnus_options['easyweb_webnus_blog_featuredimage_enable'] ){
					$meta_video = rwmb_meta( 'easyweb_featured_video_meta' );
					if( 'video'  == $post_format || 'audio'  == $post_format){
						$pattern = '\\[' . '(\\[?)' . "(gallery)" . '(?![\\w-])' . '(' . '[^\\]\\/]*' . '(?:' . '\\/(?!\\])' . '[^\\]\\/]*' . ')*?' . ')' . '(?:' . '(\\/)' . '\\]' . '|' . '\\]' . '(?:' . '(' . '[^\\[]*+' . '(?:' . '\\[(?!\\/\\2\\])' . '[^\\[]*+' . ')*+' . ')' . '\\[\\/\\2\\]' . ')?' . ')' . '(\\]?)';
						preg_match('/'.$pattern.'/s', $post->post_content, $matches);
						if( (is_array($matches)) && (isset($matches[3])) && ( ($matches[2] == 'video') || ('audio'  == $post_format)) && (isset($matches[2]))){
							$video = $matches[0];
							echo do_shortcode($video);
							$content = preg_replace('/'.$pattern.'/s', '', $content);
						}else				
						if( (!empty( $meta_video )) ){
							echo do_shortcode($meta_video);
						}
					}else
					if( 'gallery'  == $post_format){			
						$pattern = '\\[' . '(\\[?)' . "(gallery)" . '(?![\\w-])' . '(' . '[^\\]\\/]*' . '(?:' . '\\/(?!\\])' . '[^\\]\\/]*' . ')*?' . ')' . '(?:' . '(\\/)' . '\\]' . '|' . '\\]' . '(?:' . '(' . '[^\\[]*+' . '(?:' . '\\[(?!\\/\\2\\])' . '[^\\[]*+' . ')*+' . ')' . '\\[\\/\\2\\]' . ')?' . ')' . '(\\]?)';
						preg_match('/'.$pattern.'/s', $post->post_content, $matches);
						if( (is_array($matches)) && (isset($matches[3])) && ($matches[2] == 'gallery') && (isset($matches[2])))
						{
							$ids = (shortcode_parse_atts($matches[3]));
							if(is_array($ids) && isset($ids['ids']))
								$ids = $ids['ids'];
							echo do_shortcode('[vc_gallery onclick="link_no" img_size= "full" type="flexslider_fade" interval="3" images="'.$ids.'"  custom_links_target="_self"]');
							$content = preg_replace('/'.$pattern.'/s', '', $content);
						}
					}else
						get_the_image( array( 'meta_key' => array( 'Thumbnail', 'Thumbnail' ), 'size' => 'easyweb_webnus_blog2_thumb' )  ); 
				} ?> <br>
				  <div class="tline-ecxt">
					<?php if(  $easyweb_webnus_options['easyweb_webnus_blog_meta_category_enable'] ):?>
					<h6 class="blog-cat-tline"> <?php the_category('- ') ?></h6>
					<?php endif; ?>
			  <?php
				if($easyweb_webnus_options['easyweb_webnus_blog_posttitle_enable'] ) { 
					if( ('aside' != $post_format ) && ('quote' != $post_format)  ) { 	
						if( 'link' == $post_format ) { 
						 preg_match('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i', $content,$matches);
						 $content = preg_replace('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i','', $content,1);
						 $link ='';
						if(isset($matches) && is_array($matches))
						$link = $matches[0];	
					?>
					<h4><a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h4>
				<?php
				}else{
			  ?>
			  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			  <?php } } } ?>
				  </div>
				   <?php
					 if($easyweb_webnus_options['easyweb_webnus_blog_meta_comments_enable']) {
					?>
				  <div class="blog-com-sp"> <?php comments_popup_link(esc_html__('No Comments','webnus-shortcodes') . ' &#187;', esc_html__('1 Comment','webnus-shortcodes').' &#187;', esc_html__('% Comments','webnus-shortcodes').' &#187;'); ?></div>
				  <?php } ?>
			</article>
			<?php $easyweb_webnus_i++;
		break;
		default:
			get_template_part('parts/blogloop'); //type 1
		break;
		}
	endwhile;
	if($type == 3 || $type == 5 || $type == 6)
		echo '</div>';
	elseif($type == 7) // for timeline
		echo'<div class="tline-topdate enddte">'. get_the_time(get_option( 'date_format' )) .'</div></div></div>';
	endif;

	if(function_exists('wp_pagenavi')) {
		wp_pagenavi( array( 'query' => $query ) );
	}

	$out = ob_get_contents();
	ob_end_clean();	
	wp_reset_postdata();
	return $out;
}
add_shortcode("blog", "easyweb_webnus_blog");
?>