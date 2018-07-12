<?php

namespace [namespace]\Setup;

/**
 * Theme Internationalization
 *
 * This file enables theme internationalization.
 *
 * @package [vendor_name]\Setup
 * @since   [initial_version]
 */
class I18n {

	/**
	 * Load the child theme translated strings.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function ready() {
		\load_child_theme_textdomain(
			'[text_domain]',
			\apply_filters( 'child_theme_textdomain',
			\get_stylesheet_directory() . '/languages', '[theme_slug]' )
		);
	}
}
