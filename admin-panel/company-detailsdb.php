<?php include("config.php"); 

    if(isset($_REQUEST['submit']))
    {
        $gst_no = trim(strtoupper($_REQUEST['gst_no']));
        $firm_name = trim(ucwords(strtolower($_REQUEST['firm_name'])));
        $state_name = trim(ucwords(strtolower($_REQUEST['state_name'])));
        $pan_no = trim(strtoupper($_REQUEST['pan_no']));
        $address = $_REQUEST['address'];
        $tagline = $_REQUEST['tagline'];
        $contact = str_replace(' ', '', $_REQUEST['call']);
        $alternate = str_replace(' ', '', $_REQUEST['acall']);
        $email_id = str_replace(' ', '', $_REQUEST['email_id']);

            $statusMsg = '';

            //file upload path
            $targetDir = "dist/images/logo/";
            $uid = time();
            $fileName = $uid.'_'.basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            
            if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
                //allow certain file formats
                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                if(in_array($fileType, $allowTypes)){
                    //upload file to server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        $statusMsg = "The file ".$fileName. " has been uploaded.";
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                }else{
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                }
            }else{
                $statusMsg = 'Please select a file to upload.';
            }
            
            //display status message
            echo $statusMsg;
        
        $company = "INSERT INTO company_details (`img`, `address`, `tagline`, `gst_no`, `firm_name`, `contact_no`, `alternate_no`, `email_id`, `state_name`, `pan_no`) VALUES('$fileName', '$address', '$tagline', '$gst_no', '$firm_name', '$contact', '$alternate', '$email_id', '$state_name', '$pan_no')";
        if($company_rs = mysqli_query($con, $company))
        {
            ?>
            <script>
                alert("Company Details Added Successfully");
                window.location.href = "company-details.php";
            </script>
            <?php
        }
        
        else
        {
            ?>
            <script>
                alert("Failed");
                window.location.href = "company-details.php";
            </script>
            <?php
        }

    }
    else if(isset($_REQUEST['update']))
    {
        $gst_no = trim(strtoupper($_REQUEST['gst_no']));
        $firm_name = trim(ucwords(strtolower($_REQUEST['firm_name'])));
        $state_name = trim(ucwords(strtolower($_REQUEST['state_name'])));
        $pan_no = trim(strtoupper($_REQUEST['pan_no']));
        $id=$_REQUEST['id'];

         $comp_upd= "update company_details set `gst_no`='$gst_no', `firm_name`='$firm_name', `state_name`='$state_name', `pan_no`='$pan_no'  where id='$id'";
        if($comp_upd_rs = mysqli_query($con, $comp_upd))
        {
            ?>
            <script>
                alert("Company Details Updated Successfully");
                window.location.href = "company-details.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Company Details Update Failed");
                window.location.href = "company-details.php";
            </script>
            <?php
        }

    }
    else if(isset($_REQUEST['delete']))
    {
        
        $id=$_REQUEST['id'];
        $fet = "select * from company_details where id='$id'";
        $fet_rs = mysqli_query($con, $fet);
        $fet_arr = mysqli_fetch_array($fet_rs);

        $status = $fet_arr['status'];
        if($status == 1)
        {
            $status_up = 0;
        }
        else
        {
            $status_up = 1;
        }

        $comp_upd1= "update company_details set `status`='$status_up' where id='$id'";
        if($comp_rs1 = mysqli_query($con, $comp_upd1))
        {
            ?>
            <script>
                alert("Company Details Removed");
                window.location.href = "company-details.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Not Deleted");
                window.location.href = "company-details.php";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert("Invalid Command Failed");
            window.location.href = "company-details.php";
        </script>
        <?php
    }
?>