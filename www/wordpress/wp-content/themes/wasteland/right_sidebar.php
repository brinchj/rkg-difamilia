<div id="right_sidebar">

<ul>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>	
        	
	<li><h2><?php _e('.: Recent Posts :.'); ?></h2>
               <ul>
		<?php wp_get_archives('type=postbypost&limit=5'); ?>  
               </ul>
	</li>
	
	<li><h2><?php _e('.: Archives :.'); ?></h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</li>
        
        <?php wp_list_bookmarks(); ?>
                
        <li><h2><?php _e('.: Meta :.'); ?></h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</li>        
            	
<?php endif; ?>

</ul>

</div>