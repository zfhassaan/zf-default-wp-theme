<?php
/**
 * Search form.
 *
 * @package ZF_Default
 */
?>
<form role="search" method="get" class="zf-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="zf-search-field"><?php esc_html_e( 'Search for:', 'zfhassaan' ); ?></label>
	<input type="search" id="zf-search-field" class="zf-search-form__input" placeholder="<?php esc_attr_e( 'Search…', 'zfhassaan' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	<button type="submit" class="zf-btn zf-btn--primary"><?php esc_html_e( 'Search', 'zfhassaan' ); ?></button>
</form>
