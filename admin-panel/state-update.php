<?php
    include("config.php");

    if(isset($_REQUEST['update']))
    {
        $xyz = $_REQUEST['id'];
        $state_name= ucwords(strtolower($_REQUEST['state']));
        $state_code = $_REQUEST['statecode'];
        $state_form = strtoupper($_REQUEST['stateform']);

        $state_upd = "UPDATE state_master set state_name = '$state_name', state_code='$state_code', state_form='$state_form' where id='$xyz'";
        if($state_upd_rs = mysqli_query($con, $state_upd))
        {
            ?>
            <script>
                alert("State Updated Successfully");
                window.location.href = "state-master.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert(" Update Failed");
                window.location.href = "state-master.php";
            </script>
            <?php
        }

    }
    else
    {
        ?>
        <script>
            alert(" Update Failed");
            window.location.href = "state-master.php";
        </script>
        <?php
    }

?>
