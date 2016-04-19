<?php
	include("connectshedule.php");
	$sql="INSERT INTO phpjobscheduler(scriptpath, name, time_interval, fire_time, time_last_fired,run_only_once, paused) VALUE('$script','$name','86400','$time','0','$repeat','0');";
	mysqli_query($connect,$sql) or die ("Error create schedule");
	mysqli_close($connect);
?>