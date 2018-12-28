<?php
/* 
* Manşet
*/
get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
<main id="<?php echo "post_".get_the_ID(); ?>">
    
   <?php the_content(); ?>

</main>
<?php endwhile;?>

<?php get_footer(); ?>