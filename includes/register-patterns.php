<?php
/**
 * Register block patterns and pattern category.
 *
 * Auto-discovers pattern files in /patterns/, reads their file headers via
 * get_file_data(), captures rendered markup with output buffering, and
 * registers each pattern with register_block_pattern().
 *
 * @package moare/moare-rg
 */

namespace Moare_Rg\Register_Patterns;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the moare-rg pattern category.
 *
 * @since 1.0.0
 * @return void
 */
function register_category() {
	register_block_pattern_category(
		'moare-rg',
		array( 'label' => __( 'Moare RG', 'moare-rg' ) )
	);
}
add_action( 'init', __NAMESPACE__ . '\register_category', 10 );

/**
 * Register all block patterns from the /patterns/ directory.
 *
 * Reads each .php file's header, captures its rendered output, and registers
 * it as a block pattern. Files without a Slug header are skipped.
 *
 * @since 1.0.0
 * @return void
 */
function register_patterns() {
	$pattern_dir = MOARE_RG_PATH . 'patterns/';
	$files       = glob( $pattern_dir . '*.php' );

	if ( empty( $files ) ) {
		return;
	}

	$headers = array(
		'title'         => 'Title',
		'slug'          => 'Slug',
		'description'   => 'Description',
		'categories'    => 'Categories',
		'keywords'      => 'Keywords',
		'viewportWidth' => 'Viewport Width',
		'blockTypes'    => 'Block Types',
		'postTypes'     => 'Post Types',
		'templateTypes' => 'Template Types',
		'inserter'      => 'Inserter',
	);

	foreach ( $files as $file ) {
		$real_file = realpath( $file );
		$real_dir  = realpath( $pattern_dir );

		if ( false === $real_file || false === $real_dir ) {
			continue;
		}

		if ( ! str_starts_with( $real_file, $real_dir . DIRECTORY_SEPARATOR ) ) {
			continue;
		}

		$data = get_file_data( $file, $headers );

		if ( empty( $data['slug'] ) || empty( $data['title'] ) ) {
			continue;
		}

		ob_start();
		include $file; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable -- Path validated against MOARE_RG_PATH via realpath() above.
		$content = ob_get_clean();

		$args = array(
			'title'       => sanitize_text_field( $data['title'] ),
			'description' => sanitize_text_field( $data['description'] ),
			'content'     => $content,
			'source'      => 'plugin',
		);

		if ( ! empty( $data['inserter'] ) ) {
			$args['inserter'] = ! in_array(
				strtolower( $data['inserter'] ),
				array( 'no', 'false', '0' ),
				true
			);
		}

		if ( ! empty( $data['viewportWidth'] ) ) {
			$args['viewportWidth'] = (int) $data['viewportWidth'];
		}

		foreach ( array( 'categories', 'keywords', 'blockTypes', 'postTypes', 'templateTypes' ) as $key ) {
			if ( ! empty( $data[ $key ] ) ) {
				$values = array_filter( array_map( 'trim', explode( ',', $data[ $key ] ) ) );
				if ( ! empty( $values ) ) {
					$args[ $key ] = array_values( $values );
				}
			}
		}

		register_block_pattern( $data['slug'], $args );
	}
}
add_action( 'init', __NAMESPACE__ . '\register_patterns', 10 );
