<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package [vendor_name]
 */

if ( ! \is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="sidebar">
	<?php \dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
