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
		
		$test_database = 'test_database';
		$test_user = 'test_user';
		$test_user_password = '123_abc_ABC';
		
		$super_dblink = new dblink($host, $super_user, $super_user_password);
		
		
		// drop test database
		$sql = "drop database if exists $test_database";
		$ret = $super_dblink->exec_sql($sql);
		
		if($ret)
		{
			// drop test user
			$sql = "drop user if exists $test_user@$host";
			$ret = $super_dblink->exec_sql($sql);
			
			if($ret)
			{
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
							for($i=1; $i<10; $i++)
							{
								$sql = "insert into `user` values($i, '$test_user', '$test_user_password')";
								$ret = $test_dblink->exec_sql($sql);
								if(!ret)
								{
									break;
								}
							}
						}
					}
				}
			}
		}
		
		return $ret;
	}


	function dblink_test_case_02()
	{
		$ret = false;
		
		$host = 'localhost';
		
		$test_database = 'test_database';
		$test_user = 'test_user';
		$test_user_password = '123_abc_ABC';
		
		$test_dblink = new dblink($host, $test_user, $test_user_password, $test_database);
		
		$sql = "select * from user";
		$records = $test_dblink->query_sql($sql);
		
		if($records)
		{
			$ret = true;
			
			while($obj = $records->fetch_object())
			{
				$id=$obj->id;
				$name=$obj->name;
				$password=$obj->password;
				print "[dblink_test_case_02] record - id[$id] name[$name] password[$password]<br>";
			}
			
			$records->close();
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
	
	print "====================<br>";
	print "DBLINK TEST CASE 02<br>";
	print "====================<br>";
	$ret = dblink_test_case_02();
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
