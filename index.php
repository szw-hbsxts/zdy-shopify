<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 *
 * @package WordPress
 * @subpackage zdy-shopify
 */

get_header();
?>
<div>
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: scale;autoplay: true;autoplay-interval: 5000;">
        <ul class="uk-slideshow-items">
            <li>
                <img src="<?php echo get_template_directory_uri();?>/assets/images/photo.jpg" alt="" uk-cover>
                <div class="uk-position-center uk-position-small uk-text-center">
                    <h2 uk-slideshow-parallax="x: 100,-100">Animals are member of the family</h2>
                    <p uk-slideshow-parallax="x: 200,-200">Make them happy</p>
                    <a class="uk-button uk-button-default gfd-butn" uk-slideshow-parallax="x: 300,-300" href="#">Shop now</a>
                </div>
            </li>
            <li>
                <img src="<?php echo get_template_directory_uri();?>/assets/images/dark.jpg" alt="" uk-cover>
                <div class="uk-position-center uk-position-small uk-text-center">
                    <h2 uk-slideshow-parallax="x: 100,-100">See our new produc</h2>
                    <p uk-slideshow-parallax="x: 200,-200"></p>
                    <a class="uk-button uk-button-default gfd-butn" uk-slideshow-parallax="x: 300,-300" href="#">Shop now</a>
                </div>
            </li>
            <li>
                <img src="<?php echo get_template_directory_uri();?>/assets/images/light.jpg" alt="" uk-cover>
                <div class="uk-position-center uk-position-small uk-text-center">
                    <h2 uk-slideshow-parallax="y: -50,0,0; opacity: 1,1,0">测试</h2>
                    <p uk-slideshow-parallax="y: 50,0,0; opacity: 1,1,0">测试</p>
                    <a class="uk-button uk-button-default gfd-butn" uk-slideshow-parallax="x: 300,-300" href="#">Shop now</a>
                </div>
            </li>
        </ul>

        <a class="uk-position-center-left uk-position-small btn_butt" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small btn_butt" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

    </div>
</div>
<div class="ggfghd">
    <div class="uk-column-1-3@s">
            <div class='uk-text-center'>
                <dl class="uk-description-list">
                    <dt><a class="uk-text-emphasis uk-text-large"><i class="fa fa-truck dsssd" aria-hidden="true"></i></a></dt>
                    <dd class='uk-text-secondary uk-text-italic uk-margin-small fdh_size'>Order shipped the next hour</dd>
                </dl>
            </div>
            <div class='uk-text-center'>
                <dl class="uk-description-list">
                    <dt><a class="uk-text-emphasis uk-text-large"><i class="fa fa-file-text-o dsssd" aria-hidden="true"></i></a></dt>
                    <dd class='uk-text-secondary uk-text-italic uk-margin-small fdh_size'>Free shipping above $50</dd>
                </dl>
            </div>
            <div class='uk-text-center'>
                <dl class="uk-description-list">
                    <dt><a class="uk-text-emphasis uk-text-large"><i class="fa fa-commenting-o dsssd" aria-hidden="true"></i></a></dt>
                    <dd class='uk-text-secondary uk-text-italic uk-margin-small fdh_size'>Live chat 8am-5pm every day</dd>
                </dl>
            </div>
    </div>
</div>

<div class='dsk_title'>
    <span class='uk-text-small uk-text-center uk-text-muted'>Most popular</span>
    <span class='uk-text-large uk-text-center uk-text-emphasis uk-text-bolder'>Collections</span>
</div>
<?php
    $taxonomy     = 'product_cat';
    $orderby      = 'name';  
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no  
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
    $all_categories = get_categories( $args );
    //var_dump($all_categories);
    ?>
<div class="in_prd">
    <ul class="uk-subnav uk-subnav-pill uk-flex-center btn_shss" uk-switcher="animation: uk-animation-fade">
        <?php 
            for ($x=0; $x<5; $x++) {
                if($all_categories[$x]->category_parent == 0) {
                    echo '<li><a href="#">'.$all_categories[$x]->name.'</a></li>';
                }
            }
        ?>
    </ul>

    <ul class="uk-switcher uk-margin cp_imag_list">
        <?php 
            for ($a=0; $a<5; $a++) {
                if($all_categories[$x]->category_parent == 0) {
                    echo '<li>';
                    $p_id = $all_categories[$a]->name;
                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 8,
                        'product_cat'    => $p_id
                    );

                    $loop = new WP_Query( $args );
                    //var_dump($loop);
                    ?>
                    <div class="uk-child-width-1-2 uk-child-width-1-4@m uk-text-center" uk-grid>
                        <?php
                            while ( $loop->have_posts() ) : $loop->the_post();
                                global $product;

                                echo '<div class="uk-inline djns">';                 
                                //woocommerce_template_loop_product_thumbnail();
                                //var_dump($product->get_gallery_image_ids());
                                echo '<div class="uk-inline-clip uk-transition-toggle img_ygusg uk-first-column" tabindex="0"><a href="'.get_permalink().'">';
                                echo $product->get_image('gshdj');
                                echo '</a></div>';

                                echo '<span class="fafg">';
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

                                    echo '<button class="uk-button uk-button-secondary uk-button-small but_gff uk-position-bottom-center uk-overlay uk-overlay-default dj_button" data_item="'.$product->add_to_cart_url().'?variation_id='.$v_id.'&add-to-cart='.get_the_ID().$attributes.'&quantity=1'.'">';
                                    echo '<i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Add to cart</span>';
                                    echo '</button>';
                                }else{
                                    echo '<button class="uk-button uk-button-secondary uk-button-small but_gff uk-position-bottom-center uk-overlay uk-overlay-default dj_button" data_item="'.home_url().'/'.$product->add_to_cart_url().'">';
                                    echo '<i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Add to cart</span>';
                                    echo '</button>';
                                }

                                //echo get_the_ID();
                                
                                echo '</div>';
                            endwhile;   
                            wp_reset_query();
                        ?>
                    </div>
                    <?php
                    echo '<a class="uk-button uk-button-secondary uk-button-small uk-margin-top but_gff bsh" href="'.get_term_link($all_categories[$a]->slug, 'product_cat').'">'.$p_id.'</a>';
                    echo '</li>';
                }
            } 
        ?>
    </ul>
</div>

<div class="tgsh">
    <div class='mgfsgt'>
        <span class='uk-text-center yhsdf'>Comments from our Clients</span>
        <div class="uk-child-width-expand@s uk-text-center" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <img class='uk-border-circle' src="<?php echo get_template_directory_uri();?>/assets/images/1.jpg" />
                    <h6>JOHN MURPHY</h6>
                    <p>"I've bought a Dog Chew Rope a year ago, my dog still play with it."</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <img class='uk-border-circle' src="<?php echo get_template_directory_uri();?>/assets/images/2.jpg" />
                    <h6>DAVE MORE</h6>
                    <p>"The delivery is fast ! The products are of great quality ! "</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <img class='uk-border-circle' src="<?php echo get_template_directory_uri();?>/assets/images/3.jpg" />
                    <h6>KAREN SMITH</h6>
                    <p>"My cat is in love with his cat plush bed, it is the best purchase I've made."</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

