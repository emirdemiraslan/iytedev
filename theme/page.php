<?php
/* 
* Single Page
*/
get_header();
?>
<?php while ( have_posts() ): the_post(); ?>
<main id="main-content" tabindex="-1" data-page-id="<?php echo "page_".get_the_ID(); ?>">
    <?php
    if(has_post_thumbnail()):
        $featured_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
        if ( empty( $featured_alt ) ) {
            $featured_alt = get_the_title();
        }
    ?>
<div class="page-featured img-cover" style="background-image:url(<?php the_post_thumbnail_url( 'full' ); ?>); <?php if(get_field( 'featured_height' )) echo 'height:'.get_field('featured_height').'px'; ?>" role="img" aria-label="<?php echo esc_attr( $featured_alt ); ?>">

</div>
    <?php endif;?>
    <!--article-->
    <section class="post_content">
        <div class="container">
            <div class="row">
                <div class="col-xxl-2 col-xl-2 col-md-12 hidden-lg-down">
                    <?php get_template_part( 'elements/post/_left_nav' ); ?>
                </div>
                <div class="col-xxl-10 col-xl-10 col-md-12">
                    <?php get_template_part( 'elements/post/_article' ); ?>
                </div>
            </div>
        </div>

    </section>

</main>
<?php endwhile;?>
	

<?php get_footer(); ?>