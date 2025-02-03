<?php 

    include("config.php");
   

if(ISSET($_REQUEST['submit']))
{
        $task_id = $_REQUEST['task_id'];
        $behaviour = $_REQUEST['behaviour'];
        $status = $_REQUEST['status'];
        $comment = $_REQUEST['comment'];
        $added_by = $_SESSION['userid'];

    $chk = "SELECT * from task_status WHERE added_by = $_SESSION['userid']";
    $rs = mysqli_query($con, $chk);
    if($rs_arr = mysqli_fetch_array($rs))
    {
        $sql = "UPDATE task_status set task_id = '$task_id', behaviour = '$behaviour', status = '$status', comment = '$comment' ";
    }
    else
    {
       
    }
    
    if(mysqli_query($con, $sql))
    {
        ?>
        <script>
            alert("Success");
            window.location.href = "task-status-update.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("Try Again!");
           window.location.href = "task-status-update.php";
        </script>
        <?php
    }

}
?>