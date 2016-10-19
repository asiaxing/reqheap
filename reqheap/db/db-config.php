<?php
    
    class IniFile
    {
        private $file_name;
        
        public function __construct($file_name)
        {
            $this->file_name = $file_name;
        }
        
        public function write($key, $value)
        {
            $record = "$key = $value\n";
            file_put_contents($this->file_name, $record, FILE_APPEND);
        }
        
        public function read($key)
        {
            $cfg = parse_ini_file($this->file_name);
            return $cfg[$key];
        }
    }
    

    $cfg_file = new IniFile('config.ini');
    
    $cfg_file->write("host", "localhost");
    $cfg_file->write("app_user", "app_user");
    $cfg_file->write("app_user_password", "123_abc_ABC");
    $cfg_file->write("app_database", "app_database");
    
    print $cfg_file->read('host');
    print "<br>";
    print $cfg_file->read('app_user');
    print "<br>";
    print $cfg_file->read('app_user_password');
    print "<br>";
    print $cfg_file->read('app_database');
?>
