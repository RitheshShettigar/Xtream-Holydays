<?php include("config.php"); 
session_start();

if(ISSET($_REQUEST['submit']))
{
    $contact_id = $_REQUEST['id'];
    $status = $_REQUEST['status'];
    $comment = $_REQUEST['comment'];
    $date1 = $_REQUEST['date1'];
    $added_by = $_SESSION['userid'];

    $contact_ins = "INSERT INTO contact_status(`contact_id`, `status`, `comment`, `followup_date`, `added_by`)VALUES('$contact_id', '$status', '$comment', '$date1', '$added_by')";
    if($contact_rs = mysqli_query($con, $contact_ins))
    
    {
        ?>
        <script>
            alert("Success");
           window.location.href = "lead-website.php";
        </script>
        <?php
    }
    else
    {
        
        ?>
        <script>
            alert("Failed!");
            window.location.href = "lead-website.php";
        </script>
        <?php
        
    }
}
else
{
    
    ?>
    <script>
        alert("Try Again!");
        window.location.href = "lead-website.php";
    </script>
    <?php
    
}

?>