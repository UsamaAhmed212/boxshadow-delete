<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Shortcode [heart]
function shortcode_heart() {

	return '<span class="heart"></span>';
}
add_shortcode( 'heart', 'shortcode_heart' );


// Shortcode Support Widget
add_filter( 'widget_text', 'do_shortcode' );

