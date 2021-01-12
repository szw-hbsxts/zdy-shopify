<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $post;


$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
if ( ! $short_description ) {
	return;
}

function jc($post){
	$product = get_product($post->{'ID'});
	$gdd = $product->has_options();
	return array($product,$gdd);
}
function variable($product){
	$dssd = $product->get_available_variations();
	$dsd = $dssd[0]['attributes'];
	//echo "<pre>";
	//var_dump($dsd);
	//echo "</pre>";
	echo '<div id="dsjnjn"><ul>';
	foreach($dsd as $k=>$v){ 
		//echo "<li>".urldecode($v).'</li>';
		echo "<li>".$v.'</li>';
	}
	echo '</ul></div>';
	$price = $dssd[0]['display_price'];
	$regular_price = $dssd[0]['display_regular_price'];
	if($price == $regular_price){
		return array($price);
	}else{
		return array($price,$regular_price);
	} 		
}
function simple($product){
	$data = (array)$product;
	$price = $data["\0*\0data"]["price"];
	$regular_price = $data["\0*\0data"]["regular_price"];		
	if($price == $regular_price){
		return array($price);
	}else{
		return array($price,$regular_price);
	}
}
?>

<?php
$tyuu = jc($post);
$product = $tyuu[0];
$gdd = $tyuu[1];
$arr = '';
if($gdd == 1){
	$arr = variable($product);
}else{
	$arr = simple($product);
}

?>
<?php 
if(count($arr) == 2){
?>
<div class="woocommerce-variation-price fsdsdj">
	<span class="price font-bold-wu">
		<span class="xj_dfjks">
			<span class="woocommerce-Price-amount amount xj_dfjks">
				<bdi><span class="woocommerce-Price-currencySymbol"><?php echo get_woocommerce_currency_symbol( $args['currency'] );?></span><?php echo $arr[0];?></bdi>
			</span>
		</span>
		<span class="yj_dfjks">
			<span class="woocommerce-Price-amount amount yj_dfjks">
				<bdi><span class="woocommerce-Price-currencySymbol"><?php echo get_woocommerce_currency_symbol( $args['currency'] );?></span><?php echo $arr[1];?></bdi>
			</span>
		</span>
	</span>
	<span class="sala_djd_price font-bold-wu">
	<?php 
		$ng = $arr[1] - $arr[0];
		$hgg = round($ng/$arr[1],2)*100;
		echo '- '.$hgg.'% OFF';
	?>
	</span>
</div>
<?php
}else{
?>
<div class="woocommerce-variation-price fsdsdj">
	<span class="price font-bold-wu">
		<span class="woocommerce-Price-amount amount">
			<bdi><span class="woocommerce-Price-currencySymbol"><?php echo get_woocommerce_currency_symbol( $args['currency'] );?></span><?php echo $arr[0];?></bdi>
		</span>
	</span>
</div>


<?php
}
?>
<div class="woocommerce-product-details__short-description content_zu font-bold">
	<h4 class='rem_tes font-bold-wu content_text'>Product Type</h4>
	<?php echo $short_description; // WPCS: XSS ok. ?>
</div>

<?php
if(count($arr) == 2){
?>

<div class="djs_dsbhjs uk-border-rounded uk-box-shadow-large">
	<h6 class='font-bold-wu'>COUNTDOWN TITLE</h6>
	<div class="tre_fdmj" uk-grid uk-countdown="date: <?php echo date('Y-m-d',strtotime('+1 day'));?>T23:59:59+00:00">
		<div class="ssd uk-float-left">
			<div class="uk-countdown-number uk-countdown-days uk-text-large uk-text-center uk-text-emphasis uk-text-bold font-bold-wu"></div>
			<div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s font-bold-wu">Days</div>
		</div>
		<div class="ssd uk-float-left">
			<div class="uk-countdown-number uk-countdown-hours uk-text-large uk-text-center uk-text-emphasis uk-text-bold font-bold-wu"></div>
			<div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s font-bold-wu">Hours</div>
		</div>
		<div class="ssd uk-float-left">
			<div class="uk-countdown-number uk-countdown-minutes uk-text-large uk-text-center uk-text-emphasis uk-text-bold font-bold-wu"></div>
			<div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s font-bold-wu">Minutes</div>
		</div>
		<div class="ssd uk-float-left">
			<div class="uk-countdown-number uk-countdown-seconds uk-text-large uk-text-center uk-text-emphasis uk-text-bold font-bold-wu"></div>
			<div class="uk-countdown-label uk-margin-small uk-text-center uk-visible@s font-bold-wu">Seconds</div>
		</div>
	</div>
</div>
<h5 class='font-bold-wu rem_tes uk-margin-top sdfj_title'>The price of this item will revert back to <b>$<?php echo $arr[1];?></b> at the end of this countdown.</h5>

<?php 
}
?>


<?php 
$arr=range(1,58);
$keys = array_rand($arr,1);
$num = $arr[$keys]; 
?>
<div class="jas_progress">
<span class="uk-display-block uk-float-left font-bold-wu dssdh">ONLY <span class='blink'><?php echo $num;?></span> LEFT IN STOCK </span><progress id="js-progressbar" class="uk-progress rem_tes uk-float-right" value="<?php echo $num;?>" max="100"></progress>
</div>

<div class='add_cart_tyt'>
	<div class="add_cart_quitr uk-float-left">
		<span class="uk-margin-small-right uk-icon uk-float-left rem_tes add_cart_quitr_minus" uk-icon="minus"></span>
		<input class="uk-search-input" type="search uk-float-left rem_tes" value='1'>
		<span class="uk-margin-small-right uk-icon uk-float-right rem_tes add_cart_quitr_plus" uk-icon="plus"></span>
	</div>
<?php

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
	echo '<button class="but_gff add_cart_button font-bold-wu uk-float-right" data_item="'.$product->add_to_cart_url().'?variation_id='.$v_id.'&add-to-cart='.get_the_ID().$attributes.'&quantity=1'.'">';
	echo '<i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Add to cart</span>';
	echo '</button>';
}else{
	echo '<button class="but_gff add_cart_button font-bold-wu uk-float-right" data_item="'.home_url().'/'.$product->add_to_cart_url().'">';
	echo '<i class="fa fa-shopping-basket" aria-hidden="true"></i><span>Add to cart</span>';
	echo '</button>';
}

?>
<a class="uk-margin-top but_gff add_cart_checkout font-bold-wu uk-float-right">Buy it now</a>
</div>


<?php 
$arr=range(102,999);
$keys = array_rand($arr,1);
$num = $arr[$keys]; 
?>
<div class="viewing_shhg fsjk_shhg">
	<span class="urgency__text font-bold-wu">
		<i class="fa fa-eye"></i>
		<span><?php echo $num;?></span> viewing this page.
	</span>
</div>
<?php 
$arr=range(9,99);
$keys = array_rand($arr,1);
$num = $arr[$keys]; 
?>
<div class="cart_shhg fsjk_shhg">
	<span class="urgency__text font-bold-wu">
		<i class="fa fa-shopping-basket"></i>
		<span><?php echo $num;?></span> have this item in their cart.
	</span>
</div>
<div class='zdy_content'>
<?php 
echo the_content();
?>
</div>

<?php


?>