<?php
    include "config.php";
    error_reporting(0);

if(ISSET($_REQUEST['submit']))
{
    $sql_chk = "SELECT * from user WHERE mobile='$_REQUEST[contact]' OR email='$_REQUEST[email]'";
    $sql_chk_rs = mysqli_query($con, $sql_chk);
    if($sql_chk_arr = mysqli_fetch_array($sql_chk_rs))
    {
        ?>
        <script>
            alert('Email / Mobile number already exists');
            window.location.href="employee-master.php";
        </script>
        <?php
    }
    else
    {

        
        $emp_code=$_REQUEST['emp_code'];
        $emp_cat=$_REQUEST['emp_cat'];
        $name=$_REQUEST['name'];
        $contact=$_REQUEST['contact'];
        $email=$_REQUEST['email'];
        $position=$_REQUEST['position'];
        $cat=$_REQUEST['cat'];
        $address=$_REQUEST['address'];
        $bg=$_REQUEST['bg'];
        $dob=$_REQUEST['dob'];
        $doj=$_REQUEST['doj'];
        $gender=$_REQUEST['gender'];
        $id_type=$_REQUEST['id_type'];
        $id_no=$_REQUEST['id_no'];
        $bank_holder=$_REQUEST['bank_holder'];
        $bank_name=$_REQUEST['bank_name'];
        $ifsc=$_REQUEST['ifsc'];
        $bank_ac_no=$_REQUEST['bank_ac_no'];
        $url=$_REQUEST['url'];
        if($_FILES['bank_file'])
        {
            $errors= array();
            $uid = time();
            $file_name = $uid.$_FILES['bank_file']['name'];
            $file_size =$_FILES['bank_file']['size'];
            $file_tmp =$_FILES['bank_file']['tmp_name'];
            $file_type=$_FILES['bank_file']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['bank_file']['name'])));

            $extensions= array("jpeg","jpg","png", "pdf", "docx", "doc");

            if(in_array($file_ext,$extensions)=== false)
            {
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 2097152)
            {
                $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true)
            {
                move_uploaded_file($file_tmp,"dist/images/employee/".$file_name);
                //echo "Success";
            }
            else
            {
                print_r($errors);
            }
            
        }
        if($_FILES['id_file'])
        {
            $errors1= array();
            $uid1 = time();
            $file_name1 = $uid1.$_FILES['id_file']['name'];
            $file_size =$_FILES['id_file']['size'];
            $file_tmp =$_FILES['id_file']['tmp_name'];
            $file_type=$_FILES['id_file']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['id_file']['name'])));

            $extensions= array("jpeg","jpg","png", "pdf");

            if(in_array($file_ext,$extensions)=== false)
            {
                $errors1[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 2097152)
            {
                $errors1[]='File size must be excately 2 MB';
            }

            if(empty($errors1)==true)
            {
                move_uploaded_file($file_tmp,"dist/images/employee/".$file_name1);
                // echo "Success";
            }
            else
            {
                print_r($errors1);
            }
        }

        $maxid = "SELECT max(id) as maxid from user";
        $maxid_rs = mysqli_query($con, $maxid);
        $maxid_arr = mysqli_fetch_array($maxid_rs);

        $max_id = $maxid_arr['maxid']+1;

        $sql_ins="INSERT INTO emp_master (`user_id`, `emp_code`, `emp_cat`, `name`, `contact`, `email`, `position`, `address`, `bg`, `dob`,`doj`, `gender`,`id_type`,`id_no`,`id_file`,`bank_holder`,`bank_name`,`ifsc`, `bank_file`, `bank_ac_no`) 
            VALUES ('$max_id', '$emp_code', '$emp_cat', '$name', '$contact', '$email', '$position', '$address', '$bg', '$dob', '$doj', '$gender', '$id_type', '$id_no', '$file_name1', '$bank_holder', '$bank_name', '$ifsc', '$file_name', '$bank_ac_no')";
        if($rs=mysqli_query($con, $sql_ins))
        {
            $pass1 = time().'@'.rand(10,10000);
            $pass = md5($pass1);
            $sql="INSERT INTO user (`name`, `cat`, `username`, `email`, `mobile`, `password`) VALUES ('$name', 'Emp', '$emp_code', '$email', '$contact', '$pass')";
            if(mysqli_query($con, $sql))
            {
                $subject = "Xtream Holiday CRM Crediantials";
                $msg = "Hello $name <br> Welcome to Xtream Holiday, Here is your crediantials for login Xtream Holiday CRM <br> Username: $emp_code <br> Password:$pass1";
                $to = $email;
                if(mail($to, $subject, $msg))
                {
                    ?>
                    <script>
                        alert('Thank you!');
                        window.location.href ="<?php echo $url; ?>";
                    </script>
                    <?php
                }
                else
                {
                    ?>
                    <script>
                        alert('Emp data added. User added. Mail not sent');
                        window.location.href="<?php echo $url; ?>";
                    </script>
                    <?php
            

                }
            }
            else{
                ?>
                <script>
                    alert('Emp data added. User not added. Try again!');
                    window.location.href="<?php echo $url; ?>";
                </script>
                <?php
            }
        }   
        else
        {
            ?>
            <script>
                alert('Try Again.');
                window.location.href="<?php echo $url; ?>";
            </script>
            <?php
        }
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
?>