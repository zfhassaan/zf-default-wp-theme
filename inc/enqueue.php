<?php
/**
 * Scripts and styles.
 *
 * @package ZF_Default
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'wp_enqueue_scripts',
	static function () {
		wp_enqueue_style(
			'zf-fonts',
			'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Fraunces:opsz,wght@9..144,600;9..144,700&display=swap',
			array(),
			null
		);

		$main_css = zf_asset_path( 'css/main.css' );
		wp_enqueue_style(
			'zf-main',
			zf_asset( 'css/main.css' ),
			array( 'zf-fonts' ),
			zf_asset_version( $main_css )
		);

		$main_js = zf_asset_path( 'js/main.js' );
		wp_enqueue_script(
			'zf-main',
			zf_asset( 'js/main.js' ),
			array(),
			zf_asset_version( $main_js ),
			true
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		zf_enqueue_page_template_assets();
	}
);
