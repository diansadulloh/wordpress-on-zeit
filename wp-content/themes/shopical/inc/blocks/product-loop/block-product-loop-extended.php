<?php
/**
 * Block Product Carousel support.
 *
 * @package Shopical
 */
?>
<div class="product-wrapper">
    <?php
    global $post;
    $url = shopical_get_featured_image($post->ID, 'shopical-medium-slider');
    $cat_display = shopical_get_option('aft_product_loop_category');
    ?>
    <div class="product-image-wrapper">
    <?php
    if ($url): ?>
        <a href="<?php the_permalink(); ?>">
        <img src="<?php echo esc_attr($url); ?>">
        </a>
    <?php endif; ?>
    <div class="badge-wrapper">
        <?php do_action('shopical_woocommerce_show_product_loop_sale_flash'); ?>
    </div>
        <div class="content-caption-overlay-shine"><span></span></div>
        <div class="content-caption-overlay"></div>
        <div class="content-caption on-left">

            <?php if($cat_display == 'yes'): ?>
                <span class="product-category">
            <?php shopical_post_categories(); ?>
        </span>
            <?php endif; ?>
            <h4 class="product-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h4>
            <div class="product-rating-wrapper">
                <?php do_action('shopical_woocommerce_template_loop_rating'); ?>
            </div>
            <span class="price">
            <?php do_action('shopical_woocommerce_after_shop_loop_item_title'); ?>
        </span>
            <?php

            //$excerpt = shopical_get_excerpt(25, get_the_content());
            //echo wp_kses_post(wpautop($excerpt));

            ?>
            <?php $iconset_class = shopical_iconset_class(); ?>
            <div class="product-item-meta add-to-cart-button extended-af clearfix <?php echo esc_attr($iconset_class); ?>">
                <div class="aft-btn-warpper btn-style1">
                    <?php do_action('shopical_woocommerce_template_loop_add_to_cart');?>
                </div>

                <?php shopical_wishlistqvcomp_iconset(); ?>
            </div>
        </div>
    </div>

</div>