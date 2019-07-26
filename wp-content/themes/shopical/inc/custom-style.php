<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


/**
 * Customizer
 *
 * @class   shopical
 */

if (!function_exists('shopical_custom_style')) {

    function shopical_custom_style()
    {
        $shopical_background_color = get_background_color();
        $shopical_background_color = '#' . $shopical_background_color;

        $shopical_main_header_background_color = shopical_get_option('main_header_background_color');
        $main_navigation_background_color = shopical_get_option('main_navigation_background_color');
        $main_navigation_link_color = shopical_get_option('main_navigation_link_color');

        ob_start();
        ?>

        <?php if (!empty($shopical_background_color)): ?>
        #sidr,
        .category-dropdown li.aft-category-list > ul
        {
        background-color: <?php echo $shopical_background_color; ?>;

        }

    <?php endif; ?>

        <?php if (!empty($shopical_main_header_background_color)): ?>

        body .desktop-header {
        background-color: <?php echo $shopical_main_header_background_color; ?>;

        }

    <?php endif; ?>


        <?php if (!empty($main_navigation_background_color)): ?>

        .header-style-3-1 .navigation-section-wrapper,
        .header-style-3 .navigation-section-wrapper
        {
        background-color: <?php echo $main_navigation_background_color; ?>;
        }

        @media screen and (max-width: 992em){

        .main-navigation .menu .menu-mobile{
        background-color: <?php echo $main_navigation_background_color; ?>;
        }

        }

    <?php endif; ?>


        <?php if (!empty($main_navigation_link_color)): ?>

        #primary-menu  ul > li > a,
        .main-navigation li a:hover,
        .main-navigation ul.menu > li > a,
        #primary-menu  ul > li > a:visited,
        .main-navigation ul.menu > li > a:visited,
        .main-navigation .menu.menu-mobile > li > a,
        .main-navigation .menu.menu-mobile > li > a:hover,
        .header-style-3-1.header-style-compress .main-navigation .menu ul.menu-desktop > li > a
        {
        color: <?php echo $main_navigation_link_color; ?>;
        }

        .ham,.ham:before, .ham:after
        {
        background-color: <?php echo $main_navigation_link_color; ?>;
        }

        @media screen and (max-width: 992em){

        .main-navigation .menu .menu-mobile li a i:before,
        .main-navigation .menu .menu-mobile li a i:after{
        background-color: <?php echo $main_navigation_link_color; ?>;
        }

        }

    <?php endif; ?>


        <?php
        return ob_get_clean();
    }
}


