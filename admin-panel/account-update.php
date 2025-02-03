<?php 
    include("config.php");
        //error_reporting(0);
        session_start();
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $password = md5($_REQUEST['npassword']);
        $opassword = $_REQUEST['opassword'];
        
        $sql = "SELECT * from user WHERE(username = '$username' or email = '$email' or mobile = '$mobile') AND id != '$_SESSION[userid]'"; 
        $rs = mysqli_query($con, $sql);
        if($rs_arr = mysqli_fetch_array($rs))
        {
            ?>
                <script>
                    alert("Details Already Associated with Another Person");
                    window.location.href = "edit-profile.php";
                </script>
            <?php
        }
        else
        {
            if($password)
            {

            }
            else
            {
                $passwod = $opassword;
            }
            $upd = "UPDATE user SET username = '$username',  email = '$email', mobile = '$mobile', password = '$password' WHERE id = '$_SESSION[userid]'"; 

            if($upd_rs = mysqli_query($con, $upd))
            {
                ?>
                <script>
                    alert(" Success ! Updated ");
                    window.location.href="edit-profile.php";
                </script>
                <?php
                
            }
        else
        {
            ?>
            <script>
                alert(" Failed, Try Again!");
                window.location.href="edit-profile.php";
            </script>
            <?php
        }
    }
    
?>
