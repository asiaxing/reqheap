<?php
    $debug = true;
    if($debug) print "debug is on<br>";
    
    class test_class
    {
        private $var1;
        private $var2;
        
        public function __construct($var1, $var2=false)
        {
            $this->var1 = $var1;
            $this->var2 = $var2;
        }
        
        public function print()
        {
            if($this->var1)
                print "var1 = true";
            else
                print "var1 = false";
                
            print "<br>";
            
            if($this->var2)
                print "var2 = true";
            else
                print "var2 = false";
            
            print "<br>";
        }
    }
    
    $var1 = true;
    $var2 = false;
    $test_instance = new test_class($var1);
    $test_instance->print();
    
    print "end";

?>
