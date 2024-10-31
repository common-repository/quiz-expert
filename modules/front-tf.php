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

<h3><?php echo wp_kses_post( $q_sl.". ".$tf_question );?></h3>
<?php if($quiz_type == "Exam"){ ?><select id="answer<?php echo esc_attr( $q_sl); ?>">
                            <option value="True">True</option>
                            <option value="False">False</option>
                         </select><?php } ?>
<?php if($quiz_type == "Exercise"){ ?>True <br/> False <?php } ?>

<input type="hidden" id="correct_answer<?php echo esc_attr( $q_sl);?>" value="<?php echo esc_attr( $answer);?>">
<input type="hidden" id="explaination<?php echo esc_attr( $q_sl);?>" value="<?php echo esc_attr( $explaination);?>">
<?php if($quiz_type == "Exam"){ ?>
    <div id="answer_div<?php echo esc_attr( $q_sl);?>"></div><hr>
<?php } ?>
<?php if($quiz_type == "Exercise"){ ?>
    <div id="answer_div<?php echo esc_attr( $q_sl);?>" style="text-color: #000000; border: #ececa3 ; background: #ececa3" onclick="quexp_show_answer_button(<?php echo esc_attr( $q_sl);?>);">&nbsp;&nbsp; Show Answer</div>
<?php } ?>
<?php

?>

<br/>