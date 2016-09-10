<?php
require_once 'core/init.php';

if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{
		try{
		$branch = Db::getInstance();
		$branch->insert('location', array(
			'location' => rtrim(strtoupper(Input::get('province'))),
			'latitude' => rtrim(Input::get('latitude')),
			'longitude' => rtrim(Input::get('longitude'))
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
	<title>Provinces</title>
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
		<li><a href="shipping_address.php">Shipping Address</a></li>
	</ul>
	</nav>
	<form action="" method="POST" class="shipping_address">
	<ul>
		<li>
		<label>Province</label>
			<input type="text" name="province">
		</li>
		<li>
		<label>Langtitude</label>
			<input type="text" name="latitude">
		</li>
		<li>
		<label>Longtitude</label>
			<input type="text" name="longitude">
		</li>
		<li>
			<button type="submit">Add Province</button>
		</li>
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	</ul>
	</form>
</div>
</body>
</html>