<?php
if (!class_exists('Shopical_Store_Offers')) :
    /**
     * Adds Shopical_Store_Offers widget.
     */
    class Shopical_Store_Offers extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array(
                'shopical-store-offers-title',
                'shopical-store-offers-1-image',
                'shopical-store-offers-1-title',
                'shopical-store-offers-1-desc',
                'shopical-store-offers-1-link',
                'shopical-store-offers-2-image',
                'shopical-store-offers-2-title',
                'shopical-store-offers-2-desc',
                'shopical-store-offers-2-link',
                'shopical-store-offers-3-image',
                'shopical-store-offers-3-title',
                'shopical-store-offers-3-desc',
                'shopical-store-offers-3-link'
            );


            $widget_ops = array(
                'classname' => 'shopical_store_offers_widget grid-layout',
                'description' => __('Displays posts carousel from selected category.', 'shopical'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('shopical_store_offers', __('AFTS Store Offers', 'shopical'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {
            $instance = parent::shopical_sanitize_data($instance, $instance);
            /** This filter is documented in wp-includes/default-widgets.php */

            $title = apply_filters('widget_title', $instance['shopical-store-offers-title'], $instance, $this->id_base);


            $offers = array();

            for ($i = 1; $i <= 3; $i++) {
                if (isset($instance['shopical-store-offers-'.$i.'-title']) && !empty($instance['shopical-store-offers-'.$i.'-title']) || isset($instance['shopical-store-offers-'.$i.'-desc']) && !empty($instance['shopical-store-offers-'.$i.'-desc']) || isset($instance['shopical-store-offers-'.$i.'-image']) && !empty($instance['shopical-store-offers-'.$i.'-image'])) {
                    $offers['offers_'.$i.''][] = isset($instance['shopical-store-offers-'.$i.'-image']) ? $instance['shopical-store-offers-'.$i.'-image'] : '';
                    $offers['offers_'.$i.''][] = isset($instance['shopical-store-offers-'.$i.'-title']) ? $instance['shopical-store-offers-'.$i.'-title'] : '';
                    $offers['offers_'.$i.''][] = isset($instance['shopical-store-offers-'.$i.'-desc']) ? $instance['shopical-store-offers-'.$i.'-desc'] : '';
                    $offers['offers_'.$i.''][] = isset($instance['shopical-store-offers-'.$i.'-link']) ? $instance['shopical-store-offers-'.$i.'-link'] : '';
                }
            }




            // open the widget container
            echo $args['before_widget'];
            ?>
            <section class="sale-off-section">
                <div class="container-wrapper">
                    <?php if (!empty($title)): ?>
                        <div class="section-head">
                            <?php if (!empty($title)): ?>
                                <h4 class="widget-title section-title aft-center-align">
                                    <span class="header-after">
                                        <?php echo esc_html($title); ?>
                                    </span>
                                </h4>
                            <?php endif; ?>


                        </div>
                    <?php endif; ?>
                    <div class="support-wrap section-body af-container-row clearfix">
                        <?php if (isset($offers)):
                            $count = count($offers);
                            $col_class = 'col-' . $count;
                            foreach ($offers as $offer):
                                if (isset($offer[0]) && !empty($offer[0])) {
                                    $image_attributes = wp_get_attachment_image_src($offer[0], 'full');
                                    $image_src = $image_attributes[0];
                                    $class = 'data-bg data-bg-hover';

                                } else {
                                    $image_src = '';
                                    $class = 'no-image';
                                }


                                if ((empty($offer[1])) && (empty($offer[2]))) {
                                    $class .= ' no-text';
                                }


                                ?>
                                <div class="<?php echo esc_attr($col_class); ?> float-l pad btm-margi product-ful-wid">
                                    <div class="sale-single-wrap">
                                        <div class="sale-background <?php echo esc_attr($class); ?>"
                                             data-background="<?php echo esc_url($image_src); ?>">
                                            <a href="<?php echo esc_url($offer[3]); ?>"></a>
                                        </div>
                                        <div class="sale-info">
                                            <span class="off-tb">
                                                <span class="off-tc">
                                                    <h4 class="sale-title"><?php echo esc_html($offer[1]); ?></h4>
                                                    <p><?php echo esc_html($offer[2]); ?></p>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </section>

            <?php
            //print_pre($all_posts);

            // close the widget container
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;


            // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
            echo parent::shopical_generate_text_input('shopical-store-offers-title', 'Title', 'Store Offers');

            echo parent::shopical_generate_section_title('shopical-store-offers-1', 'Store Offers 1');
            echo parent::shopical_generate_text_input('shopical-store-offers-1-title', 'Title', 'Sale off 25%');
            echo parent::shopical_generate_image_upload('shopical-store-offers-1-image', 'Background Image', 'Background Image');
            echo parent::shopical_generate_text_input('shopical-store-offers-1-desc', 'Descriptions', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.');
            echo parent::shopical_generate_text_input('shopical-store-offers-1-link', 'Offer Link', '');

            echo parent::shopical_generate_section_title('shopical-store-offers-2', 'Store Offers 2');
            echo parent::shopical_generate_text_input('shopical-store-offers-2-title', 'Title', 'Sale off 35%');
            echo parent::shopical_generate_image_upload('shopical-store-offers-2-image', 'Background Image', 'Background Image');
            echo parent::shopical_generate_text_input('shopical-store-offers-2-desc', 'Descriptions', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.');
            echo parent::shopical_generate_text_input('shopical-store-offers-2-link', 'Offer Link', '');

            echo parent::shopical_generate_section_title('shopical-store-offers-3', 'Store Offers 3');
            echo parent::shopical_generate_text_input('shopical-store-offers-3-title', 'Title', 'Sale off 55%');
            echo parent::shopical_generate_image_upload('shopical-store-offers-3-image', 'Background Image', 'Background Image');
            echo parent::shopical_generate_text_input('shopical-store-offers-3-desc', 'Descriptions', 'Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.');
            echo parent::shopical_generate_text_input('shopical-store-offers-3-link', 'Offer Link', '');


        }
    }
endif;