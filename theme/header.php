<?php
/**
 * Header file common to all
 * templates
 *
 * @package @@name
 */

?>
<!doctype html>
<html class="site no-js" <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<?php get_template_part( 'assets/favicons/favicons' ); ?>
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
	<!--closes in footer-->
	<div class="box_wrapper">

	
<div id="top">
	<div class="container">
		<div class="row">
			<div class="col-12 align-items-center justify-content-end topmenu">
				<div class="topmenu__quick">
					<?php MOZ_Menu::nav_menu('top_menu'); ?>
				</div>
				<div class="topmenu__social socialmenu">
					<div class="nav nav--social">
						<a href="https://facebook.com/IYTEM" target="_blank"><span class="icon-facebook"></span></a>
						<a href="https://twitter.com/iyteedutr" target="_blank"><span class="icon-twitter"></span></a>
						<a href="https://instagram.com/iyteedutr" target="_blank"><span class="icon-instagram"></span></a>
						<a href="https://www.youtube.com/user/iyteiztech" target="_blank"><span class="icon-youtube"></span></a>
						<a href="https://www.flickr.com/photos/iyte-iztech/" target="_blank"><span class="icon-flickr"></span></a>
						<a href="https://www.linkedin.com/school/i%CC%87zmir-y%C3%BCksek-teknoloji-enstit%C3%BCs%C3%BC/" target="_blank"><span class="icon-linkedin"></span></a>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</div>

<div class="nav--mobile hidden-lg-up">
				<div id="mobilemenu" class="mobilemenu__body nav">
		
	</div>
</div>
			
<?php if(!is_front_page() && !is_singular( 'manset' )): ?>
<header class="header clean_header">
	<div class="container top">
		<div class="row justify-content-between align-items-center">
			<div class="brand">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img class="logo" src="<?php echo get_template_directory_uri()."/assets/svg/logo-colored-full-v.svg"; ?>" alt="İzmir Yüksek Teknoloji Enstitiüsü">
			</a>
			</div>
		
		
			<div class="nav nav--desktop hidden-md-down">
				<?php MOZ_Menu::nav_menu('primary'); ?>
			</div>
			
		</div>
	</div>
</header>
<?php endif; ?>


<?php // Common header content goes here. ?>
