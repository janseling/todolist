<?
header("Content-Type:text/html;charset=utf-8");
?>
<table width="690">
<tr>
<td bgColor="lightblue"><b>Today's tasks</b></td>
</tr>
<tr>
<td>
<table>
<?php
include 'includes/Task.php';
$task = new Task();
$time = date("Y-m-d H:i:s");
$result = $task -> getDayTasks($time);
if($result)
{
	while($row = mysql_fetch_assoc($result))
	{
		$task -> setId($row['id']);
		$task -> selectTask();
?>
<tr title="<?php echo $task -> getTaskContent();?>" <?php if($task -> isTaskDone()){echo "style=\"text-decoration:line-through\"";}?>>
<td><?php echo $task -> getTaskName();?></td>
<td><a href="removeTask.php?pid=<?php echo "$pid";?>&id=<?php echo $row['id'];?>">remove</a></td>
</tr>
<?php
	}
}
else
{
	echo "<tr><td>No Task Today ! </td></tr>";
}
?>
</table>
</td>
</tr>
</table>
