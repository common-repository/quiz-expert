<?php 
/**
 * Callback pages
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
namespace Inc\Api\Callbacks;

use Inc\Base\QuexpBaseController;

class QuexpAdminCallbacks extends QuexpBaseController
{
	//All quizes in admin page
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}
	// Add New Quiz Page
	public function adminAddNew()
	{
		return require_once( "$this->plugin_path/templates/add-new.php" );
	}
	//Edit Quiz Page
	public function adminEdit()
	{
		return require_once( "$this->plugin_path/templates/edit.php" );
	}
	public function adminResult()
	{
		return require_once( "$this->plugin_path/templates/result.php" );
	}
	public function adminRecord()
	{
		return require_once( "$this->plugin_path/templates/record.php" );
	}
}