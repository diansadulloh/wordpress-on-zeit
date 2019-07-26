<?php
/**
 * Block Section Latest Product.
 *
 * @package Shopical
 */
?>

<?php

$title = shopical_get_option('featured_categories_section_title');
$title_note = shopical_get_option('featured_categories_section_title_note');
$product_count = shopical_get_option('show_featured_categories_product_count');
$onsale_product_count = shopical_get_option('show_featured_categories_product_onsale_count');

$categories = array();

for ($i = 1; $i <= 3; $i++) {
    $category_id = shopical_get_option('featured_categories_' . $i);
    if (!empty($category_id)) {
        $categories[] = $category_id;
    }
}

$category_section_class = '';
$number_of_grid = '0';
if (isset($categories)) {
    $number_of_grid = count($categories);
    $category_section_class = 'aft-grid-group-' . $number_of_grid;
}

?>
<div class="categories <?php echo esc_attr($category_section_class); ?>">
    <?php if (!empty($title)): ?>
        <div class="section-head">
            <?php if (!empty($title)): ?>
                <h4 class="section-title aft-center-align">
                    <?php shopical_widget_title_section($title, $title_note); ?>
                </h4>
            <?php endif; ?>

        </div>
    <?php endif; ?>
    <div class="section-body clearfix">
        <div class="af-container-row shopical_category_grid_wrap">

            <?php if (isset($categories)):

                foreach ($categories as $category):

                    $thumbnail = 'shopical-medium-center';

                    if (($number_of_grid == 4 && $count == 2) || $number_of_grid == 2 || $number_of_grid == 1) {
                        $thumbnail = 'shopical-medium-slider';
                    }

                    ?>
                    <div class="col-3 float-l pad btm-margi product-ful-wid">
                        <div class="sale-single-wrap af-slide--wrap">
                            <?php shopical_product_category_loop($category, $product_count, $onsale_product_count, $thumbnail); ?>
                        </div>
                    </div>
                    <?php
                    $count++;
                endforeach;
            endif; ?>
        </div>
    </div>
</div>