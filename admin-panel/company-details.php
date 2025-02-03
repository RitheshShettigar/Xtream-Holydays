<?php include ("config.php");
	error_reporting(0);
 
	 if($_REQUEST['id'])
	 { 
	 	$company_fetch = "select * from company_details where id = '$_REQUEST[id]'";
	 	$company_fetch_rs = mysqli_query($con, $company_fetch);
	 	$company_fetch_arr = mysqli_fetch_array($company_fetch_rs);
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
										<h4 class="mb-0">Update Company Details</h4>
										<?php
									}
									else
									{
										?>
											<h4 class="mb-0">Add Company Details</h4>
										<?php
									}
                                    
								?>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Company Details</li>
								<li class="breadcrumb-item active">
									<?php 
                                    
										if($_REQUEST['id'])
										{
											?>
											Update Company Details
											<?php
										}
										else
										{
											?>
												Add Company Details
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
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<form method="post" action="company-detailsdb.php" enctype="multipart/form-data">
												<div class="row">
													<label for="emp_name" class="col-sm-2 col-form-label">GST Number</label>
													<div class="col-sm-10">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="gst_no"><i class="fa fa-calendar"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Enter GST Number" aria-label="gst_no" aria-describedby="gst_no" name="gst_no" value="<?php if($_REQUEST['id']) { echo $company_fetch_arr['gst_no']; } ?>">
															<input type="hidden" name="id" value="<?php echo $company_fetch_arr['id']; ?>">
														</div>
													</div>
												</div>
												<div class="row">
                                                    <label for="emp_phno" class="col-sm-2 col-form-label">Firm Name</label>
													<div class="col-sm-4 col-lg-4 col-md-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="firm_name"><i class="fas fa-building"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Enter Firm or Business Name" aria-label="firm_name" aria-describedby="firm_name" name="firm_name" value="<?php if($_REQUEST['id']) { echo $company_fetch_arr['firm_name']; } ?>">
														</div>
													</div>
													<label for="emp_phno" class="col-sm-2 col-form-label text-right">State Name</label>
													<div class="col-sm-4 col-lg-4 col-md-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="state_name"><i class="fas fa-archway"></i></span>
															</div>
                                                            <select data-select2-id="3" tabindex="-1" class="form-control" aria-hidden="true" name="state_name" id="state_name">
																<option label="Select State" value="">Select State</option>
																<?php
                                                                
																	$state = "select * from state_master where status=0";
																	$state_rs = mysqli_query($con, $state);
																	while($state_arr = mysqli_fetch_array($state_rs))
																	{
																		?>
																			<option value="<?php echo $state_arr['id']; ?>" <?php if($_REQUEST['id']) { if($state_arr['id'] == $company_fetch_arr['state_name']) { echo "selected"; }} ?>> <?php  echo $state_arr['state_name'].' ('. $state_arr['state_code'] .' - '. $state_arr['state_form'] .')' ?></option>
																		<?php
																	}
                                                                
																?>
															</select>														
                                                        </div>
													</div>
												</div>
												<div class="row">
													<label for="call" class="col-sm-2 col-form-label">Contact Number</label>
													<div class="col-sm-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="call"><i class="fas fa-address-card"></i></span>
															</div>
                                                            <input type="text" class="form-control" placeholder="Enter Contact Number" aria-label="call" aria-describedby="call" name="call" required = "true" value="<?php if($_REQUEST['id']) { echo $company_fetch_arr['contact_no']; } ?>">														
														</div>
													</div>
													<label for="acall" class="col-sm-2 col-form-label text-right">Alternate Number</label>
													<div class="col-sm-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="acall"><i class="fas fa-address-card"></i></span>
															</div>
                                                            <input type="text" class="form-control" placeholder="Enter Alternate Number" aria-label="acall" aria-describedby="acall" name="acall" value="<?php if($_REQUEST['id']) { echo $company_fetch_arr['alternate_no']; } ?>">														
														</div>
													</div>
												</div>
												
												<div class="row">
													<label for="email" class="col-sm-2 col-form-label">Email Id</label>
													<div class="col-sm-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="email"><i class="fas fa-address-card"></i></span>
															</div>
                                                            <input type="text" class="form-control" placeholder="Enter Email ID" aria-label="email" aria-describedby="email" name="email_id" value="<?php if($_REQUEST['id']) { echo $company_fetch_arr['email_id']; } ?>">														
														</div>
													</div>
													<label for="logo" class="col-sm-2 col-form-label text-right">LOGO</label>
													<div class="col-sm-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="logo"><i class="fas fa-percentage"></i></span>
															</div>
															<input type="file" class="form-control" placeholder="Upload Logo" aria-label="LOGO" aria-describedby="LOGO" name="file" value="<?php if($_REQUEST['id']) { echo $company_fetch_arr['img']; } ?>">
														</div>
													</div>
												</div>
                                                <div class="row">
													<label for="pan_no" class="col-sm-2 col-form-label">PAN Number</label>
													<div class="col-sm-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="pan_no"><i class="fas fa-address-card"></i></span>
															</div>
                                                            <input type="text" class="form-control" placeholder="Enter PAN Number" aria-label="pan_no" aria-describedby="pan_no" name="pan_no" required = "true" value="<?php if($_REQUEST['id']) { echo $company_fetch_arr['pan_no']; } ?>">														
														</div>
													</div>
													<label for="tagline" class="col-sm-2 col-form-label text-right">Tag Line</label>
													<div class="col-sm-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="tagline"><i class="fas fa-address-card"></i></span>
															</div>
                                                            <input type="text" class="form-control" placeholder="Enter Tag Line" aria-label="pan_no" aria-describedby="tagline" name="tagline" required = "true" value="<?php if($_REQUEST['id']) { echo $company_fetch_arr['tagline']; } ?>">														
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_name" class="col-sm-2 col-form-label">Address</label>
													<div class="col-sm-10 col-lg-10 col-md-10">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="address"><i class="fas fa-percentage"></i></span>
															</div>
															<textarea class="form-control" placeholder="Enter Address" aria-label="address" aria-describedby="address" name="address" required = "true"><?php if($_REQUEST['id']) { echo $company_fetch_arr['address']; } ?></textarea>
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
								<h4 class="mb-0">Company Details Report</h4>
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
												<th>GST Number</th>
												<th>Firm Name</th>
												<th>State Name</th>
												<th>PAN Number</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$company = "SELECT * from company_details  WHERE status = 0";
												$company_rs = mysqli_query($con, $company);
												while($company_arr = mysqli_fetch_array($company_rs))
												{
                                                    $state = "select * from state_master where id = '$company_arr[state_name]'";
													$state_rs = mysqli_query($con, $state);
													$state_arr = mysqli_fetch_array($state_rs);
                                                    ?>
                                                        <tr>
                                                                <td ><?php echo $i++; ?></td>
                                                                <td><?php echo $company_arr['gst_no']; ?></td>
																<td><?php echo $company_arr['firm_name']; ?></td>
                                                                <td><?php echo ucwords(strtolower($state_arr['state_name'])).' ('.$state_arr['state_code'].' - '.$state_arr['state_form'].')' ?></td>
																<td><?php echo $company_arr['pan_no']; ?></td>
																<td>
																	<div class="btn-group">
																		<button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
																		<div class="dropdown-menu p-0">
																			<a class="dropdown-item" href="company-details.php?id=<?php echo $company_arr['id']; ?>&view=0">Edit</a>
																			<div class="dropdown-divider"></div>
																			<a class="dropdown-item" href="company-detailsdb.php?id=<?php echo $company_arr['id']; ?>&delete=1">Delete</a>
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
												<th>GST Number</th>
												<th>Firm Name</th>
												<th>State Name</th>
												<th>PAN Number</th>
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
		<script src="dist/vendors/select2/js/select2.full.min.js"></script>
		<script src="dist/js/select2.script.js"></script>
		<script>
			moment().format('DD/MM/YYYY');
		</script>