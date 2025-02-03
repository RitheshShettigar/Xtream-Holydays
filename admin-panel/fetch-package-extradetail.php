<?php 
    include("config.php");

    $package_id = $_REQUEST['packageid'];
    $typepc = $_REQUEST['extra_details'];
    
    $fetch = "select * from package_details where package_id = '$package_id' and type = '$typepc'";
    $fetch_rs = mysqli_query($con, $fetch);
    $fetch_arr = mysqli_fetch_array($fetch_rs);

    echo $details = $fetch_arr['details'];
?>
