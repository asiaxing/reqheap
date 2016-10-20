<?php
    print $_POST['p_name'];
    print "<br>";
    print $_POST['p_phase'];
    print "<br>";
    print $_POST['p_status'];
    print "<br>";
    print $_POST['p_leader'];
    print "<br>";
    print $_POST['p_req_del'];
    print "<br>";
    
    // check box
    if(isset($_POST['p_template']))
        print "Checked";
    else
        print "No Checked";
?>

<form method="post" name="edit_project" action="">
    <table border="0" cellpadding="2" cellspacing="2" class="content" width="100%">
        
        <!-- title -->
        <tr class="gray">
            <td colspan="2" align="center"><b><?php print $lng[10][2]?></b></td>
        </tr>
        
        <!-- project name -->
        <tr class="blue" title="<?php print $lng[9][16]?>">
            <td align="right">&nbsp;<?php print $lng[10][3]?>&nbsp;:&nbsp;</td>
            <td>&nbsp;<input type="text" name="p_name" value="" maxlength="90" size=60></td>
        </tr>
        
        <!-- project phase -->
        <tr class="light_blue" title="<?php print $lng[9][17]?>">
            <td align="right">&nbsp;<?php print $lng[10][4]?>&nbsp;:&nbsp;</td>
            <td>
                <select name="p_phase">
                    <option value="0"><?php print $lng[9][8];?>
                    <option value="1"><?php print $lng[9][9];?>
                    <option value="2"><?php print $lng[9][10];?>
                    <option value="3"><?php print $lng[9][32];?>
                    <option value="4"><?php print $lng[9][33];?>
                </select>   
            </td>
        </tr>
        
        <!-- project status -->
        <tr class="blue" title="<?php print $lng[9][18]?>">
            <td align="right">&nbsp;<?php print $lng[10][5]?>&nbsp;:&nbsp;</td>
            <td>
                <select name="p_status">
                    <option value="0"><?php print $lng[9][11];?>
                    <option value="1"><?php print $lng[9][12];?>
                    <option value="2"><?php print $lng[9][14];?>
                </select>   
            </td>
        </tr>  
        
        <!-- project leader -->
        <tr class="light_blue" title="<?php print $lng[9][19]?>">
            <td align="right">&nbsp;<?php print $lng[10][6]?>&nbsp;:&nbsp;</td>
            <td>
                <select name="p_leader">
                    <!-- get leader list from database -->
                    <option value="0">leader 1
                    <option value="1">leader 2
                    <option value="2">leader 3
                </select>   
            </td>
        </tr>
        
        <!-- project descripton -->
        <tr class="blue" valign=top title="<?php print $lng[9][21]?>">
            <td align="right">&nbsp;<?php print $lng[10][7]?>&nbsp;:&nbsp;</td>
            <td>
                <?php
                    include("FCKeditor/fckeditor.php");
                    $oFCKeditor = new FCKeditor('ta') ;
                    $oFCKeditor->BasePath = 'FCKeditor/' ;
                    $oFCKeditor->Value = "This is project description";
                    $oFCKeditor->Width = '800';
                    $oFCKeditor->Height = '300';
                    $oFCKeditor->Create();
                ?> 
            </td>
        </tr>
        
        <!-- project template checkbox -->
        <tr class="light_blue" title="<?php print $lng[10][37]?>">
            <td align="right">&nbsp;<?php print $lng[10][36]?>&nbsp;:&nbsp;</td>
            <td>&nbsp;<input type="checkbox" name="p_template" value=1></td>
        </tr>
        
        <!-- delete requirements -->
        <tr class="light_blue" title="<?php print $lng[10][53]?>">
            <td align="right">&nbsp;<?php print $lng[10][53]?>&nbsp;:&nbsp;</td>
            <td>
                <select name="p_req_del">
                    <option value="0" ><?php print $lng[10][54]?>
                    <option value="1" ><?php print $lng[10][55]?>
                </select>
            </td>
        </tr>
        <tr class="gray">
            <td colspan="2" align="center"><input type="button" onclick="submit('add');" value="<?php print $lng[10][9]?>" name="edit_project"></td>
        </tr> 
    </table>
    <input type="hidden" name="inc" value="edit_project">

</form>

<script>
    function submit(what)
    {
        df=document.forms['edit_project'];
        df.submit();
    }
</script>
