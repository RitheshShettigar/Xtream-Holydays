<?php include ("config.php");
	error_reporting(0);
    if($id = $_REQUEST['id'])
    {
        $hotel = "select * from hotel_master where id='$id'";
        $hotel_rs = mysqli_query($con, $hotel);
        $hotel_arr = mysqli_fetch_array($hotel_rs);
        if($room_id = $_REQUEST['room_id'])
        {
            $room = "select * from room_master where id = $room_id";
            $room_rs = mysqli_query($con, $room);
            $room_arr = mysqli_fetch_array($room_rs);
        }
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
								<h4 class="mb-0">Add New Room into <strong><?php echo $hotel_arr['hotel_name'] ;?></strong></h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Hotel</li>
								<li class="breadcrumb-item active"><a href="#">Add New Room</a></li>
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
											<form method="post" action="hotel-room-insert.php"  enctype="multipart/form-data">
												<div class="row">
													<label for="currency_type" class="col-sm-2 col-form-label">Select Currency Type</label>
													<div class="col-sm-4">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="currency_type"><i class="fas fa-dollar-sign"></i></span>
															</div>
															<select class="form-control" name="currency_type">
																<option label="Choose Currency Type">Choose Currency Type</option>
																<?php
																	$currency = "select * from currancy order by country";
																	$currency_rs = mysqli_query($con, $currency);
																	while($currenct_arr = mysqli_fetch_array($currency_rs))
																	{
																	    ?>
																			<option value="<?php echo $currenct_arr['id']; ?>" <?php if($room_arr['currency_type'] == $currenct_arr['id']) { echo "selected"; } ?>><?php echo $currenct_arr['country'].' ('.$currenct_arr['code'].' )'; ?></option>
																		<?php
																	}
																	?>
															</select>
														</div>
													</div>
													<label for="price" class="col-sm-1 col-form-label text-right">Price</label>
													<div class="col-sm-5">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="price"><i class="fas fa-rupee-sign"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Room Price" aria-label="room_price" aria-describedby="room_price" name="room_price" required="true" value = "<?php if($room_id) { echo $room_arr['room_price']; } ?>">
                                                            <input type ="hidden" name="id" value="<?php echo $id; ?>" >
                                                            <input type ="hidden" name="room_id" value="<?php if($room_id) { echo $room_id; } ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="heading" class="col-sm-2 col-form-label">Room Heading</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="room_heading"><i class="fas fa-highlighter"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Room Heading" aria-label="room_heading" aria-describedby="room_heading" name="room_heading" required="true"  value = "<?php if($room_id) { echo $room_arr['room_heading']; } ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="Room Tagline" class="col-sm-2 col-form-label">Room Tagline</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="room_tagline"><i class="fas fa-tag"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Room Tagline" aria-label="room_tagline" aria-describedby="room_tagline " name="room_tagline" value = "<?php if($room_id) { echo $room_arr['room_tagline']; } ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="Description" class="col-sm-2 col-form-label">Description</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="email"><i class="fas fa-book-open"></i></span>
															</div>
															<input type="text" class="form-control" maxlength="180" placeholder="Room Description" aria-label="Description" aria-describedby="Description" name="room_description" required="true" value = "<?php if($room_id) { echo $room_arr['room_description']; } ?>">
														</div>
													</div>
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
				<div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto">
                                <h4 class="mb-0">Rooms List</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->
                <div class="row">
				<div class="col-12 mt-3">
					<div class="card">
						<div class="card-header  justify-content-between align-items-center">
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="example" class="display table dataTable table-striped table-bordered" >
									<thead>
										<tr>
											<th>#</th>
											<th>Room Type</th>
											<th>Tagline</th>
											<th>Price</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php


											$i = 1;
											$room = "select * from room_master where status = 0 order by id desc";
											$room_rs = mysqli_query($con, $room);
											while($room_arr = mysqli_fetch_array($room_rs))
											{
												$sql_curr = "select * from currancy where id = '$room_arr[currency_type]'";
												$sql_curr_rs = mysqli_query($con, $sql_curr);
												$sql_curr_arr = mysqli_fetch_array($sql_curr_rs);
												
												?>
													<tr>
														<td><?php echo  $i++; ?></td>
														<td ><?php echo $room_arr['room_heading']; ?></td>
														<td><?php echo $room_arr['room_tagline']; ?></td>
														<td><?php echo $sql_curr_arr['symbol'].' '.$room_arr['room_price']; ?></td>
														<td><?php echo $room_arr['room_description']; ?></td>
														<td>
															<div class="btn-group">
																<button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
																<div class="dropdown-menu p-0">
																	<a class="dropdown-item" href="hotel-room.php?id=<?php echo $id; ?>&room_id=<?php echo $room_arr['id']; ?>">Edit</a>
																	<a class="dropdown-item" href="hotel-room-insert.php?id=<?php echo $id; ?>&delete_id=<?php echo $room_arr['id']; ?>">Delete</a>
																	<div class="dropdown-divider"></div>
																	<a class="dropdown-item" href="room-amenities.php?id=<?php echo $room_arr['id']; ?>">Add Amenities</a>
																</div>
															</div>
														</td>
													</tr>
												<?php
											}
											
										?>
									</tbody>
									<tfoot>
									    <tr>
                                            <th>#</th>
                                            <th>Room Type</th>
                                            <th>Tagline</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Action</th>
										</tr>
									</tr>
									</tfoot>
								</table>
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