<?php 
/**
 * db table function
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
namespace Inc\Base;

/**
* 
*/
class QuexpDBTableCall
{

	public function quexp_posts_table(){
		global $wpdb;
		return $wpdb->prefix ."posts";
	}

    public function quexp_quizzes_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_quizzes";
	}
	public function quexp_questions_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_questions";
	}
	public function quexp_mcq_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_mcq_options";
	}
	public function quexp_answers_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_answers";
	}
	public function quexp_explainations_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_explainations";
	}
	public function quexp_results_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_results";
	}
	public function quexp_records_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_record_room";
	}
	public function quexp_uf_table(){
		global $wpdb;
		return $wpdb->prefix ."quexp_user_fields";
	}
	public function quexp_users_table(){
		global $wpdb;
		return $wpdb->prefix ."users";
	}
}