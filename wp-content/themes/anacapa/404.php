<?php get_header(); ?>
	<div class="post">
		<h2>Page Not Found</h2>
		<p>Error 404 - It seems that the page you're looking for was moved or removed. Maybe what you're looking for can be found below.</p>
		<ul>
			<?php wp_list_pages('include=4&title_li=') ?>
			<?php wp_list_pages('exclude=4&title_li=') ?>
		</ul>
	</div>
<?php get_footer(); ?>
