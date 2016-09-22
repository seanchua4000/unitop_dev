<?php
require_once 'core/init.php';
$location = Db::getInstance();
$province = $location->query("SELECT * FROM location WHERE parent_id = 0");
echo '<tr class="theader">';
echo	'<td>Province</td>';
echo	'<td>Latitude</td>';
echo	'<td>Longitude</td>';
echo	'<td>Action</td>';
echo '</tr>';
foreach($province->results() as $provinces) {
	echo '<tr>';
	echo '<td>'.$provinces->location.'</td>';
	echo '<td>'.$provinces->latitude.'</td>';
	echo '<td>'.$provinces->longitude.'</td>';
	echo '<td><a href="cmunicipalities.php?cmuni='.$provinces->main_id.'">view</td>';
	echo '</tr>';
}