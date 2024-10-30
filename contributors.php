<?php
/*
Plugin Name: 	SX Welcome Pages
Plugin URI: 	https://www.seomix.fr
Description: 	A WordPress plugin to display a contributors page on admin pages.
Author: 		Daniel Roch - SeoMix
Author URI: 	https://www.seomix.fr
Version:            0.0.4
Requires at least:  4.4
Tested up to:       6.5
Text Domain:        contributors
Domain Path:        /languages/
License:            GPLv2
License URI:        http://www.gnu.org/licenses/gpl-2.0.html
Copyright (C) 2016, SeoMix - contact@seomix.fr
*/


/**
 * Security
 */
defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );



/**
 * New admin pages to display Contributors
 */
class sxcontributors {

	/**
	 * Construct class
	 * Avoid launching concurrent object
	 *
	 * @since   0.0.1
	 * @author  Vincent Blée - SeoMix
	 *
	 * @global  void
	 * @param 	void
	 * @return  void
	 */
	public static $instance;
	public function __construct() {
		self::$instance = $this;
		self::sx_contributors_load();
	}
	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	 * Unserializing instances of this class is forbidden.
	 */
	private function __wakeup() {}

	/**
	 * Cloning of this class is forbidden.
	 */
	private function __clone() {}


	/**
	 * Loading Contributors plugin
	 *
	 * @since   0.0.1
	 * @author  Daniel Roch - SeoMix
	 *
	 * @global  void
	 * @param 	void
	 * @return  void
	 */
	public static function sx_contributors_load() {

		// Load language files
		add_action( 'plugins_loaded',  	array( __CLASS__, 'sx_contributors_language' ) );

		// Add new menus
		add_action( 'admin_menu',   	array( __CLASS__, 'sx_contributors_adm_dashboard_menu' ) );

		// Redirect users
		add_action( 'wp_login',  		array( __CLASS__, 'sx_contributors_adm_dashboard_redirect' ) );

	}


	/**
	 * Language files
	 *
	 * @since   0.0.1
	 * @author  Daniel Roch - SeoMix
	 *
	 * @global  void
	 * @param 	void
	 * @return  void
	 */
	public static function sx_contributors_language() {
		$location = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
		load_plugin_textdomain( 'contributors', false, $location );
	}


	/**
	 * Redirect users after login
	 *
	 * @since   0.0.1
	 * @author  Daniel Roch - SeoMix
	 *
	 * @global  void
	 * @param 	void
	 * @return  void
	 */
	public static function sx_contributors_adm_dashboard_redirect() {
		$url    = admin_url('admin.php?page=contributors');
		wp_redirect( $url);
		exit;
	}
	

	/**
	 * Add Dashboard Pages
	 *
	 * @since   0.0.1
	 * @author  Daniel Roch - SeoMix
	 *
	 * @global  void
	 * @param 	void
	 * @return  void
	 */
	public static function sx_contributors_adm_dashboard_menu() {
		add_dashboard_page(
			get_bloginfo( 'name' ).__( ' HomePage', 'contributors' ),
			get_bloginfo( 'name' ),
			'read',
			'contributors',
			array( __CLASS__, 'sx_contributors_adm_dashboard_content' )
		);
		add_dashboard_page(
			__( 'Who is managing this website ?', 'contributors' ),
			__( 'Who is managing this website ?', 'contributors' ),
			'read',
			'contributors-who',
			array( __CLASS__, 'sx_contributors_adm_dashboard_content_who' )
		);
	}


	/**
	 * Content for each menu
	 *
	 * @since   0.0.1
	 * @author  Daniel Roch - SeoMix
	 *
	 * @global  void
	 * @param 	void
	 * @return  void
	 */
	public static function sx_contributors_adm_dashboard_content() {
		include 'admin-home-tab1.php';
	}
	public static function sx_contributors_adm_dashboard_content_who() {
		include 'admin-home-tab2.php';
	}

}

// Let's go !
sxcontributors::get_instance();