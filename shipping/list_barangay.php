<?php
require_once 'core/init.php';
$locations = Db::getInstance();
/*
$barangay = $locations->query("SELECT c1.main_id, c1.parent_id, c1.location, c2.main_id, c2.parent_id, c2.location, c3.parent_id, c3.location  FROM location c1
	LEFT JOIN location c2 ON c2.parent_id = c1.main_id
	LEFT JOIN location c3 ON c3.parent_id = c2.main_id
	WHERE c1.parent_id = 0
	"); */
$barangay = $locations->query("SELECT * FROM location");
echo $barangay->count() . '<br>';

foreach($barangay->results() as $barangays)
{
	//echo $barangays->location . '<br>';
	if($barangays->parent_id == 0) {
		echo $barangays->location . '<br>';
	}
}