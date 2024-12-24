<?php
namespace CM_Custom_Column;
class Manage_Columns {
	function __construct() {

		add_filter( 'manage_post_posts_columns', array( $this, 'manage_post_posts_columns' ) );
		add_action( 'manage_post_posts_custom_column', array( $this, 'manage_post_custom_column' ), 10, 2 );

		add_filter( 'manage_edit-post_sortable_columns', array( $this, 'manage_edit_sortable_columns' ) );

	}

	public function manage_post_posts_columns( $columns ) {
		$new_columns = array();


		foreach ( $columns as $key => $value ) {

			if ( 'title' == $key ) {
				$new_columns['id'] = 'ID';
			}

			$new_columns[ $key ] = $value;

			if ( 'title' == $key ) {
				$new_columns['thumbnail'] = 'Thumbnail';
			}

		}

		return $new_columns;
	}

	public function manage_post_custom_column( $column, $post_id ) {

		if ( 'id' == $column ) {
			echo $post_id;
		}

		if ( 'thumbnail' == $column ) {
			$url = get_the_post_thumbnail_url( $post_id, 'thumbnail' );
			echo "<img src='{$url}' width='50px'/>";
		}

	}

	public function manage_edit_sortable_columns( $columns ) {

		$columns['id'] = 'ID';

		return $columns;

	}
}