<?php

    if(!isset($_SESSION['globel_lang']))
        $_SESSION['globel_lang']="en";

    // Sync chlang with globel_lang for compatibility
    if(!isset($_SESSION['chlang']))
        $_SESSION['chlang'] = $_SESSION['globel_lang'];

    // load language strings
    include ("lng/".$_SESSION['globel_lang'].".php");

    function lng_get_rights($right)
    {
        global $lng;
        $u_rights = $lng[2][14];
        switch($right)
        {
            case 0:$u_rights=$lng[2][25];break;
            case 1:$u_rights=$lng[2][14];break;
            case 2:$u_rights=$lng[2][15];break;
            case 3:$u_rights=$lng[2][16];break;
            case 4:$u_rights=$lng[2][17];break;
            case 5:$u_rights=$lng[2][18];break;
            default:$u_rights=$lng[2][14];
        }

        return $u_rights;
    }
?>
