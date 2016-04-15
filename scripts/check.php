<?php
/* TODO "DirnameFromRoot" is to be replaced with 
 	"/sys/..." string because i forget it's exact location
	and also see the line 7 or near and replace "DirStartName"
	with the name of folder with gpio number... :) */
define("LOCATION", "DirnameFromRoot");//Include forward slash in last
define("DIRSTARTNAME", "DirStartName");
function check(int gpio){
	if(!file_exists(LOCATION.$gpio))
	{
		system("echo $gpio > ".LOCATION."export");
		sleep(1);
		if(!file_exists(LOCATION.$gpio))return 0;//File not creted even
		system("echo out > ".LOCATION.DIRSTARTNAME.$gpio."/direction");
		return 2;//2 means file created
	}
	return 1;//File already exist
}
?>