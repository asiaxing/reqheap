<?php
    print "u_username:".$_POST['u_username']."<br>";
    print "u_password:".$_POST['u_password']."<br>";
    print "u_name:".$_POST['u_name']."<br>";
    print "u_email:".$_POST['u_email']."<br>";
?>

<table border="0">
    <tr valign="top">
        <td>
            <form method="post" name="f" action="">
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="50%">
	                <tr class="gray">
	                    <td colspan="2" align="center"><b><?php print $lng[6][1]?></b></td>
	                </tr>
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[6][2]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="text" name="u_username" value="<?php print $u_username?>"></td>
	                </tr>  
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[6][3]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="password" name="u_password"></td>
	                </tr>
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[6][4]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="password" name="u_password2"></td>
	                </tr>
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[6][5]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="text" name="u_name" value="<?php print $u_name?>"></td>
	                </tr>  
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[6][6]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="text" name="u_email" value="<?php print $u_email?>"></td>
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

<?php print $tmp?>

<script>
    function sub()
    {
        df=document.forms['f'];

        if (df.u_username.value == "" || df.u_password.value == "" || df.u_name.value == "" || df.u_email.value == "") 
        {
            alert("<?php print $lng[6][7]?>");	
            return false;
        } 

        if (df.u_password.value != df.u_password2.value) 
        {
            alert("<?php print $lng[6][9]?>");
            df.u_password2.focus();	
            return false;
        }  

        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
        if (!filter.test(df.u_email.value)) 
        {
            alert("<?php print $lng[6][8]?>");
            df.u_email.focus();	
            return false;
        }  

        df.submit();	     
    }
</script>
