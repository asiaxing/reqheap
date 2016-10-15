<?php
    #print "u_username:".$_POST['u_username']."<br>";
    if ($u_username != "")
    {
        /*
        $host = 'localhost';	
	    $app_database = 'app_database';
	    $app_user = 'app_user';
	    $app_user_password = '123_abc_ABC';
	    $app_dblink = new dblink($host, $app_user, $app_user_password, $app_database);
        //deleting all old records from tree history
        $query="delete from tree_history where th_date<DATE_SUB(now(), INTERVAL 1 HOUR);";
        $rs = $app_dblink->exec_sql($query);
 
        $query="select * from users where u_username='".escapeChars($u_username)."' and u_password='".pw($u_password)."'";
        $rs = $app_dblink->query_sql($query);
        if($row=$rs->fetch_object())
        {
            $_SESSION['uid']=$row['u_id'];
            $_SESSION['email']=$row['u_email'];
            $_SESSION['username']=stripslashes($row['u_username']);
            $_SESSION['name']=stripslashes($row['u_name']);
            $_SESSION['rights']=$row['u_rights'];
            
            if (strstr($_SESSION['http_ref'],"lost_password")) header("Location:index.php");
            elseif ($_SESSION['http_ref']!="") header("Location:index.php?".$_SESSION['http_ref']);
            else header("Location:index.php");
        } 
        else
            $tmp="<br><br><span class='error'>".$lng[5][6]."</span>";
        */
    }
?>

<?php
    if ($lp=="yes")
        print "<br><span class='error'>".$lng[7][4]."</span><br><br>";
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
	                    <td>&nbsp;<input type="text" name="u_username" value="<?php print stripslashes(htmlspecialchars($u_username))?>"></td>
	                </tr>  
	                <tr class="blue">
	                    <td align="right">&nbsp;<?php print $lng[5][3]?>&nbsp;:&nbsp;</td>
	                    <td>&nbsp;<input type="password" name="u_password"></td>
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

<?php
    print $tmp;
?>
<?php
    //news section
    include("ini/txts/".$_SESSION['chlang']."/news.php");
    //rsort($news_array);
    $paging=NUMBER_OF_NEWS_SHOWN;
    $cnt=0;
    $all_count=count($news_array);
    if ($from=="") $from=0; 
    if ($from+$paging>$all_count)
        $cnt2=$all_count;
    else
        $cnt2=$from+$paging;
    $cnt3=0;
    $news_array2="";
    for ($i=($all_count-1);$i>=0;$i--)
    {
        $news_array2[$cnt3]=$news_array[$i];
        $cnt3++;
    }
?>

<br>
<br>
<table border="0" cellspacing="2" cellpadding="2" width="98%">
    <tr>
        <td align="left"><b><u>News:</u></b></td> 	 
    </tr>
    
    <?php
        for ($i=$from;$i<$cnt2;$i++)
        {
            $cnt++;
    ?>
    
    <tr valign="top">
        <td align="left"><?php print $news_array2[$i]['title']?>&nbsp;(<?php print $news_array2[$i]['date']?>)</td> 	 
    </tr>
    <tr valign="top">
        <td align="left"><?php print $news_array2[$i]['text']?></td> 	 
    </tr>
    <tr valign="top">
        <td align="left">&nbsp;</td> 	 
    </tr>
    
    <?php
        }
  
        //displaying paging list
        if ($all_count>$paging && $cnt!=0) 
        {
            $j=ceil($all_count/$paging);
            for ($i=0,$tmp_c=0;$i<$j;$i++,$tmp_c++) 
            {
                if ($i*$paging==$from) $tmp_paging.=($i+1)." &nbsp;";	
                else $tmp_paging.="<a href=# onclick='subm_paging(".($i*$paging).");return false;'>".($i+1)."</a> &nbsp;";
            } 
            $tmp_paging=substr($tmp_paging,0,strlen($tmp_paging)-1);
        }  
    ?>
    
    <?php
        if ($cnt>0 && $tmp_paging!="")
        {
    ?>
    
    <tr align=left>
        <td align=left>&nbsp;
        <b>
            <?php
                if ($from>0)
                    print "<a href=# onclick='subm_paging(".($from-$paging).");return false;'>&lt;</a>&nbsp;&nbsp;";
            ?>
            
            <?php
                print $tmp_paging
            ?>
         
            <?php
                if ($from<$all_count-$paging) 
                    print "<a href=# onclick='subm_paging(".($from+$paging).");return false;'>&gt;</a>";
            ?>
        </b>
        </td>
    </tr>
    <?php
        }
    ?>  
</table>

<form method=post name=form_paging action="">
    <input type=hidden name=from value="">
</form>

<script>
    function subm_paging(who)
    {
        document.forms['form_paging'].from.value=who;
        document.forms['form_paging'].submit();
    }  
</script> 
