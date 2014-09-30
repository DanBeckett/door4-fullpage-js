<?php
/**
 * The Header for the fullPage.js Base
 *
 * Displays all of the <head> section and everything up till <div id="fullpage">
 *
 * @package WordPress
 * @subpackage Door4 fullPage.js Theme
 * @since Door4 fullPage.js Theme 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body>

	<?php $menu_args = array(
		'theme_location'	=> 'primary',
		'container'			=>	'',
		'menu_id'			=>	'fullpage_menu',
		'walker' 			=> new door4_datamenuanchor_menu()
	);
	wp_nav_menu( $menu_args ); ?> 

	<div id="fullpage">
