
<article class="post_article">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="post_title"><?php the_title();?></h1>
                    <?php if(!is_page()):?>
                    <div class="postmeta justify-content-start align-items-center">
                        <div class="postmeta__date"><?php the_date(); ?></div>
                        <?php $post_type = get_post_type( $post->ID ); ?>
                        <div class="postmeta__type"><?php echo get_post_type_object( $post_type )->labels->singular_name; ?></div>
                        <div class="postmeta__tags"><?php the_tags( '', ' ' ); ?></div>
                    </div>
                    <?php endif;?>

                </div>
            </div>
        </div>
    </header>
    <main class="content">
        
        <section class="wysiwyg vanilla">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php the_content(); ?>    
                    </div>
                </div>
            </div>
        </section>
        
    </main>
</article>
