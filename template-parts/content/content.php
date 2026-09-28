<?php
/**
 * Default content loop item.
 *
 * @package ZF_Default
 */
?>
<article <?php post_class( 'zf-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="zf-card__media" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'zf-card' ); ?>
		</a>
	<?php endif; ?>

	<header class="zf-card__header">
		<?php the_title( sprintf( '<h2 class="zf-card__title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<p class="zf-meta">
			<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
		</p>
	</header>

	<div class="zf-card__excerpt">
		<?php the_excerpt(); ?>
	</div>
</article>
