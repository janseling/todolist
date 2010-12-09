<?php
session_start();
$email = $_SESSION['email'];
$username = $_POST['username'];
include_once 'includes/UserInformation.php';
$userinfo = new UserInformation();
$userinfo -> setEmail($email);

include 'modify.php';
if($userinfo -> checkUsername($username))
{
	if($userinfo -> changeUsername($username))
	{
		echo "<div align=\"center\">Change username success! <div/>";
	}
	else
	{
		echo "<div align=\"center\">Change username failed , Pleace retry! <div/>";
	}
}
else
{
	echo "<div align=\"center\">username must be between 6-20 !<div/>";
}
?>