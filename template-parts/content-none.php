<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WatanSerb
 */

?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('لم نعثر على الصفحة', 'watanserb'); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) :

            printf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'watanserb'),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );

        elseif (is_search()) :
        ?>

            <p><?php esc_html_e('برجاء إجراء بحث باستخدام كلمات مختلفة', 'watanserb'); ?></p>
        <?php
            //get_search_form();

        else :
        ?>

            <p><?php esc_html_e('يبدو أننا لا نستطيع العثور على ما تبحث عنه. ربما يمكن أن يساعد البحث.', 'watanserb'); ?></p>
        <?php
            get_search_form();

        endif;
        ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->

       