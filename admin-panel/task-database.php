<?php 
    
    include("config.php"); 

    if(ISSET($_REQUEST['submit']))
    {
        session_start(); 
        $emp_name = ucwords(strtolower($_REQUEST['emp_name']));
        $task_head = $_REQUEST['task_head'];
        $task_details = $_REQUEST['task_details'];
        $assign_date = $_REQUEST['assign_date'];
        $end_date = $_REQUEST['end_date'];
        $behaviour = $_REQUEST['behaviour'];
        $date = $_REQUEST['date'];
        $time = $_REQUEST['time'];
        $days = $_REQUEST['days'];
        $fdate = $_REQUEST['fdate'];

           $sql_ins = "INSERT INTO task (`assigned_to`, `task_head`, `task_details`, `assign_date`, `end_date`,  `assigned_by`, `behaviour`, `date`, `time`, `day`, `date2`) VALUES ('$emp_name', '$task_head', '$task_details', '$assign_date', '$end_date', '$_SESSION[userid]', '$behaviour', '$date', '$time', '$days', '$fdate')";
        if($sql_rs = mysqli_query($con, $sql_ins))
        {
            ?>
            <script>
                alert("Success");
                window.location.href = "task.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Failed, Try Again");
                window.location.href = "task.php";
            </script>
            <?php
        }
        

    }
    else
    {
        ?>
        <script>
            alert("Try Again");
            window.location.href = "task.php";
        </script>
        <?php     
    }

?>