<?php
include_once 'DB.php';
include_once 'Logs.php';

$database = new Database();

$db = $database->getConnection();

$query="
	CREATE TABLE IF NOT EXISTS `logs` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(256) NOT NULL,
	`description` text NOT NULL,
	`message` text NOT NULL,
	`modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ";
	
$stmt = $db->prepare($query);
$stmt->execute();
?>