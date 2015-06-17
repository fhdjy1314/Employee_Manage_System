<?php
//该类是数据库应用类，mysql扩展库
	class SqlHelper
	{
		public $conn;
		public $dbname="test";   // 暂时用的是固定的数据库、主机
		public $username="root";
		public $password="root";
		public $host="localhost";
	
	//连接函数，创建该类既创建数据库连接
		public function __construct()
		{
			$this->conn = mysql_connect($this->host,$this->username,$this->password);
			if(!$this->conn)
			{
				die("连接失败".mysql_error());
			}
			mysql_query("set names utf8",$this->conn) or die(mysql_error());
			mysql_select_db($this->dbname,$this->conn) or die(mysql_error());// 选择数据库连接
		}

	//查询命令 select from
		public function execute_dql($sql)
		{
			$res = mysql_query($sql,$this->conn) or die(mysql_error());
			return $res;
		}
		
		public function execute_dql2($sql)
		{
			$arr = array();
			$i = 0;
			$res = mysql_query($sql,$this->conn) or die(mysql_error());
			while($row=mysql_fetch_assoc($res))
			{
				$arr[$i++] = $row;
			}

			mysql_free_result($res);
			return $arr;
		}

		// 数据库操纵语言（增删改）
		public function execute_dml($sql)
		{
			$b = mysql_query($sql,$this->conn);
			if(!$b)
			{
				return 0;
			}
			else
			{
				if(mysql_affected_rows($this->conn)>0)
				{
					return 1; //表示执行OK
				}
				else
				{
					return 2; //表示没有行受到影响
				}
			}
		}
	
	// 关闭连接
		public function close_connect()
		{
			if(!empty($this->conn))
			{
				mysql_close($this->conn);
			}
		}
	}

?>
