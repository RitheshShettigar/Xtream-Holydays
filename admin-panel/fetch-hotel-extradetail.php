<?php 
    include("config.php");

    $hotel_id = $_REQUEST['packageid'];
    $typepc = $_REQUEST['extra_details'];
    
    $fetch = "select * from hotel_details where hotel_id = '$hotel_id' and type = '$typepc'";
    $fetch_rs = mysqli_query($con, $fetch);
    $fetch_arr = mysqli_fetch_array($fetch_rs);

    echo $details = $fetch_arr['details'];
?>
