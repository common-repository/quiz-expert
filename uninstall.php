<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  QuizExpert
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Access the database via SQL
global $wpdb;

$em_details = $wpdb->get_results(
	$wpdb->prepare("SELECT * from `".$wpdb->prefix ."quexp_quizzes`", ""), ARRAY_A
);

foreach ($em_details as $key => $em_value) {
		$wp_post_id=$em_value['post_id'];

		$wpdb->delete($wpdb->prefix."posts",
		array('ID' => $wp_post_id));
}

$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."quexp_quizzes`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."quexp_questions`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."quexp_mcq_options`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."quexp_answers`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."quexp_explainations`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."quexp_record_room`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."quexp_results`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."quexp_user_fields`");