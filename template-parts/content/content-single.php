<?php
/**
 * Single post content.
 *
 * @package ZF_Default
 */
?>
<article <?php post_class( 'zf-entry' ); ?>>
	<header class="zf-entry__header">
		<?php the_title( '<h1 class="zf-entry__title">', '</h1>' ); ?>
		<p class="zf-meta">
			<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			<span class="zf-meta__sep" aria-hidden="true">·</span>
			<span class="zf-meta__author"><?php the_author(); ?></span>
		</p>
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

	<footer class="zf-entry__footer">
		<?php
		$categories = get_the_category_list( ', ' );
		$tags       = get_the_tag_list( '', ', ' );
		if ( $categories ) {
			printf( '<p class="zf-meta">%s %s</p>', esc_html__( 'Categories:', 'zfhassaan' ), wp_kses_post( $categories ) );
		}
		if ( $tags ) {
			printf( '<p class="zf-meta">%s %s</p>', esc_html__( 'Tags:', 'zfhassaan' ), wp_kses_post( $tags ) );
		}
		?>
	</footer>
</article>
