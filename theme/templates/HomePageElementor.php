<?php 
/*
* Template Name: HomepageElementor
*/
get_header(); 
?>
<main id="home_element" class="home">

    <section id="home_header" class="section hero hero_header">
        <?php get_template_part( 'elements/home/_header' ); ?>
    </section>
    <section id="home_main" class="section">
        <?php the_content( ); ?>
    </section>

    
</main>
<?php get_footer();