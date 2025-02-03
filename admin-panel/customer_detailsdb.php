<?php include("config.php"); 

    if(isset($_REQUEST['submit']))
    {
        $person_name = trim(ucwords(strtolower($_REQUEST['person_name'])));
        $contact = $_REQUEST['contact'];
        $email = $_REQUEST['email'];
        $firm_name = trim(ucwords(strtolower($_REQUEST['firm_name'])));
        $gst_no = trim(strtoupper($_REQUEST['gst_no']));
        $state = $_REQUEST['state'];
        $address = $_REQUEST['address'];

        $cust = "INSERT INTO customer_details (`person_name`, `contact`, `email`, `firm_name`, `gst_no`, `state`, `address`) VALUES('$person_name', '$contact', '$email', '$firm_name', '$gst_no', '$state', '$address')";
        if($cust_rs = mysqli_query($con, $cust))
        {
            ?>
            <script>
                alert("Customer Inserted Successfully");
                window.location.href = "customer-details.php";
            </script>
            <?php
        }
        
        else
        {
            ?>
            <script>
                alert("Failed");
                window.location.href = "customer-details.php";
            </script>
            <?php
        }

    }
    else if(isset($_REQUEST['update']))
    {
        $person_name = trim(ucwords(strtolower($_REQUEST['person_name'])));
        $contact = $_REQUEST['contact'];
        $email = $_REQUEST['email'];
        $firm_name = trim(ucwords(strtolower($_REQUEST['firm_name'])));
        $gst_no = trim(strtoupper($_REQUEST['gst_no']));
        $state = $_REQUEST['state'];
        $address = $_REQUEST['address'];
        $id=$_REQUEST['id'];

        $cust_upd= "update customer_details set `person_name`='$person_name', `contact`='$contact', `email`='$email', `firm_name`='$firm_name', `gst_no`='$gst_no', `state`='$state', `address`='$address' where id='$id'";
        if($cust_rs = mysqli_query($con, $cust_upd))
        {
            ?>
            <script>
                alert("Customer Updated Successfully");
                window.location.href = "customer-details.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Customer Updated Failed");
                window.location.href = "customer-details.php";
            </script>
            <?php
        }

    }
    else if(isset($_REQUEST['delete']))
    {
        
        $id=$_REQUEST['id'];
        $fet = "select * from customer_details where id='$id'";
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

        $cust_upd= "update customer_details set `status`='$status_up' where id='$id'";
        if($cust_rs = mysqli_query($con, $cust_upd))
        {
            ?>
            <script>
                alert("Customer Removed");
                window.location.href = "customer-details.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Not Deleted");
                window.location.href = "customer-details.php";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert("Invalid Command Failed");
            window.location.href = "customer-details.php";
        </script>
        <?php
    }
?>