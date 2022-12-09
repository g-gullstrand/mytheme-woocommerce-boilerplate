<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>
    <body>

        <header class="bg-gray-300">
            <nav>
                <div class="mini-cart"><?php
                    if (function_exists('mytheme_mini_cart')) {
                        mytheme_mini_cart();
                    } ?>
                </div>
            </nav>
            <?php //echo do_shortcode('[mytheme-mini-cart]'); ?>
        </header>

        <main>