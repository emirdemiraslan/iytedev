<?php
/* 
* Manşet
*/
get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main id="main-content" tabindex="-1" data-post-id="<?php echo "post_".get_the_ID(); ?>">
    
    <!--article-->
    <section class="post_content">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-md-12">

                    <?php get_template_part( 'elements/post/_article' ); ?>
                </div>
                <div class="col-xxl-3 col-xl-4 col-md-12">
                    <?php get_template_part( 'elements/post/_sidebar' ); ?>
                </div>
            </div>
        </div>

    </section>

</main>
<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sayfaya ulaşılamadı' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>