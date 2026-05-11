<?php
/**
 * Plugin Name:       Moare RG
 * Plugin URI:        https://github.com/antoniofelices/moare-rg
 * Description:       Research-group content structure: custom post types (Project, Publication, Researcher), a Year taxonomy, ACF Pro field groups, FSE block templates, and a Publications by Year dynamic block.
 * Version:           1.0.0
 * Requires at least: 6.7
 * Requires PHP:      8.2
 * Author:            Antonio Felices
 * Author URI:        https://studiomoare.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       moare-rg
 * Domain Path:       /languages
 *
 * @package moare/moare-rg
 *
 * Copyright (C) 2026 Studio Moare
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Constants.
if ( ! defined( 'MOARE_RG_VERSION' ) ) {
	define( 'MOARE_RG_VERSION', '1.0.0' );
}
if ( ! defined( 'MOARE_RG_FILE' ) ) {
	define( 'MOARE_RG_FILE', __FILE__ );
}
if ( ! defined( 'MOARE_RG_PATH' ) ) {
	define( 'MOARE_RG_PATH', plugin_dir_path( MOARE_RG_FILE ) );
}
if ( ! defined( 'MOARE_RG_URL' ) ) {
	define( 'MOARE_RG_URL', plugin_dir_url( MOARE_RG_FILE ) );
}
if ( ! defined( 'MOARE_RG_BASENAME' ) ) {
	define( 'MOARE_RG_BASENAME', plugin_basename( MOARE_RG_FILE ) );
}

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 * @return void
 */
function moare_rg_load_textdomain() {
	load_plugin_textdomain( 'moare-rg', false, dirname( MOARE_RG_BASENAME ) . '/languages/' );
}
add_action( 'init', 'moare_rg_load_textdomain', 1 );

// Includes — alphabetical order.
require_once MOARE_RG_PATH . 'admin/notices.php';
require_once MOARE_RG_PATH . 'includes/register-acf-fields.php';
require_once MOARE_RG_PATH . 'includes/register-blocks.php';
require_once MOARE_RG_PATH . 'includes/register-cpts.php';
require_once MOARE_RG_PATH . 'includes/register-taxs.php';
require_once MOARE_RG_PATH . 'includes/register-templates.php';

/**
 * Plugin activation callback.
 *
 * Registers CPTs and taxonomy before flushing rewrite rules so that
 * permalink slugs are immediately available on first activation.
 *
 * @since 1.0.0
 * @return void
 */
function moare_rg_activate() {
	\Moare_Rg\Register_Cpts\register_cpts();
	\Moare_Rg\Register_Taxs\register_taxs();
	flush_rewrite_rules();
}
register_activation_hook( MOARE_RG_FILE, 'moare_rg_activate' );
