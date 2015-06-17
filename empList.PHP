<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=uft-8">
	<title>雇员信息列表</title>
</head>
<?php
	
	require_once 'EmpService.class.php';
//	require_once 'SqlHelper.class.php';

	//$sqlHelper = new SqlHelper();
	//(4)发送sql数据，验证
	$pageSize = 15; //每页显示几条记录
	$rowCount = 0; //数据库共有多少条记录
	$pageNow = 1;  //当前是第几页
	$pageCount = 0;//总共多少页
	
	if(!empty($_GET['pageNow']))
	{
		$pageNow = $_GET['pageNow'];
	}
	
	//计算会有多少分页
	$empService = new EmpService();
	$pageCount = $empService->getPageCount($pageSize);

	
	//echo "sql".$sql;
	$res = $empService->getList($pageNow,$pageSize);// or die(mysql_error());
	echo "<table border='1px' bordercolor='blue' cellspacing=0px width=700px,height=500px>";
	echo "<h1>雇员信息列表</h1>";
	echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>删除用户</th><th>修改用户</th></tr>";
/*	while($row=mysql_fetch_assoc($res))
	{
		echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td>
		<td>{$row['email']}</td><td>{$row['salary']}</td><th><a href='#'>删除用户</a></th>
		<th><a href='#'>修改用户</a></th></tr>";
	}
*/
	for($i=0; $i<count($res); $i++)
	{
		$row = $res[$i];
		echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td>
		<td>{$row['email']}</td><td>{$row['salary']}</td><th><a href='#'>删除用户</a></th>
		<th><a href='#'>修改用户</a></th></tr>";
	}
	echo "</table>";

	//打印页码超链接
/*	for($i=1; $i<=$pageCount; $i++)
	{
		echo "<a href='empList.php?pageNow=$i'>$i</a>&nbsp";
	}
*/
echo "<a href='empList.php?pageNow=1'>首页</a>&nbsp";
if($pageNow>1)
{
	$prePage = $pageNow - 1;
	echo "<a href='empList.php?pageNow=$prePage'>上一页</a>&nbsp";
}
if($pageNow<$pageCount)
{
	$nextPage = $pageNow + 1;
	echo "<a href='empList.php?pageNow=$nextPage'>下一页</a>&nbsp";
}

$page_whole = 10;
$start = floor(($pageNow-1)/$page_whole)*$page_whole+1;
$index = $start;

if($pageNow>10)
{
	echo "<a href='empList.php?pageNow=".($start-1)."'><<<</a>&nbsp";
}

for(;$start<$index+$page_whole;$start++)
{
	echo "<a href='empList.php?pageNow=$start'>[$start]</a>";
}

echo "&nbsp<a href='empList.php?pageNow=$start'>>>></a>&nbsp";

/*if($pageNow>6)
{
	$preprePage = $pageNow - 5;
	echo "<a href='empList.php?pageNow=$preprePage'><<<</a>&nbsp";
	$a = $preprePage-5;$b = $preprePage-4;$c = $preprePage-3;
	$d = $preprePage-2;$e = $preprePage-1;

echo "<a href='empList.php?pageNow=1'>[$a]</a>";
echo "<a href='empList.php?pageNow=1'>[$b]</a>";
echo "<a href='empList.php?pageNow=1'>[$c]</a>";
echo "<a href='empList.php?pageNow=1'>[$d]</a>";
echo "<a href='empList.php?pageNow=1'>[$e]</a>";
}


if($pageNow<$pageCount-5)
{
	$nextnextPage = $pageNow + 5;
	echo "<a href='empList.php?pageNow=$nextnextPage'>>>></a>&nbsp";
}
*/
echo "当前页{$pageNow}/共{$pageCount}页&nbsp";
echo "<a href='empList.php?pageNow=$pageCount'>末页</a>&nbsp";
?>
<br/><br/>
<form action="empList.php">
跳转到:<input type="text" name="pageNow"/>
<input type="submit" value="GO"/>
</form>

<body>
	
</body>
</html>
