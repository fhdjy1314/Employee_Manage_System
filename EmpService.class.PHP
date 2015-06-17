<?php
	
	require_once 'SqlHelper.class.php';
	class EmpService
	{
		function getPageCount($pageSize)
		{
			$sql = "select count(id) from emp";
			$sqlHelper = new SqlHelper();
			$res = $sqlHelper->execute_dql($sql);
			if($row=mysql_fetch_row($res))
			{
				$rowCount = $row[0];
			}
		//计算会有多少分页
			$pageCount = ceil($rowCount/$pageSize);

			mysql_free_result($res);

			$sqlHelper->close_connect(); 

			return $pageCount;
		}

		function getList($pageNow,$pageSize)
		{
			$sql = "select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
			$sqlHelper = new SqlHelper();
			$res = $sqlHelper->execute_dql2($sql);
			$sqlHelper->close_connect(); 
			return $res;
		}
	}
?>
