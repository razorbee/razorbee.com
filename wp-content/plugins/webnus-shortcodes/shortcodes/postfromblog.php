<?php
function easyweb_webnus_postfromblog( $attributes, $content = null ) {
extract(shortcode_atts(	array(
	'post'=>''
), $attributes));
	ob_start();	
	$query = new WP_Query('p='.$post.'');
	if ($query -> have_posts()) : $query -> the_post();
?>
	<article class="a-post-box">
		<figure class="latest-img"><?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'easyweb_webnus_latest_cover' ) );   ?></figure>
		<div class="latest-overlay"></div>
		<div class="latest-txt">
			<h4 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<span class="latest-cat"><?php the_category(' / ') ?></span>
			<span class="latest-date"><i class="fa-clock-o"></i> <?php the_time(get_option( 'date_format' )); ?></span>
		</div>
    </article>
<?php
	endif;
	$out = ob_get_contents();
	ob_end_clean();	
	wp_reset_postdata();
	return $out;
 }
 add_shortcode('postblog', 'easyweb_webnus_postfromblog');
?>