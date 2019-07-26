<?php

if (('' != shopical_get_option('banner_advertisement_section'))) { ?>
    <div class="banner-promotions-wrapper">
        <?php if (('' != shopical_get_option('banner_advertisement_section'))):

            $shopical_banner_advertisement = shopical_get_option('banner_advertisement_section');
            $shopical_banner_advertisement = absint($shopical_banner_advertisement);
            $shopical_banner_advertisement = wp_get_attachment_image($shopical_banner_advertisement, 'full');
            $shopical_banner_advertisement_url = shopical_get_option('banner_advertisement_section_url');
            $shopical_banner_advertisement_url = isset($shopical_banner_advertisement_url) ? esc_url($shopical_banner_advertisement_url) : '#';
            $shopical_open_on_new_tab = shopical_get_option('banner_advertisement_open_on_new_tab');
            $shopical_open_on_new_tab = ('' != $shopical_open_on_new_tab) ? '_blank' : '';

            ?>
            <div class="promotion-section">
                <a href="<?php echo esc_url($shopical_banner_advertisement_url); ?>"
                   target="<?php echo esc_attr($shopical_open_on_new_tab); ?>">
                    <?php echo $shopical_banner_advertisement; ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
    <!-- Trending line END -->
    <?php } ?>
