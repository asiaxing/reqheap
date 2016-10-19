<?php
    if(!empty($_POST['login_acount']))
    {
        if(dblogin_user_validate())
        {
            header("Location:index.php");
        }
    }
?>

<table border="0">
    <tr valign="top">
        <td>
            <form method="post" name="f" action="">
                <table border="0" cellpadding="2" cellspacing="2" class="content" width="50%">
                    <tr class="gray">
                        <td colspan="2" align="center"><b><?php print $lng[5][1] ?></b></td>
                    </tr>
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[5][2]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="text" name="login_acount"></td>
	                </tr>  
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[5][3]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="password" name="login_password"></td>
	                </tr>
	                <tr class="gray">
	                    <td colspan="2" align="center"><input type="submit" value="<?php print $lng[5][1]?>" name="Login"></td>
	                </tr> 
	                <tr class="gray">
	                    <td colspan="2" align="center"><?php print $lng[5][7]?></td>
	                </tr> 	   	    
	            </table>
                
                <input type="hidden" name="inc" value="login">	
            </form>	
        </td> 	 
    </tr>
</table>

<a href="index.php?inc=register"><?php print $lng[5][4]?></a> | <a href="index.php?inc=lost_password"><?php print $lng[5][5]?></a>


