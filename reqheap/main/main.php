<?php
    // show login page
    if ($_SESSION['cur_user_id']=="")
        header("Location:index.php?inc=login");
    
    print "mani page - to be continue...";
?>

