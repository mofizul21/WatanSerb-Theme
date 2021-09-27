<!-- 1st Category -->
<div class="col-md-12">
    <a href="/category/حياتنا">
        <h2 class="title">حياتنا</h2>
    </a>
</div>
<?php
$sidebar1stQuery = new WP_Query(array(
    'category_name' => 'حياتنا',
    'posts_per_page' => 6,
    'offset' => 52,
));

if ($sidebar1stQuery->have_posts()) {
    while ($sidebar1stQuery->have_posts()) {
        $classes = get_post_class('standard-post', $post->ID);
        $sidebar1stString .= '<div class="col-md-12">';
        $sidebar1stString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
        $sidebar1stQuery->the_post();
        if (has_post_thumbnail()) {
            $post_id = get_the_ID(); // or use the post id if you already have it
            $category_object = get_the_category($post_id);
            $category_name = $category_object[0]->name;
            $category_id = get_cat_ID($category_name);
            $category_link = get_category_link($category_id);

            $sidebar1stString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 335)) . '<h2>' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';

            // $excerpt = get_the_excerpt();
            // $excerpt = substr($excerpt, 0, 80);
            // $result = substr($excerpt, 0, strrpos($excerpt, ' '));
            // $sidebar1stString .= $result;
        } else {
            // if no featured image is found
            $sidebar1stString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
        }
        $sidebar1stString .= '</article>';
        $sidebar1stString .= '</div>';

        // if (($sidebar1stQuery->current_post) % 2 == 1) {
        //     $sidebar1stString .= '<div class="col-md-12"><article class="standard-post ads"> 
        //     <ins class="adsbygoogle"
        //     style="display:inline-block;width:100%;height:250px"
        //     data-ad-client="ca-pub-XXXXXXXXXXXXX"
        //     data-adtest="on"
        //     data-ad-slot="XXXXXXXXXXX"></ins>
        //     <script>
        //     (adsbygoogle = window.adsbygoogle || []).push({});
        //     </script>
        //     </article></div>';
        // }
    }
} else {
    echo '<h2>No post</h2>';
}

echo $sidebar1stString;
wp_reset_query();
?>

<!-- 3rd Category -->
<div class="col-md-12">
    <a href="/category/فيديو">
        <h2 class="title">فيديو</h2>
    </a>
</div>
<?php
$sidebar3rdQuery = new WP_Query(array(
    'category_name' => 'فيديو',
    'posts_per_page' => 3
));

if ($sidebar3rdQuery->have_posts()) {
    while ($sidebar3rdQuery->have_posts()) {
        $classes = get_post_class('standard-post', $post->ID);
        $sidebar3rdString .= '<div class="col-md-12">';
        $sidebar3rdString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';
        $sidebar3rdQuery->the_post();
        if (has_post_thumbnail()) {
            $post_id = get_the_ID(); // or use the post id if you already have it
            $category_object = get_the_category($post_id);
            $category_name = $category_object[0]->name;
            $category_id = get_cat_ID($category_name);
            $category_link = get_category_link($category_id);

            $sidebar3rdString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 335)) . '<h2>' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';

            // $excerpt = get_the_excerpt();
            // $excerpt = substr($excerpt, 0, 80);
            // $result = substr($excerpt, 0, strrpos($excerpt, ' '));
            // $sidebar3rdString .= $result;
        } else {
            // if no featured image is found
            $sidebar3rdString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
        }
        $sidebar3rdString .= '</article>';
        $sidebar3rdString .= '</div>';

        // if (($sidebar3rdQuery->current_post) % 2 == 1) {
        //     $sidebar3rdString .= '<div class="col-md-12"><article class="standard-post ads"> 
        //     <ins class="adsbygoogle"
        //     style="display:inline-block;width:100%;height:250px"
        //     data-ad-client="ca-pub-XXXXXXXXXXXXX"
        //     data-adtest="on"
        //     data-ad-slot="XXXXXXXXXXX"></ins>
        //     <script>
        //     (adsbygoogle = window.adsbygoogle || []).push({});
        //     </script>
        //     </article></div>';
        // }
    }
} else {
    echo '<h2>No post</h2>';
}

echo $sidebar3rdString;
wp_reset_query();

?>