<?php
include_once 'connectSQL.php';
class Project
{
	private $conFactroy;
	private $con;
	private $row;
	private $id;
	
	#���캯���������ݿ�����
	function  __construct()
	{
		$this -> conFactroy = new MySQLConnect();
		$this -> con = $this -> conFactroy -> createConnection();
	}
	
	#��������Ŀ
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
	
	#�����Ŀ����
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
	
	#��鱸ע
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
	
	#��鿪ʼ�����ʱ��
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
	
	#��ȡ��Ŀ
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
	
	#������Ŀid
	public function setId($id)
	{
		$this -> id = $id;
	}

	#�����Ŀ����
	public function getProjectName()
	{
		return $this->row['name'];
	}
	
	#��ȡ��Ŀ��ʼʱ��
	public function getProjectStarttime()
	{
		return $this->row['start'];
	}
	
	#��ȡ��Ŀ����ʱ��
	public function getProjectEndtime()
	{
		return $this->row['end'];
	}

	#��ȡ��Ŀ��ע
	public function getProjectRemarks()
	{
		return $this->row['remarks'];
	}

	#��ȡ��Ŀ�б�
	public function getprojectList($parent)
	{
		$sql = "select * from projects where parent=$parent";
		$result = mysql_query($sql,$this->con);
		return $result;
	}
	
	#ɾ����Ŀ
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