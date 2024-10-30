<?php
/**
 * Plugin Name: Image Wide align
 * Plugin URI: https://www.wordpress.com/
 * Description: Add option of wide align images in wordpress editor for old themes in wordpress. Using this plugin Resolved issue of wide and full align images in wordpress editor.
 * Version: 1.2
 * Author: Hitesh Verma
 * Author URI: #
 * Author Email: hitesh.verma0@gmail.com
 * License: GPL2
 * License URI:  #
 * Text Domain:  #
 * Domain Path:  #
 */
define('GIWA_LICENSE', true );
define("GIWA_DIR", dirname(__FILE__));
define("GIWA_DIR_PATH", plugin_dir_path(__FILE__)); 
define('GIWA_PLUGIN_URL', plugin_dir_url(__FILE__));


 
/* Include css and Js*/
function giwa_include_css() {
    if(!empty(get_option('_plugin_giwa_active'))&&get_option('_plugin_giwa_active')==1){
        wp_enqueue_style('gia-style', GIWA_PLUGIN_URL.'css/gia-style.min.css','1.0.0','all'); 
    }
} 
add_action( 'wp_enqueue_scripts','giwa_include_css'); 

function giwa_theme_setup() { 
	if(!empty(get_option('_plugin_giwa_active'))&&get_option('_plugin_giwa_active')==1&&get_option( 'template' )!="twentynineteen"){
		add_theme_support( 'align-wide' );
	}
}
add_action( 'after_setup_theme', 'giwa_theme_setup' );


function giwa_installer(){ 
    if (!empty(get_option('_plugin_giwa_active'))&&get_option('_plugin_giwa_active')!== false ) {
        update_option('_plugin_giwa_active','1');
    }else {
        add_option('_plugin_giwa_active','1',null,'no');
    }
}
function giwa_deactivation(){  
    update_option('_plugin_giwa_active','0');
}

register_activation_hook( __FILE__, 'giwa_installer' );
register_deactivation_hook(__FILE__, 'giwa_deactivation');
