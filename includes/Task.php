<?php
include_once 'connectSQL.php';
class Task
{
	private $conFactroy;
	private $con;
	private $id;
	private $row;
	
	#���캯���������ݿ�����
	function  __construct()
	{
		$this -> conFactroy = new MySQLConnect();
		$this -> con = $this -> conFactroy -> createConnection();
	}
	
	#��ȡĳ����Ŀ�µ�����
	public function getTaskslList($pid)
	{
		$sql="select * from tasks where pid=$pid;";
		$result = mysql_query($sql,$this->con);
		return $result;
	}
	
	#��������id
	public function setId($id)
	{
		$this -> id = $id;
	}
	
	#��ȡ������Ϣ
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

	#��ȡ��������
	public function getTaskName()
	{
		return $this->row['name'];
	}

	#��ȡ����ʱ��
	public function getTaskSettime()
	{
		return $this->row['settime'];
	}
	
	#��ȡ����ص�
	public function getTaskLocation()
	{
		return $this->row['location'];
	}
	
	#��ȡ��������
	public function  getTaskContent()
	{
		return $this->row['content'];
	}
	
	#��ȡ����״̬
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
	
	#�������
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
	
	#�����������
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
	
	#�������ص�
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
	
	#�����������
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
	
	#��ȡĳһ�����������
	public function getDayTasks($time)
	{
		$sql = "select * from tasks where datediff(day,$time,settime)<>0;";
		$result = mysql_query($sql,$this->con);
		return $result;
	}
	
	#ɾ��һ������
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
	
	#ɾ���������
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