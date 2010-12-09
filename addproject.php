<?php
include 'includes/checksession.php';
date_default_timezone_set('PRC');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>AddProject</title>
</head>
<body>
<?php include 'head.php';?>
<div align="center">
<form action="Project_addition.php" method="post">
	<table>
	<tr><td>project name:</td></tr>
	<tr><td><input type="text" name="name" size="40"/></td></tr>
	<tr><td>start time:</td></tr>
	<tr><td>
		<input name="startdate" size="10" type="date" value="<?php $date = date("Y-m-d"); echo "$date";?>" min="<?php echo "$date";?>"/>
		<input name="starttime" size="10" type="time" value="<?php $time = date("H:i"); echo "$time";?>" min="<?php echo "$time";?>"/>
	</td></tr>
	<tr><td>end time:</td></tr>
	<tr><td>
		<input name="enddate" size="10" type="date" value="<?php echo "$date";?>" min="<?php echo "$date";?>"/>
		<input name="endtime" size="10" type="time" value="<?php echo "$time";?>" min="<?php echo "$time";?>"/>
	</td></tr>
	<tr><td>remarks:</td></tr>
	<tr><td><textarea name="remarks" cols="40" rows="5"></textarea></td></tr>
	<tr><td><input type="submit" value="Add"/></td></tr>
	</table>
</form>
</div>
</body>
</html>