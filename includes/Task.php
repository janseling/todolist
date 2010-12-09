<?php
include_once 'connectSQL.php';
class Task
{
	private $conFactroy;
	private $con;
	private $id;
	private $row;
	
	#构造函数创建数据库连接
	function  __construct()
	{
		$this -> conFactroy = new MySQLConnect();
		$this -> con = $this -> conFactroy -> createConnection();
	}
	
	#提取某个项目下的任务
	public function getTaskslList($pid)
	{
		$sql="select * from tasks where pid=$pid;";
		$result = mysql_query($sql,$this->con);
		return $result;
	}
	
	#设置任务id
	public function setId($id)
	{
		$this -> id = $id;
	}
	
	#提取任务信息
	public function selectTask()
	{
		$sql = "select * from tasks where id=$this->id;";
		$result = mysql_query($sql,$this->con);
		if($result)
		{
			$this->row = mysql_fetch_assoc($result);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	#获取任务名称
	public function getTaskName()
	{
		return $this->row['name'];
	}

	#获取任务时间
	public function getTaskSettime()
	{
		return $this->row['settime'];
	}
	
	#获取任务地点
	public function getTaskLocation()
	{
		return $this->row['location'];
	}
	
	#获取任务内容
	public function  getTaskContent()
	{
		return $this->row['content'];
	}
	
	#获取任务状态
	public function isTaskDone()
	{
		if($this->row['done'])
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	#添加任务
	public function createTask($pid,$name,$settime,$location,$content)
	{
		$sql = "insert into tasks (pid,name,settime,location,content) values ('$pid','$name','$settime','$location','$content');";
		if(mysql_query($sql,$this->con))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	#检查任务名称
	public function checkTasksName($name)
	{
		$length = strlen($name);
		if($length>50)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	#检查任务地点
	public function checkTasksLocation($location)
	{
		$length = strlen($location);
		if($length>255)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	#检查任务内容
	public function checkTasksContent($content)
	{
		$length = strlen($content);
		if($length>255)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	#获取某一天的所有任务
	public function getDayTasks($time)
	{
		$sql = "select * from tasks where datediff(day,$time,settime)<>0;";
		$result = mysql_query($sql,$this->con);
		return $result;
	}
	
	#删除一个任务
	public function removeOneTask($id)
	{
		$sql = "delete from tasks where id=$id";
		$result = mysql_query($sql);
		if($result)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	#删除多个任务
	public function removeTasks($pid)
	{
		$sql = "delete from tasks where pid=$pid";
		$result = mysql_query($sql);
		if($result)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}	
}
?>