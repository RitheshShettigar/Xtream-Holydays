<?php include("config.php");

    if(ISSET($_REQUEST['submit']))
    {
        $cp_name = $_REQUEST['cp_name'];
        $cp_number = $_REQUEST['cp_number'];
        $cp_anumber = $_REQUEST['cp_anumber'];
        $cp_email = $_REQUEST['cp_email'];
        $cp_aemail = $_REQUEST['cp_aemail'];
        $website = $_REQUEST['website'];
        $location = $_REQUEST['location'];
        $query = $_REQUEST['query'];
        $date = $_REQUEST['date'];
        if($date)
        {

        }
        else{
            $date = date('Y-m-d');
        }
        $follow_update = $_REQUEST['follow_update'];
        $comment = $_REQUEST['comment'];
        $id = $_REQUEST['id'];

        $chk = "SELECT * from leads WHERE id = '$id'";
        $rs = mysqli_query($con, $chk);
        if($rs_arr = mysqli_fetch_array($rs))
        {
            $upd = "UPDATE leads set cp_name = '$cp_name', cp_number = '$cp_number', cp_anumber = '$cp_anumber', cp_email = '$cp_email', cp_aemail = '$cp_aemail', website = '$website', location = '$location', query = '$query', date = '$date', follow_update = '$follow_update', comment = '$comment' WHERE id = '$id'";

            if(mysqli_query($con, $upd))
            {
                ?>
                <script>
                    alert("Updated, Successfully");
                    window.location.href = "lead-details.php?id=<?php echo $id ?>";
                </script>
                <?php  
            }
            else
            {
                    ?>
                    <script>
                        alert("Failed, Try Again");
                        window.location.href = "lead-details.php?id=<?php echo $id ?>";
                    </script>
                    <?php
            }
        }
        else
        {
                ?>
                <script>
                    alert("Try Again");
                    window.location.href = "lead-details.php?id=<?php echo $id ?>";
                </script>
                <?php
        }
    }

?>