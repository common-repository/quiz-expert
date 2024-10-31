<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
?>
<?php add_thickbox(); ?>
<?php
global $wpdb;
$all_rr = $wpdb->get_results(
        $wpdb->prepare(
                "SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_records_table(). " ORDER by rr_id DESC", ""
        ), ARRAY_A
);
?>
			<div class="wrap">
            <h1 class="wp-heading-inline">Results</h1>
            <a href="admin.php?page=quiz-expert-add-new" class="page-title-action">Add New Quiz</a>
			<hr class="wp-header-end">
            <br/><br/>
             <table class="wp-list-table widefat fixed striped table-view-list posts">
                    <thead>
                        <tr>
                            <th class="column-author">Sl No</th>
                            <th>Quiz Title</th>
							<th>User</th>
                            <th>Mark</th>
                            <th>Time</th>
                            <th></th>
 
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (count($all_rr) > 0) {
                            $i = 1;
                            foreach ($all_rr as $key => $value) {
                                $rr_id=$value['rr_id'];
                                $quiz_uid=$value['uid'];
                                $quiz_id= $value['quiz_id'];
                                $time=$value['time'];
                                //$quiz_time=$value['time'];
                                $quiz_details = $wpdb->get_results(
                                    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_quizzes_table(). "  WHERE quiz_id=$quiz_id", ""), ARRAY_A
                                );
                                foreach ($quiz_details as $key => $quiz_value) {
                                        $wp_post_id=$quiz_value['post_id'];}

								$post_details = $wpdb->get_results(
										$wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_posts_table(). "  WHERE ID=$wp_post_id", ""), ARRAY_A
									);
									foreach ($post_details as $key => $post_value) {
                                            $post_title=$post_value['post_title'];}
                                if ($quiz_uid > 0){
								$uid_details = $wpdb->get_results(
										$wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_users_table(). "  WHERE ID=$quiz_uid", ""), ARRAY_A
									);
									foreach ($uid_details as $key => $uid_value) {
                                            $username=$uid_value['user_nicename'];}
                                    } else {
                                        $username="Unknown";
                                    }
                                $result_details = $wpdb->get_results(
                                    $wpdb->prepare("SELECT * from " .Inc\Base\QuexpDBTableCall::quexp_results_table(). "  WHERE rr_id=$rr_id", ""), ARRAY_A
                                );
                                foreach ($result_details as $key => $result_value) {
                                        $mark=$result_value['result'];
                                      
                                    }
                                ?>
                                <input type="hidden" id="wp_post_id<?php echo esc_attr( $rr_id); ?>" value="<?php echo esc_attr( $wp_post_id); ?>">
                                <tr id="result_row<?php echo esc_attr( $rr_id); ?>">
                                    <td class="column-author"><?php echo esc_attr( $i++); ?></td>
                                    <td><a href="<?php echo esc_url("admin.php?page=quiz-expert-edit-quiz&edit=".$value['quiz_id']); ?>" class="row-title"><?php echo wp_kses_post( $post_title); ?></a></td>
									<td><?php echo wp_kses_post( $username); ?></td>
                                    <td><?php echo wp_kses_post( $mark); ?></td>
                                    <td><?php echo wp_kses_post( $time); ?></td>
                                    <td>
                                    <div class="quexp-dangerBtn">
                                    <a href="#TB_inline?width=600&height=550&inlineId=delete_result_popup" title="Delete Result" class="thickbox" onclick="quexp_delete_result_button(<?php echo esc_attr( $value['rr_id']); ?>);">
                                    <button class="quexp-btn quexp-btn_danger quexp-tooltip">
                                    <span class="quexp-tooltiptext quexp-tooltip-bottom">Delete Result</span><span class="dashicons dashicons-trash"></span>
                                    <i class="quexp-icon-trash"></i>
                                    </button></a>
                                    </div>
                                    <div class="quexp-warningBtn">
                                    <a href="<?php echo esc_url("admin.php?page=quiz-expert-record&view=".$value['rr_id']); ?>" title="View Record"> 
                                    <button class="quexp-btn quexp-btn_warning quexp-tooltip">
                                    <span class="quexp-tooltiptext quexp-tooltip-bottom">View Record</span><span class="dashicons dashicons-book"></span>
                                    <i class="quexp-icon-edit"></i>
                                    </button></a>
                                    </div>

</td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
<div id="delete_result_popup" style="display:none;">
<br/><br/><br/><br/><br/><br/>
<h1  style="text-align:center;">Do you permenently delete the result and record?</h1>
<div id="delete_result_button" style="text-align:center;"></div>
</div>

