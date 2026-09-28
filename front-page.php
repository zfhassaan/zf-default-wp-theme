<?php
/**
 * Front page template.
 *
 * @package ZF_Default
 */

get_header();
?>
<main id="main-content" class="zf-main zf-front-main">
	<section class="zf-landing__hero">
		<div class="zf-container">
			<p class="zf-front-eyebrow"><?php bloginfo( 'name' ); ?></p>
			<h1 class="zf-landing__title">
				<?php
				$description = get_bloginfo( 'description', 'display' );
				echo $description
					? esc_html( $description )
					: esc_html__( 'A clean foundation for your next WordPress theme.', 'zfhassaan' );
				?>
			</h1>
			<p class="zf-landing__lead">
				<?php esc_html_e( 'Assign a static front page, or edit this template to build your homepage sections.', 'zfhassaan' ); ?>
			</p>
			<p>
				<a class="zf-btn zf-btn--primary" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/' ) ); ?>">
					<?php esc_html_e( 'Explore posts', 'zfhassaan' ); ?>
				</a>
			</p>
		</div>
	</section>

	<div class="zf-container">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				if ( get_the_content() ) :
					?>
					<div class="zf-entry__content zf-narrow">
						<?php the_content(); ?>
					</div>
					<?php
				endif;
			endwhile;
		endif;
		?>
	</div>
</main>
<?php
get_footer();
