<?php
require_once 'core/init.php';
echo "
<script type=\"text/javascript\" src=\"javascript/distance.js\"></script>
";
if($_POST['id'])
{
	$main_id=$_POST['id'];
	$location = Db::getInstance();
	$distance = $location->select('location', array('main_id', '=', $main_id));

	if($distance->results())
	{
		foreach($distance->results() as $coordinates) {
			$lat = $coordinates->latitude;
			$lon = $coordinates->longitude;
			echo '<script type=\"text/javascript\">getDistanceFromLatLonInKm('. $lat .', '. $lon .', 14.2843, 121.0889)</script>';
		}
		
	}
}
