<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package [vendor_name]
 * @since   [initial_version]
 */

use [namespace]\Structure\Comments;
?>

<article <?php \post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( \is_singular() ) {
			\the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			\the_title( '<h2 class="entry-title"><a href="' . \esc_url( \get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( 'post' === \get_post_type() ) {
		?>
		<div class="entry-meta">
			<?php Comments::posted_on(); ?>
		</div>
		<?php
		}
		?>
	</header>

	<div class="entry-content">
		<?php
			\the_content( sprintf(
				\wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					\__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '[text_domain]' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				\get_the_title()
			) );

			\wp_link_pages( array(
				'before' => '<div class="page-links">' . \esc_html__( 'Pages:', '[text_domain]' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="entry-footer">
		<?php Comments::entry_footer(); ?>
	</footer>
</article>
