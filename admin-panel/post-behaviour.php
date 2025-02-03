<?php include("config.php");

	$id = $_REQUEST['hps_level'];
	$sql_behaviour = "select * from post_behaviour_master where id = $id ";
	$rs_behaviour = mysqli_query($con, $sql_behaviour);
	$arr_behaviour = mysqli_fetch_array($rs_behaviour);
    
    echo $arr_behaviour['fields'];
?>