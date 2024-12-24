<?php
/**
 * Plugin Name: 05 Custom Columns
 */
use CM_Custom_Column\Manage_Columns;

class CM_Custom_Columns {
	private static $instance = null;

	private function __construct() {
		$this->define_constants();
		$this->load_classes();
	}

	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function define_constants() {
		define( 'CUSTOM_COLUMNS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
	}

	public function load_classes() {
		require_once CUSTOM_COLUMNS_PLUGIN_PATH . 'includes/Manage_Columns.php';
		new Manage_Columns();
	}
}


CM_Custom_Columns::get_instance();