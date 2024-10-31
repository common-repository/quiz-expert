<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
?>

<?php //wp_enqueue_media()); ?>
<?php add_thickbox(); ?>
<?php
global $wpdb;

$quiz_id = isset($_GET['edit']) ? intval($_GET['edit']) : 0;


$exam_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_quizzes_table(). "  WHERE quiz_id=$quiz_id", ""), ARRAY_A
);
foreach ($exam_details as $key => $exam_value) {
        $wp_post_id=$exam_value['post_id'];
        $quiz_type=$exam_value['type'];
        $quiz_time=$exam_value['time'];}



$post_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_posts_table(). "  WHERE ID=$wp_post_id", ""), ARRAY_A
);
foreach ($post_details as $key => $post_value) {
        $post_title=$post_value['post_title'];}

        ?>


<input type="hidden" id="new_quiz_id" value="<?php echo esc_attr( $quiz_id); ?>">

<div class="wrap">
<h1 class="wp-heading-inline"><?php echo wp_kses_post( $post_title); ?></h1>
<a href="<?php echo esc_url("post.php?post=<?php".$wp_post_id); ?>&action=edit" class="page-title-action">Edit Title</a>
<hr class="wp-header-end">
<div class="landing-body">
<div style="display: inline-block; width:70%; float: left;">

<div class="quexp-row" onclick="question_sh_button();">
<button class="quexp-btn quexp-btn_secondary quexp-btn_ls quexp-add_answer">Show/Hide Questions</button>
</div>

<div id="allcontents">
<?php
$q_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_questions_table(). "  WHERE quiz_id=$quiz_id", ""), ARRAY_A
);
$q_sl=1;
foreach ($q_details as $key => $q_value) {
        $q_id=$q_value['q_id'];
        $question=$q_value['question'];
        $q_type=$q_value['type']; ?>
        <input type="hidden" id="q_type<?php echo esc_attr( $q_id); ?>" value="<?php echo esc_attr( $q_type); ?>">
        <?php

        if ($q_type == "mcq"){
            require( "$this->plugin_path/modules/admin-mcq.php" );
        }
        else if ($q_type == "tf"){
            require( "$this->plugin_path/modules/admin-tf.php" );
        }
        else if ($q_type == "sq"){
            require( "$this->plugin_path/modules/admin-sq.php" );
        }
        else if ($q_type == "ufinput" || $q_type == "uftext"){
            require( "$this->plugin_path/modules/admin-uf.php" );
        }


 $q_sl++;
}
?>
<input type="hidden" id="new_no" value="<?php echo esc_attr( $q_sl); ?>">
</div>
<br/>

<?php
require_once( "$this->plugin_path/modules/add-question.php" );
?>
</div>

<div style="display: inline-block; width:27%; float: right;">
<?php require_once( "$this->plugin_path/modules/right-panel.php" ); ?>
</div></div>


<div id="edit_question_popup" style="display:none;">
<div id="edit_question_body"></div>
</div>

<div id="delete_question_popup" style="display:none;">
<br/><br/><br/><br/><br/><br/>
<h1  style="text-align:center;">Do you permenently delete the question?</h1>
<div id="delete_question_button" style="text-align:center;"></div>
</div>