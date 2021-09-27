<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WatanSerb
 */

get_header();
?>
<main id="primary" class="site-main">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 post single-article">
                <?php
                while (have_posts()) :
                    // post views count
                    wpb_set_post_views(get_the_ID());

                    the_post();

                    get_template_part('template-parts/content', get_post_type());

                // the_post_navigation(
                //     array(
                //         'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'watanserb') . '</span> <span class="nav-title">%title</span>',
                //         'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'watanserb') . '</span> <span class="nav-title">%title</span>',
                //     )
                // );

                // If comments are open or we have at least one comment, load up the comment template.                    

                endwhile; // End of the loop.
                ?>

                <!-- Display Related Posts by Tags -->
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">قد يعجبك ايضا</h2>
                    </div>
                </div>
                <div class="row related_posts">

                    <?php
                    //for use in the loop, list 5 post titles related to first tag on current post
                    $tags = wp_get_post_tags($post->ID);
                    if ($tags) {
                        $first_tag = $tags[0]->term_id;
                        $args = array(
                            'tag__in' => array($first_tag),
                            'post__not_in' => array($post->ID),
                            'posts_per_page' => 6,
                            'caller_get_posts' => 1
                        );
                        $relatedPostQuery = new WP_Query($args);
                        if ($relatedPostQuery->have_posts()) {
                            while ($relatedPostQuery->have_posts()) : $relatedPostQuery->the_post();
                                $post_id = get_the_ID();

                                $category_object = get_the_category($post_id);
                                $category_name = $category_object[0]->name;
                                $category_id = get_cat_ID($category_name);
                                $category_link = get_category_link($category_id);

                                $classes = get_post_class('standard-post related-post', $post->ID); ?>
                                <div class="col-md-4">
                                    <article class="<?php echo esc_attr(implode(' ', $classes)) ?>">
                                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                            <?php echo get_the_post_thumbnail($post_id, array(570, 335)); ?>
                                            <?php the_title(); ?>
                                        </a>
                                        <a href="<?php echo $category_link; ?>"  class="badge-name"><?php echo $category_name; ?></a >
                                    </article>
                                </div>
                    <?php
                            endwhile;
                        } else{
                            echo "<h3>No related post in this post</h3>";
                        }
                        wp_reset_query();
                    }
                    ?>

                </div>

                <!-- Display Comment Box -->
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>
            <div class="col-md-4 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>
<?php


get_footer();
