<?php
/**
 * Plugin Name: Ascp block addon
 * Description: Elementor test addon.
 * Plugin URI:  https://ascpblockaddon.com/
 * Version:     1.0.0
 * Author:      Ascp Developer
 * Author URI:  https://ashik.rahman.com/
 * Text Domain: ascp-block-widget
 *
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
* Register oEmbed Widget.
* Include widget file and register widget class.
*/
function register_ascp_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/ascp-widget.php' );

	$widgets_manager->register( new \Ascp_Element_Widget() );

}
add_action( 'elementor/widgets/register', 'register_ascp_widget' );




/**
* Register scripts and styles for Elementor test widgets.
*/
function ascp_block_widgets_dependencies() {

	/* Scripts */
	wp_register_script( 'first-widget-script', plugins_url( 'assets/js/first-widget.js', __FILE__ ) );
	// wp_register_script( 'widget-script-2', plugins_url( 'assets/js/widget-script-2.js', __FILE__ ), [ 'external-library' ] );
	// wp_register_script( 'external-library', plugins_url( 'assets/js/libs/external-library.js', __FILE__ ) );

	/* Styles */
	wp_register_style( 'first-widget-style', plugins_url( 'assets/css/first-widget.css', __FILE__ ) );
	// wp_register_style( 'widget-style-2', plugins_url( 'assets/css/widget-style-2.css', __FILE__ ), [ 'external-framework' ] );
	// wp_register_style( 'external-framework', plugins_url( 'assets/css/libs/external-framework.css', __FILE__ ) );

}
add_action( 'wp_enqueue_scripts', 'ascp_block_widgets_dependencies' );
