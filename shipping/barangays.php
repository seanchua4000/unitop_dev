<?php
require_once 'core/init.php';
if($_GET['brgy']) {
	$brgy = $_GET['brgy'];
	$location = Db::getInstance();
	$barangay = $location->query("SELECT * FROM location WHERE parent_id = $brgy");
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
			<li><a href="shipping_address.php">Shipping Address</a></li>
		</ul>
	</nav>
	<h2>City and Municipalities:</h2>
		<ul id="cmunicipalities">
		<?php
		foreach($barangay->results() as $brgys) {
		echo '<li><a href="barangays.php?brgy='.$brgys->main_id.'">'.$cmunis->location.'</li>';
		}
		?>
		</ul>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="skin/location.js"></script>
</body>
</html>