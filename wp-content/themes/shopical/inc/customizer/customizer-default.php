<?php
/**
 * Default theme options.
 *
 * @package Shopical
 */

if (!function_exists('shopical_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function shopical_get_default_theme_options() {

    $defaults = array();
    // Preloader options section
    $defaults['enable_site_preloader'] = 1;
    $defaults['site_preloader_background'] = '#f1f1f1';
    $defaults['site_preloader_spinner_color'] = '#dd3333';

    // Header options section
    $defaults['header_layout'] = 'header-style-1';
    $defaults['disable_sticky_header_option'] = 0;
    $defaults['site_title_font_size']    = 36;

    $defaults['show_top_header'] = 1;
    $defaults['show_top_header_store_contacts'] = 1;
    $defaults['show_top_header_social_contacts'] = 1;
    $defaults['top_header_background_color'] = "#222222";
    $defaults['top_header_text_color'] = "#ffffff";

    $defaults['show_top_menu'] = 0;
    $defaults['show_social_menu_section'] = 1;
    $defaults['show_minicart_section'] = 1;
    $defaults['show_store_contact_section'] = 1;

    $defaults['add_to_wishlist_icon'] = 'fa fa-heart-o';
    $defaults['already_in_wishlist_icon'] = 'fa fa-heart';

    $defaults['enable_header_image_tint_overlay'] = 0;
    $defaults['show_offpanel_menu_section'] = 1;

    $defaults['banner_advertisement_section'] = '';
    $defaults['banner_advertisement_section_url'] = '';
    $defaults['banner_advertisement_open_on_new_tab'] = 1;
    $defaults['banner_advertisement_scope'] = 'front-page-only';


    // breadcrumb options section
    $defaults['enable_general_breadcrumb'] = 'yes';
    $defaults['select_breadcrumb_mode'] = 'simple';


    $defaults['show_latest_product_section'] = 1;
    $defaults['latest_product_categories'] = 0;
    $defaults['number_of_latest_product'] = 5;
    $defaults['show_latest_product_lists_button'] = 1;


    $defaults['top_categories_section_title'] = 'Top Categories';
    $defaults['top_categories_1'] = 0;
    $defaults['top_categories_2'] = 0;
    $defaults['top_categories_3'] = 0;
    $defaults['top_categories_4'] = 0;
    $defaults['top_categories_5'] = 0;
    $defaults['top_categories_6'] = 0;
    $defaults['top_categories_7'] = 0;
    $defaults['top_categories_8'] = 0;
    $defaults['top_categories_9'] = 0;
    $defaults['top_categories_10'] = 0;
    $defaults['show_top_categories_product_count'] = 'true';
    $defaults['show_top_categories_product_onsale_count'] = 'true';
    $defaults['select_top_categories_section_mode'] = 'list-only';

    $defaults['select_top_categories_on_hover'] = 'top-5-products';
    $defaults['select_top_categories_orderby'] = 'name';
    $defaults['select_top_categories_order'] = 'ASC';

    // Slider.
    $defaults['slider_status']                  = false;
    $defaults['button_text_1']                  = esc_html__( 'Shop Now', 'shopical' );
    $defaults['button_text_2']                  = esc_html__( 'Shop Now', 'shopical' );
    $defaults['button_text_3']                  = esc_html__( 'Shop Now', 'shopical' );
    $defaults['button_text_4']                  = esc_html__( 'Shop Now', 'shopical' );
    $defaults['button_text_5']                  = esc_html__( 'Shop Now', 'shopical' );
    $defaults['button_link_1']                  = '';
    $defaults['button_link_2']                  = '';
    $defaults['button_link_3']                  = '';
    $defaults['button_link_4']                  = '';
    $defaults['button_link_5']                  = '';
    $defaults['page_caption_position_1']             = 'left';
    $defaults['page_caption_position_2']             = 'left';
    $defaults['page_caption_position_3']             = 'left';
    $defaults['page_caption_position_4']             = 'left';
    $defaults['page_caption_position_5']             = 'left';
    $defaults['slider_autoplay_status']         = true;
    $defaults['slider_pager_status']            = true;
    $defaults['slider_transition_effect']       = 'fade';
    $defaults['slider_transition_delay']        = 3;


    $defaults['slider_product_1']             = '';
    $defaults['slider_product_2']             = '';
    $defaults['slider_product_3']             = '';
    $defaults['slider_product_4']             = '';
    $defaults['slider_product_5']             = '';

    $defaults['product_caption_position_1']             = 'left';
    $defaults['product_caption_position_2']             = 'left';
    $defaults['product_caption_position_3']             = 'left';
    $defaults['product_caption_position_4']             = 'left';
    $defaults['product_caption_position_5']             = 'left';

    // Frontpage Section.

    $defaults['show_flash_news_section'] = 1;
    $defaults['flash_news_title'] = __('Flash Story', 'shopical');
    $defaults['select_flash_news_category'] = 0;
    $defaults['number_of_flash_news'] = 5;
    $defaults['banner_flash_news_scope'] = 'front-page-only';

    $defaults['main_news_slider_title'] = __('Main Story', 'shopical');
    $defaults['select_slider_news_category'] = 0;
    $defaults['select_main_slider_section_mode'] = 'page-slider';
    $defaults['number_of_slides'] = 5;

    $defaults['first_thumbnail_slider_link_1'] = '';
    $defaults['first_thumbnail_slider_link_2'] = '';
    $defaults['first_thumbnail_slider_link_3'] = '';
    $defaults['first_thumbnail_slider_button_texts_1'] = 'Shop Now';
    $defaults['first_thumbnail_slider_button_texts_2'] = 'Shop Now';
    $defaults['first_thumbnail_slider_button_texts_3'] = 'Shop Now';
    $defaults['show_first_thumbnail_slider_page_title_1'] = 'true';
    $defaults['show_first_thumbnail_slider_page_title_2'] = 'true';
    $defaults['show_first_thumbnail_slider_page_title_3'] = 'true';

    $defaults['second_thumbnail_slider_link_1'] = '';
    $defaults['second_thumbnail_slider_link_2'] = '';
    $defaults['second_thumbnail_slider_link_3'] = '';
    $defaults['second_thumbnail_slider_button_texts_1'] = 'Shop Now';
    $defaults['second_thumbnail_slider_button_texts_2'] = 'Shop Now';
    $defaults['second_thumbnail_slider_button_texts_3'] = 'Shop Now';
    $defaults['show_second_thumbnail_slider_page_title_1'] = 'true';
    $defaults['show_second_thumbnail_slider_page_title_2'] = 'true';
    $defaults['show_second_thumbnail_slider_page_title_3'] = 'true';

    $defaults['show_main_banner_section'] = 0;
    $defaults['frontpage_main_banner_layout'] = 'main-banner-style-1';
    $defaults['show_horizontal_page_grid_section'] = 1;
    $defaults['show_horizontal_category_section'] = 1;

    $defaults['show_store_features_section'] = 1;
    $defaults['store_features_icon_1'] = 'fa fa-paper-plane';
    $defaults['store_features_icon_2'] = 'fa fa-gift';
    $defaults['store_features_icon_3'] = 'fa fa-life-ring';

    $defaults['store_features_title_1'] = 'Free Shipping';
    $defaults['store_features_title_2'] = 'Get Discount';
    $defaults['store_features_title_3'] = '24/7 Suport';

    $defaults['store_features_desc_1'] = 'On all orders over $75.00';
    $defaults['store_features_desc_2'] = 'Get Coupon & Discount';
    $defaults['store_features_desc_3'] = 'We will be at your service';



    $defaults['show_featured_categories_section'] = 0;
    $defaults['featured_categories_section_title'] = 'Featured Categories';
    $defaults['featured_categories_section_title_note'] = '';
    $defaults['featured_categories_1'] = 0;
    $defaults['featured_categories_2'] = 0;
    $defaults['featured_categories_3'] = 0;
    $defaults['featured_categories_4'] = 0;
    $defaults['featured_categories_5'] = 0;
    $defaults['featured_categories_6'] = 0;
    $defaults['show_featured_categories_product_count'] = 'true';
    $defaults['show_featured_categories_product_onsale_count'] = 'true';

    $defaults['show_offer_pages_section'] = 1;
    $defaults['show_offer_pages_section_title'] = 'Store Offers';
    $defaults['show_offer_pages_section_note'] = '';

    $defaults['offer_pages_link_1'] = '';
    $defaults['offer_pages_link_2'] = '';
    $defaults['offer_pages_link_3'] = '';
    $defaults['offer_pages_button_texts_1'] = 'Shop Now';
    $defaults['offer_pages_button_texts_2'] = 'Shop Now';
    $defaults['offer_pages_button_texts_3'] = 'Shop Now';
    $defaults['show_offer_pages_page_title_1'] = 'true';
    $defaults['show_offer_pages_page_title_2'] = 'true';
    $defaults['show_offer_pages_page_title_3'] = 'true';


    $defaults['frontpage_content_alignment'] = 'align-content-left';

    //layout options
    $defaults['global_content_layout'] = 'default-content-layout';
    $defaults['global_content_alignment'] = 'align-content-left';
    $defaults['global_image_alignment'] = 'full-width-image';
    $defaults['global_post_date_author_setting'] = 'show-date-author';
    $defaults['global_excerpt_length'] = 20;
    $defaults['global_read_more_texts'] = __('Read more', 'shopical');

    $defaults['archive_layout'] = 'archive-layout-grid';
    $defaults['archive_image_alignment'] = 'archive-image-left';
    $defaults['archive_content_view'] = 'archive-content-excerpt';
    $defaults['disable_main_banner_on_blog_archive'] = 0;


    //Related posts
    $defaults['single_show_related_posts'] = 1;
    $defaults['single_related_posts_title']     = __( 'More Stories', 'shopical' );
    $defaults['single_number_of_related_posts']  = 6;

    //Related posts
    $defaults['store_contact_name'] = '';
    $defaults['store_contact_address'] = '107-95 West Brooklyn, USA';
    $defaults['store_contact_phone']     = '+1 212-0123456789';
    $defaults['store_contact_email']  = 'contact@shopemail.com';
    $defaults['store_contact_hours']  = '10am-8pm';
    $defaults['store_contact_website']  = '';
    $defaults['store_contact_other_informations']  = '';
    $defaults['store_contact_form']  = '';
    $defaults['store_contact_map']  = '';
    $defaults['store_contact_page']  = '';

    //Secure Payment Options
    $defaults['secure_payment_badge'] = '';
    $defaults['secure_payment_badge_url'] = '';
    $defaults['secure_payment_badge_open_in_new_tab'] = 1;

    //Pagination.
    $defaults['site_pagination_type'] = 'default';


    // Footer.
    // Latest posts
    $defaults['frontpage_show_latest_posts'] = 1;
    $defaults['frontpage_latest_posts_section_title'] = __('You may missed', 'shopical');
    $defaults['frontpage_latest_posts_category'] = 0;
    $defaults['number_of_frontpage_latest_posts'] = 4;

    //Instagram
    $defaults['footer_show_instagram_post_carousel'] = 1;
    $defaults['footer_instagram_post_carousel_scopes'] = 'front-page';
    $defaults['instagram_username'] = 'wpafthemes';
    $defaults['instagram_access_token'] = '7510889272.577c420.c6d613a1e7d24499ae6432d8e2e6fe9f';
    $defaults['number_of_instagram_posts'] = 10;

    $defaults['footer_scroll_to_top_position'] = 'right-side';

    $defaults['footer_copyright_text'] = esc_html__('Copyright &copy; All rights reserved.', 'shopical');
    $defaults['hide_footer_menu_section']  = 0;
    $defaults['hide_footer_site_title_section']  = 0;
    $defaults['hide_footer_copyright_credits']  = 0;
    $defaults['number_of_footer_widget']  = 3;

    $defaults['main_navigation_background_color']     = '#af0000';
    $defaults['main_navigation_link_color']     = '#ffffff';


    $defaults['main_header_background_color']     = '#23282d';


    //woocommerce
    $defaults['store_global_alignment']    = 'align-content-left';
    $defaults['store_enable_breadcrumbs']    = 'yes';
    $defaults['store_single_sale_text']    = 'Sale!';
    $defaults['store_single_add_to_cart_text']    = 'Add to cart';
    $defaults['store_simple_add_to_cart_text']    = 'Add to cart';
    $defaults['store_variable_add_to_cart_text']    = 'Select options';
    $defaults['store_grouped_add_to_cart_text']    = 'View options';
    $defaults['store_external_add_to_cart_text']    = 'Read More';

    $defaults['store_product_search_autocomplete']    = 'yes';
    $defaults['store_product_search_placeholder']    = 'Search Products...';
    $defaults['store_product_search_category_placeholder']    = 'Select Category';
    $defaults['store_product_search_show_popular_tags']    = 'yes';



    $defaults['aft_enable_minicart']    = 1;
    $defaults['aft_product_minicart_counter']    = 'yes';
    $defaults['aft_product_minicart_total']    = 'yes';
    $defaults['aft_product_minicart_contents']    = 'yes';
    $defaults['aft_language_switcher_shortcode']    = '';
    $defaults['aft_currency_switcher_shortcode']    = '';


    $defaults['aft_product_loop_button_display']    = 'show-on-hover';
    $defaults['aft_product_loop_category']    = 'yes';
    $defaults['aft_product_loop_color']    = 'secondary-color';
    $defaults['aft_product_loop_custom_color']    = '#cc0000';
    $defaults['store_product_shop_page_row']    = '5';
    $defaults['store_product_shop_page_product_per_page']    = '15';
    $defaults['store_product_shop_page_product_sort']    = 'yes';

    $defaults['store_product_page_product_zoom']    = 'yes';
    $defaults['store_product_page_gallery_thumbnail_columns']    = '4';
    $defaults['store_product_page_related_products']    = 'yes';
    $defaults['store_product_page_related_products_per_row']    = '5';
    $defaults['store_product_page_related_products_per_page']    = '5';
    $defaults['store_product_page_review_tab']    = 'yes';



    // Pass through filter.
    $defaults = apply_filters('shopical_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;
