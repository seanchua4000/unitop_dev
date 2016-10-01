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
			LEFT JOIN shipping_fee ON location.fee_type = shipping_fee.main_id
			WHERE parent_id = $cmuni");
	}
}
if(Input::exists('POST'))
{
	if(!empty(Input::get('fee_type'))&&!empty(Input::get('sub_id')))
	{
		try {
			$fee_type = Input::get('fee_type');
			foreach(Input::get('sub_id') as $k => $id)
			{
				$query = $db->query("UPDATE location SET fee_type = $fee_type WHERE main_id = $id");
			}
		Redirect::to('index.php');
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
		<select name="fee_type" class="fee_type input_class1"></select>
		<span class="prov_text">Select All</span><input type="checkbox" id="select_all">
		</div>	
		<table class="loc_table">
			<tr>
				<th>City/Municipality</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Status</th>
				<th>Fee</th>
			</tr>
			<?php foreach($res->results() as $res_info) : ?>
				<tr>
					
					<td><input type="checkbox" class="sub_status checkbox" name="sub_id[]" value="<?php echo $res_info->main_id; ?>" >
					<?php echo $res_info->location; ?></td>
					<td><?php echo $res_info->latitude; ?></td>
					<td><?php echo $res_info->longitude; ?></td>
					<td><?php echo $res_info->status; ?></td>
					<td><?php echo $res_info->fee_type; ?></td>
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
<script type="text/javascript" src="skin/select.js"></script>
</body>
</html>