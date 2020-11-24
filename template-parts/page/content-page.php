<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage zdy_shopify
 * @since zdy_shopify 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="uk-margin-top">
		<?php the_title( '<h1 class="uk-text-bold uk-text-center title font-bold">', '</h1>' ); ?>
		<?php zdy_shopify_edit_link( get_the_ID() ); ?>
	</div><!-- .entry-header -->
	<div class="uk-clearfix zdy_pro_cen">
		<div class='uk-float-left uk-margin-top zdy_left_lan'>	
			<ul uk-accordion="multiple: true">
				<li class="uk-open">
					<a class="uk-accordion-title font-bold" href="#">Collections</a>
					<div class="uk-accordion-content">
						<a href="<?php echo home_url();?>/index.php/shop/" class="font-bold">All products</a>
								<?php
								  $taxonomy     = 'product_cat';
								  $orderby      = 'name';  
								  $show_count   = 0;      // 1 for yes, 0 for no
								  $pad_counts   = 0;      // 1 for yes, 0 for no
								  $hierarchical = 0;      // 1 for yes, 0 for no  
								  $title        = '';  
								  $empty        = 0;
								$args = array(
								  'taxonomy'     => $taxonomy,
								  'orderby'      => $orderby,
								  'show_count'   => $show_count,
								  'pad_counts'   => $pad_counts,
								  'hierarchical' => $hierarchical,
								  'title_li'     => $title,
								  'hide_empty'   => $empty
								);
								?>
						<?php $all_categories = get_categories( $args );

						//print_r($all_categories);
						foreach ($all_categories as $cat) {
							//print_r($cat);
							if($cat->category_parent == 0) {
								$category_id = $cat->term_id;

						?>   
					<?php  echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'" class="font-bold">'. $cat->name .'</a>'; ?>


						<?php
						$args2 = array(
						  'taxonomy'     => $taxonomy,
						  'child_of'     => 0,
						  'parent'       => $category_id,
						  'orderby'      => $orderby,
						  'show_count'   => $show_count,
						  'pad_counts'   => $pad_counts,
						  'hierarchical' => $hierarchical,
						  'title_li'     => $title,
						  'hide_empty'   => $empty
						);
						$sub_cats = get_categories( $args2 );
						if($sub_cats) {
							foreach($sub_cats as $sub_category) {
								echo '<a href="'. get_term_link($sub_category->slug, 'product_cat') .'" class="font-bold"> ——'.$sub_category->name.'</a>';
							}

						} ?>
								<?php 
						}     
						}
						?>
					</div>
				</li>
			</ul>
		</div>
		<div class="uk-align-center uk-float-right uk-margin-top zdy_right_lan">
			<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'zdy_shopify' ),
						'after'  => '</div>',
					)
				);
				?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
