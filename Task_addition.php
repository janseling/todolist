<?php
include 'includes/Task.php';
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$location = $_POST['location'];
$content = $_POST['content'];
$pid = $_POST['pid'];
$settime = $date." ".$time;
$task = new Task();

if($task -> checkTasksName($name))
{
	if($task -> checkTasksLocation($location))
	{
		if($task -> checkTasksContent($content))
		{
			if($task -> createTask($pid, $name, $settime, $location, $content))
			{
				header("Location: showTasks.php?pid=$pid");
			}
			else
			{
				include 'addtask.php';
				echo "Add task failed ! please retry ! ";
			}
		}
		else
		{
			include 'addtask.php';
			echo "Content is too long ! Less than 255 ! ";
		}
	}
	else
	{
		include 'addtask.php';
		echo "Location is too long ! Less than 255 ! ";
	}
}
else
{
	include 'addtask.php';
	echo "Task name is too long ! Less than 50 ! ";
}
?>