<?php include("config.php"); 

    if(isset($_REQUEST['submit']))
    {
        $acc_holder_name = trim(ucwords(strtolower($_REQUEST['acc_holder_name'])));
        $bank_name = trim(ucwords(strtolower($_REQUEST['bank_name'])));
        $branch_name = trim(ucwords(strtolower($_REQUEST['branch_name'])));
        $acc_no = $_REQUEST['acc_no'];
        $ifsc_code = trim(strtoupper($_REQUEST['ifsc_code']));
        $acc_type = trim(ucwords(strtolower($_REQUEST['acc_type'])));

        $bank = "INSERT INTO bank_details (`acc_holder_name`, `bank_name`, `branch_name`, `acc_no`, `ifsc_code`, `acc_type`) VALUES('$acc_holder_name', '$bank_name', '$branch_name', '$acc_no', '$ifsc_code', '$acc_type')";
        if($bank_rs = mysqli_query($con, $bank))
        {
            ?>
            <script>
                alert("Bank Details Added Successfully");
                window.location.href = "Bank-details.php";
            </script>
            <?php
        }
        
        else
        {
            ?>
            <script>
                alert("Failed");
                window.location.href = "Bank-details.php";
            </script>
            <?php
        }

    }
    else if(isset($_REQUEST['update']))
    {
        $acc_holder_name = trim(ucwords(strtolower($_REQUEST['acc_holder_name'])));
        $bank_name = trim(ucwords(strtolower($_REQUEST['bank_name'])));
        $branch_name = trim(ucwords(strtolower($_REQUEST['branch_name'])));
        $acc_no = $_REQUEST['acc_no'];
        $ifsc_code = trim(strtoupper($_REQUEST['ifsc_code']));
        $acc_type = trim(ucwords(strtolower($_REQUEST['acc_type'])));
        $id=$_REQUEST['id'];

         $bank_upd= "update bank_details set `acc_holder_name`='$acc_holder_name', `bank_name`='$bank_name', `branch_name`='$branch_name', `acc_no`='$acc_no', `ifsc_code`='$ifsc_code', `acc_type`='$acc_type' where id='$id'";
        if($bank_upd_rs = mysqli_query($con, $bank_upd))
        {
            ?>
            <script>
                alert("Bank Details Updated Successfully");
                window.location.href = "Bank-details.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Bank Details Update Failed");
                window.location.href = "Bank-details.php";
            </script>
            <?php
        }

    }
    else if(isset($_REQUEST['delete']))
    {
        
        $id=$_REQUEST['id'];
        $fet = "select * from bank_details where id='$id'";
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

        $bank_upd1= "update bank_details set `status`='$status_up' where id='$id'";
        if($bank_rs = mysqli_query($con, $bank_upd1))
        {
            ?>
            <script>
                alert("Bank Removed");
                window.location.href = "Bank-details.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Not Deleted");
                window.location.href = "Bank-details.php";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert("Invalid Command Failed");
            window.location.href = "Bank-details.php";
        </script>
        <?php
    }
?>