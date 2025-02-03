<?php 
    include("config.php");

    if(ISSET($_REQUEST['submit']))
    {
        $package_id = $_REQUEST['package_id'];
        $type = $_REQUEST['type'];
        // $details3 = str_replace("'", "&#39;", $_REQUEST['details']);
        // $details2 = str_replace('"', '&#34;', $details3);
        // $details = str_replace("`", "&#96;", $details2);
        
        // $details = "<pre>". $_REQUEST['details']. "</pre>";
        // print_r($details);
        $details = filter_var(htmlentities($_REQUEST['details']), FILTER_SANITIZE_STRING);

        $chk = "select * from package_details where package_id='$package_id' and type='$type'";
        $chk_rs = mysqli_query($con, $chk);
        if($chk_arr = mysqli_fetch_array($chk_rs))
        {
           $sql_ins ="update package_details set details = '$details' where id ='$chk_arr[id]'";        
        }
        else
        {
            $sql_ins = "INSERT INTO package_details(`package_id`, `type`, `details`) VALUES('$package_id', '$type', '$details')";
        }
        if($sql_rs = mysqli_query($con, $sql_ins))
        {
            ?>
            <script>
                alert("Package Details Added Successfully");
                window.location.href = "package-extra-details.php?id=<?php echo $package_id; ?>";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Failed, Try Again");
                // window.location.href = "package-extra-details.php?id=<?php echo $package_id; ?>";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert("Failed");
            // window.location.href = "package-extra-details.php";
        </script>
        <?php
    }
?>
