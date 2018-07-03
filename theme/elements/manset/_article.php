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
        <section class="wysiwyg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris varius leo in ligula egestas, a imperdiet felis vulputate. Proin molestie velit dui, id vestibulum sem sodales ut. Nam facilisis sed justo quis ornare. Maecenas aliquam imperdiet luctus. Aliquam eget ornare nisi. Nunc feugiat ac turpis nec posuere. Quisque malesuada, arcu ac ullamcorper faucibus, erat massa elementum elit, et pretium elit purus efficitur nibh.</p>
                        <p>In malesuada, quam in tristique mattis, sem lacus eleifend quam, quis tristique odio enim non massa. Vivamus id varius tellus. Mauris gravida, neque id varius pellentesque, lacus velit scelerisque mauris, eu dictum nisi nisi et nisi. Praesent vitae est mollis, cursus justo non, mattis elit. Maecenas nulla elit, rhoncus sit amet congue ac, tincidunt nec nibh. Etiam pellentesque, velit ac aliquet aliquet, leo neque aliquet sem, ut tincidunt libero tellus in purus. Aliquam elementum pellentesque vehicula. Integer nisi sem, sagittis eu lacinia sit amet, vehicula quis elit. Phasellus in ipsum id sem porta fringilla ut id nunc. Maecenas ut hendrerit nisi. Integer porta volutpat justo, non ultricies massa convallis non. Aenean scelerisque dolor sed </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="quote full_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <blockquote>“Cras laoreet mi vitae ex tristique maximus. Ut id scelerisque nisi. Nunc viverra lacus velit, id malesuada tortor volutpat iaculis”</blockquote>
                    </div>
                </div>
            </div>
        </section>
        <section class="wysiwyg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris varius leo in ligula egestas, a imperdiet felis vulputate. Proin molestie velit dui, id vestibulum sem sodales ut. Nam facilisis sed justo quis ornare. Maecenas aliquam imperdiet luctus. Aliquam eget ornare nisi. Nunc feugiat ac turpis nec posuere. Quisque malesuada, arcu ac ullamcorper faucibus, erat massa elementum elit, et pretium elit purus efficitur nibh.</p>
                        <p>In malesuada, quam in tristique mattis, sem lacus eleifend quam, quis trisvtique odio enim non massa. Vivamus id varius tellus. Mauris gravida, neque id varius pellentesque, lacus velit scelerisque mauris, eu dictum nisi nisi et nisi. Praesent vitae est mollis, cursus justo non, mattis elit. Maecenas nulla elit, rhoncus sit amet congue ac, tincidunt nec nibh. Etiam pellentesque, velit ac aliquet aliquet, leo neque aliquet sem, ut tincidunt libero tellus in purus. Aliquam elementum pellentesque vehicula. Integer nisi sem, sagittis eu lacinia sit amet, vehicula quis elit. Phasellus in ipsum id sem porta fringilla ut id nunc. Maecenas ut hendrerit nisi. Integer porta volutpat justo, non ultricies massa convallis non. Aenean scelerisque dolor sed suscipi</p>
                        <img class="alignleft size-thumbnail wp-image-33" src="/wp-content/uploads/2018/07/devrim-pesen-okvur-450x300.jpg" alt="" width="450" height="300" />
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                        <p>Mauris varius leo in ligula egestas, a imperdiet felis vulputate. Proin molestie velit dui, id vestibulum sem sodales ut. <strong>Nam facilisis sed justo quis ornare. Maecenas aliquam imperdiet luctus.</strong> Aliquam eget ornare nisi. Nunc feugiat ac turpis nec posuere. Quisque malesuada, arcu ac ullamcorper faucibus, erat massa elementum elit, et pretium elit purus efficitur nibh. In malesuada, quam in tristique mattis, sem lacus eleifend quam, quis tristique odio enim non massa. Vivamus id varius tellus. Mauris gravida, neque id varius pellentesque, lacus velit scelerisque mauris, eu dictum nisi nisi et nisi. Praesent vitae est mollis, cursus justo non, mattis elit.</p>
                        <p>Maecenas nulla elit, rhoncus sit amet congue ac, tincidunt nec nibh. Etiam pellentesque, velit ac aliquet aliquet, leo neque aliquet sem, ut tincidunt libero tellus in purus. Aliquam elementum pellentesque vehicula. Integer nisi sem, sagittis eu lacinia sit amet, vehicula quis elit. <a href="http://iyte.edu.tr">Phasellus in</a> ipsum id sem porta fringilla ut id nunc. Maecenas ut hendrerit nisi. Integer porta volutpat justo, non ultricies massa convallis non. Aenean scelerisque dolor sed suscipit aliquam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris fringilla erat ac mauris mollis ullamcorper. Pellentesque pellentesque magna sit amet semper scelerisque. Suspendisse eu porttitor leo, nec vehicula massa. Cras laoreet mi vitae ex tristique maximus. Ut id scelerisque nisi. Nunc viverra lacus velit, id malesuada tortor volutpat iaculis. Integer egestas pretium sapien sed sollicitudin.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="wyswyig-video">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="video">
                            <div class="video__float--right video__size--half">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/qKOB2ncoBvM?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        
                        </div>
                        <h3>Praesent vitae est mollis</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris varius leo in ligula egestas, a imperdiet felis vulputate. Proin molestie velit dui, id vestibulum sem sodales ut. Nam facilisis sed justo quis ornare. Maecenas aliquam imperdiet luctus. Aliquam eget ornare nisi. Nunc feugiat ac turpis nec posuere. Quisque malesuada, arcu ac ullamcorper faucibus, erat massa elementum elit, et pretium elit purus efficitur nibh.</p>

                        <p>In malesuada, quam in tristique mattis, sem lacus eleifend quam, quis trisvtique odio enim non massa. Vivamus id varius tellus. Mauris gravida, neque id varius pellentesque, lacus velit scelerisque mauris, eu dictum nisi nisi et nisi. Praesent vitae est mollis, cursus justo non, mattis elit. Maecenas nulla elit, rhoncus sit amet congue ac, tincidunt nec nibh. Etiam pellentesque, velit ac aliquet aliquet, leo neque aliquet sem, ut tincidunt libero tellus in purus. AliquamVivamus id varius tellus. <strong><i>Mauris gravida, neque id varius pellentesque, lacus velit scelerisque mauris,</i></strong> eu dictum nisi nisi et nisi. Praesent vitae est mollis, cursus justo non, mattis elit. Maecenas nulla elit, rhoncus sit amet congue ac, tincidunt nec nibh. Etiam pellentesque, velit ac aliquet aliquet, leo neque aliquet sem, ut tincidunt libero tellus in purus. Aliquam elementum pellentesque vehicula. Integer nisi sem, sagittis eu lacinia sit amet, vehicula quis elit. Phasellus in ipsum id sem porta fringilla ut id nunc. Maecenas ut hendrerit nisi. Integer porta volutpat justo, non ultricies massa convallis non. Aenean scelerisque dolor sed suscipit aliquam.</p>
                </div>
            </div>
        </section>

        <section class="photo_gallery full_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <h2>Fotoğraf Albümü</h2>
                        <div class="photoalbum">
                            <a class="photoalbum__link" href="/wp-content/uploads/2018/05/IMG_2166.jpg"><img class="photoalbum__thumb" src="/wp-content/uploads/2018/05/IMG_2166-251x167.jpg" alt=""  /></a>
                            <a class="photoalbum__link"   href="/wp-content/uploads/2018/06/IMG_2011-opt.jpg"><img class="photoalbum__thumb" src="/wp-content/uploads/2018/06/IMG_2011-opt-251x167.jpg" alt="" width="251" height="167" /></a>
                            <a class="photoalbum__link"   href="/wp-content/uploads/2018/06/11A0306_2400w.jpg"><img class="photoalbum__thumb" src="/wp-content/uploads/2018/06/11A0306_2400w-251x167.jpg" alt="" width="251" height="167" /></a>
                            <a class="photoalbum__link"   href="/wp-content/uploads/2018/07/devrim-pesen-okvur.jpg"><img class="photoalbum__thumb" src="/wp-content/uploads/2018/07/devrim-pesen-okvur-250x167.jpg" alt="" width="250" height="167" /></a>
                            <a class="photoalbum__link"  href="/wp-content/uploads/2018/07/11A0438-1.jpg"><img class="photoalbum__thumb" src="/wp-content/uploads/2018/07/11A0438-1-236x167.jpg" alt="" width="236" height="167" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</article>
<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sayfaya ulaşılamadı' ); ?></p>
<?php endif; ?>