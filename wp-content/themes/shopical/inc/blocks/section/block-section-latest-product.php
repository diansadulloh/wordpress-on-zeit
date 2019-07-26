<?php
/**
 * Block Section Latest Product.
 *
 * @package Shopical
 */
?>

    <?php
    $category = shopical_get_option('latest_product_categories');
    $latest_product = shopical_get_products(5, $category);
    $button_class = ' aft-hidecart-btn';
    $show_button = shopical_get_option('show_latest_product_lists_button');
    if($show_button){
        $button_class = '';
    }
    ?>
<div class="upper-latest-product-carousel <?php echo esc_attr($button_class); ?>">
    <ul class="product-ul latest-product-carousel owl-carousel owl-theme">
        <?php
        if ($latest_product->have_posts()) :
            while ($latest_product->have_posts()): $latest_product->the_post();

                ?>
                <li class="item">
                    <?php shopical_get_block('list',  'product-loop'); ?>
                </li>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
</div>


