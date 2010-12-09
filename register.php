<?php
header("Content-Type:text/html;charset=utf-8");
include_once 'includes/UserInformation.php';
$userinfo = new UserInformation();
$userinfo -> setEmail($email);
$username = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['cpwd'];

if($userinfo -> checkUsername($username) && $userinfo -> checkEmail($email) && $userinfo -> checkPassword($pwd,$cpwd))
{
	if($userinfo -> registeUser($username, $email, $pwd))
	{
		session_start();
		$_SESSION['email'] = $email;
		header("Location: home.php");
	}
}
else
{
	echo "<div align=\"center\">Sign up failed , click <a href=\"signup.html\">here</a> to return !</div>";
}

?>

