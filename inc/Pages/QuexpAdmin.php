<?php 
/**
 * Pages in admin
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
namespace Inc\Pages;

use Inc\Api\QuexpSettingsApi;
use Inc\Base\QuexpBaseController;
use Inc\Api\Callbacks\QuexpAdminCallbacks;

/**
* 
*/
class QuexpAdmin extends QuexpBaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public $subpages = array();

	public function quexp_register() 
	{
		$this->settings = new QuexpSettingsApi();
		$this->callbacks = new QuexpAdminCallbacks();

		$this->setPages();
		$this->setSubpages();



		$this->settings->addPages( $this->pages )->withSubPage( 'All Quizzes' )->addSubPages( $this->subpages )->quexp_register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'Quiz Expert', 
				'menu_title' => 'Quiz Expert', 
				'capability' => 'edit_pages', 
				'menu_slug' => 'quiz-expert', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-welcome-learn-more', 
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'quiz-expert', 
				'page_title' => 'Add New', 
				'menu_title' => 'Add New', 
				'capability' => 'edit_pages', 
				'menu_slug' => 'quiz-expert-add-new', 
				'callback' => array( $this->callbacks, 'adminAddNew' )
			),
			array(
				'parent_slug' => 'quiz-expert-add-new', 
				'page_title' => 'Edit Quiz', 
				'menu_title' => 'Edit Quiz', 
				'capability' => 'edit_pages', 
				'menu_slug' => 'quiz-expert-edit-quiz', 
				'callback' => array( $this->callbacks, 'adminEdit' )
			),
			array(
				'parent_slug' => 'quiz-expert', 
				'page_title' => 'Results', 
				'menu_title' => 'Results', 
				'capability' => 'edit_pages', 
				'menu_slug' => 'quiz-expert-result', 
				'callback' => array( $this->callbacks, 'adminResult' )
			),
			array(
				'parent_slug' => 'quiz-expert-result', 
				'page_title' => 'Record', 
				'menu_title' => 'Record', 
				'capability' => 'edit_pages', 
				'menu_slug' => 'quiz-expert-record', 
				'callback' => array( $this->callbacks, 'adminRecord' )
			),
		);
	}

	
}