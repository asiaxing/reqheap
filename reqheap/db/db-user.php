<?php
    
    function dbuser_get_user_records()
    {
        $sql = "select * from users";
        
        $app_dblink = dblink_app();
        
        $records = $app_dblink->query_sql($sql);
        
        if($records)
        {
            return $records;
        }
        else
            return null;
    }


    function dbuser_table_title()
    {
        $align = "center";
        htmltable_row_start("grey");
        htmltable_col($align, "");
	    htmltable_col($align, "ID");
	    htmltable_col($align, "Acount");
        htmltable_col($align, "Name");
        htmltable_col($align, "Email");
        htmltable_col($align, "Rights");
        htmltable_row_end();
    }

    function dbuser_table_data()
    {
        $align = "left";
        $seq = 1;
        $records = dbuser_get_user_records();
        if($records)
        {
            while($record = $records->fetch_object())
            {
                htmltable_row_start("light_blue");
                htmltable_radio($seq);
	            htmltable_col($align, $record->u_id);
	            htmltable_col($align, $record->u_username);
                htmltable_col($align, $record->u_name);
                htmltable_col($align, $record->u_email);
                htmltable_col($align, $record->u_rights);
                htmltable_row_end();
                $seq += 1;
            }
        }
    }

?>
