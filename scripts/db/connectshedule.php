<?php


	$mysql_host = "localhost";
	$mysql_database = "sheduler";
	$mysql_user = "root";
	$mysql_password = "";
	
	//Connection Code
	$connect = mysqli_connect($mysql_host,$mysql_user,$mysql_password) or die('Server Down \n Please inform author @ abhishekverma@etechclub.com');
	$_MYSQLDATABASE_BYME = mysqli_select_db($connect,$mysql_database) or die('No more Service available \n Please leave a comment or contact admin @ abhishekverma@etechclub.com');
	//Connection Process End

?>