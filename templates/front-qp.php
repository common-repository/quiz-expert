<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */

global $wpdb;

if ( is_user_logged_in() ) { 
    $quiz_uid = get_current_user_id();}
else{
    $quiz_uid=0;
}

$quiz_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_quizzes_table(). "  WHERE quiz_id=$quiz_id", ""), ARRAY_A
);

foreach ($quiz_details as $key => $quiz_value) {
    $quiz_type=$quiz_value['type']; 
    $quiz_time=$quiz_value['time']; 
}

?>
<div id="allcontents">
<?php if($quiz_type == "Exam"  && $quiz_time > 0){ ?>
<div class="clock" id="clock"></div>
<?php } ?>
<?php if($quiz_type == "Exam"){ ?>
    <h2 id="score_div"></h2>
<?php } ?>


<br/>
<?php
$q_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_questions_table(). "  WHERE quiz_id=$quiz_id", ""), ARRAY_A
);
$q_sl=1;

foreach ($q_details as $key => $q_value) {
        $q_id=$q_value['q_id'];
        $question=$q_value['question']; 
        $q_type=$q_value['type'];
        ?>
        <input type="hidden" id="q_id<?php echo esc_attr( $q_sl); ?>" value="<?php echo esc_attr( $q_id); ?>">
        <input type="hidden" id="q_type<?php echo esc_attr( $q_sl); ?>" value="<?php echo esc_attr( $q_type); ?>">
        <?php
        if ($q_type == "mcq"){
            require( "$this->plugin_path/modules/front-mcq.php" );
        }
        else if ($q_type == "tf"){
            require( "$this->plugin_path/modules/front-tf.php" );
        }
        else if ($q_type == "sq"){
            require( "$this->plugin_path/modules/front-sq.php" );
        }
        else if ($q_type == "ufinput" || $q_type == "uftext"){
            require( "$this->plugin_path/modules/front-uf.php" );
        }
$q_sl++;
}
?>
<br/>
<?php if($quiz_type == "Exam"){ ?>
<div id="submit_answer" style="text-align:center"><a href="#"><input type="button" class="button button-primary" value="Submit Answer" onclick="quexp_submit_answer_button();"></a></div>
<?php } ?>
<input type="hidden" id="sl_no" value="<?php echo esc_attr( $q_sl); ?>">
<input type="hidden" id="quiz_id" value="<?php echo esc_attr( $quiz_id); ?>">
<input type="hidden" id="quiz_uid" value="<?php echo esc_attr( $quiz_uid); ?>">
<input type="hidden" id="quiz_type" value="<?php echo esc_attr( $quiz_type); ?>">
<input type="hidden" id="quiz_time" value="<?php echo esc_attr( $quiz_time); ?>">
</div>
 