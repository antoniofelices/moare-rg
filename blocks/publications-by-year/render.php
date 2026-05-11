<?php
/**
 * Server-side render for the Publications by Year block.
 *
 * Retrieves all mrg_year taxonomy terms in descending order, then for each
 * term queries all mrg_publication posts assigned to it and renders a
 * collapsible <details> section with a list of publications.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 *
 * @package moare/moare-rg
 *
 * @var array    $attributes Block attributes (unused — no editable attributes yet).
 * @var string   $content    Inner block content (unused — server-rendered).
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Query and render all publications grouped by year term.
 *
 * @since 1.0.0
 * @return void
 */
function moare_rg_publications_by_year_render() {
	$terms = get_terms(
		array(
			'taxonomy' => 'mrg_year',
			'orderby'  => 'name',
			'order'    => 'DESC',
		)
	);

	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		?>
		<p><?php esc_html_e( 'No publications found.', 'moare-rg' ); ?></p>
		<?php
		return;
	}

	foreach ( $terms as $term ) {

		// TODO: paginate this query if the publication list per year grows large.
		$query_by_year = new WP_Query(
			array(
				'post_type'      => 'mrg_publication',
				'posts_per_page' => -1,
				'orderby'        => array( 'meta_value' => 'ASC' ),
				'meta_key'       => 'mrg_authors', // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
				'tax_query'      => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
					array(
						'taxonomy' => 'mrg_year',
						'field'    => 'term_id',
						'terms'    => array( $term->term_id ),
						'operator' => 'IN',
					),
				),
				'no_found_rows'  => true,
			)
		);

		if ( $query_by_year->have_posts() ) :
			?>

			<details class="mg-details">
				<summary><?php echo esc_html( $term->name ); ?></summary>
				<ul class="container">
					<?php
					while ( $query_by_year->have_posts() ) :
						$query_by_year->the_post();

						$type         = get_field( 'mrg_type' );
						$class_pub_on = ( 'book_chapter' === $type ) ? 'chapter-book' : '';
						?>

						<li>
							<span class="authors-publication"><?php echo esc_html( get_field( 'mrg_authors' ) ); ?></span>
							<span class="year-publication">(<?php echo esc_html( get_field( 'mrg_year' ) ); ?>)</span>
							<span class="title-publication"><?php echo esc_html( get_the_title() ); ?>.</span>
							<span class="publishin-on <?php echo esc_attr( $class_pub_on ); ?>"><?php echo esc_html( get_field( 'mrg_publishing_on' ) ); ?></span>
							<span class="type"><?php echo esc_html( $type ); ?>.</span>
							<?php if ( get_field( 'mrg_external_link' ) ) : ?>
								<span class="external-link-publication">
									<a href="<?php echo esc_url( get_field( 'mrg_external_link' ) ); ?>"><?php esc_html_e( 'External link', 'moare-rg' ); ?></a>.
								</span>
							<?php endif; ?>
						</li>

						<?php
					endwhile;
					?>
				</ul>
			</details>

			<?php
		endif;

		$query_by_year = null;
		wp_reset_postdata();
	}
}

?>

<div <?php echo get_block_wrapper_attributes( array( 'class' => 'moare-rg-publications-by-year' ) ); ?>>

	<?php moare_rg_publications_by_year_render(); ?>

</div>
