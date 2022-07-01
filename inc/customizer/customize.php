<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once BOXSHADOW_THEME_DIR . 'inc/customizer/customize-enqueue.php';


//Theme Site Identity Customizer Register
function boxshadow_Customizer_register( $wp_customize ) {
    /*******************************************************************
    *Theme Customizer Site Logo & Icon ( Site Identity ) Section Start
    ********************************************************************/

    //Site Logo & Icon ( Site Identity ) Section Rename
    $wp_customize->get_section('title_tagline')->title = __( 'Site Logo & Icon' );

    //Blog Name (Site Title) Remove
    $wp_customize->remove_control( 'blogname' );

    //Blog Description (Tagline) Remove
    $wp_customize->remove_control( 'blogdescription' );

    //Logo Register
	$wp_customize->selective_refresh->add_partial( 'boxshadow_logo', array(
        'selector'        => '.navbar-brand',
    ) );
    
    $wp_customize->add_setting( 'boxshadow_logo', array(
        'default' => BOXSHADOW_THEME_URI .'images/logo.png',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'boxshadow_logo', array(
        'label'         => __( 'Logo', 'boxshadow' ),
        'description'   => __( 'Upload your logo image here.', 'boxshadow' ),
        'button_labels' => array( // Optional
            'select'        => __( 'Select Logo' ),
            'change'        => __( 'Change Logo' ),
            'remove'        => __( 'Remove Logo' ),
            'default'       => __( 'Default' ),
            'placeholder'   => __( 'No Logo selected' ),
            'frame_title'   => __( 'Select Logo' ),
            'frame_button'  => __( 'Choose Logo' ),
        ),
        'priority'      => 1,
        'section'       => 'title_tagline',
        'settings'      => 'boxshadow_logo',
    ) ) );



    //Site Icon Customize
    $wp_customize->add_control( new WP_Customize_Site_Icon_Control( $wp_customize, 'site_icon', array(
        'label'       => __( 'Site Icon' ),
        'description' => sprintf(
            /* translators: %s: site icon size in pixels */
            __( 'The Site Icon is used as a browser and app icon for your site. Icons must be square, and at least %s pixels wide and tall.' ),
            '<strong>16</strong>'
        ),
        'section'     => 'title_tagline',
    ) ) );
    
    /*******************************************************************
    *Theme Customizer Site Logo & Icon ( Site Identity ) Section End
    ********************************************************************/



}
add_action( 'customize_register', 'boxshadow_Customizer_register' );

