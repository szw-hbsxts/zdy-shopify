<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/zdy-shopify
 *
 * @package zdy-shopify
 */

get_header(); ?>
	<div class="content-inner">
		<?php
		woocommerce_content();
		?>
	</div><!-- #.content-inner -->
<?php
get_footer();
