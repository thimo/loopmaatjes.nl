<?php
/*
Plugin Name: Loopmaatjes.nl
Description: Site specific code changes for loopmaatjes.nl
*/
/* Start Adding Functions Below this Line */

add_action('init', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		//show_admin_bar(false);
		add_filter( 'show_admin_bar', '__return_false' );
		//remove_action('init', 'wp_admin_bar_init');
		add_action('wp_footer', 'stick_admin_bar_to_bottom_css');
	}
}

function stick_admin_bar_to_bottom_css() {
        echo "
        <style type='text/css'>
        html {
                margin-top: 0 !important;
        }
        </style>
        ";
}

/* Stop Adding Functions Below this Line */
?>