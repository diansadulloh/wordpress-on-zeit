<?php
if (!class_exists('Shopical_Store_Author_Info')) :
    /**
     * Adds Shopical_Store_Author_Info widget.
     */
    class Shopical_Store_Author_Info extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('shopical-author-info-title', 'shopical-author-info-subtitle', 'shopical-author-info-image', 'shopical-author-info-name', 'shopical-author-info-desc', 'shopical-author-info-phone', 'shopical-author-info-email');
            $this->url_fields = array('shopical-author-info-facebook', 'shopical-author-info-twitter', 'shopical-author-info-linkedin', 'shopical-author-info-instagram', 'shopical-author-info-vk', 'shopical-author-info-youtube');

            $widget_ops = array(
                'classname' => 'shopical_author_info_widget',
                'description' => __('Displays author info.', 'shopical'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('shopical_author_info', __('AFTS Author Info', 'shopical'), $widget_ops);
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
            echo $args['before_widget'];
            $title = apply_filters('widget_title', $instance['shopical-author-info-title'], $instance, $this->id_base);
            $subtitle = isset($instance['shopical-author-info-subtitle']) ? ($instance['shopical-author-info-subtitle']) : '';
            $profile_image = isset($instance['shopical-author-info-image']) ? ($instance['shopical-author-info-image']) : '';

            if ($profile_image) {
                $image_attributes = wp_get_attachment_image_src($profile_image, 'large');
                $image_src = $image_attributes[0];
                $image_class = 'data-bg data-bg-hover';

            } else {
                $image_src = '';
                $image_class = 'no-bg';
            }

            $name = isset($instance['shopical-author-info-name']) ? ($instance['shopical-author-info-name']) : '';

            $desc = isset($instance['shopical-author-info-desc']) ? ($instance['shopical-author-info-desc']) : '';
            $facebook = isset($instance['shopical-author-info-facebook']) ? ($instance['shopical-author-info-facebook']) : '';
            $twitter = isset($instance['shopical-author-info-twitter']) ? ($instance['shopical-author-info-twitter']) : '';
            $linkedin = isset($instance['shopical-author-info-linkedin']) ? ($instance['shopical-author-info-linkedin']) : '';
            $youtube = isset($instance['shopical-author-info-youtube']) ? ($instance['shopical-author-info-youtube']) : '';
            $instagram = isset($instance['shopical-author-info-instagram']) ? ($instance['shopical-author-info-instagram']) : '';
            $vk = isset($instance['shopical-author-info-vk']) ? ($instance['shopical-author-info-vk']) : '';

            ?>
            <section class="products">
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
                    <div class="posts-author-wrapper">

                        <?php if (!empty($image_src)) : ?>
                            <figure class="em-author-img <?php echo esc_attr($image_class); ?>"
                                    data-background="<?php echo esc_url($image_src); ?>">

                            </figure>
                        <?php endif; ?>
                        <div class="em-author-details">
                            <?php if (!empty($name)) : ?>
                                <h4 class="em-author-display-name"><?php echo esc_html($name); ?></h4>
                            <?php endif; ?>
                            <?php if (!empty($phone)) : ?>
                                <a href="tel:<?php echo esc_attr($phone); ?>"
                                   class="em-author-display-phone"><?php echo esc_html($phone); ?></a>
                            <?php endif; ?>
                            <?php if (!empty($email)) : ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>"
                                   class="em-author-display-email"><?php echo esc_html($email); ?></a>
                            <?php endif; ?>
                            <?php if (!empty($desc)) : ?>
                                <p class="em-author-display-name"><?php echo esc_html($desc); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($facebook) || !empty($twitter) || !empty($linkedin)) : ?>
                                <div class="social-navigation">
                                    <ul>
                                        <?php if (!empty($facebook)) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($facebook); ?>" target="_blank"></a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (!empty($youtube)) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($youtube); ?>" target="_blank"></a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (!empty($instagram)) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($instagram); ?>" target="_blank"></a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (!empty($twitter)) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($twitter); ?>" target="_blank"></a>
                                            </li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            //print_pre($all_posts);
            // close the widget container
            echo $args['after_widget'];

            //$instance = parent::shopical_sanitize_data( $instance, $instance );


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
            $categories = shopical_get_terms();
            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::shopical_generate_text_input('shopical-author-info-title', __('About Store', 'shopical'), __('Title', 'shopical'));
                echo parent::shopical_generate_text_input('shopical-author-info-subtitle', __('About Store Subtitle', 'shopical'), __('Subtitle', 'shopical'));
                echo parent::shopical_generate_image_upload('shopical-author-info-image', __('Profile image', 'shopical'), __('Profile image', 'shopical'));
                echo parent::shopical_generate_text_input('shopical-author-info-name', __('Name', 'shopical'), __('Name', 'shopical'));
                echo parent::shopical_generate_text_input('shopical-author-info-desc', __('Descriptions', 'shopical'), '');
                echo parent::shopical_generate_text_input('shopical-author-info-facebook', __('Facebook', 'shopical'), '');
                echo parent::shopical_generate_text_input('shopical-author-info-instagram', __('Instagram', 'shopical'), '');
                echo parent::shopical_generate_text_input('shopical-author-info-youtube', __('Youtube', 'shopical'), '');
                echo parent::shopical_generate_text_input('shopical-author-info-twitter', __('Twitter', 'shopical'), '');



            }
        }
    }
endif;