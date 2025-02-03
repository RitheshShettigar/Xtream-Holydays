<?php
    include("config.php");

    if(isset($_REQUEST['submit']))
    {
        $state_id = $_REQUEST['state'];
        $city_name = ucwords(strtolower($_REQUEST['city']));

        $sql_city = "SELECT * FROM `city_master` where state_id = '$state_id' and city_name = '$city_name'";
        $sql_city_rs = mysqli_query($con, $sql_city);
       if($sql_city_arr = mysqli_fetch_array($sql_city_rs))
       {
            ?>
            <script>
                alert("City Already Available");
                window.location.href="city-master.php";
            </script>
            <?php
       }
       else
       {
            echo $city_ins = "INSERT INTO city_master(`state_id`, `city_name`)VALUES('$state_id', '$city_name')";
            if($city_ins_rs = mysqli_query($con, $city_ins))
            {
                ?>
                <script>
                    alert("City Added Successfully");
                    window.location.href="city-master.php";
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                    alert("Failed, Try Again!");
                    window.location.href="city-master.php";
                </script>
                <?php
            }

       }
    }
    else
    {
        ?>
        <script>
            alert("Failed");
            // window.location.href="city-master.php";
        </script>
        <?php
    }
?>