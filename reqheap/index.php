<?php
    session_start();
    include('ini/params.php');
    
    // time
    #$_SESSION['time'] = time();
    #print "session start:".date('Y/m/d H:i:s', $_SESSION['time'])."<br>";
    
    // default language
    $_SESSION['chlang']="en";
    #print "default language:".$_SESSION['chlang']."<br>";
    
    // load language strings
    #include ('ini/lng/en.php');
    include ("ini/lng/".$_SESSION['chlang'].".php");
    
    /*
    while (list($key, $val) = each($lng))
    {
        while (list($key2, $val2) = each($lng[$key]))
        {
            #$lng[$key][$key2]="[EN]".$val2;
            #print $lng[$key][$key2]."<br>";
        }
    }
    */
    
    $inc = $_GET['inc'];
    #print "inc=".$_GET['inc']."<br>";
    
    #print "u_username:".$_POST['u_username']."<br>";
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="description" content="<?php print $lng[1][2] ?>"/>
	    <meta name="keywords" content="<?php print $lng[1][3] ?>"/>
        <title><?php print $lng[1][1] ?></title>
	    <link rel='STYLESHEET' type='text/css' href='dhtmlxTree/samples/common/style.css'>
	    <link rel="stylesheet" href="s.css" type="text/css"/>
    </head>
    
    <body bgcolor="#ffffff">
        <a href="index.php"><img src="img/logo.jpg" border="0"></a>
        <center>
            <table border="0" cellpadding="10" cellspacing="0" width="100%" class="main">
                <tr>
                    <td>
                        <?php
                            include ('main/top.php');
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td valign="top" align="center">
                        <?php
                            switch($inc)
                            {
                            case 'copyright':
                                include('main/copyright.php');
                                break;
                            case 'about':
                                include('main/about.php');
                                break;
                            case 'login':
                                include('main/login.php');
                                break;
                            case 'manage_users':
                                include('main/manage_users.php');
                                break;
                            case 'edit_user':
                                include('main/edit_user.php');
                                break;
                            case 'manage_projects':
                                include('main/manage_projects.php');
                                break;
                            case 'edit_project':
                                include('main/edit_project.php');
                                break;
                            case 'edit_requirement':
                                include('main/edit_requirement.php');
                                break;
                            case 'my_profile':
                                include('main/my_profile.php');
                                break;
                            default:
                                include('main/main.php');
                            }
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <?php
                            include('main/footer.php');
                        ?>
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>


