<div id="leftsidebar" class="sidebar">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<li>
	<h2>Recent Posts</h2>
	<ul>
	<?php get_archives('postbypost', 10); ?>
	</ul>
</li>
<?php endif; ?>
</ul>
</div>