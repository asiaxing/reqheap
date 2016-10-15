<?php

    //escape special characters for saving into DB
    function escapeChars($str)
    {
        $str=addslashes(stripslashes($str));
        return $str;
    }

    function pw($pwd) 
    {
        $result = sha1(md5($pwd."rqhp71"));
        return $result;
    }
?>
