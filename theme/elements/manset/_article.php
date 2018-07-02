<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article class="post_article">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="post_title"><?php the_title();?></h1>
                    <div class="postmeta justify-content-start align-items-center">
                        <div class="postmeta__date"><?php the_date(); ?></div>
                        <?php $post_type = get_post_type( $post->ID ); ?>
                        <div class="postmeta__type"><?php echo get_post_type_object( $post_type )->labels->singular_name; ?></div>
                        <div class="postmeta__tags"><?php the_tags( '', ' ' ); ?></div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <main class="content">
        <section class="wysiwyg single-col">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris varius leo in ligula egestas, a imperdiet felis vulputate. Proin molestie velit dui, id vestibulum sem sodales ut. Nam facilisis sed justo quis ornare. Maecenas aliquam imperdiet luctus. Aliquam eget ornare nisi. Nunc feugiat ac turpis nec posuere. Quisque malesuada, arcu ac ullamcorper faucibus, erat massa elementum elit, et pretium elit purus efficitur nibh.</p>
                        <p>In malesuada, quam in tristique mattis, sem lacus eleifend quam, quis tristique odio enim non massa. Vivamus id varius tellus. Mauris gravida, neque id varius pellentesque, lacus velit scelerisque mauris, eu dictum nisi nisi et nisi. Praesent vitae est mollis, cursus justo non, mattis elit. Maecenas nulla elit, rhoncus sit amet congue ac, tincidunt nec nibh. Etiam pellentesque, velit ac aliquet aliquet, leo neque aliquet sem, ut tincidunt libero tellus in purus. Aliquam elementum pellentesque vehicula. Integer nisi sem, sagittis eu lacinia sit amet, vehicula quis elit. Phasellus in ipsum id sem porta fringilla ut id nunc. Maecenas ut hendrerit nisi. Integer porta volutpat justo, non ultricies massa convallis non. Aenean scelerisque dolor sed </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</article>
<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sayfaya ulaşılamadı' ); ?></p>
<?php endif; ?>