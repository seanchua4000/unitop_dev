<?php
require_once 'core/init.php';
$db = Db::getInstance();
$location = $db->query("SELECT * FROM location WHERE parent_id = 0 AND status = 1");

if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'rp_name' => array(
				'required' => true
				),
			'contact_no' => array(
				'required' => true
				),
			'comp_address' => array(
				'required' => true
				),
			'province' => array(
				'required' => true
				),
			'cmuni' => array(
				'required' => true
				),
			'brgy' => array(
				'required' => true
				),
			's_fee' => array(
				'required' => true
				)
		));

		if($validation->passed())
		{
			try {
				$db->insert('shipping_address', array(
					'rp_name' => Input::get('rp_name'),
					'nk_name' => Input::get('nk_name'),
					'contact_no' => Input::get('contact_no'),
					'comp_address' => Input::get('comp_address'),
					'province' => Input::get('province'),
					'cmuni' => Input::get('cmuni'),
					'brgy' => Input::get('brgy'),
					'f_fee' => Input::get('s_fee')
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
			<input type="text" name="rp_name">
		</li>
		<li>
			<label>Nickname</label>
			<input type="text" name="nk_name">
		</li>
		<li>
			<label>Contact no.</label>
			<input type="text" name="contact_no">
		</li>
		<li>
			<label>Complete address</label>
			<input type="text" name="comp_address">
		</li>
		<li>
			<label>Province</label>
			<select id="province" name="province">
				<option value="">Please Select</option>
				<?php foreach($location->results() as $province) : ?>
					<option value="<?php echo $province->main_id; ?>"><?php echo $province->location; ?></option>
				<?php endforeach; ?>
			</select>
		</li>
		<li>
			<label>City/Municipality</label>
			<select class="subplace" id="CM" name="cmuni">
			</select>
		</li>

		
		<li>
			<!--<label>Barangay</label>
			<select class="subplace" id="BR" >
			</select>-->
			<label>Barangay</label>
			<input type="text" name="brgy" >
		</li>
		
		<li>
			<button type="submit">Address</button>
		</li>
	</ul>
			<input type="hidden" name="distance" id="distance" value="">
			<input type="hidden" name="s_fee" id="s_fees" value="">
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