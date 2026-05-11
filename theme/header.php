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
	<?php
	$is_tr = (get_locale() == "tr_TR");
	$skip_label = $is_tr ? 'Ana içeriğe geç' : 'Skip to main content';
	$new_window_text = $is_tr ? 'yeni pencerede açılır' : 'opens in a new window';
	?>
	<a class="skip-link screen-reader-text" href="#main-content"><?php echo esc_html($skip_label); ?></a>
	<?php if ( is_front_page() ) : ?>
		<h1 class="screen-reader-text"><?php echo $is_tr ? 'İzmir Yüksek Teknoloji Enstitüsü' : 'İzmir Institute of Technology'; ?></h1>
	<?php endif; ?>
	<!--closes in footer-->
	<div class="box_wrapper">


<header id="top" role="banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 topmenu">
				<div class="brand">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if($is_tr):?>
						<img class="logo" src="<?php echo get_template_directory_uri()."/assets/img/logo-white-full-v.png"; ?>" alt="İzmir Yüksek Teknoloji Enstitiüsü">
						<?php else:?>
						<img class="logo" src="<?php echo get_template_directory_uri()."/assets/img/logo-white-full-v-en.png"; ?>" alt="İzmir Institute of Technology">
						<?php endif;?>
					</a>
				</div>

				<div class="nav nav--desktop hidden-md-down" role="navigation" aria-label="<?php echo $is_tr ? 'Ana menü' : 'Main menu'; ?>">
					<?php MOZ_Menu::nav_menu('primary'); ?>
				</div>

				<div class="top_right align-self-start hidden-md-down">
					<div class="topmenu__lang">
						<?php if($is_tr):?>
						<a class="hover__animate" href="https://en.iyte.edu.tr" lang="en" hreflang="en">visit site in English</a>
						<?php else:?>
						<a class="hover__animate" href="https://iyte.edu.tr" lang="tr" hreflang="tr">Türkçe siteyi ziyaret edin</a>
						<?php endif;?>
					</div>
					<div class="topmenu__quick" role="navigation" aria-label="<?php echo $is_tr ? 'Hızlı erişim' : 'Quick links'; ?>">
						<?php MOZ_Menu::nav_menu('top_menu'); ?>
					</div>
					<div class="topmenu__social socialmenu">
						<nav class="nav nav--social" aria-label="<?php echo $is_tr ? 'Sosyal medya' : 'Social media'; ?>">
							<a href="https://facebook.com/IYTEM" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "Facebook'ta İYTE (yeni pencerede açılır)" : 'İYTE on Facebook (opens in a new window)'); ?>"><span class="icon-facebook" aria-hidden="true"></span></a>
							<a href="https://twitter.com/iyteedutr" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "X (Twitter)'da İYTE (yeni pencerede açılır)" : 'İYTE on X (Twitter) (opens in a new window)'); ?>"><span class="icon-twitter" aria-hidden="true"></span></a>
							<a href="https://instagram.com/iyteedutr" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "Instagram'da İYTE (yeni pencerede açılır)" : 'İYTE on Instagram (opens in a new window)'); ?>"><span class="icon-instagram" aria-hidden="true"></span></a>
							<a href="https://www.youtube.com/channel/UCSWVrihXDCUqwa-MlPTTAug" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "YouTube'da İYTE (yeni pencerede açılır)" : 'İYTE on YouTube (opens in a new window)'); ?>"><span class="icon-youtube" aria-hidden="true"></span></a>
							<a href="https://www.flickr.com/photos/iyte-iztech/" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "Flickr'da İYTE (yeni pencerede açılır)" : 'İYTE on Flickr (opens in a new window)'); ?>"><span class="icon-flickr" aria-hidden="true"></span></a>
							<a href="https://www.linkedin.com/school/i%CC%87zmir-y%C3%BCksek-teknoloji-enstit%C3%BCs%C3%BC/" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "LinkedIn'de İYTE (yeni pencerede açılır)" : 'İYTE on LinkedIn (opens in a new window)'); ?>"><span class="icon-linkedin" aria-hidden="true"></span></a>
						</nav>
					</div>
					<div class="header-search">
						<form id="search_form" action="<?php echo esc_url( home_url('/') ); ?>" role="search" aria-label="<?php echo $is_tr ? 'Site içi arama' : 'Site search'; ?>">
							<div class="search_form_wrapper">
								<label for="search-field-desktop" class="screen-reader-text"><?php echo $is_tr ? 'Arama terimi' : 'Search term'; ?></label>
								<input id="search-field-desktop" type="search" class="search-field" placeholder="<?php echo $is_tr ? 'Ara...':'Search...';?>" value="" name="s">
								<button type="submit" aria-label="<?php echo $is_tr ? 'Ara' : 'Search'; ?>"><i class="fa fa-search" aria-hidden="true"></i></button>
							</div>
							<span class="search_radio_wrapper" role="radiogroup" aria-label="<?php echo $is_tr ? 'Arama türü' : 'Search type'; ?>">
									<label title="<?php echo $is_tr ? 'Rehberde Ara':'Staff Search';?>">
										<input name="searchType" type="radio"  value="rehber" checked><i class="fa fa-users" aria-hidden="true"></i><span class="screen-reader-text"><?php echo $is_tr ? 'Rehberde Ara':'Staff Search';?></span>
									</label>
									<label title="<?php echo $is_tr ? 'Sitede Ara':'Site Search';?>">
										<input type="radio" name="searchType" value="s" ><i class="fa fa-sitemap" aria-hidden="true"></i><span class="screen-reader-text"><?php echo $is_tr ? 'Sitede Ara':'Site Search';?></span>
									</label>
							</span>
						</form>
					</div>
				</div>

				<div class="toggle-mobile-menu hidden-lg-up">
					<a href="javascript:void(0);" role="button" tabindex="0" aria-expanded="false" aria-controls="mobilemenu" aria-label="<?php echo $is_tr ? 'Menüyü aç' : 'Open menu'; ?>">
						<span class="icon-mobile-menu" aria-hidden="true"></span>
					</a>
				</div>

			</div>
		</div>
	</div>
</header>

<div class="nav--mobile hidden-lg-up">
	<div id="mobilemenu" class="hidden nav">
		<div class="toggle-mobile-menu hidden-lg-up">
			<a href="javascript:void(0);" role="button" tabindex="0" aria-expanded="true" aria-controls="mobilemenu" aria-label="<?php echo $is_tr ? 'Menüyü kapat' : 'Close menu'; ?>">
				<span class="icon-close-circle" aria-hidden="true"></span>
			</a>
		</div>
		<div class="topmenu__lang">
			<?php if($is_tr):?>
			<a class="hover__animate" href="http://en.iyte.edu.tr" lang="en" hreflang="en">visit site in English</a>
			<?php else:?>
			<a class="hover__animate" href="http://iyte.edu.tr" lang="tr" hreflang="tr">Türkçe siteyi ziyaret edin</a>
			<?php endif;?>
		</div>
		<div class="header-search">
			<form id="search_form_mobile" action="<?php echo esc_url( home_url('/') ); ?>" role="search" aria-label="<?php echo $is_tr ? 'Site içi arama' : 'Site search'; ?>">
				<div class="search_form_wrapper">
					<label for="search-field-mobile" class="screen-reader-text"><?php echo $is_tr ? 'Arama terimi' : 'Search term'; ?></label>
					<input id="search-field-mobile" type="search" class="search-field" placeholder="<?php echo $is_tr ? 'Ara...':'Search...';?>" value="" name="s">
					<button type="submit" aria-label="<?php echo $is_tr ? 'Ara' : 'Search'; ?>"><i class="fa fa-search" aria-hidden="true"></i></button>
				</div>
				<span class="search_radio_wrapper" role="radiogroup" aria-label="<?php echo $is_tr ? 'Arama türü' : 'Search type'; ?>">
						<label title="<?php echo $is_tr ? 'Rehberde Ara':'Staff Search';?>">
							<input name="searchType" type="radio"  value="rehber" checked><i class="fa fa-users" aria-hidden="true"></i><span class="screen-reader-text"><?php echo $is_tr ? 'Rehberde Ara':'Staff Search';?></span>
						</label>
						<label title="<?php echo $is_tr ? 'Sitede Ara':'Site Search';?>">
							<input type="radio" name="searchType" value="s" ><i class="fa fa-sitemap" aria-hidden="true"></i><span class="screen-reader-text"><?php echo $is_tr ? 'Sitede Ara':'Site Search';?></span>
						</label>
				</span>
			</form>
		</div>
		<nav aria-label="<?php echo $is_tr ? 'Ana menü' : 'Main menu'; ?>">
		<?php MOZ_Menu::nav_menu('primary'); ?>
		</nav>
		<h3 class="title"><?php echo $is_tr ? "Kolay Erişim":"Quick Links";?></h3>
		<nav aria-label="<?php echo $is_tr ? 'Hızlı erişim' : 'Quick links'; ?>">
		<?php MOZ_Menu::nav_menu('top_menu'); ?>
		</nav>
		<nav class="nav nav--social" aria-label="<?php echo $is_tr ? 'Sosyal medya' : 'Social media'; ?>">
							<a href="https://facebook.com/IYTEM" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "Facebook'ta İYTE (yeni pencerede açılır)" : 'İYTE on Facebook (opens in a new window)'); ?>"><span class="icon-facebook" aria-hidden="true"></span></a>
							<a href="https://twitter.com/iyteedutr" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "X (Twitter)'da İYTE (yeni pencerede açılır)" : 'İYTE on X (Twitter) (opens in a new window)'); ?>"><span class="icon-twitter" aria-hidden="true"></span></a>
							<a href="https://instagram.com/iyteedutr" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "Instagram'da İYTE (yeni pencerede açılır)" : 'İYTE on Instagram (opens in a new window)'); ?>"><span class="icon-instagram" aria-hidden="true"></span></a>
							<a href="https://www.youtube.com/channel/UCSWVrihXDCUqwa-MlPTTAug" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "YouTube'da İYTE (yeni pencerede açılır)" : 'İYTE on YouTube (opens in a new window)'); ?>"><span class="icon-youtube" aria-hidden="true"></span></a>
							<a href="https://www.flickr.com/photos/iyte-iztech/" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "Flickr'da İYTE (yeni pencerede açılır)" : 'İYTE on Flickr (opens in a new window)'); ?>"><span class="icon-flickr" aria-hidden="true"></span></a>
							<a href="https://www.linkedin.com/school/i%CC%87zmir-y%C3%BCksek-teknoloji-enstit%C3%BCs%C3%BC/" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($is_tr ? "LinkedIn'de İYTE (yeni pencerede açılır)" : 'İYTE on LinkedIn (opens in a new window)'); ?>"><span class="icon-linkedin" aria-hidden="true"></span></a>
		</nav>
	</div>
</div>


<?php // Common header content goes here. ?>
