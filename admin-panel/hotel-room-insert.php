<?php
    include("config.php");
    session_start();
    $hotel_id = $_REQUEST['id'];

    if(isset($_REQUEST['submit']))
    {
        if($_REQUEST['room_id'])
        {
            $room_id = $_REQUEST['room_id'];
            $heading = $_REQUEST['room_heading'];
            $tag_line = $_REQUEST['room_tagline'];
            $currency_type = $_REQUEST['currency_type'];
            $price = $_REQUEST['room_price'];
            $description = $_REQUEST['room_description'];
            $added_by = $_SESSION['userid'];
            $upd = "UPDATE room_master set room_heading='$heading', room_tagline='$tag_line', currency_type='$currency_type', room_price='$price', room_description='$description' where id='$room_id'";
            if(mysqli_query($con, $upd))
            {
                ?>
                <script>
                    alert("Room Updated Successfully");
                    window.location.href="hotel-room.php?id=<?php echo $hotel_id; ?>&room_id=<?php echo $room_id; ?>";
                </script>
                <?php
            }
            else
            { 
                ?>
                <script>
                    alert("Failed , Try Again");
                    window.location.href= "hotel-room.php?id=<?php echo $hotel_id; ?>&room_id=<?php echo $room_id; ?>";
                </script>
                <?php  
            }
        }
        else
        {
            
            $heading = $_REQUEST['room_heading'];
            $tag_line = $_REQUEST['room_tagline'];
            $currency_type = $_REQUEST['currency_type'];
            $price = $_REQUEST['room_price'];
            $description = $_REQUEST['room_description'];
            $added_by = $_SESSION['userid'];

            $ins  = "INSERT INTO room_master(`room_heading`, `room_tagline`, `currency_type`, `room_price`, `room_description`, `updated_by`, `hotel_id`) VALUES ('$heading', '$tag_line', '$currency_type', '$price', '$description', $added_by, '$hotel_id')";
            if(mysqli_query($con, $ins))
            {
                ?>
                <script>
                    alert("Room Added Successfully");
                    window.location.href= "hotel-room.php?id=<?php echo $hotel_id ?>";
                </script>
                <?php
            }
            else
            { 
                ?>
                <script>
                    alert("Failed , Try Again");
                    window.location.href= "hotel-room.php?id=<?php echo $hotel_id ?>";
                </script>
                <?php  
            }
            
        }
    }
    else if($_REQUEST['delete_id'])
    {
        $delete = "update room_master set status=1 where id='$_REQUEST[delete_id]'";
        if(mysqli_query($con, $delete))
        {
            ?>
            <script>
                alert("Room Deleted Successfully");
                window.location.href= "hotel-room.php?id=<?php echo $hotel_id ?>";
            </script>
            <?php
        }
        else
        { 
            ?>
            <script>
                alert("Failed , Try Again");
                window.location.href= "hotel-room.php?id=<?php echo $hotel_id ?>";
            </script>
            <?php  
        }
        
    }
    else
    { 
        ?>
        <script>
            alert("Failed");
            window.location.href= "hotel-new.php";
        </script>
        <?php  
    }


?>