<?php

/**
 * Option Panel
 *
 * @package Shopical
 */

$default = shopical_get_default_theme_options();

/**
 * Contact options section
 *
 * @package Shopical
 */


//=====================================================
//================== Global Options ===================
//=====================================================

// Product Global Section.
$wp_customize->add_section('store_global_options_settings',
    array(
        'title'      => esc_html__('Store Global Options', 'shopical'),
        'priority'   => 9,
        'capability' => 'edit_theme_options',
        'panel'      => 'woocommerce',
    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting('store_global_alignment',
    array(
        'default'           => $default['store_global_alignment'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_select',
    )
);

$wp_customize->add_control('store_global_alignment',
    array(
        'label'    => esc_html__('Content Alignment', 'shopical'),
        'section'  => 'store_global_options_settings',
        'type'        => 'select',
        'choices'     => array(
            'align-content-left' => esc_html__( 'Content - Store Sidebar', 'shopical' ),
            'align-content-right' => esc_html__( 'Store Sidebar - Content', 'shopical' ),
            'full-width-content' => esc_html__( 'Full Width Content', 'shopical' )
        ),
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('store_enable_breadcrumbs',
    array(
        'default'           => $default['store_enable_breadcrumbs'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_select',
    )
);

$wp_customize->add_control('store_enable_breadcrumbs',
    array(
        'label'    => esc_html__('Enable Breadcrumbs', 'shopical'),
        'section'  => 'store_global_options_settings',
        'type'        => 'select',
        'choices'     => array(
            'yes'              => __( 'Yes', 'shopical' ),
            'no' => __( 'No', 'shopical' ),
        ),
    )
);



//=====================================================
//================== Button and Badge Options ===================
//=====================================================

// Product Search Section.
$wp_customize->add_section('store_button_texts_settings',
    array(
        'title'      => esc_html__('Button and Badge Texts', 'shopical'),
        'priority'   => 9,
        'capability' => 'edit_theme_options',
        'panel'      => 'woocommerce',
    )
);

/*store_single_sale_text*/
$wp_customize->add_setting('store_single_sale_text',
    array(
        'default'           => $default['store_single_sale_text'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_single_sale_text',
    array(
        'label'    => esc_html__('Sale Texts', 'shopical'),
        'section'  => 'store_button_texts_settings',
        'type'     => 'text',
        'priority' => 10,
    )
);



/*store_product_search_placeholder*/
$wp_customize->add_setting('store_single_add_to_cart_text',
    array(
        'default'           => $default['store_single_add_to_cart_text'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_single_add_to_cart_text',
    array(
        'label'    => esc_html__('Single Add to Cart Texts', 'shopical'),
        'section'  => 'store_button_texts_settings',
        'type'     => 'text',
        'priority' => 10,
    )
);

/*store_product_search_placeholder*/
$wp_customize->add_setting('store_simple_add_to_cart_text',
    array(
        'default'           => $default['store_simple_add_to_cart_text'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_simple_add_to_cart_text',
    array(
        'label'    => esc_html__('Simple Product Add to Cart Texts', 'shopical'),
        'section'  => 'store_button_texts_settings',
        'type'     => 'text',
        'priority' => 10,
    )
);



//=====================================================
//================== Search Options ===================
//=====================================================

// Product Search Section.
$wp_customize->add_section('store_product_search_settings',
    array(
        'title'      => esc_html__('Product Search', 'shopical'),
        'priority'   => 9,
        'capability' => 'edit_theme_options',
        'panel'      => 'woocommerce',
    )
);




/*store_product_search_placeholder*/
$wp_customize->add_setting('store_product_search_placeholder',
    array(
        'default'           => $default['store_product_search_placeholder'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_product_search_placeholder',
    array(
        'label'    => esc_html__('Product Search Placeholder', 'shopical'),
        'section'  => 'store_product_search_settings',
        'type'     => 'text',
        'priority' => 10,
    )
);

/*store_product_search_placeholder*/
$wp_customize->add_setting('store_product_search_category_placeholder',
    array(
        'default'           => $default['store_product_search_category_placeholder'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_product_search_category_placeholder',
    array(
        'label'    => esc_html__('Select Category', 'shopical'),
        'section'  => 'store_product_search_settings',
        'type'     => 'text',
        'priority' => 10,
    )
);



//=====================================================
//================== Minicart Options ===================
//=====================================================

// Advertisement Section.
$wp_customize->add_section('store_product_minicart_settings',
    array(
        'title'      => esc_html__('Minicart Settings', 'shopical'),
        'priority'   => 9,
        'capability' => 'edit_theme_options',
        'panel'      => 'woocommerce',
    )
);

// Setting - preloader.
$wp_customize->add_setting('aft_enable_minicart',
    array(
        'default'           => $default['aft_enable_minicart'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_checkbox',
    )
);

$wp_customize->add_control('aft_enable_minicart',
    array(
        'label'    => esc_html__('Enable Minicart', 'shopical'),
        'section'  => 'store_product_minicart_settings',
        'type'     => 'checkbox',
        'priority' => 10,
    )
);

//=====================================================
//================== Language and/or Currency switcher Options ===================
//=====================================================

// Advertisement Section.
$wp_customize->add_section('store_language_and_currency_settings',
    array(
        'title'      => esc_html__('Language/Currency Switcher', 'shopical'),
        'priority'   => 9,
        'capability' => 'edit_theme_options',
        'panel'      => 'woocommerce',
    )
);

/*aft_language_switcher_shortcode*/
$wp_customize->add_setting('aft_language_switcher_shortcode',
    array(
        'default'           => $default['aft_language_switcher_shortcode'],
        'capability'        => 'manage_woocommerce',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('aft_language_switcher_shortcode',
    array(
        'label'    => esc_html__('Language Switcher Shortcode', 'shopical'),
        'section'  => 'store_language_and_currency_settings',
        'priority' => 10,
        'type'        => 'text',
    )
);



//=====================================================
//================== Product Loop Options ===================
//=====================================================

// Advertisement Section.
$wp_customize->add_section('store_product_loop_settings',
    array(
        'title'      => esc_html__('Product Loop', 'shopical'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'woocommerce',
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('aft_product_loop_category',
    array(
        'default'           => $default['aft_product_loop_category'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_select',
    )
);

$wp_customize->add_control('aft_product_loop_category',
    array(
        'label'    => esc_html__('Show Product Category', 'shopical'),
        'section'  => 'store_product_loop_settings',
        'type'        => 'select',
        'choices'     => array(
            'yes'              => __( 'Yes', 'shopical' ),
            'no' => __( 'No', 'shopical' ),
        ),
    )
);


//=====================================================
//================== Shop Options ===================
//=====================================================

// Shop Section.
$wp_customize->add_section('store_product_shop_page_settings',
    array(
        'title'      => esc_html__('Shop Page', 'shopical'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'woocommerce',
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('store_product_shop_page_row',
    array(
        'default'           => $default['store_product_shop_page_row'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_select',
    )
);

$wp_customize->add_control('store_product_shop_page_row',
    array(
        'label'    => esc_html__('Shop Product Columns', 'shopical'),
        'section'  => 'store_product_shop_page_settings',
        'type'        => 'select',
        'choices'     => array(
            '2' => __( 'Two', 'shopical' ),
            '3' => __( 'Three', 'shopical' ),
            '4' => __( 'Four', 'shopical' ),
            '5' => __( 'Five', 'shopical' ),

        ),
    )
);

/*store_product_search_placeholder*/
$wp_customize->add_setting('store_product_shop_page_product_per_page',
    array(
        'default'           => $default['store_product_shop_page_product_per_page'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('store_product_shop_page_product_per_page',
    array(
        'label'    => esc_html__('Products per Page', 'shopical'),
        'section'  => 'store_product_shop_page_settings',
        'type'     => 'number',
        'priority' => 10,
    )
);




//=====================================================
//================== Product Page Options ===================
//=====================================================
// Shop Section.
$wp_customize->add_section('store_product_page_settings',
    array(
        'title'      => esc_html__('Product Page', 'shopical'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'woocommerce',
    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting('store_product_page_product_zoom',
    array(
        'default'           => $default['store_product_page_product_zoom'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_select',
    )
);

$wp_customize->add_control('store_product_page_product_zoom',
    array(
        'label'    => esc_html__('Enable Product Zoom', 'shopical'),
        'section'  => 'store_product_page_settings',
        'type'        => 'select',
        'choices'     => array(
            'yes'              => __( 'Yes', 'shopical' ),
            'no' => __( 'No', 'shopical' ),
        ),
    )
);



// Setting - show_site_title_section.
$wp_customize->add_setting('store_product_page_related_products',
    array(
        'default'           => $default['store_product_page_related_products'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_select',
    )
);

$wp_customize->add_control('store_product_page_related_products',
    array(
        'label'    => esc_html__('Show Related Products', 'shopical'),
        'section'  => 'store_product_page_settings',
        'type'        => 'select',
        'choices'     => array(
            'yes'              => __( 'Yes', 'shopical' ),
            'no' => __( 'No', 'shopical' ),
        ),
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('store_product_page_related_products_per_row',
    array(
        'default'           => $default['store_product_page_related_products_per_row'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_select',
    )
);

$wp_customize->add_control('store_product_page_related_products_per_row',
    array(
        'label'    => esc_html__('Related Products per Rows', 'shopical'),
        'section'  => 'store_product_page_settings',
        'type'        => 'select',
        'choices'     => array(
            '2' => __( 'Two', 'shopical' ),
            '3' => __( 'Three', 'shopical' ),
            '4' => __( 'Four', 'shopical' ),
            '5' => __( 'Five', 'shopical' ),
        ),
        'active_callback' => 'store_product_page_related_products_status'
    )
);