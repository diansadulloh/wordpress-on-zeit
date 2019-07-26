<?php
/**
 * Block Section Main Banner.
 *
 * @package Shopical
 */
?>


<div class="section-body clearfix af-container-row">

    <div class="right-list-section col-20 float-l pad">
        <?php shopical_get_block('vertical', 'category-list'); ?>
    </div>
    <?php
    $show_main_banner_section = shopical_get_option('show_main_banner_section');
    if ($show_main_banner_section):
        ?>
        <div class="banner-slider banner-slider-section col-55 float-l pad">

                <?php shopical_get_block('slider-page'); ?>

        </div>
    <?php endif; ?>

    <div class="left-grid-section-wrapper col-4 float-l pad">

        <?php shopical_get_block('vertical', 'page-thumb-slider'); ?>

    </div>



</div>



