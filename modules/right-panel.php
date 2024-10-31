<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
?>

<div class="embox">
<div class="em-q">Short Code</div><hr>
<code>[quiz_expert id=<?php echo wp_kses_post( $quiz_id);?>]</code>
</div>
<br/>
<div class="embox">
<div class="em-q">Quiz Settings</div><hr><br/>
Type:
<select id="new_quiz_type">
        <option value="<?php echo esc_attr( $quiz_type);?>"><?php echo wp_kses_post( $quiz_type);?></option>
        <option value="Exam">Exam</option>
        <option value="Exercise">Exercise</option>
</select>
<br/><br/>
Time (minutes):
<input type="text" id="new_quiz_time" value="<?php echo esc_attr( $quiz_time);?>">
<br/>
<a id="savecheck" style="color:green"></a><br/><br/>
<input type="button" class="button button-primary" value="Save Settings" onclick="quexp_save_settings_button(<?php echo esc_attr( $quiz_id);?>);">
</div>
