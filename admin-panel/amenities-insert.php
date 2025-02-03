<?php
    include("config.php");

    if(isset($_REQUEST['submit']))
    {
        $amin = ucwords(strtolower($_REQUEST['amenities']));

        $amini = "SELECT * FROM `amenities` where amenities = '$amin'";
        $amini_r = mysqli_query($con, $amini);
       if($amini_a = mysqli_fetch_array($amini_r))
       {
            ?>
            <script>
                alert("Amenities Already Available");
                window.location.href="amenities.php";
            </script>
            <?php
       }
       else
       {
            $city_ins = "INSERT INTO amenities(`amenities`)VALUES('$amin')";
            if($city_ins_rs = mysqli_query($con, $city_ins))
            {
                ?>
                <script>
                    alert("Amenities Added Successfully");
                    window.location.href="amenities.php";
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                    alert("Failed, Try Again.!");
                    window.location.href="amenities.php";
                </script>
                <?php
            }
       }
    }
    else if(isset($_REQUEST['update']))
    {
        $id = $_REQUEST['id'];
        $amin = ucwords(strtolower($_REQUEST['amenities']));

        $amini = "SELECT * FROM `amenities` where amenities = '$amin' and id!='$id'";
        $amini_r = mysqli_query($con, $amini);
        if($amini_a = mysqli_fetch_array($amini_r))
        {
            ?>
                <script>
                    alert("Amenities Already Available.");
                    window.location.href="amenities.php";
                </script>
            <?php
        }
        else
        {
            $am_up = "update amenities set amenities='$amin' where id='$id'";
            if(mysqli_query($con, $am_up))
            {
                ?>
                    <script>
                        alert("Amenities Updated Successfully.");
                        window.location.href="amenities.php";
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
            window.location.href="amenities.php";
        </script>
        <?php
    }
?>