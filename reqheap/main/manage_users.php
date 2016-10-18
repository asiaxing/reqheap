
<table border="0" width="100%">
    <tr valign="top">
        <td>
            <form method="post" name="f" action="">
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <tr class="gray">
	                    <td colspan="4" align="left"><input type="button" onclick="document.location.href='index.php?inc=edit_user'" value="<?php print $lng[11][5]?>"></td>
	                </tr>  	    
	                <tr class="gray">
                        <td align="center"><a href="#" onclick="document.forms['f'].order.value='u_name <?php if ($order=='u_name asc') print "desc";else print "asc";?>';document.forms['f'].submit();"><b><?php print $lng[11][1]?></b></a></td>
                        <td align="center"><a href="#" onclick="document.forms['f'].order.value='u_username <?php if ($order=='u_username asc') print "desc";else print "asc";?>';document.forms['f'].submit();"><b><?php print $lng[11][2]?></b></a></td>
                        <td align="center"><a href="#" onclick="document.forms['f'].order.value='u_email <?php if ($order=='u_email asc') print "desc";else print "asc";?>';document.forms['f'].submit();"><b><?php print $lng[11][3]?></b></a></td>
                        <td align="center"><a href="#" onclick="document.forms['f'].order.value='u_rights <?php if ($order=='u_rights asc') print "desc";else print "asc";?>';document.forms['f'].submit();"><b><?php print $lng[11][4]?></b></a></td>
                    </tr>
                    
                    <?php
                        /*
                        $cnt=0;
                        while($row=mysql_fetch_array($rs))
                        {
                            //phase
                            switch($row['u_rights'])
                            {
                                case 0:$u_rights=$lng[2][25];break;
                                case 1:$u_rights=$lng[2][14];break;
                                case 2:$u_rights=$lng[2][15];break;
                                case 3:$u_rights=$lng[2][16];break;
                                case 4:$u_rights=$lng[2][17];break;
                                case 5:$u_rights=$lng[2][18];break;
                                default:$u_rights=$lng[2][14];
                            }
                        */
                    ?>
	                
	                <tr class="<?php if ($cnt) { print "light_";$cnt=0; }else $cnt=1;?>blue">
	                    <td align="left"><a href="index.php?inc=edit_user&u_id=<?/*=$row['u_id']*/?>&nbsp"><?/*=htmlspecialchars($row['u_name'])*/?>&nbsp</a></td>
	                    <td align="left"><?=$row['u_username']?></td>
	                    <td align="left"><?=$row['u_email']?></td>
	                    <td align="left"><?=$u_rights?></td>
	                </tr>  
	                <?
	                    #}
	                ?>
	  
	                <tr class="gray">
	                    <td colspan="4" align="left"><input type="button" onclick="document.location.href='index.php?inc=edit_user'" value="<?php print $lng[11][5]?>"></td>
	                </tr>  	    

	            </table>
                <input type="hidden" name="inc" value="manage_users">
                <input type="hidden" name="order" value="">
            </form>	
        </td> 	 
    </tr>
</table>
