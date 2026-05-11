<?php
/**
 * Register dynamic blocks.
 *
 * Registers the moare-rg/publications-by-year server-rendered block using
 * the block.json manifest located in /blocks/publications-by-year/.
 *
 * @package moare/moare-rg
 */

namespace Moare_Rg\Register_Blocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register all plugin blocks.
 *
 * Each block is registered by pointing register_block_type() at its
 * directory; WordPress reads block.json automatically.
 *
 * @since 1.0.0
 * @return void
 */
function register_blocks() {
	register_block_type( MOARE_RG_PATH . 'blocks/publications-by-year' );
}
add_action( 'init', __NAMESPACE__ . '\register_blocks', 10 );
