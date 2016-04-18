<?php
/* TODO "DirnameFromRoot" is to be replaced with 
 	"/sys/..." string because i forget it's exact location
	and also see the line 7 or near and replace "DirStartName"
	with the name of folder with gpio number... :) */
define("LOCATION", "/sys/class/gpio/");//Include forward slash in last
define("DIRSTARTNAME", "gpio");
$filename = LOCATION.DIRSTARTNAME.$gpio."/direction";
echo $filename."<br>";
function check(int gpio){
	if(file_exists(LOCATION.DIRSTARTNAME.$gpio))
	{
		$flag = 0;
		$f = fopen($filename,"r");
        $f=fread($f,filesize($filename));
		if($f=="in"||$f=="in\n"){//direction is not set to =>out<=
			system("echo out > ".$filename);
			fclose($f);
			return 2;
		}
		else
		return 1;//File is set to out
	}
	return 0;//File already exist
}
?>