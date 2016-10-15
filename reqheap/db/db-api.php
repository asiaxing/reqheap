<?php
	print "use db/db-api.php<br>";
	
	function dbapi_connect($host, $user, $password, $database)
	{
		if($database != "")
			return mysqli_connect($host, $user, $password, $database);
		else
			return mysqli_connect($host, $user, $password);
	}

	function dbapi_close($link)
	{
		mysqli_close($link);
	}

	function dbapi_exec_sql($link, $sql)
	{
		$result = $link->query($sql);
		if (!$result) {
			return false;
		} else {
			return true;
		}
	}
	
	function dbapi_query_sql($link, $sql)
	{
		return $link->query($sql);
	}
?>
