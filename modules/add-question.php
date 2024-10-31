<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Add MCQ</a></li>
		<li><a href="#tab-2">Add True False</a></li>
		<li><a href="#tab-3">Add Short Question</a></li>
		<li><a href="#tab-4">Add User Field</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">
			<!-- Question Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Question</div></div>
		<input type="text" class="quexp-input " id="new_mcq_qname"></div></div>

		<!-- Option Field -->
		<div id="quexp_answers">
		<div class="quexp-row quexp-answer_row " id="mcq_ans_option1"><div class="quexp-input_group">
		<div class="quexp-input_group_prepend"><div class="quexp-input_group_text">&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;</div></div>
		<input type="text"class="regular-text" name="options[]">     
		<div class="quexp-input_group_append"><label class="quexp-cb-container">Correct<input type="checkbox" name="new_chk[]" value="A"><span class="quexp-cb-checkmark"></span></label></div></div></div>

		<div class="quexp-row quexp-answer_row " id="mcq_ans_option2"><div class="quexp-input_group">
		<div class="quexp-input_group_prepend"><div class="quexp-input_group_text">&nbsp;&nbsp;&nbsp;&nbsp;B&nbsp;&nbsp;</div></div>
		<input type="text"class="regular-text" name="options[]"> 
		<div class="quexp-input_group_append"><label class="quexp-cb-container">Correct<input type="checkbox" name="new_chk[]" value="B"><span class="quexp-cb-checkmark"></span></label></div></div></div>

		<div class="quexp-row quexp-answer_row " id="mcq_ans_option3"><div class="quexp-input_group">
		<div class="quexp-input_group_prepend"><div class="quexp-input_group_text">&nbsp;&nbsp;&nbsp;&nbsp;C&nbsp;&nbsp;</div></div>
		<input type="text"class="regular-text" name="options[]">     
		<div class="quexp-input_group_append"><label class="quexp-cb-container">Correct<input type="checkbox" name="new_chk[]" value="C"><span class="quexp-cb-checkmark"></span></label></div></div></div>

		<div class="quexp-row quexp-answer_row " id="mcq_ans_option4"><div class="quexp-input_group">
		<div class="quexp-input_group_prepend"><div class="quexp-input_group_text">&nbsp;&nbsp;&nbsp;&nbsp;D&nbsp;&nbsp;</div></div>
		<input type="text"class="regular-text" name="options[]"> 
		<div class="quexp-input_group_append"><label class="quexp-cb-container">Correct<input type="checkbox" name="new_chk[]" value="D"><span class="quexp-cb-checkmark"></span></label></div></div></div>
		</div>
		<!-- option buttoon -->
		<div class="quexp-row">
		<div class="quexp-infoBtn" onclick="quexp_add_mcq_option_button();">
		<button class="quexp-btn quexp-btn_info quexp-tooltip">Add Option</button>
		</div>
		<div class="quexp-dangerBtn" onclick="quexp_delete_mcq_option_button();">                                  
		<button class="quexp-btn quexp-btn_danger quexp-tooltip" >Delete Option</button>
		</div>
		</div>

		<!-- Explaination Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Explaination</div></div>
		<input type="text" class="quexp-input " id="new_mcq_explaination"></div></div>

				<!-- Input Check Field -->
		<div class="quexp-row" id="inputcheckmcq"></div>

		<!-- Add Question Button -->
		<div class="quexp-row" onclick="quexp_add_mcq_question_button();">
		<button class="quexp-btn quexp-btn_secondary quexp-btn_ls quexp-add_answer">Add Question</button>
		</div>
		</div>

		<div id="tab-2" class="tab-pane">
	    <!-- Question Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Question</div></div>
		<input type="text" class="quexp-input " id="new_tf_qname"></div></div>

		<!-- Answer Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Answer</div></div>
		 <select id="new_tf_answer"><option value="True">True</option><option value="False">False</option></select></div></div>


		<!-- Explaination Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Explaination</div></div>
		<input type="text" class="quexp-input " id="new_tf_explaination"></div></div>

				<!-- Input Check Field -->
		<div class="quexp-row" id="inputchecktf"></div>

		<!-- Add Question Button -->
		<div class="quexp-row" onclick="quexp_add_tf_question_button();">
		<button class="quexp-btn quexp-btn_secondary quexp-btn_ls quexp-add_answer">Add Question</button>
		</div>
		</div>

		<div id="tab-3" class="tab-pane">
	    <!-- Question Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Question</div></div>
		<input type="text" class="quexp-input " id="new_sq_qname"></div></div>

		<!-- Answer Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Answer</div></div>
		<input type="text" class="quexp-input " id="new_sq_answer"></div></div>

		<!-- Explaination Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Explaination</div></div>
		<input type="text" class="quexp-input " id="new_sq_explaination"></div></div>

				<!-- Input Check Field -->
		<div class="quexp-row" id="inputchecksq"></div>

		<!-- Add Question Button -->
		<div class="quexp-row" onclick="quexp_add_sq_question_button();">
		<button class="quexp-btn quexp-btn_secondary quexp-btn_ls quexp-add_answer">Add Question</button>
		</div>
		</div>
		<div id="tab-4" class="tab-pane">
	    <!-- Question Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Question</div></div>
		<input type="text" class="quexp-input " id="new_uf_qname"></div></div>

		<!-- Answer Field -->
		<div class="quexp-row "><div class="quexp-input_group"><div class="quexp-input_group_prepend">
		<div class="quexp-input_group_text">Field Type</div></div>
		 <select id="new_uf_type"><option value="ufinput">Input Field</option><option value="uftext">Text Field</option></select></div></div>


			<!-- Input Check Field -->
		<div class="quexp-row" id="inputcheckuf"></div>

		<!-- Add Question Button -->
		<div class="quexp-row" onclick="quexp_add_uf_question_button();">
		<button class="quexp-btn quexp-btn_secondary quexp-btn_ls quexp-add_answer">Add User Data Field</button>
		</div>
		</div>
	</div>




                            