<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package Shopical
 */

/*select page for slider*/
if (!function_exists('shopical_frontpage_content_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_frontpage_content_status($control)
    {

        if ('page' == $control->manager->get_setting('show_on_front')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for trending news*/
if (!function_exists('shopical_flash_posts_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_flash_posts_section_status($control)
    {

        if (true == $control->manager->get_setting('show_flash_news_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for trending news*/
if (!function_exists('shopical_top_header_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_top_header_status($control)
    {

        if (true == $control->manager->get_setting('show_top_header')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for trending news*/
if (!function_exists('shopical_header_layout_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_header_layout_status($control)
    {

        if ('header-style-2' == $control->manager->get_setting('header_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('shopical_main_slider_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_main_slider_section_status($control)
    {

        if (true == $control->manager->get_setting('show_main_banner_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('shopical_page_slider_banner_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_page_slider_banner_mode_status($control)
    {

        if ('page-slider' == $control->manager->get_setting('select_main_slider_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('shopical_product_slider_banner_mode_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_product_slider_banner_mode_status($control)
    {

        if ('product-slider' == $control->manager->get_setting('select_main_slider_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('shopical_store_features_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_store_features_section_status($control)
    {

        if (true == $control->manager->get_setting('show_store_features_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('shopical_show_main_banner_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_show_main_banner_section_status($control)
    {

        if (true == $control->manager->get_setting('show_main_banner_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('shopical_frontpage_main_banner_layout_page_thumb_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_frontpage_main_banner_layout_page_thumb_status($control)
    {

        if (('main-banner-style-2' == $control->manager->get_setting('frontpage_main_banner_layout')->value()) || ('main-banner-style-4' == $control->manager->get_setting('frontpage_main_banner_layout')->value()) || ('main-banner-style-5' == $control->manager->get_setting('frontpage_main_banner_layout')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('shopical_frontpage_main_banner_layout_category_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_frontpage_main_banner_layout_category_status($control)
    {

        if (('main-banner-style-3' == $control->manager->get_setting('frontpage_main_banner_layout')->value()) || ('main-banner-style-4' == $control->manager->get_setting('frontpage_main_banner_layout')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

    /*select page for slider*/
if (!function_exists('shopical_frontpage_main_banner_layout_latest_product_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_frontpage_main_banner_layout_latest_product_status($control)
    {

        if (('main-banner-style-1' == $control->manager->get_setting('frontpage_main_banner_layout')->value()) || ('main-banner-style-2' == $control->manager->get_setting('frontpage_main_banner_layout')->value()) || ('main-banner-style-3' == $control->manager->get_setting('frontpage_main_banner_layout')->value()) || ('main-banner-style-4' == $control->manager->get_setting('frontpage_main_banner_layout')->value())) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('shopical_featured_product_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_featured_product_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_products_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('shopical_latest_news_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_latest_news_section_status($control)
    {

        if (true == $control->manager->get_setting('frontpage_show_latest_posts')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('shopical_archive_image_status')) :

    /**
     * Check if archive no image is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_archive_image_status($control)
    {

        if ('archive-layout-list' == $control->manager->get_setting('archive_layout')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*related posts*/
if (!function_exists('shopical_related_posts_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_related_posts_status($control)
    {

        if (true == $control->manager->get_setting('single_show_related_posts')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*related posts*/
if (!function_exists('store_minicart_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function store_minicart_status($control)
    {

        if (true == $control->manager->get_setting('aft_enable_minicart')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*related posts*/
if (!function_exists('store_product_page_related_products_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function store_product_page_related_products_status($control)
    {

        if ('yes' == $control->manager->get_setting('store_product_page_related_products')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*mailchimp*/
if (!function_exists('shopical_mailchimp_subscriptions_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_mailchimp_subscriptions_status($control)
    {

        if (true == $control->manager->get_setting('footer_show_mailchimp_subscriptions')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('shopical_footer_instagram_posts_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_footer_instagram_posts_status($control)
    {

        if (true == $control->manager->get_setting('footer_show_instagram_post_carousel')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('shopical_list_top_categories_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_list_top_categories_section_status($control)
    {

        if ('list-only' == $control->manager->get_setting('select_top_categories_section_mode')->value() || 'show-nested-subcategories' == $control->manager->get_setting('select_top_categories_section_mode')->value() || 'show-subcategories-and-products' == $control->manager->get_setting('select_top_categories_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


/*select page for slider*/
if (!function_exists('shopical_on_hover_top_categories_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_on_hover_top_categories_section_status($control)
    {

        if ('list-only' == $control->manager->get_setting('select_top_categories_section_mode')->value() || 'selected-categories' == $control->manager->get_setting('select_top_categories_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

    /*select page for slider*/
if (!function_exists('shopical_selected_top_categories_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_selected_top_categories_section_status($control)
    {

        if ('selected-categories' == $control->manager->get_setting('select_top_categories_section_mode')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

    /*shopical_product_loop_color_status*/
if (!function_exists('shopical_product_loop_color_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function shopical_product_loop_color_status($control)
    {

        if ('custom-color' == $control->manager->get_setting('aft_product_loop_color')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

    /*shopical_product_loop_color_status*/
if (!function_exists('store_product_search_color_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function store_product_search_color_status($control)
    {

        if ('custom-color' == $control->manager->get_setting('store_product_search_color')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;



