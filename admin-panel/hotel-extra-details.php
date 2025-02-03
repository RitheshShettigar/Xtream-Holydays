<?php include ("config.php"); 
	error_reporting(0);
    $id = $_REQUEST['id'];
    if($id)
    {
        $sql = "select * from hotel_master where id = '$id'";
        $sql_rs = mysqli_query($con, $sql);
        $sql_arr = mysqli_fetch_array($sql_rs);
    }
    else
    {
        ?>
            <script>
                window.location.href = "hotel-new.php";
            </script>
        <?php
    }
?>

<!DOCTYPE html>
<html lang="en">
	<!-- START: Head-->
	<head>
		<meta charset="UTF-8">
		<title>Xtream Holiday | Hotel Extra Details</title>
		<?php include ("dist/header/index.php"); ?>
		<?php include ("dist/navbar/sidebar.php"); ?>
		<!-- START: Main Content-->
		<main>
			<div class="container-fluid">
				<!-- START: Breadcrumbs-->
				<div class="row ">
					<div class="col-12  align-self-center">
						<div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
							<div class="w-sm-100 mr-auto">
								<h4 class="mb-0"> Extra Details</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Hotel</li>
								<li class="breadcrumb-item active"><a href="#">Details</a></li>
							</ol>
						</div>
					</div>
				</div>
				<!-- END: Breadcrumbs-->
                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="hotel-extradetails-insert.php">
                                    <div class="row">
                                        <div class="col-6 mt-3">
                                            <span>Hotel Name</span>
                                            <input type="text" class="form-control" name="hotel" value="<?php echo $sql_arr['hotel_name']; ?>">
                                            <input type="hidden" name="hotel_id" value="<?php echo $sql_arr['id']; ?>" id="packageid">
                                        </div>
                                        <?php
                                            $hotel_details = "select * from  hotel_details where hotel_id = '$id'";
                                            $hotel_details_rs = mysqli_query($con, $hotel_details);
                                            $hotel_details_arr = mysqli_fetch_array($hotel_details_rs);
                                        ?>
                                        <div class="col-6 mt-3">
                                            <span>Select Type</span>
                                            <select class="form-control" name="type" onchange="packagetype()" id="extra_details">
                                                <option value="Extra-Details" <?php if($hotel_details_arr['type'] == 'Extra-Details') { echo "selected"; }; ?>>Extra Details</option>
                                                <option value="T&C" <?php if($hotel_details_arr['type'] == 'T&C') { echo "selected"; }; ?>>Term & Condition</option>
                                                <option value="Rules" <?php if($hotel_details_arr['type'] == 'Rules') { echo "selected"; }; ?>>Rules</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <input type="hidden" name="id" value="<?php echo $hotel_details_arr['id']; ?>">
                                            <textarea class = "form-control" rows="10" name="details" id="message"><?php echo $hotel_details_arr['details']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> 

                    </div>
                </div>
				<!-- END: Card DATA-->
			</div>
		</main>
		<!-- END: Content-->
		<?php include "dist/footer/index.php"; ?>
<script>
        function packagetype()
        {
            var details = document.getElementById('packageid').value;
            var typepc = document.getElementById('extra_details').value;

            $.ajax({
                type:"POST",
                url:"fetch-hotel-extradetail.php",
                
                data: { packageid: details, extra_details: typepc },
                datatype:'html',
                success:function(result){
                    $('#message').val(result);
                }

            })
            

        }
</script>
