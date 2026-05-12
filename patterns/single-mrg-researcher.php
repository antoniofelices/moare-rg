<?php
/**
 * Title: Single Researcher
 * Slug: moare-rg/single-mrg-researcher
 * Categories: moare-rg
 * Description: Default layout when creating a new Researcher post.
 * Inserter: yes
 *
 * @package moare/moare-rg
 */

?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:heading {"level":2} -->
	<h2 class="wp-block-heading"><?php echo esc_html__( 'Researcher profile', 'moare-rg' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"placeholder":"<?php echo esc_attr__( 'Short bio of the researcher…', 'moare-rg' ); ?>"} -->
	<p></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2} -->
	<h2 class="wp-block-heading"><?php echo esc_html__( 'Details', 'moare-rg' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:list -->
	<ul class="wp-block-list">
		<!-- wp:list-item {"placeholder":"<?php echo esc_attr__( 'Email, Phone, Website, Address…', 'moare-rg' ); ?>"} -->
		<li></li>
		<!-- /wp:list-item -->
	</ul>
	<!-- /wp:list -->
	 
	<!-- wp:heading {"level":2} -->
	<h2 class="wp-block-heading"><?php echo esc_html__( 'Publications', 'moare-rg' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:list -->
	<ul class="wp-block-list">
		<!-- wp:list-item {"placeholder":"<?php echo esc_attr__( 'Publication 1', 'moare-rg' ); ?>"} -->
		<li></li>
		<!-- /wp:list-item -->
	</ul>
	<!-- /wp:list -->
</div>
<!-- /wp:group -->
