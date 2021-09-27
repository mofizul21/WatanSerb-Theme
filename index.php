<?php

get_header();
?>

<main id="primary" class="site-main">
    <div class="container banner">
        <div class="row">
            <?php include_once('inc/bannerPosts.php'); ?>
        </div>
        <!-- Under Banner Ad -->
        <!-- <div class="row mt-4">
            <div class="col-md-12">
                <ins class="adsbygoogle" style="display:inline-block;width:100%;height:180px" data-ad-client="ca-pub-XXXXXXXXXXXXX" data-adtest="on" data-ad-slot="XXXXXXXXXXX"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div> -->
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 post-area">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">الهدهد</h2>
                    </div>
                    <?php include_once('inc/underBannerPosts.php'); ?>
                </div>
            </div>

            <div class="col-md-4 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
        <!-- end .row -->
        <!-- <div class="row">
            <div class="col-md-12">
                <ins class="adsbygoogle" style="display:inline-block;width:100%;height:180px" data-ad-client="ca-pub-XXXXXXXXXXXXX" data-adtest="on" data-ad-slot="XXXXXXXXXXX"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div> -->
        <!-- end .row -->
    </div>
    <!-- end .container -->

    <div class="container banner mt-4">
        <div class="row">
            <?php include_once('inc/videoPosts.php'); ?>
        </div>
    </div>
    <!-- end .container -->

</main><!-- #main -->

<?php

get_footer();
