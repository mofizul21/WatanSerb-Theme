
    <?php
    // the query
    $sportsQuery = new WP_Query(array(
        'category_name' => 'الهدهد',
        'posts_per_page' => 16
    ));

    // The Loop
    if ($sportsQuery->have_posts()) {
        while ($sportsQuery->have_posts()) {

            $sportsQuery->the_post();

            $classes = get_post_class('standard-post underBanner', $post->ID);
            $sportsString .= '<div class="col-md-6">';
            $sportsString .= '<article class="' . esc_attr(implode(' ', $classes)) . '" >';

            if (has_post_thumbnail()) {
                $post_id = get_the_ID(); // or use the post id if you already have it
                $category_object = get_the_category($post_id);
                $category_name = $category_object[0]->name;
                $category_id = get_cat_ID($category_name);
                $category_link = get_category_link($category_id);

                $sportsString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . get_the_post_thumbnail($post_id, array(570, 335)) . '<h2>' . get_the_title() . '</h2>' . '</a><a href="' . esc_url($category_link) . '" class="badge-name">' . $category_name . '</a>';

                $excerpt = get_the_excerpt();
                $excerpt = substr($excerpt, 0, 180);
                $result = substr($excerpt, 0, strrpos($excerpt, ' '));
                $sportsString .= $result;
            } else {
                // if no featured image is found
                $sportsString .= '<a href="' . get_the_permalink() . '" rel="bookmark">' . '<h2>' . get_the_title() . '</h2>' . '</a>';
            }

            $sportsString .= '</article>';
            $sportsString .= '</div>';

            // ADS CODE DIV
            // if ($sportsQuery->current_post % 2 == 1) {
            //     $sportsString .= '<div class="col-md-6"><article class="standard-post ads">
            //         <ins class="adsbygoogle"
            //         style="display:inline-block;width:100%;height:335px"
            //         data-ad-client="ca-pub-XXXXXXXXXXXXX"
            //         data-adtest="on"
            //         data-ad-slot="XXXXXXXXXXX"></ins>
            //         <script>
            //         (adsbygoogle = window.adsbygoogle || []).push({});
            //         </script>
            //         </article></div>';
            // }
        } // end while

    } else {
        echo 'No post';
    }

    echo $sportsString;
    wp_reset_postdata();
    ?>



