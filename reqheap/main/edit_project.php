<form method="post" name="f" action="">
    <table border="0" width="70%">
        <tr valign="top">
            <td>
                <input type="hidden" name="p_id" value="<?php print $p_id?>">
                <table border="0" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <tr class="gray">
	                    <td colspan="2" align="center"><b><?php print ($p_id=="")?$lng[10][2]:$lng[10][1]?></b></td>
	                </tr>
	                
	                <?php if ($p_template==0 || $p_load!="") {?>
	                <tr class="light_blue" title="<?php print $lng[10][39]?>">
	                    <td align="right">&nbsp;<?php print $lng[10][38]?>&nbsp;:&nbsp;</td>
	                    <td>
	                        <select name="p_load" onchange="document.location.href='index.php?inc=edit_project&p_load=yes&p_id_old=<?php print $p_id?>&p_id='+this.value">
	                            <option value=''>--
	                            <?php print $template_options?>
	                        </select>   
	                    </td>
	                </tr>  
	                <?php }?>
	                
	                <tr class="blue" title="<?php print $lng[9][16]?>">
	                    <td align="right">&nbsp;<?php print $lng[10][3]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="text" name="p_name" value="<?php print $p_name?>" maxlength="90" size=60></td>
	                </tr>  
	                
	                <tr class="light_blue" title="<?php print $lng[9][17]?>">
	                    <td align="right">&nbsp;<?php print $lng[10][4]?>&nbsp;:&nbsp;</td>
	                    <td>
	                        <select name="p_phase">
	                            <option value="0" <?php if ($p_phase==0) print "selected";?>><?php print $lng[9][8];?>
	                            <option value="1" <?php if ($p_phase==1) print "selected";?>><?php print $lng[9][9];?>
	                            <option value="2" <?php if ($p_phase==2) print "selected";?>><?php print $lng[9][10];?>
	                            <option value="3" <?php if ($p_phase==3) print "selected";?>><?php print $lng[9][32];?>
	                            <option value="4" <?php if ($p_phase==4) print "selected";?>><?php print $lng[9][33];?>
	                        </select>   
	                    </td>
	                </tr>
	                
	                <tr class="blue" title="<?php print $lng[9][18]?>">
	                    <td align="right">&nbsp;<?php print $lng[10][5]?>&nbsp;:&nbsp;</td>
	                    <td>
	                        <select name="p_status">
	                            <option value="0" <?php if ($p_status==0) print "selected";?>><?php print $lng[9][11];?>
	                            <option value="1" <?php if ($p_status==1) print "selected";?>><?php print $lng[9][12];?>
	                            <option value="2" <?php if ($p_status==2) print "selected";?>><?php print $lng[9][14];?>
	                        </select>   
	                    </td>
	                </tr>  
	  
	                <tr class="light_blue" title="<?php print $lng[9][19]?>">
	                    <td align="right">&nbsp;<?php print $lng[10][6]?>&nbsp;:&nbsp;</td>
	                    <td>
	                        <select name="p_leader">
	                            <?php print $p_leader_list?>
	                        </select>   
	                    </td>
	                </tr>
	                
	                <tr class="blue" valign=top title="<?php print $lng[9][21]?>">
	                    <td align="right">&nbsp;<?php print $lng[10][7]?>&nbsp;:&nbsp;</td>
	                    <td>
	                        <?php
	                            
		                        include("FCKeditor/fckeditor.php");
		                        $oFCKeditor = new FCKeditor('ta') ;
		                        $oFCKeditor->BasePath = 'FCKeditor/' ;
		                        $oFCKeditor->Value = $p_desc;
		                        $oFCKeditor->Width = '560';
		                        $oFCKeditor->Height = '300';
		                        $oFCKeditor->Create() ;
		                        
		                    ?> 
	                    </td>
	                </tr>
	                
	                <tr class="light_blue" title="<?php print $lng[10][37]?>">
	                    <td align="right">&nbsp;<?php print $lng[10][36]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="checkbox" name="p_template" <?php if ($p_template==1 && $p_load=="") print "checked";?> value="1"></td>
	                </tr>
	                
	                <?php if ($p_id!="") {?>
	                <tr class="light_blue" title="<?php print $lng[9][20]?>">
	                    <td align="right">&nbsp;<?php print $lng[10][8]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<?php print $p_date?></td>
                    </tr>
                    <?php }?>
                    
                    <tr class="light_blue" title="<?php print $lng[10][53]?>">
	                    <td align="right">&nbsp;<?php print $lng[10][53]?>&nbsp;:&nbsp;</td>
	                    <td>
	                        <select name="p_req_del">
	                            <option value="1" <?php if ($p_req_del=="" || $p_req_del=="1") print "selected";?>><?php print $lng[10][54]?>
	                            <option value="0" <?php if ($p_req_del=="0") print "selected";?>><?php print $lng[10][55]?>
	                        </select>   
	                    </td>
	                </tr>
	            </table>
                <input type="hidden" name="status_old" value="<?php print $p_status?>">
                <input type="hidden" name="p_name_old" value="<?php print $p_name?>">
                <input type="hidden" name="p_id_old" value="<?php print $p_id_old?>">
                <input type="hidden" name="inc" value="edit_project">
                <input type="hidden" name="action" value="">	
                <!--/form-->	
            </td>
        </tr>
        
        <tr valign="top">
            <td>
                <!--form method="post" name="f2" action=""-->
                <!--input type="hidden" name="p_id" value="<?php print $p_id?>"-->
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <tr class="gray" title="<?php print $lng[10][23]?>">
	                    <td colspan="3" align="center"><b><?php print $lng[10][14]?></b></td>
	                </tr>
	                
	                <tr class="blue">
	                    <td align="center">
	                        <br/><?php print $lng[10][16]?><br/>
	                        <select name="users_tmp" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_users_list?>
	                        </select><br/><br/>	    
	                    </td>
	                    <td align="center"><a href="#" onclick="copyToList('users_tmp','users_tmp2','f');return false;"><b>==></b></a><br><br>
	                        <a href="#" onclick="copyToList('users_tmp2','users_tmp','f');return false;"><b><==</b></a><br/><br/><br/><br/>
	                        <?php if ($p_id!="") {?>
	                            <input type="button" value="<?php print $lng[99][30]?>" onclick="newwin=window.open('popup_users.php?p_id=<?php print $p_id?>&where=1','name','height=300,width=700');">
	                        <?php }?>
	                    </td>
	    
	                    <td align="center">
	                        <br/><?php print $lng[10][17]?><br/>
	                        <select name="users_tmp2" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_users_list2?>
	                        </select><br/><br/>
	                    </td>
	                </tr>
	                <!--tr class="gray">
	                    <td colspan="3" align="center">
	                        <input type="button" onclick="selectUsers();" value="<?php print $lng[10][15]?>">
	                    </td>
	                </tr-->  	    
	            </table>
                <!--input type="hidden" name="status_old" value="<?php print $p_status?>"-->
                <!--input type="hidden" name="inc" value="edit_project"-->
                <input type="hidden" name="users_list" value=""> 
                <!--input type="hidden" name="what" value=""--> 
                <!--/form-->	
            </td> 	 
        </tr>
        
        <tr valign="top">
            <td>
                <!--form method="post" name="f3" action=""-->
                <!--input type="hidden" name="p_id" value="<?php print $p_id?>"-->
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <tr class="gray" title="<?php print $lng[10][24]?>">
	                    <td colspan="3" align="center"><b><?php print $lng[10][18]?></b></td>
	                </tr>
	                <tr class="blue">
	                    <td align="center">
	                        <br/><?php print $lng[10][20]?><br/>
	                        <select name="releases_tmp" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_releases_list?>
	                        </select><br/><br/>	    
	                    </td>
	                    <td align="center"><a href="#" onclick="copyToList('releases_tmp','releases_tmp2','f');return false;"><b>==></b></a><br><br><a href="#" onclick="copyToList('releases_tmp2','releases_tmp','f');return false;"><b><==</b></a><br/><br/><br/><br/>
	                        <?php if ($p_id!="") {?>
	                            <input type="button" value="<?php print $lng[99][30]?>" onclick="newwin=window.open('popup_release.php?p_id=<?php print $p_id?>&where=1','name','height=230,width=400');">
	                        <?php }?>
	                    </td>
	                    
	                    <td align="center">
	                        <br/><?php print $lng[10][21]?><br/>
	                        <select name="releases_tmp2" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_releases_list2?>
	                        </select><br/><br/>
	                    </td>
	                </tr>
	                <!--tr class="gray">
	                    <td colspan="3" align="center">
	                        <input type="button" onclick="selectReleases();" value="<?php print $lng[10][19]?>">
	                    </td>
	                </tr-->  	    
	            </table>
                <!--input type="hidden" name="status_old" value="<?php print $p_status?>"-->
                <!--input type="hidden" name="inc" value="edit_project"-->
                <input type="hidden" name="releases_list" value=""> 
                <!--input type="hidden" name="what" value=""--> 
                <!--/form-->	
            </td> 	 
        </tr>
        
        <tr valign="top">
            <td>
                <!--form method="post" name="f4" action=""-->
                <!--input type="hidden" name="p_id" value="<?php print $p_id?>"-->
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <tr class="gray" title="<?php print $lng[10][30]?>">
	                    <td colspan="3" align="center"><b><?php print $lng[10][26]?></b></td>
	                </tr>
	                <tr class="blue">
	                    <td align="center">
	                        <br/><?php print $lng[10][28]?><br/>
	                        <select name="stakeholders_tmp" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_stakeholders_list?>
	                        </select><br/><br/>	    
	                    </td>
	                    <td align="center"><a href="#" onclick="copyToList('stakeholders_tmp','stakeholders_tmp2','f');return false;"><b>==></b></a><br><br><a href="#" onclick="copyToList('stakeholders_tmp2','stakeholders_tmp','f');return false;"><b><==</b></a><br/><br/><br/><br/><?if ($p_id!="") {?><input type="button" value="<?php print $lng[99][30]?>" onclick="newwin=window.open('popup_stakeholder.php?p_id=<?php print $p_id?>&where=1','name','height=340,width=700');"><?}?></td>
	                    <td align="center">
	                        <br/><?php print $lng[10][29]?><br/>
	                        <select name="stakeholders_tmp2" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_stakeholders_list2?>
	                        </select><br/><br/>
	                    </td>
	                </tr>
	                <!--tr class="gray">
	                    <td colspan="3" align="center">
	                        <input type="button" onclick="selectStakeholders();" value="<?php print $lng[10][27]?>">
	                    </td>
	                </tr-->  	    
	            </table>
                <!--input type="hidden" name="status_old" value="<?php print $p_status?>"-->
                <!--input type="hidden" name="inc" value="edit_project"-->
                <input type="hidden" name="stakeholders_list" value=""> 
                <!--input type="hidden" name="what" value=""--> 
                <!--/form-->	
            </td> 	 
        </tr>
        
        <tr valign="top">
            <td>
                <!--form method="post" name="f4" action=""-->
                <!--input type="hidden" name="p_id" value="<?php print $p_id?>"-->
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <tr class="gray" title="<?php print $lng[10][48]?>">
	                    <td colspan="3" align="center"><b><?php print $lng[10][49]?></b></td>
	                </tr>
	                <tr class="blue">
	                    <td align="center">
	                        <br/><?php print $lng[10][50]?><br/>
	                        <select name="keywords_tmp" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_keywords_list?>
	                        </select><br/><br/>	    
	                    </td>
	                    <td align="center"><a href="#" onclick="copyToList('keywords_tmp','keywords_tmp2','f');return false;"><b>==></b></a><br><br><a href="#" onclick="copyToList('keywords_tmp2','keywords_tmp','f');return false;"><b><==</b></a><br/><br/><br/><br/><?if ($p_id!="") {?><input type="button" value="<?php print $lng[99][30]?>" onclick="newwin=window.open('popup_keyword.php?p_id=<?php print $p_id?>&where=1','name','height=150,width=700');"><?}?></td>
	                    <td align="center">
	                        <br/><?php print $lng[10][51]?><br/>
	                        <select name="keywords_tmp2" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_keywords_list2?>
	                        </select><br/><br/>
	                    </td>
	                </tr>
	                <!--tr class="gray">
	                    <td colspan="3" align="center">
	                        <input type="button" onclick="selectKeywords();" value="<?php print $lng[10][27]?>">
	                    </td>
	                </tr-->  	    
	            </table>
                <!--input type="hidden" name="status_old" value="<?php print $p_status?>"-->
                <!--input type="hidden" name="inc" value="edit_project"-->
                <input type="hidden" name="keywords_list" value=""> 
                <!--input type="hidden" name="what" value=""--> 
                <!--/form-->	
            </td> 	 
        </tr>
        
        <tr valign="top">
            <td>
                <!--form method="post" name="f4" action=""-->
                <!--input type="hidden" name="p_id" value="<?php print $p_id?>"-->
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <tr class="gray" title="<?php print $lng[10][44]?>">
	                    <td colspan="3" align="center"><b><?php print $lng[10][45]?></b></td>
	                </tr>
	                <tr class="blue">
	                    <td align="center">
	                        <br/><?php print $lng[10][46]?><br/>
	                        <select name="components_tmp" multiple size=10 style="width:190px;background:#F3F3F3;">
	                        <?php print $p_components_list?>
	                        </select><br/><br/>	    
	                    </td>
	                    <td align="center"><a href="#" onclick="copyToList('components_tmp','components_tmp2','f');return false;"><b>==></b></a><br><br><a href="#" onclick="copyToList('components_tmp2','components_tmp','f');return false;"><b><==</b></a><br/><br/><br/><br/><?if ($p_id!="") {?><input type="button" value="<?php print $lng[99][30]?>" onclick="newwin=window.open('popup_component.php?p_id=<?php print $p_id?>&where=1','name','height=160,width=700');"><?}?></td>
	                    <td align="center">
	                        <br/><?php print $lng[10][47]?><br/>
	                        <select name="components_tmp2" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_components_list2?>
	                        </select><br/><br/>
	                    </td>
	                </tr>
	                <!--tr class="gray">
	                    <td colspan="3" align="center">
	                        <input type="button" onclick="selectStakeholders();" value="<?php print $lng[10][27]?>">
	                    </td>
	                </tr-->  	    
	            </table>
                <!--input type="hidden" name="status_old" value="<?php print $p_status?>"-->
                <!--input type="hidden" name="inc" value="edit_project"-->
                <input type="hidden" name="components_list" value=""> 
                <!--input type="hidden" name="what" value=""--> 
                <!--/form-->	
            </td> 	 
        </tr>
  
        <tr valign="top">
            <td>
                <!--form method="post" name="f5" action=""-->
                <!--input type="hidden" name="p_id" value="<?php print $p_id?>"-->
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="100%">
	                <tr class="gray" title="<?php print $lng[10][35]?>">
	                    <td colspan="3" align="center"><b><?php print $lng[10][31]?></b></td>
	                </tr>
	                <tr class="blue">
	                    <td align="center">
	                        <br/><?php print $lng[10][33]?><br/>
	                        <select name="glossary_tmp" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_glossary_list?>
	                        </select><br/><br/>	    
	                    </td>
	                    <td align="center"><a href="#" onclick="copyToList('glossary_tmp','glossary_tmp2','f');return false;"><b>==></b></a><br><br><a href="#" onclick="copyToList('glossary_tmp2','glossary_tmp','f');return false;"><b><==</b></a><br/><br/><br/><br/>
	                    <?php if ($p_id!="") {?>
	                        <input type="button" value="<?php print $lng[99][30]?>" onclick="newwin=window.open('popup_glossary.php?p_id=<?php print $p_id?>&where=1','name','height=600,width=900');">
	                        <?php }?>
	                    </td>
	                    <td align="center">
	                        <br/><?php print $lng[10][34]?><br/>
	                        <select name="glossary_tmp2" multiple size=10 style="width:190px;background:#F3F3F3;">
	                            <?php print $p_glossary_list2?>
	                        </select><br/><br/>
	                    </td>
	                </tr>
	                <!--tr class="gray">
	                    <td colspan="3" align="center">
	                        <input type="button" onclick="selectGlossary();" value="<?php print $lng[10][32]?>">
	                    </td>
	                </tr-->  	    
	            </table>
                <!--input type="hidden" name="status_old" value="<?php print $p_status?>"-->
                <!--input type="hidden" name="inc" value="edit_project"-->
                <input type="hidden" name="glossary_list" value=""> 
                <!--input type="hidden" name="what" value=""--> 
                <!--/form-->	
            </td> 	 
        </tr>
    </table>
    <table>
        <tr class="gray">
	        <td colspan="3" align="center">
	            <input type="button" onclick="document.forms['f'].submit();" value="<?php print $lng[10][41]?>">
	            <?php if ($p_load=="yes") {?>
	                <input type="button" onclick="sub('template');" value="<?php print $lng[10][41]?>">
	            <?php }?>
	            
	            <?php if ($p_id=="" && $p_load=="") {?>
	                <input type="button" onclick="sub('add');" value="<?php print $lng[10][9]?>">
	            <?php }?>
	            
	            <?php if ($p_id!="" && $p_load=="") {?>
	                <input type="button" onclick="sub('update');" value="<?php print $lng[10][10]?>">
	                &nbsp;&nbsp;
	                <input type="button" onclick="if (confirm('<?php print $lng[10][13]?>')) sub('delete');" value="<?php print $lng[10][11]?>">
	            <?php }?>
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
            if (df.p_name.value=="") 
            {
                alert("<?php print $lng[10][12]?>");
                df.p_name.focus();	
                return false;
            }
            <?php if ($p_load=="yes") {?>  
                if (df.p_name.value==df.p_name_old.value) 
                {
                    alert("<?php print $lng[10][40]?>");
                    df.p_name.focus();	
                    return false;
                }    
                df.action.value='template';
            <?php }?>
        }
        
        if (df.action.value!='template') df.action.value=what;
        <?php if ($p_load=="") {?>
            selectUsers();
            selectReleases();
            selectStakeholders();
            selectKeywords();
            selectComponents();
            selectGlossary();
        <?php }?>
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
        //document.forms['f'].what.value="users_list";
        //document.forms['f'].submit();
    }	
 
    function selectReleases()
    {
        document.forms['f'].releases_list.value="";
        for (i=0;i<document.forms['f'].releases_tmp2.options.length;i++)
        {	
            document.forms['f'].releases_list.value+=","+document.forms['f'].releases_tmp2.options[i].value;	
        }   
        //document.forms['f'].what.value="releases_list";
        //document.forms['f'].submit();
    }	
 
    function selectStakeholders()
    {
        document.forms['f'].stakeholders_list.value="";
        for (i=0;i<document.forms['f'].stakeholders_tmp2.options.length;i++)
        {	
            document.forms['f'].stakeholders_list.value+=","+document.forms['f'].stakeholders_tmp2.options[i].value;	
        }   
        //document.forms['f'].what.value="stakeholders_list";
        //document.forms['f'].submit();
    }	

    function selectKeywords()
    {
        document.forms['f'].keywords_list.value="";
        for (i=0;i<document.forms['f'].keywords_tmp2.options.length;i++)
        {	
            document.forms['f'].keywords_list.value+=","+document.forms['f'].keywords_tmp2.options[i].value;	
        }   
        //document.forms['f'].what.value="keywords_list";
        //document.forms['f'].submit();
    }	

    function selectComponents()
    {
        document.forms['f'].components_list.value="";
        for (i=0;i<document.forms['f'].components_tmp2.options.length;i++)
        {	
            document.forms['f'].components_list.value+=","+document.forms['f'].components_tmp2.options[i].value;	
        }   
        //document.forms['f'].what.value="components_list";
        //document.forms['f'].submit();
    }	

    function selectGlossary()
    {
        document.forms['f'].glossary_list.value="";
        for (i=0;i<document.forms['f'].glossary_tmp2.options.length;i++)
        {	
            document.forms['f'].glossary_list.value+=","+document.forms['f'].glossary_tmp2.options[i].value;	
        }   
        //document.forms['f'].what.value="glossary_list";
        //document.forms['f'].submit();
    }	
 
</script>
