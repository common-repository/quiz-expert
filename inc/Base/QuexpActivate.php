<?php
/**
 * creating database
 * @author WePupil<wepupilteam@gmail.com>
 * @package QuizExpert
 */
namespace Inc\Base;

class QuexpActivate
{
	public static function quexp_activate() {
	// create database table
	global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

$sql1 = "	CREATE TABLE `".$wpdb->prefix."quexp_answers` (
		`id` int(20) NOT NULL AUTO_INCREMENT,
		`q_id` int(20) NOT NULL,
		`answer` text NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";

		dbDelta($sql1);

$sql2 = "	CREATE TABLE `".$wpdb->prefix."quexp_explainations` (
		`id` int(20) NOT NULL AUTO_INCREMENT,
		`q_id` int(20) NOT NULL,
		`explaination` text NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";

		dbDelta($sql2);

$sql3 = "	CREATE TABLE `".$wpdb->prefix."quexp_mcq_options` (
		`id` int(20) NOT NULL AUTO_INCREMENT,
		`q_id` int(20) NOT NULL,
		`optionvalue` text NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";

		dbDelta($sql3);


$sql4 = "	CREATE TABLE `".$wpdb->prefix."quexp_questions` (
		`q_id` int(20) NOT NULL AUTO_INCREMENT,
		`quiz_id` int(20) NOT NULL,
		`question` text NOT NULL,
		`type` text,
		`slno` int(20) DEFAULT NULL,
		PRIMARY KEY (`q_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";

		dbDelta($sql4);




$sq5 = "	CREATE TABLE `".$wpdb->prefix."quexp_quizzes` (
		`quiz_id` int(20) NOT NULL AUTO_INCREMENT,
		`uid` int(11) NOT NULL,
		`post_id` int(20) NOT NULL,
		`type` varchar(255) DEFAULT NULL,
		`time` int(11) NOT NULL DEFAULT '0',
		`total_takers` int(11) DEFAULT NULL,
		PRIMARY KEY (`quiz_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		
		dbDelta($sq5);
	
$sq6 = "	CREATE TABLE `".$wpdb->prefix."quexp_record_room` (
		`rr_id` int(20) NOT NULL AUTO_INCREMENT,
		`uid` int(20) DEFAULT '0',
		`quiz_id` int(20) NOT NULL,
		`time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (`rr_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		
		dbDelta($sq6);

$sq7 = "	CREATE TABLE `".$wpdb->prefix."quexp_results` (
		`id` int(20) NOT NULL AUTO_INCREMENT,
		`rr_id` int(20) NOT NULL,
		`result` int(5) NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		
		dbDelta($sq7);

$sq8 = "	CREATE TABLE `".$wpdb->prefix."quexp_user_fields` (
		`id` int(20) NOT NULL AUTO_INCREMENT,
		`rr_id` int(20) NOT NULL,
		`q_id` int(20) NOT NULL,
		`uftext` text NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		
		dbDelta($sq8);

	 flush_rewrite_rules();

	}




}