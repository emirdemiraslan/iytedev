<?php
        /*Template Name: Rektör Talep */
        get_header();
        
        $usr = wp_get_current_user();
        if(is_user_logged_in()){

        }
        else {
            wp_safe_redirect(get_permalink( get_page_by_path( 'rektorden-talep-formu-giris' ) ));
            exit;
        }
        
        ?>
        
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<main id="<?php echo "post_".get_the_ID(); ?>">

<?php 
if(is_user_logged_in()){
    update_post_meta( get_the_ID(), 'user_email', $usr->user_login ); 
?>
<script>
(function($){

    var formData = {
                        "langid": $('html').attr('lang') == 'tr_TR' ? "tr":"en",
                        "qj": "<?php echo $usr->user_login;?>"
                    }
    
    $.ajax({
        type: 'GET',
        url: 'http://rehber.iyte.edu.tr/index.php',
        data: formData,
        dataType: 'json',
        success: function (result) {
            if(result.length>0){
                var kisi = result[0];
                console.log("Loggedin User Name: "+kisi['Ad Soyad']);
                $('#form-field-isim').val(kisi['Ad Soyad']);
            }
        },
        error: function (err) {
            console.log('error: ', err);
        }
        });
    
}
    )(jQuery);
    </script>

<?php }?>

    
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

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sayfaya ulaşılamadı' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>