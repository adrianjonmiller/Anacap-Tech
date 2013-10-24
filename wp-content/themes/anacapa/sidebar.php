		<div id="sidebar">
			<ul id="nav">
			<?php wp_list_pages('depth=2&exclude=217,219&title_li='); ?>
			<?php wp_list_bookmarks('title_li=&category_before=<li><a href="#">&category_after=</li>&title_before=&title_after=</a>'); ?>
			</ul>
		
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar1') ) : ?>
			<?php endif; ?>
			
			<?php wp_reset_query(); ?>
			<?php $is_testimonials = get_post_type(); ?>
			<?php if ( is_front_page() || is_page(array(520,531,537,543)) || ($is_testimonials == 'testimonials') ) {} else { ?>
				<?php
				    $testimonials = new WP_Query();
				    $testimonials->query('showposts=2&post_type=testimonials');
				?>
				<?php if ($testimonials->have_posts()) : ?>
					<h4>Testimonials</h4>
					<?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
					    <div class="testimonial">
					    	<div class="testimonial-excerpt">
						    <p><span class="quote-start">&#8220;</span><?php t_excerpt('t_excerptlength_teaser', 't_excerptmore'); ?><span class="quote-end">&#8221;</span> <a href="#t_<?php echo $post->post_name ; ?>" class="fancyzoom">More</a></p>
						    </div>
						    <div id="t_<?php echo $post->post_name ; ?>" style="display:none;width:450px;">
						     <h3><?php the_title(); ?></h3>
						      <?php $credentials = get_post_meta($post->ID, "credentials", true);
			  					if (!empty($credentials)){ echo "<p>" . $credentials . "</p>";} ?>
						
						    <?php the_content() ?>
						    </div>
					    </div>
					<?php endwhile; ?>
				
				<?php endif; ?>
			<?php } ?>


		</div>
