<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li>
	<?php
	
		//echo get_the_ID();
		//echo '<hr />';
		
		global $product;

		echo '<div class="uk-inline djns">';                 
		//woocommerce_template_loop_product_thumbnail();
		//var_dump($product->get_gallery_image_ids());
		echo '<div class="uk-inline-clip uk-transition-toggle img_ygusg uk-first-column" tabindex="0"><a href="'.get_permalink().'">';
		echo $product->get_image('gshdj');
		echo '</a></div>';

		echo '<span class="fafg pro-dshj">';
		woocommerce_show_product_loop_sale_flash();
		echo '</span>';
		echo '<div class="fdskls">';
		//echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
		echo '<div class="uk-margin-top"><a href="'.get_permalink().'" class="uk-link-reset">'.$product->name.'</a></div>';
		echo '<div class="ggshj_price">'.$product->get_price_html().'</div>';
		echo '</div>';

		$gdd =  $product->has_options();


		if($gdd == 1){
			$ds = $product->get_variation_attributes();
			$dssd = $product->get_available_variations();
			$v_id = $dssd[0]['variation_id'];
			$att = $dssd[0]['attributes'];
			$attributes = '';
			foreach($att as $key => $value){
				if($value == ""){
					$jh = str_replace('attribute_','',$key);
					$di = $ds[$jh][0];
					$attributes .= "&{$key}={$di}";
				}else{
					$attributes .= "&{$key}={$value}";
				}
			}

			echo '<button class="uk-button uk-button-secondary uk-button-small but_gff uk-position-bottom-center uk-overlay uk-overlay-default dj_button pro_dshjs_btn" data_item="'.$product->add_to_cart_url().'?variation_id='.$v_id.'&add-to-cart='.get_the_ID().$attributes.'&quantity=1'.'">';
			echo '<i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Add to cart</span>';
			echo '</button>';
		}else{
			echo '<button class="uk-button uk-button-secondary uk-button-small but_gff uk-position-bottom-center uk-overlay uk-overlay-default dj_button pro_dshjs_btn" data_item="'.home_url().'/'.$product->add_to_cart_url().'">';
			echo '<i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Add to cart</span>';
			echo '</button>';
		}

		//echo get_the_ID();
		
		echo '</div>';
?>

</li>
