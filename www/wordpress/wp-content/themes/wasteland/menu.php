<div class="menu">
 
           <?php if(function_exists('wp_page_menu')) : ?>
            <?php wp_page_menu ('show_home=1&depth=1&title_li='); ?>
          <?php else : ?>

	<ul>
            <li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
            <?php wp_list_pages('depth=1&title_li='); ?>                        
        </ul>                

<?php endif; ?>
</div>