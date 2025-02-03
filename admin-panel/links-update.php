<?php 

    include("config.php");
    session_start();
    $user_id = $_SESSION['userid'];
    $emp_id = $_SESSION['emp_id'];

if(ISSET($_REQUEST['submit']))
{
    $facebook = $_REQUEST['facebook'];
    $instagram = $_REQUEST['instagram'];
    $linkedin = $_REQUEST['linkedin'];
    $twitter = $_REQUEST['twitter'];

    $chk = "SELECT * from social_media WHERE user_id = '$user_id' AND emp_id = '$emp_id'";
    $rs = mysqli_query($con, $chk);
    if($rs_arr = mysqli_fetch_array($rs))
    {
        $sql = "UPDATE social_media set facebook = '$facebook', instagram = '$instagram', linkedin = '$linkedin', twitter = '$twitter' WHERE user_id = '$user_id' AND emp_id = '$emp_id' ";
    }
    else
    {
        $sql="INSERT INTO social_media (`emp_id`, `user_id`,`facebook`, `instagram`, `linkedin`, `twitter`) VALUES ('$emp_id', '$user_id', '$facebook', '$instagram', '$linkedin', '$twitter')";
    }
    
    if(mysqli_query($con, $sql))
    {
        ?>
        <script>
            alert("Success");
            window.location.href = "edit-profile.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("Try Again!");
           window.location.href = "edit-profile.php";
        </script>
        <?php
    }

}
?>