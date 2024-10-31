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

$rr_id = isset($_GET['view']) ? intval($_GET['view']) : 0;


$rr_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_records_table(). "  WHERE rr_id=$rr_id", ""), ARRAY_A
);
foreach ($rr_details as $key => $value) {
    $rr_id=$value['rr_id'];
    $quiz_uid=$value['uid'];
    $quiz_id= $value['quiz_id'];
    $time=$value['time']; }

$quiz_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_quizzes_table(). "  WHERE quiz_id=$quiz_id", ""), ARRAY_A
);
foreach ($quiz_details as $key => $quiz_value) {$wp_post_id=$quiz_value['post_id'];}

$post_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_posts_table(). "  WHERE ID=$wp_post_id", ""), ARRAY_A
);
foreach ($post_details as $key => $post_value) { $post_title=$post_value['post_title'];}

if ($quiz_uid > 0){
    $uid_details = $wpdb->get_results(
            $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_users_table(). "  WHERE ID=$quiz_uid", ""), ARRAY_A
        );
        foreach ($uid_details as $key => $uid_value) {
                $username=$uid_value['user_nicename'];}
} else {
    $username="Unknown";
}
?>


<div class="wrap">
<h1 class="wp-heading-inline"><?php echo wp_kses_post( $post_title); ?></h1>
<hr>

<div class="embox">
<h3> User: <?php echo wp_kses_post( $username); ?></h3>
<div class='quexp-opt'>End Time: <?php echo wp_kses_post( $time); ?></div><br/><br/>

<?php
$uf_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_uf_table(). "  WHERE rr_id=$rr_id", ""), ARRAY_A
);
$q_sl=1;
foreach ($uf_details as $key => $uf_value) {
        $q_id=$uf_value['q_id'];
        $uftext=$uf_value['uftext'];

$q_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_questions_table(). "  WHERE q_id=$q_id", ""), ARRAY_A
);

foreach ($q_details as $key => $q_value) {
        $question=$q_value['question']; } ?>


<div class='quexp-q'><?php echo wp_kses_post( $q_sl.".  ".$question); ?></div>
<div class='quexp-opt'><?php echo wp_kses_post( $uftext); ?></div><br/>

<?php
 $q_sl++;
}
?>
</div>
</div>
