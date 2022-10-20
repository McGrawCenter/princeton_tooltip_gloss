<?php


/************************** ADD BUTTON TO TINYMCE *******************************/


// https://www.gavick.com/blog/wordpress-tinymce-custom-buttons


function pu_tooltip_gloss_add_tinymce_plugin($plugin_array) {
    $plugin_array['princeton_tooltip_gloss_tc_button'] = plugins_url( 'js/editor.js', __FILE__ );
    return $plugin_array;
}




function pu_tooltip_gloss_register_tinymce_button($buttons) {
   array_push($buttons, "gloss");
   return $buttons;
}



function pu_tooltip_gloss_add_tinymce_button() {
    global $typenow;

    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    return;
    }
    add_filter("mce_external_plugins", "pu_tooltip_gloss_add_tinymce_plugin");
    add_filter('mce_buttons', 'pu_tooltip_gloss_register_tinymce_button');

}

add_action('admin_head', 'pu_tooltip_gloss_add_tinymce_button');
