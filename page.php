<?php
/**
 * Default page template.
 *
 * @package ZF_Default
 */

get_header();
?>
<main id="main-content" class="zf-main">
	<div class="zf-container">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page' );
		endwhile;
		?>
	</div>
</main>
<?php
get_footer();
