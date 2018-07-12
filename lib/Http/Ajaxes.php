<?php

namespace [namespace]\Http;

/**
 * Theme AJAX Actions
 *
 * This file is for registering your theme AJAX actions,
 * which can be hit with HTTP requests in order to make
 * smooth and dynamic JavaScript components.
 *
 * @package [vendor_name]\Http
 * @since   [initial_version]
 */
class Ajaxes {

	/**
	 * Setup hooks.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function ready() {
		\add_action( 'wp_ajax_my_action', [ $this, 'action_callback' ] );
		\add_action( 'wp_ajax_nopriv_my_action', [ $this, 'action_callback' ] );
	}

	/**
	 * My AJAX action callback.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function action_callback() {
		// Validate nonce token.
		check_ajax_referer( 'my_action_nonce', 'nonce' );
		// Action logic...
		die();
	}
}
