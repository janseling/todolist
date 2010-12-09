<?php
include_once 'connectSQL.php';
class UserInformation
{
	private $conFactroy;
	private $con;
	private $email;
	private $row;
	
	#构造函数创建数据库连接
	function  __construct()
	{
		$this -> conFactroy = new MySQLConnect();
		$this -> con = $this -> conFactroy -> createConnection();
	}
	
	#设置私有email变量的值
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	#提取用户信息,有就返回true,没有就返回false
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
	
	#获取用户名称
	public function getUsername()
	{
		return $this->row['username'];
	}
	
	#获取密码
	public function getPassword()
	{
		return $this->row['pwd'];
	}
	
	#新增一个用户,成功返回true,失败返回false
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
	
	#更改用户名称,成功返回true,失败返回false
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
	
	#更改用户密码,成功返回true,失败返回false
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
	
	#检查用户名的长度
	function checkUsername($username)
	{
		$length = strlen($username);
		if($length > 20 && $length < 6)
		{
			return FALSE;
		}
		return TRUE;
	}

	#检查E-mail是否可用和是否被注册
	function checkEmail($email)
	{
		$pattern="/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";  //定义验证email正则表达式
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

	#检查密码与确认密码是否相同和密码的长度
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
	
	#检查旧密码时候正确
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