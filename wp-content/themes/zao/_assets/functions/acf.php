<?php

/**
 * On post save, map values from 'extended_definition'
 * to WordPress's native content field
 */


add_filter( 'block_categories_all', 'zaobank_add_block_categories', 10, 2 );

function zaobank_add_block_categories( $categories ) {
	$custom_categories = array(
		array(
			'slug'     => 'zaobank',
			'title'    => __( 'ZAO bank blocks', 'zaobank' ),
			'icon'     => null,
			'position' => 1,
		)
	);

	$added_categories = array();

	// Prepare an associative array with positions as keys.
	foreach ( $custom_categories as $custom_category ) {
		$position = $custom_category['position'];
		unset( $custom_category['position'] );
		$added_categories[ $position ] = $custom_category;
	}

	// Sort the categories to insert by their positions/key.
	ksort( $added_categories );

	// Insert the sorted categories into the existing categories array.
	foreach ( $added_categories as $position => $custom_category ) {
		array_splice( $categories, $position, 0, array( $custom_category ) );
	}

	return $categories;
}

add_action('acf/init', 'zaobank_initialize_acf_blocks');

function zaobank_initialize_acf_blocks() {
  // Check function exists.

  if( function_exists('acf_register_block_type') ) {

  }
}