<?php 
    include("config.php");

    if(isset($_REQUEST['submit']))
    {
        $hotel_name = $_REQUEST['hotel_name'];
        $city = $_REQUEST['city'];
        $address = $_REQUEST['address'];
        $map = $_REQUEST['map'];
        $check_in = $_REQUEST['check-in'];
        $check_out = $_REQUEST['check-out'];
        $landmark = $_REQUEST['landmark'];
        $star = $_REQUEST['star'];
        $contact_person = $_REQUEST['contact_person'];
        $contact_number = $_REQUEST['contact_number'];
        $hotel_description = $_REQUEST['hotel_description'];
        $email = $_REQUEST['email'];

        $sql_ins = "INSERT INTO hotel_master(`hotel_name`, `contact_person`, `contact_number`, `email`,`star`, `city`, `address`, `map`, `check_in`, `check_out`, `landmark`, `hotel_description`) VALUES('$hotel_name', '$contact_person', '$contact_number', '$email','$star', '$city', '$address', '$map', '$check_in', '$check_out', '$landmark', '$hotel_description')";
        if($sql_rs = mysqli_query($con, $sql_ins))
        {
            ?>
            <script>
                alert("Hotel Added Successfully");
                window.location.href = "hotel-new.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Failed,Try Again");
                window.location.href = "hotel-new.php";
            </script>
            <?php
        }
    }

    if(isset($_REQUEST['update']))
    {
        $id = $_REQUEST['hotel_id'];
        $hotel_name = $_REQUEST['hotel_name'];
        $city = $_REQUEST['city'];
        $address = $_REQUEST['address'];
        $map = $_REQUEST['map'];
        $check_in = $_REQUEST['check-in'];
        $check_out = $_REQUEST['check-out'];
        $landmark = $_REQUEST['landmark'];
        $star = $_REQUEST['star'];
        $contact_person = $_REQUEST['contact_person'];
        $contact_number = $_REQUEST['contact_number'];
        $hotel_description = $_REQUEST['hotel_description'];
        $email = $_REQUEST['email'];
        $status     = $_REQUEST['status'];
        $update = "UPDATE hotel_master SET hotel_name='$hotel_name', contact_person='$contact_person', contact_number='$contact_number', email='$email',star='$star', city='$city', `address`='$address', map='$map', check_in='$check_in', check_out='$check_out', landmark='$landmark', hotel_description='$hotel_description', status=$status where id='$id'";
        if($rs = mysqli_query($con, $update))
        {
            ?>
            <script>
                alert("Hotel Updated Successfully");
                window.location.href = "hotel-new.php?id=<?php echo $id; ?>";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Failed,Try Again");
                // window.location.href = "hotel-new.php?id=<?php echo $id; ?>";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert("Failed");
            window.location.href = "hotel-new.php";
        </script>
        <?php
    }
?>