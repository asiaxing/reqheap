<?php
    include("admin/inc/func.php");
    include("db/db-init.php");
    
    function dbregister_save()
    {
        $u_username = $_POST['register_login_name'];
        $u_password = $_POST['register_login_password'];
        $u_name = $_POST['register_name'];
        $u_email = $_POST['register_email'];

        $sql="insert into users (u_username,u_password,u_name,u_email,u_rights) values ('".
            escapeChars($u_username)."','".
            pw($u_password)."','".
            escapeChars($u_name)."','".
            escapeChars($u_email)."','0')";
        
        print $sql."<br>";
        
        global $app_dblink;
        
        // save data to database
        $ret = $app_dblink->exec_sql($sql);
        return $ret;
    }
?>
