<?php
/**
 * Template Name: Blank Canvas
 * Template Post Type: page
 *
 * Minimal chrome — no header/footer chrome beyond wp_head / wp_footer.
 * Useful for landing experiments and builder canvases.
 *
 * @package ZF_Default
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'zf-blank' ); ?>>
<?php wp_body_open(); ?>
<main id="main-content" class="zf-main zf-main--blank">
	<?php
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
	?>
</main>
<?php wp_footer(); ?>
</body>
</html>
