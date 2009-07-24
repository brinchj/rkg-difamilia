<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<?php include('left_sidebar.php');?>

<div id="container">
<br />
<?php if (have_posts()) : while (have_posts()) : the_post();?>
 <div class="post">
  <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
  <div class="entrytext">
   <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
  </div>
 </div>
 <?php endwhile; endif; ?>
	
		<br />

<h4>Archives by Month:</h4>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
<br />
<h4>Archives by Subject:</h4>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>
<br />
<?php edit_post_link('Edit', '<p>', '</p>'); ?>
	
</div>

<?php include('right_sidebar.php');?>

<?php get_footer(); ?>
