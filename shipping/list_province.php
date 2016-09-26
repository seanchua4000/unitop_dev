<?php
require_once 'core/init.php';
$db = Db::getInstance();
$province = $db->query("SELECT location.*, status.* FROM location
	LEFT JOIN status ON location.status = status.id
	WHERE parent_id = 0
	");
echo '<tr>';	
echo	'<th>Status</th>';
echo	'<th>Province</th>';
echo	'<th>Latitude</th>';
echo	'<th>Longitude</th>';
echo	'<th>Action</th>';
echo '</tr>';
foreach($province->results() as $provinces) {
	echo '<tr>';
	echo '<td>'.$provinces->status.'</td>';
	echo '<td>'.$provinces->location.'</td>';
	echo '<td>'.$provinces->latitude.'</td>';
	echo '<td>'.$provinces->longitude.'</td>';
	echo '<td>
		<a href="cmunicipalities_status.php?location='.trim($provinces->location).'&cmuni='.$provinces->main_id.'">Status</a>
		<a href="cmunicipalities_fee.php?location='.trim($provinces->location).'&cmuni='.$provinces->main_id.'">Fee</a>
		</td>';
	echo '</tr>';
}
