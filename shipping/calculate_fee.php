<?php
require_once 'core/init.php';
if($_POST['id'])
{
	$distance=$_POST['id'];
	$location = Db::getInstance();
	$fee = $location->select('km_price', array('id', '=', 1));

	$km = $fee->first();
	$fee_km = $km->price;
	$ship_fee = $distance*$fee_km;
	$fees = number_format($ship_fee, 2, '.', ',');
	
	echo $fees;
	
}