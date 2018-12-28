<?php
/**
 * Read up on the WP Template Hierarchy for
 * when this file is used
 *
 * @package @@name
 */

?>
<?php get_header(); ?>

	<?php while ( have_posts() ): the_post(); ?>
<main id="<?php echo "page_".get_the_ID(); ?>">
    
    <!--article-->
    <section class="post_content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    
                    <?php the_content(); ?>    
                                
                    
                    
                </div>
            </div>
        </div>
    </section>

</main>
<?php endwhile;?>

<?php get_footer();
