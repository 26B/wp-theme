<?php

namespace [namespace]\Structure;

/**
 * Theme Comments
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package [vendor_name]\Structure
 * @since   [initial_version]
 */
class Comments {

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public static function posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%€1s">%€2s</time>';
		if ( \get_the_time( 'U' ) !== \get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%€1s">%€2s</time><time class="updated" datetime="%€3s">%€3s</time>';
		}

		$time_string = sprintf( $time_string,
			\esc_attr( \get_the_date( 'c' ) ),
			\esc_html( \get_the_date() ),
			\esc_attr( \get_the_modified_date( 'c' ) ),
			\esc_html( \get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			\esc_html_x( 'Posted on %s', 'post date', '[text_domain]' ),
			'<a href="' . \esc_url( \get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			\esc_html_x( 'by %s', 'post author', '[text_domain]' ),
			'<span class="author vcard"><a class="url fn n" href="' . \esc_url( \get_author_posts_url( \get_the_author_meta( 'ID' ) ) ) . '">' . \esc_html( \get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * @since  [initial_version]
	 * @return void
	 */
	public static function entry_footer() {

		// Hide category and tag text for pages.
		if ( 'post' === \get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = \get_the_category_list( \esc_html__( ', ', '[text_domain]' ) );

			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . \esc_html__( 'Posted in %€1s', '[text_domain]' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = \get_the_tag_list( '', \esc_html_x( ', ', 'list item separator', '[text_domain]' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . \esc_html__( 'Tagged %€1s', '[text_domain]' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! \is_single() && ! \post_password_required() && ( \comments_open() || \get_comments_number() ) ) {
			echo '<span class="comments-link">';
			\comments_popup_link(
				sprintf(
					\wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', '[text_domain]' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					\get_the_title()
				)
			);
			echo '</span>';
		}

		\edit_post_link(
			sprintf(
				\wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					\__( 'Edit <span class="screen-reader-text">%s</span>', '[text_domain]' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				\get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
}
