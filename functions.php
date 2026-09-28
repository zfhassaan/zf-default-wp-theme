<?php
/**
 * Theme bootstrap.
 *
 * @package ZF_Default
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ZF_THEME_VERSION', '1.0.0' );
define( 'ZF_THEME_DIR', get_template_directory() );
define( 'ZF_THEME_URI', get_template_directory_uri() );

require_once ZF_THEME_DIR . '/inc/setup.php';
require_once ZF_THEME_DIR . '/inc/helpers.php';
require_once ZF_THEME_DIR . '/inc/page-templates.php';
require_once ZF_THEME_DIR . '/inc/enqueue.php';
