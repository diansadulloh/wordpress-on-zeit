<?php
/**
 * Recommended plugins
 *
 * @package CoverNews
 */

if ( ! function_exists( 'shopical_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function shopical_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'WooCommerce', 'shopical' ),
                'slug'     => 'woocommerce',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Contact Form 7', 'shopical' ),
                'slug'     => 'contact-form-7',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'shopical' ),
                'slug'     => 'yith-woocommerce-wishlist',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'YITH WooCommerce Quick View', 'shopical' ),
                'slug'     => 'yith-woocommerce-quick-view',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'YITH WooCommerce Compare', 'shopical' ),
                'slug'     => 'yith-woocommerce-compare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'WooCommerce Currency Switcher', 'shopical' ),
                'slug'     => 'woocommerce-currency-switcher',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Woo Total Sales', 'shopical' ),
                'slug'     => 'woo-total-sales',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Woo Set Price Note', 'shopical' ),
                'slug'     => 'woo-set-price-note',
                'required' => false,
            ),

            array(
                'name'     => esc_html__( 'WP Post Author', 'shopical' ),
                'slug'     => 'wp-post-author',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'shopical' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
            array(
                'name'     => __( 'MailChimp for WordPress', 'shopical' ),
                'slug'     => 'mailchimp-for-wp',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'shopical_recommended_plugins' );
