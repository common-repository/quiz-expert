<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
if($q_type == "ufinput"){
    $newq_type= "Input Field";
  }
  else{
     $newq_type= "Text Field";
  }

?>
<br/>
<div class="embox" id="q_box<?php echo esc_attr( $q_id);?>">
<div class="quexp-q"><?php echo wp_kses_post( $q_sl.".&nbsp;&nbsp;&nbsp;");?><a id="qname_uf_val<?php echo esc_attr( $q_id);?>" style="color:#393939"><?php echo wp_kses_post($question )?></a>&nbsp;&nbsp;
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
<a href="#TB_inline?width=600&height=550&inlineId=edit_question_popup" title="Edit Question" class="thickbox" onclick="quexp_edit_uf_question_button(<?php echo esc_attr( $q_id); ?>);"> 
<button class="quexp-btn quexp-btn_warning quexp-tooltip" >
<span class="quexp-tooltiptext quexp-tooltip-bottom">Edit Question</span><span class="dashicons dashicons-edit-large"></span>
<i class="quexp-icon-edit"></i>
</button></a>
</div>
<!-- End quetion edit delete button -->

<br/>
<div>Field Type: <a class="row-title" id="type_uf_val<?php echo esc_attr( $q_id);?>"><?php echo wp_kses_post( $newq_type);?></a></div>

</div>
