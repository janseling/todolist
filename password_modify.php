<?php
$email = $_POST['email'];
$opwd = $_POST['opwd'];
$npwd = $_POST['npwd'];
$cnpwd = $_POST['cnpwd'];
include_once 'includes/UserInformation.php';
$userinfo = new UserInformation();
$userinfo -> setEmail($email);

include 'modify.php';
if($userinfo -> checkOldPassword($opwd))
{
	if($userinfo -> checkPassword($npwd, $cnpwd))
	{
		if($userinfo -> changePassword($npwd))
		{
			echo "<div align=\"center\">Change password success! <div/>";
		}
		else
		{
			echo "<div align=\"center\">Change password failed , Pleace retry! <div/>";
		}
	}
	else
	{
		echo "<div align=\"center\">Password and Confirm Password not the same ! <div/>";
	}
}
else
{
	echo "<div align=\"center\">Old Password not right ! <div/>";
}
?>