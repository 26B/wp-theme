<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package [vendor_name]
 * @since   [initial_version]
 */

?>

	</div>

	<footer class="site-footer">
		<div class="site-info">
		<?php
			printf(
				\esc_html__( '&copy; %s [theme_name] - All rights reserved.', '[text_domain]' ),
				date( 'Y' )
			);
		?>
		</div>
	</footer>
</div>

<?php \wp_footer(); ?>

</body>
</html>
