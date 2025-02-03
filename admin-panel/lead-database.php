<?php 
include("config.php");

if(ISSET($_REQUEST['submit']))
{
        session_start();                  
    $cp_name = $_REQUEST['cp_name'];
    $cp_number = $_REQUEST['cp_number'];
    $cp_anumber = $_REQUEST['cp_anumber'];
    $cp_email = $_REQUEST['cp_email'];
    $cp_aemail = $_REQUEST['cp_aemail'];
    $website = $_REQUEST['website'];
    $location = $_REQUEST['location'];
    $query = $_REQUEST['query'];
    $comment = $_REQUEST['comment'];
    $date = $_REQUEST['date'];
    $follow_updt = $_REQUEST['follow_update'];
    
    $follow_uptime = $_REQUEST['follow_uptime'];
    $follow_update = $follow_updt.'T'.$follow_uptime;
    $sql_ins = "INSERT into leads (`cp_name`, `cp_number`, `cp_anumber`, `cp_email`, `cp_aemail`, `website`, `location`, `query`, `comment`, `date`, `follow_update`, `following_by`) VALUES  ('$cp_name', '$cp_number', '$cp_anumber', '$cp_email', '$cp_aemail', '$website', '$location', '$query', '$comment', '$date', '$follow_update', '$_SESSION[userid]')";

    if($sql_rs = mysqli_query($con, $sql_ins))
    {
        ?>
        <script>
            alert("Success");
            window.location.href = "lead.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("Failed, Try Again!");
            window.location.href = "lead.php";
        </script>
        <?php
    }

}
else
{
    ?>
    <script>
        alert( "Try Again!");
        window.location.href = "lead.php";
    </script>
    <?php
}



?>
