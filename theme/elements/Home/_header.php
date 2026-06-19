<!--<?php //get_template_part( 'elements/global/_hero_header' ); ?>-->

<?php
$args = array(
  'numberposts' => 10,
  'post_type'   => 'manset'
);
 
$manset = get_posts( $args );
?>

<section id="featured_news" class="hide">

<?php foreach($manset as $m):
	$has_content = (strlen($m->post_content)>0);
	?>
 
	
	<?php
	// Build accessible label from custom_title rows for the slide background.
	$slide_title_parts = array();
	if ( have_rows( 'custom_title', $m->ID ) ) {
		while ( have_rows( 'custom_title', $m->ID ) ) {
			the_row();
			$slide_title_parts[] = trim( get_sub_field( 'satir' ) );
		}
	}
	$slide_label = implode( ' ', array_filter( $slide_title_parts ) );
	if ( empty( $slide_label ) ) {
		$slide_label = $m->post_title;
	}
	?>
	<article id="news-slug-<?php echo $m->ID;?>" class="featured img-cover" style="background-image:url(<?php echo get_the_post_thumbnail_url($m->ID, 'full')?>)" role="group" aria-roledescription="<?php echo (get_locale()=='tr_TR') ? 'slayt' : 'slide'; ?>" aria-label="<?php echo esc_attr( $slide_label ); ?>">

	<?php if($has_content):?><a href="<?php echo get_the_permalink($m->ID); ?>"><span class="screen-reader-text"><?php echo esc_html( $slide_label ); ?></span><?php endif;?>
			<div class="container">
				<div class="row justify-content-<?php the_field('yatay_hizalama', $m->ID); ?> align-items-<?php the_field('dikey_hizalama', $m->ID); ?>" >
					<?php if( have_rows('custom_title', $m->ID) ):?>
					<h2 class="featured__title hidden-md-down">
							<?php while(have_rows('custom_title', $m->ID)): the_row();?>
								<span><?php the_sub_field('satir'); ?></span><br/>
							<?php endwhile; ?>
							
							
					</h2>
					<?php endif; ?>
				</div>
				<div class="featured__mobile--title hidden-lg-up">
					<?php if( have_rows('custom_title', $m->ID) ):?>
							<?php while(have_rows('custom_title', $m->ID)): the_row();?>
								 <?php the_sub_field('satir'); ?>
								 <?php echo " ";?>
							<?php endwhile; ?>
						<?php endif; ?>
				</div>
			</div>
		<?php if($has_content):?></a><?php endif;?>
		<img width="1" height="1" src="<?php echo get_the_post_thumbnail_url($m->ID, 'full')?>" alt="" aria-hidden="true" style="display:none !important"/>
	</article>
<?php endforeach;?>

</section>