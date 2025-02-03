<?php 
    include("config.php");

    if(ISSET($_REQUEST['submit']))
    {
        $uid = time();
        $date = $_REQUEST['date'];
        $cust_id = $_REQUEST['cust_details'];
        $bank_id = $_REQUEST['bank_details'];
        $company_id = $_REQUEST['comp_details'];
        $description = $_REQUEST['desc'];
        $amount = $_REQUEST['amount'];
        $sgst = $_REQUEST['sgst'];
        $cgst = $_REQUEST['cgst'];
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
            window.location.href="bill.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("Failed, Try Again");
            window.location.href="bill.php";
        </script>
        <?php
    }
?>