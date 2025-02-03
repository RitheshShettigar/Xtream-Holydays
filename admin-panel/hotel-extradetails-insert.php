<?php 
    include("config.php");
    session_start();

    if(ISSET($_REQUEST['submit']))
    {
        $added_by = $_SESSION['userid'];
        $hotel_id = $_REQUEST['hotel_id'];
        $type = $_REQUEST['type'];
        $details = filter_var(htmlentities($_REQUEST['details']), FILTER_SANITIZE_STRING);

        $chk = "select * from hotel_details where hotel_id='$hotel_id' and type='$type'";
        $chk_rs = mysqli_query($con, $chk);
        if($chk_arr = mysqli_fetch_array($chk_rs))
        {
           $sql_ins ="update hotel_details set details = '$details' where id ='$chk_arr[id]'";        
        }
        else
        {
            $sql_ins = "INSERT INTO hotel_details(`added_by`, `hotel_id`, `type`, `details`) VALUES('$added_by', '$hotel_id', '$type', '$details')";
        }
        if($sql_rs = mysqli_query($con, $sql_ins))
        {
            ?>
            <script>
                alert("Hotel Details Added Successfully");
                window.location.href = "hotel-extra-details.php?id=<?php echo $hotel_id; ?>";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Failed, Try Again");
                // window.location.href = "package-extra-details.php?id=<?php echo $hotel_id; ?>";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert("Failed");
            // window.location.href = "package-extra-details.php";
        </script>
        <?php
    }
?>
