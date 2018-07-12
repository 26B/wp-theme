<?php

namespace [namespace]\Structure;

/**
 * Theme Custom Widgets
 *
 * This file is for registering your theme widgets, so
 * they can be assigned to sidebar areas in admin
 * panel by website administrator or user.
 *
 * @package [vendor_name]\Structure
 * @since   [initial_version]
 */
class Widgets {

	/**
	 * Setup hooks.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function ready() {
		\add_action( 'widgets_init', [ $this, 'action_callback' ] );
	}

	/**
	 * My action callback.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function action_callback() {
		// register_widget( '\[namespace]\Widget\Class' );
	}
}
