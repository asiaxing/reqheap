<?php
    session_start();

    include("ini/lng.php");
    include("admin/inc/func.php");
    include("db/db-link.php");
    include("db/db-login.php");
    
    if(!empty($_GET['inc']))
        $inc = $_GET['inc'];
    else
        $inc = null;
?>

<?php
    $debug = true;
    
    if($debug)
    {
        // test
        if(!empty($_SESSION['cur_user_id']))
        {
            print "current user id:". $_SESSION['cur_user_id']."<br>";
            print "current user acount:". $_SESSION['cur_user_acount']."<br>";
            print "current user name:".$_SESSION['cur_user_name']."<br>";
            print "current user email:".$_SESSION['cur_user_email']."<br>";
            print "current user rights:".$_SESSION['cur_user_rights']."<br>";
        }
    }
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
                            case 'register':
                                include('main/register.php');
                                break;
                            case 'login':
                                include('main/login.php');
                                break;
                            case 'logout':
                                include('main/logout.php');
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


