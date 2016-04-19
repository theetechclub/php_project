<?php
echo "Hello I am here to perform tasks<br />";
ini_set("display_errors",1);
//POST METHOD VARIABLES Must be with proper resions  DP => do for post
//	Lines are going to be comment because no possible use of them in project
//$dp_board = isset($_POST['b']) ? $_POST['b'] : NULL; //Board number
$dp_pin = isset($_POST['p']) ? $_POST['p'] : NULL;	//pin number
$hours = isset($_POST['hh']) ? $_POST['hh'] : NULL;	//hours when to turn off	|
$minute = isset($_POST['mm']) ? $_POST['mm'] : NULL;	//minutes to turn off	| According to Real time of current day
$second = isset($_POST['ss']) ? $_POST['ss'] : 0;	//seconds to turn off	|
$dp_task = isset($_POST['task']) ? $_POST['task'] : NULL;
$dp_do = isset($_POST['setwettime']) ? $_POST['setwettime'] : NULL;	//To know wether to set time or not
$dp_times = isset($_POST['shedule']) ? $_POST['shedule'] : "1";//1 for run once and 0 for repeat infinite
echo "DP :: Pin $dp_pin, Hours $hours, Minute $minute, Seconds $second, Task $dp_task, What to do => $dp_do, Times to do => $dp_times<br />";
//$dp_ = isset($_POST['']) ? $_POST[''] : NULL;

//Making GET method accessible via POST method converted variable Like dp_pin etc.
if($dp_pin==NULL&&isset($_GET['p']))$dp_pin=$_GET['p'];
if($hours==NULL&&isset($_GET['hh']))$hours=$_GET['hh'];
if($minute==NULL&&isset($_GET['mm']))$minute=$_GET['mm'];
if($second==0&&isset($_GET['ss']))$minute=$_GET['ss'];
if($dp_task==NULL&&isset($_GET['task']))$dp_task=$_GET['task'];
if($dp_do==NULL&&isset($_GET['setwettime']))$dp_do=$_GET['setwettime'];
if($dp_times==1&&isset($_GET['times']))$dp_times=$_GET['times'];
echo "DP :: Pin $dp_pin, Hours $hours, Minute $minute, Task $dp_task, What to do => $dp_do, Times to do => $dp_times<br />";
//Remember phpjobscheduler use POST to send GET request
//GET METHOD VARIABLES Must be with proper resions  DG => do for get
$dg_task = isset($_GET['task']) ? $_GET['task'] : NULL;
if($dg_task==NULL&&isset($_POST['task']))
{ $dg_task = $_POST['task']; }
//$dg_board = isset($_GET['board']) ? $_GET['board'] : NULL;
//if($dg_board==NULL&&isset($_POST['board']))
//{ $dg_board = $_POST['board']; }
$dg_pin = isset($_GET['pin']) ? $_GET['pin'] : NULL;
if($dg_pin==NULL&&isset($_POST['pin']))
{ $dg_pin = $_POST['pin']; }
echo "DG :: Task $dg_task, Pin $dg_pin<br />";
//$dg_ = isset($_GET['']) ? $_GET[''] : NULL;

//Other Required Variables Must be with proper resions
$time = time();//Can be used to store seconds of current turn on time before reduce current time from date
/*so here we go*/ 
$script = "http://localhost:8080/php_project/task.php?task=";// Note change only when you konw what you are doning
$name = NULL; //Name of task;
//Task Lists are below
/*
//1. Adding Task
//2. Turn ON device
//3. Turn OFF device
*/
//TO ADD TASK

if($dp_do!=NULL)
{
	//die( "IN DP");//Comment it when starting to add schedule in database
	echo "Entered in 1. <br />";
	$script.=$dp_task."&pin=".$dp_pin;
	echo "$script<br />";
	$name = "switch $dp_task the pin #$dp_pin at $hours:$minute:$second and do it ";
	if($dp_times)
	{$name.="for once.";}
	else
	{$name.="daily.";}
	echo "<br /><strong>$name</strong><br /><br />";
	echo "Actual Time $time<br />";
	$time -= (date("H",$time)*60*60 + date("i",$time)*60 + date("s",$time));//to reduce current time of day from whole date and time
	echo "Time Reduced $time<br />";
	$time += $hours*60*60 + $minute*60 + $second;//to add time only
	echo "Time Added $time<br />";
	$repeat = $dp_times;
	echo "Once(1) or Daily(0) ::: $repeat";
	include("scripts/db/newshedule.php");
	die("<br />DONE");
}


//TO TURN ON DEVICE
else if($dg_task=="ON")
{
	//Write your code here
	echo "Entered in 2. <br />";
	//$result=shell_exec("python scripts/py/switch.py ".$dg_board." ".$_POST['p'].$dg_pin." 05");
	//Adding code which work for this project (NOTE: above code is for previous project)
	$_GET['gpio'] = $dg_pin;
	$_GET['toDo'] = 1;
	include("switch.php");
	echo("switch.php ".$dg_task." ".$dp_pin.$dg_pin);
}

//TO TURN OFF DEVICE
else if($dg_task=="OFF")
{
	//Write your code here
	echo "Entered in 3. <br />";
	//shell_exec("python scripts/py/switch.py ".$dg_board." ".$_POST['p'].$dg_pin." 04");
	// Same as above comment in Lvl - 1 IF statement
	$_GET['gpio'] = $dg_pin;
	$_GET['toDo'] = 0;
	include("switch.php");
	echo("switch.php ".$dg_task." ".$dp_pin.$dg_pin);
}

//New Task Name Don't forget to list it above
/*
else if(Enter your conditon here)
{
	Type your work here
}
*/

?>
