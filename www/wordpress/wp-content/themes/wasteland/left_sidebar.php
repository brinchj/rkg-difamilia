<div id="left_sidebar">

<ul>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>

       	<li><h2><?php _e('.: Categories :.'); ?></h2>
		<ul>
			<?php wp_list_categories('title_li='); ?>
		</ul>
	</li>

        <?php wp_list_pages('depth=3&title_li=<h2>.: Pages :.</h2>'); ?>

       <li><h2><?php _e('.: Subscribe :.'); ?></h2>
	   <ul>
		<li><a class="rss" href="feed:<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>

		<li><a class="rss" href="feed:<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>

	   </ul>
	</li>	

       <li><h2><?php _e('.: Search :.'); ?></h2>
               <div class="search">          
       		  <?php include ('searchform.php'); ?>
               </div>                
        </li>
	
<?php endif; ?>

</ul>

</div>