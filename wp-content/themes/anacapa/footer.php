</div>

<?php get_sidebar(); ?>

<div class="clear"></div>

			<div id="footer">
								
				<p class="copy">&copy;2007-<?php echo date("Y");?> All rights reserved, Anacapa Technologies </p>
					
				<?php wp_footer(); ?>
				
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar3') ) : ?>
				<?php endif; ?>

			</div>
		</div>
		
	</body>

</html>
