<?php
include("scripts/check.php");

$gpio = $_GET['gpio'];
$toDo = $_GET['toDo'];


$string = "echo $toDo > ".LOCATION.DIRSTARTNAME.$gpio."/value";

echo $string."<br>";

if(check($gpio)){
	// TODO code to turn ON or OFF led
	system($string);
	echo json_encode(array('result' => 'success' ));
}
else
{
	echo json_encode(array('result' => 'fail' ));
}
?>