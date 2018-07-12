<?php

namespace [namespace]\Structure;

/**
 * Theme Navigation Areas
 *
 * This file is for registering your theme custom navigation areas
 * where various menus can be assigned by site administrators.
 *
 * @package [vendor_name]\Structure
 * @since   [initial_version]
 */
class Navs {

	/**
	 * Registers navigation areas.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function ready() {
		\register_nav_menus( [
			'primary' => \__( 'Primary Navigation', '[text_domain]' ),
		] );
	}
}
