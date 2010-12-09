<?php
include_once 'includes/UserInformation.php';
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$userinfo = new UserInformation();
$userinfo -> setEmail($email);
if($userinfo -> selectInfo())
{
	echo "true";
	$userpwd = $userinfo -> getPassword();
	if($pwd === $userpwd)
	{
		session_start();
		$_SESSION['email'] = $email;
		header("Location: home.php");
	}
}
include 'index.html';
echo "<div align=\"center\">Can not login,your email and password is not correct!</div>";
?>