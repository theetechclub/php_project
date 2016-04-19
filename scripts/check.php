<?php
/* TODO "DirnameFromRoot" is to be replaced with 
 	"/sys/..." string because i forget it's exact location
	and also see the line 7 or near and replace "DirStartName"
	with the name of folder with gpio number... :) */
$filename = LOCATION.DIRSTARTNAME.$gpio."/direction";
echo $filename."<br>";
function check($gpio){
	if(file_exists(LOCATION.DIRSTARTNAME.$gpio))
	{
		global $filename;
		$f = fopen($filename,"r");
        	$read=fread($f,filesize($filename));
		fclose($f);
		if($read=="in"||$read=="in\n"){//direction is not set to =>out<=
			system("echo out > ".$filename);
			//echo shell_exec("cat ".$filename);
			return 2;
		}
		else
		return 1;//File is set to out
	}
	return 0;//File already exist
}
?>
