<?php
	require_once 'AdminService.class.php';
	//接收用户的数据
	//1、id
	$id = $_POST['id'];
	//2、密码
	$password = $_POST['password'];
	//数据库验证，mysql扩展库
	$adminService = new AdminService();
	if($name=$adminService->checkAdmin($id,$password))
	{
		header ("Location:empMange.php?name=$name");
		exit();
	}
	else
	{
		header ("Location:login.php?errno=1");
		exit();
	}
	
?>
