<?php
/**
 * No results content.
 *
 * @package ZF_Default
 */
?>
<section class="zf-no-results">
	<h1 class="zf-entry__title"><?php esc_html_e( 'Nothing found', 'zfhassaan' ); ?></h1>
	<p><?php esc_html_e( 'It looks like nothing was found at this location. Try a search.', 'zfhassaan' ); ?></p>
	<?php get_search_form(); ?>
</section>
