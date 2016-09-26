<?php
require_once 'core/init.php';
$db = Db::getInstance();
$query = $db->query("SELECT km_price.*, status.* FROM km_price
	LEFT JOIN status ON km_price.status = status.id
	");
if(Input::exists('POST'))
{
	if(Token::check(Input::get('token')))
	{
		try
		{
			$db->insert('km_price', array(
				'km' => rtrim(Input::get('kilometer')),
				'fee' => rtrim(Input::get('fee')),
				'status' => rtrim(2)
				));
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
			<input type="text" name="kilometer">
		<label>Fee</label>
			<input type="text" name="fee">
			<input type="submit" value="Save">
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	</form>
	<table>
		<tr>
			<th>Kilometer</th>
			<th>Fee</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		<tr>
			<?php foreach($query->results() as $res) : ?>
			<tr>
				<td><?php echo $res->km; ?></td>
				<td><?php echo $res->fee; ?></td>
				<td><?php echo $res->status; ?></td>
				<td><?php echo '<a href="shipping_fee1_edit.php?id='.$res->main_id.'">Edit</a>'; ?></td>
			</tr>
			<?php endforeach; ?>
		</tr>
	</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="skin/location.js"></script>
</body>
</html>