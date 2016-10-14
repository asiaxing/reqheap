<?php
	include('../../db/db-link.php');
?>

<?php
	function dblink_test_case_01()
	{
		$ret = false;
		
		$host = 'localhost';
		$super_user = 'root';
		$super_user_password = '1234';
		
		$test_database = 'test';
		$test_user = 'test_user';
		$test_user_password = '123_abc_ABC';
		
		$link = new dblink($host, $super_user, $super_user_password);
		
		// create test_database
		$sql = "create database if not exists $test_database";
		$ret = $link->exec_sql($sql);
		
		if($ret)
		{
			// create test_user
			$sql = "grant all privileges on $test_database.* to $test_user@$host identified by '$test_user_password'";
			$ret = $link->exec_sql($sql);
		}
		
		return $ret;
	}

	function dblink_test_case_02()
	{
		$ret = false;
		
		$host = 'localhost';
		$test_database = 'test';
		$test_user = 'test_user';
		$test_user_password = '123_abc_ABC';
		
		$link = new dblink($host, $test_user, $test_user_password, $test_database);
		
		// create table
		$sql = "create table if not exists `user`(`id` int(11) not null auto_increment, `name` varchar(255) not null, `password` varchar(255) not null, primary key(`id`)) engine=myisam default charset=utf8 auto_increment=2";
		$ret = $link->exec_sql($sql);
		return $ret;
	}
?>

<?php
	// run test
	print "<br>===============================================<br>";
	if(dblink_test_case_01())
		print "[dblink_test_case_01] test result: pass<br>";
	else
		print "[dblink_test_case_01] test result: fail<br>";
	
	print "<br>===============================================<br>";
	if(dblink_test_case_02())
		print "[dblink_test_case_02] test result: pass<br>";
	else
		print "[dblink_test_case_02] test result: fail<br>";
?>
