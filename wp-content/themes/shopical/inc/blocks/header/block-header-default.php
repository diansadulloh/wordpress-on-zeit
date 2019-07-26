<?php
/**
 * Block Header .
 *
 * @package Shopical
 */
?>

<div class="header-style-3 header-style-default">
    <div class="desktop-header clearfix">
        <?php
        $class = '';
        $background = '';
        if (has_header_image()) {
            $class = 'data-bg';
            $background = get_header_image();
        }

        ?>
        <div class="aft-header-background  <?php echo esc_attr($class); ?>"
             data-background="<?php echo esc_attr($background); ?>">
            <div class="container-wrapper">

                <div class="header-left-part">
                    <div class="logo-brand">
                        <div class="site-branding">
                            <?php
                            the_custom_logo();
                            if (is_front_page() && is_home()) :
                                ?>
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                          rel="home"><?php bloginfo('name'); ?></a></h1>
                            <?php
                            else :
                                ?>
                                <h3 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                          rel="home"><?php bloginfo('name'); ?></a></h3>
                            <?php
                            endif;
                            $shopical_description = get_bloginfo('description', 'display');
                            if ($shopical_description || is_customize_preview()) :
                                ?>
                                <p class="site-description"><?php echo $shopical_description; /* WPCS: xss ok. */ ?></p>
                            <?php endif; ?>
                        </div><!-- .site-branding -->
                    </div>

                    <div class="search">
                        <?php shopical_product_search_form(); ?>

                    </div>

                    <?php if (class_exists('WooCommerce')): ?>
                        <?php $aft_enable_minicart = shopical_get_option('aft_enable_minicart');
                        if ($aft_enable_minicart == true): ?>
                            <div class="cart-shop">

                                <div class="af-cart-wrapper dropdown">
                                    <?php shopical_woocommerce_header_cart(); ?>
                                </div>

                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php
                    if (class_exists('WooCommerce')):
                        shopical_language_and_currency_switcher();
                    endif;
                    ?>


                </div>
            </div>
        </div>
        <div id="site-primary-navigation" class="navigation-section-wrapper clearfix">
            <div class="container-wrapper">
                <div class="header-middle-part">
                    <div class="navigation-container">

                        <nav id="site-navigation" class="main-navigation">
                            <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                                <span class="screen-reader-text">
                                    <?php esc_html_e('Primary Menu', 'shopical'); ?></span>
                                 <i class="ham"></i>
                            </span>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'aft-primary-nav',
                                'menu_id' => 'primary-menu',
                                'container' => 'div',
                                'container_class' => 'menu main-menu'
                            ));
                            ?>
                        </nav><!-- #site-navigation -->

                    </div>
                </div>
                <div class="header-right-part">

                    <?php if (class_exists('WooCommerce')): ?>
                        <?php $aft_enable_minicart = shopical_get_option('aft_enable_minicart');
                        if ($aft_enable_minicart == true): ?>
                            <div class="cart-shop aft-show-on-scroll">

                                <div class="af-cart-wrapper dropdown">
                                    <?php shopical_woocommerce_header_cart(); ?>
                                </div>

                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="search aft-show-on-mobile">
                        <div id="myOverlay" class="overlay">
                            <span class="close-serach-form" title="Close Overlay">x</span>
                            <div class="overlay-content">
                                <?php shopical_product_search_form(); ?>
                            </div>
                        </div>
                        <button class="open-search-form"><i class="fa fa-search"></i></button>
                    </div>


                    <div class="account-user">

                        <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                            <!--  my account --> <i class="fa fa-user-circle-o"></i>
                        </a>
                        <?php
                        if (class_exists('WooCommerce')):
                            shopical_my_account_dropdown();
                        endif;
                        ?>


                    </div>
                    <?php if (function_exists('YITH_WCWL')): ?>
                        <div class="wishlist-shop">
                            <span class="wishlist-icon">
                                <?php shopical_woocommerce_header_wishlist(); ?>
                            </span>
                        </div>
                    <?php endif; ?>


                    <?php
                    $show_offcanvas = true;
                    if (is_active_sidebar('express-off-canvas-panel')): ?>
                        <div class="express-off-canvas-panel">
                                <span class="offcanvas">
                                     <a href="#offcanvasCollapse" class="offcanvas-nav">
                                          <div class="offcanvas-menu">
                                               <span class="mbtn-top"></span>
                                               <span class="mbtn-mid"></span>
                                               <span class="mbtn-bot"></span>
                                           </div>
                                       </a>
                                </span>
                        </div>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</div>
