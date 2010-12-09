<?php
header("Content-Type:text/html;charset=utf-8");
include_once 'includes/UserInformation.php';
$email = $_SESSION['email'];
$userinfo = new UserInformation();
$userinfo -> setEmail($email);
$userinfo -> selectInfo();
$username = $userinfo -> getUsername();
?>
<html>
	<head>
		<title>to-do-list</title>
	</head>
	<body>
	<div align="center">
		<table width="1000">
			<tr><td align="right" width="100%">Hellow <b><?php echo "$username"?></b> ! <a href="logout.php">log out</a></td></tr>
			<tr><td><hr color="lightblue"></td></tr>
			<tr><td height="35" valign="middle"><a href="home.php">Home</a> | <a href="inbox.php">Inbox</a> | <a href="calendar.php">Calendar</a>  | <a href="map.php">Map</a> | <a href="modify.php">Modify</a></td></tr>
			<tr><td><hr color="lightblue"></td></tr>
		</table>
	</div>
	</body>
</html>

