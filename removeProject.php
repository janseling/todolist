<?php
include "includes/Project.php";
include "includes/Task.php";
$id = $_GET['id'];
$project = new Project();
$task = new Task();
if(!($project -> removeProject($id) && $task -> removeTasks($id)))
{
	echo "<scripe>alert(\"Remove project failed ! \");</script>";
}
header("location: home.php");
?>