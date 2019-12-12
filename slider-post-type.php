<?php 

function slider_post_types( $post_types ) {

	$post_types['smallis-slider'] = array(
		'labels' => piklist( 'post_type_labels', 'Slide' ),
		'title' => __( 'Add Slide'),
		'menu_icon' => 'dashicons-slides',
		'page_icon' => 'dashicons-slides',
 		'supports' => array(
			'title',
			'editor',
			'thumbnail'
		),
		'public' => true,
		'admin_body_class' => array(
			'smallis-slider'
		),
		'has_archive' => true,
		'rewrite' => array(
			'slug' => 'smalllis-slider'
		),
		'capability_type' => 'post',
		'edit_columns' => array(
			'title' => __( 'Slide' ),
		),
	);
	return $post_types;
}
add_filter( 'piklist_post_types', 'slider_post_types' );