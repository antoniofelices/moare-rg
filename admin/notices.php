<?php
/**
 * Admin Notices.
 *
 * Displays a persistent error notice when ACF Pro is not active,
 * informing the administrator that the plugin depends on it.
 *
 * @package moare/moare-rg
 */

namespace Moare_Rg\Admin\Notices;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Show a dismissible admin notice when ACF Pro is not available.
 *
 * The notice is shown on every admin page load until ACF Pro is activated.
 * The plugin is not deactivated automatically — only fields are skipped.
 *
 * @since 1.0.0
 * @return void
 */
function acf_missing_notice() {
	if ( function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	?>
	<div class="notice notice-error is-dismissible">
		<p>
			<?php
			echo wp_kses_post(
				sprintf(
					/* translators: %s: ACF Pro plugin name. */
					__( '<strong>Moare RG</strong> requires %s to be installed and active. Custom field groups will not be registered until it is activated.', 'moare-rg' ),
					'<strong>Advanced Custom Fields Pro (ACF Pro)</strong>'
				)
			);
			?>
		</p>
	</div>
	<?php
}
add_action( 'admin_notices', __NAMESPACE__ . '\acf_missing_notice' );
