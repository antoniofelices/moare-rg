<?php
/**
 * Register ACF Pro field groups.
 *
 * Orchestrates the ACF Pro integration: checks availability, loads the
 * per-CPT field-group files, and hooks them to `acf/init`.
 * If ACF Pro is not active the field groups are silently skipped
 * (the admin notice in admin/notices.php handles user communication).
 *
 * @package moare/moare-rg
 */

namespace Moare_Rg\Register_Acf_Fields;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once MOARE_RG_PATH . 'includes/acf-fields/project.php';
require_once MOARE_RG_PATH . 'includes/acf-fields/publication.php';
require_once MOARE_RG_PATH . 'includes/acf-fields/researcher.php';

/**
 * Register all ACF field groups when ACF Pro is active.
 *
 * Skips silently if `acf_add_local_field_group` is not available so the
 * plugin remains safe on sites where ACF Pro is not yet activated.
 *
 * @since 1.0.0
 * @return void
 */
function register_field_groups() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	\Moare_Rg\Acf_Fields\Project\register_field_group();
	\Moare_Rg\Acf_Fields\Publication\register_field_group();
	\Moare_Rg\Acf_Fields\Researcher\register_field_group();
}
add_action( 'acf/init', __NAMESPACE__ . '\register_field_groups', 10 );
