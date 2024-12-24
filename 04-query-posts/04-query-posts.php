<?php
/**
 * Plugin Name: 04 Post Query
 */


class CM_QUERY_POST {
	private static $instance = null;

	private function __construct() {
		$this->define_constants();
		$this->load_classes();
	}

	public function define_constants() {
		define( 'CM_QUERY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
	}

	public function load_classes() {

	}
}