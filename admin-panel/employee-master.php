<?php include ("config.php");
	error_reporting(0);
 ?>

<?php
	$emp= "SELECT max(id) as maxid from emp_master";
	$emp_rs=mysqli_query($con, $emp);
	$emp_arr=mysqli_fetch_array($emp_rs);
	$maxid = $emp_arr['maxid']+1;
	$empcode = "SCC".sprintf('%04d', $maxid);
?>
<!DOCTYPE html>
<html lang="en">
	<!-- START: Head-->
	<head>
		<meta charset="UTF-8">
		<title>Xtream Holiday Admin</title>
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
								<h4 class="mb-0">Add New Employee Data</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Employees</li>
								<li class="breadcrumb-item active"><a href="#">Add New</a></li>
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
											<form method="post" action="employee-database.php"  enctype="multipart/form-data">
												<div class="row">
													<label for="emp_code" class="col-sm-2 col-form-label">Employee Code</label>
													<div class="col-sm-3">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="emp_code"><i class="icon-options"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Employee Code" aria-label="emp_code" aria-describedby="employee_code" name="emp_code" value="<?php echo $empcode; ?>" readonly="true">
														</div>
													</div>
													<label for="emp_cat" class="col-sm-2 col-form-label">Employee Category</label>
													<div class="col-sm-5">
														<div class="col-sm-7">
															<select id="inputState" class="form-control" name="emp_cat">
																<option>Select Category...</option>
																<option value = "super_admin">Super Admin</option>
																<option value = "admin">Admin</option>
																<option value = "manager">Manager</option>
																<option value = "team_leader">Team Leader</option>
																<option value = "emp_1">Employee 1</option>
																<option value = "emp_2">Employee 2</option>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_name" class="col-sm-2 col-form-label">Employee Name</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="name"><i class="icon-user"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Employee Name" aria-label="emp_name" aria-describedby="Employee Name" name="name" required = "true">
															<input type="hidden" name="url" value="employee-master.php">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_phno" class="col-sm-2 col-form-label">Contact Number</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="contact"><i class="icon-phone"></i></span>
															</div>
															<input type="number" class="form-control" placeholder="Employee Contact Number" aria-label="emp_phno" aria-describedby="emp_phno" name="contact" required = "true">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_name" class="col-sm-2 col-form-label">Email ID</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="email"><i class="icon-envelope"></i></span>
															</div>
															<input type="email" class="form-control" placeholder="Employee Email ID" aria-label="email_id" aria-describedby="Email ID" name="email" required = "true">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="position" class="col-sm-2 col-form-label">Position</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="position"><i class="icon-briefcase"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Employee Position" aria-label="position" aria-describedby="position" name="position">
														</div>
													</div>
												</div>
												
												<div class="row">
													<label for="emp_dob" class="col-sm-2 col-form-label">Date of Birth</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="dob"><i class="icon-calendar"></i></span>
															</div>
															<input type="date" class="form-control" placeholder="Employee DOB" aria-label="dob" aria-describedby="emp_dob" name="dob" >
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_addr" class="col-sm-2 col-form-label">Address</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="address"><i class="icon-home"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Employee Address" aria-label="emp_addr" aria-describedby="emp_addr" name="address">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_joindate" class="col-sm-2 col-form-label">Joining Date</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="doj"><i class="icon-calendar"></i></span>
															</div>
															<input type="date" class="form-control" placeholder="Employee Joining Date" aria-label="emp_joindate" aria-describedby="doj" name="doj">
														</div>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-2">Gender</div>
													<div class="col-sm-10">
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input" id="chkinfo" name="gender" value="Male">
															<label class="custom-control-label checkbox-info" for="chkinfo">Male</label>
														</div>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input"  id="chkinfo1" name="gender" value="Female">
															<label class="custom-control-label checkbox-info" for="chkinfo1">Female</label>
														</div>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input"  id="chkinfo2" name="gender" value="Other">
															<label class="custom-control-label checkbox-info" for="chkinfo2">Other</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-2">Blood Group</div>
													<div class="col-sm-10">
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input" id="bg" name="bg" value="A+">
															<label class="custom-control-label checkbox-info" for="bg">A+</label>
														</div>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input"  id="bg1" name="bg" value="A-">
															<label class="custom-control-label checkbox-info" for="bg1">A-</label>
														</div>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input"  id="bg2" name="bg" value="B+">
															<label class="custom-control-label checkbox-info" for="bg2">B+</label>
														</div>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input"  id="bg3" name="bg" value="B-">
															<label class="custom-control-label checkbox-info" for="bg3">B-</label>
														</div>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input"  id="bg4" name="bg" value="O+">
															<label class="custom-control-label checkbox-info" for="bg4">O+</label>
														</div>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input"  id="bg5" name="bg" value="O-">
															<label class="custom-control-label checkbox-info" for="bg5">O-</label>
														</div>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input"  id="bg6" name="bg" value="AB+">
															<label class="custom-control-label checkbox-info" for="bg6">AB+</label>
														</div>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input"  id="bg7" name="bg" value="AB-">
															<label class="custom-control-label checkbox-info" for="bg7">AB-</label>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-2">Govt. ID Proof</div>
													<div class="col-sm-3">
														<select id="inputState" class="form-control" name="id_type">
															<option>Select ID...</option>
															<option value = "Aadhar">Aadhar Card</option>
															<option value = "Pan">Pan Card</option>
															<option value = "Voterid">Election Voter ID</option>
															<option value = "License">Driving License</option>
															<option value = "Passport">Passport</option>
														</select>
													</div>
													<div class="col-sm-3">
														<div class="input-group mb-3">
															<input type="text" class="form-control" placeholder="ID Number" aria-label="id_number" aria-describedby="ID Number" name="id_no">
														</div>
													</div>
													<div class="col-sm-3">
														<label for="fileUpload1" class="file-upload btn btn-primary btn-block"><i class="fa fa-upload mr-2"></i>Browse Id Card ...<input id="fileUpload1" type="file" name="id_file"></label>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-2">Bank Details</div>
													<div class="col-sm-2">
														<div class="input-group mb-3">
															<input type="text" class="form-control" placeholder="Person Name" aria-label="person_name" aria-describedby="Person Name" name="bank_holder">
														</div>
													</div>
													<div class="col-sm-2">
														<div class="input-group mb-3">
															<input type="text" class="form-control" placeholder="Bank Name" aria-label="bank_name" aria-describedby="Bank Name" name="bank_name">
														</div>
													</div>
													<div class="col-sm-2">
														<div class="input-group mb-3">
															<input type="text" class="form-control" placeholder="Account Number" aria-label="acc_no" aria-describedby="Account Number" name="bank_ac_no">
														</div>
													</div>
													<div class="col-sm-2">
														<div class="input-group mb-3">
															<input type="text" class="form-control" placeholder="IFSC Code" aria-label="ifsc_code" aria-describedby="IFSC Code" name="ifsc">
														</div>
													</div>
													<div class="col-sm-2">
														<label for="fileUpload" class="file-upload btn btn-primary btn-block"><i class="fa fa-upload mr-2"></i>Browse Document ...<input id="fileUpload" type="file" name="bank_file"></label>
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
			</div>
		</main>
		<!-- END: Content-->
		<?php include "dist/footer/index.php"; ?>

		<script>
			moment().format('DD/MM/YYYY');
		</script>