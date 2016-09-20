<?php
require_once 'core/init.php';

if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{
		try{
		$branch = Db::getInstance();
		$branch->insert('area', array(
			'area_name' => Input::get('area_name'),
			'latitude' => Input::get('latitude'),
			'longitude' => Input::get('longitude')
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
	<title>New branch</title>
</head>
<body>
	<form action="" method="POST">
		<label>Branch name</label><br/>
			<input type="text" name="area_name"><br/>
		<label>Langtitude</label><br/>
			<input type="text" name="latitude"><br/>
		<label>Longtitude</label><br/>
			<input type="text" name="longitude"><br/>
			<input type="submit" value="New Branch">
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	</form>
</body>
</html>