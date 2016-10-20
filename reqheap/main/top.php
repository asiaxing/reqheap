<table border="0" cellpadding="2" cellspacing="0" class="topMenu" width="100%">
    <tr>
        <td>
            &nbsp;<a href="index.php">
                <?php print $lng[2][5] ?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=view_all">
                <?php print $lng[2][24] ?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=manage_reviews">
                <?php print $lng[2][40] ?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=statistics">
                <?php print $lng[2][29] ?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=my_profile">
                <?php print $lng[2][19]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=manage_projects">
                <?php print $lng[2][20]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=manage_subprojects">
                <?=$lng[2][34]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=manage_releases">
                <?=$lng[2][22]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=manage_cases">
                <?=$lng[2][35]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=manage_stakeholders">
                <?=$lng[2][27]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=manage_glossary">
                <?=$lng[2][28]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=manage_components">
                <?=$lng[2][39]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=manage_users">
                <?=$lng[2][21]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=edit_requirement">
                <?=$lng[2][23]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=import">
                <?=$lng[2][37]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=manage_keywords">
                <?=$lng[2][36]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=manage_reviews">
                <?=$lng[2][40]?></a>&nbsp;|
            &nbsp;<a href="index.php?inc=statistics">
                <?php print $lng[2][29]?></a>
            
            <td align="right">&nbsp;
                <?php if (dblogin_get_cur_user_id() != null)
                    {
                        print $lng[2][4]; // welcome
                        print " ";
                        print htmlspecialchars(dblogin_get_cur_user_acount());
                ?>
                <span class="small">(
                <?php print htmlspecialchars(dblogin_get_cur_user_name())?> - 
                <?php
                    switch(dblogin_get_cur_user_rights())
                    {
                        case 0:echo $lng[2][25];break;
                        case 1:echo $lng[2][14];break;
                        case 2:echo $lng[2][15];break;
                        case 3:echo $lng[2][16];break;
                        case 4:echo $lng[2][17];break;
                        case 5:echo $lng[2][18];break;
                        default:echo $lng[2][14];
                    }
                ?>
                )</span><a href="index.php?inc=logout"><?php print $lng[2][12]?></a>
                <?php 
                    }else{
                ?>
                    <a href="index.php?inc=login"><?php print $lng[2][11]?></a> | <a href="index.php?inc=register"><?php print $lng[2][13]?></a>
                <?php
                    }
                ?>
        </td>
    </tr>
</table>
