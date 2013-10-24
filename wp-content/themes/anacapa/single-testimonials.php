<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		
		<?php if ( is_page() && $post->post_parent ) { 
		    if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			}
		
		 } ?>
		
		
			
			<?php if (is_page(4)) {} else {?>
			<?php edit_post_link('Edit', '<p style="float:right;">', '</p>'); ?> 
				<h2><?php the_title(); ?></h2>
			<?php } ?>
			
			<?php the_post_thumbnail( 'single-post-thumbnail' ); ?>
			
			
			
			<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
			
			
			
			
			<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			
		</div>
		<?php endwhile; endif; ?>
		
		
		
		
		
		
	
<?php get_footer(); ?>
