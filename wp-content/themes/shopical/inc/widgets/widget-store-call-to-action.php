<?php
if (!class_exists('Shopical_Store_Call_to_Action')) :
    /**
     * Adds Shopical_Store_Call_to_Action widget.
     */
    class Shopical_Store_Call_to_Action extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('shopical-call-to-action-title', 'shopical-call-to-action-subtitle', 'shopical-call-to-action-background-image', 'shopical-call-to-action-date', 'shopical-call-to-action-button-text', 'shopical-call-to-action-button-url', 'shopical-call-to-action-message');


            $widget_ops = array(
                'classname' => 'shopical_store_call_to_action_widget grid-layout',
                'description' => __('Displays posts carousel from selected category.', 'shopical'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('shopical_store_call_to_action', __('AFTS Call to Action', 'shopical'), $widget_ops);
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

            $title = apply_filters('widget_title', $instance['shopical-call-to-action-title'], $instance, $this->id_base);
            $subtitle = isset($instance['shopical-call-to-action-subtitle']) ? $instance['shopical-call-to-action-subtitle'] : '';
            $background_image = isset($instance['shopical-call-to-action-background-image']) ? $instance['shopical-call-to-action-background-image'] : '';

            if ($background_image) {
                $image_attributes = wp_get_attachment_image_src($background_image, 'full');
                $image_src = $image_attributes[0];
                $image_class = 'data-bg data-bg-hover';

            } else {
                $image_src = '';
                $image_class = 'no-bg';
            }

            $button_text = isset($instance['shopical-call-to-action-button-text']) ? $instance['shopical-call-to-action-button-text'] : '';
            $button_url = isset($instance['shopical-call-to-action-button-url']) ? $instance['shopical-call-to-action-button-url'] : '';


            // open the widget container
            echo $args['before_widget'];
            ?>
            <section class="call-to-action <?php echo esc_attr($image_class); ?> aft-fixed-background"
                     data-background="<?php echo esc_url($image_src); ?>">
                <div class="container-wrapper">
                    <?php if (!empty($title)): ?>
                        <div class="section-head">
                            <?php if (!empty($title)): ?>
                                <h4 class="widget-title section-title">
                                    <span class="header-after">
                                        <?php echo esc_html($title); ?>
                                    </span>
                                </h4>
                            <?php endif; ?>
                            <?php if (!empty($subtitle)): ?>
                                <span class="section-subtitle">
                                    <?php echo esc_html($subtitle); ?>
                                </span>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                    <div class="inner-call-to-action">
                        <div class="suscribe">
                            <div class="offer-main">
                                <?php if (!empty($button_url)): ?>
                                    <span class="offer-time btn-style1">
                                    <a href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_text); ?></a>
                                </span>
                                <?php endif; ?>
                            </div>

                        </div>
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
            echo parent::shopical_generate_text_input('shopical-call-to-action-title', 'Title', 'Call to Action');
            echo parent::shopical_generate_text_input('shopical-call-to-action-subtitle', 'Subtitle', 'Call to Action Subtitle');
            echo parent::shopical_generate_image_upload('shopical-call-to-action-background-image', __('Background Image', 'shopical'), __('Background Image', 'shopical'));
            echo parent::shopical_generate_text_input('shopical-call-to-action-button-text', 'Button Text', 'Read More');
            echo parent::shopical_generate_text_input('shopical-call-to-action-button-url', 'Button Link', '');


        }
    }
endif;