<?php

/**
 * Plugin Name: Repeater FAQ field with Scema
 * Author:      Anmol singh
 * Version:     1.0
 * Description: Repeater faq for posts 
 */


/**
 * Deactivation hook.
 */
function rf_deactivate() {
	delete_option( 'rf-faq' );
}
register_deactivation_hook( __FILE__, 'rf_deactivate' );

add_action('admin_menu', function () {
    add_menu_page('Repeater FAQ Field', 'FAQ admin', 'manage_options', 'repeater-faq-field', 'repeater_faq_field_callback');
});

require_once 'repeater_faq_field_callback.php';


add_action('add_meta_boxes', function () {
    $status = get_option('rf-faq', false);
    if($status){
        add_meta_box('custom_faq_block', 'Faqs', 'custom_faq_block_callback', 'post');
    }
});

require_once 'faq-meta-box.php';

require_once 'functions.php';

