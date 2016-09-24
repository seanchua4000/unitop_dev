<?php
require_once 'core/init.php';
$db = Db::getInstance();
$res = $db->query("SELECT * FROM shipping_fee WHERE status = 0");
echo '<option value="">Please Select</option>';
foreach($res->results() as $fees)
{
	$name = $fees->fee_type;
	$id = $fees->id;
	echo '<option value="'.$id.'">'.$name.'</option>';
}