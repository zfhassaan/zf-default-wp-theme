<?php
/**
 * Search results template.
 *
 * @package ZF_Default
 */

get_header();
?>
<main id="main-content" class="zf-main">
	<div class="zf-container zf-layout">
		<div class="zf-content">
			<header class="zf-archive-header">
				<h1 class="zf-archive-title">
					<?php
					printf(
						/* translators: %s: search query */
						esc_html__( 'Search: %s', 'zfhassaan' ),
						esc_html( get_search_query() )
					);
					?>
				</h1>
			</header>

			<?php get_search_form(); ?>

			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', get_post_type() );
				endwhile;

				the_posts_pagination();
				?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content/content', 'none' ); ?>
			<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</main>
<?php
get_footer();
