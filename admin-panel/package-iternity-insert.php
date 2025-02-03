<?php 
    include("config.php");

    if(ISSET($_REQUEST['submit']))
    {
        
        $id = $_REQUEST['package_id'];
        $desc4 = $_REQUEST['desc'];
        $desc3 = str_replace("'","&apos;",$desc4);
        $desc2 = str_replace('"',"&quot;",$desc3);
        $desc = str_replace("`","&#96;",$desc2);

        $type = $_REQUEST['type'];
        for($i=0;$i<count($desc);$i++)
        {
            if($desc[$i])
            {
                $sql_ins = "INSERT INTO iternity (`package_id`, `description`, `type`) VALUES('$id', '$desc[$i]', '$type[$i]')";
                if($sql_rs = mysqli_query($con, $sql_ins))
                {
                    ?>
                    <script>
                        alert("Iternity Added Successfully");
                         window.location.href="package-iternity.php?id=<?php echo $id; ?>";
                    </script>
                    <?php
                }
                else
                {
                    ?>
                    <script>
                        alert("Failed, Try Again");
                        window.location.href="package-iternity.php?id=<?php echo $id; ?>";
                    </script>
                    <?php
                }
            }
            else
            {
                ?>
                <script>
                    alert("Failed, Try Again");
                    window.location.href="package-iternity.php?id=<?php echo $id; ?>";
                </script>
                <?php
            }
        }
    }
    else
    {
        ?>
        <script>
            alert("Failed, Try Again");
            window.location.href="package-iternity.php?id=<?php echo $id; ?>";
        </script>
        <?php
    }
?>