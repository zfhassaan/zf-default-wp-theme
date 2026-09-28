<?php
/**
 * Single post template.
 *
 * @package ZF_Default
 */

get_header();
?>
<main id="main-content" class="zf-main">
	<div class="zf-container zf-layout">
		<div class="zf-content">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'single' );

				the_post_navigation(
					array(
						'prev_text' => '<span class="zf-nav-label">' . esc_html__( 'Previous', 'zfhassaan' ) . '</span><span class="zf-nav-title">%title</span>',
						'next_text' => '<span class="zf-nav-label">' . esc_html__( 'Next', 'zfhassaan' ) . '</span><span class="zf-nav-title">%title</span>',
					)
				);

				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
			?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</main>
<?php
get_footer();
