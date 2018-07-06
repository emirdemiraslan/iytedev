<?php
/* 
* Manşet
*/
get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main id="<?php echo "manset_".get_the_ID(); ?>">
    <section id="manset_header" class="section hero hero_header">
        <?php get_template_part( 'elements/manset/_header' ); ?>
    </section>
    <!--article-->
    <?php get_template_part( 'elements/post/_article' ); ?>
                

</main>
<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sayfaya ulaşılamadı' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>