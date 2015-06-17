<?php
	
	require_once 'SqlHelper.class.php';
	//该类是个业务逻辑处理类，主要完成对admin表的操作
	class AdminService
	{
		//提供验证用户是否合法的方法
		public function checkAdmin($id,$password)
		{ 
			$sql = "select password,name from admin where id=$id";	
			$sqlHelper = new SqlHelper();
			$res = $sqlHelper->execute_dql($sql);
			if($row=mysql_fetch_assoc($res))
			{
				if($row['password']==md5($password))
				{
			//合法用户
				return $row['name'];
				}
				
			}
			

			mysql_free_result($res);

			$sqlHelper->close_connect();
			return '';
		}
	}
?>
