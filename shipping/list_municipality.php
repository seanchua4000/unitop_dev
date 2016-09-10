<?php
require_once 'core/init.php';
if($_POST['id'])
{
	echo $pmain = $_POST['id'];
	$location = Db::getInstance();
	$municipality = $location->query("SELECT c1.main_id, c1.parent_id, c1.location, c2.parent_id, c2.location FROM location c1
				LEFT JOIN location c2 ON c2.parent_id = c1.main_id
				WHERE c1.main_id = $pmain 
				");

	foreach($municipality->results() as $municipalities)
	{
	//	echo '<li><input type="hidden" value="'.$municipalities->main_id.'"><span class="plus_icon"></span>'.$municipalities->location.'</li>';
	}
}