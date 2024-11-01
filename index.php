<?php
/*
Plugin Name: WP Update Checklist
Description: Easy checklist for WordPress plugins, themes and core updates.
Author: Michal Blazek
Plugin URI: https://www.michalblazek.cz/wordpress/wordpress-update-checklist
Version: 0.1
*/   


add_action('admin_menu', 'pwupcheck_add_to_menu');
 
function pwupcheck_add_to_menu(){
        add_management_page( 'Wordpress Update Checklist', 'Wordpress Update Checklist', 'manage_options', 'pwupcheck_wp_updade_checklist', 'pwupcheck_create_settings_page' );
}
 

function pwupcheck_create_settings_page(){

        echo "<h1>WordPress Update Checklist</h1>";
        echo "<p>Built to proccess smooth WordPress updates and test after significant changes. Always open this file in a new windows and do not close it before all items are checked.</p>";
        require( plugin_dir_path( __FILE__ ) . 'checklist.php');
        echo "<ul id=\"pwupcheck_update_checklist\">"; 
        foreach ( $pwupcheck_updatechecklist as $value ) {
                echo "<li>" . $value ."</li>"; 
        }
        echo "</ul>";
        echo "<p>Feel free to update the checklist array in ".plugin_dir_url( __FILE__ ) . "checklist.php through your plugin editor.</p>";
}

add_action('admin_enqueue_scripts', 'pwupcheck_init_custom_css_js');
 
function pwupcheck_init_custom_css_js($hook) {
  if ( 'tools_page_pwupcheck_wp_updade_checklist' != $hook ) {
        return;
    } 
 
    wp_enqueue_style('updatestyle_css',  plugin_dir_url( __FILE__ ) . 'wpupdatecheklist.css');
    wp_enqueue_script('update_js', plugin_dir_url( __FILE__ ) . 'wpupdatecheklist.js');
} 

?>