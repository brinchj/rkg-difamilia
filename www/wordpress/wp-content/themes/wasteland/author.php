<?php get_header(); ?>

<?php include('left_sidebar.php');?>

<div id="container">

      <!-- This sets the $curauth variable -->
<?php
if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name);
else :
$curauth = get_userdata(intval($author));
endif;
?>

<h2>Author's Spotlight: <?php echo $curauth->nickname; ?></h2><br />

<h3>Website:</h3>
<p><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>

<br />
<h3>Profile:</h3>
<?php echo get_avatar($curauth->user_email, '96', $avatar); ?><p><?php echo $curauth->user_description; ?></p>

<br />
<h3>Posts by <?php echo $curauth->nickname; ?>:</h3>

<ul>
<!-- The Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
<?php the_title(); ?></a>, 
<?php the_time(__('F j, Y')); ?> in <?php the_category('&');?>
  </li>

  <?php endwhile; else: ?>
     <p><?php _e('No posts by this author.'); ?></p>

	<?php endif; ?>
<!-- End Loop -->
</ul>

</div>

<?php include('right_sidebar.php');?>

<?php get_footer(); ?>
