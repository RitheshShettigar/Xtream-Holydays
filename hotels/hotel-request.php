<?php
    include ("../includes/contact-us/config.php");
    date_default_timezone_set("Asia/Calcutta");

 if(ISSET($_REQUEST['submit']))
 {
    $hotel_id = $_REQUEST['hotel_id'];
    $room_id = $_REQUEST['stay_type'];
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];
    $persons=$_REQUEST['persons'];
    $rooms=$_REQUEST['rooms'];
    $check_in=$_REQUEST['check_in'];
    $check_out=$_REQUEST['check_out'];
    $message=$_REQUEST['message'];
    $url=$_REQUEST['url'];
    
  
 
    $sql_ins="INSERT INTO  hotel_request (`name`, `email`, `phone`, `persons`, `rooms`, `check_in`, `check_out`, `message`, `hotel_id`, `room_id`)  VALUES('$name', '$email', '$phone', '$persons', '$rooms', '$check_in', '$check_out', '$message', '$hotel_id', '$room_id' )";
    if($rs=mysqli_query($con, $sql_ins))
    {
        $room = "select * from room_master where status = 0 and id = $room_id";
        $room_rs = mysqli_query($con, $room);
        $room_arr = mysqli_fetch_array($room_rs);

        $hotel = "select * from hotel_master where status = 0 and id = $hotel_id";
        $hotel_rs = mysqli_query($con, $hotel);
        $hotel_arr = mysqli_fetch_array($hotel_rs);

        $room_type = $room_arr['room_heading'];
        $hotel_name = $hotel_arr['hotel_name'];

        {
            $to = "y.vikassharma@gmail.com, vikas@scopycode.com"; // my email address
            $from = $email; // from (my email)
            $time = date('d-m-Y H:i A');
            $headers = "From: " . $from . "\r\n";
            
            $subject = "New Hotel Booking Request From Website Xtreamholiday.com";
            $body = "Name: " . $name ."\r\n"."Contact: ". $phone ."\r\n"."Arrival Date: ". $check_in ."\r\n"."Departure Date: ". $check_out ."\r\n"."Booking Time: ". $time ."\r\n"."No of Persons: ". $persons ."\r\n" ."No of Rooms: ". $rooms."\r\n" . "Hotel Name: ". $hotel_name. "\r\n". "Type of Room: ". $room_type. "\r\n". "Message: " .$message;
            
            if( filter_var($email, FILTER_VALIDATE_EMAIL) )
            {
                if (mail($to, $subject, $body, $headers, "-f " . $from))
                {
                    $filename=$_SERVER["PHP_SELF"];
                    //echo 'Your e-mail (' . $_POST['email'] . ') has been added to our mailing list!';
                    ?>
                    <script>
                    alert("Thank you! Our Executive will be get back to you soon");
                    window.location.href = "index.php";
                    </script>
                    <?php
                }
                else
                {
                      //echo 'There was a problem with your e-mail ($_POST['email'])';
                    ?>
                    <script>
                    alert("There was a problem with your e-mail (<?php echo $email; ?>)");
                    window.location.href = "index.php";
                    </script>
                    <?php  
                }
            }
            else
            {
              //echo 'There was a problem with your e-mail (' . $_POST['email'] . ')';  
                ?>
                <script>
                alert("There was a problem with your e-mail (<?php echo $email; ?>)");
                window.location.href = "index.php";
                </script>
                <?php  
            }
        }   

        ?>
        <script>
            alert("Thank You for Booking ! Our Executive will get back to you");
            window.location.href = "index.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("Failed, Try Again");
            window.location.href = "index.php";
        </script>
        <?php
    }
}
?>