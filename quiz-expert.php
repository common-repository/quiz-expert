<?php
/**
 * Plugin Name: Quiz Expert
 * Description: Fast & easy quiz maker. You can also make tests, exams or surveys. Create multiple choice, true false and short question.
 * Version: 1.5.0
 * Author: WePupil
 * Author URI: https://wepupil.com/
 * Plugin URI: https://plugins.wepupil.com/
 * License:	GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: quiz-expert
 *
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.4.8
 * @package QuizExpert
 */

// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'This is restricted.' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function quexp_activate() {
	Inc\Base\QuexpActivate::quexp_activate();
}
register_activation_hook( __FILE__, 'quexp_activate' );

/**
 * The code that runs during plugin deactivation
 */
function quexp_deactivate() {
	Inc\Base\QuexpDeactivate::quexp_deactivate();
}
register_deactivation_hook( __FILE__, 'quexp_deactivate' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\QuexpInit' ) ) {
	Inc\QuexpInit::quexp_register_services();
}