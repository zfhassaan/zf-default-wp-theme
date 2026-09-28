<?php
/**
 * 404 template.
 *
 * @package ZF_Default
 */

get_header();
?>
<main id="main-content" class="zf-main">
	<div class="zf-container zf-narrow">
		<section class="zf-error">
			<p class="zf-error__code">404</p>
			<h1 class="zf-error__title"><?php esc_html_e( 'Page not found', 'zfhassaan' ); ?></h1>
			<p class="zf-error__text"><?php esc_html_e( 'The page you are looking for does not exist or has been moved.', 'zfhassaan' ); ?></p>
			<p>
				<a class="zf-btn zf-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php esc_html_e( 'Back to home', 'zfhassaan' ); ?>
				</a>
			</p>
			<?php get_search_form(); ?>
		</section>
	</div>
</main>
<?php
get_footer();
