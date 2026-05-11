<?php
/**
 * ACF Pro field group: Project.
 *
 * Defines the custom fields for the Project CPT.
 *
 * @package moare/moare-rg
 */

namespace Moare_Rg\Acf_Fields\Project;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the Project ACF field group.
 *
 * Hooked to `acf/init` via the orchestrator in register-acf-fields.php.
 *
 * @since 1.0.0
 * @return void
 */
function register_field_group() {

	acf_add_local_field_group(
		array(
			'key'      => 'group_moare_rg_project',
			'title'    => __( 'Project Fields', 'moare-rg' ),
			'fields'   => array(
				array(
					'key'               => 'field_mrg_project_logotype',
					'label'             => __( 'Logotype', 'moare-rg' ),
					'name'              => 'mrg_logotype',
					'aria-label'        => '',
					'type'              => 'image',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'return_format'     => 'url',
					'preview_size'      => 'thumbnail',
					'library'           => 'all',
					'min_width'         => '',
					'min_height'        => '',
					'min_size'          => '',
					'max_width'         => 300,
					'max_height'        => 300,
					'max_size'          => '',
					'mime_types'        => '',
				),
				array(
					'key'               => 'field_mrg_project_funding_program',
					'label'             => __( 'Funding program', 'moare-rg' ),
					'name'              => 'mrg_funding_program',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_mrg_project_duration',
					'label'             => __( 'Duration', 'moare-rg' ),
					'name'              => 'mrg_duration',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_mrg_project_main_researcher',
					'label'             => __( 'Main researcher', 'moare-rg' ),
					'name'              => 'mrg_main_researcher',
					'aria-label'        => '',
					'type'              => 'textarea',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'maxlength'         => '',
					'allow_in_bindings' => 0,
					'rows'              => '',
					'placeholder'       => '',
					'new_lines'         => '',
				),
				array(
					'key'               => 'field_mrg_project_researchers',
					'label'             => __( 'Researchers', 'moare-rg' ),
					'name'              => 'mrg_researchers',
					'aria-label'        => '',
					'type'              => 'textarea',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'maxlength'         => '',
					'allow_in_bindings' => 0,
					'rows'              => '',
					'placeholder'       => '',
					'new_lines'         => '',
				),
				array(
					'key'               => 'field_mrg_project_partners',
					'label'             => __( 'Partners', 'moare-rg' ),
					'name'              => 'mrg_partners',
					'aria-label'        => '',
					'type'              => 'textarea',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'maxlength'         => '',
					'allow_in_bindings' => 0,
					'rows'              => '',
					'placeholder'       => '',
					'new_lines'         => '',
				),
				array(
					'key'               => 'field_mrg_project_summary',
					'label'             => __( 'Summary', 'moare-rg' ),
					'name'              => 'mrg_summary',
					'aria-label'        => '',
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'tabs'              => 'all',
					'toolbar'           => 'basic',
					'media_upload'      => 0,
					'delay'             => 0,
				),
				array(
					'key'               => 'field_mrg_project_results',
					'label'             => __( 'Results', 'moare-rg' ),
					'name'              => 'mrg_results',
					'aria-label'        => '',
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'tabs'              => 'all',
					'toolbar'           => 'basic',
					'media_upload'      => 0,
					'delay'             => 0,
				),
				array(
					'key'               => 'field_mrg_project_others',
					'label'             => __( 'Others', 'moare-rg' ),
					'name'              => 'mrg_others',
					'aria-label'        => '',
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'tabs'              => 'all',
					'toolbar'           => 'basic',
					'media_upload'      => 0,
					'delay'             => 0,
				),
				array(
					'key'               => 'field_mrg_project_more_link',
					'label'             => __( 'More info link', 'moare-rg' ),
					'name'              => 'mrg_more_link',
					'aria-label'        => '',
					'type'              => 'url',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'mrg_project',
					),
				),
			),
		)
	);
}
