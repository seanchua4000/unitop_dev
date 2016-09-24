<?php
require_once 'core/init.php';
if(Input::exists('GET')) {
	if(!empty(Input::get('location'))&&!empty(Input::get('cmuni')))
	{
		$location = Input::get('location');
		$cmuni = Input::get('cmuni');
		$db = Db::getInstance();
		$res = $db->query("SELECT location.*, status.*, shipping_fee.fee_type FROM location
			LEFT JOIN status ON location.status = status.id
			LEFT JOIN shipping_fee ON location.fee_type = shipping_fee.id
			WHERE parent_id = $cmuni");
	}
}
if(Input::exists('POST'))
{
	if(!empty(Input::get('main_status'))&&!empty(Input::get('sub_status')))
	{
		try {
			$main_id = Input::get('main_status');
			$prov_id = Input::get('prov_id');
			foreach(Input::get('sub_status') as $k => $sub_id)
			{
				$query1 = $db->query("UPDATE location SET status = $main_id WHERE main_id = $prov_id");
				$query2 = $db->query("UPDATE location SET status = $main_id WHERE main_id = $sub_id");
			}
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}
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
		<form action="" method="POST">
		<div class="prov_header">
			<?php echo strtoupper($location); ?>
			<span class="prov_text">Status</span>
			<select id="main_status" name="main_status"></select>
			<input type="hidden" name="prov_id" value="<?php echo $cmuni; ?>">
		</div>
		<table>
			<tr class="theader">
				<td>City/Municipality</td>
				<td>Latitude</td>
				<td>Longitude</td>
				<td>Status</td>
				<td>Fee</td>
			</tr>
			<?php foreach($res->results() as $res_info) : ?>
				<tr>
					<td>
					<input type="checkbox" class="sub_status" name="sub_status[]" value="<?php echo $res_info->main_id; ?>">
					<?php echo $res_info->location; ?>
					</td>
					<td><?php echo $res_info->latitude; ?></td>
					<td><?php echo $res_info->longitude; ?></td>
					<td><?php echo $res_info->status; ?></td>
					<td>
						<?php echo $res_info->fee_type; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		<button type="submit">Save</button>
		</form>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="skin/location.js"></script>
<script type="text/javascript" src="skin/status.js"></script>
</body>
</html>