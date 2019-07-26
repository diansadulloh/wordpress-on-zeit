<?php
/**
 * Block Contact.
 *
 * @package Shopical
 */

$store_contact_name = shopical_get_option('store_contact_name');
$store_contact_address = shopical_get_option('store_contact_address');
$store_contact_phone = shopical_get_option('store_contact_phone');
$store_contact_email = shopical_get_option('store_contact_email');
$store_contact_form_shortcode = shopical_get_option('store_contact_form');


?>
<div id="primary" class="content-area aft-no-sidebar">
    <main id="main" class="site-main">

        <?php
        while (have_posts()) :
            the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header><!-- .entry-header -->

                <?php shopical_post_thumbnail(); ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'shopical'),
                        'after' => '</div>',
                    ));
                    ?>
                    <section class="contact-details-wrapper clearfix">
                        <div class="contact-details col-2 float-l pad">
                            <?php if (!empty($store_contact_name)): ?>
                                <h3>
                                    <?php echo esc_html($store_contact_name); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if (!empty($store_contact_address)): ?>
                                <span>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <?php echo esc_html($store_contact_address); ?>
                                </span>
                            <?php endif; ?>

                            <?php if (!empty($store_contact_phone)): ?>
                                <span>
                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                    <a href="#"><?php echo esc_html($store_contact_phone); ?></a>
                                </span>
                            <?php endif; ?>

                            <?php if (!empty($store_contact_email)): ?>
                                <span>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <a href="#"><?php echo esc_html($store_contact_email); ?></a>
                                </span>
                            <?php endif; ?>

                        </div>
                        <div class="contact-form col-2 float-l pad">
                            <?php if (!empty($store_contact_form_shortcode)): ?>
                                <span>
                <?php echo do_shortcode($store_contact_form_shortcode); ?>
            </span>
                            <?php endif; ?>
                        </div>
                    </section>

                </div><!-- .entry-content -->

                <?php if (get_edit_post_link()) : ?>
                    <footer class="entry-footer">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                    __('Edit <span class="screen-reader-text">%s</span>', 'shopical'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </footer><!-- .entry-footer -->
                <?php endif; ?>
            </article><!-- #post-<?php the_ID(); ?> -->
        <?php endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

