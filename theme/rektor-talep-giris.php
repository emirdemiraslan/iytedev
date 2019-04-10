<?php
        /*Template Name: Rektör Talep Giriş*/
        get_header();
        $is_error = get_query_var('failed');
       
        if(is_user_logged_in() && !is_admin()){

            wp_safe_redirect(get_permalink( get_page_by_path( 'rektorden-talep-formu' ) ));
            exit;
        }
        else {
        }
        
        ?>
        
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main id="<?php echo "post_".get_the_ID(); ?>">
    
    <!--article-->
    <section class="post_content">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-md-12">

                    <?php get_template_part( 'elements/post/_article' ); ?>
                </div>
                
            </div>
        </div>

    </section>

</main>
    <?php if($is_error =="true"): ?>
        <script>
        jQuery(document).ready(function($){
            jQuery('#error_message').css('display','block');
        });
        
        </script>
    <?php endif; ?>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sayfaya ulaşılamadı' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>