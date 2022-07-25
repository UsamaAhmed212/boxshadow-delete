<?php
/* 
*Theme Functions 
*/


/**
 * Define constants
 */
// Root path/URI.
define( 'BOXSHADOW_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'BOXSHADOW_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );


// Files Enqueue
require_once BOXSHADOW_THEME_DIR . 'inc/enqueue.php';
require_once BOXSHADOW_THEME_DIR . 'inc/theme-setup.php';
require_once BOXSHADOW_THEME_DIR . 'inc/theme-options.php';
require_once BOXSHADOW_THEME_DIR . 'inc/customizer/customize.php';
