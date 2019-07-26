<?php
if (!class_exists('Shopical_Store_Features')) :
    /**
     * Adds Shopical_Store_Features widget.
     */
    class Shopical_Store_Features extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array(
                'shopical-store-features-title',
                'shopical-store-features-title-note',
                'shopical-store-features-1-icon',
                'shopical-store-features-1-title',
                'shopical-store-features-1-desc',
                'shopical-store-features-2-icon',
                'shopical-store-features-2-title',
                'shopical-store-features-2-desc',
                'shopical-store-features-3-icon',
                'shopical-store-features-3-title',
                'shopical-store-features-3-desc',
            );

            $widget_ops = array(
                'classname' => 'shopical_store_features_widget grid-layout aft-tertiary-background-color',
                'description' => __('Displays store features and facilities.', 'shopical'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('shopical_store_features', __('AFTS Store Features and Facilities', 'shopical'), $widget_ops);
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

            $title = apply_filters('widget_title', $instance['shopical-store-features-title'], $instance, $this->id_base);
            $title_note = isset($instance['shopical-store-features-title-note']) ? $instance['shopical-store-features-title-note'] : '';

            $features = array();

            for ($i = 1; $i <= 3; $i++) {
                if (isset($instance['shopical-store-features-' . $i . '-title']) && !empty($instance['shopical-store-features-' . $i . '-title'])) {
                    $features['features_' . $i . ''][] = isset($instance['shopical-store-features-' . $i . '-icon']) ? $instance['shopical-store-features-' . $i . '-icon'] : '';
                    $features['features_' . $i . ''][] = isset($instance['shopical-store-features-' . $i . '-title']) ? $instance['shopical-store-features-' . $i . '-title'] : '';
                    $features['features_' . $i . ''][] = isset($instance['shopical-store-features-' . $i . '-desc']) ? $instance['shopical-store-features-' . $i . '-desc'] : '';
                }
            }

            // open the widget container
            echo $args['before_widget'];
            ?>
            <section class="customer-support">
                <div class="container-wrapper">
                    <?php if (!empty($title)): ?>
                        <div class="section-head">
                            <?php if (!empty($title)): ?>
                                <h4 class="widget-title section-title aft-center-align">
                                    <?php shopical_widget_title_section($title, $title_note); ?>
                                </h4>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                    <div class="support-wrap section-body clearfix">
                        <?php if (isset($features)):
                            $col = count($features);
                            $col_class = 'col-' . $col;
                            $count = 1;
                            foreach ($features as $feature):

                                ?>
                                <div class="<?php echo esc_attr($col_class); ?> float-l singlewrap pad-15">
                                    <div class="suport-single clearfix">
                                        <?php if(!empty($feature[0])): ?>
                                        <div class="icon-box">
                                                       <span class="icon-box-circle icon-box-circle-color-<?php echo esc_attr($count); ?>">
                                                           <i class="<?php echo esc_attr($feature[0]); ?>"></i>
                                                       </span>
                                        </div>
                                        <?php endif; ?>
                                        <div class="support-content pad">
                                            <h5><?php echo esc_html($feature[1]); ?></h5>
                                            <p><?php echo esc_html($feature[2]); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $count++;
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
             echo parent::shopical_generate_text_input('shopical-store-features-title', 'Title', 'Store Features and Facilities');
            echo parent::shopical_generate_text_input('shopical-store-features-title-note', 'Title Note', '');
            echo parent::shopical_generate_section_title('shopical-store-features-1', 'Store Features 1');
            echo parent::shopical_generate_text_input('shopical-store-features-1-icon', 'Icon', 'fa fa-paper-plane');
            echo parent::shopical_generate_text_input('shopical-store-features-1-title', 'Title', 'Free Shipping');
            echo parent::shopical_generate_text_input('shopical-store-features-1-desc', 'Descriptions', 'On all orders over $75.00');
            echo parent::shopical_generate_section_title('shopical-store-features-2', 'Store Features 2');
            echo parent::shopical_generate_text_input('shopical-store-features-2-icon', 'Icon', 'fa fa-gift');
            echo parent::shopical_generate_text_input('shopical-store-features-2-title', 'Title', 'Get Discount');
            echo parent::shopical_generate_text_input('shopical-store-features-2-desc', 'Descriptions', 'Get Coupon & Discount');
            echo parent::shopical_generate_section_title('shopical-store-features-3', 'Store Features 3');
            echo parent::shopical_generate_text_input('shopical-store-features-3-icon', 'Icon', 'fa fa-life-ring');
            echo parent::shopical_generate_text_input('shopical-store-features-3-title', 'Title', '24/7 Suport');
            echo parent::shopical_generate_text_input('shopical-store-features-3-desc', 'Descriptions', 'We will be at your service');

        }
    }
endif;