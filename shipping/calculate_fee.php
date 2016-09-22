<?php
require_once 'core/init.php';
if($_POST['id'])
{
	$distance = $_POST['id'];
	$location = Db::getInstance();
	$status = $location->select('km_price', array('status', '=', 1));

	$active = $status->first();
	$kilometer = $active->km;
	$fee = $active->fee;

	if($distance > $kilometer)
	{
		$total_fee = ($distance/$kilometer)*$fee;
		echo number_format($total_fee, 2, '.', ',');
	} else {
		echo 'Free Delivery';
	}
}