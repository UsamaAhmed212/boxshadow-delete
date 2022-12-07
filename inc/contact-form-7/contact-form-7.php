<?php 
/**
 * Embed Contact Form 7 in Your Custom Theme
 */

function contact_form_7_title( $template ) {
    $template->set_title( 'Contact Form' );
    return $template;
}
add_filter( 'wpcf7_contact_form_default_pack', 'contact_form_7_title' );

// function contact_form_7_content( $template, $prop ) {
//     if ( 'form' == $prop ) {
//       return implode( '', array(
//         '<div class="row">',
//           '<div class="col">',
//             '[text* your-name placeholder"Name"]',
//             '[email* your-email placeholder"Email"]',
//             '[text* your-subject placeholder"Subject"]',
//           '</div>',
//           '<div class="col">',
//             '[textarea* your-message placeholder"Message"]',
//           '</div>',
//         '</div>',
//         '<div class="row">',
//           '[submit class:btn "Send Mail"]',
//         '</div>'
//       ) );
//     } else {
//       return $template;
//     } 
// }
// add_filter( 'wpcf7_default_template', 'contact_form_7_content', 10, 2 );
