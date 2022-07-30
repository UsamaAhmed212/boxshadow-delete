<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//Theme Css and Js File Enqueue
function boxshadow_cs_js_enqueue() {
    // Fonts Enqueue
    wp_register_style( 'boxshadow-google-fonts', boxshadow_fonts_url(), array(), null);
    wp_enqueue_style( 'boxshadow-google-fonts' );

    // Alisandra Font Css Enqueue
    wp_register_style( 'boxshadow-alisandra', get_template_directory_uri() . './assets/fonts/alisandra/alisandra.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-alisandra' );

    // Inheritance Font Css Enqueue
    wp_register_style( 'boxshadow-inheritance', get_template_directory_uri() . './assets/fonts/inheritance/inheritance.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-inheritance' );


    // Bootstrap Css Enqueue
    wp_register_style( 'boxshadow-bootstrap-min', get_template_directory_uri() . './assets/css/bootstrap.min.css', array(), '5.0.2', 'all' );
    wp_enqueue_style( 'boxshadow-bootstrap-min' );

    // Theme Css Enqueue Start
    wp_enqueue_style( 'boxshadow-style', get_stylesheet_uri() );
    
    // Common Css Enqueue
    wp_register_style( 'boxshadow-common', get_template_directory_uri() . './assets/css/common.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-common' );








    // Style Css Enqueue
    wp_register_style( 'boxshadow-index-style', get_template_directory_uri() . './assets/css/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-index-style' );


    // Portfolio Css Enqueue
    wp_register_style( 'boxshadow-portfolio', get_template_directory_uri() . './assets/css/portfolio.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-portfolio' );


    // portfolio-single Css Enqueue
    wp_register_style( 'boxshadow-portfolio-single', get_template_directory_uri() . './assets/css/portfolio-single.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-portfolio-single' );
    

    // Contact Css Enqueue
    wp_register_style( 'boxshadow-contact', get_template_directory_uri() . './assets/css/contact.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-contact' );






    // Scroll To Top And Draw On Scroll Css Enqueue
    wp_register_style( 'boxshadow-scroll-to-top-and-draw-on-scroll', get_template_directory_uri() . './assets/plugins/scroll-to-top-and-draw-on-scroll/scroll-to-top-and-draw-on-scroll.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-scroll-to-top-and-draw-on-scroll' );

    // Sticky Navigation Menu Css Enqueue
    wp_register_style( 'boxshadow-sticky-navigation-menu', get_template_directory_uri() . './assets/plugins/sticky-navigation-menu/sticky-navigation-menu.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-sticky-navigation-menu' );





    // Responsive Css Enqueue
    wp_register_style( 'boxshadow-responsive', get_template_directory_uri() . './assets/css/responsive.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-responsive' );


    // Portfolio Responsive Css Enqueue
    wp_register_style( 'boxshadow-portfolio-responsive', get_template_directory_uri() . './assets/css/portfolio-responsive.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-portfolio-responsive' );


    // Contact Responsive Css Enqueue
    wp_register_style( 'boxshadow-contact-responsive', get_template_directory_uri() . './assets/css/contact-responsive.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-contact-responsive' );






    // Aso Plugin Css Enqueue
    wp_register_style( 'boxshadow-aso-plugin', get_template_directory_uri() . './assets/plugins/aos/css/aos.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'boxshadow-aso-plugin' );
    // Theme Css Enqueue End


    // Theme Js Enqueue Start

    // SVG Loader Enqueue
    wp_enqueue_script( 'boxshadow-svg-loader', get_template_directory_uri() . './assets/js/svg-loader.js', array(), '1.0.0', true );
    
    // jQuery CDN Enqueue
    wp_enqueue_script( 'jquery-core', false, array(), false, true );

    
    // Enable Disable Scrolling Js Enqueue
    wp_enqueue_script( 'boxshadow-enable-disable-scrolling', get_template_directory_uri() . './assets/js/enable-disable-scrolling.js', array(), '1.0.0', true );

    // Scroll To Top And Draw On Scroll Js Enqueue
    wp_enqueue_script( 'boxshadow-scroll-to-top-and-draw-on-scroll', get_template_directory_uri() . './assets/plugins/scroll-to-top-and-draw-on-scroll/scroll-to-top-and-draw-on-scroll.js', array(), '1.0.0', true );

    // Sticky Navigation Menu Js Enqueue
    wp_enqueue_script( 'boxshadow-sticky-navigation-menu', get_template_directory_uri() . './assets/plugins/sticky-navigation-menu/sticky-navigation-menu.js', array(), '1.0.0', true );

    



    // Typed Js Enqueue
    wp_enqueue_script( 'boxshadow-typed', get_template_directory_uri() . './assets/js/typed.js', array(), '1.0.0', true );





    
    // Custom Js Enqueue
    wp_enqueue_script( 'boxshadow-custom', get_template_directory_uri() . './assets/js/custom.js', array(), '1.0.0', true );

    // Aso Plugin Js Enqueue
    wp_enqueue_script( 'boxshadow-aos', get_template_directory_uri() . './assets/plugins/aos/js/aos.js', array(), '1.0.0', true );

    wp_enqueue_script( 'boxshadow-aos-init', get_template_directory_uri() . './assets/plugins/aos/aos-init.js', array(), '1.0.0', true );
    // Theme Js Enqueue End

}
add_action( 'wp_enqueue_scripts', 'boxshadow_cs_js_enqueue');

// Fonts Enqueue Function
function boxshadow_fonts_url() {
    $fonts_url = '';

    $NunitoSans = _x( 'on', 'NunitoSans font: on or off', 'boxshadow' );
    $Poppins = _x( 'on', 'Poppins font: on or off', 'boxshadow' );
    $Roboto = _x( 'on', 'Roboto font: on or off', 'boxshadow' );

    if ( 'off' !== $NunitoSans || 'off' !== $Poppins || 'off' !== $Roboto ) {
        $font_families = array();

        if ( 'off' !== $NunitoSans ) {
            $font_families[] = 'Nunito+Sans';
        }

        if ( 'off' !== $Poppins ) {
            $font_families[] = 'Poppins';
        }

        if ( 'off' !== $Roboto ) {
            $font_families[] = 'Roboto:wght@400;500;700';
        }

        $query_args = array(
            'family' => implode( '&family=', $font_families ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
    }

    return esc_url_raw( $fonts_url );
}
