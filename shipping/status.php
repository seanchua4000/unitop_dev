<?php
require_once 'core/init.php';
$db = Db::getInstance();
$res = $db->query("SELECT * FROM status");
echo '<option value="">Please Select</option>';
foreach($res->results() as $result)
{
	$status = $result->status;
	$id = $result->id;
	echo '<option value="'.$id.'">'.$status.'</option>';
}