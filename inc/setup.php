<?php
/**
 * Theme supports, menus, and image sizes.
 *
 * @package ZF_Default
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'after_setup_theme',
	static function () {
		load_theme_textdomain( 'zfhassaan', ZF_THEME_DIR . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
		);
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 280,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support(
			'editor-styles',
			array()
		);

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'zfhassaan' ),
				'footer'  => __( 'Footer Menu', 'zfhassaan' ),
			)
		);

		add_image_size( 'zf-hero', 1600, 900, true );
		add_image_size( 'zf-card', 800, 600, true );
	}
);

add_action(
	'widgets_init',
	static function () {
		register_sidebar(
			array(
				'name'          => __( 'Sidebar', 'zfhassaan' ),
				'id'            => 'sidebar-1',
				'description'   => __( 'Add widgets here.', 'zfhassaan' ),
				'before_widget' => '<section id="%1$s" class="zf-widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="zf-widget__title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Footer', 'zfhassaan' ),
				'id'            => 'footer-1',
				'description'   => __( 'Footer widget area.', 'zfhassaan' ),
				'before_widget' => '<section id="%1$s" class="zf-widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="zf-widget__title">',
				'after_title'   => '</h2>',
			)
		);
	}
);

add_filter(
	'body_class',
	static function ( $classes ) {
		if ( is_front_page() ) {
			$classes[] = 'zf-front';
		}

		$active = zf_get_active_page_template();
		if ( $active && ! empty( $active['body_class'] ) ) {
			$classes[] = sanitize_html_class( $active['body_class'] );
		}

		return $classes;
	}
);
