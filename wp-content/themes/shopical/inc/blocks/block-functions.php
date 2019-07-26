<?php
/**
 * Block Product Carousel support.
 *
 * @package Shopical
 */


/**
 * Display or retrieve the HTML list of product categories.
 *
 * @since 2.1.0
 * @since 4.4.0 Introduced the `hide_title_if_empty` and `separator` arguments. The `current_category` argument was modified to
 *              optionally accept an array of values.
 * */
if (!function_exists('shopical_product_mega_menu')):
    function shopical_product_mega_menu($cat_id)
    {
        $cat_product = shopical_get_products(5, $cat_id);
        $output = '';
        if ($cat_product->have_posts()) :
            $output .= '<ul class="product-ul">';
            while ($cat_product->have_posts()):
                $cat_product->the_post();

                $output .= '<li class="item col-1 float-l pad list-group-product-loop">';
                $product_lists = '';
                ob_start(); ?>

                <div class="product-loop-wrapper">
                    <?php
                    global $post;
                    $url = shopical_get_featured_image($post->ID, 'thumbnail');
                    ?>
                    <div class="product-wrapper">
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
                        </div>
                        <div class="product-description">
                            <div class="product-title-wrapper">
                                <h4 class="product-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                            </div>
                            <span class="price">
                            <?php do_action('shopical_woocommerce_after_shop_loop_item_title'); ?>
                        </span>

                            <div class="product-item-meta add-to-cart-button">
                                <div class="default-add-to-cart-button">
                                    <?php do_action('shopical_woocommerce_template_loop_add_to_cart'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php

                $product_lists = ob_get_contents();
                ob_end_clean();
                $output .= $product_lists;
                $output .= '</li>';

            endwhile;

            $output .= '</ul>';

        endif;
        wp_reset_postdata();
        return $output;
    }
endif;



if (!function_exists('shopical_product_category_loop')):
    function shopical_product_category_loop($category, $product_count = 'true', $onsale_product_count = 'true', $thumbnails = 'shopical-medium-center')
    {
        if (0 != absint($category)):
            $term = get_term_by('id', $category, 'product_cat');
            if ($term):
                $term_name = $term->name;
                $term_link = get_term_link($term);
                $products_count = shopical_product_count($term->term_id);
                $products_count = ($product_count == 'true') ? $products_count : 0;
                $product_onsale = shopical_onsale_product_count($term->term_id);
                $product_onsale = ($onsale_product_count == 'true') ? $product_onsale : 0;
                $meta = get_term_meta($category);

                if (isset($meta['thumbnail_id'])) {
                    $thumb_id = $meta['thumbnail_id'][0];
                    $thumb_url = wp_get_attachment_image_src($thumb_id, $thumbnails);
                    $url = $thumb_url[0];
                } else {
                    $url = '';
                }
                ?>
                <div class="data-bg data-bg-hover sale-background af-slide-hover"
                     data-background="<?php echo esc_url($url); ?>">
                    <a href="<?php echo esc_url($term_link); ?>"></a>
                </div>
                <div class="sale-info">
            <span class="off-tb">
                <span class="off-tc">
                    <a href="<?php echo esc_url($term_link); ?>"></a>
                    <h4 class="sale-title"><?php echo esc_html($term_name); ?></h4>
                    <?php if (absint($products_count) > 0): ?>
                        <span class="product-count">
                            <?php printf(_n('<span class="item-count">%s</span>
<span class="item-texts">item</span>', '<span class="item-count">%s</span><span class="item-texts">items</span>', $products_count, 'shopical'), number_format_i18n($products_count)); ?></span>
                    <?php endif; ?>
                    <?php if (absint($product_onsale) > 0): ?>
                        <span class="product-count onsale-product-count">
                        <?php
                        $sale_flash_text = shopical_get_option('store_single_sale_text');
                        ?>
                            <span class="item-count">
                                <?php echo $product_onsale; ?>
                            </span>
                            <span class="item-texts item-texts-onsale">
                                <?php echo $sale_flash_text; ?>
                            </span>
                    </span>
                    <?php endif; ?>
                </span>
            </span>

                </div>


            <?php
            endif;
        endif;
    }

endif;


/**
 * Display or retrieve the HTML list of product categories.
 *
 * @since 2.1.0
 * @since 4.4.0 Introduced the `hide_title_if_empty` and `separator` arguments. The `current_category` argument was modified to
 *              optionally accept an array of values.
 * */
if (!function_exists('shopical_list_categories')):
    function shopical_list_categories($taxonomy_id = 0, $product_count = 'true', $onsale_product_count = 'true')
    {
        $categories_section_mode = shopical_get_option('select_top_categories_section_mode');
        $categories_hover_mode = shopical_get_option('select_top_categories_on_hover');
        $orderby = shopical_get_option('select_top_categories_orderby');
        $order = shopical_get_option('select_top_categories_order');
        $output = '';
        $show_product_class = '';

        $show_product = true;
        if ($categories_hover_mode == 'top-5-products') {
            $show_product_class = 'aft-mega-menu-list';
        }

        $section_class = 'aft-category-list-set';

        if ($categories_section_mode == 'selected-categories') {
            $selected_categories = shopical_get_product_categories_selected();
            if (isset($selected_categories)) {
                $product_categories = $selected_categories;
            } else {
                $product_categories = shopical_get_product_categories($taxonomy_id, $orderby, $order, 10, true, true);
            }
        } else {
            $product_categories = shopical_get_product_categories($taxonomy_id, $orderby, $order, 10, true, true);
        }


        if ($product_categories) {
            $output .= '<ul class="' . $section_class . '">';
            foreach ($product_categories as $cat) {

                $product_count_no = 0;
                if ($product_count == 'true') {
                    $product_count_no = shopical_product_count($cat->term_id);
                }

                $product_onsale_no = 0;
                if ($onsale_product_count == 'true') {
                    $product_onsale_no = shopical_onsale_product_count($cat->term_id);
                }

                $has_child = shopical_has_term_have_children($cat->term_id, 'product_cat');
                $has_child = ($has_child) ? 'has-child-categories aft-category-list' : 'aft-category-list';
                $output .= '<li class="' . $has_child . ' ' . $show_product_class . '">';
                $output .= '<a href="' . get_term_link($cat->slug, $cat->taxonomy) . '" title="' . sprintf(__("View all products in %s", 'shopical'), $cat->name) . '" ' . '>';
                $output .= '<h4>' . $cat->name . ' </h4>';
                $output .= '<span class="category-badge-wrapper">';

                if (absint($product_count_no) > 0) {
                    $output .= '<span class="onsale">' . $product_count_no . ' items</span>';
                }
                if (absint($product_onsale_no) > 0) {

                    $sale_flash_text = shopical_get_option('store_single_sale_text');
                    $output .= '<span class="onsale">';
                    $output .= $product_onsale_no;
                    $output .= ' ';
                    $output .= $sale_flash_text;
                    $output .= '</span>';

                }
                $output .= '</span>';

                $output .= '</a>';


                if ($categories_hover_mode == 'top-5-products') {
                    $mega_menu = shopical_product_mega_menu($cat->term_id);
                    $output .= $mega_menu;
                }


                $output .= '</li>';

            }


            $output .= '</ul>';
        }

        return $output;
    }
endif;



if (!function_exists('shopical_get_page_loop')):
    function shopical_get_page_loop($show_title = 'true', $button_text = '', $button_link = '#')
    {
        $url = shopical_get_featured_image(get_the_ID(), 'shopical-thumbnail');
        ?>

        <div class="item grid-item-single" >
            <div class="item-grid-item-single-wrap">
            <div class="data-bg data-bg-hover data-bg-slide "
                 data-background="<?php echo esc_url($url); ?>">
            </div>
                <?php if ($button_link): ?>
                        <a href="<?php echo esc_url($button_link); ?>"></a>
                <?php endif; ?>

            <div class="pos-rel">
                <?php if ($show_title == 'true'): ?>
                    <div class="content-caption-overlay-shine"><span></span></div>
                    <div class="content-caption-overlay"></div>
                <?php endif; ?>

                <div class="content-caption on-left">

                    <?php if ($show_title == 'true'): ?>
                        <div class="caption-heading">
                            <h5 class="cap-title">
                                <a href="<?php echo esc_url($button_link); ?>">
                                    <?php echo get_the_title(get_the_ID()); ?></a>
                            </h5>
                        </div>
                    <?php endif; ?>
                    <?php if ($button_link && $button_text): ?>
                        <div class="aft-btn-warpper btn-style1 btn-style2">
                            <a href="<?php echo esc_url($button_link); ?>"><?php echo esc_html($button_text); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        </div>

        <?php
    }
endif;