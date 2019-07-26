<?php
if (!class_exists('Shopical_Posts_Latest')) :
    /**
     * Adds Shopical_Posts_Latest widget.
     */
    class Shopical_Posts_Latest extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('shopical-posts-latest-title', 'shopical-posts-latest-subtitle', 'shopical-number-of-items');

            $this->select_fields = array('shopical-show-excerpt', 'shopical-select-category', 'shopical-show-all-link');

            $widget_ops = array(
                'classname' => 'posts_latest_widget aft-tertiary-background-color',
                'description' => __('Displays latest posts lists from selected category.', 'shopical'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('product_posts_latest', __('AFTS Latest Posts', 'shopical'), $widget_ops);
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
            $title = apply_filters('widget_title', $instance['shopical-posts-latest-title'], $instance, $this->id_base);
            $category = isset($instance['shopical-select-category']) ? $instance['shopical-select-category'] : '0';

            $number_of_items = '4';
            // open the widget container
            echo $args['before_widget'];
            ?>
            <section class="blog">
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


                        </div>
                    <?php endif; ?>
                    <div class="blog-wrapper section-body ">
                        <div class="af-container-row clearfix">
                            <?php
                            $all_posts = shopical_get_posts($number_of_items, $category);
                            if ($all_posts->have_posts()) :
                                while ($all_posts->have_posts()) : $all_posts->the_post();
                                    if (has_post_thumbnail()) {
                                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'shopical-medium-square');
                                        $url = $thumb['0'];
                                    } else {
                                        $url = '';
                                    }
                                    global $post;

                                    ?>
                                    <div class="col-4 float-l pad half-post-wid" data-mh="latest-post-loop">
                                        <div class="blog-single">
                                            <div class="blog-img">
                                                <a href="<?php the_permalink(); ?>">
                                            <span class="data-bg data-bg-hover post-image"
                                                  data-background="<?php echo esc_url($url); ?>">
                                                <span class="view-blog"></span>
                                            </span>
                                                </a>
                                                <span class="item-metadata posts-date">
                                                    <?php the_time( get_option( 'date_format' ) ); ?>
                                                 </span>
                                            </div>
                                            <div class="blog-details">
                                                <div class="blog-categories">
                                                    <?php echo shopical_post_format($post->ID); ?>
                                                    <?php shopical_post_categories('&nbsp', 'category'); ?>
                                                </div>
                                                <div class="blog-title">
                                                    <h4>
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h4>
                                                </div>
                                                <div class="entry-meta">
                                                    <?php
                                                    shopical_posted_by();
                                                    ?>
                                                </div><!-- .entry-meta -->
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>

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

            $options = array(
                'false' => __('No', 'shopical'),
                'true' => __('Yes', 'shopical'),

            );


            // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry

            $categories = shopical_get_terms('category');
            // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
            echo parent::shopical_generate_text_input('shopical-posts-latest-title', __('Title', 'shopical'), __('Latest Posts', 'shopical'));
            echo parent::shopical_generate_select_options('shopical-select-category', __('Select category', 'shopical'), $categories);



        }
    }
endif;