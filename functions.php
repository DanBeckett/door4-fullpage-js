<?php
/**
 * Door4 fullPage.js Theme functions and definitions
 *
 * @package WordPress
 * @subpackage Door4 fullPage.js Theme
 * @since Door4 fullPage.js Theme 1.0
 */

if ( ! function_exists( 'door4_fullpage_setup' ) ) :

	function door4_fullpage_setup() {

		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'primary'   => __( 'Main navigation menu', 'door4-fullpage' )
		) );

		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

	};

endif;

add_action('after_setup_theme', 'door4_fullpage_setup');

if(function_exists('acf_add_options_page')) {

	$settings = array (
		'page_title'	=>	'Door4 fullPage.js Theme Options',
		'menu_title'	=>	'Theme Options',
		'menu_slug'	=>	'theme-options',
		'position'	=>	'30.1',
		'icon_url'	=>	'dashicons-admin-generic'
	);

	acf_add_options_page($settings);

};

function door4_fullpage_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'default-style-css', get_stylesheet_uri() );
	wp_enqueue_style( 'jquery-fullpage-style', get_template_directory_uri() . '/css/jquery.fullPage.css', array(), '2.1.9' );
	wp_enqueue_style( 'compiled-stylesheet', get_template_directory_uri() . '/css/compiled/main.css', array(), '0.8.0' );

	// Load the Internet Explorer specific stylesheet.
	// wp_enqueue_style( 'door4-fullpage-ie', get_template_directory_uri() . '/css/ie.css', array( 'door4-fullpage-style' ), '20131205' );
	// wp_style_add_data( 'door4-fullpage-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-whole', '//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js', array( 'jquery' ), '1.9.1' );

	// optional vendor scripts that come with fullPage.js
	// ## ACTIVATE ##
	// ## vendor-jquery-easings if using a different easing than "linear" or "swing" ##
	// ## vendor-jquery-slimscroll if using the setting "scrollOverflow:true" ##
	
	//wp_enqueue_script( 'vendor-jquery-easings', get_template_directory_uri() . '/js/vendors/jquery.easings.min.js', array('jquery', 'jquery-ui-whole' ), '1.9.2', true );
	//wp_enqueue_script( 'vendor-jquery-slimscroll', get_template_directory_uri() . '/js/vendors/jquery.slimscroll.min.js', array('jquery', 'jquery-ui-whole' ), '1.3.2', true );

	// main script for fullPage.js
	wp_enqueue_script( 'jquery-fullpage', get_template_directory_uri() . '/js/jquery.fullPage.min.js', array('jquery', 'jquery-ui-whole' ), '2.2.9', true );
	
	// theme functions - initialisations etc.
	wp_enqueue_script( 'door4-fullpage-scripts', get_template_directory_uri() . '/js/functions.js', array( 'jquery', 'jquery-ui-whole', 'jquery-fullpage' ), '20140930', true );
}

add_action( 'wp_enqueue_scripts', 'door4_fullpage_scripts' );

// Instantiate new Walker class to modify menus to use data-menuanchor
// calling the slug for links so we can slide up/down the page
class door4_datamenuanchor_menu extends Walker_Nav_Menu
  {
        function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0)
        {
        	$post = get_post($item->object_id);
			$slug = $post->post_name;
            $output .= '<li data-menuanchor="fp-' . $slug . '"><a href="#' . $slug .'" >';
            $output .= $item->title;
            $output .= '</a></li>';
        }
  }