<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">   
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        if ( has_site_icon()  && get_option( 'site_icon' ) ) { ?>
        <!-- Title Bar Logo -->
        <link rel="icon" href="<?php echo get_theme_mod( 'site_icon' ); ?>" type="image/png">
    <?php }
    
    wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <!-- Preloader -->
    <div class="loader"></div>
    
    <!-- Image Loading Before Animations Element -->
    <div style="display: none;" class="stage">
        <div class="dot-pulse"></div>
    </div>

    <!-- scroll to top button -->
    <button class="scroll-to-top">
        <svg width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </button>
    
    <!-- Background Image Area -->
    <section id="background-image">
        <img src="<?php echo get_template_directory_uri(); ?> ./images/background-image.jpg" alt="Background Image">
    </section>

    <!-- Header Area -->
    <header id="header" class="<?php echo get_theme_mod( 'boxshadow_header_menu_image_radio_button' ); ?>">
        <section class="header-section">
            <div class="container-md p-0">
                <div class="row m-0">
                    <div class="col-12 p-0">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <?php 
                                    if ( get_theme_mod( 'boxshadow_logo' ) ) { ?>
                                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <img data-src="<?php echo get_theme_mod( 'boxshadow_logo' ); ?>" alt="Logo">
                                    </a>
                                <?php }?>

                                <div id="menu-toggle">
                                    <div id="hamburger">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                    <div id="cross">
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>

                                <?php 
                                wp_nav_menu( array(
                                    'theme_location'            => 'header_menu',
                                    'container'                 => 'div',
                                    'container_class'           => 'collapse navbar-collapse sidebar-menu',
                                    'container_id'              => 'navbarNav',
                                    'menu_class'                => 'navbar-nav',
                                    'link_class'                => 'nav-item', //Custom boxshadow_link_class(); Function inc/theme-setup.php
                                    'anchor_class'              => 'nav-link', //Custom boxshadow_anchor_class(); Function inc/theme-setup.php
                                    'anchor_first_child_class'  => 'active', //Custom boxshadow_anchor_first_child_class(); Function inc/theme-setup.php
                                    'menu_items_before'         => '<a href="" class="sidebar-menu-close"><span></span></a>', //Custom boxshadow_prefix_menu_
                                    'depth'                     => '3',
                                ) );
                                ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </header>