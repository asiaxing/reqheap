<?php
    // Prevent multiple includes - use conditional class/function definitions
    if (!class_exists('dblink')) {

        if(!isset($debug)) $debug = false;

        if($debug) print "use db/db-link.php<br>";

        include('db-api.php');

        class dblink
        {
            private $host;
            private $user;
            private $password;
            private $database;
            private $debug;

            public function __construct($host, $user, $password, $database="", $debug=false)
            {
                $this->host = $host;
                $this->user = $user;
                $this->password = $password;
                $this->database = $database;
                $this->debug = $debug;

                if($this->debug) print "[dblink::__construct] host:" . $this->host . "<br>";
                if($this->debug) print "[dblink::__construct] user:" . $this->user . "<br>";
                if($this->debug) print "[dblink::__construct] password:" . $this->password . "<br>";
                if($this->debug) print "[dblink::__construct] database:" . $this->database . "<br>";
            }

            public function exec_sql($sql)
            {
                $ret = false;

                $link = dbapi_connect($this->host, $this->user, $this->password, $this->database);
                if($link)
                {
                    if($this->debug) print "[dblink::exec_sql] database {$this->database} is connected<br>";
                    if($this->debug) print "[dblink::exec_sql] execute sql: ". $sql . "<br>";

                    $ret = dbapi_exec_sql($link, $sql);

                    if($ret)
                    {
                        if($this->debug) print "[dblink::exec_sql] execute sql - ok<br>";
                    }
                    else
                    {
                        if($this->debug) print "[dblink::exec_sql] execute sql - fail<br>";
                    }

                    dbapi_close($link);
                    if($this->debug) print "[dblink::exec_sql] database {$this->database} is closed<br>";
                }
                else
                {
                    if($this->debug) print "[dblink::exec_sql] error: database {$this->database} connection fail<br>";
                }

                return $ret;
            }

            public function query_sql($sql)
            {
                $records = null;

                $link = dbapi_connect($this->host, $this->user, $this->password, $this->database);
                if($link)
                {
                    if($this->debug) print "[dblink::query_sql] database {$this->database} is connected<br>";
                    if($this->debug) print "[dblink::query_sql] query sql: ". $sql . "<br>";

                    $records = dbapi_query_sql($link, $sql);

                    if($this->debug) print "[dblink::query_sql] get $records->num_rows rows<br>";

                    dbapi_close($link);
                    if($this->debug) print "[dblink::query_sql] database {$this->database} is closed<br>";
                }
                else
                {
                    if($this->debug) print "[dblink::query_sql] error: database {$this->database} connection fail<br>";
                }

                return $records;
            }

        }
    }

    include("db-config.php");

    if (!function_exists('dblink_app')) {
        function dblink_app()
        {
            $cfg_file = new dbconfig_file("config.ini");
            $host = $cfg_file->read("host");
            $app_user = $cfg_file->read("app_user");
            $app_user_password = $cfg_file->read("app_user_password");
            $app_database = $cfg_file->read("app_database");
            $app_dblink = new dblink($host, $app_user, $app_user_password, $app_database, false);

            return $app_dblink;
        }
    }
?>
