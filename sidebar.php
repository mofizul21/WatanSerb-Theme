<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WatanSerb
 */


?>

<aside id="secondary" class="widget-area">
    <?php if(is_home()): ?>
    <!-- Opinion -->
    <div class="row">
        <div class="col-md-12">
            <a href="/category/تحرر-الكلام/">
                <h2 class="title">تحرر الكلام</h2>
            </a>
        </div>
        <?php
        $loop = new WP_Query(array(
            'category_name' => 'تحرر-الكلام',
            'posts_per_page' => 3
        ));

        if ($loop->have_posts()) {
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="col-md-12">
                    <article class="standard-post opinion">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                            </div>
                            <div class="col-md-9">
                                <?php
                                the_title('<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h2>');
                                ?>
                                <div class="opinion_author">
                                    <p> <?php the_author(); ?></p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
        <?php endwhile;
        } else {
            echo "<h4>No Opinions</h2>";
        } ?>
    </div>
    <?php endif; ?>

    <!-- Popular Posts in single page -->
    <?php
    if (is_single()) : ?>
        <div class="row">
            <div class="col-md-12">
                <a href="/category/الهدهد">
                    <h2 class="title">أكثر المواضيع قراءة</h2>
                </a>
            </div>

            <?php
            $mostViewed = new WP_Query(array(
                'category_name' => 'الهدهد',
                'posts_per_page' => 6
                // 'posts_per_page' => 4,
                // 'meta_key' => 'wpb_post_views_count',
                // 'orderby' => 'meta_value_num',
                // 'order' => 'DESC',
                // 'date_query' => array(
                //     array(
                //         'after' => '1 week ago'
                //     )
                // )
            ));

            if ($mostViewed->have_posts()) {
                while ($mostViewed->have_posts()) {
                    $mostViewed->the_post();
                    // view count
                    wpb_get_post_views(get_the_ID());
                    //$mostViewedString .= wpb_get_post_views(get_the_ID());

                    $classes = get_post_class('standard-post popular-post', $post->ID);
                    $mostViewedString .= '<div class="col-md-12">';
                    $mostViewedString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
                    $mostViewedString .= '<div class="row align-items-center">';

                    $mostViewedString .= '<div class="col-md-3">';
                    if (has_post_thumbnail()) {
                        $post_id = get_the_ID();
                        $mostViewedString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 335)) . '</a>';
                    }
                    $mostViewedString .= '</div>'; // .col-md-3 end

                    $mostViewedString .= '<div class="col-md-9">';
                    $mostViewedString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
                    $mostViewedString .= '</div>'; // .col-md-9 end

                    $mostViewedString .= '</div>'; // .row end
                    $mostViewedString .= '</article>';
                    $mostViewedString .= '</div>';
                }
            } else {
                echo '<h2>No post</h2>';
            }

            echo $mostViewedString;
            wp_reset_query();
            ?>
        </div>
    <?php endif; ?>


    <!-- Category posts -->
    <div class="row">
        <?php include_once('inc/sidebarPosts.php') ?>
        <?php //dynamic_sidebar( 'sidebar-1' ); 
        ?>
    </div>

    <!-- Social URLs -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">تابعنا</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 social-icons">
                    <a href="https://www.facebook.com/watanusa">
                        <img src="/wp-content/uploads/2021/08/facebook.png" alt="Facebook">
                        <h4 class="aligncenter">Facebook</h4>
                    </a>
                </div>
                <div class="col-md-3 social-icons">
                    <a href="https://twitter.com/watan_usa">
                        <img src="/wp-content/uploads/2021/08/twitter.png" alt="Twitter">
                        <h4 class="aligncenter">Twitter</h4>
                    </a>
                </div>
                <div class="col-md-3 social-icons">
                    <a href="https://youtube.com/channel/UCuioSm-SG28IHcy8muZn2wg">
                        <img src="/wp-content/uploads/2021/08/youtube.png" alt="Youtube">
                        <h4 class="aligncenter">Youtube</h4>
                    </a>
                </div>
                <div class="col-md-3 social-icons">
                    <a href="https://t.me/watanserb">
                        <img src="/wp-content/uploads/2021/08/telegram.png" alt="Telegram">
                        <h4 class="aligncenter">Telegram</h4>
                    </a>
                </div>
                <div class="col-md-3 social-icons">
                    <a href="https://itunes.apple.com/us/app/وطن-يغرد-خارج-السرب/id1242712408?mt=8">
                        <img src="/wp-content/uploads/2021/08/apple.png" alt="Apple">
                        <h4 class="aligncenter">Apple</h4>
                    </a>
                </div>
                <div class="col-md-3 social-icons">
                    <a href="https://play.google.com/store/apps/details?id=com.goodbarber.watan&hl=en_US">
                        <img src="/wp-content/uploads/2021/08/android.png" alt="Android">
                        <h4 class="aligncenter">Android</h4>
                    </a>
                </div>
                <div class="col-md-3 social-icons">
                    <a href="https://instagram.com/watanserb">
                        <img src="/wp-content/uploads/2021/08/instagram.png" alt="Instagram">
                        <h4 class="aligncenter">Instagram</h4>
                    </a>
                </div>
                <div class="col-md-3 social-icons">
                    <a href="https://www.linkedin.com/company/watanserb">
                        <img src="/wp-content/uploads/2021/08/linkedin.png" alt="LinkedIn">
                        <h4 class="aligncenter">LinkedIn</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside><!-- #secondary -->