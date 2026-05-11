<?php
/**
 * Register Custom Taxonomies.
 *
 * Registers the Year hierarchical taxonomy attached to the publication CPT.
 *
 * @package moare/moare-rg
 */

namespace Moare_Rg\Register_Taxs;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register all research-group custom taxonomies.
 *
 * Called both on the `init` hook and directly from the activation callback.
 *
 * @since 1.0.0
 * @return void
 */
function register_taxs() {
	register_year_tax();
}
add_action( 'init', __NAMESPACE__ . '\register_taxs', 10 );

/**
 * Register the Year taxonomy.
 *
 * Hierarchical taxonomy attached to `publication`, used to group publications
 * by publication year. Exposed in the REST API for the block editor.
 *
 * @since 1.0.0
 * @return void
 */
function register_year_tax() {
	$labels = array(
		'name'                       => _x( 'Years', 'taxonomy general name', 'moare-rg' ),
		'singular_name'              => _x( 'Year', 'taxonomy singular name', 'moare-rg' ),
		'search_items'               => __( 'Search Years', 'moare-rg' ),
		'all_items'                  => __( 'All Years', 'moare-rg' ),
		'parent_item'                => __( 'Parent Year', 'moare-rg' ),
		'parent_item_colon'          => __( 'Parent Year:', 'moare-rg' ),
		'edit_item'                  => __( 'Edit Year', 'moare-rg' ),
		'update_item'                => __( 'Update Year', 'moare-rg' ),
		'add_new_item'               => __( 'Add New Year', 'moare-rg' ),
		'new_item_name'              => __( 'New Year Name', 'moare-rg' ),
		'menu_name'                  => _x( 'Years', 'admin menu', 'moare-rg' ),
		'not_found'                  => __( 'No years found.', 'moare-rg' ),
		'items_list'                 => __( 'Years list', 'moare-rg' ),
		'items_list_navigation'      => __( 'Years list navigation', 'moare-rg' ),
		'back_to_items'              => __( '&larr; Go to Years', 'moare-rg' ),
	);

	$rewrite = array(
		'slug'         => _x( 'year', 'slug', 'moare-rg' ),
		'with_front'   => true,
		'hierarchical' => true,
	);

	$args = array(
		'labels'            => $labels,
		'description'       => __( 'Publication year', 'moare-rg' ),
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'rewrite'           => $rewrite,
	);

	register_taxonomy( 'mrg_year', array( 'mrg_publication' ), $args );
}
