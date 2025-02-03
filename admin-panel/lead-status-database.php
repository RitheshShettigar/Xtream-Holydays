<?php include("config.php");
    session_start();
    if(ISSET($_REQUEST['submit']))
    {
        $lead_id = $_REQUEST['lead_id'];
        $status = $_REQUEST['status'];
        $comment = $_REQUEST['comment'];
        $added_by = $_SESSION['userid'];
        $date1 = $_REQUEST['date1'];

        if($status == 'Completed')
        {
            $date1 = '';
        }
        else if($status == 'Cancelled')
        {
            $date1 = '';
        }


         $sql_ins = "INSERT INTO lead_status(`lead_id`, `status`, `comment`, `added_by`) VALUES ('$lead_id', '$status', '$comment', '$added_by')";
        if($sql_rs = mysqli_query($con, $sql_ins))
        {
            $st_update = "UPDATE leads set follow_update = '$date1' where id = $lead_id";
            $st_rs = mysqli_query($con, $st_update);
            ?>
            <script>
                alert("Success");
                window.location.href = "lead-status-update.php?id=<?php echo $lead_id ?>";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Failed, Try Again!");
                window.location.href = "lead-status-update.php?id=<?php echo $lead_id ?>";
            </script>
            <?php
        }
        
    }
    else
    {
        ?>
            <script>
                alert("Try Again!");
               window.location.href = "lead-status-update.php?id=<?php echo $lead_id ?>";
            </script>
        <?php 
    }
    ?>  
