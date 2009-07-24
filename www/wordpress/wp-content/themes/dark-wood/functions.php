<?php
if ( function_exists('register_sidebars') )
    register_sidebars(2);
?>
<?php
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div class="com-wrapper <?php if (1 == $comment->user_id) echo "admin"; ?>">
	        	<div id="comment-<?php comment_ID(); ?>" class="com-header">
					<span class="avtar"><?php if(function_exists('get_avatar')) { echo get_avatar($comment, '48', get_option('siteurl').'/wp-content/themes/Dark%20Wood/images/gravtar.png'); } ?></span>

	                <p class="tp">
	                    <span class="commentauthor"><?php comment_author_link() ?></span>
	                    <?php if ($comment->comment_approved == '0') : ?>
	                    <em><?php _e('Your comment is awaiting moderation', 'default'); ?>.</em>
	                    <?php endif; ?>
                        <br />
	                    <span class="commentmetadata">
	                    	<a href="#comment-<?php comment_ID() ?>" title=""><?php printf( __('%1$s at %2$s', 'default'), get_comment_time(__('F jS, Y', 'default')), get_comment_time(__('H:i', 'default')) ); ?></a>
	                    	<?php edit_comment_link(__('Edit', 'default'),'&nbsp;&nbsp;',''); ?>
	                    </span>
					</p>
	                <div class="clear"></div>
	            </div>

				<span class="comment_content"><?php comment_text() ?></span>
			    <div class="reply">
			    	<p><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
			    </div>
		    </div>
<?php
        }



function mytheme_ping($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div class="com-wrapper">
	        	<div id="comment-<?php comment_ID(); ?>" class="com-header">
                    <span class="avtar"><?php if(function_exists('get_avatar')) { echo get_avatar($comment, '48', get_option('siteurl').'/wp-content/themes/Dark%20Wood/images/gravtar.png'); } ?></span>

	                <p class="tp">
	                    <span><?php comment_author_link() ?></span>
	                    <?php if ($comment->comment_approved == '0') : ?>
	                    <em><?php _e('Your comment is awaiting moderation', 'default'); ?>.</em>
	                    <?php endif; ?>

	                    <small class="commentmetadata">
	                    	<a href="#comment-<?php comment_ID() ?>" title=""><?php printf( __('%1$s at %2$s', 'default'), get_comment_time(__('F jS, Y', 'default')), get_comment_time(__('H:i', 'default')) ); ?></a>
	                    	<?php edit_comment_link(__('Edit', 'default'),'&nbsp;&nbsp;',''); ?>
	                    </small>
					</p>
	                <div class="clear"></div>
	            </div>

				<span class="comment_content"><?php comment_text() ?></span>
			</div>
<?php
        }

?>