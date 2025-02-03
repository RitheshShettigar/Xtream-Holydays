<?php include ("config.php");
	error_reporting(0);
    if($id = $_REQUEST['id'])
    {

        $room = "select * from room_master where id = $id";
        $room_rs = mysqli_query($con, $room);
        $room_arr = mysqli_fetch_array($room_rs);

        $hotel = "select * from hotel_master where id='$room_arr[hotel_id]'";
        $hotel_rs = mysqli_query($con, $hotel);
        $hotel_arr = mysqli_fetch_array($hotel_rs);
    }
    else
    {
        ?>
        <script>
            window.location.href="hotel-new.php";
        </script>
        <?php
    }
    
?>
<!DOCTYPE html>
<html lang="en">
	<!-- START: Head-->
	<head>
		<meta charset="UTF-8">
		<title>Xtream Holiday Packages</title>
		<?php include ("dist/header/index.php"); ?>
		<?php include ("dist/navbar/sidebar.php"); ?>
		<link rel="stylesheet" href="dist/vendors/select2/css/select2.min.css"/>
		<link rel="stylesheet" href="dist/vendors/select2/css/select2-bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
		<!-- START: Main Content-->
		<main>
			<div class="container-fluid">
				<!-- START: Breadcrumbs-->
				<div class="row ">
					<div class="col-12  align-self-center">
						<div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
							<div class="w-sm-100 mr-auto">
								<h4 class="mb-0">Add New Amenities into <strong><?php echo $hotel_arr['hotel_name'] ;?></strong></h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Hotel</li>
								<li class="breadcrumb-item active"><a href="#">Add New Amenities</a></li>
							</ol>
						</div>
					</div>
				</div>
				<!-- END: Breadcrumbs-->
				<!-- START: Card Data-->
				<div class="row">
					<div class="col-12 col-lg-12 mt-3">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<form method="post" action="room-amenities-insert.php"  enctype="multipart/form-data">
                                                <input type = "hidden" name="room_id" value="<?php echo $id; ?>">
												<div class="row">
													<label for="price" class="col-sm-2 col-form-label">Amenities </label>
                                                    <?php
                                                        $amen = "select * from amenities";
                                                        $amen_rs = mysqli_query($con, $amen);
                                                        while($amen_arr = mysqli_fetch_array($amen_rs))
                                                        {
															$room_amen = "select * from room_amenities where room_id=$id and amenities_id='$amen_arr[id]' and status=0";
															$room_amen_rs = mysqli_query($con, $room_amen);
															$room_amen_arr = mysqli_fetch_array($room_amen_rs);
                                                            ?>
                                                            <div class="col-sm-2">
                                                                <div class="custom-control custom-checkbox custom-control-inline">                                        
                                                                    <input type="checkbox"  name="amenity[]" class="custom-control-input"  id="<?php echo $amen_arr['id'] ?>" value="<?php echo $amen_arr['id']; ?>" <?php if($room_amen_arr) { echo "checked=checked"; } ?>>
                                                                    <label class="custom-control-label checkbox-success outline" for="<?php echo $amen_arr['id'] ?>"><?php echo $amen_arr['amenities'] ?></label>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    ?>
												</div>
												<div class="form-group row">
													<div class="col-sm-10">
														<button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END: Card DATA-->
				
			</div>
			</div>
		</main>
		<!-- END: Content-->
		<?php include "dist/footer/index.php"; ?>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		<script>
			$(function() {
			             $('input[name="daterange"]').daterangepicker({
			                 opens: 'left'
			             }, function(start, end, label) {
			                 console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			             });
			         });
		</script>
		<script src="dist/vendors/select2/js/select2.full.min.js"></script>
		<script src="dist/js/select2.script.js"></script>