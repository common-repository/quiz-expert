<?php
/**
 *All quizzes link in plugins page initialize
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
namespace Inc\Base;

use Inc\Base\QuexpBaseController;

class QuexpSettingsLinks extends QuexpBaseController
{
	public function quexp_register() 
	{
		add_filter( "plugin_action_links_$this->plugin", array( $this, 'quexp_settings_link' ) );
	}

	public function quexp_settings_link( $links ) 
	{
		$settings_link = '<a href="admin.php?page=quiz-expert">All Quizzes</a>';
		array_push( $links, $settings_link );
		return $links;
	}
}