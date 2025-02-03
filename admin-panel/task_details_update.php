<?php 
    
    include("config.php"); 

    if(ISSET($_REQUEST['submit']))
    {
        session_start(); 
        $assigned_to = $_REQUEST['assigned_to'];
        $task_head = $_REQUEST['task_head'];
        $task_details = $_REQUEST['task_details'];
        $assign_date = $_REQUEST['assign_date'];
        $end_date = $_REQUEST['end_date'];
        $behaviour = $_REQUEST['behaviour'];
        $day = $_REQUEST['day'];
        $time = $_REQUEST['time'];
        $date2 = $_REQUEST['date2'];
        $id = $_REQUEST['id'];
        if($_REQUEST['date'])
        {
            $date = $_REQUEST['date'];
        }
        else if($_REQUEST['mdate'])
        {
            $date = $_REQUEST['mdate'];
        }
        else
        {
            $date='';
        }

         $sql_upd = "UPDATE task SET assigned_to = '$assigned_to', task_head = '$task_head', task_details = '$task_details', assign_date = '$assign_date', end_date = '$end_date', behaviour = '$behaviour', day = '$day', date = '$date', time = '$time', date2 = '$date2' WHERE id=$id ";
        if($sql_rs = mysqli_query($con, $sql_upd))
        {
            ?>
            <script>
                alert("Update Success");
                window.location.href = "task-details.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Failed, Try Again!");
                window.location.href = "task-details.php";
            </script>
            <?php
        }

    } 
    else
    {
        ?>
        <script>
            alert("Try Again!");
             window.location.href = "task-details.php";
        </script>
        <?php
    }

?>