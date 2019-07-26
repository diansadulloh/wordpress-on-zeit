<?php
/**
 * Block Page Carousel Vertical.
 *
 * @package Shopical
 */
?>
<?php
$first_page_ids = array();
$first_show_title = array();
$first_button_text = array();
$first_button_link = array();
for ($i = 0; $i <= 3; $i++) {
    $first_slider_page = shopical_get_option('first_thumbnail_slider_' . $i);
    if (!empty($first_slider_page)) {
        $first_page_ids[] = $first_slider_page;
        $first_show_title[] = shopical_get_option('show_first_thumbnail_slider_page_title_' . $i);
        $first_button_text[] = shopical_get_option('first_thumbnail_slider_button_texts_' . $i);
        $first_button_link[] = shopical_get_option('first_thumbnail_slider_link_' . $i);
    }
}

if ($first_page_ids):
    $all_posts = shopical_get_pages($first_page_ids);

    ?>
    <?php if ($all_posts->have_posts()): ?>
    <div class="left-grid-section page-carousel-vertical page-carousel-upper owl-carousel owl-theme">
        <?php
        $first_count = 0;
        while ($all_posts->have_posts()): $all_posts->the_post();
            shopical_get_page_loop($first_show_title[$first_count], $first_button_text[$first_count], $first_button_link[$first_count]);
            $first_count++;
        endwhile; ?>
    </div>
<?php endif; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php
$second_page_ids = array();
$second_show_title = array();
$second_button_text = array();
$second_button_link = array();
for ($i = 0; $i <= 3; $i++) {
    $second_slider_page = shopical_get_option('second_thumbnail_slider_' . $i);
    if (!empty($second_slider_page)) {
        $second_page_ids[] = $second_slider_page;
        $second_show_title[] = shopical_get_option('show_second_thumbnail_slider_page_title_' . $i);
        $second_button_text[] = shopical_get_option('second_thumbnail_slider_button_texts_' . $i);
        $second_button_link[] = shopical_get_option('second_thumbnail_slider_link_' . $i);
    }
}

if ($second_page_ids):
    $second_posts = shopical_get_pages($second_page_ids);

    ?>
    <?php if ($second_posts->have_posts()): ?>
    <div class="left-grid-section page-carousel-vertical owl-carousel owl-theme">
        <?php
        $second_count = 0;
        while ($second_posts->have_posts()): $second_posts->the_post();
            shopical_get_page_loop($second_show_title[$second_count], $second_button_text[$second_count], $second_button_link[$second_count]);
            $second_count++;
        endwhile; ?>
    </div>
<?php endif; ?>
    <?php
    wp_reset_postdata();
endif;