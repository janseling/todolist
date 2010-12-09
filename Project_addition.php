<?php
include 'includes/Project.php';
$name = $_POST['name'];
$start = $_POST['startdate'].' '.$_POST['starttime'];
$end = $_POST['enddate'].' '.$_POST['endtime'];
$remarks = $_POST['remarks'];
$project = new Project();

if($project -> checkName($name))
{
	if($project -> chaeckTime($start, $end))
	{
		if($project -> checkremarks($remarks))
		{
			if($project -> createProject($name, $start, $end, $remarks))
			{
				header("Location: home.php");
			}
			else
			{
				include 'addproject.php';
				echo "Create project failed ! Please retry ! ";
			}
		}
		else
		{
			include 'addproject.php';
			echo "Remarks is too long ! Less than 255 ! ";
		}
	}
	else
	{
		include 'addproject.php';
		echo "End time must be longer then start time ! ";
	}
}
else
{
	include 'addproject.php';
	echo "Project name is too long ! Less than 50 ! ";
}
?>