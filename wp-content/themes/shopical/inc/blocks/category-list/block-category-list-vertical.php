<?php
/**
 * Block Categories Carousel Vertical.
 *
 * @package Shopical
 */
?>

<?php
$section_title = shopical_get_option('top_categories_section_title');
$categories_section_mode = shopical_get_option('select_top_categories_section_mode');
$categories_hover_mode = shopical_get_option('select_top_categories_on_hover');
$categories_section_class = $categories_section_mode;
if($categories_section_mode == 'list-only' || $categories_section_mode == 'selected-categories'){
    $categories_section_class .= ' '.$categories_hover_mode;
}

$product_count = shopical_get_option('show_top_categories_product_count');
$onsale_product_count = shopical_get_option('show_top_categories_product_onsale_count');
?>
<div class="aft-top-categories-vertical-lists tertiary-background-color">
<h3>
    <i class="fa fa-list"></i>
    <?php echo esc_html($section_title);  ?>
</h3>
<div class="category-dropdown catgory-list <?php echo esc_attr($categories_section_class); ?>">
    <?php echo shopical_get_vertical_list_categories($categories_section_mode, $product_count, $onsale_product_count); ?>
</div>
</div>