<?php 
    include("config.php");
    session_start();
    if(isset($_REQUEST['submit']))
    {
        $count=0;
        $hotel_id = $_REQUEST['hotel_id'];
        $room_id = $_REQUEST['room_id'];
        $added_by = $_SESSION['userid'];
        if($room_id == '#')
        {
            $room_id = 0;
        }
        $tot = count($_FILES['image_name']['name']);
        $aerror= array();
        for($i=1; $i<$tot;$i++)
        {
            $errors= array();
            $uid = time();
            $file_name = $uid.$_FILES['image_name']['name'][$i];
            $file_size =$_FILES['image_name']['size'][$i];
            $file_tmp =$_FILES['image_name']['tmp_name'][$i];
            $file_type=$_FILES['image_name']['type'][$i];
            $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);
            // $file_ext=strtolower(end(explode('.',$_FILES['image_name']['name'])));
            $extensions= array("jpeg","jpg","png");
            $file_name = $uid.$i.'.'.$file_ext;
            if(in_array($file_ext,$extensions)=== false)
            {
                $errors[]="extension not allowed, please choose a JPEG / JPG or PNG file.";
            }

            if($file_size > 2097152)
            {
                $errors[]='File size must be exactly 2 MB';
            }

            if(empty($errors)==true)
            {
                move_uploaded_file($file_tmp,"dist/images/hotel-images/".$file_name);
                $image_path = 'dist/images/hotel-images/';
                //echo "Success";
                
                $sql_ins = "INSERT INTO hotel_images(`hotel_id`, `room_id`, `added_by`, `image_name`, `image_path`)  VALUES($hotel_id, $room_id, '$added_by', '$file_name', '$image_path')";
                if($sql_rs = mysqli_query($con,$sql_ins))
                {
                    $count++;
                }
            }
            else
            {
                $aerror[] .= implode($errors);
            }
            
        }
        
        if($count>0)
        {
            $error = implode($aerror);
            ?>
                <script>
                    alert("<?php echo $count; ?> Images are uploaded, <?php echo ($tot-1)-$count; ?> <?php echo $error; ?>");
                    window.location.href="hotel-images.php?id=<?php echo $hotel_id; ?>";
                </script>
            <?php
        }
        else
        {
            $error = implode($aerror);
            ?>
                <script>
                    alert("Error Try Again!<?php echo $error; ?>");
                    window.location.href="hotel-images.php?id=<?php echo $hotel_id; ?>";
                </script>
            <?php
        }

    }
    else if($_REQUEST['delete'] == 1)
    {
        $dlt = "update hotel_images set status=1 where id='$_REQUEST[id]'";
        if(mysqli_query($con,$dlt))
        {
            ?>
                <script>
                    alert("Deleted Successfully");
                    window.location.href = "hotel-images.php?id='<?php echo $_REQUEST['hotel_id']; ?>'";
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert("Failed Try Again!");
                    window.location.href = "hotel-images.php?id='<?php echo $_REQUEST['hotel_id']; ?>";
                </script>
            <?php
        }
    }
    else
    {
        ?>
            <script>
                alert("Failed");
                // window.location.href = "hotel-images.php";
            </script>
        <?php
    }
?>