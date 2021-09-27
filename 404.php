<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WatanSerb
 */

get_header();
?>
<main id="primary" class="site-main">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8">
                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('للأسف هذه الصفحة غير متوفرة!', 'watanserb'); ?></h1>
                    </header><!-- .page-header -->

                    <div class="page-content">
                        <p><?php esc_html_e('لم نعثر على هذه الصفحة. بإمكانك اختيار أحد الروابط أدنها أو البحث في الموقع', 'watanserb'); ?></p>

                        <?php

                        the_widget('WP_Widget_Recent_Posts');
                        ?>

                        <div class="widget widget_categories">
                            <h2 class="widget-title"><?php esc_html_e('الأكثر استخداما الفئات', 'watanserb'); ?></h2>
                            <ul>
                                <?php
                                wp_list_categories(
                                    array(
                                        'orderby'    => 'count',
                                        'order'      => 'DESC',
                                        'show_count' => 1,
                                        'title_li'   => '',
                                        'number'     => 10,
                                    )
                                );
                                ?>
                            </ul>
                        </div><!-- .widget -->

                        <?php
                        /* translators: %1$s: smiley */
                        $watanserb_archive_content = '<p>' . sprintf(esc_html__('حاول تبحث في أرشيف الشهرية. %1$s', 'watanserb'), convert_smilies(':)')) . '</p>';
                        the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$watanserb_archive_content");

                        the_widget('WP_Widget_Tag_Cloud');
                        ?>

                    </div><!-- .page-content -->
                </section><!-- .error-404 -->
            </div>
            <!-- end .col-md-8 -->
            
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
            <!-- end .col-md-4 -->
        </div>
        <!-- end .row -->
    </div>
    <!-- end .container -->
</main>

    <?php
    get_footer();
