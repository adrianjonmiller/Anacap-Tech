<?php get_header(); ?>

<?php // Get today's date in the right format
#$todaysDate = date('m/d/Y');
$todaysDate = date('Y/m/d');
?>
 
<?php query_posts('showposts=20&category_name=events&meta_key=date&meta_compare=>=&meta_value=' . $todaysDate . '&orderby=meta_value&order=ASC'); ?>
<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<?php edit_post_link('Edit', '<p style="float:right;">', '</p>'); ?>
			<h2><?php the_title(); ?></h2>
			
			<?php the_content('Read the rest of this entry &raquo;'); ?>
			
			
		</div>

	<?php endwhile; ?>

<?php else : ?>
<div class="post">
	<h2>Thanks for you interest</h2>
	<p>We are not currently scheduled for any shows or events. Check back soon for updates. 
	<br/>In the meantime, check out some of our products:</p>
	
	<ul>
			<?php wp_list_pages('title_li=&include=12') ?>
			<ul>
				<?php wp_list_pages('title_li=&child_of=12') ?>
			</ul>
		</ul>
</div>
<?php endif; ?>
<?php get_footer(); ?>
