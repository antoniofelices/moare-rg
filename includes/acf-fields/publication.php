<?php
/**
 * ACF Pro field group: Publication.
 *
 * Defines the custom fields for the Publication CPT.
 *
 * @package moare/moare-rg
 */

namespace Moare_Rg\Acf_Fields\Publication;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the Publication ACF field group.
 *
 * Hooked to `acf/init` via the orchestrator in register-acf-fields.php.
 *
 * @since 1.0.0
 * @return void
 */
function register_field_group() {

	acf_add_local_field_group(
		array(
			'key'      => 'group_moare_rg_publication',
			'title'    => __( 'Publication Fields', 'moare-rg' ),
			'fields'   => array(
				array(
					'key'               => 'field_mrg_publication_authors',
					'label'             => __( 'Authors', 'moare-rg' ),
					'name'              => 'mrg_authors',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 1,
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
					'key'               => 'field_mrg_publication_year',
					'label'             => __( 'Year', 'moare-rg' ),
					'name'              => 'mrg_year',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 1,
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
					'key'               => 'field_mrg_publication_publishing_on',
					'label'             => __( 'Publishing on', 'moare-rg' ),
					'name'              => 'mrg_publishing_on',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 1,
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
					'key'               => 'field_mrg_publication_type',
					'label'             => __( 'Type', 'moare-rg' ),
					'name'              => 'mrg_type',
					'aria-label'        => '',
					'type'              => 'select',
					'instructions'      => '',
					'required'          => 1,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(
						'article'      => __( 'Article', 'moare-rg' ),
						'book'         => __( 'Book', 'moare-rg' ),
						'book_chapter' => __( 'Book chapter', 'moare-rg' ),
					),
					'default_value'     => '',
					'allow_null'        => 0,
					'multiple'          => 0,
					'ui'                => 0,
					'ajax'              => 0,
					'return_format'     => 'value',
					'placeholder'       => '',
				),
				array(
					'key'               => 'field_mrg_publication_external_link',
					'label'             => __( 'External link', 'moare-rg' ),
					'name'              => 'mrg_external_link',
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
						'value'    => 'mrg_publication',
					),
				),
			),
		)
	);
}
