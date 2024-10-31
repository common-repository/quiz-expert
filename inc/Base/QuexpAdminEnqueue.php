<?php 
/**
 *  enqueue scripts for admin
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
namespace Inc\Base;

use Inc\Base\QuexpBaseController;

/**
* 
*/
class QuexpAdminEnqueue extends QuexpBaseController
{
	public function quexp_register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'quexp_admin_enqueue' ) );
	}
	
	function quexp_admin_enqueue() {
		// enqueue scripts for admin
		wp_register_style('quexp_examstyle', $this->plugin_url . 'assets/examstyle.css');
		wp_enqueue_style('quexp_examstyle');
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'quexp_examscript', $this->plugin_url . 'assets/examscript.js' );
		wp_enqueue_script( 'quexp_mcqscript', $this->plugin_url . 'assets/mcqscript.js' );
		wp_enqueue_script( 'quexp_questionscript', $this->plugin_url . 'assets/questionscript.js' );
		wp_enqueue_script( 'quexp_tabscript', $this->plugin_url . 'assets/tabscript.js' );
		wp_enqueue_script( 'quexp_optionscript', $this->plugin_url . 'assets/optionscript.js' );

		wp_localize_script( 'quexp_examscript', 'quexp_examajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));     
		wp_localize_script( 'quexp_mcqscript', 'quexp_mcqajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));    
		wp_localize_script( 'quexp_questionscript', 'quexp_questionajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));    
	 
	}
} 