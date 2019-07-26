<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Shopical
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function shopical_woocommerce_setup()
{
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}

add_action('after_setup_theme', 'shopical_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function shopical_woocommerce_scripts()
{
    wp_enqueue_style('shopical-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array('shopical-style'));

    $font_path = WC()->plugin_url() . '/assets/fonts/';
    $inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

    wp_add_inline_style('shopical-woocommerce-style', $inline_font);
}

//add_action('wp_enqueue_scripts', 'shopical_woocommerce_scripts', 9999);

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function shopical_woocommerce_active_body_class($classes)
{
    $classes[] = 'woocommerce-active';

    return $classes;
}

add_filter('body_class', 'shopical_woocommerce_active_body_class');


//Shop page control
if (!function_exists('shopical_loop_shop_columns')) {
    function shopical_loop_shop_columns($cols)
    {
        // $cols contains the current number of products per page based on the value stored on Options -> Reading
        // Return the number of products you wanna show per page.
        $cols = shopical_get_option('store_product_shop_page_row');;
        return $cols;
    }
}
add_filter('loop_shop_columns', 'shopical_loop_shop_columns', 20);

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function shopical_woocommerce_products_per_page()
{
    $product_loop = shopical_get_option('store_product_shop_page_product_per_page');;
    return $product_loop;
}

add_filter('loop_shop_per_page', 'shopical_woocommerce_products_per_page');


add_filter('woocommerce_product_thumbnails_columns', 'shopical_woocommerce_thumbnail_columns');

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function shopical_woocommerce_loop_columns()
{
    $cols = shopical_get_option('store_product_shop_page_row');
    return $cols;
}

add_filter('loop_shop_columns', 'shopical_woocommerce_loop_columns');


/**
 * Remove product zoom
 */
if (!function_exists('shopical_remove_product_zoom')) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function shopical_remove_product_zoom($tabs)
    {
        $product_zoom = shopical_get_option('store_product_page_product_zoom');
        if ($product_zoom == 'no') {
            remove_theme_support('wc-product-gallery-zoom');
            remove_theme_support('wc-product-gallery-lightbox');
        }
        return $tabs;
    }
}
add_action('wp_loaded', 'shopical_remove_product_zoom', 9999);

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function shopical_woocommerce_thumbnail_columns()
{
    $cols = shopical_get_option('store_product_page_gallery_thumbnail_columns');
    return $cols;
}


/**
 * Remove related products output
 */
if (!function_exists('shopical_remove_review_tab')) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function shopical_remove_review_tab($tabs)
    {
        $review_tab = shopical_get_option('store_product_page_review_tab');
        if ($review_tab == 'no') {
            unset($tabs['reviews']);

        }
        return $tabs;
    }
}
add_filter('woocommerce_product_tabs', 'shopical_remove_review_tab', 98, 1);

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function shopical_woocommerce_related_products_args($args)
{

    $posts_per_page = shopical_get_option('store_product_page_related_products_per_page');
    $cols = shopical_get_option('store_product_page_related_products_per_row');

    $defaults = array(
        'posts_per_page' => $posts_per_page,
        'columns' => $cols,
    );

    $args = wp_parse_args($defaults, $args);

    return $args;
}

add_filter('woocommerce_output_related_products_args', 'shopical_woocommerce_related_products_args');


/**
 * Remove related products output
 */
if (!function_exists('shopical_remove_related_products')) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function shopical_remove_related_products()
    {
        $related_products = shopical_get_option('store_product_page_related_products');
        if ($related_products == 'no') {
            remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
        }

    }
}
add_action('wp_loaded', 'shopical_remove_related_products');


if (!function_exists('shopical_woocommerce_product_columns_wrapper')) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function shopical_woocommerce_product_columns_wrapper()
    {
        $columns = shopical_woocommerce_loop_columns();
        echo '<div class="columns-' . absint($columns) . '">';
    }
}
add_action('woocommerce_before_shop_loop', 'shopical_woocommerce_product_columns_wrapper', 40);


if (!function_exists('shopical_woocommerce_product_columns_wrapper_close')) {
    /**
     * Product columns wrapper close.
     *
     * @return  void
     */
    function shopical_woocommerce_product_columns_wrapper_close()
    {
        echo '</div>';
    }
}
add_action('woocommerce_after_shop_loop', 'shopical_woocommerce_product_columns_wrapper_close', 40);

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('wp_footer', 'woocommerce_demo_store', 10);

if (!function_exists('shopical_woocommerce_wrapper_before')) {
    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function shopical_woocommerce_wrapper_before()
    {
        ?>
        <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php
    }
}
add_action('woocommerce_before_main_content', 'shopical_woocommerce_wrapper_before');

if (!function_exists('shopical_woocommerce_wrapper_after')) {
    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function shopical_woocommerce_wrapper_after()
    {
        ?>
        </main><!-- #main -->
        </div><!-- #primary -->
        <?php
    }
}
add_action('woocommerce_after_main_content', 'shopical_woocommerce_wrapper_after');


/**
 * Remove related products output
 */
if (!function_exists('shopical_remove_product_ordering')) {
    /**
     * Product columns wrapper.
     *
     * @return  void
     */
    function shopical_remove_product_ordering()
    {
        $sort_products = shopical_get_option('store_product_shop_page_product_sort');
        if ($sort_products == 'no') {
            remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
        }

    }
}
add_action('wp_loaded', 'shopical_remove_product_ordering', 9999);


if (!function_exists('shopical_onsale_product_count')) {
    function shopical_onsale_product_count($category_id = 0)
    {
        $args = array(
            'post_type' => 'product',
            'post_status' => 'published',
            'posts_per_page' => -1,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => $category_id
                ),
                array(
                    'taxonomy' => 'product_visibility',
                    'terms' => array('exclude-from-catalog'),
                    'field' => 'name',
                    'operator' => 'NOT IN',
                ),
            ),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'relation' => 'OR',
                    array(
                        'key' => '_sale_price',
                        'value' => 0,
                        'compare' => '>',
                        'type' => 'numeric'
                    ),
                    array(
                        'key' => '_min_variation_sale_price',
                        'value' => 0,
                        'compare' => '>',
                        'type' => 'numeric'
                    )
                ),
//                array(
//                    'key' => '_stock_status',
//                    'value' => 'instock'
//                ),
            )
        );

        $query = new WP_Query($args);
        $count = $query->found_posts;
        return absint($count);
    }
}

if (!function_exists('shopical_product_count')) {
    function shopical_product_count($category_id = 0)
    {

        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            //'no_found_rows' => 1,
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'nopaging' => true,
            'fields' => 'ids',
            'hide_empty' => true,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_taxonomy_id',
                    'terms' => $category_id, // Replace with the parent category ID
                    'include_children' => true,

                ),
            ),


        );


        $query = new WP_Query($args);
        $count = $query->found_posts;
        return absint($count);
    }
}


/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
 * <?php
 * if ( function_exists( 'shopical_woocommerce_header_cart' ) ) {
 * shopical_woocommerce_header_cart();
 * }
 * ?>
 */

if (!function_exists('shopical_woocommerce_header_cart')) {
    /**
     * Display Header Cart.
     *
     * @return void
     */
    function shopical_woocommerce_header_cart()
    {

        $aft_enable_minicart = shopical_get_option('aft_enable_minicart');

        if($aft_enable_minicart == false){
            return;
        }


        if (is_cart()) {
            $class = 'current-menu-item';
        } else {
            $class = '';
        }
        ?>

        <div class="af-cart-wrap">
            <div class="af-cart-icon-and-count dropdown-toggle" aria-haspopup="true"
                 aria-expanded="true">
                <span class="af-cart-item-count">
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>"
                       title="<?php esc_attr_e('Cart Page', 'shopical'); ?>">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="item-count gbl-bdge-bck-c"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
                    </a>
                </span>
                <?php $show_minicart_total = shopical_get_option('aft_product_minicart_total');
                if ($show_minicart_total == 'yes'):
                    ?>
                    <span class="af-cart-amount gbl-bdge-bck-c"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span>
                <?php endif; ?>
            </div>
        <?php $show_minicart_contents = shopical_get_option('aft_product_minicart_contents');
        if ($show_minicart_contents == 'yes'):
            ?>
            <div class="top-cart-content primary-bgcolor dropdown-menu">
                <ul class="site-header-cart">

                    <li>
                        <?php
                        $instance = array(
                            'title' => '',
                        );

                        the_widget('WC_Widget_Cart', $instance);
                        ?>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
        </div>

        <?php
    }
}

if (!function_exists('shopical_woocommerce_cart_link_fragment')) {
    /**
     * Cart Fragments.
     *
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param array $fragments Fragments to refresh via AJAX.
     * @return array Fragments to refresh via AJAX.
     */
    function shopical_woocommerce_cart_link_fragment($fragments)
    {
        ob_start();
        shopical_woocommerce_cart_icon();
        $fragments['.af-cart-icon-and-count'] = ob_get_clean();

        return $fragments;
    }
}
add_filter('woocommerce_add_to_cart_fragments', 'shopical_woocommerce_cart_link_fragment');


if (!function_exists('shopical_woocommerce_cart_icon')) {
    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function shopical_woocommerce_cart_icon()
    {


        ?>
        <div class="af-cart-icon-and-count dropdown-toggle" aria-haspopup="true"
             aria-expanded="true">
            <span class="af-cart-item-count">
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>"
                   title="<?php esc_attr_e('Cart Page', 'shopical'); ?>">
                <i class="fa fa-shopping-cart"></i>
                <span class="item-count gbl-bdge-bck-c"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
                </a>
            </span>
            <?php $show_minicart_total = shopical_get_option('aft_product_minicart_total');
            if ($show_minicart_total == 'yes'):
                ?>
                <span class="af-cart-amount gbl-bdge-bck-c"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span>
            <?php endif; ?>
        </div>
        <?php
    }
}

if (!function_exists('shopical_woocommerce_cart_link')) {
    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function shopical_woocommerce_cart_link()
    {
        ?>
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>"
           title="<?php esc_attr_e('View your shopping cart', 'shopical'); ?>">
            <?php
            $item_count_text = sprintf(
            /* translators: number of items in the mini cart. */
                _n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'shopical'),
                WC()->cart->get_cart_contents_count()
            );
            ?>
            <span class="count"><?php echo esc_html($item_count_text); ?></span>
            <?php $show_minicart_total = shopical_get_option('aft_product_minicart_total');
            if ($show_minicart_total == 'yes'):
                ?>
                <span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span>
            <?php endif; ?>

        </a>
        <?php
    }
}


/**
 * Remove the breadcrumbs
 */
add_action('wp_loaded', 'shopical_replace_wc_breadcrumbs');
function shopical_replace_wc_breadcrumbs()
{
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    $enable_breadcrumbs = shopical_get_option('store_enable_breadcrumbs');
    if ($enable_breadcrumbs == 'yes') {
        add_action('shopical_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    }

}

/*Display YITH Wishlist Buttons at shop page*/
if (!function_exists('shopical_display_yith_wishlist_loop')) {
    /**
     * Display YITH Wishlist Buttons at product archive page
     *
     */
    function shopical_display_yith_wishlist_loop()
    {

        if (!function_exists('YITH_WCWL')) {
            return;
        }

        echo '<div class="yith-btn">';
        echo do_shortcode("[yith_wcwl_add_to_wishlist]");
        echo '</div>';
    }
}

//$enable_wishlists_on_listings = shopical_get_option('enable_wishlists_on_listings', true);
//if( $enable_wishlists_on_listings ){
add_action('shopical_woocommerce_add_to_wishlist_button', 'shopical_display_yith_wishlist_loop', 16);
//}


if (!function_exists('shopical_woocommerce_header_wishlist')) {
    /**
     * Display Header Wishlist.
     *
     * @return void
     */
    function shopical_woocommerce_header_wishlist()
    {
        ?>
        <div class="aft-wishlist aft-woo-nav">
            <div class="aft-wooicon">
                <a class="aft-wishlist-trigger" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
                    <?php
                    //$wishlist_icon = shopical_get_option('wishlist_icon', true);
                    //if( $wishlist_icon ){
                    echo '<i class="fa fa-heart-o"></i>';
                    //}
                    ?>
                    <span class="aft-woo-counter gbl-bdge-bck-c"><?php echo absint(yith_wcwl_count_all_products()); ?></span>
                </a>
            </div>
        </div>
        <?php
    }
}

if (!function_exists('shopical_update_wishlist_count')) {
    /**
     * Return Wishlist product count.
     */
    function shopical_update_wishlist_count()
    {
        if (class_exists('YITH_WCWL')) {

            wp_send_json(array(
                'count' => yith_wcwl_count_all_products()
            ));
        }
    }
}
add_action('wp_ajax_shopical_update_wishlist_count', 'shopical_update_wishlist_count');
add_action('wp_ajax_nopriv_shopical_update_wishlist_count', 'shopical_update_wishlist_count');

if (!function_exists('shopical_display_wishlist_message')) {
    /**
     * Return Wishlist product added message.
     */
    function shopical_display_wishlist_message($msg)
    {
        if (class_exists('YITH_WCWL')) {
            if (property_exists('YITH_WCWL', 'details')) {
                $details = YITH_WCWL()->details;
                if (is_array($details) && isset($details['add_to_wishlist'])) {
                    $product_id = $details['add_to_wishlist'];
                    $product = wc_get_product($product_id);
                    if (!is_wp_error($product)) {
                        $product_title = sprintf(__('%s has been added to your wishist.', 'shopical'), '<strong>' . $product->get_title() . '</strong>');
                        $product_image = $product->get_image();

                        ob_start();
                        ?>
                        <div class="aft-notification-header">
                            <h3><?php _e('WishList Items', 'shopical') ?></h3>
                        </div>
                        <div class="aft-notification">
                            <div class="aft-notification-image">
                                <?php echo $product_image; ?>
                            </div>
                            <div class="aft-notification-title">
                                <?php echo $product_title; ?>
                            </div>
                        </div>
                        <div class="aft-notification-button">
                            <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>">
                                <?php _e('View Wishlist', 'shopical') ?>
                            </a>
                        </div>

                        <?php
                        $msg = ob_get_clean();
                    }
                }
            }
        }
        return $msg;
    }
}
add_filter('yith_wcwl_product_added_to_wishlist_message', 'shopical_display_wishlist_message');

/*Display YITH Quickview Buttons at shop page*/
if (!function_exists('shopical_display_yith_quickview_loop')) {
    /**
     * Display YITH Wishlist Buttons at product archive page
     *
     */
    function shopical_display_yith_quickview_loop()
    {
        if (!function_exists('yith_wcqv_install')) {
            return;
        }

        echo '<div class="yith-btn">';
        global $product, $post;
        $product_id = $post->ID;
        $label = 'Compare';

        if (!$product_id) {
            $product instanceof WC_Product && $product_id = yit_get_prop($product, 'id', true);
        }

        $button = '';
        if ($product_id) {
            // get label


            $button .= '<a href="#" class="button yith-wcqv-button" data-product_id="' . $product_id . '"><div data-toggle="tooltip" data-placement="top" title="Quick View"><i class="fa fa-search" aria-hidden="true"></i></div></a>';
        }
        echo $button;
        echo '</div>';


    }
}

//$enable_wishlists_on_listings = shopical_get_option('enable_wishlists_on_listings', true);
//if( $enable_wishlists_on_listings ){
add_action('shopical_woocommerce_yith_quick_view_button', 'shopical_display_yith_quickview_loop', 16);
//}

/*Display YITH Compare Buttons at shop page*/
if (!function_exists('shopical_display_yith_compare_loop')) {
    /**
     * Display YITH Wishlist Buttons at product archive page
     *
     */
    function shopical_display_yith_compare_loop()
    {
        if (!class_exists('YITH_Woocompare')) {
            return;
        }


        echo '<div class="yith-btn">';
        global $product, $post;
        $product_id = $post->ID;

        if (!$product_id) {
            $product instanceof WC_Product && $product_id = yit_get_prop($product, 'id', true);
        }

        $button = '';
        if ($product_id) {

            $button = do_shortcode('[yith_compare_button type="link" button_text="<span class="aft-tooltip" data-toggle="tooltip" data-placement="top" title="Compare"></span><i class="fa fa-refresh" aria-hidden="true" ></i>"]');

        }
        echo $button;
        echo '</div>';


    }
}

//$enable_wishlists_on_listings = shopical_get_option('enable_wishlists_on_listings', true);
//if( $enable_wishlists_on_listings ){
add_action('shopical_woocommerce_yith_compare_button', 'shopical_display_yith_compare_loop', 16);
//}

if (!function_exists('shopical_sale_flash')) {
    function shopical_sale_flash($content, $post, $product)
    {
        $sale_flash = shopical_get_option('store_single_sale_text');
        if (!empty($sale_flash)) {
            $content = '<span class="onsale">' . $sale_flash . '</span>';
        }

        return $content;
    }
}
add_filter('woocommerce_sale_flash', 'shopical_sale_flash', 10, 3);


/*Display YITH Quickview Buttons at shop page*/
if (!function_exists('shopical_add_to_cart_text')) {

    function shopical_add_to_cart_text($add_to_cart_texts)
    {
        global $product;

        $simple = shopical_get_option('store_simple_add_to_cart_text');
        $variable = shopical_get_option('store_variable_add_to_cart_text');
        $grouped = shopical_get_option('store_grouped_add_to_cart_text');
        $external = shopical_get_option('store_external_add_to_cart_text');

        if ($product->is_type('simple')) {
            return $simple;
        }

        if ($product->is_type('variable')) {
            return $variable;
        }

        if ($product->is_type('grouped')) {
            return $grouped;
        }

        if ($product->is_type('external')) {
            return $external;
        }

        return $add_to_cart_texts;

    }

}
// Single Product
add_filter('woocommerce_product_add_to_cart_text', 'shopical_add_to_cart_text', 10, 2);


/*Display YITH Quickview Buttons at shop page*/
if (!function_exists('shopical_single_add_to_cart_text')) {

    function shopical_single_add_to_cart_text()
    {
        $button_texts = shopical_get_option('store_single_add_to_cart_text');
        return $button_texts; // Change this to change the text on the Single Product Add to cart button.
    }

}
// Single Product
add_filter('woocommerce_product_single_add_to_cart_text', 'shopical_single_add_to_cart_text');


if (!function_exists('shopical_woocommerce_template_loop_hooks')) :

    function shopical_woocommerce_template_loop_hooks()
    {

        remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash');
        remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title');
        add_action('shopical_woocommerce_template_loop_product_link_open', 'woocommerce_template_loop_product_link_open');
        add_action('shopical_woocommerce_template_loop_product_link_close', 'woocommerce_template_loop_product_link_close');
        add_action('shopical_woocommerce_show_product_loop_sale_flash', 'woocommerce_show_product_loop_sale_flash');
        add_action('shopical_woocommerce_template_loop_product_thumbnail', 'woocommerce_template_loop_product_thumbnail');
        add_action('shopical_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');
        add_action('shopical_woocommerce_template_loop_rating', 'woocommerce_template_loop_rating', 5);
        add_action('shopical_woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price');
        add_action('shopical_woocommerce_template_loop_add_to_cart', 'woocommerce_template_loop_add_to_cart');
    }
endif;

add_action('wp_loaded', 'shopical_woocommerce_template_loop_hooks');





/**
 * Live autocomplete search feature.
 *
 * @since 1.0.0
 */
function shopical_ajax_search()
{
    $results = new WP_Query(array(
        'post_type' => array('product'),
        'post_status' => 'publish',
        'nopaging' => true,
        'posts_per_page' => 100,
        's' => stripslashes($_POST['search']),
        'meta_query' => array(
            array(
                'key' => '_visibility',
                'value' => 'hidden',
                'compare' => '!=',
            )
        ),
    ));
    $items = array();
    if (!empty($results->posts)) {
        foreach ($results->posts as $result) {
            $items[] = $result->post_title;
        }
    }
    wp_send_json_success($items);
}

add_action('wp_ajax_search_site', 'shopical_ajax_search');
add_action('wp_ajax_nopriv_search_site', 'shopical_ajax_search');


add_filter('body_class', 'shopical_body_class');
function shopical_body_class($classes)
{

//    foreach ( $classes as $key => $value ) {
//        if ( $value == 'woocommerce-page' ) unset( $classes[ $key ] );
//    }

    if (!is_woocommerce()) {
        $classes[] = 'woocommerce';
    }

    return $classes;

}

function shopical_woocommerce_shop_loop_subcategory_title($category)
{
    $product_count = 'true';
    $onsale_product_count = 'true';
    $products_count = shopical_product_count($category->term_id);
    $products_count = ($product_count == 'true') ? $products_count : 0;
    $product_onsale = shopical_onsale_product_count($category->term_id);
    $product_onsale = ($onsale_product_count == 'true') ? $product_onsale : 0;
    ?>
    <h2 class="woocommerce-loop-category__title">
        <?php echo esc_html($category->name); ?>
    </h2>
    <?php if (absint($products_count) > 0): ?>
    <div class="product-onsale-count clearfix">
    <span class="product-count">
           <?php printf(_n('<span class="item-count">%s</span>
            <span class="item-texts">item</span>', '<span class="item-count">%s</span><span class="item-texts">items</span>', $products_count, 'shopical'), number_format_i18n($products_count)); ?>

       </span>
<?php endif;

    if (absint($product_onsale) > 0):
        $sale_flash_text = shopical_get_option('store_single_sale_text');
        ?>
        <span class="product-count onsale-product-count">

            <span class="item-count"> <?php echo esc_html($product_onsale); ?></span>
            <span class="item-texts item-texts-onsale"><?php echo esc_html($sale_flash_text); ?></span></span>
    <?php
    endif; ?>
    </div>
    <?php


}

add_action('woocommerce_shop_loop_subcategory_title', 'shopical_woocommerce_shop_loop_subcategory_title');




/**
 * Returns the product categories in a list.
 *
 * @param int $product_id Product ID.
 * @param string $sep (default: ', ').
 * @param string $before (default: '').
 * @param string $after (default: '').
 * @return string
 */
function wc_get_product_brand_list($product_id, $sep = ', ', $before = '', $after = '')
{
    return get_the_term_list($product_id, 'shopical_brand', $before, $sep, $after);
}

if (!function_exists('shopical_wishlistqvcomp_iconset')) :
    /**
     *
     */
    function shopical_wishlistqvcomp_iconset()
    {

        $iconset = 0;
        $YITH_WCWL = false;
        $yith_wcqv_install = false;
        $YITH_Woocompare = false;

        $icons = array();
        if (class_exists('YITH_WCWL')) {
            $iconset += 1;
            $YITH_WCWL = true;
        }
        if (function_exists('yith_wcqv_install')) {
            $iconset += 1;
            $yith_wcqv_install = true;

        }
        if (class_exists('YITH_Woocompare')) {
            $iconset += 1;
            $YITH_Woocompare = true;
        }
        if ($iconset > 0):
            ?>
            <ul class="product-item-meta-always-visible ">
                <?php if ($YITH_WCWL == true): ?>
                    <li><?php do_action('shopical_woocommerce_add_to_wishlist_button'); ?></li>
                <?php endif; ?>
                <?php if ($yith_wcqv_install == true): ?>
                    <li><?php do_action('shopical_woocommerce_yith_quick_view_button'); ?></li>
                <?php endif; ?>
                <?php if ($YITH_Woocompare == true): ?>
                    <li><?php do_action('shopical_woocommerce_yith_compare_button'); ?></li>
                <?php endif; ?>

            </ul>
        <?php
        endif;
    }
endif;

if (!function_exists('shopical_iconset_class')) :
    /**
     * @return string
     */
    function shopical_iconset_class()
    {
        $iconset = 0;
        if (class_exists('YITH_WCWL')) {
            $iconset += 1;
        }
        if (function_exists('yith_wcqv_install')) {
            $iconset += 1;
        }
        if (class_exists('YITH_Woocompare')) {
            $iconset += 1;
        }

        $iconset_class = 'aft-iconset-' . $iconset;
        return $iconset_class;
    }
endif;


if (!function_exists('shopical_language_and_currency_switcher')) :
    /**
     *
     */
    function shopical_language_and_currency_switcher()
    {
        ?>
        <?php if (class_exists('WooCommerce')): ?>
        <?php
        $language_switcher_shortcode = shopical_get_option('aft_language_switcher_shortcode');
        if (!empty($language_switcher_shortcode)):
            ?>
            <div class="aft-language-currency-switcher">
                <?php
                if (!empty($language_switcher_shortcode)):
                    ?>
                    <div class="language-currency-switcher currency-switcher">
                        <?php echo do_shortcode($language_switcher_shortcode); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
        <?php
    }
endif;

if (!function_exists('shopical_my_account_dropdown')) :
    /**
     * @param string $display_account_texts
     */
    function shopical_my_account_dropdown($display_account_texts = 'true')
    {


        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            //$account_texts = __('My Account', 'shopical');
            $account_texts = $current_user->display_name;
        } else {
            $account_texts = __('Login', 'shopical');
            if (get_option('users_can_register')) {
                $account_texts = __('Login/Register', 'shopical');
            }
        }


        $myaccount_page_id = get_option('woocommerce_myaccount_page_id');
        if ($myaccount_page_id) {
            $myaccount_page_url = get_permalink($myaccount_page_id);
        }

        ?>
        <ul class="af-my-account-menu prime-color">
            <?php if ($display_account_texts == 'true'): ?>
                <li><a class="af-my-account-admin"
                       href="<?php echo esc_url($myaccount_page_url); ?>"><?php echo esc_html($account_texts); ?></a>
                </li>
            <?php endif; ?>
            <?php if (is_user_logged_in()):


                $orders = get_option('woocommerce_myaccount_orders_endpoint', 'orders');
                $edit_account = get_option('woocommerce_myaccount_edit_account_endpoint', 'edit-account');
                $customer_logout = get_option('woocommerce_logout_endpoint', 'customer-logout');

                ?>
                <li><a class="af-my-account-order"
                       href="<?php echo esc_url(wc_get_account_endpoint_url($orders)); ?>"><?php echo esc_html_e('My Orders', 'shopical'); ?></a>
                </li>
                <li><a class="af-my-account-edit"
                       href="<?php echo esc_url(wc_get_account_endpoint_url($edit_account)); ?>"><?php echo esc_html_e('Edit Account', 'shopical'); ?></a>
                </li>
                <li><a class="af-my-account-log"
                       href="<?php echo esc_url(wc_get_account_endpoint_url($customer_logout)); ?>"><?php echo esc_html_e('Logout', 'shopical'); ?></a></li>
            <?php endif; ?>
        </ul>
        <?php
    }
endif;

