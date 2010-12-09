<?php
include "includes/Task.php";
$task = new Task();
$id = $_GET['id'];
$pid = $_GET['pid'];
if(!$task -> removeOneTask($id))
{
	echo "<scripe>alert(\"Remove task failed ! \");</script>";
}
header("location: showTasks.php?pid=$pid");
?>