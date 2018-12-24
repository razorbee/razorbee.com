<?php
function easyweb_webnus_latestfromblog( $attributes, $content = null ) {
extract(shortcode_atts(	array(
	'type'=>'one',
	'category'=>''
), $attributes));
	$post_format = get_post_format(get_the_ID());
	ob_start();	
	$easyweb_webnus_options = easyweb_webnus_options();
?>
<div class="container latestposts-<?php echo esc_attr($type) ?>">
<?php
	if ($type=='one'){
			$query = new WP_Query('posts_per_page=2&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
?>
	<div class="col-md-6 col-sm-6"><article class="latest-b"><figure class="latest-img"><?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'easyweb_webnus_latestfromblog' ) );   ?></figure><div class="latest-content"><h6 class="latest-b-cat"><?php the_category(', '); ?></h6><h3 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p class="latest-author"><?php the_author_posts_link(); ?> / <?php the_time(get_option( 'date_format' )); ?></p><p class="latest-excerpt"><?php echo easyweb_webnus_excerpt(36); ?></p></div></article></div>
<?php
	endwhile;
	}elseif ($type=='two'){
			$i = 0;  
			$query = new WP_Query('posts_per_page=5&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post(); 
      		if( $i == 0 ) {
      		?>
      		<div class="col-md-7">
				<article class="blog-post clearfix ">
					<figure class="pad-r20">
								<?php
								  $image = get_the_image( array( 'meta_key' => array( 'Thumbnail', 'Thumbnail' ), 'size' => 'easyweb_webnus_latestfromblog' ,'echo'=>false) );
								  if( !empty($image) ) 
									echo $image;
								  else 
									echo '<img src="'.get_template_directory_uri() . '/images/featured.jpg" />';
								?>
					</figure>
					<div class="entry-content">
					<div class="blgt1-top-sec">
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<h6 class="blog-cat"><?php the_category(', ') ?></h6><h6 class="blog-date"><i class="fa-clock-o"></i><?php the_time(get_option( 'date_format' )) ?></h6>
					</div>
						 <?php  
							if( 'quote' == $post_format  ) echo '<blockquote>';
							echo '<p class="blog-detail">';
							echo easyweb_webnus_excerpt(45);
							echo '... <br><br><a class="readmore" href="' . get_permalink($query->ID) . '">' . esc_html($easyweb_webnus_options['easyweb_webnus_blog_readmore_text']) . '</a>';
							echo '</p>';
							if( 'quote' == $post_format  ) echo '</blockquote>';
						?>
					</div>
				</article>
			</div><div class="col-md-5">
		<?php  }else{ ?>
		
      	<article class="blog-line clearfix">
          	<a href="<?php the_permalink(); ?>" class="img-hover"><?php  
				$image = get_the_image( array( 'meta_key' => array( 'Thumbnail', 'Thumbnail' ), 'size' => 'easyweb_webnus_tabs_img' ,'echo'=>false, 'link_to_post' => false,) ); 
				if( !empty($image) ) 
					echo $image;
				else 
					echo '<img src="'.get_template_directory_uri() . '/images/featured_140x110.jpg" />';	
          	?></a>
			<p class="blog-cat"><?php the_category(', '); ?></p><h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4><p><?php echo get_the_time(get_option( 'date_format' )); ?> 	/<strong><?php esc_html_e('by', 'risotto') ?></strong> <?php echo get_the_author(); ?>
        </article>
		
      <?php
		}
		$i++; 
		endwhile;
		?>
		</div>
		<?php
	}elseif ($type=='three'){
	$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
	while ($query -> have_posts()) : $query -> the_post();
?>
	<div class="col-md-4 col-sm-4"><article class="latest-b2"><figure class="latest-b2-img"><?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'easyweb_webnus_latestfromblog' ) );   ?></figure><div class="latest-b2-cont"><h6 class="latest-b2-cat"><?php the_category(', '); ?></h6><h3 class="latest-b2-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo easyweb_webnus_excerpt(17); ?></p><div class="latest-b2-metad2"><i class="fa-comment-o"></i><span><?php echo get_comments_number() ?></span> / <span class="latest-b2-date"><?php the_author_posts_link(); ?> / <?php echo get_the_date('F d, Y');?></span></div></div></article></div>
<?php
	endwhile;
	}elseif ($type=='four'){
	$query = new WP_Query('posts_per_page=2&category_name='.$category.'');
	while ($query -> have_posts()) : $query -> the_post();
?>	
	<div class="col-md-6"><article class="latest-b2"> <div class="col-md-3"> <h6 class="blog-date"><span><?php the_time('d') ?> </span><?php the_time('M Y') ?> </h6> <div class="au-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 90 ); ?></div> <h6 class="blog-author"><strong><?php esc_html_e('Written by','easyweb_webnus_framework'); ?></strong><br> <?php the_author_posts_link(); ?> </h6> <h6 class="latest-b2-cat"><?php the_category(', '); ?></h6> </div><div class="col-md-9"> <figure class="latest-b2-img"><?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'easyweb_webnus_latestfromblog' ) );   ?></figure> <div class="latest-b2-cont"><h3 class="latest-b2-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> </div> </div><hr class="vertical-space"></article></div>
<?php
	endwhile;
	}elseif ($type=='five'){
			$query = new WP_Query('posts_per_page=6&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
?>
	 <div class="col-md-6 col-lg-4"><article class="latest-b2">
	  <figure class="latest-b2-img"><?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'easyweb_webnus_blog2_thumb' ) );   ?></figure>
	  <div class="latest-b2-cont">
	  <h6 class="latest-b2-cat"><?php the_category(', '); ?></h6> 
	  <h3 class="latest-b2-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	  <h5 class="latest-b2-date"><?php the_author_posts_link(); ?> / <?php echo get_the_date('F d, Y');?></h5>
	  </div></article></div>
<?php
	endwhile;
	} elseif ($type=='six') {
			$query = new WP_Query('posts_per_page=4&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
?>
	<div class="col-md-3 col-sm-6"><article class="latest-b">
	  <figure class="latest-img"><?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'easyweb_webnus_latestfromblog' ) );   ?></figure>
		<div class="latest-content">
		<p class="latest-date"><?php the_time(get_option( 'date_format' )); ?></p>
		<h3 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="latest-author"><strong><?php esc_html_e('by','easyweb_webnus_framework') ?></strong> <?php the_author_posts_link(); ?> <strong><?php esc_html_e('in','easyweb_webnus_framework') ?></strong> <?php the_category(', '); ?></p>  
		</div> 
      </article></div>
<?php
	endwhile;
	} elseif ( $type == 'seven' ) {
		$wpbp = new WP_Query('posts_per_page=3&category_name='.$category.'');
		if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); ?>
		<div class="col-md-4 col-sm-4"><article class="latest-b">
		<figure class="latest-img"><?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'easyweb_webnus_latestfromblog' ) ); ?></figure>
		  	<div class="wrap-date-icons">
			    <h3 class="latest-date">
			    	<span class="latest-date-month"><?php the_time('M') ?></span>
			    	<span class="latest-date-day"><?php the_time('d') ?></span>
			    	<span class="latest-date-year"><?php the_time('Y') ?></span>
			    </h3>
			    <div class="latest-icons">
			    	<p>
			    		<span><i class="fa-eye"></i></span>
			    	</p>
			    	<p>
			            <span><?php echo easyweb_webnus_getViews(get_the_ID()); ?></span>		
				    </p>
			    </div>
			</div>
			<div class="latest-content">
				<h3 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="latest-author"><?php esc_html_e('by ','easyweb_webnus_framework'). the_author() . esc_html_e(' in ','easyweb_webnus_framework') . the_category(', '); ?></p>  
			</div> 
	    </article></div> <?php

		endwhile; endif;
	} elseif ($type=='eight') {
		$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
		while ($query -> have_posts()) : $query -> the_post(); ?>
			<div class="col-sm-4">
				<article class="latest-b8">
					<figure class="latest-b8-img">
						<?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'easyweb_webnus_latestfromblog' ) ); ?>
					</figure>
					<div class="latest-b8-content">
						<span class="post-format-icon <?php echo get_post_format(); ?>"></span>
						<h3 class="latest-b8-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo easyweb_webnus_excerpt(32); ?></p>
						<a class="readmore" href="<?php echo get_permalink($query->ID); ?>"><?php echo esc_html($easyweb_webnus_options['easyweb_webnus_blog_readmore_text']); ?></a>
						<div class="latest-b8-meta">
							<div class="autho"><i class="sl-user"></i><span><?php esc_html_e( 'by: ', 'easyweb_webnus_framework' ); the_author_posts_link(); ?></span></div>
							<div class="date"><i class="sl-calendar"></i><span><?php echo get_the_date('d F Y'); ?></span></div>
							<div class="comments"><i class="sl-bubble"></i><span><?php echo get_comments_number(); ( get_comments_number() == 0 || get_comments_number() == 1 ) ? esc_html_e( ' Comment', 'easyweb_webnus_framework' ) : esc_html_e( ' Comments', 'easyweb_webnus_framework' ); ?></span></div>
						</div>
					</div>
				</article>
			</div>
		<?php endwhile;
	} elseif ($type=='nine') {
		$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
		while ($query -> have_posts()) : $query -> the_post(); ?>
			<div class="col-sm-4">
				<article class="latest-b9">
					<figure class="latest-b9-img">
						<?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'easyweb_webnus_latestfromblog' ) ); ?>
					</figure>
					<div class="latest-b9-content">
						<h3 class="latest-b9-title">
							<span class="post-format-icon <?php echo get_post_format(); ?>"></span>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<div class="latest-b9-meta">
							<span class="date"><?php echo get_the_date('F d, Y'); ?></span>
							<span class="categories"><?php esc_html_e( 'in ', 'easyweb_webnus_framework' ); the_category(', '); ?></span>
							<span class="comments"><?php echo get_comments_number(); ( get_comments_number() == 0 || get_comments_number() == 1 ) ? esc_html_e( ' Comment', 'easyweb_webnus_framework' ) : esc_html_e( ' Comments', 'easyweb_webnus_framework' ); ?></span>
						</div>
					</div>
				</article>
			</div>
		<?php endwhile;
	} elseif ($type=='ten') {
		$query = new WP_Query('posts_per_page=4&category_name='.$category.'');
		while ($query -> have_posts()) : $query -> the_post(); ?>
			<div class="col-md-6">
				<article class="latest-b10">
					<figure class="latest-b10-img">
						<?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'easyweb_webnus_square' ) ); ?>
					</figure>
					<div class="latest-b10-content">
						<div class="latest-b10-meta">
							<span class="date"><?php echo get_the_date('d F Y'); ?></span>
						</div>
						<h3 class="latest-b10-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<p><?php echo easyweb_webnus_excerpt(19); ?></p>
						<a class="readmore" href="<?php echo get_permalink($query->ID); ?>"><?php echo esc_html($easyweb_webnus_options['easyweb_webnus_blog_readmore_text']); ?></a>
					</div>
				</article>
			</div>
		<?php endwhile;
	} elseif ($type=='eleven') {
		$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
		while ($query -> have_posts()) : $query -> the_post(); ?>
			<div class="col-sm-4">
				<article class="latest-b11">
					<div class="latest-b11-content">
						<h6 class="categories"><?php esc_html_e( 'In ', 'easyweb_webnus_framework' ); the_category(', '); ?></h6>
						<h3 class="latest-b11-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="latest-b11-meta">
							<span class="date"><?php echo get_the_date('F d, Y'); ?></span>
							<span class="comments"><?php echo get_comments_number(); ( get_comments_number() == 0 || get_comments_number() == 1 ) ? esc_html_e( ' Comment', 'easyweb_webnus_framework' ) : esc_html_e( ' Comments', 'easyweb_webnus_framework' ); ?></span>
						</div>
					</div>
					<figure class="latest-b11-img">
						<?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'easyweb_webnus_square' ) ); ?>
					</figure>
				</article>
			</div>
		<?php endwhile;
	}
?>
</div>
<?php
	$out = ob_get_contents();
	ob_end_clean();	
	wp_reset_postdata();
	return $out;
 }
 add_shortcode('latestfromblog', 'easyweb_webnus_latestfromblog');
?>