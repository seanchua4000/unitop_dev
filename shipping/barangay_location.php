<?php
require_once 'core/init.php';
if($_POST['id'])
{
	$parent_id=$_POST['id'];
	$location = Db::getInstance();
	$municipality = $location->select('location', array('parent_id', '=', $parent_id));

	if($municipality->results())
	{
		echo '<option value="">Please Select</option>';
		foreach($municipality->results() as $city)
		{	
			$main = $city->main_id;
			$name = $city->location;
			echo '<option value="' . $main . '">' . $name .'</option>';
		}
	}
}
