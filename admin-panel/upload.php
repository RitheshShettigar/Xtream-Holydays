<?php include ("config.php");
	session_start();

if($_SESSION['emp_id'])
	{
        $temp = explode(".", $_FILES["profile_pic"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        

		if(move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "dist/images/employee/" . $newfilename))
		{
            $upd = "UPDATE emp_master set profile_pic = '$newfilename' WHERE id = '$_SESSION[emp_id]'";
            if(mysqli_query($con, $upd))
            {
                ?>
                <script>
                    alert('success');
                    window.location.href = "edit-profile.php";
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                        alert('Try Again!');
                        window.location.href = "edit-profile.php";
                </script>
                <?php
            }
		}
        else
        {
            ?>
            <script>
                 alert('Try Again.');
                 window.location.href = "edit-profile.php";
            </script>
            <?php
        }
	}
?>



