<?php include("config.php");
    session_start();
    if(ISSET($_REQUEST['submit']))
    {
        $task_id = $_REQUEST['task_id'];
        $status = $_REQUEST['status'];
        $comment = $_REQUEST['comment'];
        $added_by = $_SESSION['userid'];


         $sql_ins = "INSERT INTO task_status(`task_id`, `status`, `comment`, `added_by`) VALUES ('$task_id', '$status', '$comment', '$added_by')";
        if($sql_rs = mysqli_query($con, $sql_ins))
        {
            ?>
            <script>
                alert("Success");
                window.location.href = "task-report.php?id=<?php echo $task_id ?>";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Failed, Try Again!");
                window.location.href = "task-report.php?id=<?php echo $task_id ?>";
            </script>
            <?php
        }
        
    }
    else
    {
        ?>
            <script>
                alert("Try Again!");
                window.location.href = "task-report.php";
            </script>
        <?php 
    }
    ?>  
