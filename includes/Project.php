<?php
include_once 'connectSQL.php';
class Project
{
	private $conFactroy;
	private $con;
	private $row;
	private $id;
	
	#构造函数创建数据库连接
	function  __construct()
	{
		$this -> conFactroy = new MySQLConnect();
		$this -> con = $this -> conFactroy -> createConnection();
	}
	
	#创建新项目
	public function createProject($name,$start,$end,$remarks)
	{
		$sql = "insert into projects (parent,name,start,end,remarks) values (0,'$name','$start','$end','$remarks')";
		$result = mysql_query($sql,$this->con);
		if($result)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	#检查项目名称
	public function checkName($name)
	{
		$length = strlen($name);
		if($length<50)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	#检查备注
	public function checkremarks($remarks)
	{
	$length = strlen($remarks);
		if($length<255)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	#检查开始与结束时间
	public function chaeckTime($start,$end)
	{
		if($end > $start)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	#提取项目
	public function selectProject()
	{
		$sql="select * from projects where id=$this->id";
		$result = mysql_query($sql,$this->con);
		if($result)
		{
			$this -> row = mysql_fetch_assoc($result);
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	#设置项目id
	public function setId($id)
	{
		$this -> id = $id;
	}

	#获得项目名称
	public function getProjectName()
	{
		return $this->row['name'];
	}
	
	#获取项目开始时间
	public function getProjectStarttime()
	{
		return $this->row['start'];
	}
	
	#获取项目结束时间
	public function getProjectEndtime()
	{
		return $this->row['end'];
	}

	#获取项目备注
	public function getProjectRemarks()
	{
		return $this->row['remarks'];
	}

	#获取项目列表
	public function getprojectList($parent)
	{
		$sql = "select * from projects where parent=$parent";
		$result = mysql_query($sql,$this->con);
		return $result;
	}
	
	#删除项目
	public function removeProject($id)
	{
		$sql = "delete from projects where id=$id";
		$result = mysql_query($sql,$this->con);
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