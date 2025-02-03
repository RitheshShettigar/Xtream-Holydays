<?php
    // $server = "localhost";
    // $user = "nandiabh_Xtreamh";
    // $pass = "Xtreamholiday@1366";
    // $db ="nandiabh_Xtream";


    $server = "localhost";
    $user = "root";
    $pass = "";
    $db ="nandiabh_xtream";

    $con = new mysqli($server, $user, $pass, $db);

    if($con->connect_errno)
    {
        echo "failed".$con->connect_errno;
        exit;
    }

?>