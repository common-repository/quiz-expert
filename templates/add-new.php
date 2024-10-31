<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
$quiz_uid = get_current_user_id();
?>

<input type="hidden" id="quiz_uid" value="<?php echo esc_attr( $quiz_uid); ?>">
<div class="wrap">
            <h1 class="wp-heading-inline">Create New Quiz</h1>
			<hr class="wp-header-end"><br/><br/>
<div class="embox">

	    <!-- Quiz Title Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Quiz Title</div></div>
		<input type="text" class="quexp-input " id="new_exam"></div></div>

		<!-- Type Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Quiz Type</div></div>
         <select id="new_type"><option value="Exam">Exam</option><option value="Exercise">Exercise</option></select></div></div>
         
         <div class="quexp-row" id="new_exam_comment"></div>

         <div class="quexp-row" onclick="quexp_add_exam_button();">
		<button class="quexp-btn quexp-btn_secondary quexp-btn_ls quexp-add_answer">Add Quiz</button>
        </div>
</div></div>