<?php
if (!class_exists('Shopical_Products_Tabbed')) :
    /**
     * Adds Shopical_Products_Tabbed widget.
     */
    class Shopical_Products_Tabbed extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('shopical-tabbed-product-title', 'shopical-tabbed-product-subtitle', 'shopical-tabbed-product-title-note', 'shopical-number-of-items');
            $this->select_fields = array('shopical-select-category-1', 'shopical-select-category-2', 'shopical-select-category-3');

            $widget_ops = array(
                'classname' => 'shopical_tabbed_products_carousel_widget grid-layout',
                'description' => __('Displays products tabbed carousel from selected categories.', 'shopical'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('shopical_posts_carousel', __('AFTS Product Carousel Tabbed', 'shopical'), $widget_ops);
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
            $tab_id = 'tabbed-' . $this->number;

            $title = apply_filters('widget_title', $instance['shopical-tabbed-product-title'], $instance, $this->id_base);

            //$subtitle = isset($instance['shopical-tabbed-product-subtitle']) ? $instance['shopical-tabbed-product-subtitle'] : 'Tabbed Products Carousel Subtitle';
            $title_note = isset($instance['shopical-tabbed-product-title-note']) ? $instance['shopical-tabbed-product-title-note'] : '';
            $category_1 = isset($instance['shopical-select-category-1']) ? $instance['shopical-select-category-1'] : 0;
            $category_2 = isset($instance['shopical-select-category-2']) ? $instance['shopical-select-category-2'] : 0;
            $category_3 = isset($instance['shopical-select-category-3']) ? $instance['shopical-select-category-3'] : 0;
            $number_of_items = '6';


            $categories = array();
            if (absint($category_1) > 0) {
                $categories[] = $category_1;
            }

            if (absint($category_2) > 0) {
                $categories[] = $category_2;
            }

            if (absint($category_3) > 0) {
                $categories[] = $category_3;
            }

            // open the widget container
            echo $args['before_widget'];
            ?>
            <section class="products">
            <div class="container-wrapper">
            <?php if (!empty($title)): ?>
            <div class="section-head">
                <?php if (!empty($title)): ?>
                    <h4 class="widget-title section-title">
                        <?php shopical_widget_title_section($title, $title_note); ?>
                    </h4>
                <?php endif; ?>


            </div>
        <?php endif; ?>
            <?php if (isset($categories)): ?>
                <div class="section-body">
            <div class="tabbed-head">
            <ul class="nav nav-tabs af-tabs tab-warpper" role="tablist">
            <?php
            $count = 1;
            foreach ($categories as $category):
                $category_by_id = get_term_by('id', $category, 'product_cat');

            if($category_by_id):
            $category_title = $category_by_id->name;
                $class = ($count == 1) ? 'active' : '';
                ?>

                <li class="tab tab-first <?php echo esc_attr($class); ?>">
                    <a href="#<?php echo esc_attr($tab_id); ?>-carousel-<?php echo esc_attr($count); ?>"
                       aria-controls="<?php echo esc_attr($category_title); ?>" role="tab"
                       data-toggle="tab" class="font-family-1">
                        <?php echo esc_html($category_title); ?>
                    </a>
                </li>
<?php
            $count++;
            endif;
            endforeach; ?>

                </ul>
                </div>
                <div class="tab-content">
                        <?php
                        $count = 1;
                        foreach ($categories as $category):
                            $all_posts = shopical_get_products($number_of_items, $category);
                            $class = ($count == 1) ? 'active' : '';
                            ?>
                            <div id="<?php echo esc_attr($tab_id); ?>-carousel-<?php echo esc_attr($count); ?>"
                                 role="tabpanel"
                                 class="tab-pane product-section-wrapper <?php echo esc_attr($class); ?>">
                                    <ul class="product-ul aft-carousel tabbed-product-carousel owl-carousel owl-theme">
                                        <?php
                                        if ($all_posts->have_posts()) :
                                            while ($all_posts->have_posts()): $all_posts->the_post();
                                                ?>
                                                <li class="item">
                                                    <?php shopical_get_block('default', 'product-loop'); ?>
                                                </li>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </ul>
                            </div>
                            <?php
                            $count++;
                        endforeach; ?>
                        <!--  First tab ends-->
                    </div>
                    </div>

                    <?php endif; ?>




                </div>

                </section>
                <?php

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
            $categories = shopical_get_terms('product_cat');
            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::shopical_generate_text_input('shopical-tabbed-product-title', 'Title', 'Tabbed Products Carousel');
                //echo parent::shopical_generate_text_input('shopical-tabbed-product-subtitle', 'Subtitle', 'Tabbed Products Carousel Subtitle');
                echo parent::shopical_generate_text_input('shopical-tabbed-product-title-note', 'Title Note', '');
                echo parent::shopical_generate_select_options('shopical-select-category-1', __('Select category 1', 'shopical'), $categories);
                echo parent::shopical_generate_select_options('shopical-select-category-2', __('Select category 2', 'shopical'), $categories);
                echo parent::shopical_generate_select_options('shopical-select-category-3', __('Select category 3', 'shopical'), $categories);



            }
        }
    }
endif;