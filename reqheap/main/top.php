
<table border="0" cellpadding="2" cellspacing="0" class="topMenu" width="100%">
    <tr>
        <td>
            <form method="post" name="f_project" action="">
                &nbsp;<?php print $lng[2][1] ?>: 
                <select name="project_id" class="small" onchange="document.forms['f_project'].submit()">
                    <option value="0"><?php print $lng[2][2] ?></option>
                    <?php
                        //setting all assigned projects to the user
                        $project_list="0";
                        
                        /*
                        #while($row=mysql_fetch_array($rs))
                        while($row = $rs->fetch_object())
                        {
                            if ($_SESSION['projects']==$row['p_id'])
                                print "<option value='".$row['p_id']."' selected>".htmlspecialchars($row['p_name']);
                            else
                                print "<option value='".$row['p_id']."'>".htmlspecialchars($row['p_name']);
	      
	                        //if all projects selected
	                        if ($_SESSION['projects']==0)
	                            $project_list.=",".$row['p_id'];
	                        
	                        //if just one project selected
	                        elseif ($_SESSION['projects']>0 && $_SESSION['projects']==$row['p_id'])
	                            $project_list=$row['p_id'];
                        }
                        */
                    ?>
                </select>
                
                <!--input type="submit" value="<?php print $lng[2][3] ?>" /-->
                <?php
                    if ($inc=="view_all" && $_SESSION['projects']!=0 && $_SESSION['projects']!="" && $_SESSION['_viewalltype']==1)
                    {
                ?>
                <input type="button" value=" <?php print $lng[2][32] ?>" onclick="document.forms['req'].viewalltype.value='tree';document.forms['req'].submit();" />
                <?php
                    }
                ?>
                
                <?php
                    if ($inc=="view_all" && $_SESSION['projects']!=0 && $_SESSION['projects']!="" && $_SESSION['_viewalltype']==0)
                    {
                ?>
                <input type="button" value=" <?php print $lng[2][33] ?>" onclick="document.forms['req'].viewalltype.value='normal';document.forms['req'].submit();" />
                <?php
                    }
                ?>

                <?php
                    if ($inc=="view_all" && $_SESSION['projects']!=0 && $_SESSION['projects']!="") 
                    {
                ?>
                <input type="button" value="<?php print $lng[2][26] ?>" onclick="document.location.href='index.php?inc=pdf_project_fields&r_p_id=<?php print $_SESSION['projects'] ?>&filter1=<?php print $filter1 ?>&filter2=<?php print $filter2 ?>&filter4=<?php print $filter4 ?>&filter5=<?php print htmlspecialchars($filter5) ?>&filter6=<?php print $filter6 ?>&filter7=<?php print $filter7 ?>&filter8=<?php print $filter8 ?>&filter18=<?php print $filter18 ?>&order=<?php print str_replace(" ","_",$order) ?>&ids='+gen_ids('req')+'&ids2='+getCh()+'&srch='+gen_srch()+'&mode=landscape';" />
                <?php
                    }
                ?>
      
                <?php
                    if ($inc=="view_all" && $_SESSION['projects']!=0 && $_SESSION['projects']!="") 
                    {
                ?>
                <input type="button" value="<?php print $lng[2][38] ?>" onclick="document.location.href='index.php?inc=pdf_project_fields&r_p_id=<?php print $_SESSION['projects'] ?>&filter1=<?php print $filter1 ?>&filter2=<?php print $filter2 ?>&filter4=<?php print $filter4 ?>&filter5=<?php print htmlspecialchars($filter5) ?>&filter6=<?php print $filter6 ?>&filter7=<?php print $filter7 ?>&filter8=<?php print $filter8 ?>&filter18=<?php print $filter18 ?>&order=<?php print str_replace(" ","_",$order) ?>&ids='+gen_ids('req')+'&ids2='+getCh()+'&srch='+gen_srch()+'&mode=portrait';" />
                <?php
                    }
                ?>
                
                <?php
                    if ($inc=="view_all" && $_SESSION['projects']!=0 && $_SESSION['projects']!="") 
                    {
                ?>
                <input type="button" value="<?php print $lng[2][30] ?>" onclick="document.location.href='index.php?inc=xls_project_fields&p_id=<?php print $_SESSION['projects'] ?>&srch='+gen_srch()+'&ids2='+getCh()+'&ids='+gen_ids('req');" />
                <?php
                    }
                ?>

                <?php
                    if ($inc=="view_all" && $_SESSION['projects']!=0 && $_SESSION['projects']!="") 
                    {
                ?>
                <input type="button" value="<?php print $lng[2][31]?>" onclick="window.open('tsv.php?p_id=<?php print $_SESSION['projects'] ?>&srch='+gen_srch()+'&ids2='+getCh()+'&ids='+gen_ids('req'), 'tsv','menubar=yes,status=yes');" />
                <?php
                    }
                ?>

                <?php
                    if ($inc=="view_all" && $_SESSION['projects']!=0 && $_SESSION['projects']!="") 
                    {
                ?>
                <input type="button" value="<?php print $lng[2][41] ?>" onclick="window.open('csv.php?p_id=<?php print $_SESSION['projects'] ?>&srch='+gen_srch()+'&ids2='+getCh()+'&ids='+gen_ids('req'), 'csv','menubar=yes,status=yes');" />
                <?php
                    }
                ?>
                
                <input type="hidden" name="inc" value="<?php print ($inc=="edit_project" || $inc=="view_project" || $inc=="edit_requirement" || $inc=="view_requirement" || $inc=="view_requirement_long" || $inc=="view_all" || $inc=="add_comment")?$inc:"" ?>"/>
                <input type="hidden" name="p_switch" value="yes"/>
            </form>
        </td>
        
        <?php
            if ($inc=="view_all") 
            {
        ?>
    </tr>
    <tr>
        <?php
            }
        ?>
        <td align="right">      
            &nbsp;<?php print $lng[2][6] ?>: 
            <select name="_chlang" onchange="document.location.href='index.php?inc=<?php print $inc ?>&_chlang='+this.value">
                <option value="en" <?php if ($_SESSION['chlang']=="en") print "selected"; ?>><?php print $lng[2][7] ?></option>
                <option value="de" <?php if ($_SESSION['chlang']=="de") print "selected"; ?>><?php print $lng[2][8] ?></option>
                <option value="fr" <?php if ($_SESSION['chlang']=="fr") print "selected"; ?>><?php print $lng[2][9] ?></option>
                <option value="it" <?php if ($_SESSION['chlang']=="it") print "selected"; ?>><?php print $lng[2][10] ?></option>
            </select> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
                if ($_SESSION['uid']!="")
                {
            ?>
            <?php print $lng[2][4] ?> <?php print htmlspecialchars($_SESSION['username']) ?> 
            <span class="small">(<?php print htmlspecialchars($_SESSION['name']) ?> - 
            <?php
                switch($_SESSION['rights'])
                {
                    case 0:
                        echo $lng[2][25];
                        break;
                    case 1:
                        echo $lng[2][14];
                        break;
                    case 2:
                        echo $lng[2][15];
                        break;
                    case 3:
                        echo $lng[2][16];
                        break;
                    case 4:
                        echo $lng[2][17];
                        break;
                    case 5:
                        echo $lng[2][18];
                        break;
                    default:
                        echo $lng[2][14];
                }
            ?>
            )</span>
            <a href="index.php?inc=logout"><?php print $lng[2][12] ?></a>
            <?php
                }
                else
                {
            ?>
            <a href="index.php?inc=login"><?php print $lng[2][11] ?></a> | <a href="index.php?inc=register"><?php print $lng[2][13] ?></a>
            <?php
                }
            ?>
            &nbsp;
        </td>
    </tr>
</table>

<br/>

<table border="0" cellpadding="2" cellspacing="0" class="topMenu" width="100%">
    <tr>
        <td>
            &nbsp;<a href="index.php"><?php print $lng[2][5] ?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=view_all"><?php print $lng[2][24] ?></a>&nbsp;|
            <?php
                if (!($_SESSION['uid']=="" || $_SESSION['username']=="guest"))
                {
            ?>
                    &nbsp;<a href="index.php?inc=my_profile"><?php print $lng[2][19] ?></a>&nbsp;|
            <?php
                }
            ?>
            
            <?php
                if ($_SESSION['rights']=="5")
                {
            ?>
                    &nbsp;<a href="index.php?inc=manage_projects"><?php print $lng[2][20] ?></a>&nbsp;|
            <?php
                }
            ?>
      
            <?php
                if ($_SESSION['rights']=="5")
                {
            ?>
                    &nbsp;<a href="index.php?inc=manage_subprojects"><?php print $lng[2][34] ?></a>&nbsp;|
            <?php
                }
            ?>
            
            <?php
                if ($_SESSION['rights']=="1" || $_SESSION['rights']=="2" || $_SESSION['rights']=="3" || $_SESSION['rights']=="4" || $_SESSION['rights']=="5")
                {
            ?>
                    &nbsp;<a href="index.php?inc=manage_releases"><?php print $lng[2][22] ?></a>&nbsp;|
            <?php
                }
            ?>
            
            <?php
                if ($_SESSION['rights']=="1" || $_SESSION['rights']=="2" || $_SESSION['rights']=="3" || $_SESSION['rights']=="4" || $_SESSION['rights']=="5")
                {
            ?>
                    &nbsp;<a href="index.php?inc=manage_cases"><?php print $lng[2][35] ?></a>&nbsp;|
            <?php
                }
            ?>
      
            <?php
                if ($_SESSION['rights']=="5")
                {
            ?>
                    &nbsp;<a href="index.php?inc=manage_stakeholders"><?php print $lng[2][27] ?></a>&nbsp;|
            <?php
                }
            ?>
            
            <?php
                if ($_SESSION['rights']=="5")
                {
            ?>
                    &nbsp;<a href="index.php?inc=manage_glossary"><?php print $lng[2][28] ?></a>&nbsp;|
            <?php
                }
            ?>
        
            <?php
                if ($_SESSION['rights']=="1" || $_SESSION['rights']=="2" || $_SESSION['rights']=="3" || $_SESSION['rights']=="4" || $_SESSION['rights']=="5")
                {
            ?>
                    &nbsp;<a href="index.php?inc=manage_components"><?php print $lng[2][39] ?></a>&nbsp;|
            <?php
                }
            ?>
            
            <?php
                if ($_SESSION['rights']=="5")
                {
            ?>
                    &nbsp;<a href="index.php?inc=manage_users"><?php print $lng[2][21] ?></a>&nbsp;|
            <?php
                }
            ?>
            
            <?php
                if ($_SESSION['rights']=="1" || $_SESSION['rights']=="2" || $_SESSION['rights']=="3" || $_SESSION['rights']=="4" || $_SESSION['rights']=="5")
                {
            ?>
                    &nbsp;<a href="index.php?inc=edit_requirement"><?php print $lng[2][23] ?></a>&nbsp;|
            <?php
                }
            ?>
      
            <?php
                if ($_SESSION['rights']=="4" || $_SESSION['rights']=="5")
                {
            ?>
                    &nbsp;<a href="index.php?inc=import"><?php print $lng[2][37] ?></a>&nbsp;|
            <?php
                }
            ?>
            
            <?php
                if ($_SESSION['rights']=="1" || $_SESSION['rights']=="2" || $_SESSION['rights']=="3" || $_SESSION['rights']=="4" || $_SESSION['rights']=="5")
                {
            ?>
                    &nbsp;<a href="index.php?inc=manage_keywords"><?php print $lng[2][36] ?></a>&nbsp;|
            <?php
                }
            ?>
            &nbsp;<a href="index.php?inc=manage_reviews"><?php print $lng[2][40] ?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=statistics"><?php print $lng[2][29] ?></a>
        </td>
    </tr>
</table>
