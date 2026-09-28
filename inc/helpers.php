<?php
/**
 * Theme helpers.
 *
 * @package ZF_Default
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme asset URI helper.
 *
 * @param string $path Relative path under /assets.
 * @return string
 */
function zf_asset( $path ) {
	return trailingslashit( ZF_THEME_URI ) . 'assets/' . ltrim( $path, '/' );
}

/**
 * Theme asset filesystem path.
 *
 * @param string $path Relative path under /assets.
 * @return string
 */
function zf_asset_path( $path ) {
	return trailingslashit( ZF_THEME_DIR ) . 'assets/' . ltrim( $path, '/' );
}

/**
 * Version for cache busting (filemtime when available).
 *
 * @param string $absolute_path Absolute file path.
 * @return string
 */
function zf_asset_version( $absolute_path ) {
	if ( file_exists( $absolute_path ) ) {
		return (string) filemtime( $absolute_path );
	}
	return ZF_THEME_VERSION;
}

/**
 * Render a simple SVG icon by name.
 *
 * @param string $name Icon key.
 * @return string
 */
function zf_icon( $name ) {
	$icons = array(
		'menu'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'close' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
	);

	return isset( $icons[ $name ] ) ? $icons[ $name ] : '';
}
