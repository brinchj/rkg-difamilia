<div class="banner">
    <div class="logoleft"></div><div class="logo"><h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1><p id="description"><?php bloginfo('description'); ?></p></div><div class="logoright"></div>
    <span style="float: right; margin: 30px 0 0 0;">
        <div class="rssdiv"><a href="<?php bloginfo('rss2_url'); ?>" target="_blank" title="subscribe"><img name="rss" id="rss" onmouseout="hide_rss('<?php bloginfo('stylesheet_directory'); ?>')" onmouseover="show_rss('<?php bloginfo('stylesheet_directory'); ?>')" src="<?php bloginfo('stylesheet_directory'); ?>/images/rss_icon.png" /></a></div>
        <div class="clear"></div>
        <div class="menuleft"></div><div class="menu"><ul id="nav"><?php wp_list_pages('depth=1&title_li='); ?></ul></div><div class="menuright"></div>
    </span>
    <div class="clear"></div>
</div>