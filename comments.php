<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package [vendor_name]
 * @since   [initial_version]
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( \post_password_required() ) {
	return;
}
?>

<div class="comments-area">

	<?php
	if ( \have_comments() ) {
	?>
		<h2 class="comments-title">
			<?php
			$comment_count = \get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: title. */
					\esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', '[text_domain]' ),
					'<span>' . \get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					\esc_html( \_nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', '[text_domain]' ) ),
					\number_format_i18n( $comment_count ),
					'<span>' . \get_the_title() . '</span>'
				);
			}
			?>
		</h2>

		<?php \the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				\wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol>

		<?php
		\the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! \comments_open() ) {
		?>
			<p class="no-comments"><?php \esc_html_e( 'Comments are closed.', '[text_domain]' ); ?></p>
		<?php
		}
	} // Check for have_comments().

	\comment_form();
	?>

</div>
