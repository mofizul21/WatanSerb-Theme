<?php
// the query
$video_query = new WP_Query(array(
    'category_name' => 'رياضة',
    //'category_in' => 3,
    'posts_per_page' => 5
));

// The Loop
if ($video_query->have_posts()) {
    $i = 0;
    while ($video_query->have_posts()) {
        $i++;
        $video_query->the_post();
        $classes = get_post_class('banner-post', $post->ID);

        if ($i <= 2) {
            $videoString .= '<div class="col-md-6 banner2Posts">';
            $videoString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
            if (has_post_thumbnail()) {
                $post_id = get_the_ID(); // or use the post id if you already have it
                $category_object = get_the_category($post_id);
                $category_name = $category_object[0]->name;
                $category_id = get_cat_ID($category_name);
                $category_link = get_category_link($category_id);

                $videoString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 335)) . '<h2>' . get_the_title() . '</h2>' . '</a> <a href="' . esc_url($category_link) . '" class="category-name">' . $category_name . '</a>';
            } else {
                // if no featured image is found
                $videoString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
            }
            $videoString .= '</article>';
            $videoString .= '</div>';
        } else {
            $videoString .= '<div class="col-md-4">';
            $videoString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
            if (has_post_thumbnail()) {
                $post_id = get_the_ID(); // or use the post id if you already have it
                $category_object = get_the_category($post_id);
                $category_name = $category_object[0]->name;
                $category_id = get_cat_ID($category_name);
                $category_link = get_category_link($category_id);

                $videoString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 335)) . '<h2>' . get_the_title() . '</h2>' . '</a> <a href="' . esc_url($category_link) . '" class="category-name">' . $category_name . '</a>';
            } else {
                // if no featured image is found
                $videoString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
            }
            $videoString .= '</article>';
            $videoString .= '</div>';
        }

    }
} else {
    echo '<h2>No post</h2>';
}

echo $videoString;
wp_reset_query();
