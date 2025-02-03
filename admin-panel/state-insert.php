<?php
    include("config.php");

    if(isset($_REQUEST['submit']))
    {
        $country_ids = $_REQUEST['country'];
        $state_name= ucwords(strtolower($_REQUEST['state']));
        $state_code = $_REQUEST['statecode'];
        $state_form = strtoupper($_REQUEST['stateform']);

        $sql_country = "SELECT * FROM `state_master` where country_id = '$country_ids' and state_name = '$state_name' and state_code='$state_code' and state_form='$state_form' ";
        $sql_country_rs = mysqli_query($con, $sql_country);
       if($sql_country_arr = mysqli_fetch_array($sql_country_rs))
       {
            ?>
            <script>
                alert("State Already Available");
                window.location.href="state-master.php";
            </script>
            <?php
       }
       else
       {
            $country_ins = "INSERT INTO state_master(`country_id`, `state_name`, `state_code`, `state_form`)VALUES('$country_ids', '$state_name', '$state_code', '$state_form')";
            if($country_ins_rs = mysqli_query($con, $country_ins))
            {
                ?>
                <script>
                    alert("State Added Successfully");
                    window.location.href="state-master.php";
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                    alert("Failed, Try Again!");
                    window.location.href="state-master.php";
                </script>
                <?php
            }

       }
    }
    else
    {
        ?>
        <script>
            alert("Failed, Try Again!");
            window.location.href="state-master.php";
        </script>
        <?php
    }

    
?>