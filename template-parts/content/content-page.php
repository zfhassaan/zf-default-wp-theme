<?php
/**
 * Page content.
 *
 * @package ZF_Default
 */
?>
<article <?php post_class( 'zf-entry' ); ?>>
	<header class="zf-entry__header">
		<?php the_title( '<h1 class="zf-entry__title">', '</h1>' ); ?>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="zf-entry__media">
			<?php the_post_thumbnail( 'zf-hero' ); ?>
		</figure>
	<?php endif; ?>

	<div class="zf-entry__content">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<nav class="zf-page-links">' . esc_html__( 'Pages:', 'zfhassaan' ),
				'after'  => '</nav>',
			)
		);
		?>
	</div>
</article>
