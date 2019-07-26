<?php

/**
 * Font and Color Option Panel
 *
 * @package Shopical
 */

$default = shopical_get_default_theme_options();




// Setting - show_site_title_section.
$wp_customize->add_setting('top_header_background_color',
    array(
        'default'           => $default['top_header_background_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'top_header_background_color',
        array(
            'label'      => esc_html__( 'Background Color', 'shopical' ),
            'section'    => 'top_header_options_settings',
            'settings'   => 'top_header_background_color',
            'priority' => 100,
            'active_callback' => 'shopical_top_header_status'
        )
    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting('top_header_text_color',
    array(
        'default'           => $default['top_header_text_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'top_header_text_color',
        array(
            'label'      => esc_html__( 'Texts Color', 'shopical' ),
            'section'    => 'top_header_options_settings',
            'settings'   => 'top_header_text_color',
            'priority' => 100,
            'active_callback' => 'shopical_top_header_status'
        )
    )
);

//Slide Details
$wp_customize->add_setting('general_color_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Shopical_Section_Title(
        $wp_customize,
        'general_color_section_title',
        array(
            'label' 			=> esc_html__( 'General Color Section ', 'shopical' ),
            'section' 			=> 'colors',
            'priority' 			=> 5,
        )
    )
);


// Setting - primary_color.
$wp_customize->add_setting('primary_color',
    array(
    'default'           => $default['primary_color'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'primary_color',
        array(
            'label'    => esc_html__('Primary Color', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 5,
        )
    )
);

// Setting - secondary_color.
$wp_customize->add_setting('secondary_color',
    array(
        'default'           => $default['secondary_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_color',
        array(
            'label'    => esc_html__('Secondary Color', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 5,
        )
    )
);


// Setting - secondary_color.
$wp_customize->add_setting('link_color',
    array(
        'default'           => $default['link_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'link_color',
        array(
            'label'    => esc_html__('General Link Color', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 5,
        )
    )
);


// Setting - slider_caption_bg_color.
$wp_customize->add_setting('global_badge_background',
    array(
        'default'           => $default['global_badge_background'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'global_badge_background',
        array(
            'label'    => esc_html__('Badge Background Color', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 5,
        )
    )
);

// Setting - slider_caption_bg_color.
$wp_customize->add_setting('global_badge_color',
    array(
        'default'           => $default['global_badge_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'global_badge_color',
        array(
            'label'    => esc_html__('Badge Texts Color', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 5,
        )
    )
);

//Slide Details
$wp_customize->add_setting('background_color_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Shopical_Section_Title(
        $wp_customize,
        'background_color_section_title',
        array(
            'label' 			=> esc_html__( 'Background Color Section ', 'shopical' ),
            'section' 			=> 'colors',
            'priority' 			=> 5,
        )
    )
);


// Setting - secondary_color.
$wp_customize->add_setting('secondary_background_color',
    array(
        'default'           => $default['secondary_background_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_background_color',
        array(
            'label'    => esc_html__('Secondary Background Color', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 10,
        )
    )
);

// Setting - secondary_color.
$wp_customize->add_setting('tertiary_background_color',
    array(
        'default'           => $default['tertiary_background_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'tertiary_background_color',
        array(
            'label'    => esc_html__('Tertiary Background Color', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 10,
        )
    )
);

//Navigation Color Details
//Slide Details
$wp_customize->add_setting('main_navigation_badge_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Shopical_Section_Title(
        $wp_customize,
        'main_navigation_badge_section_title',
        array(
            'label' 			=> esc_html__( 'Main Navigation Badge Color Section ', 'shopical' ),
            'section' 			=> 'header_options_settings',
            'priority' 			=> 100,
        )
    )
);

// Setting - slider_caption_bg_color.
$wp_customize->add_setting('menu_badge_background',
    array(
        'default'           => $default['menu_badge_background'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'menu_badge_background',
        array(
            'label'    => esc_html__('Background Color', 'shopical'),
            'section'  => 'header_options_settings',
            'type'     => 'color',
            'priority' => 100,
        )
    )
);

// Setting - slider_caption_bg_color.
$wp_customize->add_setting('menu_badge_color',
    array(
        'default'           => $default['menu_badge_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'menu_badge_color',
        array(
            'label'    => esc_html__('Texts Color', 'shopical'),
            'section'  => 'header_options_settings',
            'type'     => 'color',
            'priority' => 100,
        )
    )
);

//Slide Details
$wp_customize->add_setting('title_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Shopical_Section_Title(
        $wp_customize,
        'title_section_title',
        array(
            'label' 			=> esc_html__( 'Title Section ', 'shopical' ),
            'section' 			=> 'colors',
            'priority' 			=> 100,
        )
    )
);

// Setting - primary_color.
$wp_customize->add_setting('primary_title_color',
    array(
        'default'           => $default['primary_title_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'primary_title_color',
        array(
            'label'    => esc_html__('Primary Title Color', 'shopical'),
            'description' => esc_html__('Single page, posts, products, section title', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 100,
        )
    )
);

// Setting - primary_color.
$wp_customize->add_setting('secondary_title_color',
    array(
        'default'           => $default['secondary_title_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_title_color',
        array(
            'label'    => esc_html__('Secondary Title Color', 'shopical'),
            'description' => esc_html__('Secondary titles under main section', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 100,
        )
    )
);

// Setting - primary_color.
$wp_customize->add_setting('tertiary_title_color',
    array(
        'default'           => $default['tertiary_title_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'tertiary_title_color',
        array(
            'label'    => esc_html__('Tertiary Title Color', 'shopical'),
            'description' => esc_html__('Titles over image', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 100,
        )
    )
);


//Slide Details
$wp_customize->add_setting('border_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Shopical_Section_Title(
        $wp_customize,
        'border_section_title',
        array(
            'label' 			=> esc_html__( 'Border Color Section ', 'shopical' ),
            'section' 			=> 'colors',
            'priority' 			=> 100,
        )
    )
);

// Setting - primary_color.
$wp_customize->add_setting('primary_border_color',
    array(
        'default'           => $default['primary_border_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'primary_border_color',
        array(
            'label'    => esc_html__('Primary Border Color', 'shopical'),
            //'description' => esc_html__('Single page, posts, products, section title', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 100,
        )
    )
);




// Setting - primary_color.
$wp_customize->add_setting('secondary_border_color',
    array(
        'default'           => $default['secondary_border_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_border_color',
        array(
            'label'    => esc_html__('Secondary Border Color', 'shopical'),
            //'description' => esc_html__('Secondary titles under main section', 'shopical'),
            'section'  => 'colors',
            'type'     => 'color',
            'priority' => 100,
        )
    )
);



//Slide Details
$wp_customize->add_setting('preloader_color_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Shopical_Section_Title(
        $wp_customize,
        'preloader_color_section_title',
        array(
            'label' 			=> esc_html__( 'Preloader Color Section ', 'shopical' ),
            'section' 			=> 'site_preloader_settings',
            'priority' 			=> 100,
        )
    )
);

// Setting - slider_caption_bg_color.
$wp_customize->add_setting('site_preloader_background',
    array(
        'default'           => $default['site_preloader_background'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'site_preloader_background',
        array(
            'label'    => esc_html__('Backgound Color', 'shopical'),
            'section'  => 'site_preloader_settings',
            'type'     => 'color',
            'priority' => 100,
        )
    )
);

// Setting - slider_caption_bg_color.
$wp_customize->add_setting('site_preloader_spinner_color',
    array(
        'default'           => $default['site_preloader_spinner_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(

    new WP_Customize_Color_Control(
        $wp_customize,
        'site_preloader_spinner_color',
        array(
            'label'    => esc_html__('Spinner Color', 'shopical'),
            'section'  => 'site_preloader_settings',
            'type'     => 'color',
            'priority' => 100,
        )
    )
);




//Slide Details
$wp_customize->add_setting('primary_footer_color_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Shopical_Section_Title(
        $wp_customize,
        'primary_footer_color_section_title',
        array(
            'label' 			=> esc_html__( 'Primary Footer Color Section ', 'shopical' ),
            'section' 			=> 'site_footer_settings',
            'priority' 			=> 100,
        )
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('primary_footer_background_color',
    array(
        'default'           => $default['primary_footer_background_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'primary_footer_background_color',
        array(
            'label'      => esc_html__( 'Background Color', 'shopical' ),
            'section'    => 'site_footer_settings',
            'settings'   => 'primary_footer_background_color',
            'priority' => 100,

        )
    )
);


// Setting - show_site_title_section.
$wp_customize->add_setting('primary_footer_texts_color',
    array(
        'default'           => $default['primary_footer_texts_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'primary_footer_texts_color',
        array(
            'label'      => esc_html__( 'Texts Color', 'shopical' ),
            'section'    => 'site_footer_settings',
            'settings'   => 'primary_footer_texts_color',
            'priority' => 100,

        )
    )
);


//Slide Details
$wp_customize->add_setting('secondary_footer_color_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Shopical_Section_Title(
        $wp_customize,
        'secondary_footer_color_section_title',
        array(
            'label' 			=> esc_html__( 'Secondary Footer Color Section ', 'shopical' ),
            'section' 			=> 'site_footer_settings',
            'priority' 			=> 100,
        )
    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting('secondary_footer_background_color',
    array(
        'default'           => $default['secondary_footer_background_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_footer_background_color',
        array(
            'label'      => esc_html__( 'Background Color', 'shopical' ),
            'section'    => 'site_footer_settings',
            'settings'   => 'secondary_footer_background_color',
            'priority' => 100,

        )
    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting('secondary_footer_texts_color',
    array(
        'default'           => $default['secondary_footer_texts_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_footer_texts_color',
        array(
            'label'      => esc_html__( 'Texts Color', 'shopical' ),
            'section'    => 'site_footer_settings',
            'settings'   => 'secondary_footer_texts_color',
            'priority' => 100,

        )
    )
);


//Slide Details
$wp_customize->add_setting('footer_credit_color_section_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Shopical_Section_Title(
        $wp_customize,
        'footer_credit_color_section_title',
        array(
            'label' 			=> esc_html__( 'Footer credits Color Section ', 'shopical' ),
            'section' 			=> 'site_footer_settings',
            'priority' 			=> 100,
        )
    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting('footer_credits_background_color',
    array(
        'default'           => $default['footer_credits_background_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'footer_credits_background_color',
        array(
            'label'      => esc_html__( 'Background color', 'shopical' ),
            'section'    => 'site_footer_settings',
            'settings'   => 'footer_credits_background_color',
            'priority' => 100,

        )
    )
);

// Setting - show_site_title_section.
$wp_customize->add_setting('footer_credits_texts_color',
    array(
        'default'           => $default['footer_credits_texts_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'footer_credits_texts_color',
        array(
            'label'      => esc_html__( 'Texts Color', 'shopical' ),
            'section'    => 'site_footer_settings',
            'settings'   => 'footer_credits_texts_color',
            'priority' => 100,

        )
    )
);


//============= Font Options ===================
// font Section.
$wp_customize->add_section('font_typo_section',
    array(
        'title'      => esc_html__('Fonts & Typography Options', 'shopical'),
        'priority'   => 10,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

global $shopical_google_fonts;





// Setting - primary_font.
$wp_customize->add_setting('primary_font',
    array(
        'default'           => $default['primary_font'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_select',
    )
);
$wp_customize->add_control('primary_font',
    array(
        'label'    => esc_html__('Primary Font', 'shopical'),
        'section'  => 'font_typo_section',
        'type'     => 'select',
        'choices'  => $shopical_google_fonts,
        'priority' => 100,
    )
);

// Setting - secondary_font.
$wp_customize->add_setting('secondary_font',
    array(
        'default'           => $default['secondary_font'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'shopical_sanitize_select',
    )
);
$wp_customize->add_control('secondary_font',
    array(
        'label'    => esc_html__('Secondary Font', 'shopical'),
        'section'  => 'font_typo_section',
        'type'     => 'select',
        'choices'  => $shopical_google_fonts,
        'priority' => 110,
    )
);

// Setting - secondary_font.
$wp_customize->add_setting('letter_spacing',
    array(
        'default'           => $default['letter_spacing'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('letter_spacing',
    array(
        'label'    => esc_html__('Global Letter Spacing', 'shopical'),
        'section'  => 'font_typo_section',
        'type'     => 'number',
        'priority' => 110,
    )
);

// Setting - secondary_font.
$wp_customize->add_setting('line_height',
    array(
        'default'           => $default['line_height'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('line_height',
    array(
        'label'    => esc_html__('Global Line height', 'shopical'),
        'section'  => 'font_typo_section',
        'type'     => 'number',
        'priority' => 110,
    )
);

// Setting - secondary_font.
$wp_customize->add_setting('font_weight',
    array(
        'default'           => $default['font_weight'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('font_weight',
    array(
        'label'    => esc_html__('Global font weight', 'shopical'),
        'section'  => 'font_typo_section',
        'type'     => 'number',
        'priority' => 110,
    )
);


// Setting - secondary_font.
$wp_customize->add_setting('main_banner_silder_caption_font_size',
    array(
        'default'           => $default['main_banner_silder_caption_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('main_banner_silder_caption_font_size',
    array(
        'label'    => esc_html__('Main Banner Slider Caption Size', 'shopical'),
        'section'  => 'font_typo_section',
        'type'     => 'number',
        'priority' => 110,
    )
);


// Setting - secondary_font.
$wp_customize->add_setting('shopical_primary_title_font_size',
    array(
        'default'           => $default['shopical_primary_title_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('shopical_primary_title_font_size',
    array(
        'label'    => esc_html__('Primary Title Size', 'shopical'),
        'description' => esc_html__('Size for Page,Posts,Archive,Product,Content Widgets,etc', 'shopical'),
        'section'  => 'font_typo_section',
        'type'     => 'number',
        'priority' => 110,
    )
);


// Setting - secondary_font.
$wp_customize->add_setting('shopical_secondary_title_font_size',
    array(
        'default'           => $default['shopical_secondary_title_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('shopical_secondary_title_font_size',
    array(
        'label'    => esc_html__('Secondary Title Size', 'shopical'),
        'description' => esc_html__('Size for Page,Posts,Product,Categories,etc loop and list', 'shopical'),
        'section'  => 'font_typo_section',
        'type'     => 'number',
        'priority' => 110,
    )
);

// Setting - secondary_font.
$wp_customize->add_setting('shopical_tertiary_title_font_size',
    array(
        'default'           => $default['shopical_tertiary_title_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('shopical_tertiary_title_font_size',
    array(
        'label'    => esc_html__('Tertiary Title Size', 'shopical'),
        'section'  => 'font_typo_section',
        'type'     => 'number',
        'priority' => 110,
    )
);