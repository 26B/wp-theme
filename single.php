<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package [vendor_name]
 * @since   [initial_version]
 */

\get_header(); ?>

	<div class="content-area">
		<main class="site-main">

		<?php
		while ( \have_posts() ) {
			\the_post();

			\get_template_part( 'template-parts/content', \get_post_type() );

			\the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( \comments_open() || \get_comments_number() ) {
				\comments_template();
			}
		} // End of the loop.
		?>

		</main>
	</div>

<?php
\get_sidebar();
\get_footer();
