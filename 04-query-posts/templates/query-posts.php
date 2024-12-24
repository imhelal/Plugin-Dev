<div class="wrap">
	<h1 class="wp-heading-inline">Query Posts</h1>
	<div class="tablenav top">
		<div class="alignleft actions">
			<form action="">
				<input type="hidden" name="page" value="cm_query_posts">
				<select name="cat_id" id="cat_id" class="postform">
					<option value="0">All Categories</option>
					<?php
					foreach ( $categories as $category ) : ?>

						<option value="<?php echo $category->term_id ?>" <?php echo $category->term_id == $cat_id ? 'selected' : ''; ?>>
							<?php echo ucfirst( $category->name ) ?>
						</option>

					<?php endforeach; ?>
				</select>

				<input type="submit" class="button" value="Filter">
			</form>
		</div>
	</div>
	<table class="wp-list-table widefat fixed striped table-view-list posts">
		<!-- table heading -->
		<thead>
			<tr>
				<th class="manage-column">Title</th>
				<th class="manage-column">Author</th>
				<th class="manage-column">Categories</th>
				<th class="manage-column">Date</th>
			</tr>
		</thead>
		<!-- table data -->
		<tbody>
			<?php
			foreach ( $posts as $post ) :
				?>
				<tr>
					<td><?php echo $post->post_title ?></td>
					<td>
						<?php
						$author = get_user( $post->post_author );
						echo $author->display_name;
						?>
					</td>
					<td>
						<?php
						$terms = wp_get_post_terms( $post->ID, 'category' );
						$term_names = array_map( function ($item) {
							return $item->name;
						}, $terms );
						echo implode( ', ', $term_names );
						?>
					</td>
					<td><?php echo wp_date( 'j F, Y', strtotime( datetime: $post->post_date ) ) ?> </td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</div>