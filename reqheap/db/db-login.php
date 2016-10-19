<?php
    include("admin/inc/func.php");
    include("db/db-link.php");
    
    function dblogin_get_user_record()
    {
        $u_username = $_POST['login_acount'];
        $u_password = $_POST['login_password'];
        
        $sql = "select * from users where u_username = '".escapeChars($u_username)."' and u_password = '".pw($u_password)."'";
        
        $app_dblink = dblink_app();
        
        $records = $app_dblink->query_sql($sql);
        
        if($records)
        {
            $record = $records->fetch_object();
            return $record;
        }
        else
            return null;
    }
    
    function dblogin_user_validate()
    {
        $user_record = dblogin_get_user_record();
        if($user_record)
        {
            // load user info
            $_SESSION['cur_user_id'] = $user_record->u_id;
            $_SESSION['cur_user_acount'] = stripslashes($user_record->u_username);
            $_SESSION['cur_user_name'] = stripslashes($user_record->u_name);
            $_SESSION['cur_user_email'] = $user_record->u_email;
            $_SESSION['cur_user_rights'] = $user_record->u_rights;
            
            return true;
        }
        
        return false;
    }
        
?>
