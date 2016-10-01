<?php
require_once 'core/init.php';
$db = Db::getInstance();
if(Input::exists('GET'))
{
	$main_id = Input::get('id');
	$query = $db->query("SELECT * FROM shipping_fee WHERE main_id = $main_id");
	$res = $query->first();
}
if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'fee_name' => array(
				'required' => true
				),
			'fee' => array(
				'required' => true
				).
			'description' => array(
				'required' => true
				).
			'status' => array(
				'required' => true
				)
		));

		if($validation->passed())
		{
			try {
				$fee_name = Input::get('fee_name');
				$fee = Input::get('fee');
				$descr = Input::get('description');
				$status = Input::get('status');
				$db->query("UPDATE shipping_fee SET fee_type = '$fee_name', fee = '$fee', description = '$descr', status = '$status' WHERE main_id = $main_id");
				Redirect::to('shipping_fee2.php');
			} catch(Exception $e) {
				die($e->getMessage());
			}
		} else {
			foreach($validation->errors() as $error)
			{
				echo $error;
			}
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
	<form action="" method="POST" class="shipping_address">
		<ul>
		<li>
			<label>Name</label>
			<input type="text" name="fee_name" value="<?php echo $res->fee_type; ?>">
		</li>
		<li>
			<label>Fee</label>
			<input type="text" name="fee" value="<?php echo $res->fee; ?>">
		</li>
		<li>
				<label>Description</label>
			<input type="text" name="description" value="<?php echo $res->description; ?>">
		</li>
		<li>
			<label>Status</label>
			<select id="main_status" name="status">
			</select>
		</li>
		<li>
			<button type="button">Save</button>
		</li>
		</ul>
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="skin/location.js"></script>
<script type="text/javascript" src="skin/status.js"></script>
</body>
</html>