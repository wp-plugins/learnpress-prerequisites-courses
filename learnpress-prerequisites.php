<?php
/*
Plugin Name: LearnPress Prerequisite Courses
Plugin URI: http://thimpress.com/learnpress
Description: Course you have to finish before you can enroll to this course
Author: thimpress
Version: 0.9.1
Author URI: http://thimpress.com
Tags: learnpress
*/

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'LPR_PREREQUISITES_PLUGIN_PATH', dirname( __FILE__ ) );
/**
 * Register prerequisite course addon
 */
function learn_press_register_prerequisites() {

	require_once( LPR_PREREQUISITES_PLUGIN_PATH . '/init.php' );
}

add_action( 'learn_press_register_add_ons', 'learn_press_register_prerequisites' );


add_action( 'plugins_loaded', 'learnpress_prerequisites_translations' );
function learnpress_prerequisites_translations() {
	$textdomain    = 'learnpress_prerequisites';
	$locale        = apply_filters( "plugin_locale", get_locale(), $textdomain );
	$lang_dir      = dirname( __FILE__ ) . '/lang/';
	$mofile        = sprintf( '%s.mo', $locale );
	$mofile_local  = $lang_dir . $mofile;
	$mofile_global = WP_LANG_DIR . '/plugins/' . $mofile;
	if ( file_exists( $mofile_global ) ) {
		load_textdomain( $textdomain, $mofile_global );
	} else {
		load_textdomain( $textdomain, $mofile_local );
	}
}