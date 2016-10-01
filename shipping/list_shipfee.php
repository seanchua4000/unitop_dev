<?php
require_once 'core/init.php';
$db = Db::getInstance();

$res = $db->query("SELECT * FROM shipping_fee");
echo '<tr class="theader">';	
echo	'<td>Name</td>';
echo	'<td>Fee</td>';
echo	'<td>Description</td>';
echo	'<td>Status</td>';
echo	'<td>Action</td>';
echo '</tr>';
foreach($res->results() as $result)
{
	echo '<tr>';
		echo '<td>'.$result->fee_type.'</td>';
		echo '<td>'.$result->fee.'</td>';
		echo '<td>'.$result->description.'</td>';
		echo '<td>'.$result->status.'</td>';
	echo '</tr>';
}