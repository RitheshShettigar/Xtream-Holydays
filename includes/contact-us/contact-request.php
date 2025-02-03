<?php
    include "config.php";


 if(ISSET($_REQUEST['submit']))
 {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $contact=$_REQUEST['contact'];
    $date=$_REQUEST['date'];
    $message=$_REQUEST['message'];
    $url=$_REQUEST['url'];
    $status=0;
 
    $sql_ins="INSERT INTO contact_request (`name`, `email`, `contact`, `date`, `status`, `message`)  VALUES('$name', '$email', '$date', '$contact', $status, '$message')";
    if($rs=mysqli_query($con, $sql_ins))
    {
        $to = "askme@xtreamholiday.com, y.vikassharma@gmail.com"; // my email address
        $from = $_POST['email']; // from (my email)
        
        $headers = "From: " . $from . "\r\n";
        
        $subject = "New Contact Info From Website xtreamholiday.com";
        $body = "Name: " . $name ."\r\n"."Contact: ". $contact ."\r\n"."Email Id: ".$email."\r\n"."Date: " . $date ."\r\n"."Message: ".$message;
        
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
                alert("There was a problem with your e-mail (<?php echo $url; ?>)");
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