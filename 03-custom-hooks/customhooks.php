<?php
/**
 * Plugin Name: Custom Hooks
 * Description: Our second plugin
 * Author: Helal
 * Version: 1.0
 * License: GPLv2
 */




// filter
add_filter( 'cmh_before_qr', function () {
	return '<p>Before QR Code</p>';
} );

add_filter( 'cmh_post_qr', function () {
	return true;
} );

add_filter( 'cmh_qr_classes', function ($classes) {
	$classes[] = 'my-new-class';
	return $classes;
} );
add_filter( 'cmh_qr_classes', function ($classes) {
	$classes[] = 'custom-class';
	return $classes;
} );

// action
add_action( 'cmh_before_footer_qr', function ($args) {
	echo "Before Footer QR Code " . implode( ' ', $args );
} );

add_action( 'cmh_after_footer_qr', function () {
	echo "After Footer QR Code";
} );
