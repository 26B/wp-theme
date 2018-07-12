<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package [vendor_name]
 * @since   [initial_version]
 */

\get_header(); ?>

	<section class="content-area">
		<main class="site-main">

		<?php
		if ( \have_posts() ) {
		?>

			<header class="page-header">
				<h1 class="page-title">
				<?php
					/* translators: %s: search query. */
					printf( \esc_html__( 'Search Results for: %s', '[text_domain]' ), '<span>' . \get_search_query() . '</span>' );
				?>
				</h1>
			</header>

			<?php
			/* Start the Loop */
			while ( \have_posts() ) {
				\the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				\get_template_part( 'template-parts/content', 'search' );
			}

			\the_posts_navigation();

		} else {
			\get_template_part( 'template-parts/content', 'none' );
		}
		?>

		</main>
	</section>

<?php
\get_sidebar();
\get_footer();
