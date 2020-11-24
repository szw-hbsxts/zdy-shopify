<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="<?php echo get_template_directory_uri();?>/assets/js/uikit.min.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/assets/js/uikit-icons.min.js"></script>
        <!-- zdy CSS -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/main.css" />
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/head.css" />
        <!--font-awesome 独立图标-->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/font-awesome/css/font-awesome.min.css" />
        <!-- zdy js -->
        <script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.js"></script>    
    </head>
<body>

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

<nav class="uk-navbar-container uk-position-fixed gsah" uk-navbar>
    <div class="header mgfsgt uk-flex">
        <div class="uk-navbar-left top-dsh">
            <div class="men_top">
                <ul class="uk-navbar-nav top-scnk hsj_uuys">
                    <li class="uk-active"><a href="<?php echo home_url();?>">Home</a></li>
                    <li class="uk-active"><a href="<?php echo home_url();?>/index.php/shop">Shop</a></li>
                    <?php
                    
                    for ($x=0; $x<3; $x++) {
                        echo '<li>';
                        echo '<a href="'.get_term_link($all_categories[$x]->slug, 'product_cat').'">'.$all_categories[$x]->name.'</a>';
                        $args2 = array(
                            'taxonomy'     => $taxonomy,
                            'child_of'     => 0,
                            'parent'       => $all_categories[$x]->term_id,
                            'orderby'      => $orderby,
                            'show_count'   => $show_count,
                            'pad_counts'   => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li'     => $title,
                            'hide_empty'   => $empty
                          );
                          $sub_cats = get_categories( $args2 );
                          if($sub_cats) {
                              echo '<div class="uk-navbar-dropdown"><ul class="uk-nav uk-navbar-dropdown-nav">';
                              foreach($sub_cats as $sub_category) {
                                  echo  '<li class="uk-active"><a href="'.get_term_link($sub_category->slug, 'product_cat').'">'.$sub_category->name.'</a></li>';
                              }
                              echo '</ul></div>';
                  
                          }
                        echo '</li>';
                    } 
                    
                    ?>
                </ul>
                <span class="uk-margin-small-right uk-icon ment_list uk-button-default dha_head" uk-toggle="target: #offcanvas-overlay" uk-icon="list"></span>
                <div id="offcanvas-overlay" class="bg_dshjs" uk-offcanvas="overlay: true">
                    <div class="uk-offcanvas-bar">
                        <button class="uk-offcanvas-close" type="button" uk-close></button>
                        <ul class="dnskj_mebnt" uk-accordion="multiple: true">

                            <?php
                                foreach ($all_categories as $cat) {
                                    //print_r($cat);
                                    if($cat->category_parent == 0) {
                                        $category_id = $cat->term_id;
                                
                                ?>                                  
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
                                            echo '<li>';
                                            echo '<a class="uk-accordion-title" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
                                            echo '<div class="uk-accordion-content">';
                                            foreach($sub_cats as $sub_category) {
                                                echo  '<a class="rfjik_zdy" href="'. get_term_link($sub_category->slug,'product_cat').'">'.$sub_category->name.'</a>';
                                            }
                                            echo '</div>';
                                        }else{
                                            echo '<li>';
                                            echo '<a class="uk-accordion-title zdy_title" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
                                        }
                                        echo '</li>'; 
                                    }
                                    
                                }
                            ?>

                        </ul>
                    </div>
                </div>
                <a href="/" class="logo-flkdkf"><img class="logo-img " src="//cdn.shopifycdn.net/s/files/1/0356/4008/2491/files/693432_Logo-Pet-store_072420_256x.png?v=1595775726" alt="Logo"></a>
            </div>
        </div>
        <div class="uk-navbar-center gts_logo">
         <a href="/" class="logo-default"><img class="logo-img" src="//cdn.shopifycdn.net/s/files/1/0356/4008/2491/files/693432_Logo-Pet-store_072420_256x.png?v=1595775726" alt="Logo"></a>
        </div>
        <div class="uk-navbar-right">

            <ul class="uk-flex sfdg_top">
                <li>
                    <a href="#" class="uk-margin-small-right uk-icon dha_head " uk-icon="search" uk-toggle="target: #offcanvas-usage"></a> 
                    <div id="offcanvas-usage" class="sdjnksd_sear" uk-offcanvas>
                        <div class="uk-offcanvas-bar">
                            <div class="uk-navbar-item">
                                <span class="dakj_tis">Find anything you need</span>
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>          
                </li>
                <li class="uk-inline" uk-toggle="target: #offcanvas-flip">
                    <a href="#" class="uk-margin-small-right uk-icon dha_head" uk-icon="cart"></a>
                    <span id="mini_cart" class="uk-badge uk-position-top-right"><?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></span>
                </li>
                <li>
                    <a href="#" class="uk-margin-small-right uk-icon dha_head" uk-icon="cog"></a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div class='main'>
    <div class="_container" id="demo">
        <p class='uk-text-italic' style="margin-top:0px;">Free Shipping on all orders above $50</p>
        <p class='uk-text-italic' style="margin-top:0px;">PetParadise the store to take your animals in heaven !</p>
    </div>
    <?php do_action( 'customify/main/before' ); ?>





