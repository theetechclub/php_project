<?php

define("LOCATION", "/sys/class/gpio/");//Include forward slash in last
define("DIRSTARTNAME", "gpio");

$gpio = $_GET['gpio'];
$toDo = $_GET['toDo'];

include("scripts/check.php");

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
