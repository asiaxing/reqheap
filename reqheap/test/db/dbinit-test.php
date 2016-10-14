<?php
	include('../../db/db-init.php');
?>

<?php
	function dbinit_test_case_01()
	{
		$ret = false;
		
		$host = 'localhost';
		
		$super_user = 'root';
		$super_user_password = '1234';
		
		$app_database = 'app_database';
		$app_user = 'app_user';
		$app_user_password = '123_abc_ABC';
		
		$ret = dbinit_database($host, $super_user, $super_user_password, $app_user, $app_user_password, $app_database);
		
		if($ret)
		{
			print "[dbinit_test_case_01] init database - ok<br>";
		}
		else
		{
			print "[dbinit_test_case_01] init database - fail<br>";
		}
		
		return $ret;
	}
?>

<?php
	// run test
	print "====================<br>";
	print "DBINIT TEST CASE 01<br>";
	print "====================<br>";
	$ret = dbinit_test_case_01();
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

