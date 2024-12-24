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

	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function init() {
		$this->load_classes();
	}

	public function define_constants() {
		define( 'CM_QUERY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
	}

	public function load_classes() {
		require_once CM_QUERY_PLUGIN_PATH . 'includes/Admin_Menu.php';
		require_once CM_QUERY_PLUGIN_PATH . 'includes/Custom_Columns.php';

		new Admin_Menu();
		new Custom_Columns();
	}
}



CM_QUERY_POST::get_instance();
