<?php

    if(!isset($_SESSION['_chlang']))
        $_SESSION['_chlang']="en";
    
    // load language strings
    include ("lng/".$_SESSION['_chlang'].".php");
    
?>
