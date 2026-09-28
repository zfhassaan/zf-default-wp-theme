<?php
/**
 * Template Name: Landing Page
 * Template Post Type: page
 *
 * Hero + content sections for marketing pages.
 *
 * @package ZF_Default
 */

get_header();
?>
<main id="main-content" class="zf-main zf-landing">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<section class="zf-landing__hero">
			<div class="zf-container">
				<?php the_title( '<h1 class="zf-landing__title">', '</h1>' ); ?>
				<?php if ( has_excerpt() ) : ?>
					<p class="zf-landing__lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</div>
		</section>

		<section class="zf-landing__body">
			<div class="zf-container zf-narrow">
				<div class="zf-entry__content">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
		<?php
	endwhile;
	?>
</main>
<?php
get_footer();
