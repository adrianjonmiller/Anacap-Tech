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
			
			<div id="page-sidebar">
				
				
				
					<?php 
					 $orderproduct = get_post_meta($post->ID, "orderproduct", true);
					 $ordersample = get_post_meta($post->ID, "ordersample", true);
					 $catalog = get_post_meta($post->ID, "catalog", true);
					 $size = get_post_meta($post->ID, "size", true);
					 $casepak = get_post_meta($post->ID, "casepak", true);
					 $sidebar = apply_filters('the_content', get_post_meta($post->ID, 'sidebar', $single = true) );
					 
					?>
					 
					 <?php if (!empty($catalog) || !empty($size) || !empty($casepak)){?>
					 
					 <div class="sidebar-details">
					 	<?php if (!empty($catalog)){?><p class="product-meta">Catalog #: <strong><?php echo $catalog ?></strong></p><?php } ?>
					 	<?php if (!empty($size)){?><p class="product-meta">Size: <strong><?php echo $size ?></strong></p><?php } ?>
					 	<?php if (!empty($casepak)){?><p class="product-meta">Case Pak: <strong><?php echo $casepak ?></strong></p><?php } ?>
					 	
					 </div>
					 
					<?php } ?>
					
					<?php if (function_exists('get_attachment_icons')) { get_attachment_icons($echo=true); } ?>
					 
					 <?php if (!empty($orderproduct) || !empty($ordersample) || !empty($non_product_pages)){?>
					 <div class="page-links">
						 <?php $non_product_pages = get_pages('child_of='.$post->ID.'&sort_column=post_date&sort_order=asc&parent='.$post->ID.'&meta_key=not_product&meta_value=on');
						 if (!empty($non_product_pages)) { ?>
							<ul>
								<?php foreach($non_product_pages as $non_product_page) { ?>
									
									<li><a href="<?php echo get_page_link($non_product_page->ID); ?>"><?php echo $non_product_page->post_title ?></a></li>
								
								<?php } ?>
							</ul>
						<?php } ?>
						
						<?php if ((!empty($orderproduct) && !empty($non_product_pages)) || (!empty($ordersample) && !empty($non_product_pages))){ echo '<div class="divider"></div>'; }?>
					
						 <ul class="ordering">
						 	<?php if (!empty($orderproduct)){ wp_list_pages('include=217&title_li='); } ?>
						 	<?php if (!empty($ordersample)){ wp_list_pages('include=219&title_li='); } ?>
						 	
						 </ul>
					 </div>
					<?php } ?>
					
					
					
					
					<?php if (!empty($sidebar)){ echo $sidebar; } ?>
					
					
					
					
			</div>
			
			<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
			
			
			
			
			<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			
		</div>
		<?php endwhile; endif; ?>
		
		
		<?php
			
			
			$pages = get_pages('child_of='.$post->ID.'&sort_column=post_date&sort_order=asc&parent='.$post->ID.'');
			
			
			
			
				foreach($pages as $page)
				{
					$product_pages = get_post_meta($page->ID, 'not_product', true);
					if (!$product_pages){
						$catalog = get_post_meta($page->ID, 'catalog', true);
						$size = get_post_meta($page->ID, 'size', true);
						$casepak = get_post_meta($page->ID, 'casepak', true);		
						$content = $page->post_excerpt;
						$content = apply_filters('the_content', $content);
				?>
				<div class="post">
					<div class="product-thumb">
						<a href="<?php echo get_page_link($page->ID); ?>"><?php echo get_the_post_thumbnail($page->ID); ?></a>
					</div>
					<div class="product-details">
						<?php if(!empty($content)){ ?><h3><a href="<?php echo get_page_link($page->ID); ?>"><?php echo $page->post_title ?></a></h3><?php } ?>
						<?php echo $content ?>
						<?php if(!empty($catalog)){ ?><p class="product-meta">Catalog #: <strong><?php echo $catalog ?></strong></p><?php } ?>
						<?php if(!empty($size)){ ?><p class="product-meta">Size: <strong><?php echo $size ?></strong></p><?php } ?>
						<?php if(!empty($casepak)){ ?><p class="product-meta">Case Pak: <strong><?php echo $casepak ?></strong></p><?php } ?>
						
					</div>
					<div class="clear"></div>
				</div>
				<?php
					}
				}
		?>
		
		
		
	
<?php get_footer(); ?>
