<?php

namespace [namespace]\Setup;

/**
 * Theme Custom Fields
 *
 * @link https://codex.wordpress.org/Custom_Fields
 *
 * @package [vendor_name]\Setup
 * @since   [initial_version]
 */
class Fields {

	/**
	 * Register hooks.
	 *
	 * @since [initial_version]
	 */
	public function ready() {
		\add_action( 'init', [ $this, 'register_fields' ] );
	}

	/**
	 * Register custom fields.
	 *
	 * @since [initial_version]
	 */
	public function register_fields() {

		$components = [];

		foreach ( $components as $component ) {
			$component->register();
		}
	}
}
