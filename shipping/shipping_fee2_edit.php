<?php
require_once 'core/init.php';
$db = Db::getInstance();
if(Input::exists('GET'))
{
	if(!empty(Input::get('id')))
	$main_id = Input::get('id');
	$query = $db->query("SELECT * FROM shipping_fee WHERE main_id = $main_id");
	$res = $query->first();
}
if(Input::exists('POST'))
{
	$fee_name = Input::get('fee_name');
	$fee = Input::get('fee');
	$desc = Input::get('description');
	$status = Input::get('status');
	try {
		$db->query("UPDATE shipping_fee SET fee_type = $fee_name, fee = $fee, description = $desc, status = $status WHERE main_id = $main_id");
	} catch(Exception $e) {
		die($e->getMessage());
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shipping Fee</title>
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
	<form action="" method="POST">
		<label>Name</label>
			<input type="text" name="fee_name" value="<?php echo $res->fee_type; ?>">
		<label>Fee</label>
			<input type="text" name="fee" value="<?php echo $res->fee; ?>">
		<label>Description</label>
			<input type="text" name="description" value="<?php echo $res->description; ?>">
			<select id="main_status" name="status">
			</select>
			<input type="submit" value="Save">
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="skin/location.js"></script>
<script type="text/javascript" src="skin/status.js"></script>
</body>
</html>