<?php
     include "../contact-us/config.php";


 if(ISSET($_REQUEST['submit']))
 {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $mobile=$_REQUEST['mobile'];
    $ty_stay=$_REQUEST['ty_stay'];
    $persons=$_REQUEST['persons'];
    $days=$_REQUEST['days'];
    $arrival=$_REQUEST['arrival'];
    $departure=$_REQUEST['departure'];
    $cat=$_REQUEST['cat'];
    $check_in_dt=$_REQUEST['check_in_dt'];
    $check_out_dt=$_REQUEST['check_out_dt'];
    $travel_ty=$_REQUEST['travel_ty'];
    $budget=$_REQUEST['budget'];
    $message=$_REQUEST['message'];
    $url=$_REQUEST['url'];
    $status=0;
    
    if($email)
    {
        
    }
    else
    {
        $email = 'noreply@xtreamholiday.com';
    }
 
    $sql_ins="INSERT INTO  tour_request (`name`, `email`, `mobile`, `ty_stay`, `persons`, `days`, `arrival`, `status`,
            `departure`, `cat`, `check_in_dt`, `check_out_dt`, `travel_ty`, `budget`, `message`) 
            VALUES('$name', '$email', '$mobile', '$ty_stay', '$persons', '$days', '$arrival', $status, '$departure', 
            '$cat', '$check_in_dt', '$check_out_dt', '$travel_ty', '$budget', '$message' )";
    if($rs=mysqli_query($con, $sql_ins))
    {
        $to = "askme@xtreamholiday.com, y.vikassharma@gmail.com"; // my email address
        $from = $email; // from (my email)
        
        $headers = "From: " . $from . "\r\n";
        
        $subject = "New Contact Info From Website xtreamholiday.com";
        $body = "Name: " . $name ."\r\n"."Contact: ". $mobile ."\r\n"."Email Id: ".$email."\r\n"."Type of Stay: " . $ty_stay ."\r\n"."Persons: " . $persons ."\r\n"."Days: " . $days ."\r\n"."Arrival: " . $arrival  ."\r\n"."Departure: " . $departure ."\r\n"."Category: " . $cat ."\r\n"."Check In Date: " . $check_in_dt ."\r\n"."Check Out Date: " . $check_out_dt ."\r\n"."Travel Type: " . $travel_ty  ."\r\n"."Budget: " . $budget ."\r\n"."Message: ".$message;
        
        if( filter_var($email, FILTER_VALIDATE_EMAIL) )
        {
            if (mail($to, $subject, $body, $headers, "-f " . $from))
            {
                $filename=$_SERVER["PHP_SELF"];
                //echo 'Your e-mail (' . $_POST['email'] . ') has been added to our mailing list!';
                ?>
                <script>
                alert("Thank you! Our Executive will be get back to you soon");
                window.location.href = "<?php echo $url; ?>";
                </script>
                <?php
            }
            else
            {
                  //echo 'There was a problem with your e-mail ($_POST['email'])';
                ?>
                <script>
                alert("There was a problem with your e-mail (<?php echo $email; ?>)");
                </script>
                <?php  
            }
        } 
        else
        {
            ?>
            <script>
                alert('Email Error, Try Again');
                // window.location.href="<?php echo $url; ?>";
            </script>
            <?php
        }
    }   
    else
    {
        ?>
        <script>
            alert('Try Again');
            window.location.href="<?php echo $url; ?>";
        </script>
        <?php
    }
}
?>