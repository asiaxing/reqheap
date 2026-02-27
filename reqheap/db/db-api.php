<?php
	if(!isset($debug)) $debug = false;

	if($debug) print "use db/db-api.php<br>";

	if (!function_exists('dbapi_connect')) {
		function dbapi_connect($host, $user, $password, $database)
		{
			if($database != "")
				return mysqli_connect($host, $user, $password, $database);
			else
				return mysqli_connect($host, $user, $password);
		}
	}

	if (!function_exists('dbapi_close')) {
		function dbapi_close($link)
		{
			mysqli_close($link);
		}
	}

	if (!function_exists('dbapi_exec_sql')) {
		function dbapi_exec_sql($link, $sql)
		{
			$result = $link->query($sql);
			if (!$result)
				return false;
			else
				return true;
		}
	}

	if (!function_exists('dbapi_query_sql')) {
		function dbapi_query_sql($link, $sql)
		{
			return $link->query($sql);
		}
	}
?>
