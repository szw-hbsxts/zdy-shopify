<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="uk-margin-top"> </div>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?> >

	<div class="summary entry-summary uk-float-left cen_let_xix">
	
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		the_title( '<h2 class="zdy-title_pro font-bold">', '</h2>' );
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>
	<div class='uk-float-right cen_rig_xix'>
	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>
	</div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

<?php
//var_dump($product);
//echo get_the_ID();
//获取当前产品id
$id = get_the_ID();
//获取当前产品分类名称
$terms = get_the_terms( $id, 'product_cat' );
//类名称
$canert =  $terms[0]->{'name'};
//类下的产品
$args = array(
	'post_type'      => 'product',
	'posts_per_page' => 1000,
	'product_cat'    => $canert
);
//类的信息
$loop = new WP_Query( $args );
//类下的产品数据
$cp = $loop->{'posts'};
//当前产品下产品名称
$dq = $post->{'post_title'};
//类下产品数量
$num = count($loop->{'posts'});
//定义空
$dshs = '';
for($a=0;$a<$num;$a++){
	$de = $cp[$a]->{'post_title'};
	//判断当前所在位置
	if($de == $dq){
		//定义当前所在位置
		$dshs = $a;
	}
}

$net = (int)$dshs + 1;
$pre = (int)$dshs - 1;
if($num > 1){
	if($dshs == 0){
		$ns = $cp[$net]->{'ID'};
		echo '<a href="'.$cp[$net]->{'guid'}.'" class="nsff_next" title="'.$cp[$net]->{'post_title'}.'">'.cpxx($ns).'<span>next</span></a>';
	}else if($dshs == $num-1){
		$ps = $cp[$pre]->{'ID'};
		echo '<a href="'.$cp[$pre]->{'guid'}.'" class="nsff_prev" title="'.$cp[$pre]->{'post_title'}.'">'.cpxx($ps).'<span>previous</span></a>';
	}else{
		$ps = $cp[$pre]->{'ID'};
		echo '<a href="'.$cp[$pre]->{'guid'}.'" class="nsff_prev" title="'.$cp[$pre]->{'post_title'}.'">'.cpxx($ps).'<span>previous</span></a>';
		$ns = $cp[$net]->{'ID'};
		echo '<a href="'.$cp[$net]->{'guid'}.'" class="nsff_next" title="'.$cp[$net]->{'post_title'}.'">'.cpxx($ns).'<span>next</span></a>';
	}
}
function cpxx($id){
	$pr = get_product($id);
	return $pr->get_image('sjjpi');
}

?>