<?php
/**
 * Site footer.
 *
 * @package ZF_Default
 */
?>
<footer class="zf-footer">
	<div class="zf-container zf-footer__inner">
		<div class="zf-footer__brand">
			<p class="zf-footer__name"><?php bloginfo( 'name' ); ?></p>
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description ) :
				?>
				<p class="zf-footer__tagline"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="zf-footer__nav" aria-label="<?php esc_attr_e( 'Footer', 'zfhassaan' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'zf-footer__list',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="zf-footer__widgets">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="zf-footer__bar">
		<div class="zf-container">
			<p>
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
				<?php bloginfo( 'name' ); ?>.
				<?php esc_html_e( 'All rights reserved.', 'zfhassaan' ); ?>
			</p>
		</div>
	</div>
</footer>
