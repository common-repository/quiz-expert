<?php 
/**
 * Jquery ajax data store in mysql
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
namespace Inc\Base;

//use Inc\Base\DBTableCall;

/**
* 
*/
class QuexpAjaxCall
{
	public function quexp_register() {
		add_action( 'wp_ajax_quexp_add_exam', array( $this, 'quexp_ajax_call_add_exam' ) );

		add_action( 'wp_ajax_quexp_add_mcq_question', array( $this, 'quexp_ajax_call_add_mcq_question' ) );
		add_action( 'wp_ajax_quexp_add_tf_question', array( $this, 'quexp_ajax_call_add_tf_question' ) );
		add_action( 'wp_ajax_quexp_add_sq_question', array( $this, 'quexp_ajax_call_add_sq_question' ) );

		add_action( 'wp_ajax_quexp_insert_all_question', array( $this, 'quexp_ajax_call_insert_all_question' ) );
		add_action( 'wp_ajax_quexp_save_all_question', array( $this, 'quexp_ajax_call_save_all_question' ) );

				
		add_action( 'wp_ajax_quexp_add_user_field', array( $this, 'quexp_ajax_call_add_user_field' ) );
		add_action( 'wp_ajax_quexp_save_user_field', array( $this, 'quexp_ajax_call_save_user_field' ) );

		add_action( 'wp_ajax_quexp_delete_question', array( $this, 'quexp_ajax_call_delete_question' ) );
		add_action( 'wp_ajax_quexp_delete_exam', array( $this, 'quexp_ajax_call_delete_exam' ) );
		add_action( 'wp_ajax_quexp_save_settings', array( $this, 'quexp_ajax_call_save_settings' ) );
		add_action( 'wp_ajax_quexp_delete_result', array( $this, 'quexp_ajax_call_delete_result' ) );

		add_action( 'wp_ajax_quexp_record_room', array( $this, 'quexp_ajax_call_record_room' ) );
		add_action( 'wp_ajax_quexp_record_result', array( $this, 'quexp_ajax_call_record_result' ) );
		add_action( 'wp_ajax_quexp_record_field', array( $this, 'quexp_ajax_call_record_field' ) );
		add_action( 'wp_ajax_nopriv_quexp_record_room', array( $this, 'quexp_ajax_call_record_room' ) );
		add_action( 'wp_ajax_nopriv_quexp_record_result', array( $this, 'quexp_ajax_call_record_result' ) );
		add_action( 'wp_ajax_nopriv_quexp_record_field', array( $this, 'quexp_ajax_call_record_field' ) );
		
	}
	function quexp_global_add_question($quiz_id_val, $qname_val, $q_type_val){
		global $wpdb;
		$wpdb->insert($wpdb->prefix ."quexp_questions", array(
			"quiz_id" => $quiz_id_val,
			"question" => $qname_val,
			"type" => $q_type_val,
		));

		$q_id = $wpdb->insert_id;
		echo  $q_id;
		exit();
		wp_die();
		}


	function quexp_global_insert_question($q_id_val,$options_val,$answer_val,$explaination_val){
		global $wpdb;
		if($options_val != ""){
		$wpdb->insert($wpdb->prefix ."quexp_mcq_options", array(
			"q_id" => $q_id_val,
			"optionvalue" => $options_val,
		));
		}
		$wpdb->insert($wpdb->prefix ."quexp_answers", array(
		"q_id" => $q_id_val,
		"answer" => $answer_val,
		));

		if ($explaination_val != ""){
		$wpdb->insert($wpdb->prefix ."quexp_explainations", array(
			"q_id" => $q_id_val,
			"explaination" => $explaination_val,
		));
		}
		echo "1";
		exit();
		wp_die();
	}
	function quexp_global_save_question($q_id_val, $qname_val,$options_val, $answer_val, $explaination_val){
		global $wpdb;

		$wpdb->update($wpdb->prefix ."quexp_questions", array(
					"question" => $qname_val,
				),array('q_id' => $q_id_val));
				
		if($options_val != ""){
		$wpdb->update($wpdb->prefix ."quexp_mcq_options", array(
					"optionvalue" => $options_val,
				),array('q_id' => $q_id_val));
		}		
		$wpdb->update($wpdb->prefix ."quexp_answers", array(
					"answer" => $answer_val,
				),array('q_id' => $q_id_val));

		$explain_details = $wpdb->get_results(
			$wpdb->prepare("SELECT * from " .$wpdb->prefix ."quexp_explainations  WHERE q_id=$q_id_val", ""), ARRAY_A
		);
		
		if (count($explain_details) > 0) {
			if($explaination_val !=""){
			$wpdb->update($wpdb->prefix ."quexp_explainations", array(
					"explaination" => $explaination_val,
				),array('q_id' => $q_id_val)); }
			else{
			$wpdb->delete($wpdb->prefix ."quexp_explainations",
			array('q_id' => $q_id_val));}
			}
		else{
			if ($explaination_val != ""){
				$wpdb->insert($wpdb->prefix ."quexp_explainations", array(
					"q_id" => $q_id_val,
					"explaination" => $explaination_val,
				));
				}
		}

		echo esc_attr("1");
		exit();
		wp_die();
	}


	function quexp_ajax_call_add_exam(){
		global $wpdb;
		$ename=sanitize_text_field($_POST['exam_val']);
		$uid=sanitize_text_field($_POST['uid_val']);
		$etype=sanitize_text_field($_POST['type_val']);

		$quiz_exam_post = array(
			'post_title'    => $ename,
			'post_status'   => 'publish',
			"post_type" =>"post"
		);

		$quiz_post_id = wp_insert_post( $quiz_exam_post );


		$wpdb->insert($wpdb->prefix ."quexp_quizzes", array(
					"uid" => $uid,
					"post_id" => $quiz_post_id,
					"type" => $etype,
				));

		$quiz_id = $wpdb->insert_id;

		$wpdb->update($wpdb->prefix ."posts", array(
			'post_content'  => "[quiz_expert id=$quiz_id]",
		),
		array('ID' => $quiz_post_id));

		echo esc_attr($quiz_id);
		exit();
		wp_die();
	}

	function quexp_ajax_call_add_mcq_question(){
		$quiz_id=sanitize_text_field($_POST['quiz_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);
		$q_type="mcq";

		self::quexp_global_add_question($quiz_id,$qname,$q_type);
	}

	function quexp_ajax_call_insert_all_question(){
		$q_id=sanitize_text_field($_POST['q_id_val']);
		$options=sanitize_text_field($_POST['options_val']);
		$answer=sanitize_text_field($_POST['answer_val']);
		$explaination=sanitize_text_field($_POST['explaination_val']);

		self::quexp_global_insert_question($q_id,$options,$answer,$explaination);
	}

	function quexp_ajax_call_save_all_question(){
		$q_id=sanitize_text_field($_POST['q_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);
		$options=sanitize_text_field($_POST['options_val']);
		$answer=sanitize_text_field($_POST['answer_val']);
		$explaination=sanitize_text_field($_POST['explaination_val']);

		self::quexp_global_save_question($q_id,$qname,$options,$answer,$explaination);

	}
	function quexp_ajax_call_add_tf_question(){
		$quiz_id=sanitize_text_field($_POST['quiz_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);
		$q_type="tf";

		self::quexp_global_add_question($quiz_id,$qname,$q_type);
	}
	
	function quexp_ajax_call_add_sq_question(){
		$quiz_id=sanitize_text_field($_POST['quiz_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);
		$q_type="sq";

		self::quexp_global_add_question($quiz_id,$qname,$q_type);
	}

	function quexp_ajax_call_add_user_field(){
		$quiz_id=sanitize_text_field($_POST['quiz_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);
		$q_type=sanitize_text_field($_POST['type_val']);;
		self::quexp_global_add_question($quiz_id,$qname,$q_type);
	}

	
	function quexp_ajax_call_save_user_field(){
		global $wpdb;
		$q_id=sanitize_text_field($_POST['q_id_val']);
		$qname=sanitize_text_field($_POST['qname_val']);
		$q_type=sanitize_text_field($_POST['q_type_val']);

		$wpdb->update($wpdb->prefix ."quexp_questions", array(
			"question" => $qname,
			"type" => $q_type,
		),array('q_id' => $q_id));
		
		echo "1";
	}

	function quexp_ajax_call_delete_question(){
		global $wpdb;
		$q_id=sanitize_text_field($_POST['q_id_val']);
		$q_type=sanitize_text_field($_POST['q_type_val']);

		$wpdb->delete($wpdb->prefix ."quexp_questions",
		array('q_id' => $q_id));

		if($q_type=="mcq" || $q_type=="sq" || $q_type=="tf"){
		$wpdb->delete($wpdb->prefix ."quexp_answers",
		array('q_id' => $q_id));

		$wpdb->delete($wpdb->prefix ."quexp_explainations",
		array('q_id' => $q_id));
		}

		if($q_type=="mcq"){
		$wpdb->delete($wpdb->prefix ."quexp_mcq_options",
				array('q_id' => $q_id));}

		if($q_type=="ufinput" || $q_type=="uftext"){
		$wpdb->delete($wpdb->prefix ."quexp_user_fields",
				array('q_id' => $q_id));}
			echo "1";
		exit();
		wp_die();
	}

	function quexp_ajax_call_delete_exam(){
		global $wpdb;
		$quiz_id=sanitize_text_field($_POST['quiz_id_val']);
		$wp_post_id=sanitize_text_field($_POST['wp_post_id_val']);

		$wpdb->delete($wpdb->prefix ."posts",
		array('ID' => $wp_post_id));

		$wpdb->delete($wpdb->prefix ."quexp_quizzes",
		array('quiz_id' => $quiz_id));

		$q_details = $wpdb->get_results(
			$wpdb->prepare("SELECT * from " .$wpdb->prefix ."quexp_questions  WHERE quiz_id=$quiz_id", ""), ARRAY_A
		);

		foreach ($q_details as $key => $q_value){
				$q_id=$q_value['q_id'];
				$q_type=$q_value['type']; 

		$wpdb->delete($wpdb->prefix ."quexp_questions",
		array('q_id' => $q_id));

		$wpdb->delete($wpdb->prefix ."quexp_answers",
		array('q_id' => $q_id));

		$wpdb->delete($wpdb->prefix ."quexp_explainations",
		array('q_id' => $q_id));

				
		if($q_type=="mcq"){
		$wpdb->delete($wpdb->prefix ."quexp_mcq_options",
				array('q_id' => $q_id));}
		}
		echo esc_attr("1");
		exit();
		wp_die();
	}


	function quexp_ajax_call_save_settings(){
		global $wpdb;
		$quiz_id=sanitize_text_field($_POST['quiz_id_val']);
		$quiz_type=sanitize_text_field($_POST['quiz_type_val']);
		$quiz_time=sanitize_text_field($_POST['quiz_time_val']);


		$wpdb->update($wpdb->prefix ."quexp_quizzes", array(
					"type" => $quiz_type,
					"time" => $quiz_time,
				),
			    array('quiz_id' => $quiz_id));
		echo esc_attr("1");
		exit();
		wp_die();
	}
	function quexp_ajax_call_record_room(){
		global $wpdb;
		$quiz_id=sanitize_text_field($_POST['quiz_id_val']);
		$quiz_user_id=sanitize_text_field($_POST['quiz_user_id_val']);

		$wpdb->insert($wpdb->prefix ."quexp_record_room", array(
			"uid" => $quiz_user_id,
			"quiz_id" => $quiz_id,
			
		));
		$rr_id = $wpdb->insert_id;
		echo $rr_id;
		exit();
		wp_die();
	}
	function quexp_ajax_call_record_field(){
		global $wpdb;
		$rr_id=sanitize_text_field($_POST['rr_id_val']);
		$q_id=sanitize_text_field($_POST['q_id_val']);
		$uftext=sanitize_text_field($_POST['uf_text_val']);

		$wpdb->insert($wpdb->prefix ."quexp_user_fields", array(
			"rr_id" => $rr_id,
			"q_id" => $q_id,
			"uftext" => $uftext,
		));
		exit();
		wp_die();
	}
	function quexp_ajax_call_record_result(){
		global $wpdb;
		$rr_id=sanitize_text_field($_POST['rr_id_val']);
		$mark=sanitize_text_field($_POST['mark_val']);

		$wpdb->insert($wpdb->prefix ."quexp_results", array(
			"rr_id" => $rr_id,
			"result" => $mark,
		));
		exit();
		wp_die();
	}

	function quexp_ajax_call_delete_result(){
		global $wpdb;
		$rr_id=sanitize_text_field($_POST['rr_id_val']);

		$wpdb->delete($wpdb->prefix ."quexp_record_room",
		array('rr_id' => $rr_id));

		$wpdb->delete($wpdb->prefix ."quexp_results",
		array('rr_id' => $rr_id));

		$wpdb->delete($wpdb->prefix ."quexp_user_fields",
		array('rr_id' => $rr_id));

		echo "1";
		exit();
		wp_die();
	}
	
	
}