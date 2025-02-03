<?php
    include("config.php");

    if(isset($_REQUEST['update_att']))
    {
        $emp_id = $_REQUEST['emp_id'];
        $date = date('Y-m-d');
        $in_time = $_REQUEST['in_time'];
        $out_time = $_REQUEST['out_time'];
        if($in_time == '')
        {
            ?>
            <script>
                alert("Please Select In Time! Try Again");
                window.location='attandence.php';
            </script>
            <?php
        }
        
        $att = "select * from attendance where emp_id='$emp_id' and date='$date'";
        $att_rs = mysqli_query($con, $att);
        if($att_arr = mysqli_fetch_array($att_rs))
        {
            $atti = "UPDATE attendance SET in_time='$in_time', out_time='$out_time' where emp_id='$emp_id' and date='$date'";
        }
        else
        {
            $atti = "INSERT INTO attendance (`emp_id`, `date`, `in_time`, `out_time`) VALUES('$emp_id', '$date', '$in_time', '$out_time')";
        }
        if($attir = mysqli_query($con, $atti))
        {
            ?>
            <script>
                alert("Updated Successfully")
                window.location='attandence.php';
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Not Updated! Try Again");
                window.location='attandence.php';
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert("Not Updated! Try Again");
            window.location='attandence.php';
        </script>
        <?php
    }
 ?>