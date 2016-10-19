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
            $record = "$key = $value";
            file_put_contents($this->file_name, $record);
        }
        
        public function read($key)
        {
            $cfg = parse_ini_file($this->file_name);
            return $cfg[$key];
        }
    }
    
    $cfg_file = new IniFile('config.ini');
    $cfg_file->write('host', 'localhost');
    print $cfg_file->read('host');
?>
