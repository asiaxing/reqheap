<?php
	include('../../db/db-init.php');
	include('../../db/db-config.php');
?>

<?php
	function dbinit_test_case_01()
	{
		$ret = false;
		
		$host = 'localhost';
		
		$super_user = 'root';
		$super_user_password = '12345678';
		
		$app_database = 'app_database';
		$app_user = 'app_user';
		$app_user_password = '123_abc_ABC';
		
		$ret = dbinit_database($host, $super_user, $super_user_password, $app_user, $app_user_password, $app_database, true);
		
		if($ret)
		{
		    $cfg_file_name = "../../db/config.ini";
		    
		    if(file_exists($cfg_file_name))
		        unlink($cfg_file_name);
		    
		    $cfg_file = new dbconfig_file($cfg_file_name);
    
            $cfg_file->write("host", $host);
            $cfg_file->write("super_user", $super_user);
            $cfg_file->write("super_user_password", $super_user_password);
            $cfg_file->write("app_user", $app_user);
            $cfg_file->write("app_user_password", $app_user_password);
            $cfg_file->write("app_database", $app_database);
            
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

