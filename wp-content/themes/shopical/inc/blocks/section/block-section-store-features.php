<?php
/**
 * Block Section Latest Product.
 *
 * @package Shopical
 */
?>

<?php

$features = array();

for ($i = 0; $i <= 3; $i++) {

    $title = shopical_get_option('store_features_title_' . $i);

    if (!empty($title)) {
        $features['features_' . $i][] = $title;
        $features['features_' . $i][] = shopical_get_option('store_features_icon_' . $i);
        $features['features_' . $i][] = shopical_get_option('store_features_desc_' . $i);

    }
}

?>


<div class="container-wrapper">
    <div class="support-wrap section-body clearfix">
        <?php if (isset($features)):
            $col = count($features);
            $col_class = 'col-' . $col;
            $count = 1;
            foreach ($features as $feature):

                ?>
                <div class="<?php echo esc_attr($col_class); ?> float-l singlewrap pad-15">
                    <div class="suport-single clearfix">
                        <?php if(!empty($feature[1])): ?>
                        <div class="icon-box">
                                       <span class="icon-box-circle icon-box-circle-color-<?php echo esc_attr($count); ?>">
                                           <i class="<?php echo esc_attr($feature[1]); ?>"></i>
                                       </span>
                        </div>
                        <?php endif; ?>
                        <div class="support-content pad">
                            <h5><?php echo esc_html($feature[0]); ?></h5>
                            <p><?php echo esc_html($feature[2]); ?></p>
                        </div>
                    </div>
                </div>
                <?php
                $count++;
            endforeach; ?>
        <?php endif; ?>

    </div>
</div>


