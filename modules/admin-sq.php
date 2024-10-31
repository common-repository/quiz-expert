<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */

$answers_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_answers_table(). "  WHERE q_id=$q_id", ""), ARRAY_A );

foreach ($answers_details as $key => $answer_value) { $answer=$answer_value['answer'];}

$explainations_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_explainations_table(). "  WHERE q_id=$q_id", ""), ARRAY_A );

foreach ($explainations_details as $key => $explaination_value) { $explaination=$explaination_value['explaination'];}
        ?> 
<br/>
<div class="embox" id="q_box<?php echo esc_attr( $q_id);?>">
<div class="quexp-q"><?php echo wp_kses_post( $q_sl.".&nbsp;&nbsp;&nbsp;");?><a id="qname_sq_val<?php echo esc_attr( $q_id);?>" style="color:#393939"><?php echo wp_kses_post($question )?></a>&nbsp;&nbsp;
</div>
<!-- Quetion edit delete button -->
<div class="quexp-dangerBtn">
<a href="#TB_inline?width=600&height=550&inlineId=delete_question_popup" title="Delete Question" class="thickbox" onclick="quexp_delete_question_button(<?php echo esc_attr( $q_id); ?>);">
<button class="quexp-btn quexp-btn_danger quexp-tooltip" >
<span class="quexp-tooltiptext quexp-tooltip-bottom">Delete Question</span><span class="dashicons dashicons-trash"></span>
<i class="quexp-icon-trash"></i>
</button></a>
</div>
<div class="quexp-warningBtn">
<a href="#TB_inline?width=600&height=550&inlineId=edit_question_popup" title="Edit Question" class="thickbox" onclick="quexp_edit_sq_question_button(<?php echo esc_attr( $q_id); ?>);"> 
<button class="quexp-btn quexp-btn_warning quexp-tooltip" >
<span class="quexp-tooltiptext quexp-tooltip-bottom">Edit Question</span><span class="dashicons dashicons-edit-large"></span>
<i class="quexp-icon-edit"></i>
</button></a>
</div>
<!-- End quetion edit delete button -->
<br/>
<div>Answer: <a class="row-title" id="answer_sq_val<?php echo esc_attr( $q_id);?>"><?php echo wp_kses_post( $answer);?></a></div>
<?php if ($explaination !=""){ ?>
<div id="explain_div<?php echo esc_attr( $q_id);?>">Explaination: <a class="row-title" id="explaination_sq_val<?php echo esc_attr( $q_id);?>"><?php echo wp_kses_post( $explaination);?></a></div>
<?php } else {  ?>
<div id="explain_div<?php echo esc_attr( $q_id);?>"></div>
<?php } ?>
</div>

