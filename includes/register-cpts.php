<?php
/**
 * Register Custom Post Types.
 *
 * Registers the three CPTs required by the research-group plugin:
 * project, publication, and researcher.
 *
 * @package moare/moare-rg
 */

namespace Moare_Rg\Register_Cpts;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register all research-group custom post types.
 *
 * Called both on the `init` hook (normal page loads) and directly from the
 * activation callback so that rewrite rules are flushed against registered slugs.
 *
 * @since 1.0.0
 * @return void
 */
function register_cpts() {
	register_project_cpt();
	register_publication_cpt();
	register_researcher_cpt();
}
add_action( 'init', __NAMESPACE__ . '\register_cpts', 10 );

/**
 * Register the Project custom post type.
 *
 * @since 1.0.0
 * @return void
 */
function register_project_cpt() {
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name', 'moare-rg' ),
		'singular_name'      => _x( 'Project', 'post type singular name', 'moare-rg' ),
		'menu_name'          => _x( 'Projects', 'admin menu', 'moare-rg' ),
		'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'moare-rg' ),
		'add_new'            => _x( 'Add New', 'project', 'moare-rg' ),
		'add_new_item'       => __( 'Add New Project', 'moare-rg' ),
		'new_item'           => __( 'New Project', 'moare-rg' ),
		'edit_item'          => __( 'Edit Project', 'moare-rg' ),
		'view_item'          => __( 'View Project', 'moare-rg' ),
		'all_items'          => __( 'All Projects', 'moare-rg' ),
		'search_items'       => __( 'Search Projects', 'moare-rg' ),
		'not_found'          => __( 'No projects found.', 'moare-rg' ),
		'not_found_in_trash' => __( 'No projects found in Trash.', 'moare-rg' ),
	);

	$rewrite = array(
		'slug'       => _x( 'project', 'slug', 'moare-rg' ),
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);

	$args = array(
		'labels'          => $labels,
		'description'     => __( 'Research projects', 'moare-rg' ),
		'public'          => true,
		'menu_position'   => 20,
		'menu_icon'       => 'dashicons-portfolio',
		'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
		'has_archive'     => true,
		'rewrite'         => $rewrite,
		'capability_type' => 'post',
		'show_in_rest'    => true,
		'template'        => array(
			array( 'core/pattern', array( 'slug' => 'moare-rg/single-mrg-project' ) ),
		),
	);

	register_post_type( 'mrg_project', $args );
}

/**
 * Register the Publication custom post type.
 *
 * @since 1.0.0
 * @return void
 */
function register_publication_cpt() {
	$labels = array(
		'name'               => _x( 'Publications', 'post type general name', 'moare-rg' ),
		'singular_name'      => _x( 'Publication', 'post type singular name', 'moare-rg' ),
		'menu_name'          => _x( 'Publications', 'admin menu', 'moare-rg' ),
		'name_admin_bar'     => _x( 'Publication', 'add new on admin bar', 'moare-rg' ),
		'add_new'            => _x( 'Add New', 'publication', 'moare-rg' ),
		'add_new_item'       => __( 'Add New Publication', 'moare-rg' ),
		'new_item'           => __( 'New Publication', 'moare-rg' ),
		'edit_item'          => __( 'Edit Publication', 'moare-rg' ),
		'view_item'          => __( 'View Publication', 'moare-rg' ),
		'all_items'          => __( 'All Publications', 'moare-rg' ),
		'search_items'       => __( 'Search Publications', 'moare-rg' ),
		'not_found'          => __( 'No publications found.', 'moare-rg' ),
		'not_found_in_trash' => __( 'No publications found in Trash.', 'moare-rg' ),
	);

	$rewrite = array(
		'slug'       => _x( 'publication', 'slug', 'moare-rg' ),
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);

	$args = array(
		'labels'          => $labels,
		'description'     => __( 'Research publications', 'moare-rg' ),
		'public'          => true,
		'menu_position'   => 21,
		'menu_icon'       => 'dashicons-book-alt',
		'supports'        => array( 'title', 'revisions' ),
		'has_archive'     => true,
		'rewrite'         => $rewrite,
		'capability_type' => 'post',
		'show_in_rest'    => true,
		'taxonomies'      => array( 'mrg_year' ),
	);

	register_post_type( 'mrg_publication', $args );
}

/**
 * Register the Researcher custom post type.
 *
 * @since 1.0.0
 * @return void
 */
function register_researcher_cpt() {
	$labels = array(
		'name'               => _x( 'Researchers', 'post type general name', 'moare-rg' ),
		'singular_name'      => _x( 'Researcher', 'post type singular name', 'moare-rg' ),
		'menu_name'          => _x( 'Researchers', 'admin menu', 'moare-rg' ),
		'name_admin_bar'     => _x( 'Researcher', 'add new on admin bar', 'moare-rg' ),
		'add_new'            => _x( 'Add New', 'researcher', 'moare-rg' ),
		'add_new_item'       => __( 'Add New Researcher', 'moare-rg' ),
		'new_item'           => __( 'New Researcher', 'moare-rg' ),
		'edit_item'          => __( 'Edit Researcher', 'moare-rg' ),
		'view_item'          => __( 'View Researcher', 'moare-rg' ),
		'all_items'          => __( 'All Researchers', 'moare-rg' ),
		'search_items'       => __( 'Search Researchers', 'moare-rg' ),
		'not_found'          => __( 'No researchers found.', 'moare-rg' ),
		'not_found_in_trash' => __( 'No researchers found in Trash.', 'moare-rg' ),
	);

	$rewrite = array(
		'slug'       => _x( 'researcher', 'slug', 'moare-rg' ),
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);

	$args = array(
		'labels'          => $labels,
		'description'     => __( 'Research group members', 'moare-rg' ),
		'public'          => true,
		'menu_position'   => 22,
		'menu_icon'       => 'dashicons-groups',
		'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
		'has_archive'     => true,
		'rewrite'         => $rewrite,
		'capability_type' => 'post',
		'show_in_rest'    => true,
		'template'        => array(
			array( 'core/pattern', array( 'slug' => 'moare-rg/single-mrg-researcher' ) ),
		),
	);

	register_post_type( 'mrg_researcher', $args );
}
