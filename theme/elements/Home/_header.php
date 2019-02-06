<!--<?php //get_template_part( 'elements/global/_hero_header' ); ?>-->

<?php
$args = array(
  'numberposts' => 10,
  'post_type'   => 'manset'
);
 
$manset = get_posts( $args );
?>

<section id="featured_news">

<?php foreach($manset as $m):
	$has_content = (strlen($m->post_content)>0);
	?>
 
	
	<article id="news-slug-<?php echo $m->ID;?>" class="featured img-cover" style="background-image:url(<?php echo get_the_post_thumbnail_url($m->ID, 'full')?>)">
	<?php if($has_content):?><a href="<?php echo get_the_permalink($m->ID); ?>"><?php endif;?>
			<div class="container">
				<div class="row justify-content-<?php the_field('yatay_hizalama', $m->ID); ?> align-items-<?php the_field('dikey_hizalama', $m->ID); ?>" >
					<h1 class="featured__title hidden-md-down">
						<?php if( have_rows('custom_title', $m->ID) ):?>
							<?php while(have_rows('custom_title', $m->ID)): the_row();?>
								<span><?php the_sub_field('satir'); ?></span><br/>
							<?php endwhile; ?>
						<?php endif; ?>
						
					
					</h1>
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
	</article>
<?php endforeach;?>

</section>