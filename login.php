<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=uft-8">
	</head>
	<h1>管理员登录系统</h1>
	<body>
		<form action="loginProcess.php" method="post">
			<table>
				<tr><td>用户id:</td><td><input type="text" name="id"/></td></tr>
				<tr><td>密  码:</td><td><input type="password" name="password"/></td></tr>
				<tr><td><input type="submit" value="用户登录"/></td>
				<td><input type="reset" value="重新设置"/></td></tr>
			</table>
		</form>
	</body>
	<?php
		if(!empty($_GET['errno']))
		{
			//接受错误编号
			$errno = $_GET['errno'];
			if($errno==1)
			{
				echo "<font color='red' size='3'>您的用户名或者密码出错，请重新输入</font>";
			}
		}
	
	?>
</html>
