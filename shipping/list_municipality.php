<?php
require_once 'core/init.php';
if($_GET['cmuni']) {
	$cmuni = $_GET['cmuni'];
	$location = Db::getInstance();
	$cmunicipality = $location->query("SELECT * FROM location WHERE parent_id = $cmuni");

	foreach($cmunicipality->results() as $cmunis) {
		echo $cmunis->location;
	}
}