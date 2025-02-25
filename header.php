<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package draftspot_theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <title><?php echo esc_attr(get_bloginfo('name')); ?></title>
    <?php wp_head(); ?>

</head>
<?php

?>

<body <?php body_class(); ?>>
    <div class="ds_header_top_bar container-fluid">
        <div class="container">
            <div class="ds_header_top_bar_left">
                <p><?php echo get_field('horni_oznameni_text_vlevo', 'options') . ' <a href="' . get_field('horni_oznameni_adresa', 'options') . '" target="_blank">'. get_field('horni_oznameni_tucny_text', 'options') .'</a>'; ?> </p>
            </div>
            <div class="ds_header_top_bar_right">
                <?php
                $ds_links = get_field('social_nets_items', 'options');
                foreach($ds_links as $item){ ?>
                    <a href="<?php echo $item['link']; ?>" target="_blank">
                        <img src="<?php echo $item['icon_w']; ?>" alt="<?php echo $item['title']; ?>">
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <header id="masthead" class="site-header navbar-static-top container-fluid" role="banner">
        <div class="ds_wrapper_menu_main container">
            <div class="navbar-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="d-block">
                    <figure>
                        <img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) );?>" class="ds_logo_main" alt="Marina dock" >
                    </figure>
                </a>
            </div>

            <nav class="navbar navbar-expand-lg p-0">
                <button id="nav-icon3" class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <?php
                wp_nav_menu(array(
                    'menu'    => 'mainMenu',
                    'container'       => 'div',
                    'container_id'    => 'main-nav',
                    'container_class' => 'collapse navbar-collapse justify-content-end',
                    'menu_id'         => false,
                    'menu_class'      => 'navbar-nav',
                    'depth'           => 3,
                    'fallback_cb'     => 'BootstrapBasicMyWalkerNavMenu::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>
            </nav>

            <?php /* ?>
            <div class="header_icons">
                <button class="openSearch" id="ds_openSearch">
                    <svg id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>17 search</title><path d="M23.707,22.293l-5.969-5.969a10.016,10.016,0,1,0-1.414,1.414l5.969,5.969a1,1,0,0,0,1.414-1.414ZM10,18a8,8,0,1,1,8-8A8.009,8.009,0,0,1,10,18Z"/></svg>
                </button>
                <div class="ds_search_form_wrapper d-flex align-items-center">
                    <input type="search" id="ds_header_search_input" class="ds_header_search" placeholder="Hledat..." value="">
                    <button id="ds_header_search_button_id" class="ds_header_search_button btn btn-primary">Hledat</button>
                    <button id="ds_header_search_close_id" class="ds_header_search_close btn_outline">Zavřít</button>
                </div>
            </div>
            <?php */ ?>
        </div>
    </header><!-- #masthead -->


    <main>
