<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div class="site-content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package [vendor_name]
 * @since   [initial_version]
 */

use [namespace]\Http\Assets;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php \bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php \wp_head(); ?>
</head>

<body <?php \body_class(); ?>>

<?php Assets::get_svg_sprite(); ?>

<div class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php \esc_html_e( 'Skip to content', '[text_domain]' ); ?></a>

	<header class="site-header">
		<div class="site-branding">
		<?php
		\the_custom_logo();

		$description = \get_bloginfo( 'description', 'display' );
		if ( $description || \is_customize_preview() ) {
		?>
			<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
		<?php
		}
		?>
		</div>

		<nav class="main-navigation">
		<?php
			\wp_nav_menu( array(
				'depth'          => 1,
				'container'      => '',
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'items_wrap'     => '<ul id="%1$s" class="main-menu">%3$s</ul>',
			) );
		?>
		</nav>
	</header>

	<div class="site-content">
