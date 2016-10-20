<?php
    function htmltable_col($align, $text)
    {
        print "<td align=\"".$align."\"><b>".$text."</b></a></td>";
    }
    
    function htmltable_row_start($tclass)
    {
        print "<tr class=\"".$tclass."\">";
    }
    
    function htmltable_row_end()
    {
        print "</tr>";
    }
    
    function htmltable_radio($seq)
    {
        print "<td align=\"center\" > <input type=\"radio\" name=\"RR\" value=".$seq."></td>";
    }
?>
