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

    //Logo Customize
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
        'label'       => __( 'Site Icon', 'boxshadow' ),
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

    /************************** { --New Section-- } **************************/

    /*******************************************************************
    *Theme Customizer Theme Options Section Start
    ********************************************************************/

    //Header Menu Layout
    $wp_customize->selective_refresh->add_partial( 'boxshadow_header_menu_image_radio_button', array(
        'selector'        => '.header-section',
    ) );

    $wp_customize->add_panel( 'boxshadow_theme_options', array(
        'title'          => __('Theme Options', 'boxshadow'),
        'description'    => __('Several settings pertaining my theme', 'boxshadow'),
        'priority'       => 21,
    ) );

    $wp_customize->add_section( 'boxshadow_header_menu', array(
        'title'          => __('Header Menu', 'boxshadow'),
        'panel'          => 'boxshadow_theme_options',
        'priority'       => 2,
    ) );

    // Custom Boxshadow Custom Image Radio Control Class
    class boxshadow_Custom_Image_Radio_Control extends WP_Customize_Control {

        public function render_content() {
    
            if ( empty( $this->choices ) ) return;
    
            $name =  $this->id;
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <ul class="controls" id='boxshadow-radio-img-container'>
                <?php
                foreach ( $this->choices as $value => $label ) { ?>
                    <input <?php $this->link(); ?> type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($value); ?>" <?php $this->link(); checked($this->value(), $value); ?> />
                    <label for="<?php echo esc_attr($value); ?>" >
                        <img src="<?php echo esc_url($label); ?>" />
                    </label>
                <?php
                }
                ?>
            </ul>
            <?php
        }
    
    }

    $wp_customize->add_setting( 'boxshadow_header_menu_image_radio_button', array(
        'default'       => 'header-left',
    ) );
    
    $wp_customize->add_control( new boxshadow_Custom_Image_Radio_Control ( $wp_customize, 'boxshadow_header_menu_image_radio_button', array(
        'label'			=> __( 'Header Layout', 'boxshadow' ),
        'choices'		=> array(
            'header-left'    => get_template_directory_uri() . '/inc/customizer/assets/images/header-left.svg',
            'header-center'  => get_template_directory_uri() . '/inc/customizer/assets/images/header-center.svg',
        ),
        'section'       => 'boxshadow_header_menu',
        'settings'      => 'boxshadow_header_menu_image_radio_button',
	) ) );

    /*******************************************************************
    *Theme Customizer Theme Options Section End
    ********************************************************************/
}
add_action( 'customize_register', 'boxshadow_Customizer_register' );


