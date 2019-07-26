<?php
/**
 * Block Product Carousel support.
 *
 * @package Shopical
 */
?>
<?php $button_mode = shopical_get_option('aft_product_loop_button_display'); ?>
<div class="product-loop-wrapper">
    <?php
    global $post, $product;
    $url = shopical_get_featured_image($post->ID, 'shopical-thumbnail');
    $cat_display = shopical_get_option('aft_product_loop_category');
    ?>

    <div class="product-wrapper <?php echo esc_attr($button_mode); ?>">
        <div class="product-image-wrapper">
            <?php
            if ($url): ?>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_attr($url); ?>">
                </a>
            <?php endif; ?>

            <?php if ($product->get_average_rating()): ?>
                <div class="product-rating-wrapper">
                    <?php do_action('shopical_woocommerce_template_loop_rating'); ?>
                </div>
            <?php endif; ?>

            <div class="badge-wrapper">
                <?php do_action('shopical_woocommerce_show_product_loop_sale_flash'); ?>
            </div>
        </div>
        <div class="product-description">
            <div class="product-title-wrapper">
                <?php if ($cat_display == 'yes'): ?>
                    <span class="product-category">
            <?php shopical_post_categories(); ?>
        </span>
                <?php endif; ?>
                <h4 class="product-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h4>
            </div>

            <span class="price">
            <?php do_action('shopical_woocommerce_after_shop_loop_item_title'); ?>
        </span>

                
            <?php $iconset_class = shopical_iconset_class(); ?>
            <div class="product-item-meta add-to-cart-button <?php echo esc_attr($iconset_class); ?>">
                <div class="default-add-to-cart-button">
                    <?php do_action('shopical_woocommerce_template_loop_add_to_cart'); ?>
                </div>

               <?php shopical_wishlistqvcomp_iconset(); ?>
            </div>

        </div>
    </div>
</div>
