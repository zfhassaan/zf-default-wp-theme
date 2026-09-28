<?php
/**
 * Template Name: Full Width
 * Template Post Type: page
 *
 * Edge-to-edge content with site header/footer.
 *
 * @package ZF_Default
 */

get_header();
?>
<main id="main-content" class="zf-main zf-main--full">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class( 'zf-entry zf-entry--full' ); ?>>
			<header class="zf-entry__header zf-container">
				<?php the_title( '<h1 class="zf-entry__title">', '</h1>' ); ?>
			</header>
			<div class="zf-entry__content zf-container">
				<?php the_content(); ?>
			</div>
		</article>
		<?php
	endwhile;
	?>
</main>
<?php
get_footer();
