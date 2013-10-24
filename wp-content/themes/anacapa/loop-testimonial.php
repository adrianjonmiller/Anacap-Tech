<div style="height: 136px; background: #fff;">
	<!-- START OF THE PLAYER EMBEDDING TO COPY-PASTE -->
	<div id="mediaplayer"></div>
	
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jwplayer.js"></script>
	<script type="text/javascript">
		jwplayer("mediaplayer").setup({
			'flashplayer': "<?php bloginfo('template_url'); ?>/video/player.swf",
			'file': <?php if ($testimonial_type == 'silver-sept') { ?> 
				"<?php bloginfo('template_url'); ?>/video/silversept-header.flv",
				<?php } else { ?>
				"<?php bloginfo('template_url'); ?>/video/anasept-header.flv",
				<?php } ?>
	    	'width':	'598',
	    	'height':	'136',
	    	'autostart': 'true',
	    	'controlbar.position': 'none',
	    	'repeat': 'always',
	    	'screencolor': 'ffffff'
		});
	</script>
	<!-- END OF THE PLAYER EMBEDDING -->
</div>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		
		<?php if ( is_page() && $post->post_parent ) { 
		    if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			}
		
		 } ?>
		
		
			<?php edit_post_link('Edit', '<p style="float:right;">', '</p>'); ?> 
				<h2 class="testimonial-page-header"><?php the_title(); ?></h2>
			
			<?php the_post_thumbnail( 'single-post-thumbnail' ); ?>
			
			
			
			<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
			
			
			
		</div>
		<?php endwhile; endif; ?>



<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array(
	'post_type' => 'testimonials',
	'testimonial-type'=> $testimonial_type,
	'posts_per_page' => 5,
	'paged'=>$paged )
);?>


	

        	
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
	    <div class="post post-testimonial" id="post-<?php the_ID(); ?>">
			
		  <?php edit_post_link('Edit', '<p style="float:right;">', '</p>'); ?>
		  <div class="testimonial-header">	
			  <h3><?php the_title(); ?></h3>
			  <?php $credentials = get_post_meta($post->ID, "credentials", true);
			  	if (!empty($credentials)){ echo "<p>" . $credentials . "</p>";} ?>
		  </div>
		  
	      <?php the_content(); ?>
	      
		</div>
    <?php endwhile; ?>

    <?php if ( function_exists('wp_pagenavi')) {
    	wp_pagenavi();
    } else { ?>
    	<nav>
	      <div><?php next_posts_link('&laquo; Older Entries') ?></div>
	      <div><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	    </nav>
    <?php } ?>

  <?php else : ?>
  <div class="post">

    <h2>Not Found</h2>
    <p>Sorry, but you are looking for something that isn't here.</p>
    <?php get_search_form(); ?>
    
  </div>

  <?php endif; ?>
