<?php
    include "../contact-us/config.php";

 if(ISSET($_REQUEST['submit']))
 {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $std_code=$_REQUEST['std_code'];
    $contact=$_REQUEST['contact'];
    
    $contact2 = $std_code.'-'.$contact;
    $place = $_REQUEST['location'];
    $place1=$_REQUEST['place'];
    
    $location = $place.','.$place1;
    $check_in_date=$_REQUEST['check_in_date'];
    $check_out_date=$_REQUEST['check_out_date'];
    $no_of_persons=$_REQUEST['no_of_persons'];
    $currancy=$_REQUEST['currancycode'];
    $budget=$_REQUEST['budget'];
    
    $budget2 = $currancy.''.$budget;
    
    $vegetables=$_REQUEST['vegetables'];
    $fruits=$_REQUEST['fruits'];
    $nuts=$_REQUEST['nuts'];
    $meat=$_REQUEST['meat'];
    $fish=$_REQUEST['fish'];
    $dairy=$_REQUEST['dairy'];
    $eggs=$_REQUEST['eggs'];
    $stay_ty=$_REQUEST['stay_ty'];
    $tour_ty=$_REQUEST['tour_ty'];
    $visa=$_REQUEST['visa'];
    $travel_insurance=$_REQUEST['travel_insurance'];
    $bus=$_REQUEST['bus'];
    $flight=$_REQUEST['flight'];
    $health_issues=$_REQUEST['health_issues'];
    $message=$_REQUEST['message'];
    $url=$_REQUEST['url'];
    $status=0;

    $food='';
    if($vegetables)
    {
        $food .= $vegetables.',';
    }
    if($fruits)
    {
        $food .= $fruits.',';
    }
    if($nuts)
    {
        $food .= $nuts.',';
    }
    if($meat)
    {
        $food .= $meat.',';
    }
    if($fish)
    {
        $food .= $fish.',';
    }
    if($dairy)
    {
        $food .= $dairy.',';
    }
    if($eggs)
    {
        $food .= $eggs.',';
    }
    $travel_type='';
    if($bus){
        $travel_type .=$bus.',';
    }
    if($flight){
        $travel_type .=$flight.',';
    }
   $sql_ins="INSERT INTO customize_package (`currency`, `country_code`, `name`, `email`, `contact`, `location`, `check_in_date`, `check_out_date`, `no_of_persons`,`budget`, `vegetables`,`fruits`,`nuts`,`meat`,`fish`,`dairy`,`eggs`, `stay_ty`, `tour_ty`, `visa`, `travel_insurance`, `bus`, `flight` , `health_issues`, `status`, `message`) 
     VALUES ('$currancy', '$std_code', '$name', '$email', '$contact', '$location', '$check_in_date', '$check_out_date', '$no_of_persons', '$budget', '$vegetables', '$fruits', '$nuts', '$meat', '$fish', '$dairy', '$eggs', '$stay_ty', '$tour_ty', '$visa', '$travel_insurance', '$bus', '$flight', '$health_issues',  $status, '$message')";
    if($rs=mysqli_query($con, $sql_ins))
    {
        $to = "askme@xtreamholiday.com, y.vikassharma@gmail.com, thejaswinigowda68@gmail.com"; // my email address
        $from = $_POST['email']; // from (my email)
        
        $headers = "From: " . $from . "\r\n";
        
        $subject = "Customize Tour Package xtreamholiday.com";
        $body = "Name: " . $name ."\r\n"."Contact: ". $contact2 ."\r\n"."Email Id: ".$email."\r\n"."Location: " . $location ."\r\n". "Check in Date: " . $check_in_date ."\r\n". "Check out Date: " . $check_out_date ."\r\n". "Number of persons: " . $no_of_persons ."\r\n". "Budget: " . $budget2 ."\r\n". "Food Type: " . $food ."\r\n". "Type of Stay: " . $stay_ty ."\r\n". "Type of tour: " . $tour_ty ."\r\n". "Having visa: " . $visa ."\r\n". "Having travel insurance: " . $travel_insurance ."\r\n". "Travel Type: " . $travel_type ."\r\n". "Health issues: " . $health_issues ."\r\n"."Message: ".$message;
        
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
                window.location.href = "<?php echo $url; ?>";
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
            window.location.href = "<?php echo $email; ?>";
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