<?php
/**
 * Site header.
 *
 * @package ZF_Default
 */
?>
<header class="zf-header" data-zf-header>
	<div class="zf-header__inner zf-container">
		<div class="zf-header__brand">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="zf-logo-text" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php bloginfo( 'name' ); ?>
				</a>
			<?php endif; ?>
		</div>

		<nav class="zf-nav" aria-label="<?php esc_attr_e( 'Primary', 'zfhassaan' ); ?>" data-zf-nav>
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'zf-nav__list',
						'depth'          => 2,
						'fallback_cb'    => false,
					)
				);
			} else {
				?>
				<ul class="zf-nav__list">
					<li class="current-menu-item">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'zfhassaan' ); ?></a>
					</li>
				</ul>
				<?php
			}
			?>
		</nav>

		<button type="button" class="zf-menu-toggle" data-zf-menu-toggle aria-expanded="false" aria-controls="zf-mobile-nav">
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'zfhassaan' ); ?></span>
			<span data-zf-menu-icon-open><?php echo zf_icon( 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
			<span data-zf-menu-icon-close hidden><?php echo zf_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		</button>
	</div>

	<div id="zf-mobile-nav" class="zf-mobile-nav" data-zf-mobile-nav hidden>
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'zf-nav__list zf-nav__list--mobile',
					'depth'          => 2,
					'fallback_cb'    => false,
				)
			);
		}
		?>
	</div>
</header>
