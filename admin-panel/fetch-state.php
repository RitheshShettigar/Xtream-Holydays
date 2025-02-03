<?php
    include("config.php");

    $id = $_REQUEST['id'];
    if(!empty($id))
    {
        $query = "SELECT * FROM state_master where id = $id and status=0";
        $query_rs = mysqli_query($con, $query);
        if($query_rows = mysqli_num_rows($query_rs))
        {
            echo "<option value=''>Select State Code</option>";
            while($query_arr=mysqli_fetch_array($query_rs))
            {
                echo "<option value='".$query_arr['id']."'>".$query_arr['state_code'];." ".ucwords(strtolower($query_arr['state_form']))."</option>";
            }
        }
    }
 ?>