<?php include("config.php");

    $status = $_REQUEST['status'];
    $user_id = $_REQUEST['id'];

    $upd = "UPDATE emp_master set status = '$status' WHERE user_id = '$user_id'";
    
    if(mysqli_query($con, $upd))
    {
        ?>
        <script>
            // alert("Update Success");
            window.location.href="employee-master-report.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            //alert("Update Failed!");
            window.location.href="employee-master-report.php";
        </script>
        <?php
    }

?>