<?php
/**
 * Comments template.
 *
 * @package ZF_Default
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="zf-comments">
	<?php if ( have_comments() ) : ?>
		<h2 class="zf-comments__title">
			<?php
			$zf_count = get_comments_number();
			printf(
				/* translators: %s: comment count */
				esc_html( _n( '%s comment', '%s comments', $zf_count, 'zfhassaan' ) ),
				esc_html( number_format_i18n( $zf_count ) )
			);
			?>
		</h2>

		<ol class="zf-comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>

		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="zf-comments__closed"><?php esc_html_e( 'Comments are closed.', 'zfhassaan' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>
