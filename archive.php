<?php
/**
 * Archive template.
 *
 * @package ZF_Default
 */

get_header();
?>
<main id="main-content" class="zf-main">
	<div class="zf-container zf-layout">
		<div class="zf-content">
			<header class="zf-archive-header">
				<?php the_archive_title( '<h1 class="zf-archive-title">', '</h1>' ); ?>
				<?php the_archive_description( '<div class="zf-archive-desc">', '</div>' ); ?>
			</header>

			<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', get_post_type() );
				endwhile;

				the_posts_pagination(
					array(
						'mid_size'  => 2,
						'prev_text' => __( 'Newer', 'zfhassaan' ),
						'next_text' => __( 'Older', 'zfhassaan' ),
					)
				);
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
