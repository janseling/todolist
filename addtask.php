<?php
include 'includes/checksession.php';
date_default_timezone_set('PRC');
$pid = $_GET['pid'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>AddTask</title>
</head>
<body>
<div align="center">
<form action="Task_addition.php" method="post">
	<table>
	<tr><td>name:</td></tr>
	<tr><td><input type="text" name="name" size="40"/></td></tr>
	<tr><td>time:</td></tr>
	<tr><td>
		<input name="date" size="10" type="date" value="<?php $date = date("Y-m-d"); echo "$date";?>" min="<?php echo "$date";?>"/>
		<input name="time" size="10" type="time" value="<?php $time = date("H:i"); echo "$time";?>" min="<?php echo "$time";?>"/>
	</td></tr>
	<tr><td>location:</td></tr>
	<tr><td><input type="text" name="location" size="50"/></td></tr>
	<tr><td>content:</td></tr>
	<tr><td><textarea name="content" cols="40" rows="5"></textarea></td></tr>
	<tr><td><input type="submit" value="Add"/><input type="hidden" name="pid" value="<?php echo "$pid";?>" /></td></tr>
	</table>
</form>
</div>
</body>
</html>