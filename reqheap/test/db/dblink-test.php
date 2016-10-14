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
		
		$super_dblink = new dblink($host, $super_user, $super_user_password);
		
		// create test database
		$sql = "create database if not exists $test_database";
		$ret = $super_dblink->exec_sql($sql);
		
		if($ret)
		{
			// create test user
			$sql = "grant all privileges on $test_database.* to $test_user@$host identified by '$test_user_password'";
			$ret = $super_dblink->exec_sql($sql);
			
			if($ret)
			{
				$test_dblink = new dblink($host, $test_user, $test_user_password, $test_database);
		
				// create table
				$sql = "create table if not exists `user`(
					`id` int(11) not null auto_increment, 
					`name` varchar(255) not null, 
					`password` varchar(255) not null, 
					primary key(`id`)) 
					engine=myisam 
					default charset=utf8 
					auto_increment=2";
				$ret = $test_dblink->exec_sql($sql);
				
				if($ret)
				{
					// drop test database
					$sql = "drop database if exists $test_database";
					$ret = $super_dblink->exec_sql($sql);
					
					if($ret)
					{
						// drop test user
						$sql = "drop user $test_user@$host";
						$ret = $super_dblink->exec_sql($sql);
					}
				}
			}
		}
		
		return $ret;
	}

?>

<?php
	// run test
	print "====================<br>";
	print "DBLINK TEST CASE 01<br>";
	print "====================<br>";
	$ret = dblink_test_case_01();
	if($ret)
	{
		print "==========<br>";
		print "PASS<br>";
		print "==========<br>";
	}
	else
	{
		print "==========<br>";
		print "FAIL<br>";
		print "==========<br>";
	}
?>
