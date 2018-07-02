<?php
/* 
* Manşet
*/
get_header();
?>
<main id="<?php echo "manset_".get_the_ID(); ?>">
    <section id="manset_header" class="section hero hero_header">
        <?php get_template_part( 'elements/manset/_header' ); ?>
    </section>
    <!--article-->
     <?php get_template_part( 'elements/manset/_article' ); ?>

</main>

<?php get_footer(); ?>