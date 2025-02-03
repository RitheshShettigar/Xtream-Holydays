<?php 
    include ("config.php"); 

    session_start();

    $name = $_REQUEST['name'];
    $contact = $_REQUEST['contact'];
    $email = $_REQUEST['email'];
    $position = $_REQUEST['position'];
    $dob = $_REQUEST['dob'];
    $address = $_REQUEST['address'];
    $gender = $_REQUEST['gender'];
    $bg = $_REQUEST['bg'];
    $id_type = $_REQUEST['id_type'];
    $id_no = $_REQUEST['id_no'];
    $bank_holder = $_REQUEST['bank_holder'];
    $bank_name = $_REQUEST['bank_name'];
    $bank_ac_no = $_REQUEST['bank_ac_no'];
    $ifsc = $_REQUEST['ifsc'];
    
    
    $sql = "SELECT * from emp_master WHERE user_id = '$_SESSION[userid]'";
    $rs = mysqli_query($con, $sql);
    $rs_arr = mysqli_fetch_array($rs);

    if($_FILES["id_file"])
    {
        $id_file = $rs_arr['id_file'];
    }
    else
    {
        $temp = explode(".", $_FILES["id_file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        

		if(move_uploaded_file($_FILES["id_file"]["tmp_name"], "dist/images/employee/" . $newfilename))
		{
            $id_file = $newfilename;
        }
        else
        {
            ?>
            <script>
             alert(" ID File not uploaded");
            </script>
            <?php
        }

    }
    if($_FILES["bank_file"])
    {
        $bank_file = $rs_arr['bank_file'];
    }
    else
    {
        $temp1 = explode(".", $_FILES["bank_file"]["name"]);
        $newfilename1 = round(microtime(true)) . '.' . end($temp1);
        

		if(move_uploaded_file($_FILES["bank_file"]["tmp_name"], "dist/images/employee/" . $newfilename1))
		{
            $bank_file = $newfilename1;
        }
        else
        {
            ?>
            <script>
             alert("Bank File not uploaded");
            </script>
            <?php
        }

    }

    $upd = "UPDATE emp_master SET name = '$name', contact = '$contact', email = '$email', position = '$position', dob = '$dob', address = '$address', gender = '$gender', bg = '$bg', id_type = '$id_type', id_no = '$id_no', id_file = '$id_file', bank_holder = '$bank_holder', bank_name = '$bank_name', bank_ac_no = '$bank_ac_no', ifsc = '$ifsc', bank_file = '$bank_file' WHERE user_id = '$_SESSION[userid]'"; 

    if($upd_rs = mysqli_query($con, $upd))
    {
        ?>
        <script>
            alert("success");
            window.location.href="edit-profile.php";
         </script>
         <?php
        
    }
  else
  {
    ?>
    <script>
        alert("Try Again!");
        window.location.href="edit-profile.php";
     </script>
     <?php
  }

?>

