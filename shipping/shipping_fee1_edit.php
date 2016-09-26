<?php
require_once 'core/init.php';
$db = Db::getInstance();
if(Input::exists('GET'))
{
	$main_id = Input::get('id');
	$query = $db->query("SELECT * FROM km_price WHERE main_id = $main_id");
	$res = $query->first();
}
if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{
		try {
			$km = Input::get('kilometer');
			$fee = Input::get('fee');
			$status = Input::get('status');
			if($status == 1)
			{
				$db->query("UPDATE km_price SET status = 2");
				$db->query("UPDATE km_price SET km = $km, fee = $fee, status = $status WHERE main_id = $main_id");
			} elseif($status == 2) {
				$db->query("UPDATE km_price SET km = $km, fee = $fee, status = 2 WHERE main_id = $main_id");
			}
			Redirect::to('shipping_fee1.php');
		} catch(Exception $e) {
			die($e->getMessage());
		}
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
		<label>Kilometer</label>
			<input type="text" name="kilometer" value="<?php echo $res->km; ?>">
		<label>Fee</label>
			<input type="text" name="fee" value="<?php echo $res->fee; ?>">
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