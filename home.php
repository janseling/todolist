<?php
include_once 'includes/checksession.php';
include 'includes/Project.php';
header("Content-Type:text/html;charset=utf-8");
?>
<html>
	<head>
		<title>to-do-list</title>
		<script type="text/javascript" src="js/project.js"></script>
	</head>
	<body>
	<?php include 'head.php';?>
	<div align="center">
	<table>
	<tr>
	<td>
	
	<div style="width:300;float:left;">
		<table width="300">
		<tr><td height="150" align="center"><?php include 'includes/smallcalendar.php';?></td></tr>
		<tr>
		<td bgColor="lightgray"><b>Projects</b></td>
		</tr>
		<tr>
		<td>
		<table>
		<?php
		$project = new Project();
		$result = $project -> getProjectList(0);
		while ($row = mysql_fetch_assoc($result))
		{?>
		<tr>
		<td width="90%" title="<?php echo $row['remarks'];?>">
			<a href="showTasks.php?pid=<?php echo $row['id']?>" target="tasks"><?php echo $row['name'];?></a>
		</td>
		<td width="10%" align="right"><a href="removeProject.php?id=<?php echo $row['id'];?>">remove</a></td>
		</tr>
		<?php }?>
		</table>
		</td>
		</tr>
		<tr><td width="300" align="right"><a href="addproject.php">Add</a></td></tr>
		</table>
	</div>
	
	<div style="width:700;float:left;">
	<iframe scrolling="no" id="tasks" src="today_s_tasks.php" width="700" frameborder="0" onload="this.height=tasks.document.body.scrollHeight"></iframe>
	</div>
	
	</td>
	</tr>
	</table>
	</div>
	</body>
</html>
