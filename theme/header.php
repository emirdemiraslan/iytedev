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
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 topmenu">
				<div class="brand">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if(get_locale()=="tr_TR"):?>
						<img class="logo" src="<?php echo get_template_directory_uri()."/assets/img/logo-white-full-v.png"; ?>" alt="İzmir Yüksek Teknoloji Enstitiüsü">
						<?php else:?>
						<img class="logo" src="<?php echo get_template_directory_uri()."/assets/img/logo-white-full-v-en.png"; ?>" alt="İzmir Institute of Technology">
						<?php endif;?>
					</a>
				</div>

				<div class="nav nav--desktop hidden-md-down">
					<?php MOZ_Menu::nav_menu('primary'); ?>
				</div>

				<div class="top_right align-self-start hidden-md-down">
					<div class="topmenu__lang">
						<?php if(get_locale()=="tr_TR"):?>
						<a class="hover__animate" href="http://en.iyte.edu.tr">visit site in English</a>
						<?php else:?>
						<a class="hover__animate" href="http://iyte.edu.tr">Türkçe siteyi ziyaret edin</a>
						<?php endif;?>
					</div>
					<div class="topmenu__quick">
						<?php MOZ_Menu::nav_menu('top_menu'); ?>
					</div>
					<div class="topmenu__social socialmenu">
						<div class="nav nav--social">
							<a href="https://facebook.com/IYTEM" target="_blank"><span class="icon-facebook"></span></a>
							<a href="https://twitter.com/iyteedutr" target="_blank"><span class="icon-twitter"></span></a>
							<a href="https://instagram.com/iyteedutr" target="_blank"><span class="icon-instagram"></span></a>
							<a href="https://www.youtube.com/channel/UCSWVrihXDCUqwa-MlPTTAug" target="_blank"><span class="icon-youtube"></span></a>
							<a href="https://www.flickr.com/photos/iyte-iztech/" target="_blank"><span class="icon-flickr"></span></a>
							<a href="https://www.linkedin.com/school/i%CC%87zmir-y%C3%BCksek-teknoloji-enstit%C3%BCs%C3%BC/" target="_blank"><span class="icon-linkedin"></span></a>
						</div>
					</div>
					<div class="header-search">
						<form id="search_form" action="<?php echo esc_url( home_url('/') ); ?>">
							<div class="search_form_wrapper">
								<input type="search" class="search-field" placeholder="<?php echo ((get_locale()=="tr_TR") ? 'Ara...':'Search...');?>" value="" name="s">
								<button><i class="fa fa-search"></i></button>
							</div>
							<span class="search_radio_wrapper">
									<label title="<?php echo ((get_locale()=="tr_TR") ? 'Rehberde Ara':'Staff Search');?>">
										<input name="searchType" type="radio"  value="rehber" checked><i class="fa fa-users"></i>
									</label>
									<label title="<?php echo ((get_locale()=="tr_TR") ? 'Sitede Ara':'Site Search');?>">
										<input type="radio" name="searchType" value="s" ><i class="fa fa-sitemap"></i>
									</label>
								</span>
						</form>
					</div>
				</div>

				<div class="toggle-mobile-menu hidden-lg-up">
					<a href="javascript:void(0);">
						<span class="icon-mobile-menu"></span>
					</a>
				</div>
			
			</div>
		</div>
	</div>
</div>

<div class="nav--mobile hidden-lg-up">
	<div id="mobilemenu" class="hidden nav">
		<div class="toggle-mobile-menu hidden-lg-up">
			<a href="javascript:void(0);">
				<span class="icon-close-circle"></span>
			</a>
		</div>
		<div class="topmenu__lang">
			<?php if(get_locale()=="tr_TR"):?>
			<a class="hover__animate" href="http://en.iyte.edu.tr">visit site in English</a>
			<?php else:?>
			<a class="hover__animate" href="http://iyte.edu.tr">Türkçe siteyi ziyaret edin</a>
			<?php endif;?>
		</div>
		<div class="header-search">
			<form id="search_form" action="<?php echo esc_url( home_url('/') ); ?>">
				<div class="search_form_wrapper">
					<input type="search" class="search-field" placeholder="<?php echo ((get_locale()=="tr_TR") ? 'Ara...':'Search...');?>" value="" name="s">
					<button><i class="fa fa-search"></i></button>
				</div>
				<span class="search_radio_wrapper">
						<label title="<?php echo ((get_locale()=="tr_TR") ? 'Rehberde Ara':'Staff Search');?>">
							<input name="searchType" type="radio"  value="rehber" checked><i class="fa fa-users"></i>
						</label>
						<label title="<?php echo ((get_locale()=="tr_TR") ? 'Sitede Ara':'Site Search');?>">
							<input type="radio" name="searchType" value="s" ><i class="fa fa-sitemap"></i>
						</label>
					</span>
			</form>
		</div>
		<?php MOZ_Menu::nav_menu('primary'); ?>
		<h3 class="title"><?php echo (get_locale()=="tr_TR") ? "Kolay Erişim":"Quick Links";?></h3>
		<?php MOZ_Menu::nav_menu('top_menu'); ?>
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


<?php // Common header content goes here. ?>
