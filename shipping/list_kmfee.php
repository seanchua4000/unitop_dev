<?php
require_once 'core/init.php';
$db = Db::getInstance();

$res = $db->query("SELECT * FROM km_price");
echo '<tr class="theader">';	
echo	'<td>Kilometer</td>';
echo	'<td>Fee</td>';
echo	'<td>Status</td>';
echo	'<td>Action</td>';
echo '</tr>';
foreach($res->results() as $result)
{
	echo '<tr>';
		echo '<td>'.$result->km.'</td>';
		echo '<td>'.$result->fee.'</td>';
		echo '<td>'.$result->status.'</td>';
	echo '</tr>';
}