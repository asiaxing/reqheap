
<table border="0" width="100%">
    <tr valign="top">
        <td>
            <form method="post" name="f" action="">
	            <table border="1" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <tr class="gray">
	                    <td colspan="4" align="left"><input type="button" onclick="document.location.href='index.php?inc=edit_user'" value="<?php print $lng[11][5]?>"></td>
	                </tr>  	    
	                <tr class="gray">
	                    <td align="left"><a href="#" onclick="document.forms['f'].order.value='u_id';document.forms['f'].submit();"><b><?php print "ID"?></b></a></td>
                        <td align="left"><a href="#" onclick="document.forms['f'].order.value='u_acount';document.forms['f'].submit();"><b><?php print "Acount"?></b></a></td>
                        <td align="left"><a href="#" onclick="document.forms['f'].order.value='u_name';document.forms['f'].submit();"><b><?php print $lng[11][2]?></b></a></td>
                        <td align="left"><a href="#" onclick="document.forms['f'].order.value='u_email';document.forms['f'].submit();"><b><?php print $lng[11][3]?></b></a></td>
                        <td align="left"><a href="#" onclick="document.forms['f'].order.value='u_rights';document.forms['f'].submit();"><b><?php print $lng[11][4]?></b></a></td>
                    </tr>
	                
	                
	                <tr class="light_blue">
	                    <td align="left"><?php print dblogin_get_cur_user_id()?></td>
	                    <td align="left"><a href='index.php?inc=edit_user&u_id=<?php print dblogin_get_cur_user_id()?>'>&nbsp<?php print dblogin_get_cur_user_acount()?>&nbsp</a></td>
	                    <td align="left"><?php print dblogin_get_cur_user_name()?></td>
	                    <td align="left"><?php print dblogin_get_cur_user_email()?></td>
	                    <td align="left"><?php print dblogin_get_cur_user_rights()?></td>
	                </tr>
	  
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
