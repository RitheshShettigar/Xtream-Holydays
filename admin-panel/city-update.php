<?php
    include("config.php");

    if(isset($_REQUEST['update']))
    {
        $id = $_REQUEST['id'];
        $city_name= ucwords(strtolower($_REQUEST['city']));

        $state_upd = "UPDATE city_master set city_name = '$city_name' where id='$id'";
        if($state_upd_rs = mysqli_query($con, $state_upd))
        {
            ?>
            <script>
                alert("City Updated Successfully");
                window.location.href = "city-master.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert(" Update Failed");
                window.location.href = "city-master.php";
            </script>
            <?php
        }

    }
    else
    {
        ?>
        <script>
            alert(" Update Failed");
            window.location.href = "city-master.php";
        </script>
        <?php
    }

?>
