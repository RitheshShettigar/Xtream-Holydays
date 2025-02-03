<?php
    include ("../includes/contact-us/config.php");


 if(ISSET($_REQUEST['submit']))
 {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $mobile=$_REQUEST['mobile'];
    $persons=$_REQUEST['persons'];
    $message=$_REQUEST['message'];
    $url=$_REQUEST['url'];
    $status=0;
    
  
 
     $sql_ins="INSERT INTO  package_offer (`name`, `email`, `mobile`, `persons`, `status`, `message`) 
            VALUES('$name', '$email', '$mobile', '$persons', $status, '$message' )";
    if($rs=mysqli_query($con, $sql_ins))
    {
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