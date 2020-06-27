<?php
/*
Plugin Name: CF7 Sweet Alert
Plugin URI: https://github.com/thelucho/cf7-sweet-alert
Description: Plugin to show beautiful CF7 alerts using Sweet Alert
Author: Luciano Dichiara
Version: 1.0
*/

defined('ABSPATH') or die("Bye bye");
define( 'URL_PATH', plugin_dir_url( __FILE__ ) );

/*
 * ADD CSS files.
 */

add_action('wp_enqueue_scripts', 'cf7_sweet_alert_css', 100);
function cf7_sweet_alert_css(){
	wp_register_style( 'cf7-sweet-alert-css', URL_PATH . 'css/cf7-sweetAlert.css' ); 
	wp_enqueue_style( 'cf7-sweet-alert-css' );
}


/*
 * ADD JS files.
 */
add_action( 'wp_enqueue_scripts', 'cf7_sweet_alert_js' );
function cf7_sweet_alert_js() {

	wp_register_script( 'cf7_sweet_alert_core', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js', array (), 1.0, true);
	wp_enqueue_script( 'cf7_sweet_alert_core');

	wp_register_script( 'cf7_sweet_alert_custom', URL_PATH . 'js/cf7-sweetAlert.js', array (), NULL, true);
	wp_enqueue_script( 'cf7_sweet_alert_custom');
	
}