<?php
/**
 * Register FSE block templates.
 *
 * Registers archive and single block templates for the three research-group
 * CPTs using the WordPress 6.7+ register_block_template() API.
 * Template HTML is loaded from .html files in /templates/.
 *
 * @package moare/moare-rg
 */

namespace Moare_Rg\Register_Templates;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register all plugin block templates.
 *
 * Each template is wired to the correct post type(s) and loaded from a
 * standalone .html file so editors can inspect and version the markup
 * independently from the PHP code.
 *
 * @since 1.0.0
 * @return void
 */
function register_templates() {
	$templates = array(
		array(
			'slug'        => 'moare-rg//archive-mrg_project',
			'file'        => 'archive-mrg_project.html',
			'title'       => __( 'Project Archive', 'moare-rg' ),
			'description' => __( 'Archive template for projects.', 'moare-rg' ),
			'post_types'  => array( 'mrg_project' ),
		),
		array(
			'slug'        => 'moare-rg//single-mrg_project',
			'file'        => 'single-mrg_project.html',
			'title'       => __( 'Single Project', 'moare-rg' ),
			'description' => __( 'Single post template for a project.', 'moare-rg' ),
			'post_types'  => array( 'mrg_project' ),
		),
		array(
			'slug'        => 'moare-rg//archive-mrg_researcher',
			'file'        => 'archive-mrg_researcher.html',
			'title'       => __( 'Researcher Archive', 'moare-rg' ),
			'description' => __( 'Archive template for researchers.', 'moare-rg' ),
			'post_types'  => array( 'mrg_researcher' ),
		),
		array(
			'slug'        => 'moare-rg//single-mrg_researcher',
			'file'        => 'single-mrg_researcher.html',
			'title'       => __( 'Single Researcher', 'moare-rg' ),
			'description' => __( 'Single post template for a researcher.', 'moare-rg' ),
			'post_types'  => array( 'mrg_researcher' ),
		),
		array(
			'slug'        => 'moare-rg//archive-mrg_publication',
			'file'        => 'archive-mrg_publication.html',
			'title'       => __( 'Publication Archive', 'moare-rg' ),
			'description' => __( 'Archive template for publications, grouped by year.', 'moare-rg' ),
			'post_types'  => array( 'mrg_publication' ),
		),
		array(
			'slug'        => 'moare-rg//single-mrg_publication',
			'file'        => 'single-mrg_publication.html',
			'title'       => __( 'Single Publication', 'moare-rg' ),
			'description' => __( 'Single post template for a publication.', 'moare-rg' ),
			'post_types'  => array( 'mrg_publication' ),
		),
	);

	foreach ( $templates as $template ) {
		$html_file = MOARE_RG_PATH . 'templates/' . $template['file'];
		$content   = file_exists( $html_file ) ? file_get_contents( $html_file ) : ''; // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

		register_block_template(
			$template['slug'],
			array(
				'title'       => $template['title'],
				'description' => $template['description'],
				'content'     => $content,
				'post_types'  => $template['post_types'],
			)
		);
	}
}
add_action( 'init', __NAMESPACE__ . '\register_templates', 10 );
