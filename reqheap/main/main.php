<?php
    // show login page
    if ($_SESSION['uid']=="")
        header("Location:index.php?inc=login");
        
    include("ini/txts/".$_SESSION['chlang']."/state.php");
    
    /*
    $host = 'localhost';	
	$app_database = 'app_database';
	$app_user = 'app_user';
	$app_user_password = '123_abc_ABC';
	$app_dblink = new dblink($host, $app_user, $app_user_password, $app_database);
	*/
?>

<table border="0" width="100%">
    <tr valign="top">
        <td width="50%">
            <?php
                if ($err=="yes")
                    print "<span class='error'>".$lng[4][8]."<span><br><br>";
            ?>
            
	        <table border="0" cellpadding="2" cellspacing="2" class="content" width="50%">
	            <tr class="gray">
	                <td colspan="4">&nbsp;<b><?php print $lng[4][1]?></b></td>
	            </tr>
	            
	            <?php
	                /*
	                //getting requirements - assigned
	                $query="select r.*, date_format(r.r_creation_date, '%d.%m.%Y %H:%i') as d1, date_format(r.r_change_date, '%d.%m.%Y %H:%i') as d2, p.p_id,p.p_name from requirements r left outer join projects p on r.r_p_id=p.p_id where  r.r_assigned_u_id=".$_SESSION['uid']." and r.r_p_id in (".$project_list.") order by r.r_change_date desc";
	                $rs = $app_dblink->query_sql($query);
	                while($row=$rs->fetch_object()) 
	                {
	                    if(mktime (0,0,0,date("m"),date("d")-2,date("Y")) < mktime(0,0,0,substr($row->d1,3,2),substr($row->d1,0,2),substr($row->d1,6,4)))
	                        $new=1;
	                    else
	                        $new=0;
	                    
	                    $cl=$state_colors_array[$row['r_state']];
	                */
	            ?>
	            <!--
	            <tr class="red" style="background-color:<?php print $cl?>;">
	                <td width="30" align=center>&nbsp;<a href="index.php?inc=view_requirement&r_id=<?php print $row->r_id ?>"><?php print $new?"<b>":""?><?php print $row->r_id ?><?php print $new?"</b>":""?></a></td>
	                <td>&nbsp;<?php print $new ?"<b>":""?><?php print htmlspecialchars($row->r_name)?><?php print $new?"</b>":""?></td>
	                <td width="110">&nbsp;<?php print $new?"<b>":""?><?php print ($row['d2']!="00.00.0000 00:00")?$row->d2:"(".$row->d1.")"?><?php print $new?"</b>":""?></td>
	                <td width="100">&nbsp;<a href="index.php?inc=view_project&p_id=<?php print $row->p_id ?>"><?php print $new?"<b>":""?><?php print htmlspecialchars($row->p_name)?><?php print $new?"</b>":""?></a></td>
	            </tr>
	            -->
	            <?php
	                /*
	                }
	                $rs->close();
	                */
	            ?>
	            
	            <?php
	                if ($_SESSION['rights']==1 || $_SESSION['rights']==2 || $_SESSION['rights']==3 || $_SESSION['rights']==4) 
	                {
	            ?>
	  
	            <tr>
	                <td colspan="4">&nbsp;</td>
	            </tr>
	  
	            <tr class="gray">
	                <td colspan="4">&nbsp;<b><?php print $lng[4][5]?></b></td>
	            </tr>
	            
	            <?php
	                /*
	                //getting requirements - waiting for acceptance
	                $query="select r.*, date_format(r.r_creation_date, '%d.%m.%Y %H:%i') as d1, date_format(r.r_change_date, '%d.%m.%Y %H:%i') as d2, p.p_id,p.p_name from requirements r left outer join projects p on r.r_p_id=p.p_id where r.r_state=0 and r.r_p_id in (".$project_list.") order by r.r_change_date desc";
	                $rs = $app_dblink->query_sql($query);
	                while($row=$rs->fetch_object()) 
	                {
	                    if (mktime (0,0,0,date("m"),date("d")-2,date("Y")) < mktime (0,0,0,substr($row->d1,3,2),substr($row->d1,0,2),substr($row->d1,6,4)))
	                        $new=1;
	                    else
	                        $new=0;	  
	                    
	                    $cl=$state_colors_array[$row->r_state];
	                */
	            ?>
	            <!--
	            <tr class="orange" style="background-color:<?php print $cl ?>;">
	                <td width="30" align=center>&nbsp;<a href="index.php?inc=view_requirement&r_id=<?php print $row->r_id?>"><?php print $new?"<b>":""?><?php print $row['r_id']?><?php print $new?"</b>":""?></a></td>
	                <td>&nbsp;<?php print $new?"<b>":""?><?php print htmlspecialchars($row->r_name)?><?php print $new?"</b>":""?></td>
	                <td width="110">&nbsp;<?php print $new?"<b>":""?><?php print ($row->d2!="00.00.0000 00:00")?$row->d2:"(".$row->d1.")"?><?php print $new?"</b>":""?></td>
	                <td width="100">&nbsp;<a href="index.php?inc=view_project&p_id=<?php print $row['p_id']?>"><?php print $new?"<b>":""?><?php print htmlspecialchars($row->p_name)?><?php print $new?"</b>":""?></a></td>
	            </tr>	  
	            -->
	            <?php
	                /*
	                }
	                $rs->close();
	                */
	            ?>
	            
	            <?php
	                }
	            ?>	
	        </table>
        </td>
        
        <td>&nbsp;&nbsp;&nbsp;</td>	 
        <td width="50%">
	        <form method=post name=form_paging action="">
	            <table border="0" cellpadding="2" cellspacing="2" class="content" width="50%">
	            
	            <?php
	                
	                //paging query, number of results (from the param.php file) per page displayed
	                $paging=$PPAGE;
	                if ($_ppaging!="")
	                    $paging=$_ppaging;
	                $_ppaging=$paging;
	                
	                /*
	                $query="select count(*) from requirements r left outer join projects p on r.r_p_id=p.p_id where r.r_p_id in (".$project_list.")";
	                
	                #$rs = $app_dblink->query_sql($query);
	                #if($rs->num_rows)
	                {
	                    
	                    if($row=$rs->fetch_object())
	                        $all_count=$row[0];
	                    if ($from=="")
	                        $from=0; 
                    	if ($from+$paging>$all_count)
                    	    $cnt2=$all_count;
	                    else
	                        $cnt2=$from+$paging;
	                }
	                #$rs->close();
	                */
	            ?>
	            
	            <tr class="gray">
	                <td colspan="4">&nbsp;<b><?php print $lng[4][3]?> (<?php print ($from+1)?> - <?php print $cnt2?> / <?php print $all_count?> )</b></td>
	            </tr>
	            
	            <?php
	                /*
	                //getting requirements - recently modified
	                $query="select r.*, date_format(r.r_creation_date, '%d.%m.%Y %H:%i') as d1, date_format(r.r_change_date, '%d.%m.%Y %H:%i') as d2, p.p_id,p.p_name from requirements r left outer join projects p on r.r_p_id=p.p_id where r.r_p_id in (".$project_list.") order by r.r_change_date desc Limit ".$from.",".$paging;
	                $rs = mysql_query($query) or die(mysql_error());
	                $cnt=0;
	                while($row=mysql_fetch_array($rs)) 
	                {
	                    $cnt++;
	                    if (mktime (0,0,0,date("m"),date("d")-2,date("Y")) < mktime (0,0,0,substr($row['d1'],3,2),substr($row['d1'],0,2),substr($row['d1'],6,4)))
	                        $new=1;
	                    else
	                        $new=0;	  
	                    
	                    $cl=$state_colors_array[$row['r_state']];
	                */
	            ?>
	            <!--
	            <tr class="blue" style="background-color:<?php print $cl?>;">
	                <td width="30" align=center>&nbsp;<a href="index.php?inc=view_requirement&r_id=<?php print $row['r_id']?>"><?php print $new?"<b>":""?><?php print $row['r_id']?><?php print $new?"</b>":""?></a></td>
	                <td>&nbsp;<?php print $new?"<b>":""?><?php print htmlspecialchars($row['r_name'])?><?php print $new?"</b>":""?></td>
	                <td width="110">&nbsp;<?php print $new?"<b>":""?><?php print ($row['d2']!="00.00.0000 00:00")?$row['d2']:"(".$row['d1'].")"?><?php print $new?"</b>":""?></td>
	                <td>&nbsp;<a href="index.php?inc=view_project&p_id=<?php print $row['p_id']?>"><?php print $new?"<b>":""?><?php print htmlspecialchars($row['p_name'])?><?php print $new?"</b>":""?></a></td>
	            </tr>	  
	            -->
	            <?php
	                /*
	                }
	                */
	            ?>
	            
	            <?php
	                //displaying paging list
	                if ($all_count>$paging && $cnt!=0) 
	                {
	                    $j=ceil($all_count/$paging);
	                    for ($i=0,$tmp_c=0;$i<$j;$i++,$tmp_c++) 
	                    {
	                        if ($i*$paging==$from)
	                            $tmp_paging.=($i+1)." &nbsp;";	
	                        elseif ( ($i*$paging>=$from-(4*$paging)) && ($i*$paging<=$from+(4*$paging)))
	                            $tmp_paging.="<a href=# onclick='subm_paging(".($i*$paging).");return false;'>".($i+1)."</a> &nbsp;";
	                    } 
	                    $tmp_paging=substr($tmp_paging,0,strlen($tmp_paging)-1);
	                }  
	            ?>  
	            
	            <?php
	                if ($cnt>0 && $tmp_paging!="" && $_SESSION['_viewalltype']!=0)
	                {
	            ?>

	            <tr class="gray" align=left>
	                <td colspan=3 align=left>&nbsp;<b>
	     
	                <?php
	                    if ($from>0)
	                        print "<a href=# onclick='subm_paging(0);return false;'>&lt;&lt;</a>&nbsp;&nbsp;<a href=# onclick='subm_paging(".($from-$paging).");return false;'>&lt;</a>&nbsp;&nbsp;";
	                ?>
	                <?php
	                    print $tmp_paging
	                ?>
	                <?php
	                    if ($from<$all_count-$paging)
	                        print "<a href=# onclick='subm_paging(".($from+$paging).");return false;'>&gt;</a>&nbsp;&nbsp;<a href=# onclick='subm_paging(".(($i-1)*$paging).");return false;'>&gt;&gt;</a>";
	                ?>
	                </b>
	                </td>
	     
	                <td align=right><?php print $lng[4][9]?>
	                    <select name="_ppaging" onchange="document.forms['form_paging'].submit();">
	                        <option value="10" <?php if ($_ppaging==10) print "selected";?>>10
	                        <option value="20" <?php if ($_ppaging==20) print "selected";?>>20
	                        <option value="50" <?php if ($_ppaging==50) print "selected";?>>50
	                        <option value="100" <?php if ($_ppaging==100) print "selected";?>>100
	                    </select>
	                </td>
	            </tr>
	            <?php
	                }
	            ?>
	            </table>
	        
	            <input type=hidden name=from value="">
	        </form>
        </td>
    </tr>
    <tr valign="top" colspan="3">
        <td><br></td>
    </tr> 
    <tr valign="top">
        <td colspan="3">
            <table border="0" cellpadding="2" cellspacing="2" class="content" width="50%">
	            <tr>
	                <?php
	                    for ($i=0;$i<count($state_array);$i++)
	                    {
	                ?>
	                <td align="center" class="blue" style="background-color: <?php print $state_colors_array[$i]?>;" width="12.5%">&nbsp;<?php print $state_array[$i]?></td>
	                <?php
	                    }
	                ?>
	                <!--td align="center" class="red" width="17%">&nbsp;<?php print $lng[17][12]?></td>
	               <td align="center" class="violet" width="17%">&nbsp;<?php print $lng[17][13]?></td>
	               <td align="center" class="green" width="17%">&nbsp;<?php print $lng[17][14]?></td>
	               <td align="center" class="yellow" width="17%">&nbsp;<?php print $lng[17][15]?></td>
	               <td align="center" class="orange" width="17%">&nbsp;<?php print $lng[17][10]?></td>
	               <td align="center" class="gray" width="17%">&nbsp;<?php print $lng[17][11]?></td-->	 
	            </tr>
            </table>
        </td>
    </tr> 
</table>

<script>
    function subm_paging(who)
    {
        document.forms['form_paging'].from.value=who;
        document.forms['form_paging'].submit();
    }  
</script>
