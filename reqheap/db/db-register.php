<?php
    // Prevent multiple includes - use conditional function definitions

    if (!function_exists('dbregister_save')) {
        function dbregister_save()
        {
            $u_username = $_POST['register_acount'];
            $u_password = $_POST['register_password'];
            $u_name = $_POST['register_name'];
            $u_email = $_POST['register_email'];

            $sql="insert into users (u_username,u_password,u_name,u_email,u_rights) values ('".
                escapeChars($u_username)."','".
                pw($u_password)."','".
                escapeChars($u_name)."','".
                escapeChars($u_email)."','0')";

            $app_dblink = dblink_app();

            // save data to database
            $ret = $app_dblink->exec_sql($sql);
            return $ret;
        }
    }
?>
