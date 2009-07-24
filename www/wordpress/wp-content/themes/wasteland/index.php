<?php get_header(); ?>

<?php include('top.php');?>
<?php include('right_sidebar.php');?>
<?php include('left_sidebar.php');?>

<div id="container">

	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
                       
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        
			<div class="entry">

                              <p class="date">
<?php _e('Posted By '); ?> <?php the_author_posts_link(); ?> on <?php the_time(__('F j, Y')); ?>  <?php edit_post_link('Edit', ' &#124; ', ''); ?>  
				</p>

				<?php the_content(); ?>

				<p class="postmetadata">
<?php _e('Category&#58;'); ?> <?php the_category(', ') ?> |  
<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
                     <br />
<span class="tags"><?php _e('Tags: '); ?> <?php the_tags('', ', ', ''); ?></span>
                                </p>

			</div>

		</div>

	<?php endwhile; ?>

		<div class="navigation">
			<?php posts_nav_link(); ?>
		</div>

	<?php else : ?>

		<div class="post">
			<h2><?php _e('Not Found'); ?></h2>
		</div>

	<?php endif; ?>

</div>

<?php get_footer(); ?>