<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shopical
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$enable_preloader = shopical_get_option('enable_site_preloader');
if (1 == $enable_preloader):
    ?>
    <div id="af-preloader">
        <div class="af-spinner-container">
            <div class="af-spinners">
                <div class="af-spinner af-spinner-01">
                    <div class="af-spinner af-spinner-02">
                        <div class="af-spinner af-spinner-03"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'shopical'); ?></a>

    <header id="masthead" class="site-header">
        <?php
        $show_top_header = shopical_get_option('show_top_header');
        $show_top_header_store_contacts = shopical_get_option('show_top_header_store_contacts');
        $show_top_header_social_contacts = shopical_get_option('show_top_header_social_contacts');

        if ($show_top_header):
            ?>
            <div class="top-header">
                <div class="container-wrapper">
                    <div class="top-bar-flex">
                        <?php
                        if ($show_top_header_store_contacts):

                            $store_contact_address = shopical_get_option('store_contact_address');
                            $store_contact_phone = shopical_get_option('store_contact_phone');
                            $store_contact_email = shopical_get_option('store_contact_email');
                            $store_contact_hours = shopical_get_option('store_contact_hours');
                            ?>
                            <div class="top-bar-left  col-60">
                                <ul class="top-bar-menu">
                                    <?php if (!empty($store_contact_address)): ?>
                                        <li>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span><?php echo esc_html($store_contact_address); ?></span>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($store_contact_phone)): ?>
                                        <li>
                                            <i class="fa fa-phone-square" aria-hidden="true"></i>
                                            <a href="tel:<?php echo esc_html($store_contact_phone); ?>">
                                                <?php echo esc_html($store_contact_phone); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($store_contact_email)): ?>
                                        <li>
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <a href="mailto:<?php echo esc_html($store_contact_email); ?>"><?php echo esc_html($store_contact_email); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($store_contact_hours)): ?>
                                        <li>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <span><?php echo esc_html($store_contact_hours); ?></span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="top-bar-right col-40 ">

                                <span class="aft-small-menu">


                                <?php if (has_nav_menu('aft-top-nav')) {

                                    wp_nav_menu(array(
                                        'theme_location' => 'aft-top-nav',
                                        'menu_id' => 'top-menu',
                                        'depth' => 1,
                                        'container' => 'div',
                                        'container_class' => 'top-navigation'
                                    ));
                                }

                                ?>
                                 </span>
                            <?php if ($show_top_header_social_contacts): ?>
                                <span class="aft-small-social-menu">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'aft-social-nav',
                                    'link_before' => '<span class="screen-reader-text">',
                                    'link_after' => '</span>',
                                    'menu_id' => 'social-menu',
                                    'container' => 'div',
                                    'container_class' => 'social-navigation'
                                ));
                                ?>
                                </span>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
        $header_style = shopical_get_option('header_layout');

        shopical_get_block('default', 'header');


        ?>
    </header><!-- #masthead -->
    <div class="shopical-woocommerce-store-notice">
        <?php
        if (class_exists('WooCommerce')) {
            woocommerce_demo_store();
        }
        ?>
    </div>


    <section class="above-banner-section container-wrapper">
        <?php
        

$advertisement_scope = shopical_get_option('banner_advertisement_scope');
if($advertisement_scope == 'front-page-only' ){
    if(is_front_page() || is_home()){
        shopical_get_block('above-banner');
    }
}else{
        shopical_get_block('above-banner');
    }
        ?>
    </section>

    <?php if (is_front_page()): ?>
        <?php if (class_exists('WooCommerce')) : ?>

            <?php

            $show_main_banner_section = shopical_get_option('show_main_banner_section');
            if ($show_main_banner_section):

                $show_latest_product_section = shopical_get_option('show_latest_product_section');
                if ($show_latest_product_section):

                    ?>
                    <section
                            class="latest-product-section product-section-wrapper section-body container-wrapper aft-product-list-mode">
                        <?php
                        shopical_get_block('latest-product', 'section');
                        ?>
                    </section>


                <?php endif; ?>

                <section class="main-banner-section-wrapper container-wrapper">
                    <?php shopical_get_block('1', 'main-banner'); ?>
                </section>
            <?php endif; ?>


            <div class="aft-tertiary-background-color">

                <?php

                $show_store_features_section = shopical_get_option('show_store_features_section');
                if ($show_store_features_section):

                    ?>
                    <section class="customer-support">
                        <?php
                        shopical_get_block('store-features', 'section');
                        ?>
                    </section>

                <?php endif; ?>

                <?php

                $show_featured_categories_section = shopical_get_option('show_featured_categories_section');
                if ($show_featured_categories_section):

                    ?>

                    <section class="featured-categories-section container-wrapper">
                        <?php
                        shopical_get_block('featured-categories', 'section');
                        ?>

                    </section>
                <?php endif; ?>


            </div>

        <?php endif; ?>
    <?php endif; ?>

    <?php
    $container_class = (is_page_template('tmpl-front-page.php')) ? '' : 'container-wrapper';
    ?>

    <div id="content" class="site-content <?php echo esc_attr($container_class); ?>">

        <?php echo do_action('shopical_before_main_content'); ?>

