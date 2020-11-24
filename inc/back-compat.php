<?php
/**
 * zdy_shopify back compat functionality
 *
 * Prevents zdy_shopify from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage zdy_shopify
 * @since zdy_shopify 1.0
 */

/**
 * Prevent switching to zdy_shopify on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since zdy_shopify 1.0
 */
function zdy_shopify_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'zdy_shopify_upgrade_notice' );
}
add_action( 'after_switch_theme', 'zdy_shopify_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * zdy_shopify on WordPress versions prior to 4.7.
 *
 * @since zdy_shopify 1.0
 *
 * @global string $wp_version WordPress version.
 */
function zdy_shopify_upgrade_notice() {
	/* translators: %s: The current WordPress version. */
	$message = sprintf( __( 'zdy_shopify requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'zdy_shopify' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since zdy_shopify 1.0
 *
 * @global string $wp_version WordPress version.
 */
function zdy_shopify_customize() {
	wp_die(
		/* translators: %s: The current WordPress version. */
		sprintf( __( 'zdy_shopify requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'zdy_shopify' ), $GLOBALS['wp_version'] ),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'zdy_shopify_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since zdy_shopify 1.0
 *
 * @global string $wp_version WordPress version.
 */
function zdy_shopify_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s: The current WordPress version. */
		wp_die( sprintf( __( 'zdy_shopify requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'zdy_shopify' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'zdy_shopify_preview' );
