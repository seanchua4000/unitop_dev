<?php
require_once 'core/init.php';

$location = Db::getInstance();
$provinces = $location->select('location', array('parent_id', '=', 0));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shipping Address</title>
	<link rel="stylesheet" href="skin/style.css">
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
		<h2>Shipping Address:</h2>
		
		<li>
			<label>Recipient's name</label>
			<input type="text" name="area_name">
		</li>
		<li>
			<label>Nickname</label>
			<input type="text" name="area_name">
		</li>
		<li>
			<label>Contact no.</label>
			<input type="text" name="area_name">
		</li>
		<li>
			<label>Complete address</label>
			<input type="text" name="latitude">
		</li>
		<li>
			<label>Province</label>
			<select id="province">
				<option value="">Please Select</option>
				<?php foreach($provinces->results() as $province) : ?>
					<option value="<?php echo $province->main_id; ?>"><?php echo $province->location; ?></option>
				<?php endforeach; ?>
			</select>
		</li>
		<li>
			<label>City/Municipality</label>
			<select class="subplace" id="CM">
			</select>
		</li>

		
		<li>
			<!--<label>Barangay</label>
			<select class="subplace" id="BR" >
			</select>-->
			
			<label>Barangay</label>
			<input type="text" name="latitude" >
		</li>
		
		<li>
			<button type="submit">Address</button>
		</li>
	</ul>
			<input type="hidden" name="distance" id="distance" value="">
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	</form>
</div>
<div class="container1">

	<div class="shipping_address">
	<ul>
	<h2>Order Summary:</h2>
		<li>Items</li>
			<table class="summary_table">
				<tr>
					<th class="st_header_product">Product name</th>
					<th class="st_headers">Item Price</th>
					<th class="st_headers">Reward Points</th>
					<th class="st_headers">Quantity</th>
					<th class="st_headers">Price</th>
				</tr>
				<tr>
					<td class="st_header_product">Item name</td>
					<td class="st_headers">data</td>
					<td class="st_headers">data</td>
					<td class="st_headers">data</td>
					<td class="st_headers">data</td>
				</tr>
			</table>			
		
		<li>Subtotal:</li>
		<li>Shipping charges: <span id="s_fee"></span></li>
		<li>Total:</li>
	</ul>

	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="skin/location.js"></script>
</body>
</html>