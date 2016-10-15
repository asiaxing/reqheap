<?php

    session_start();
    
    // time
    $_SESSION['time'] = time();
    print "session start:".date('Y/m/d H:i:s', $_SESSION['time'])."<br>";
    
    // functions
    print "session id:".session_id()."<br>";
    print "session name:".session_name()."<br>";
    print "session name:".ini_get('session.name')."<br>";
    print "session path:".ini_get('session.save_path')."<br>";
    print "session cookie path:".ini_get('session.cookie_path')."<br>";
    
    // var test
    $_SESSION['var'] = 'this is a test var';
    print "session var:".$_SESSION['var']."<br>";
    
    // strstr test
    print strstr("This is a test string for strstr", "test")."<br>";
    
    // define test
    define("PROJECT_URL", "http://localhost/reqheap/reqheap");
    print PROJECT_URL."<br>";
?>
