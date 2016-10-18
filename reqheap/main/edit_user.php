

<form method="post" name="f" action="">
    <table border="0" width="70%">
        <tr valign="top">
            <td>
                <input type="hidden" name="u_id" value="<?php print $u_id?>">
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <tr class="gray">
	                    <td colspan="2" align="center"><b><?php print $lng[12][1]?></b></td>
	                </tr>
	                
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[12][2]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="text" name="u_name" value="<?php print $u_name?>" maxlength="90" size=60></td>
	                </tr>  
	                
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[12][3]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="text" name="u_username" value="<?php print $u_username?>" maxlength="90" size=60></td>
	                </tr>
	                
	                <?php if ($u_id=="") {?>
	                    <tr class="blue">
	                        <td align="right">&nbsp;<?php print $lng[12][20]?>&nbsp;:&nbsp;</td>
	                        <td>&nbsp;<input type="password" name="u_password"></td>
	                    </tr>
	  
	                    <tr class="blue">
	                        <td align="right">&nbsp;<?php print $lng[12][21]?>&nbsp;:&nbsp;</td>
	                        <td>&nbsp;<input type="password" name="u_password2"></td>
	                    </tr>
	                <?php }?>
	                
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[12][4]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="text" name="u_email" value="<?php print $u_email?>" maxlength="90" size=60></td>
	                </tr>  
	  
	                <tr class="light_blue">
	                    <td align="right">&nbsp;<?php print $lng[12][5]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;
	                        <select name="u_rights">
                                <option value="0" <?php if ($u_rights==0) print "selected";?>><?php print $lng[2][25];?>
                                <option value="1" <?php if ($u_rights==1) print "selected";?>><?php print $lng[2][14];?>
                                <option value="2" <?php if ($u_rights==2) print "selected";?>><?php print $lng[2][15];?>
                                <option value="3" <?php if ($u_rights==3) print "selected";?>><?php print $lng[2][16];?>
                                <option value="4" <?php if ($u_rights==4) print "selected";?>><?php print $lng[2][17];?>
                                <option value="5" <?php if ($u_rights==5) print "selected";?>><?php print $lng[2][18];?>
	                        </select>   
	                    </td>
	                </tr>  
	            </table>
                <input type="hidden" name="inc" value="edit_user">
                <input type="hidden" name="action" value="">	
            </td> 	 
        </tr>
  
        <tr valign="top">
            <td>
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <tr class="gray">
	                    <td colspan="3" align="center"><b><?php print $lng[12][13]?></b></td>
	                </tr>
	                <tr class="blue">
	                    <td align="center">
	                        <br/><?php print $lng[12][15]?><br/>
	                        <select name="users_tmp" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_users_list?>
	                        </select><br/><br/>	    
	                    </td>
	                    <td align="center"><a href="#" onclick="copyToList('users_tmp','users_tmp2','f');return false;"><b>==></b></a><br><br><a href="#" onclick="copyToList('users_tmp2','users_tmp','f');return false;"><b><==</b></a></td>
	                    <td align="center">
                            <br/><?php print $lng[12][16]?><br/>
                            <select name="users_tmp2" multiple size=10 style="width:190px;background:#F3F3F3;">
                            <?php print $p_users_list2?>
                            </select><br/><br/>
	                    </td>
	                </tr>	    
	            </table>

                <input type="hidden" name="users_list" value=""> 
            </td> 	 
        </tr>
	    <tr class="gray">
	        <td colspan="2" align="center">
	            <?php if ($u_id!="") {?><input type="button" onclick="sub('update');" value="<?php print $lng[12][6]?>">&nbsp;&nbsp;<input type="button" onclick="if (confirm('<?php print $lng[12][12]?>')) sub('delete');" value="<?php print $lng[12][7]?>"><?php }?>
	            <?php if ($u_id=="") {?><input type="button" onclick="sub('insert');" value="<?php print $lng[12][17]?>"><?php }?>
	            <?php if ($_SESSION['rights']=="5") {?><input type="button" onclick="sub('reset');" value="<?php print $lng[12][22]?>"><?php }?>
	        </td>
	    </tr>  	    
    </table>
</form>

<script>
    function sub(what)
    {
        df=document.forms['f'];
        if (what!="delete") 
        {
            if (df.u_name.value=="") 
            {
                alert("<?php print $lng[12][8]?>");
                df.u_name.focus();	
                return false;
            } 
            if (df.u_username.value=="") 
            {
                alert("<?php print $lng[12][9]?>");
                df.u_username.focus();	
                return false;
            } 

            <?php if ($u_id=="") {?>
            if (df.u_password.value=="") 
            {
                alert("<?php print $lng[12][18]?>");
                df.u_password.focus();	
                return false;
            } 

            if (df.u_password.value!=df.u_password2.value) 
            {
                alert("<?php print $lng[12][19]?>");
                df.u_password2.focus();	
                return false;
            }  
            <?php }?>

            if (df.u_email.value=="") 
            {
                alert("<?php print $lng[12][10]?>");
                df.u_email.focus();	
                return false;
            } 
            var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
            if (!filter.test(df.u_email.value)) 
            {
                alert("<?php print $lng[12][11]?>");
                df.u_email.focus();	
                return false;
            }      
        }
        df.action.value=what;
        selectUsers();
        df.submit();	     
    }
 
    function copyToList(from,to,form_name)
    {
        fromList = eval('document.forms["'+form_name+'"].' + from);
        toList = eval('document.forms["'+form_name+'"].' + to);
        if (toList.options.length > 0 && toList.options[0].value == 'temp')
        {
            toList.options.length = 0;
        }
        var sel = false;
        for (i=0;i<fromList.options.length;i++)
        {
            var current = fromList.options[i];
            if (current.selected)
            {
                sel = true;
                txt = current.text;
                val = current.value;
                toList.options[toList.length] = new Option(txt,val);
                fromList.options[i] = null;
                i--;
            }
        }
    }

    function selectUsers()
    {
        document.forms['f'].users_list.value="";
        for (i=0;i<document.forms['f'].users_tmp2.options.length;i++)
        {	
            document.forms['f'].users_list.value+=","+document.forms['f'].users_tmp2.options[i].value;	
        }   
        //document.forms['f'].submit();
    }	
 
</script>
