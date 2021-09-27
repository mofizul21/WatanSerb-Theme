<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WatanSerb
 */

?>
<div class="authorPost">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row align-items-center">
            <div class="col-md-4">
                <?php watanserb_post_thumbnail(); ?>
            </div>
            <div class="col-md-8">
                <header class="entry-header">
                    <?php
                    if (is_singular()) :
                        the_title('<h1 class="entry-title">', '</h1>');
                    else :
                        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    endif;

                    if ('post' === get_post_type()) :
                    ?>
                        <div class="entry-meta">
                            <?php
                            //watanserb_posted_on();
                            //watanserb_posted_by();
                            ?>
                        </div><!-- .entry-meta -->

                        <?php echo do_shortcode('[social]'); ?>
                    <?php endif; ?>
                </header><!-- .entry-header -->
                <footer class="entry-footer">
                    <?php watanserb_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </div>
        </div>
    </article>
</div>