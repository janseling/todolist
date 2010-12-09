<?php
$pid = $_GET['pid'];
header("Content-Type:text/html;charset=utf-8");
include 'includes/Project.php';
include 'includes/Task.php';
$project = new Project();
$project -> setId($pid);
$project -> selectProject();
?>
<table width="685">
<tr>
    <td colspan="2" bgColor="lightblue"><b>Project Information</b></td>
</tr>
<tr>
    <td width="150">Project Name : </td>
	<td><?php echo $project -> getProjectName();?></td>
</tr>
<tr>
    <td width="150">Start Time : </td>
	<td><?php echo $project -> getProjectStarttime();?></td>
</tr>
<tr>
    <td width="150">End Time : </td>
	<td><?php echo $project -> getProjectEndtime();?> <a href="delayProject.php?id=<?php echo "$pid";?>">delay</a></td>
</tr>
<tr>
    <td width="150">Remarks : </td>
	<td style="word-break:break-all"><?php echo $project -> getProjectRemarks();?></td>
</tr>
<tr>
    <td colspan="2" bgColor="lightblue"><b>Task List</b></td>
</tr>

<tr>
<td colspan="2">

<table width="685">
<?php
$task = new Task();
$result = $task -> getTaskslList($pid);
if($row = mysql_fetch_assoc($result))
{
	do{
		$task -> setId($row['id']);
		$task -> selectTask();
?>
<tr title="<?php echo $task -> getTaskContent();?>" <?php if($task -> isTaskDone()){echo "style=\"text-decoration:line-through\"";}?>>
<td width="90%"><?php echo $task -> getTaskName();?></td>
<td width="10%"></td>
<td width="10%" align="right"><a href="removeTask.php?pid=<?php echo "$pid";?>&id=<?php echo $row['id'];?>">remove</a></td>
</tr>
<?php
	}while($row = mysql_fetch_assoc($result));
}
else
{?>
<tr><td>Not have any task , <a href="addtask.php?pid=<?php echo "$pid";?>">add now</a> ! </td></tr>
<?php }?>
</table>

</td>
</tr>
<tr><td colspan="2" align="right"><a href="addtask.php?pid=<?php echo "$pid";?>">Add</a></td></tr>
</table>
