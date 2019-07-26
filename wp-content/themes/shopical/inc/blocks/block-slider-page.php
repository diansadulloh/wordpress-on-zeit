<?php
/**
 * Block Product Carousel support.
 *
 * @package Shopical
 */
?>
<?php

$page_ids = array();
$caption_class = array();
$button_text = array();
$button_link = array();

for ($i = 0; $i <= 5; $i++) {
    $slider_page = shopical_get_option('slider_page_' . $i);
    if (!empty($slider_page)) {
        $page_ids[] = $slider_page;
        $caption_class[] = shopical_get_option('page_caption_position_' . $i);
        $button_text[] = shopical_get_option('button_text_' . $i);
        $button_link[] = shopical_get_option('button_link_' . $i);
    }
}

if ($page_ids):
    $all_posts = shopical_get_pages($page_ids);
    ?>
    <?php if ($all_posts->have_posts()): ?>
    <?php
    $boxed = false;
    $slider_class = 'main-banner-slider-single';
    if ($boxed) {
        $slider_class = 'main-banner-slider-center';
    }

    $thumbnail_size = 'shopical-medium-center';
    $frontpage_main_banner_layout = shopical_get_option('frontpage_main_banner_layout');
    if (($frontpage_main_banner_layout == 'main-banner-style-2') || ($frontpage_main_banner_layout == 'main-banner-style-3') || ($frontpage_main_banner_layout == 'main-banner-style-4')) {
        $thumbnail_size = 'shopical-slider-full';
    } else {
        $thumbnail_size = 'shopical-medium-center';
    }

    ?>
    <div class="<?php echo esc_attr($slider_class); ?> main-banner-slider aft-slider owl-carousel owl-theme">
        <?php
        $count = 0;
        while ($all_posts->have_posts()): $all_posts->the_post();
            $url = shopical_get_featured_image(get_the_ID(), $thumbnail_size);

            ?>
            <div class="item">
                <div class="item-single data-bg data-bg-hover data-bg-slide"
                     data-background="<?php echo esc_url($url); ?>">
                    <div class="pos-rel">
                        <div class="content-caption-overlay-shine"><span></span></div>
                        <div class="content-caption-overlay"></div>
                        <div class="content-caption on-<?php echo esc_attr($caption_class[$count]); ?>">
                            <div class="caption-heading">
                                <h3 class="cap-title">
                                    <a href="<?php echo esc_url($button_link[$count]); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                            </div>
                            <div class="content-desc">
                                <?php the_content(); ?>
                            </div>
                            <?php if ($button_link[$count]): ?>
                                <div class="aft-btn-warpper btn-style1">
                                    <a href="<?php echo esc_url($button_link[$count]); ?>"><?php echo esc_html($button_text[$count]); ?></a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            $count++;
        endwhile;

        ?>
    </div>
<?php endif; ?>
<?php endif; ?>