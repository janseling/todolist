<?php
include_once 'connectSQL.php';
class UserInformation
{
	private $conFactroy;
	private $con;
	private $email;
	private $row;
	
	#���캯���������ݿ�����
	function  __construct()
	{
		$this -> conFactroy = new MySQLConnect();
		$this -> con = $this -> conFactroy -> createConnection();
	}
	
	#����˽��email������ֵ
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	#��ȡ�û���Ϣ,�оͷ���true,û�оͷ���false
	public function selectInfo()
	{
		$sql = "select * from users where email='$this->email'";
		$result = mysql_query($sql,$this->con);
		$this->row = mysql_fetch_assoc($result);
		if($this->row == 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	#��ȡ�û�����
	public function getUsername()
	{
		return $this->row['username'];
	}
	
	#��ȡ����
	public function getPassword()
	{
		return $this->row['pwd'];
	}
	
	#����һ���û�,�ɹ�����true,ʧ�ܷ���false
	public function registeUser($username,$email,$pwd)
	{
		$sql = "insert into users values('$username','$email','$pwd')";
		if(mysql_query($sql,$this->con))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	#�����û�����,�ɹ�����true,ʧ�ܷ���false
	public function changeUsername($username)
	{
		$sql = "update users set username='$username' where email='$this->email'";
		if(mysql_query($sql,$this->con))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	#�����û�����,�ɹ�����true,ʧ�ܷ���false
	public function changePassword($pwd)
	{
		$sql = "update users set pwd='$pwd' where email='$this->email'";
		if(mysql_query($sql,$this->con))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	#����û����ĳ���
	function checkUsername($username)
	{
		$length = strlen($username);
		if($length > 20 && $length < 6)
		{
			return FALSE;
		}
		return TRUE;
	}

	#���E-mail�Ƿ���ú��Ƿ�ע��
	function checkEmail($email)
	{
		$pattern="/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";  //������֤email������ʽ
		if(!(preg_match($pattern,$email,$counts)))
		{
			return FALSE;
    	}
		if($userinfo -> selectInfo())
		{
			return FALSE;
		}
		return TRUE;
	}

	#���������ȷ�������Ƿ���ͬ������ĳ���
	function checkPassword($pwd,$cpwd)
	{
		if(!($pwd===$cpwd))
		{
			return FALSE;
		}
		$length = strlen($pwd);
		if($length < 6 && $length > 20)
		{
			return FALSE;
		}
		return TRUE;
	}
	
	#��������ʱ����ȷ
	function checkOldPassword($pwd)
	{
		$sql = "select * from users where email='$this->email' and pwd='$pwd'";
		$result = mysql_query($sql,$this->con);
		$row1 = mysql_fetch_assoc($result);
		if($row1 == 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
?>