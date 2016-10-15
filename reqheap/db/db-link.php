<?php
	print "use db/db-link.php<br>";
	
	include('db-api.php');

	class dblink
	{
		private $host;
		private $user;
		private $password;
		private $database;
		
		public function __construct($host, $user, $password, $database="")
		{
			$this->host = $host;
			$this->user = $user;
			$this->password = $password;
			$this->database = $database;
			
			print "[dblink::__construct] host:" . $this->host . "<br>";
			print "[dblink::__construct] user:" . $this->user . "<br>";
			print "[dblink::__construct] password:" . $this->password . "<br>";
			print "[dblink::__construct] database:" . $this->database . "<br>";
		}
		
		public function exec_sql($sql)
		{
			$ret = false;
			
			$link = dbapi_connect($this->host, $this->user, $this->password, $this->database);
			if($link)
			{
				print "[dblink::exec_sql] database {$this->database} is connected<br>";
				
				print "[dblink::exec_sql] execute sql: ". $sql . "<br>";
				$ret = dbapi_exec_sql($link, $sql);
				
				if($ret)
				{
					print "[dblink::exec_sql] execute sql - ok<br>";
				}
				else
				{
					print "[dblink::exec_sql] execute sql - fail<br>";
				}
				
				dbapi_close($link);
				print "[dblink::exec_sql] database {$this->database} is closed<br>";
			}
			else
			{
				print "[dblink::exec_sql] error: database {$this->database} connection fail<br>"; 
			}
			
			return $ret;
		}
		
		public function query_sql($sql)
		{
			$records = false;
			
			$link = dbapi_connect($this->host, $this->user, $this->password, $this->database);
			if($link)
			{
				print "[dblink::query_sql] database {$this->database} is connected<br>";
				
				print "[dblink::query_sql] query sql: ". $sql . "<br>";
				$records = dbapi_query_sql($link, $sql);
				
				print "[dblink::query_sql] get $records->num_rows rows<br>";
				
				dbapi_close($link);
				print "[dblink::query_sql] database {$this->database} is closed<br>";
			}
			else
			{
				print "[dblink::query_sql] error: database {$this->database} connection fail<br>"; 
			}
			
			return $records;
		}
		
	}
	
?>
