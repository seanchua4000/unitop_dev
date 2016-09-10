<?php
require_once 'core/init.php';

if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{
		try{
		$branch = Db::getInstance();
		$branch->insert('km_price', array(
			'price' => rtrim(Input::get('km_price'))
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
</head>
<body>
	<form action="" method="POST">
		<label>Price</label><br/>
			<input type="text" name="km_price"><br/>
			<input type="submit" value="Update">
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	</form>
</body>
</html>