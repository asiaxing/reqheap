<?php
    
    class dbconfig_file
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
    
?>
