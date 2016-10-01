<?php
require_once 'core/init.php';
$db = Db::getInstance();
if($_POST['id'])
{
	$main_id = $_POST['id'];
	$query = $db->query("SELECT location.*, shipping_fee.* FROM location
			LEFT JOIN shipping_fee ON location.fee_type = shipping_fee.main_id
			WHERE location.main_id = $main_id");
	$res = $query->first();
	echo $res->fee;
}