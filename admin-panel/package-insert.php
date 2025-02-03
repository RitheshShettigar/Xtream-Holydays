<?php include("config.php");

$banner_img = '';
$inside_img = '';
	if(ISSET($_REQUEST['submit']))
    {
        $heading=$_REQUEST['pack_head'];
        $description=$_REQUEST['desc'];
        $destination=$_REQUEST['destination'];
        $currency_type=$_REQUEST['currency_type'];
        $cost=$_REQUEST['cost'];
        $cost_for=$_REQUEST['cost_for'];
        $date=$_REQUEST['daterange'];
        $days=$_REQUEST['days'];
        $nights=$_REQUEST['nights'];
        // $banner_image=$_REQUEST['banner_image'];
        // $inside_image=$_REQUEST['inside_image'];

        if($_FILES['banner_image'])
        {
            $errors= array();
            $uid = time();
            $file_name = $uid.$_FILES['banner_image']['name'];
            $file_size =$_FILES['banner_image']['size'];
            $file_tmp =$_FILES['banner_image']['tmp_name'];
            $file_type=$_FILES['banner_image']['type'];
            $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);
            // $file_ext=strtolower(end(explode('.',$_FILES['banner_image']['name'])));

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false)
            {
                $errors[]="extension not allowed, please choose a JPEG / JPG or PNG file.";
            }

            if($file_size > 2097152)
            {
                $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true)
            {
                move_uploaded_file($file_tmp,"dist/images/packages/".$file_name);
                //echo "Success";
            }
            else
            {
                // print_r($errors);
            }
        }

        
        if($_FILES['inside_image'])
        {
            $errors1= array();
            $uid1 = time();
            $file_name1 = $uid.$_FILES['inside_image']['name'];
            $file_size1 =$_FILES['inside_image']['size'];
            $file_tmp1 =$_FILES['inside_image']['tmp_name'];
            $file_type1=$_FILES['inside_image']['type'];
            // $file_ext1=strtolower(end(explode('.',$_FILES['inside_image']['name'])));
            
            $file_ext1=pathinfo($file_name1, PATHINFO_EXTENSION);
            $extensions1= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions1)=== false)
            {
                $errors1[]="extension not allowed, please choose a JPEG / JPG or PNG file.";
            }

            if($file_size1 > 2097152)
            {
                $errors1[]='File size must be excately 2 MB';
            }

            if(empty($errors1)==true)
            {
                move_uploaded_file($file_tmp1,"dist/images/packages/".$file_name1);
                //echo "Success";
            }
            else
            {
                // print_r($errors);
            }
            
        }
        
        $date1 = (explode("-",$date));
        $fdate=date('Y-m-d', strtotime($date1[0]));
        $tdate=date('Y-m-d', strtotime($date1[1]));
        $description = str_replace("'","&#39;",$description);
        $description = str_replace('"','&#34;',$description);
        $description = str_replace("`","&#96;",$description);

        
        $heading = str_replace("'","&#39;",$heading);
        $heading = str_replace('"','&#34;',$heading);
        $heading = str_replace("`","&#96;",$heading);
        
        $destination = str_replace("'","&#39;",$destination);
        $destination = str_replace('"','&#34;',$destination);
        $destination = str_replace("`","&#96;",$destination);

       $sql_ins = "INSERT INTO package_master(`heading`, `description`, `destination`, `currency_type`, `cost`, `cost_for`, `fdate`, `tdate`, `days`, `nights`, `banner_image`, `inside_image`) VALUES ('$heading', '$description', '$destination', '$currency_type', '$cost', '$cost_for', '$fdate', '$tdate', '$days', '$nights', '$file_name', '$file_name1')";

        if($rs = mysqli_query($con, $sql_ins ))
        {
            ?>
            <script>
                alert("Success");
                window.location.href="package-new.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Failed");
                window.location.href="package-new.php";
            </script>
            <?php
        }
        
    }
    else if(ISSET($_REQUEST['update_package']))
    {
        $id = $_REQUEST['id'];
        $heading=$_REQUEST['pack_head'];
        $description=$_REQUEST['desc'];
        $destination=$_REQUEST['destination'];
        $currency_type=$_REQUEST['currency_type'];
        $cost=$_REQUEST['cost'];
        $cost_for=$_REQUEST['cost_for'];
        $date=$_REQUEST['daterange'];
        $days=$_REQUEST['days'];
        $nights=$_REQUEST['nights'];
        
        if($_FILES['inside_image'])
        {
            $errors1= array();
            $uid1 = time();
            $file_name1 = $uid1.$_FILES['inside_image']['name'];
            $file_size1 =$_FILES['inside_image']['size'];
            $file_tmp1 =$_FILES['inside_image']['tmp_name'];
            $file_type1=$_FILES['inside_image']['type'];
            // $file_ext1=strtolower(end(explode('.',$_FILES['inside_image']['name'])));
            
            $file_ext1=pathinfo($file_name1, PATHINFO_EXTENSION);
            $extensions1= array("jpeg","jpg","png");

            if(in_array($file_ext1,$extensions1)=== false)
            {
                $errors1[]="extension not allowed, please choose a JPEG / JPG or PNG file.";
            }

            if($file_size1 > 2097152)
            {
                $errors1[]='File size must be excately 2 MB';
            }

            if(empty($errors1)==true)
            {
                move_uploaded_file($file_tmp1,"dist/images/packages/".$file_name1);
                $inside_img = ", inside_image='$file_name1'";
                //echo "Success";
            }
            else
            {
                // print_r($errors);
            }
            
        }
        
        if($_FILES['banner_image'])
        {
            $errors= array();
            $uid = time();
            $file_name = $uid.$_FILES['banner_image']['name'];
            $file_size =$_FILES['banner_image']['size'];
            $file_tmp =$_FILES['banner_image']['tmp_name'];
            $file_type=$_FILES['banner_image']['type'];
            $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);
            // $file_ext=strtolower(end(explode('.',$_FILES['banner_image']['name'])));

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false)
            {
                $errors[]="extension not allowed, please choose a JPEG / JPG or PNG file.";
            }

            if($file_size > 2097152)
            {
                $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true)
            {
                move_uploaded_file($file_tmp,"dist/images/packages/".$file_name);
                $banner_img = ", banner_image='$file_name'";
                //echo "Success";
            }
            else
            {
                // print_r($errors);
            }
        }

        
        $date1 = (explode("-",$date));
        $fdate=date('Y-m-d', strtotime($date1[0]));
        $tdate=date('Y-m-d', strtotime($date1[1]));

        $description = str_replace("'","&#39;",$description);
        $description = str_replace('"','&#34;',$description);
        $description = str_replace("`","&#96;",$description);

        
        $heading = str_replace("'","&#39;",$heading);
        $heading = str_replace('"','&#34;',$heading);
        $heading = str_replace("`","&#96;",$heading);
        
        $destination = str_replace("'","&#39;",$destination);
        $destination = str_replace('"','&#34;',$destination);
        $destination = str_replace("`","&#96;",$destination);
        
        $package_upd = "update package_master set heading='$heading', description='$description', destination='$destination', currency_type='$currency_type', cost='$cost', cost_for='$cost_for', fdate='$fdate', tdate='$tdate', days='$days', nights='$nights' 
        $banner_img $inside_img where id='$id'";
        if($package_upd_rs = mysqli_query($con, $package_upd))
        {
            ?>
                <script>
                    alert("Package Updated Successfully.");
                    window.location.href="package-view.php?id=<?php echo $id; ?>&view=0";
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert("Package Not Updated! Try Again.");
                    window.location.href="package-view.php?id='<?php echo $id; ?>'";
                </script>
            <?php
        }

    }
    else
    {
        ?>
        <script>
            alert("Technical Error");
            window.location.href="package-report.php";
        </script>
        <?php
    }
?>