<?php
/**
 * Theme Functions &
 * Functionality
 *
 * @package @@name
 */

/*
	=========================================
		ACTION HOOKS & FILTERS
	=========================================
*/

/**--- Actions ---**/

add_action( 'after_setup_theme',  'theme_setup' );

add_action( 'wp_enqueue_scripts', 'theme_styles' );

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/*
Expose php variables to js. just uncomment line
below and see function theme_scripts_localize.
add_action( 'wp_enqueue_scripts', 'theme_scripts_localize', 20 );
*/

// Add the inline script setting the 'js' class to the 'body' tag.
add_action( 'wp_head', 'theme_head_inline_scripts', 1, 2 );

/**--- Filters ---**/

// Add async and defer tags to the theme core js file.
add_filter( 'script_loader_tag', 'theme_script_add_async_attribute', 10, 2 );

/**--- Actions ---**/

if ( ! function_exists( 'theme_setup' ) ) {
	/**
	 * Setup the theme
	 *
	 * @since 1.0
	 */
	function theme_setup() {

		// Let wp know we want to use html5 for content.
		add_theme_support( 'html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
		) );

		/* Let wp know we want to use post thumbnails. */

		add_theme_support( 'post-thumbnails' ); 
		add_image_size('small-news-thumb',70,70,true);
		add_image_size('col-4-thumb',350,232);
		add_image_size('col-3-thumb',254,167);


		// Add WP 4.1 title tag support.
		add_theme_support( 'title-tag' );

		/* Add Custom Logo Support. */

		/*
		add_theme_support( 'custom-logo', array(
			'width'       => 181, // Example Width Size
			'height'      => 42,  // Example Height Size
			'flex-width'  => true,
		) );
		*/

		/* Register navigation menus for theme. */
		add_theme_support( 'menus' );

		
		register_nav_menus( array(
			'primary' => 'Main Menu',
			'footer'  => 'Footer Menu',
			'top_menu'  => 'Top Menu',
		) );
		

		/* Let wp know we are going to handle styling galleries. */

		/*
		add_filter( 'use_default_gallery_style', '__return_false' );
		*/

		// Stop WP from printing emoji service on the front.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );

		// Remove api.w.org reference in html head.
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

		/* Remove toolbar for all users in front end.  */

		
		show_admin_bar( false );
		

		/* Add Custom Image Sizes. */

		/*
		add_image_size( 'ExampleImageSize', 1200, 450, true ); // Example Image Size
		...
		*/

		// WPML configuration.
		// Disable plugin from printing styles and js
		// we are going to handle all that ourselves.
		if ( ! is_admin() ) {
			define( 'ICL_DONT_LOAD_NAVIGATION_CSS', true );
			define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
			define( 'ICL_DONT_LOAD_LANGUAGES_JS', true );
		}

		/*
		Contact Form 7 Configuration needs to be done
		in wp-config.php. add the following snippet
		under the line:
		*/

		/*
		define( 'WP_DEBUG', false );
		*/

		/*
		//Contact Form 7 Plugin Configuration
		define ( 'WPCF7_LOAD_JS',  false ); // Added to disable JS loading
		define ( 'WPCF7_LOAD_CSS', false ); // Added to disable CSS loading
		define ( 'WPCF7_AUTOP',    false ); // Added to disable adding <p> & <br> in form output
		*/

		// Register Autoloaders Loader.
		$theme_dir = get_template_directory();
		include "$theme_dir/library/library-loader.php";
		include "$theme_dir/includes/includes-loader.php";
		include "$theme_dir/components/components-loader.php";
		include "$theme_dir/functions/functions-loader.php";
	}
}// End if().

if ( ! function_exists( 'theme_styles' ) ) {
	/**
	 * Register and/or Enqueue
	 * Styles for the theme
	 *
	 * @since 1.0
	 */
	function theme_styles() {
		$theme_dir = get_stylesheet_directory_uri();

		wp_enqueue_style( 'main', "$theme_dir/assets/css/main.css", array(), '@@time', 'all' );
	}
}

if ( ! function_exists( 'theme_scripts' ) ) {
	/**
	 * Register and/or Enqueue
	 * Scripts for the theme
	 *
	 * @since 1.0
	 */
	function theme_scripts() {
		$theme_dir = get_stylesheet_directory_uri();

		wp_enqueue_script( 'html5shiv', '//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js' );
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'core', "$theme_dir/assets/js/core.js", array(), null, false );
		//wp_enqueue_script( 'main', "$theme_dir/assets/js/main.js", array(), '@@time', true );
		wp_enqueue_script( 'main', "$theme_dir/assets/js/main.js", array( 'jquery' ), '@@time', true );
	}
}

if ( ! function_exists( 'theme_scripts_localize' ) ) {
	/**
	 * Attach variables we want
	 * to expose to our JS
	 *
	 * @since 3.12.0
	 */
	function theme_scripts_localize() {
		$ajax_url_params = array();

		// You can remove this block if you don't use WPML.
		if ( function_exists( 'wpml_object_id' ) ) {
			/* @var object $sitepress SitePress object. */
			global $sitepress;

			$current_lang = $sitepress->get_current_language();
			wp_localize_script( 'main', 'i18n', array(
				'lang' => $current_lang,
			) );

			$ajax_url_params['lang'] = $current_lang;
		}

		wp_localize_script( 'main', 'urls', array(
			'home'  => home_url(),
			'theme' => get_stylesheet_directory_uri(),
			'ajax'  => add_query_arg( $ajax_url_params, admin_url( 'admin-ajax.php' ) ),
		) );
	}
}

if ( ! function_exists( 'theme_head_inline_scripts' ) ) {
	/**
	 * Print inline scripts
	 * we want in html head.
	 */
	function theme_head_inline_scripts() {
		ob_start();
		// Replace the no-js class with js on the html element.
?>
<script type="text/javascript">
	document.documentElement.className=document.documentElement.className.replace(/\bno-js\b/,'js');
</script>
<?php
		echo ob_get_clean(); // WPCS: XSS ok.
	}
}

if ( ! function_exists( 'theme_script_add_async_attribute' ) ) {
	/**
	 * Add async
	 * and defer attributes
	 * to core.js.
	 *
	 * @param string $tag    Html code of script tag.
	 * @param string $handle Script handle.
	 */
	function theme_script_add_async_attribute( $tag, $handle ) {
		if ( 'core' !== $handle ) {
			return $tag;
		}
		return str_replace( ' src', ' async defer src', $tag );
	}
}

add_action( 'elementor_pro/posts/query/tag_filter_all', function( $query ) {
	// Here we set the query to fetch posts with
	// post type of 'custom-post-type1' and 'custom-post-type2'
	$query->set( 'post_type', [ 'haber', 'duyuru', 'manset' ] );

} );


/* Rehber search plugin filter for search query */
function add_query_vars_filter( $vars ) {
  $vars[] = "searchType";
  $vars[] = "failed";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

function template_chooser($template)   
{    
  global $wp_query;   
  $search_type = get_query_var('searchType');   
  if( $wp_query->is_search && $search_type == 'rehber' )   
  {
	  $wp_query->is_search=false;
	  
    return locate_template('rehber-search.php');  //  redirect to archive-search.php
  }   
  return $template;
}
//add_filter('pre_get_posts','template_chooser');
add_filter('template_include', 'template_chooser'); 

/*add custom fields back on*/
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

/* Custom login fail redirect */
add_filter( 'authenticate', function( $user, $username, $password ) {
    // forcefully capture login failed to forcefully open wp_login_failed action, 
    // so that this event can be captured
    if ( empty( $username ) || empty( $password ) ) {
        do_action( 'wp_login_failed', $user );
    }
    return $user;
}, 30, 3 );
add_action( 'wp_login_failed', 'pippin_login_fail' );  // hook failed login
function pippin_login_fail( $username ) {
	
	 //$referrer = ;  // where did the post submission come from?
	 $bits = explode('?',wp_get_referer());
		
	 $referrer = $bits[0];
     // if there's a valid referrer, and it's not the default log-in screen
     if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
          wp_safe_redirect($referrer . '?failed=true' );  // let's append some information (login=failed) to the URL for the theme to use
          exit;
     }
}