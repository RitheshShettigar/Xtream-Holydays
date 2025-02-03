<?php include ("config.php");
	error_reporting(0);
 
	 if($_REQUEST['id'])
	 { 
	 	$bank_fetch = "select * from bank_details where id = '$_REQUEST[id]'";
	 	$bank_fetch_rs = mysqli_query($con, $bank_fetch);
	 	$bank_fetch_arr = mysqli_fetch_array($bank_fetch_rs);
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
										<h4 class="mb-0">Update Bank Details</h4>
										<?php
									}
									else
									{
										?>
											<h4 class="mb-0">Add Bank Details</h4>
										<?php
									}
								?>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Bank Details</li>
								<li class="breadcrumb-item active">
									<?php 
										if($_REQUEST['id'])
										{
											?>
											Update Bank Details
											<?php
										}
										else
										{
											?>
												Add Bank Details
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
											<form method="post" action="bank_detailsdb.php"  enctype="multipart/form-data">
												<div class="row">
													<label for="emp_name" class="col-sm-2 col-form-label">Account Holder Name</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="acc_holder_name"><i class="fas fa-user"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Enter Account Holder Name" aria-label="acc_holder_name" aria-describedby="acc_holder_name" name="acc_holder_name" required = "true" value="<?php if($_REQUEST['id']) { echo $bank_fetch_arr['acc_holder_name']; } ?>">
															<input type="hidden" name="id" value="<?php echo $bank_fetch_arr['id']; ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_phno" class="col-sm-2 col-form-label">Bank Name</label>
													<div class="col-sm-4 col-lg-4 col-md-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="bank_name"><i class="far fa-money-bill-alt	"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Enter Bank Name" aria-label="contact_num" aria-describedby="bank_name" name="bank_name" required = "true" value="<?php if($_REQUEST['id']) { echo $bank_fetch_arr['bank_name']; } ?>">
														</div>
													</div>
                                                    <label for="emp_phno" class="col-sm-2 col-form-label text-right">Branch Name</label>
                                                    <div class="col-sm-4 col-lg-4 col-md-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="branch_name"><i class="fas fa-landmark	"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Enter Branch Name" aria-label="branch_name" aria-describedby="branch_name" name="branch_name" required = "true" value="<?php if($_REQUEST['id']) { echo $bank_fetch_arr['branch_name']; } ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_name" class="col-sm-2 col-form-label">Account Number</label>
													<div class="col-sm-4 col-lg-4 col-md-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="acc_no"><i class="fas fa-credit-card"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Enter Account Number" aria-label="acc_no" aria-describedby="acc_no" name="acc_no" required = "true" value="<?php if($_REQUEST['id']) { echo $bank_fetch_arr['acc_no']; } ?>">
														</div>
													</div>
                                                    <label for="emp_name" class="col-sm-2 col-form-label text-right">IFSC Code</label>
													<div class="col-sm-4 col-lg-4 col-md-4">
														<div class="input-group mb-1">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="ifsc_code"><i class="fas fa-file-invoice	"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Enter IFSC Code" aria-label="ifsc_code" aria-describedby="ifsc_code" name="ifsc_code" required = "true" value="<?php if($_REQUEST['id']) { echo $bank_fetch_arr['ifsc_code']; } ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="position" class="col-sm-2 col-form-label">Account Type</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="acc_type"><i class="fas fa-file-invoice-dollar	"></i></span>
															</div>
															<select data-select2-id="3" tabindex="-1" class="form-control" aria-hidden="true" name="acc_type" id="acc_type">
																<option label="Select Account Type" value="">Select Account Type</option>
																<option label="Saving Account" value="Saving Account" <?php if($_REQUEST['id']) { if($bank_fetch_arr['acc_type'] == 'Saving Account') { echo "selected"; } } ?>>Saving Account</option>
																<option label="Current Account" value="Current Account" <?php if($_REQUEST['id']) { if($bank_fetch_arr['acc_type'] == 'Current Account') { echo "selected"; } } ?>>Current Account</option>
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
								<h4 class="mb-0">Bank Details Report</h4>
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
												<th>Acc Holder Name</th>
												<th>Bank Name</th>
												<th>Branch Name</th>
												<th>Account Number</th>
												<th>IFSC Code</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$bank = "SELECT * from bank_details  WHERE status = 0";
												$bank_rs = mysqli_query($con, $bank);
												while($bank_arr = mysqli_fetch_array($bank_rs))
												{
                                                    ?>
                                                        <tr>
                                                                <td ><?php echo $i++; ?></td>
                                                                <td><?php echo ucwords(strtolower($bank_arr['acc_holder_name'])); ?></td>
																<td><?php echo ucwords(strtolower($bank_arr['bank_name'])); ?></td>
                                                                <td><?php echo ucwords(strtolower($bank_arr['branch_name'])); ?></td>
																<td><?php echo $bank_arr['acc_no']; ?></td>
																<td><?php echo $bank_arr['ifsc_code']; ?></td>
																<td>
																	<div class="btn-group">
																		<button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
																		<div class="dropdown-menu p-0">
																			<a class="dropdown-item" href="bank_detailsdb.php?id=<?php echo $bank_arr['id']; ?>&view=0">Edit</a>
																			<div class="dropdown-divider"></div>
																			<a class="dropdown-item" href="bank_detailsdb.php?id=<?php echo $bank_arr['id']; ?>&delete=1">Delete</a>
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
												<th>Acc Holder Name</th>
												<th>Bank Name</th>
												<th>Branch Name</th>
												<th>Account Number</th>
												<th>IFSC Code</th>
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