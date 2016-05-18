<?php

define("LOCATION", "/sys/class/gpio/");//Include forward slash in last
define("DIRSTARTNAME", "gpio");

$gpio = $_GET['gpio'];
$toDo = $_GET['toDo'];

include("scripts/check.php");

//Reversing the Input Mens 1 for off and 0 for On
//Change it according to you...
if($toDo == 1)$toDo=0;
else if($toDo == 0)$toDo=1;

echo $toDo;

die(" End here");

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
