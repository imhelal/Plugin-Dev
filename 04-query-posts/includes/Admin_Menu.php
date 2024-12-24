<?php

class Admin_Menu {
	function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	public function admin_menu() {
		add_menu_page(
			'Query Posts',
			'Query Posts',
			'manage_options',
			'cm_query_posts',
			array( $this, 'display_admin_dashboard' ),
		);
	}


	public function display_admin_dashboard() {

		$cat_id = 0;

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 10
		);

		if ( isset( $_GET['cat_id'] ) ) {
			$cat_id = $_GET['cat_id'];
		}

		if ( ! empty( $cat_id ) ) {
			$args['cat'] = $cat_id;
		}

		$posts = get_posts( $args );

		$categories = get_terms( array(
			'taxonomy' => 'category'
		) );

		include CM_QUERY_PLUGIN_PATH . 'templates/query-posts.php';
	}
}