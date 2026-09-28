<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="zf-skip-link" href="#main-content"><?php esc_html_e( 'Skip to content', 'zfhassaan' ); ?></a>
<?php get_template_part( 'template-parts/header/site', 'header' ); ?>
