<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shopical
 */

?>


</div>

<?php if (is_active_sidebar('express-off-canvas-panel')) : ?>
    <div id="sidr" class="primary-background">
        <a class="sidr-class-sidr-button-close" href="#sidr-nav"><i class="fa fa-window-close-o primary-footer" aria-hidden="true"></i></a>
        <?php dynamic_sidebar('express-off-canvas-panel'); ?>
    </div>
<?php endif; ?>

<section class="above-footer section">
    <?php
    if ( is_active_sidebar( 'above-footer-section' ) ) {
        dynamic_sidebar( 'above-footer-section' );
    }
    ?>
</section>



<footer class="site-footer">
    <?php $shopical_footer_widgets_number = shopical_get_option('number_of_footer_widget');
    if (1 == $shopical_footer_widgets_number) {
        $col = 'col-md-12';
    } elseif (2 == $shopical_footer_widgets_number) {
        $col = 'col-md-6';
    } elseif (3 == $shopical_footer_widgets_number) {
        $col = 'col-md-4';
    } else {
        $col = 'col-md-4';
    } ?>
    <?php if (is_active_sidebar( 'footer-first-widgets-section') || is_active_sidebar( 'footer-second-widgets-section') || is_active_sidebar( 'footer-third-widgets-section') || is_active_sidebar( 'footer-fourth-widgets-section')) : ?>
        <div class="primary-footer">
            <div class="container-wrapper">
                            <?php if (is_active_sidebar( 'footer-first-widgets-section') ) : ?>
                                <div class="primary-footer-area footer-first-widgets-section <?php echo esc_attr($col); ?> col-sm-12">
                                    <section class="widget-area">
                                        <?php dynamic_sidebar('footer-first-widgets-section'); ?>
                                    </section>
                                </div>
                            <?php endif; ?>

                            <?php if (is_active_sidebar( 'footer-second-widgets-section') ) : ?>
                                <div class="primary-footer-area footer-second-widgets-section <?php echo esc_attr($col); ?>  col-sm-12">
                                    <section class="widget-area">
                                        <?php dynamic_sidebar('footer-second-widgets-section'); ?>
                                    </section>
                                </div>
                            <?php endif; ?>

                            <?php if (is_active_sidebar( 'footer-third-widgets-section') ) : ?>
                                <div class="primary-footer-area footer-third-widgets-section <?php echo esc_attr($col); ?>  col-sm-12">
                                    <section class="widget-area">
                                        <?php dynamic_sidebar('footer-third-widgets-section'); ?>
                                    </section>
                                </div>
                            <?php endif; ?>
                            <?php if (is_active_sidebar( 'footer-fourth-widgets-section') ) : ?>
                                <div class="primary-footer-area footer-fourth-widgets-section <?php echo esc_attr($col); ?>  col-sm-12">
                                    <section class="widget-area">
                                        <?php dynamic_sidebar('footer-fourth-widgets-section'); ?>
                                    </section>
                                </div>
                            <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(1 != shopical_get_option('hide_footer_menu_section')): ?>
        <?php

        if (has_nav_menu( 'aft-footer-nav' ) || has_nav_menu( 'aft-social-nav' )):
            $class = 'single-align-c';
            if ((has_nav_menu( 'aft-footer-nav' ) && has_nav_menu( 'aft-social-nav' )) ){
                $class = 'col-2 float-l';
            }

            ?>
            <div class="secondary-footer">
                <div class="container-wrapper">
                        <?php if (has_nav_menu( 'aft-footer-nav' )): ?>
                            <div class="<?php echo esc_attr($class); ?>">
                                <div class="footer-nav-wrapper">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'aft-footer-nav',
                                        'menu_id' => 'footer-menu',
                                        'depth' => 1,
                                        'container' => 'div',
                                        'container_class' => 'footer-navigation'
                                    )); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (has_nav_menu( 'aft-social-nav' )): ?>
                            <div class="<?php echo esc_attr($class); ?>">
                                <div class="footer-social-wrapper">
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
                                </div>
                            </div>
                        <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="site-info">
        <div class="container-wrapper">
            <div class="site-info-wrap">

                <?php
                $shopical_secure_payment_badge = shopical_get_option('secure_payment_badge');
                $shopical_copy_right = shopical_get_option('footer_copyright_text');

                $class = 'single-align-c';
                if (!empty($shopical_secure_payment_badge) && !empty( $shopical_copy_right ) ){
                    $class = 'col-2 float-l';
                } ?>

                <div class="<?php echo esc_attr($class); ?>">
                    <?php  ?>
                    <?php if (!empty($shopical_copy_right)): ?>
                        <?php echo esc_html($shopical_copy_right); ?>
                    <?php endif; ?>
                    <?php $shopical_theme_credits = shopical_get_option('hide_footer_copyright_credits'); ?>
                    <?php if ($shopical_theme_credits != 1): ?>
                        <span class="sep"> | </span>
                        <?php
                        /* translators: 1: Theme name, 2: Theme author. */
                        printf(esc_html__('%1$s by %2$s.', 'shopical'), '<a href="https://afthemes.com/products/shopical/">Shopical</a>', 'AF themes');
                        ?>
                    <?php endif; ?>
                </div>

                <?php
                if (!empty($shopical_secure_payment_badge)):
                    $shopical_secure_payment_badge = absint($shopical_secure_payment_badge);
                    $shopical_secure_payment_badge = wp_get_attachment_image($shopical_secure_payment_badge, 'full');

                    $shopical_secure_payment_badge_url = shopical_get_option('secure_payment_badge_url');
                    $shopical_secure_payment_badge_url = isset($shopical_secure_payment_badge_url) ? esc_url($shopical_secure_payment_badge_url) : '#';


                    ?>
                    <div class="<?php echo esc_attr($class); ?>">
                        <a href="<?php echo esc_url($shopical_secure_payment_badge_url); ?>">
                            <?php echo $shopical_secure_payment_badge; ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
</div>

<a id="scroll-up" class="secondary-color right-side">
    <i class="fa fa-angle-up"></i>
</a>
<?php wp_footer(); ?>

</body>
</html>
