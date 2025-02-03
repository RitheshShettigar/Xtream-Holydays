<?php 
	include ("config.php");
	error_reporting(0);

	if($_REQUEST['id'])
	{
		$hotel_fetch = "select * from hotel_master where id='$_REQUEST[id]'";
		$hotel_fetch_rs = mysqli_query($con, $hotel_fetch);
		$hotel_fetch_arr = mysqli_fetch_array($hotel_fetch_rs);	
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
								<?php 
									if($_REQUEST['id'])
									{
										?>
											<h4 class="mb-0">Update Hotel</h4>
										<?php
									}
									else
									{
										?>
											<h4 class="mb-0">Add New Hotel</h4>
										<?php
									}
								?>
								
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Hotel</li>
								<li class="breadcrumb-item active">
									<?php 
										if($_REQUEST['id'])
										{
											echo "Update Hotel";
										}
										else
										{
											echo "Add New Hotel";
										}
									?>
									
								</li>
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
											<form method="post" action="hotel-insert.php"  enctype="multipart/form-data">
												<div class="row">
													<label for="hotel" class="col-sm-2 col-form-label"> Hotel Name</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="hotel"><i class="fas fa-hotel"></i></span>
															</div>
															<input type="text" class="form-control" value="<?php echo $hotel_fetch_arr['hotel_name'] ?>" placeholder="Hotel Name" aria-label="hotel" aria-describedby="Hotel Name" name="hotel_name" required="true">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="person" class="col-sm-2 col-form-label">Contact Person</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="contact_person"><i class="fas fa-user"></i></span>
															</div>
															<input type="text" class="form-control" value="<?php echo $hotel_fetch_arr['contact_person'] ?>" placeholder="Contact Person" aria-label="contact_person" aria-describedby="contact_person" name="contact_person" required="true">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="contact number" class="col-sm-2 col-form-label">Contact Number</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="contact_number"><i class="fas fa-phone"></i></span>
															</div>
															<input type="text" class="form-control" value="<?php echo $hotel_fetch_arr['contact_number'] ?>" placeholder="Contact Number" aria-label="contact_number" aria-describedby="contact_number " name="contact_number" required="true" minlength="10" maxlength="10" >
														</div>
													</div>
												</div>
												<div class="row">
													<label for="email" class="col-sm-2 col-form-label">Email-Id</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="email"><i class="fas fa-envelope"></i></span>
															</div>
															<input type="text" class="form-control"  value="<?php if($_REQUEST['id']) { echo $hotel_fetch_arr['email']; } ?>"placeholder="Email-ID" aria-label="email" aria-describedby="email" name="email" required="true">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="star" class="col-sm-2 col-form-label">Select Star Category</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="star"><i class="fas fa-star"></i></span>
															</div>
															<select class="form-control" name="star">
																<option label="Choose Star">Choose Star </option>
																<option  value="1" lable="1 Star" <?php if($_REQUEST['id']) { if($hotel_fetch_arr['star'] == 1) { echo "selected"; } } ?>>1 Star</option>
																<option value="2" lable="2 Star" <?php if($_REQUEST['id']) { if($hotel_fetch_arr['star'] == 2) { echo "selected"; } } ?>>2 Star</option>
																<option value="3" lable="3 Star" <?php if($_REQUEST['id']) { if($hotel_fetch_arr['star'] == 3) { echo "selected"; } } ?>>3 Star</option>
																<option value="4" lable="4 Star" <?php if($_REQUEST['id']) { if($hotel_fetch_arr['star'] == 4) { echo "selected"; } } ?>>4 Star</option>
																<option value="5" lable="5 Star" <?php if($_REQUEST['id']) { if($hotel_fetch_arr['star'] == 5) { echo "selected"; } } ?>>5 Star</option>
																<option value="6" lable="6 Star" <?php if($_REQUEST['id']) { if($hotel_fetch_arr['star'] == 6) { echo "selected"; } } ?>>6 Star</option>
																<option value="7" lable="7 Star" <?php if($_REQUEST['id']) { if($hotel_fetch_arr['star'] == 7) { echo "selected"; } } ?>>7 Star</option>
															</select>
														</div>
													</div>
                                                </div>
												<div class="row">
													<label for="city" class="col-sm-2 col-form-label">Select City</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="country"><i class="fas fa-city"></i></span>
															</div>
															<select class="form-control" name="city">
																<option label="Choose Country">Choose City </option>
                                                                <?php
                                                                    $state = "select * from city_master";
                                                                    $state_rs = mysqli_query($con, $state);
                                                                    while($state_arr = mysqli_fetch_array($state_rs))
                                                                    {
																		
																		$st = "select * from state_master where id='$state_arr[state_id]'";
																		$st_rs = mysqli_query($con, $st);
																		$st_arr = mysqli_fetch_array($st_rs);
																		
																		$ct = "select * from country where id='$st_arr[country_id]'";
																		$ct_rs = mysqli_query($con, $ct);
																		$ct_arr = mysqli_fetch_array($ct_rs);
                                                                        ?>
                                                                            <option value="<?php echo $state_arr['id']; ?>" <?php if($_REQUEST['id']) { if($hotel_fetch_arr['city'] == $state_arr['id']) { echo "selected"; } }  ?>><?php echo $state_arr['city_name'].' - '.$st_arr['state_name'].' ('.$ct_arr['country'].')'; ?> </option>
                                                                        <?php
                                                                    }
                                                                ?>
															</select>
														</div>
													</div>
                                                </div>
												<div class="row">
													<label for="addr" class="col-sm-2 col-form-label">Address</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="address"><i class="fas fa-address-card"></i></span>
															</div>
															<input type="text" class="form-control" value="<?php if($_REQUEST['id']){echo $hotel_fetch_arr['address'];} ?>" placeholder="Enter Hotel Address" aria-label="address" aria-describedby="address" name="address" required = "true">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="landmark" class="col-sm-2 col-form-label">Landmark</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="landmark"><i class="fas fa-landmark"></i></span>
															</div>
															<input type="text" class="form-control" value="<?php if($_REQUEST['id']){echo $hotel_fetch_arr['landmark'];} ?>" placeholder="Enter Landmark" aria-label="landmark" aria-describedby="landmark" name="landmark" required = "true">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="map" class="col-sm-2 col-form-label">Google Map Link</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="map"><i class="fas fa-map-marker-alt"></i></span>
															</div>
															<input type="text" class="form-control"  value="<?php if($_REQUEST['id']){echo $hotel_fetch_arr['map'];} ?>" placeholder="Google Map Link" aria-label="map" aria-describedby="map" name="map" required = "true">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="check-in" class="col-sm-2 col-form-label">Check-In</label>
													<div class="col-sm-4">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="check-in"><i class="far fa-calendar-alt"></i></span>
															</div>
															<input type="time" class="form-control" value="<?php if($_REQUEST['id']){echo $hotel_fetch_arr['check_in'];} ?>" placeholder="" aria-label="check-in" aria-describedby="check-in" name="check-in" id="check-in">
														</div>
													</div>
													<label for="check-out" class="col-sm-2 col-form-label text-right">Check-Out</label>
													<div class="col-sm-4">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="check-out"><i class="far fa-calendar-alt"></i></span>
															</div>
															<input type="time" class="form-control" value="<?php if($_REQUEST['id']){echo $hotel_fetch_arr['check_out'];} ?>" placeholder="" aria-label="check-out" aria-describedby="check-out" name="check-out" id="check-out">
														</div>
													</div>
												</div>
												
												<div class="row">
													<label for="landmark" class="col-sm-2 col-form-label">Description</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="description"><i class="fas fa-sticky-note"></i></span>
															</div>
															<textarea class="form-control"   placeholder="Enter Description" aria-label="description" aria-describedby="description" name="hotel_description" required = "true"><?php if($_REQUEST['id']){echo $hotel_fetch_arr['hotel_description'];} ?></textarea>
														</div>
													</div>
												</div>
												<div class="row">
													<label for="landmark" class="col-sm-2 col-form-label">Status</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="status"><i class="fas fa-sticky-note"></i></span>
															</div>
															<select name="status" id="status">
																<option value="0" <?php if($_REQUEST['id']) { if($hotel_fetch_arr['status'] ==0) { echo "selected"; } } ?>>Active</option>
																<option value="1" <?php if($_REQUEST['id']) { if($hotel_fetch_arr['status'] ==1) { echo "selected"; } } ?>>In-Active</option>
															</select>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-10">
														<?php
															if($_REQUEST['id'])
															{
																?>
																	<input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $hotel_fetch_arr['id'];?>">
																	<button type="submit" id="update" name="update" class="btn btn-primary">Update</button>
																<?php
															} 
															else
															{
																?>
																	<button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
																<?php
															}
														?>
														
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
							<h4 class="mb-0">Hotel Report</h4>
						</div>
						<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item">Hotel</li>
							<li class="breadcrumb-item active"><a href="#">Hotel Report</a></li>
						</ol>
					</div>
				</div>
			</div>
			<!-- END: Breadcrumbs-->
			<!-- START: Card Data-->
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
											<th>Hotel Name</th>
											<th>* Category</th>
											<th>Contact Person</th>
											<th>Contact Number</th>
											<th>Email-Id</th>
											<th>City</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php


											$i = 1;
											$hotel = "select * from hotel_master  order by status,hotel_name asc";
											$hotel_rs = mysqli_query($con, $hotel);
											while($hotel_arr = mysqli_fetch_array($hotel_rs))
											{
												$city = "select * from city_master where id ='$hotel_arr[city]'";
												$city_rs = mysqli_query($con, $city);
												$city_arr = mysqli_fetch_array($city_rs);

												$state = "select * from state_master where id ='$city_arr[state_id]'";
												$state_rs = mysqli_query($con, $state);
												$state_arr = mysqli_fetch_array($state_rs);

												$country = "select * from country where id ='$state_arr[country_id]'";
												$country_rs = mysqli_query($con, $country);
												$country_arr = mysqli_fetch_array($country_rs);

												
												?>
													<tr>
														<td><?php echo  $i++; ?></td>
														<td ><?php echo $hotel_arr['hotel_name']; ?></td>
														<td><?php if($hotel_arr['star']) { echo $hotel_arr['star'].' Star'; } ?></td>
														<td><?php echo ucwords(strtolower($hotel_arr['contact_person'])); ?></td>
														<td><?php echo $hotel_arr['contact_number']; ?></td>
														<td><?php echo $hotel_arr['email']; ?></td>
														<td><?php echo $city_arr['city_name'].' - '.$state_arr['state_name'].' ('.$country_arr['country'].')'; ?></td>
														<td><?php if($hotel_arr['status'] == 0) { echo "Active"; } else { echo "In-Active"; }; ?></td>
														<td>
															<div class="btn-group">
																<button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
																<div class="dropdown-menu p-0">
																	
																	<a class="dropdown-item" href="hotel-new.php?id=<?php echo $hotel_arr['id']; ?>">Edit</a>
																	<a class="dropdown-item" href="hotel-room.php?id=<?php echo $hotel_arr['id']; ?>">Rooms</a>
																	<div class="dropdown-divider"></div>
																	<a class="dropdown-item" href="hotel-extra-details.php?id=<?php echo $hotel_arr['id']; ?>">Extra Details</a>
																	<a class="dropdown-item" href="hotel-images.php?id=<?php echo $hotel_arr['id']; ?>">Images</a>
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
										<th>Hotel Name</th>
										<th>* Category</th>
										<th>Contact Person</th>
										<th>Contact Number</th>
										<th>Email-Id</th>
										<th>City</th>
										<th>Action</th>
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