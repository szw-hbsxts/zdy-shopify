<?php
/**
 * Template for displaying search forms in zdy_shopify
 *
 * @package WordPress
 * @subpackage zdy_shopify
 * @since zdy_shopify 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( zdy_shopify_unique_id( 'search-form-' ) ); ?>

<form role="search" method="get" class="uk-search uk-search-large button_dshds" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<span uk-search-icon></span>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field uk-search-input" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'zdy_shopify' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit" style='display:none;'><?php echo zdy_shopify_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'zdy_shopify' ); ?></span></button>
</form>
