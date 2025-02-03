<?php 
    include("config.php");

    if(ISSET($_REQUEST['submit']))
    {

        $bil = "select * from bills where status = 0 and id = '$_REQUEST[bill_id]'";
        $bil_rs = mysqli_query($con, $bil);
        if($bil_arr = mysqli_fetch_array($bil_rs))
        {
            $upd = "update bills set status = 1 where uid = '$bil_arr[uid]'";
            $upd = mysqli_query($con, $upd);
        }

        

        $uid = time();
        $date = $_REQUEST['date'];
        $cust_id = $_REQUEST['cust_details'];
        $bank_id = $_REQUEST['bank_details'];
        $company_id = $_REQUEST['comp_details'];
        $description = $_REQUEST['desc'];
        $amount = $_REQUEST['amount'];
        
        $cgst = $_REQUEST['cgst'];
        $sgst = $_REQUEST['sgst'];
        $igst = $_REQUEST['igst'];
        $other_tax = $_REQUEST['other_tax'];
        
        $cnt = 0;
        for($i=0;$i<count($description);$i++)
        {
            if($description[$i])
            {
                $sql_ins = "INSERT INTO bills (`uid`, `date`, `cust_id`, `bank_id`, `company_id`, `description`, `amount`, `cgst`, `sgst`, `igst`, `other_tax`) VALUES('$uid', '$date', '$cust_id', '$bank_id', '$company_id', '$description[$i]', '$amount[$i]', '$cgst[$i]', '$sgst[$i]', '$igst[$i]', '$other_tax[$i]')";
                if($sql_rs = mysqli_query($con, $sql_ins))
                {
                    $cnt++;
                }
            }
        }
        ?>
        <script>
            alert("<?php echo $cnt; ?> Records Added");
            window.location.href="bill-report.php";
        </script>
        <?php
    }
    else if($_REQUEST['delete'])
    {
        $del = "update bills set status = 1 where uid = '$_REQUEST[id]'";
        if($del_rs = mysqli_query($con, $del))
        {
            ?>
                <script>
                    alert("Record Removed");
                    window.location.href="bill-report.php";
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert("Failed");
                    window.location.href="bill-report.php";
                </script>
            <?php
        }
        
    }
    else
    {
        ?>
        <script>
            alert("Failed, Try Again");
            window.location.href="bill-report.php";
        </script>
        <?php
    }
?>