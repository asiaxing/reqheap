<?php
    if(!empty($_POST['register_acount']))
    {
        include("db/db-register.php");
        
        if(dbregister_save())
        {
            print "<script language=\"JavaScript\">alert(\"Register Done\");location.href='index.php?inc=login'</script>";
        }
        else
        {
            print "<script language=\"JavaScript\">alert(\"Register Fail\");history.back();</script>";
        }
    }
?>

<table border="0">
    <tr valign="top">
        <td>
            <form method="post" name="register" action="">
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="50%">
	                <tr class="gray">
	                    <td colspan="2" align="center"><b><?php print $lng[6][1]?></b></td>
	                </tr>
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[6][2]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="text" name="register_acount"></td>
	                </tr>  
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[6][3]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="password" name="register_password"></td>
	                </tr>
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[6][4]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="password" name="register_password2"></td>
	                </tr>
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[6][5]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="text" name="register_name"></td>
	                </tr>  
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[6][6]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="text" name="register_email"></td>
	                </tr>  
	                <tr class="gray">
	                    <td colspan="2" align="center"><input type="button" onclick="sub();" value="<?php print $lng[6][1]?>" name="Register"></td>
	                </tr>  	    
	            </table>
                <input type="hidden" name="inc" value="register">	
            </form>	
        </td> 	 
    </tr>
</table>

<script>
    function sub()
    {
        df=document.forms['register'];

        if (df.register_acount.value == "" || df.register_password.value == "" || df.register_name.value == "" || df.register_email.value == "") 
        {
            alert("<?php print $lng[6][7]?>");	
            return false;
        } 

        if (df.register_password.value != df.register_password2.value) 
        {
            alert("<?php print $lng[6][9]?>");
            df.register_password2.focus();	
            return false;
        }  

        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
        if (!filter.test(df.register_email.value)) 
        {
            alert("<?php print $lng[6][8]?>");
            df.register_email.focus();	
            return false;
        }  

        df.submit();	     
    }
</script>
