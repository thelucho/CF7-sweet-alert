<?php
/*
Plugin Name: CF7 Sweet Alert
Plugin URI: https://github.com/thelucho/cf7-sweet-alert
Description: Plugin to show beautiful CF7 alerts using Sweet Alert
Author: Luciano Dichiara
Version: 1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Get out!' );
}

// Global variables
define ( 'CF7SA_NAME', 'Contact Form 7 Sweet Alert' ) ;
define ( 'CF7SA_PATH', plugin_dir_url( __FILE__ ) );

/**
 * Checks if CF7 plugin is activated
 */
function cf7sa_validations () {
    global $wp_version ;
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' ) ;  // to get is_plugin_active() early

    if ( ! is_plugin_active ( 'contact-form-7/wp-contact-form-7.php' ) ) {
        return false ;
    }

    return true ;
}

/**
 * Show error message if CF7 is not activated
 */
function cf7sa_validations_error () {
    global $wp_version ;

    ?>
	<div class="error">
		<p>Error: El plugin <strong>Contact Form 7</strong> no está activado. Activalo para poder usar CF7 Sweet Alert.</p>
	</div>
	<?php 
}




if ( ! cf7sa_validations() ) {

	add_action( 'admin_notices', 'cf7sa_validations_error' );

} else {
	
	// ADD CSS files.
	add_action('wp_enqueue_scripts', 'cf7_sweet_alert_css', 100);
	function cf7_sweet_alert_css(){
		wp_register_style( 'cf7-sweet-alert-css', CF7SA_PATH . 'css/cf7-sweetAlert.css' ); 
		wp_enqueue_style( 'cf7-sweet-alert-css' );
	}

	// ADD JS files.
	add_action( 'wp_enqueue_scripts', 'cf7_sweet_alert_js' );
	function cf7_sweet_alert_js() {
		wp_register_script( 'cf7_sweet_alert_core', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js', array (), 1.0, true);
		wp_enqueue_script( 'cf7_sweet_alert_core');
		wp_register_script( 'cf7_sweet_alert_custom', CF7SA_PATH . 'js/cf7-sweetAlert.js', array (), NULL, true);
		wp_enqueue_script( 'cf7_sweet_alert_custom');
	}

}


