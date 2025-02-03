<?php
    include("config.php");

    if(ISSET($_REQUEST['submit']))
    {
        $id = $_REQUEST['id'];
        $package_id = $_REQUEST['package_id'];
        $desc4 = $_REQUEST['description'];
        $desc3 = str_replace("'","&apos;",$desc4);
        $desc2 = str_replace('"',"&quot;",$desc3);
        $description = str_replace("`","&#96;",$desc2);
        $type = $_REQUEST['type'];

        $iternity_upd = "UPDATE iternity set description = '$description', type = '$type' where id = '$id'";
        if($iternity_rs = mysqli_query($con, $iternity_upd))
        {
            ?>
            <script>
                alert("Updated Successfully");
                window.location.href = "package-iternity.php?id=<?php echo $package_id; ?>";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert(" Failed, Try Again");
                window.location.href = "package-iternity.php?id=<?php echo $package_id; ?>";
            </script>
            <?php
        }
    }
    else if($_REQUEST['id'] && $_REQUEST['delete'] == 1)
    {
        $package_id = $_REQUEST['package_id'];
        $upd = "update iternity set status=1 where id='$_REQUEST[id]'";
        if($upd_rs = mysqli_query($con, $upd))
        {
            ?>
            <script>
                alert("Deleted Successfully");
                window.location.href = "package-iternity.php?id=<?php echo $package_id; ?>";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert(" Failed");
                window.location.href = "package-iternity.php?id=<?php echo $package_id; ?>";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert(" Failed");
            window.location.href = "package-iternity.php?id=<?php echo $package_id; ?>";
        </script>
        <?php
    }
?>
