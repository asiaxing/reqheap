<?php
    function dbprojects_get_projects_records()
    {
        $sql = "select * from projects";
        
        $app_dblink = dblink_app();
        
        $records = $app_dblink->query_sql($sql);
        
        if($records)
        {
            return $records;
        }
        else
            return null;
    }
    
    function dbprojects_table_title()
    {
        $align = "center";
        htmltable_row_start("grey");
	    htmltable_col($align, "ID");
	    htmltable_col($align, "Name");
        htmltable_col($align, "Description");
        htmltable_col($align, "Phase");
        htmltable_col($align, "Status");
        htmltable_col($align, "Leader");
        htmltable_col($align, "Date");
        htmltable_col($align, "Template");
        htmltable_col($align, "Req_Del");
        htmltable_row_end();
    }
    
    function dbprojects_table_data()
    {
        $align = "left";
        $seq = 1;
        $records = dbprojects_get_projects_records();
        if($records)
        {
            while($record = $records->fetch_object())
            {
                htmltable_row_start("light_blue");
                htmltable_radio($seq);
	            htmltable_col($align, $record->p_id);
	            htmltable_col($align, $record->p_name);
                htmltable_col($align, $record->p_desc);
                htmltable_col($align, $record->p_phase);
                htmltable_col($align, $record->p_status);
                htmltable_col($align, $record->p_leader);
                htmltable_col($align, $record->p_date);
                htmltable_col($align, $record->p_template);
                htmltable_col($align, $record->p_req_del);
                htmltable_row_end();
                $seq += 1;
            }
        }
    }
?>
