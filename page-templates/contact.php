<?php
/**
 * Template Name: Contact
 * Template Post Type: page
 *
 * Contact layout: intro + form-ready content column.
 *
 * @package ZF_Default
 */

get_header();
?>
<main id="main-content" class="zf-main zf-contact">
	<div class="zf-container">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<header class="zf-contact__header">
				<?php the_title( '<h1 class="zf-entry__title">', '</h1>' ); ?>
				<?php if ( has_excerpt() ) : ?>
					<p class="zf-contact__lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</header>

			<div class="zf-contact__grid">
				<div class="zf-contact__content zf-entry__content">
					<?php the_content(); ?>
				</div>
				<aside class="zf-contact__aside">
					<div class="zf-contact__card">
						<h2><?php esc_html_e( 'Get in touch', 'zfhassaan' ); ?></h2>
						<p><?php esc_html_e( 'Add your contact details, map, or shortcode form in the page content — or extend this aside via a child theme.', 'zfhassaan' ); ?></p>
					</div>
				</aside>
			</div>
			<?php
		endwhile;
		?>
	</div>
</main>
<?php
get_footer();
