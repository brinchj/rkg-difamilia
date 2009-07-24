<div class="com">

<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments', 'default'); ?>.</p>

			<?php
			return;
		}
	}

if (function_exists('wp_list_comments')):
	//WP 2.7 Comment Loop
	if ( have_comments() ) : ?>

		<?php if ( ! empty($comments_by_type['comment']) ) :
		$count = count($comments_by_type['comment']); ?>
		<h2 id="comments"><?php printf(__('%s responses to', 'default'), $count); ?> &#8220;<?php the_title(); ?>&#8221; <a href="<?php bloginfo('comments_rss2_url'); ?>" title="RSS link" target="_blank"><img id="commentsrss" title="Subscribe to comments" src="<?php bloginfo('stylesheet_directory'); ?>/images/comments_rss.png" /></a></h2>

		<ul class="commentslist">
			<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
		</ul>
		<?php endif; ?>

		<div class="navigation">
			<div class="fl"><?php previous_comments_link() ?></div>
            <div class="fr"><?php next_comments_link() ?></div>
        	<div class="clear"></div>
        </div><br />

		<?php if ( ! empty($comments_by_type['pings']) ) :
		$countp = count($comments_by_type['pings']); ?>
		<h2 id="trackbacks" class="block"><?php printf(__('%s Trackbacks &#47; Pingbacks', 'default'), $countp); ?></h2>

		<ul class="commentslist">
            <?php wp_list_comments('type=pings&callback=mytheme_ping'); ?>
		</ul>
		<?php endif; ?>

	<?php else : // this is displayed if there are no comments so far ?>
		<?php if ('open' == $post->comment_status) :
			// If comments are open, but there are no comments.
		else : ?><p class="nocomments"></p>
		<?php endif;
	endif;
else:
	//WP 2.6 and older Comment Loop
	/* This variable is for alternating comment background */

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->
<?php if ($comments) : ?>
	<div class="clr">&nbsp;</div>
	<h3 id="comments" class="block"><?php comments_number( __('No responses to', 'default'), __('One response to', 'default'), __('% responses to', 'default'));?>
 &#8220;<?php the_title(); ?>&#8221; <a href="<?php bloginfo('comments_rss2_url'); ?>" title="RSS link"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ico/rss.gif" alt="<?php _e('RSS icon', 'default'); ?>" /></a></h3>
	<ul class="list-4">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
            <div class="com-wrappertop"></div>
            <div id="com-wrapper">
        	<div class="com-header">
                <span class="avtar"><?php if(function_exists('get_avatar')) { echo get_avatar($comment, '48', get_option('siteurl').'/wp-content/themes/Dark Wood/images/gravtar.png'); } ?></span>

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
			<?php comment_text() ?>
            </div>
            <div class="com-wrapperbottom"></div>
		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ul>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"></p>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>
</div>

<?php if ('open' == $post->comment_status) : ?>
<div class="leavereplytop"></div>
<div class="leavereply">
<h2 id="respond" class="title-2 block"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/leaveareplyicon.png" />&nbsp;<?php _e('Leave a reply', 'default'); ?></h2>
<?php if (function_exists('cancel_comment_reply_link')) {
//2.7 comment loop code ?>
<div id="cancel-comment-reply">
	<small><?php cancel_comment_reply_link();?></small>
</div>
<?php } ?>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<?php
	$login_link = get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink());
	printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'default'), $login_link);
?>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) :
	if (function_exists('wp_logout_url')) {
		$logout_link = wp_logout_url();
	} else {
		$logout_link = get_option('siteurl') . '/wp-login.php?action=logout';
	} ?>

<p><?php _e('Logged in as', 'default'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo $logout_link ?>" title="<?php _e('Log out of this account', 'default'); ?>"><?php _e('Log out', 'default'); ?> &raquo;</a>
</p>

<?php else : ?>
<p><label for="author" class="author"><?php _e('Name', 'default'); ?> <?php if ($req) echo __('(required)', 'default'); ?></label>
<div class="textbox"><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></div></p>
<p><label for="email" class="email"><?php _e('Mail (will not be published)', 'default'); ?> <?php if ($req) echo __('(required)', 'default'); ?></label>
<div class="textbox"><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></div></p>
<p><label for="url" class="website"><?php _e('Website', 'default'); ?></label>
<div class="textbox"><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></div></p>

<?php endif; ?>

<?php if (function_exists('cancel_comment_reply_link')) {
//2.7 comment loop code ?>
<p>
 <?php comment_id_fields(); ?>
</p>
<?php } ?>


<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><div class="textarea"><textarea name="comment" id="comment" rows="10" tabindex="4" cols="<?php if (get_option('tn_column_number') == '3 columns') { echo '70'; } else { echo '92'; }?>"></textarea></div></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'default'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>
<div class="leavereplybottom"></div>
<?php endif; // if you delete this the sky will fall on your head ?>