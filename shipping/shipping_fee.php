<?php
require_once 'core/init.php';
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = Db::getInstance();
	$query->query("UPDATE km_price SET status = 0 WHERE status = 1");
	$query->query("UPDATE km_price SET status = 1 WHERE id = $id");
}
if(isset($_GET['delete'])) {
	$delete = $_GET['delete'];
	$query = Db::getInstance();
	$query->query("DELETE FROM km_price WHERE id = $delete");
}

if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{
		try{
		$branch = Db::getInstance();
		$branch->insert('km_price', array(
			'km' => rtrim(Input::get('kilometer')),
			'fee' => rtrim(strtoupper(Input::get('fee')))
			));
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}
	if(Token::check(Input::get('token2')))
	{
		try{
		$branch = Db::getInstance();
		$branch->insert('shipping_fee', array(
			'name_fee' => rtrim(Input::get('name_fee')),
			'fee' => rtrim(strtoupper(Input::get('ship_fee')))
			));
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}
}
$query = Db::getInstance();
$res = $query->query("SELECT * FROM km_price");
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
	<form action="#" method="POST">
		<label>Kilometer</label>
			<input type="text" name="kilometer">
		<label>Fee</label>
			<input type="text" name="fee">
			<input type="submit" value="Save">
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	</form>
	<table>
		<tr>
			<td>Kilometer</td>
			<td>Fee</td>
			<td>Status</td>
			<td>Action</td>
		</tr>
			<?php
			foreach($res->results() as $results) {
				echo '<tr>';
				echo '<td>'.$results->km.'</td>';
				echo '<td>'.$results->fee.'</td>';
				echo '<td>'.$results->status.'</td>';
				echo '<td>
				<a href="shipping_fee.php?id='.$results->id.'">Update</a>
				<a href="shipping_fee.php?delete='.$results->id.'">Delete</a>
				</td>';
				echo '</tr>';
			}
			?>
	</table><br/>
	<form action="" method="POST">
		<label>Name Shipping Fee:</label>
		<input type="text" name="name_fee">
		<label>Shipping Fee:</label>
		<input type="text" name="ship_fee">
		<input type="submit" value="Save">
		<input type="hidden" name="token2" value="<?php echo Token::generate(); ?>">
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="skin/location.js"></script>
</body>
</html>
