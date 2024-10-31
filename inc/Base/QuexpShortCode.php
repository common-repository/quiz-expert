<?php 
/**
 * shortcode initialize
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
namespace Inc\Base;

use Inc\Base\QuexpBaseController;

/**
* 
*/
class QuexpShortCode extends QuexpBaseController
{
	public function quexp_register() {
		add_shortcode( 'quiz_expert', array( $this, 'quexp_front_post_sc' ) );
	}
	
	function quexp_front_post_sc($atts, $content = null)
	{
		$a = shortcode_atts(array(
			'id' => '',
		), $atts);
		$quiz_id=$a['id'];
		require_once( "$this->plugin_path/templates/front-qp.php" );
		return;
	}
}

