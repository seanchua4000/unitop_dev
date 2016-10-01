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
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'fee_name' => array(
				'required' => true
				),
			'fee' => array(
				'required' => true
				),
			'description' => array(
				'required' => true
				),
			'status' => array(
				'required' => true
				)
		));

		if($validation->passed())
		{
			try {
			$db->insert('shipping_fee', array(
				'fee_type' => Input::get('fee_name'),
				'fee' => Input::get('fee'),
				'description' => Input::get('description'),
				'status' => Input::get('status')
				));
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
	
	<div class="location1">
		<table class="loc_table">
			<tr class="theader">
				<td>Name</td>
				<td>Fee</td>
				<td>Description</td>
				<td>Status</td>
				<td>Action</td>
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
	<div class="form_1">
		<form action="" method="POST" class="shipping_address">
			<ul>
				<li>
					<h2>New Fee:</h2>
				</li>
				<li>
					<label>Name</label>
						<input type="text" name="fee_name">
				</li>
				<li>
				<label>Fee</label>
					<input type="text" name="fee">
				</li>
				<li>
				<label>Description</label>
					<input type="text" name="description">
				</li>
				<li>
				<label>Status</label>
				<select id="main_status" name="status"></select>
				</li>
				<li>
					<button type="submit">Save</button>
				</li>
					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
			</ul>
		</form>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="skin/location.js"></script>
<script type="text/javascript" src="skin/status.js"></script>
</body>
</html>