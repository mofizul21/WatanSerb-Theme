<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WatanSerb
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">

        <!-- FOR CATEGORY-TAG PAGE -->
        <?php if (!is_author()) : ?>
            <div class="row">
                <?php
                if (is_category()) {
                    $category = get_query_var('cat');
                    $current_cat = get_category($category);
                }
                // echo "<pre>";
                // print_r($current_cat->slug);
                // echo "</pre>";
                // the query
                $the_query = new WP_Query(array(
                    'category_name' => $current_cat->slug,
                    'posts_per_page' => 6,
                ));
                // The Loop
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $string .= '<div class="col-md-4 mt-4">';
                        $string .= '<article class="banner-post">';
                        $the_query->the_post();
                        if (has_post_thumbnail()) {
                            $post_id = get_the_ID(); // or use the post id if you already have it
                            $category_object = get_the_category($post_id);
                            $category_name = $category_object[0]->name;
                            $category_id = get_cat_ID($category_name);
                            $category_link = get_category_link($category_id);

                            $string .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 335)) . '<h2>' . get_the_title() . '</h2>' . '</a> <a href="' . esc_url($category_link) . '" class="category-name">' . $category_name . '</a>';
                            //$string .= $post_id;
                        } else {
                            // if no featured image is found
                            $string .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
                        }
                        $string .= '</article>';
                        $string .= '</div>';
                    }
                } else {
                    echo '<h1>No post</h1>';
                }
                echo $string;
                wp_reset_postdata();
                ?>
            </div>

            <div class="row mt-4">
                <div class="col-md-8">

                    <?php if (have_posts()) : ?>
                        <header class="page-header">
                            <?php
                            the_archive_title('<h1 class="page-title title">', '</h1>');
                            the_archive_description('<div class="archive-description">', '</div>');
                            ?>
                        </header><!-- .page-header -->

                    <?php
                        $watanmeta_query = new WP_Query(array(
                            'category_name' => $current_cat->slug,
                            'offset' => 6,
                        ));
                        /* Start the Loop */
                        while ($watanmeta_query->have_posts()) :
                            $watanmeta_query->the_post();
                            get_template_part('template-parts/content', 'watanmeta');
                        endwhile;
                        the_posts_navigation();
                    else :
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>
                </div>

                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- FOR AUTHOR PAGE -->
        <?php
        if (is_author()):
        ?>
        <div class="row mt-4">
            <div class="col-md-8">

                <?php if (have_posts()) : ?>
                    <header class="page-header">
                        <?php
                        the_archive_title('<h1 class="page-title title">', '</h1>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </header><!-- .page-header -->

                <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();
                        /*
                    * Include the Post-Type-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                    */
                        get_template_part('template-parts/content', 'author');
                    endwhile;
                    the_posts_navigation();
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </div>

            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</main>

<?php


get_footer();
