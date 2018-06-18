<?php 
/*
* Template Name: Homepage
*/
get_header(); 
?>

<main id="home_main" class="home">
    <section id="home_header" class="section hero">
        <?php get_template_part( 'elements/home/_header' ); ?>
</section>
    <section id="home_arastirma" class="section">
        <?php get_template_part( 'elements/home/_arastirma' ); ?>
</section>
    <section id="home_guncel" class="section">
        <?php get_template_part( 'elements/home/_guncel' ); ?>
</section>
    <section id="home_ogrenci_olmak" class="section">
        <?php get_template_part( 'elements/home/_ogrenci_olmak' ); ?>
</section>
    <section id="home_bottom" class="section">
        <?php get_template_part( 'elements/home/_bottom' ); ?>
</section>

    
</main>
<?php get_footer();