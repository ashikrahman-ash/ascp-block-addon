<?php
/**
* Plugin Name: Ascp Block addon
* Description: Ascp Custom Elementor addon.
* Plugin URI:  https://ashikrahman.com/
* Version:     1.0.0
* Author:     Ashik rahman
* Author URI:  https://ashikrahman.com/
* Text Domain: ascp-block-addon
*
* Elementor tested up to: 3.7.0
* Elementor Pro tested up to: 3.7.0
*/


if (!defined('ABSPATH') ) {
    die(__("Direct Access in not allowed", 'ascp-block-addon'));
}


final class AscpBlockAddon {

	private static $_instance = null;
    
	/**
	 * Instance
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}




    /**
	 * Constructor
	 */
	public function __construct() {

        if ( $this->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

    }

    /**
	 * Load Textdomain
	 */
	public function i18n() {

		load_plugin_textdomain( 'ascp-block-addon' );

	}


    /**
	 * Compatibility Checks
	 */
	public function is_compatible() {}
    
	/**
	 * Initialize
	 */
	public function init() {}

}



