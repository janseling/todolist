<?php
header("Content-Type:text/html;charset=utf-8");
include_once 'includes/checksession.php';
include_once 'includes/UserInformation.php';
$email = $_SESSION['email'];
$userinfo = new UserInformation();
$userinfo -> setEmail($email);

if($userinfo -> selectInfo())
{
	$pwd = $userinfo -> getPassword();
	$username = $userinfo -> getUsername();
?>
<html>
<head>
	<title>User Information Modify</title>
</head>
<body>
	<?php include 'head.php';?>
	<div align="center">
		
		<form action="username_modify.php" method="post">
		<table>
			<tr><td>Change Username</td></tr>
			<tr><td>username:</td></tr>
			<tr><td><input name="username" type="text" value="<?php echo "$username"?>" size="40"/></td></tr>
			<tr><td><input type="submit" value="finish"/></td></tr>
		</table>
		</form>
		
		<form action="password_modify.php" method="post">
		<table>
			<tr><td>Change Password</td></tr>
			<tr><td>Old password:</td></tr>
			<tr><td><input name="opwd" type="password" size="40"/></td></tr>
			<tr><td>New password:</td></tr>
			<tr><td><input name="npwd" type="password" size="40"/></td></tr>
			<tr><td>Confirm new password:</td></tr>
			<tr><td><input name="cnpwd" type="password" size="40"/></td></tr>
			<tr><td><input type="submit" value="finish"/><input type="hidden" name="email" value="<?php echo "$email"?>"/></td></tr>
		</table>
		</form>
<?php
}
else
{
	echo "Warning ! Select user information failed , Please retry !";
}
?>
	</div>
</body>
</html>
