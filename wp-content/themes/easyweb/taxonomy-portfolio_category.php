<?php
	get_header();
	$easyweb_webnus_options = easyweb_webnus_options();
	$sidebar = isset($easyweb_webnus_options['easyweb_webnus_blog_sidebar']) ? $easyweb_webnus_options['easyweb_webnus_blog_sidebar'] : '' ;
?>

<section id="headline">
	<div class="container">
		<?php
			the_archive_title( '<h1>', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
	</div>
</section> <!-- end #headline -->

<section class="container page-content" >
	<hr class="vertical-space2">

	<?php if ( $sidebar == 'left' ) : ?>
		<!-- left sidebar -->
		<aside class="col-md-3 sidebar leftside">
			<?php if( is_active_sidebar( 'Left Sidebar' ) ) dynamic_sidebar( 'Left Sidebar' ); ?>
		</aside>
	<?php endif; ?>

	<!-- content -->
	<section class="<?php echo esc_attr( $sidebar == 'none' ? 'col-md-12 omega' : 'col-md-9 cntt-w' ); ?>">
		<!-- render post-grid -->
		<div class="row">
		<?php
			if( have_posts() ):
				while( have_posts() ):
					the_post();
					get_template_part( 'parts/blogloop', 'type3' );
				endwhile;
			endif;
		?>
		</div>

		<!-- pagination -->
		<?php
			if( function_exists( 'wp_pagenavi' ) ) :
				wp_pagenavi();
			else :
				echo '<div class="wp-pagenavi">';
					next_posts_link(esc_html__('&larr; Previous page', 'easyweb'));
					previous_posts_link(esc_html__('Next page &rarr;', 'easyweb'));
				echo '</div>';
			endif;
		?>
	</section> <!-- end col-md-9 -->

	<?php if ( $sidebar == 'right' || $sidebar == 'both' ) : ?>
		<!-- right sidebar -->
		<aside class="col-md-3 sidebar">
			<?php if( is_active_sidebar( 'Right Sidebar' ) ) dynamic_sidebar( 'Right Sidebar' ); ?>
		</aside> <!-- end col-md-3 -->
	<?php endif; ?>
</section> <!-- end container -->

<?php get_footer(); ?>