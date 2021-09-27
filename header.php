<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WatanSerb
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-44023009-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-44023009-1');
    </script>
    <!-- Start Alexa Certify Javascript -->
    <script type="text/javascript">
        _atrk_opts = {
            atrk_acct: "X4mUe1a0yd00U+",
            domain: "watanserb.com",
            dynamic: true
        };
        (function() {
            var as = document.createElement('script');
            as.type = 'text/javascript';
            as.async = true;
            as.src = "https://certify-js.alexametrics.com/atrk.js";
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(as, s);
        })();
    </script>
    <noscript><img src="https://certify.alexametrics.com/atrk.gif?account=X4mUe1a0yd00U+" style="display:none" height="1" width="1" alt="AlexaMetrics" /></noscript>
    <!-- End Alexa Certify Javascript -->
    
    <!-- Desktop & Mobile Ad -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5510631361488578" crossorigin="anonymous"></script>
    <!-- AMP Ad -->
    <script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <amp-auto-ads type="adsense" data-ad-client="ca-pub-5510631361488578"> </amp-auto-ads>

    <button onclick="topFunction()" id="backToTop" title="Go to top">Top</button>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'watanserb'); ?></a>

        <header id="masthead" class="site-header">

            <div class="container">
                <!-- LOGO & BANNER ADS -->
                <div class="row py-4 align-items-center">
                    <div class="col-md-4">
                        <div class="site-branding">
                            <?php
                            the_custom_logo();
                            if (is_front_page() && is_home()) :
                            ?>
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                            <?php
                            else :
                            ?>
                                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                            <?php
                            endif;
                            $watanserb_description = get_bloginfo('description', 'display');
                            if ($watanserb_description || is_customize_preview()) :
                            ?>
                                <p class="site-description"><?php echo $watanserb_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                            ?></p>
                            <?php endif; ?>
                        </div>
                        <!-- .site-branding -->
                    </div>
                    <!-- end .col-md-4 -->
                    <div class="col-md-8">
                        <ins class="adsbygoogle" style="display:inline-block;width:100%;height:250px" data-adtest="on" data-ad-slot="6726717083"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <!-- end .col-md-8 -->
                </div>
                <!-- end .row -->



            </div>
            <!-- end .container -->

            <!-- NAVBAR -->
            <div class="row">
                <nav id="site-navigation" class="main-navigation">
                    <div class="container">
                        <div style="position:relative">
                            <form role="search" method="get" class="search-form" action="<?php bloginfo('url'); ?>">
                                <label>
                                    <span class="screen-reader-text">Search for:</span>
                                    <input type="search" class="search-field" placeholder="بحث..." value="" name="s">
                                </label>
                                <input type="submit" class="search-submit" value="بحث">
                            </form>
                        </div>

                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'watanserb'); ?></button>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                        ?>

                    </div>
                </nav><!-- #site-navigation -->

            </div>
            <!-- end .row -->


        </header>
        <!-- end header -->
    </div>
    <!-- end #page -->