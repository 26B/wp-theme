<?php

namespace [namespace]\Structure;

/**
 * Theme Sidebars
 *
 * This file is for registering your theme sidebars,
 * Creates widgetized areas, which an administrator
 * of the site can customize and assign widgets.
 *
 * @package [vendor_name]\Structure
 * @since   [initial_version]
 */
class Sidebars {

	/**
	 * Setup hooks.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function ready() {
		\add_action( 'widgets_init', [ $this, 'register_sidebar' ] );
	}

	/**
	 * Registers the widget areas.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function register_sidebar() {
		\register_sidebar( [
			'id'            => 'sidebar',
			'name'          => \esc_html__( 'Sidebar', '[text_domain]' ),
			'before_widget' => '<div class="widget %2$s">',
			'after_widget'  => "</div>\n",
		] );
	}
}
