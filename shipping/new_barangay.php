<?php
require_once 'core/init.php';

if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{
		try{
		$branch = Db::getInstance();
		$branch->insert('location', array(	
			'parent_id' => rtrim(Input::get('parent_id')),
			'location' => rtrim(strtoupper(Input::get('barangay')))
			));
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}
}

$location = Db::getInstance();
$provinces = $location->select('location', array('parent_id', '=', 0));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Barangay</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#province").change(function()
			{
				var id=$(this).val();
				var dataString = 'id='+ id;
				
				$.ajax
				({
					type: "POST",
					url: "municipality_location.php",
					data: dataString,
					cache: false,
					success: function(html)
					{	
						$("#CM").html(html);
						if($('.wala #CM').find(':selected').length==0)
						{
							$('#CM').show();
						}
					}
				});
			});
		});
	</script>
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
		<label>Province</label>
			<select name="" id="province">
				<option value="">Please Select</option>
			<?php foreach($provinces->results() as $province) : ?>
				<option value="<?php echo $province->main_id; ?>"><?php echo $province->location; ?></option>
			<?php endforeach; ?>
			</select>
		</li>
		<li>
		<div class="wala">
		<label>City/Municipality</label>
			<select name="parent_id" id="CM">
			</select>
		</div>
		</li>
		<li>
		<label>Barangay</label>
			<input type="text" name="barangay">
		</li>
		<li>
			<button type="submit">Add Barangay</button>
		</li>
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
		</ul>
	</form>
</div>
</body>
</html>