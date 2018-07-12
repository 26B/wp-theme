<?php

use [namespace];

/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package [vendor_name]
 * @since   [initial_version]
 */

if ( file_exists( \get_stylesheet_directory() . '/vendor/autoload.php' ) ) {
	require_once \get_stylesheet_directory() . '/vendor/autoload.php';
}

// Theme constants.
define( 'THEME_VERSION', '[initial_version]' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
\add_action( 'after_setup_theme', function () {

	$components = array(
		'http_ajaxes'          => new [namespace]\Http\Ajaxes(),
		'http_assets'          => new [namespace]\Http\Assets(),
		'setup_actions'        => new [namespace]\Setup\Actions(),
		'setup_fields'         => new [namespace]\Setup\Fields(),
		'setup_filters'        => new [namespace]\Setup\Filters(),
		'setup_i18n'           => new [namespace]\Setup\I18n(),
		'setup_supports'       => new [namespace]\Setup\Supports(),
		'structure_comments'   => new [namespace]\Structure\Comments(),
		'structure_navs'       => new [namespace]\Structure\Navs(),
		'structure_sidebars'   => new [namespace]\Structure\Sidebars(),
		'structure_thumbnails' => new [namespace]\Structure\Thumbnails(),
		'structure_widgets'    => new [namespace]\Structure\Widgets(),
	);

	/**
	 * Remove/Add components
	 *
	 * Note: if you add a component, make sure it implements a method "ready()".
	 */
	$components = \apply_filters( 'theme_components', $components );

	foreach ( $components as $name => $instance ) {
		if ( method_exists( $instance, 'ready' ) ) {
			$instance->ready();
		}
	}
} );
