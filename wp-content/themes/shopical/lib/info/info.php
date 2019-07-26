<?php
/**
 * Info setup
 *
 * @package Shopical
 */

if ( ! function_exists( 'shopical_details_setup' ) ) :

    /**
     * Info setup.
     *
     * @since 1.0.0
     */
    function shopical_details_setup() {

        $config = array(

            // Welcome content.
            'welcome-texts' => sprintf( esc_html__( 'Howdy %1$s, we would like to thank you for installing and activating %2$s theme for your precious site. All of the features provided by the theme are now ready to use; Here, we have gathered all of the essential details and helpful links for you and your better experience with %2$s. Once again, Thanks for using our theme!', 'shopical' ), get_bloginfo('name'), 'Shopical' ),

            // Tabs.
            'tabs' => array(
                'getting-started' => esc_html__( 'Getting Started', 'shopical' ),
                'support'         => esc_html__( 'Support', 'shopical' ),
                'useful-plugins'  => esc_html__( 'Useful Plugins', 'shopical' ),
                'demo-content'    => esc_html__( 'Demo Content', 'shopical' ),
                'free-vs-pro'    => esc_html__( 'Free vs Pro', 'shopical' ),
                'upgrade-to-pro'  => esc_html__( 'Upgrade to Pro', 'shopical' ),
            ),

            // Quick links.
            'quick_links' => array(
                'theme_url' => array(
                    'text' => esc_html__( 'Theme Details', 'shopical' ),
                    'url'  => 'https://afthemes.com/products/shopical/',
                ),
                'demo_url' => array(
                    'text' => esc_html__( 'View Demo', 'shopical' ),
                    'url'  => 'https://afthemes.com/shopical-advanced-ecommerce-wordpress-free-theme-for-woocommerce/',
                ),
                'documentation_url' => array(
                    'text' => esc_html__( 'View Documentation', 'shopical' ),
                    'url'  => 'https://docs.afthemes.com/shopical/',
                ),
                'rating_url' => array(
                    'text' => esc_html__( 'Rate This Theme','shopical' ),
                    'url'  => 'https://wordpress.org/support/theme/shopical/reviews/#new-post',
                ),
            ),

            // Getting started.
            'getting_started' => array(
                'one' => array(
                    'title'       => esc_html__( 'Theme Documentation', 'shopical' ),
                    'icon'        => 'dashicons dashicons-format-aside',
                    'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'shopical' ),
                    'button_text' => esc_html__( 'View Documentation', 'shopical' ),
                    'button_url'  => 'https://docs.afthemes.com/shopical/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
                'two' => array(
                    'title'       => esc_html__( 'Static Front Page', 'shopical' ),
                    'icon'        => 'dashicons dashicons-admin-generic',
                    'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page.', 'shopical' ),
                    'button_text' => esc_html__( 'Static Front Page', 'shopical' ),
                    'button_url'  => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
                    'button_type' => 'primary',
                ),
                'three' => array(
                    'title'       => esc_html__( 'Theme Options', 'shopical' ),
                    'icon'        => 'dashicons dashicons-admin-customizer',
                    'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'shopical' ),
                    'button_text' => esc_html__( 'Customize', 'shopical' ),
                    'button_url'  => wp_customize_url(),
                    'button_type' => 'primary',
                ),
                'four' => array(
                    'title'       => esc_html__( 'Widgets', 'shopical' ),
                    'icon'        => 'dashicons dashicons-welcome-widgets-menus',
                    'description' => esc_html__( 'Theme uses Wedgets API for widget options. Using the Widgets you can easily customize different aspects of the theme.', 'shopical' ),
                    'button_text' => esc_html__( 'Widgets', 'shopical' ),
                    'button_url'  => admin_url('widgets.php'),
                    'button_type' => 'primary',
                ),
                'five' => array(
                    'title'       => esc_html__( 'Demo Content', 'shopical' ),
                    'icon'        => 'dashicons dashicons-layout',
                    'description' => sprintf( esc_html__( 'To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'shopical' ), esc_html__( 'One Click Demo Import', 'shopical' ) ),
                    'button_text' => esc_html__( 'Demo Content', 'shopical' ),
                    'button_url'  => admin_url( 'themes.php?page=shopical-details&tab=demo-content' ),
                    'button_type' => 'secondary',
                ),
                'six' => array(
                    'title'       => esc_html__( 'Theme Preview', 'shopical' ),
                    'icon'        => 'dashicons dashicons-welcome-view-site',
                    'description' => esc_html__( 'You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized.', 'shopical' ),
                    'button_text' => esc_html__( 'View Demo', 'shopical' ),
                    'button_url'  => 'https://afthemes.com/shopical-advanced-ecommerce-wordpress-free-theme-for-woocommerce/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
            ),

            // Support.
            'support' => array(
                'one' => array(
                    'title'       => esc_html__( 'Contact Support', 'shopical' ),
                    'icon'        => 'dashicons dashicons-sos',
                    'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'shopical' ),
                    'button_text' => esc_html__( 'Contact Support', 'shopical' ),
                    'button_url'  => 'https://wordpress.org/support/theme/shopical/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
                'two' => array(
                    'title'       => esc_html__( 'Theme Documentation', 'shopical' ),
                    'icon'        => 'dashicons dashicons-format-aside',
                    'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'shopical' ),
                    'button_text' => esc_html__( 'View Documentation', 'shopical' ),
                    'button_url'  => 'https://docs.afthemes.com/shopical/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
                'three' => array(
                    'title'       => esc_html__( 'Child Theme', 'shopical' ),
                    'icon'        => 'dashicons dashicons-admin-tools',
                    'description' => esc_html__( 'For advanced theme customization, it is recommended to use child theme rather than modifying the theme file itself. Using this approach, you wont lose the customization after theme update.', 'shopical' ),
                    'button_text' => esc_html__( 'Learn More', 'shopical' ),
                    'button_url'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
            ),

            //Useful plugins.
            'useful_plugins' => array(
                'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'shopical' ),
            ),

            //Demo content.
            'demo_content' => array(
                'description' => sprintf( esc_html__( 'To import demo content for this theme, %1$s plugin is needed. Please make sure plugin is installed and activated. After plugin is activated, you will see Import Demo Data menu under Appearance.', 'shopical' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'shopical' ) . '</a>' ),
            ),

            //Free vs Pro.
            'free_vs_pro' => array(

                'features' => array(
                    'Live editing in Customizer' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Typography Style and Colors' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Preloader Option' => array('Basic', 'Advanced'),
                    'Header Options' => array('Default', '4 Header Options (Default, Express, Centered, Compressed)'),
                    'Logo and title customization' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Banner Advertisements' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Product Search Autocomplete' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Popular Tags' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Minicart Options' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Minicart Controls' => array('Basic', 'Advanced'),
                    'Language/Currency Switcher' => array('1 Shortcode Field', '2 Shortcode Fields'),
                    'Contact Options' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Contact Page Template' => array('Basic', 'Advanced'),
                    'Main Banner Options' => array('Page Slider', 'Page Slider, Product Slider'),
                    'Banner Layouts' => array('Default', '5 Main Banner Layouts with advanced controls'),
                    'Top Category Section' => array('Categories Lists', '3 Layout Options (Plain Categories Lists, Nested Categories Lists, Categories with Sub-categories/Products Mega list)'),
                    'Featured Section Options' => array('Store Features/Facilities and Featured Categories Sections', 'Store Features/Facilities, Featured Categories, Offers display, Featured Products and On-sale Product Sections'),
                    'Widgets Areas' => array('Main Sidebar, Static Frontpage Section, Off-Canvas Panel, Shop Sidebar and Footer Widgets Sections', 'Main Sidebar, Above Top Menu Bar, Off-Canvas Panel, Above Main Banner, Advertisement Section, Static Frontpage Section, Shop Sidebar, Contact Page Section, Above Footer Section, Footer Widgets Sections'),
                    'Custom Widgets' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Number of Custom Widgets' => array('10+ Available', '23+ Available'),
                    'Custom Widgets Controls' => array('Basic', 'Advanced'),
                    'Product Carousel Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Product Grid Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Product List Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Product Express List Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Product Category Grid Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Product Slider Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Product Tabbed Carousel' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Product Latest Reviews Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Store Contacts Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Store Social Contacts Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Store Features Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Store Brands Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Store Call to Action Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Store Offers Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Store FAQ Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Store Testimonial Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Store MailChimp Subscriptions Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Store Intagram Carousel Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Store Youtube Video Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Latest Posts Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Tabbed Posts Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Widget Section Title Note/Badge' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Product Loop Toggle Categories' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Edit Sale Texts' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Edit Add to Cart Texts' => array('Simple', 'Simple, Variable, Grouped, External'),
                    'Edit Single Add to Cart Texts' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Shop Product Loop Column Options' => array('No', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Shop Product Loop Product Perpage' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Shop Toggle Product Loop Sorting' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Single Product Related Products' => array('Basic', 'Advanced'),
                    'Single Product Zoom Options' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Single Product Gallery Thumbnails Columns' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Single Product Toggle Review Tab' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Footer Widgets Section' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Hide Theme Credit Link' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Secure Payment Icon/Badge Option' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Responsive Layout' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Translations Ready' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'SEO' => array('Optimized', 'Optimized'),
                    'Support' => array('Yes', 'High Priority Dedicated Support')
                ),
            ),

            // Upgrade content.
            'upgrade_to_pro' => array(
                'description' => esc_html__( 'If you want more advanced features then you can upgrade to the premium version of the theme.', 'shopical' ),
                'button_text' => esc_html__( 'Upgrade Now', 'shopical' ),
                'button_url'  => 'https://afthemes.com/products/shopical-pro',
                'button_type' => 'primary',
                'is_new_tab'  => true,
            ),
        );

        Shopical_Info::init( $config );
    }

endif;

add_action( 'after_setup_theme', 'shopical_details_setup' );