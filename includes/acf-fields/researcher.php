<?php
/**
 * ACF Pro field group: Researcher.
 *
 * Defines the custom fields for the Researcher CPT.
 *
 * @package moare/moare-rg
 */

namespace Moare_Rg\Acf_Fields\Researcher;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the Researcher ACF field group.
 *
 * Hooked to `acf/init` via the orchestrator in register-acf-fields.php.
 *
 * @since 1.0.0
 * @return void
 */
function register_field_group() {

	acf_add_local_field_group(
		array(
			'key'      => 'group_moare_rg_researcher',
			'title'    => __( 'Researcher Fields', 'moare-rg' ),
			'fields'   => array(
				array(
					'key'               => 'field_mrg_researcher_mail',
					'label'             => __( 'Mail', 'moare-rg' ),
					'name'              => 'mrg_mail',
					'aria-label'        => '',
					'type'              => 'email',
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
				),
				array(
					'key'               => 'field_mrg_researcher_department',
					'label'             => __( 'Department', 'moare-rg' ),
					'name'              => 'mrg_department',
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
					'key'               => 'field_mrg_researcher_business_position',
					'label'             => __( 'Business position', 'moare-rg' ),
					'name'              => 'mrg_business_position',
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
					'key'               => 'field_mrg_researcher_address',
					'label'             => __( 'Address', 'moare-rg' ),
					'name'              => 'mrg_address',
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
					'key'               => 'field_mrg_researcher_phone',
					'label'             => __( 'Phone', 'moare-rg' ),
					'name'              => 'mrg_phone',
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
					'key'               => 'field_mrg_researcher_personal_website',
					'label'             => __( 'Personal website', 'moare-rg' ),
					'name'              => 'mrg_personal_website',
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
				array(
					'key'               => 'field_mrg_researcher_academia_link',
					'label'             => __( 'Academia link', 'moare-rg' ),
					'name'              => 'mrg_academia_link',
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
				array(
					'key'               => 'field_mrg_researcher_summary',
					'label'             => __( 'Summary', 'moare-rg' ),
					'name'              => 'mrg_re_summary',
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
					'key'               => 'field_mrg_researcher_visiting_period',
					'label'             => __( 'Visiting period', 'moare-rg' ),
					'name'              => 'mrg_visiting_period',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => __( 'Only if was visiting research', 'moare-rg' ),
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
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'mrg_researcher',
					),
				),
			),
		)
	);
}
