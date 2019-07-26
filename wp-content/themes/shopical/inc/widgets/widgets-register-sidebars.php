<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shopical_widgets_init()
{

//    register_sidebar(array(
//        'name' => esc_html__('Above Top Header Section', 'shopical'),
//        'id' => 'above-top-header-section',
//        'description' => esc_html__('Add widgets for above top header section.', 'shopical'),
//        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
//        'after_widget' => '</div>',
//        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
//        'after_title' => '</span></h2>',
//    ));

    register_sidebar(array(
        'name' => esc_html__('Off-canvas Panel', 'shopical'),
        'id' => 'express-off-canvas-panel',
        'description' => esc_html__('Add widgets for off-canvas panel.', 'shopical'),
        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));

//    register_sidebar(array(
//        'name' => esc_html__('Above Banner Section', 'shopical'),
//        'id' => 'above-banner-section',
//        'description' => esc_html__('Add widgets for off-canvas panel.', 'shopical'),
//        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
//        'after_widget' => '</div>',
//        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
//        'after_title' => '</span></h2>',
//    ));


    register_sidebar(array(
        'name' => esc_html__('Advertisement Section', 'shopical'),
        'id' => 'advertisement-section',
        'description' => esc_html__('Add widgets for advertisement panel.', 'shopical'),
        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Static Frontpage Section', 'shopical'),
        'id' => 'frontpage-content-widgets',
        'description' => esc_html__('Add widgets to front-page contents section.', 'shopical'),
        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title"><span>',
        'after_title' => '</span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Shop Sidebar', 'shopical'),
        'id' => 'shop-sidebar-widgets',
        'description' => esc_html__('Add widgets to shop sidebar section.', 'shopical'),
        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'shopical'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets for main sidebar.', 'shopical'),
        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));


//    register_sidebar(array(
//        'name' => esc_html__('Contact Page Section', 'shopical'),
//        'id' => 'contact-page-widgets',
//        'description' => esc_html__('Add widgets to contact page lower section.', 'shopical'),
//        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
//        'after_widget' => '</div>',
//        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
//        'after_title' => '</span></h2>',
//    ));

//    register_sidebar(array(
//        'name' => esc_html__('Above Footer Section', 'shopical'),
//        'id' => 'above-footer-section',
//        'description' => esc_html__('Add widgets to above footer section.', 'shopical'),
//        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
//        'after_widget' => '</div>',
//        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
//        'after_title' => '</span></h2>',
//    ));


    register_sidebar(array(
        'name' => esc_html__('Footer First Section', 'shopical'),
        'id' => 'footer-first-widgets-section',
        'description' => esc_html__('Displays items on footer first column.', 'shopical'),
        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));


    register_sidebar(array(
        'name' => esc_html__('Footer Second Section', 'shopical'),
        'id' => 'footer-second-widgets-section',
        'description' => esc_html__('Displays items on footer second column.', 'shopical'),
        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Third Section', 'shopical'),
        'id' => 'footer-third-widgets-section',
        'description' => esc_html__('Displays items on footer third column.', 'shopical'),
        'before_widget' => '<div id="%1$s" class="widget shopical-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="header-after">',
        'after_title' => '</span></h2>',
    ));

}

add_action('widgets_init', 'shopical_widgets_init');