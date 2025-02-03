<?php include ("config.php");
	error_reporting(0);
 
	if($_REQUEST['id'])
	{
		$cust_fetch = "select * from customer_details where id = '$_REQUEST[id]'";
		$cust_fetch_rs = mysqli_query($con, $cust_fetch);
		$cust_fetch_arr = mysqli_fetch_array($cust_fetch_rs);
	}
?>
<!DOCTYPE html>
<html lang="en">
	<!-- START: Head-->
	<head>
		<meta charset="UTF-8">
		<title>Xtream Holiday Invoice</title>
		<?php include ("dist/header/index.php"); ?>
		<?php include ("dist/navbar/sidebar.php"); ?>
		<link rel="stylesheet" href="dist/vendors/select2/css/select2.min.css"/>
		<link rel="stylesheet" href="dist/vendors/select2/css/select2-bootstrap.min.css"/>
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
										<h4 class="mb-0">Update Customer Details</h4>
										<?php
									}
									else
									{
										?>
											<h4 class="mb-0">Add Customer Details</h4>
										<?php
									}
								?>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Customer Details</li>
								<li class="breadcrumb-item active">
									<?php 
										if($_REQUEST['id'])
										{
											?>
											Update Customer Details
											<?php
										}
										else
										{
											?>
												Add Customer Details
											<?php
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
							<!--<div class="card-header">                               
								<h4 class="card-title">Add New Employee Data</h4>                                
								</div>-->
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<form method="post" action="customer_detailsdb.php"  enctype="multipart/form-data">
												<div class="row">
													<label for="emp_name" class="col-sm-2 col-form-label">Contact Person Name</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="person_name"><i class="fas fa-user"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Enter Contact Person Name" aria-label="contact_name" aria-describedby="person_name" name="person_name" required = "true" value="<?php if($_REQUEST['id']) { echo $cust_fetch_arr['person_name']; } ?>">
															<input type="hidden" name="id" value="<?php echo $cust_fetch_arr['id']; ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_phno" class="col-sm-2 col-form-label">Contact Number</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="contact"><i class="fas fa-phone"></i></span>
															</div>
															<input type="number" class="form-control" placeholder="Enter Contact Number" aria-label="contact_num" aria-describedby="contact_num" name="contact" required = "true" value="<?php if($_REQUEST['id']) { echo $cust_fetch_arr['contact']; } ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_name" class="col-sm-2 col-form-label">Email ID</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="email"><i class="fas fa-envelope-open"></i></span>
															</div>
															<input type="email" class="form-control" placeholder="Enter  Email ID" aria-label="email_id" aria-describedby="Email ID" name="email" value="<?php if($_REQUEST['id']) { echo $cust_fetch_arr['email']; } ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="position" class="col-sm-2 col-form-label">Firm / Business Name</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="firm_name"><i class="fas fa-briefcase"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Enter Firm or Business Name" aria-label="firm_name" aria-describedby="firm_name" name="firm_name" value="<?php if($_REQUEST['id']) { echo $cust_fetch_arr['firm_name']; } ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="position" class="col-sm-2 col-form-label">GST Number</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="gst_no"><i class="fas fa-calculator"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Enter GST Number" aria-label="gst_no" aria-describedby="gst_no" name="gst_no" value="<?php if($_REQUEST['id']) { echo $cust_fetch_arr['gst_no']; } ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_addr" class="col-sm-2 col-form-label">State</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="state"><i class="fas fa-archway"></i></span>
															</div>
															<select data-select2-id="3" tabindex="-1" class="form-control" aria-hidden="true" name="state" id="state">
																<option label="Select State" value="">Select State</option>
																<?php
																	$state = "select * from state_master where status=0";
																	$state_rs = mysqli_query($con, $state);
																	while($state_arr = mysqli_fetch_array($state_rs))
																	{
																		?>
																			<option value="<?php echo $state_arr['id']; ?>" <?php if($_REQUEST['id']) { if($state_arr['id'] == $cust_fetch_arr['state']) { echo "selected"; }} ?>> <?php  echo $state_arr['state_name'].' ('. $state_arr['state_code'] .' - '. $state_arr['state_form'] .')' ?></option>
																		<?php
																	}
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_addr" class="col-sm-2 col-form-label">Address</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="address"><i class="fas fa-address-book"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Enter Address" aria-label="address" aria-describedby="address" name="address" value="<?php if($_REQUEST['id']) { echo $cust_fetch_arr['address']; } ?>">
														</div>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-10">
														<?php
															if($_REQUEST['id'])
															{
																?>
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
				<div class="row">
					<div class="col-12  align-self-center">
						<div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
							<div class="w-sm-100 mr-auto">
								<h4 class="mb-0">Customer Details Report</h4>
							</div>
						</div>
					</div>
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
												<th>Contact Name</th>
												<th>Contact No.</th>
												<th>Firm Name</th>
												<th>GST No.</th>
												<th>State</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$cust = "SELECT * from customer_details  WHERE status = 0";
												$cust_rs = mysqli_query($con, $cust);
												while($cust_arr = mysqli_fetch_array($cust_rs))
												{
													$state = "select * from state_master where id = '$cust_arr[state]'";
													$state_rs = mysqli_query($con, $state);
													$state_arr = mysqli_fetch_array($state_rs);
                                                    ?>
                                                        <tr>
                                                                <td ><?php echo $i++; ?></td>
                                                                <td><?php echo ucwords(strtolower($cust_arr['person_name'])); ?></td>
                                                                <td><?php echo $cust_arr['contact']; ?></td>
																<td><?php echo ucwords(strtolower($cust_arr['firm_name'])); ?></td>
																<td><?php echo $cust_arr['gst_no']; ?></td>
																<td><?php echo ucwords(strtolower($state_arr['state_name'])).' ('.$state_arr['state_code'].' - '.$state_arr['state_form'].' )' ?></td>
																<td>
																	<div class="btn-group">
																		<button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
																		<div class="dropdown-menu p-0">
																			<a class="dropdown-item" href="customer-details.php?id=<?php echo $cust_arr['id']; ?>&view=0">Edit</a>
																			<div class="dropdown-divider"></div>
																			<a class="dropdown-item" href="customer_detailsdb.php?id=<?php echo $cust_arr['id']; ?>&delete=1">Delete</a>
																		</div>
																	</div>
																</td>										
														</tr>
													<?php
												}	
											?>
										</tbody>
										<tfoot>
												<th>#</th>
												<th>Contact Name</th>
												<th>Contact No.</th>
												<th>Firm Name</th>
												<th>GST No.</th>
												<th>State</th>
												<th>Action</th>
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
		<script src="dist/vendors/select2/js/select2.full.min.js"></script>
		<script src="dist/js/select2.script.js"></script>
		<script>
			moment().format('DD/MM/YYYY');
		</script>