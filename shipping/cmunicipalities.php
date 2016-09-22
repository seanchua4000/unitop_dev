<?php
require_once 'core/init.php';
if($_GET['cmuni']) {
	$cmuni = $_GET['cmuni'];
	$location = Db::getInstance();
	$cmunicipality = $location->query("SELECT * FROM location WHERE parent_id = $cmuni");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="skin/style.css">
</head>
<body>
<div class="container1">
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="new_province.php">Province</a></li>
			<li><a href="new_municipality.php">Municipality</a></li>
			<li><a href="new_barangay.php">Barangay</a></li>
			<li><a href="shipping_fee.php">Shipping Fee</a></li>
			<li><a href="shipping_address.php">Shipping Address</a></li>
		</ul>
	</nav>
	<div class="location">
		<h2>Cities and Municipalities:</h2>
			<table>
				<tr class="theader">
					<td>City/Municipality</td>
					<td>Latitude</td>
					<td>Longitude</td>
				</tr>
					<?php
					foreach($cmunicipality->results() as $cmunis) {
						echo '<tr>';
						echo '<td><input type="checkbox" name="location" value="'.$cmunis->main_id.'">'.$cmunis->location.'</td>';
						echo '<td>'.$cmunis->latitude.'</td>';
						echo '<td>'.$cmunis->longitude.'</td>';
						echo '</tr>';
					}
					?>
			</table>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="skin/location.js"></script>
</body>
</html>