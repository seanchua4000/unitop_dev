<!DOCTYPE html>
<html>
<body>

<?php
$a1=array("red","green");
$a2=array("apple", "banana");
print_r($watata = array_combine($a1,$a2));
foreach($watata as $a => $b)
{
	echo $a.'<br/>';
}
?>

</body>
</html>