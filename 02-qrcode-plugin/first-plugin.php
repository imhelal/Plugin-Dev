<?php
/**
 * Plugin Name: QR Code Plugin
 * Description: Our first plugin.
 * Version: 1.0
 * Author: Helal
 * License: GPLv2
 * Text Domain: first-plugin
 */


class First_Plugin {
	private static $instance = null;

	private function __construct() {
		add_filter( "the_content", array( $this, 'the_content_callback' ) );
		add_action( 'wp_footer', array( $this, 'wp_footer' ) );
	}

	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function the_content_callback( $content ) {

		$url = get_the_permalink();

		$qr_code = '<p><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $url . '"/></p>';

		$content .= $qr_code;

		return $content;
	}

	public function wp_footer() {

		$url = home_url();

		$qr_code = '<p><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . $url . '"/></p>';

		echo $qr_code;
	}
}

First_Plugin::get_instance();