<?php
require_once 'core/init.php';
$db = Db::getInstance();
$query = $db->query("SELECT shipping_fee.*, status.* FROM shipping_fee
	LEFT JOIN status ON shipping_fee.status = status.id
	");
if(Input::exists('POST'))
{
	if(Token::check(Input::get('token')))
	{
		try {
			$fee_name = Input::get('fee_name');
			$fee = Input::get('fee');
			$desc = Input::get('description');

			$db->insert('shipping_fee', array(
				'fee_type' => Input::get('fee_name'),
				'fee' => Input::get('fee'),
				'description' => Input::get('description')
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
		<label>Name</label>
			<input type="text" name="fee_name">
		<label>Fee</label>
			<input type="text" name="fee">
		<label>Description</label>
			<input type="text" name="description">
			<input type="submit" value="Save">
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	</form>
	<table>
		<tr>
			<th>Name</th>
			<th>Fee</th>
			<th>Description</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		<tr>
			<?php foreach($query->results() as $res) : ?>
			<tr>
				<td><?php echo $res->fee_type; ?></td>
				<td><?php echo $res->fee; ?></td>
				<td><?php echo $res->description; ?></td>
				<td><?php echo $res->status; ?></td>
				<td><?php echo '<a href="shipping_fee2_edit.php?id='.$res->main_id.'">Edit</a>'; ?></td>
			</tr>
			<?php endforeach; ?>
		</tr>
	</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="skin/location.js"></script>
</body>
</html>