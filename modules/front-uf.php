<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
 ?> 

<h3><?php echo wp_kses_post( $q_sl.". ".$question )?></h3>
<?php if($quiz_type == "Exam"){ 
if ($q_type == "ufinput"){ ?>
<input type="text" class="regular-text" id="uf_text<?php echo esc_attr( $q_sl); ?>">

<?php } else { ?>
    <textarea id="uf_text<?php echo esc_attr( $q_sl) ?>"></textarea>
<?php } } ?>

<hr><br/>

<style> 
input {
  width: 100%;
}
</style>