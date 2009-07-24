<div id="rightsidebar" class="sidebar">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
<li id="search" class="widget widget_search">
    <form method="get" id="searchform" action="<?php bloginfo('home'); ?>" >
	<label class="hidden" for="s">Search for:</label>
			<div><input type="text" value="" name="s" id="s" />
			<input type="submit" id="searchsubmit" value="Search" />
	</div>
	</form>
</li>
<li>
	<h2>Recent Posts</h2>
	<ul>
	<?php get_archives('postbypost', 5); ?>
	</ul>
</li>
<?php endif; ?>
</ul>
</div>