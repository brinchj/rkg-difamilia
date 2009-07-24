<?php get_header(); ?>

<?php include('left_sidebar.php');?>

<div id="container">

	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">

			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<div class="entry">                             			

				<?php the_content(); ?>
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

				<p class="postmetadata">
<span class="tags"><?php _e('Tags: '); ?> <?php the_tags('', ', ', ''); ?></span>
				</p>
<br />
                                <p class="postmetadata">
					
						This entry was posted <?php _e('by '); ?> <?php the_author_posts_link(); ?>  
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
						and is filed under <?php the_category(', ') ?>.
						You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.
                                                <?php } edit_post_link('Edit this entry','','.'); ?>
                                                						

				</p>
                                
			</div>
                                     
         <div id="author-box">
	<h2><?php _e('About The Author'); ?></h2>
<?php
	$author_email = get_the_author_email();
	echo get_avatar($author_email, '80', 'wavatar');
?>
	<h6><?php the_author_posts_link(); ?></h6>
	<?php the_author_description(); ?>
        </div>        

                            
                        <div class="comments-template">
                              <h2>Comments</h2>
                              <?php comments_template(); ?>
                        </div>

		</div>

	<?php endwhile; ?>

		<div class="navigation">
			<?php previous_post_link('&laquo; %link') ?> &nbsp; &nbsp; <?php next_post_link(' %link &raquo;') ?>
		</div>

	<?php else : ?>

		<div class="post">
			<h2><?php _e('Not Found'); ?></h2>
		</div>

	<?php endif; ?>

</div>

<?php include('right_sidebar.php');?>

<?php get_footer(); ?>