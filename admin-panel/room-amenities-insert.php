<?php
    include("config.php");
    session_start();


    if(isset($_REQUEST['submit']))
    {
        $count=0;
        $added_by = $_SESSION['userid'];
        $amenities = $_REQUEST['amenity'];
        $room_id = $_REQUEST['room_id'];
        $upd = "update room_amenities set status=1 where room_id='$room_id'";
        mysqli_query($con, $upd);
        for($i=0; $i<count($amenities); $i++)
        {
            
            $ins = "INSERT INTO room_amenities(`added_by`, `room_id`, `amenities_id`) VALUES('$added_by', '$room_id', '$amenities[$i]')";
            
            if($ins_rs = mysqli_query($con, $ins))
            {
                $count++;
                echo "<br>";
            }
        }
        if($count>0)
        {
            ?>
                <script>
                    alert("Successfully Updated");
                    window.location.href="room-amenities.php?id=<?php echo $room_id; ?>";
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert("Error Try Again!");
                    window.location.href="room-amenities.php?id=<?php echo $room_id; ?>";
                </script>
            <?php
        }
    }
?>