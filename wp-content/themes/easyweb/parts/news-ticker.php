<?php 
$easyweb_webnus_options = easyweb_webnus_options();
$easyweb_webnus_options['easyweb_webnus_nt_show'] = isset($easyweb_webnus_options['easyweb_webnus_nt_show']) ? $easyweb_webnus_options['easyweb_webnus_nt_show'] : '' ;
$easyweb_webnus_options['easyweb_webnus_nt_effect'] = isset($easyweb_webnus_options['easyweb_webnus_nt_effect']) ? $easyweb_webnus_options['easyweb_webnus_nt_effect'] : '' ;
if( $easyweb_webnus_options['easyweb_webnus_nt_show'] || ( !$easyweb_webnus_options['easyweb_webnus_nt_show'] && (is_home() || is_front_page() )) ):
	$title = isset($easyweb_webnus_options['easyweb_webnus_nt_title']) ? $easyweb_webnus_options['easyweb_webnus_nt_title'] : '' ;
	$cat   = isset($easyweb_webnus_options['easyweb_webnus_nt_cat']) ? $easyweb_webnus_options['easyweb_webnus_nt_cat'] : '' ;
	$count = isset($easyweb_webnus_options['easyweb_webnus_nt_count']) ? $easyweb_webnus_options['easyweb_webnus_nt_count'] : '' ;
	$effect= (!$easyweb_webnus_options['easyweb_webnus_nt_effect']);
	$speed = isset($easyweb_webnus_options['easyweb_webnus_nt_speed']) ? $easyweb_webnus_options['easyweb_webnus_nt_speed'] : '' ;
	$pause = isset($easyweb_webnus_options['easyweb_webnus_nt_pause']) ? $easyweb_webnus_options['easyweb_webnus_nt_pause'] : '' ;
	if(!$count || $count == ' ' || !is_numeric($count)) $count = 5;
	if(!$effect) $effect = 'reveal';
	if(!$speed || $speed == ' ' || !is_numeric($speed)) $speed = 1 ;
	if(!$pause || $pause == ' ' || !is_numeric($pause)) $pause = 1;
?>	
	<div class="news-ticker">
		<div class="container">
			<?php global $post;
			$args=array('category__in' => $cat, 'posts_per_page'=> $count, 'no_found_rows' => 1 );
			$breaking_query = new wp_query( $args  );
			if( $breaking_query->have_posts() ): ?>
			<ul id="js-news">
			<?php while( $breaking_query->have_posts() ) : $breaking_query->the_post();?>
				<li><a href="<?php the_permalink()?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
			</ul>
			<?php endif;
			wp_reset_postdata();
			?>
			<script type="text/javascript">
			jQuery(function () {
					jQuery('#js-news').ticker({
					speed: '<?php echo $speed/10 ?>',
					debugMode: false,
					controls: false,
					titleText: '<?php echo esc_html($title) ?>',
					displayType: '<?php echo $effect ?>',
					direction: '<?php echo(is_rtl())?'rtl':'ltr'; ?>',
					pauseOnItems: '<?php echo $pause*1000 ?>',
					fadeInSpeed: '<?php echo $speed*200 ?>',
					fadeOutSpeed: '<?php echo $speed*100 ?>',
				});
			});
			</script>
		</div>
	</div>
<?php endif; ?>