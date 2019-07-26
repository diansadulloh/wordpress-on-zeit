<?php

/**
 * Option Panel
 *
 * @package Shopical
 */

$default = shopical_get_default_theme_options();
/*theme option panel info*/
require get_template_directory().'/inc/customizer/theme-options-frontpage.php';

//contact page options
require get_template_directory().'/inc/customizer/theme-options-contacts.php';

//woocommerce options
require get_template_directory().'/inc/customizer/theme-options-woocommerce.php';


// Add Theme Options Panel.
$wp_customize->add_panel('theme_option_panel',
	array(
		'title'      => esc_html__('Theme Options', 'shopical'),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);


// Preloader Section.
$wp_customize->add_section('site_preloader_settings',
    array(
        'title'      => esc_html__('Preloader Options', 'shopical'),
        'priority'   => 4,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

// Setting - preloader.
$wp_customize->add_setting('enable_site_preloader',
    array(
        'default'           => $default['enable_site_preloader'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_checkbox',
    )
);

$wp_customize->add_control('enable_site_preloader',
    array(
        'label'    => esc_html__('Enable preloader', 'shopical'),
        'section'  => 'site_preloader_settings',
        'type'     => 'checkbox',
        'priority' => 10,
    )
);


/**
 * Header section
 *
 * @package Shopical
 */

// Frontpage Section.
$wp_customize->add_section('top_header_options_settings',
	array(
		'title'      => esc_html__('Top Header Options', 'shopical'),
		'priority'   => 49,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);


// Setting - show_site_title_section.
$wp_customize->add_setting('show_top_header',
    array(
        'default'           => $default['show_top_header'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_top_header',
    array(
        'label'    => esc_html__('Show Top Header', 'shopical'),
        'section'  => 'top_header_options_settings',
        'type'     => 'checkbox',
        'priority' => 5,

    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting('show_top_header_store_contacts',
    array(
        'default'           => $default['show_top_header_store_contacts'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_top_header_store_contacts',
    array(
        'label'    => esc_html__('Show Store Address and Contacts', 'shopical'),
        'section'  => 'top_header_options_settings',
        'type'     => 'checkbox',
        'priority' => 10,
        'active_callback' => 'shopical_top_header_status'
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('show_top_header_social_contacts',
    array(
        'default'           => $default['show_top_header_social_contacts'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_checkbox',
    )
);

$wp_customize->add_control('show_top_header_social_contacts',
    array(
        'label'    => esc_html__('Show Social Menu', 'shopical'),
        'section'  => 'top_header_options_settings',
        'type'     => 'checkbox',
        'priority' => 10,
        'active_callback' => 'shopical_top_header_status'
    )
);

// Frontpage Section.
$wp_customize->add_section('header_options_settings',
    array(
        'title'      => esc_html__('Header Options', 'shopical'),
        'priority'   => 49,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);



// Setting - sticky_header_option.
$wp_customize->add_setting('disable_sticky_header_option',
    array(
        'default'           => $default['disable_sticky_header_option'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_checkbox',
    )
);
$wp_customize->add_control('disable_sticky_header_option',
    array(
        'label'    => esc_html__('Disable Sticky Header', 'shopical'),
        'section'  => 'header_options_settings',
        'type'     => 'checkbox',
        'priority' => 10,

    )
);




/**
 * Layout options section
 *
 * @package Shopical
 */

// Layout Section.
$wp_customize->add_section('site_layout_settings',
    array(
        'title'      => esc_html__('Global Layout Options', 'shopical'),
        'priority'   => 9,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('global_content_alignment',
    array(
        'default'           => $default['global_content_alignment'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_select',
    )
);

$wp_customize->add_control( 'global_content_alignment',
    array(
        'label'       => esc_html__('Global Content Alignment', 'shopical'),
        'description' => esc_html__('Select global content alignment', 'shopical'),
        'section'     => 'site_layout_settings',
        'type'        => 'select',
        'choices'               => array(
            'align-content-left' => esc_html__( 'Content - Primary Sidebar', 'shopical' ),
            'align-content-right' => esc_html__( 'Primary Sidebar - Content', 'shopical' ),
            'full-width-content' => esc_html__( 'Full Width Content', 'shopical' )
        ),
        'priority'    => 130,
    ));

//========= secure payment icon option
// Advertisement Section.
$wp_customize->add_section('secure_payment_badge_settings',
    array(
        'title'      => esc_html__('Secure Payment Badge Options', 'shopical'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);



// Setting banner_advertisement_section.
$wp_customize->add_setting('secure_payment_badge',
    array(
        'default'           => $default['secure_payment_badge'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control($wp_customize, 'secure_payment_badge',
        array(
            'label'       => esc_html__('Banner Section Advertisement', 'shopical'),
            'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'shopical'), 600, 190),
            'section'     => 'secure_payment_badge_settings',
            'width' => 600,
            'height' => 190,
            'flex_width' => true,
            'flex_height' => true,
            'priority'    => 120,
        )
    )
);




//========== footer scroll to top options ===============

// Footer Section.
$wp_customize->add_section('site_scroll_to_top_settings',
    array(
        'title'      => esc_html__('Scroll to Top', 'shopical'),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

// Setting number_of_footer_widget.
$wp_customize->add_setting('footer_scroll_to_top_position',
    array(
        'default'           => $default['footer_scroll_to_top_position'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_select',
    )
);


$wp_customize->add_control('footer_scroll_to_top_position',
    array(
        'label'    => esc_html__('Select Position', 'shopical'),
        'section'  => 'site_scroll_to_top_settings',
        'type'     => 'select',
        'priority' => 100,
        'choices'  => array(
            'right-side'        => esc_html__('Right', 'shopical'),
            'left-side' => esc_html__('Left', 'shopical'),

        ),

    )
);



//========== footer section options ===============
// Footer Section.
$wp_customize->add_section('site_footer_settings',
    array(
        'title'      => esc_html__('Footer Options', 'shopical'),
        'priority'   => 50,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

// Setting - global content alignment of news.
$wp_customize->add_setting('footer_copyright_text',
    array(
        'default'           => $default['footer_copyright_text'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control( 'footer_copyright_text',
    array(
        'label'    => __( 'Copyright Text', 'shopical' ),
        'section'  => 'site_footer_settings',
        'type'     => 'text',
        'priority' => 50,
    )
);







//Navigation Color Details
//Slide Details
$wp_customize->add_setting('main_navigation_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Shopical_Section_Title(
        $wp_customize,
        'main_navigation_section_title',
        array(
            'label' 			=> esc_html__( 'Main Navigation Color Section ', 'shopical' ),
            'section' 			=> 'header_options_settings',
            'priority' 			=> 100,
        )
    )
);


// Setting - slider_caption_bg_color.
$wp_customize->add_setting('main_navigation_background_color',
    array(
        'default'           => $default['main_navigation_background_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'main_navigation_background_color',
        array(
            'label'    => esc_html__('Background Color', 'shopical'),
            'section'  => 'header_options_settings',
            'type'     => 'color',
            'priority' => 100,
        )
    )
);

// Setting - slider_caption_bg_color.
$wp_customize->add_setting('main_navigation_link_color',
    array(
        'default'           => $default['main_navigation_link_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'main_navigation_link_color',
        array(
            'label'    => esc_html__('Menu Item Color', 'shopical'),
            'section'  => 'header_options_settings',
            'type'     => 'color',
            'priority' => 100,
        )
    )
);

