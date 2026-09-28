<?php
/**
 * Dynamic page-template registry.
 *
 * Add a PHP file under page-templates/ with a Template Name header,
 * then register it here (or via the `zf_page_templates` filter) so the
 * theme can auto-enqueue CSS/JS and apply body classes.
 *
 * @package ZF_Default
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registry of page templates and their front-end assets.
 *
 * Each entry:
 * - file       (string)   Path relative to theme root (required).
 * - label      (string)   Human label (for docs / admin hints).
 * - body_class (string)   Extra body class when active.
 * - styles     (string[]) Slugs mapped to assets/css/templates/{slug}.css
 * - scripts    (string[]) Slugs mapped to assets/js/templates/{slug}.js
 *
 * @return array<string, array<string, mixed>>
 */
function zf_get_page_templates() {
	$templates = array(
		'full-width' => array(
			'file'       => 'page-templates/full-width.php',
			'label'      => __( 'Full Width', 'zfhassaan' ),
			'body_class' => 'zf-template-full-width',
			'styles'     => array( 'full-width' ),
			'scripts'    => array(),
		),
		'blank'      => array(
			'file'       => 'page-templates/blank.php',
			'label'      => __( 'Blank Canvas', 'zfhassaan' ),
			'body_class' => 'zf-template-blank',
			'styles'     => array( 'blank' ),
			'scripts'    => array(),
		),
		'landing'    => array(
			'file'       => 'page-templates/landing.php',
			'label'      => __( 'Landing Page', 'zfhassaan' ),
			'body_class' => 'zf-template-landing',
			'styles'     => array( 'landing' ),
			'scripts'    => array( 'landing' ),
		),
		'contact'    => array(
			'file'       => 'page-templates/contact.php',
			'label'      => __( 'Contact', 'zfhassaan' ),
			'body_class' => 'zf-template-contact',
			'styles'     => array( 'contact' ),
			'scripts'    => array(),
		),
	);

	/**
	 * Filter the page-template registry.
	 *
	 * @param array $templates Template definitions keyed by slug.
	 */
	return apply_filters( 'zf_page_templates', $templates );
}

/**
 * Resolve the registry entry for the current page template, if any.
 *
 * @return array<string, mixed>|null
 */
function zf_get_active_page_template() {
	if ( ! is_singular( 'page' ) ) {
		return null;
	}

	$current = get_page_template_slug();
	if ( ! $current ) {
		return null;
	}

	$current = wp_normalize_path( $current );

	foreach ( zf_get_page_templates() as $slug => $config ) {
		$file = isset( $config['file'] ) ? wp_normalize_path( $config['file'] ) : '';
		if ( $file && $file === $current ) {
			$config['slug'] = $slug;
			return $config;
		}
	}

	return null;
}

/**
 * Whether a given page-template slug is active.
 *
 * @param string $slug Registry slug.
 * @return bool
 */
function zf_is_page_template( $slug ) {
	$active = zf_get_active_page_template();
	return $active && isset( $active['slug'] ) && $active['slug'] === $slug;
}

/**
 * Enqueue CSS/JS registered for the active page template.
 *
 * @return void
 */
function zf_enqueue_page_template_assets() {
	$active = zf_get_active_page_template();
	if ( ! $active ) {
		return;
	}

	$slug = isset( $active['slug'] ) ? $active['slug'] : 'page';

	$styles = isset( $active['styles'] ) && is_array( $active['styles'] ) ? $active['styles'] : array();
	foreach ( $styles as $style_slug ) {
		$rel  = 'css/templates/' . sanitize_file_name( $style_slug ) . '.css';
		$path = zf_asset_path( $rel );
		if ( ! file_exists( $path ) ) {
			continue;
		}
		wp_enqueue_style(
			'zf-template-' . sanitize_key( $style_slug ),
			zf_asset( $rel ),
			array( 'zf-main' ),
			zf_asset_version( $path )
		);
	}

	$scripts = isset( $active['scripts'] ) && is_array( $active['scripts'] ) ? $active['scripts'] : array();
	foreach ( $scripts as $script_slug ) {
		$rel  = 'js/templates/' . sanitize_file_name( $script_slug ) . '.js';
		$path = zf_asset_path( $rel );
		if ( ! file_exists( $path ) ) {
			continue;
		}
		wp_enqueue_script(
			'zf-template-' . sanitize_key( $script_slug ),
			zf_asset( $rel ),
			array( 'zf-main' ),
			zf_asset_version( $path ),
			true
		);
	}

	/**
	 * Fires after page-template assets are enqueued.
	 *
	 * @param string               $slug   Template slug.
	 * @param array<string, mixed> $active Active template config.
	 */
	do_action( 'zf_enqueue_page_template_assets', $slug, $active );
}

/**
 * Admin notice listing registered page templates (Appearance → Themes hint).
 * Useful while building out templates.
 *
 * @return void
 */
add_action(
	'admin_notices',
	static function () {
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
		if ( ! $screen || 'themes' !== $screen->id ) {
			return;
		}
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}

		$templates = zf_get_page_templates();
		if ( empty( $templates ) ) {
			return;
		}

		$labels = array();
		foreach ( $templates as $config ) {
			$labels[] = isset( $config['label'] ) ? $config['label'] : '';
		}
		$labels = array_filter( $labels );

		printf(
			'<div class="notice notice-info is-dismissible"><p>%s <strong>%s</strong></p></div>',
			esc_html__( 'ZF Default page templates:', 'zfhassaan' ),
			esc_html( implode( ', ', $labels ) )
		);
	}
);
