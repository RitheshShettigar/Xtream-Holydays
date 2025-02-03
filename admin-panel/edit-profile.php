<?php include ("config.php");
	error_reporting(0);
	   session_start();
	   $sql = "SELECT * from emp_master WHERE user_id = '$_SESSION[userid]'";
	   $rs = mysqli_query($con, $sql);
	   $rs_arr = mysqli_fetch_array($rs);
	   $_SESSION['emp_id']=$rs_arr['id'];
	
	$sql1 = "SELECT * from social_media WHERE user_id = '$_SESSION[userid]' AND emp_id = '$rs_arr[id]'";
	$rs1 = mysqli_query($con, $sql1);
	$rs_arr1 = mysqli_fetch_array($rs1);
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
				<div class="col-12 mt-3">
					<div class="position-relative">
						<div class="background-image-maker py-5" style="background-image: url(&quot;dist/images/profile-cover.jpg&quot;);"></div>
						<div class="holder-image">
							<img src="dist/images/profile-cover.jpg" alt="" class="img-fluid d-none">
						</div>
						<div class="position-relative">
							<div class="media d-md-flex d-block">
								<form action="upload.php" method="post" id="ppupload" enctype="multipart/form-data" >
									<article class="profile-overlay">
										<img src="dist/images/employee/<?php if($rs_arr['profile_pic']) { echo $rs_arr['profile_pic']; } else { echo 'profile3.jpg'; } ?>" id="profileImage" alt="user-image" width="250" class="profile-image">
										<div class="overlay-text" id="profile-overlay">
										</div>
										<input type="file" accept=".jpg, .jpeg, .png, .gif" name="profile_pic" id="uploadProfile" onchange="fastPreview(this)" class="profile-input">
									</article>
								</form>
								<div class="media-body align-self-end pt-5 z-index-1">
									<div class="pl-4">
										<h1 class="display-4 text-uppercase text-white mb-0"><?php echo $rs_arr['name']; ?></h1>
										<h6 class="text-uppercase text-white mb-0"><?php echo $rs_arr['position']; ?></h6>
									</div>
									<div class="profile-menu mt-4 theme-background border 			border-left-0 border-right-0 z-index-1 p-2">
										<div class="tabbable-panel">
											<div class="tabbable-line">
												<ul class="nav nav-pills flex-column flex-sm-row">
													<li class="nav-item ml-0">
														<a href="#tab_default_1" data-toggle="tab" class="nav-link  py-2 px-3 px-lg-4  active">
														Personal Details </a>
													</li>
													<li class="nav-item ml-0">
														<a href="#tab_default_2" data-toggle="tab" class="nav-link  py-2 px-3 px-lg-4">
														Social Media Account </a>
													</li>
													<li class="nav-item ml-0">
														<a href="#tab_default_3" data-toggle="tab" class="nav-link  py-2 px-3 px-lg-4">
														Account Settings</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
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
							<div class="tab-content">
								<div class="tab-pane active" id="tab_default_1">
									<div class="card-content" id="timeline">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<form method="post" action="profile-update.php"  enctype="multipart/form-data">
														<div class="row">
															<label for="emp_code" class="col-sm-2 col-form-label">Employee Code</label>
															<div class="col-sm-10">
																<div class="input-group mb-3">
																	<div class="input-group-prepend">
																		<span class="input-group-text bg-transparent border-right-0" id="emp_code"><i class="icon-options"></i></span>
																	</div>
																	<input type="text" class="form-control" placeholder="Employee Code" aria-label="emp_code" aria-describedby="employee_code" name="emp_code" value="<?php echo $rs_arr['emp_code']; ?>" readonly = "true">
																</div>
															</div>
														</div>
														<div class="row">
															<label for="emp_joindate" class="col-sm-2 col-form-label">Emp Joining Date</label>
															<div class="col-sm-10">
																<div class="input-group mb-3">
																	<div class="input-group-prepend">
																		<span class="input-group-text bg-transparent border-right-0" id="doj"><i class="icon-calendar"></i></span>
																	</div>
																	<input type="date" class="form-control" placeholder="Employee Joining Date" aria-label="emp_joindate" aria-describedby="doj" name="doj" value = "<?php echo $rs_arr['doj']; ?>" readonly = "true">
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
																	<input type="text" class="form-control" placeholder="Employee Name" aria-label="emp_name" aria-describedby="Employee Name" name="name" value = "<?php echo $rs_arr['name']; ?>" required = "true">
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
																	<input type="number" class="form-control" placeholder="Employee Contact Number" aria-label="emp_phno" aria-describedby="emp_phno" name="contact" value = "<?php echo $rs_arr['contact']; ?>" required = "true">
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
																	<input type="email" class="form-control" placeholder="Employee Email ID" aria-label="email_id" aria-describedby="Email ID" name="email" value = "<?php echo $rs_arr['email']; ?>" required = "true">
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
																	<input type="text" class="form-control" placeholder="Employee Position" aria-label="position" aria-describedby="position" name="position" value = "<?php echo $rs_arr['position']; ?>" readonly = "true">
																</div>
															</div>
														</div>
														<div class="row">
															<label for="emp_dob" class="col-sm-2 col-form-label">Date of Birth</label>
															<div class="col-sm-10">
																<div class="input-group mb-3">
																	<div class="input-group-prepend">
																		<!-- <span class="input-group-text bg-transparent border-right-0" id="dob"><i class="icon-calendar"></i></span> -->
																	</div>
																	<input type="date" class="form-control" placeholder="Employee DOB" aria-label="dob" aria-describedby="emp_dob" name="dob" value = "<?php echo $rs_arr['dob']; ?>">
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
																	<input type="text" class="form-control" placeholder="Employee Address" aria-label="emp_addr" aria-describedby="emp_addr" name="address" value = "<?php echo $rs_arr['address']; ?>">
																</div>
															</div>
														</div>
														<div class="form-group row">
															<div class="col-sm-2">Gender</div>
															<div class="col-sm-10">
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" class="custom-control-input" id="chkinfo" name="gender" value="Male" <?php if($rs_arr['gender'] == 'Male') { echo "checked"; } ?>>
																	<label class="custom-control-label checkbox-info" for="chkinfo">Male</label>
																</div>
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" class="custom-control-input"  id="chkinfo1" name="gender" value="Female" <?php if($rs_arr['gender'] == 'Female') { echo "checked"; } ?>>
																	<label class="custom-control-label checkbox-info" for="chkinfo1">Female</label>
																</div>
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" class="custom-control-input"  id="chkinfo2" name="gender" value="Other" <?php if($rs_arr['gender'] == 'Other') { echo "checked"; } ?>>
																	<label class="custom-control-label checkbox-info" for="chkinfo2">Other</label>
																</div>
															</div>
														</div>
														<div class="form-group row">
															<div class="col-sm-2">Blood Group</div>
															<div class="col-sm-10">
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" class="custom-control-input" id="bg" name="bg" value="A+" <?php if($rs_arr['bg'] == 'A+') { echo "checked"; } ?>>
																	<label class="custom-control-label checkbox-info" for="bg">A+</label>
																</div>
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" class="custom-control-input"  id="bg1" name="bg" value="A-" <?php if($rs_arr['bg'] == 'A-') { echo "checked"; } ?>>
																	<label class="custom-control-label checkbox-info" for="bg1">A-</label>
																</div>
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" class="custom-control-input"  id="bg2" name="bg" value="B+" <?php if($rs_arr['bg'] == 'B+') { echo "checked"; } ?>>
																	<label class="custom-control-label checkbox-info" for="bg2">B+</label>
																</div>
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" class="custom-control-input"  id="bg3" name="bg" value="B-" <?php if($rs_arr['bg'] == 'B-') { echo "checked"; } ?>>
																	<label class="custom-control-label checkbox-info" for="bg3">B-</label>
																</div>
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" class="custom-control-input"  id="bg4" name="bg" value="O+" <?php if($rs_arr['bg'] == 'O+') { echo "checked"; } ?>>
																	<label class="custom-control-label checkbox-info" for="bg4">O+</label>
																</div>
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" class="custom-control-input"  id="bg5" name="bg" value="O-" <?php if($rs_arr['bg'] == 'O-') { echo "checked"; } ?>>
																	<label class="custom-control-label checkbox-info" for="bg5">O-</label>
																</div>
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" class="custom-control-input"  id="bg6" name="bg" value="AB+" <?php if($rs_arr['bg'] == 'AB+') { echo "checked"; } ?>>
																	<label class="custom-control-label checkbox-info" for="bg6">AB+</label>
																</div>
																<div class="custom-control custom-radio custom-control-inline">
																	<input type="radio" class="custom-control-input"  id="bg7" name="bg" value="AB-" <?php if($rs_arr['bg'] == 'AB-') { echo "checked"; } ?>>
																	<label class="custom-control-label checkbox-info" for="bg7">AB-</label>
																</div>
															</div>
														</div>
														<div class="form-group row">
															<div class="col-sm-2">Govt. ID Proof</div>
															<div class="col-sm-3">
																<select id="inputState" class="form-control" name="id_type" >
																	<option selected="">Select ID...</option>
																	<option value = "Aadhar" <?php if($rs_arr['id_type'] == 'Aadhar') { echo "selected"; } ?> >Aadhar Card</option>
																	<option value = "Pan" <?php if($rs_arr['id_type'] == 'Pan') { echo "selected"; } ?>>Pan Card</option>
																	<option value = "Voterid" <?php if($rs_arr['id_type'] == 'Voterid') { echo "selected"; } ?>>Election Voter ID</option>
																	<option value = "License" <?php if($rs_arr['id_type'] == 'License') { echo "selected"; } ?>>Driving License</option>
																	<option value = "Passport" <?php if($rs_arr['id_type'] == 'Passport') { echo "selected"; } ?>>Passport</option>
																</select>
															</div>
															<div class="col-sm-3">
																<div class="input-group mb-3">
																	<input type="text" class="form-control" placeholder="ID Number" aria-label="id_number" aria-describedby="ID Number" name="id_no" value = "<?php echo $rs_arr['id_no']; ?>">
																</div>
															</div>
															<div class="col-sm-3">
																<label for="fileUpload1" class="file-upload btn btn-primary btn-block"><i class="fa fa-upload mr-2"></i>Browse Id Card ...<input id="fileUpload1" type="file" name="id_file" value = "<?php echo $rs_arr['id_file']; ?>">
																<input  type="hidden" name="idfile" value = "<?php echo $rs_arr['id_file']; ?>"></label>
															</div>
														</div>
														<div class="form-group row">
															<div class="col-sm-2">Bank Details</div>
															<div class="col-sm-2">
																<div class="input-group mb-3">
																	<input type="text" class="form-control" placeholder="Person Name" aria-label="person_name" aria-describedby="Person Name" name="bank_holder" value = "<?php echo $rs_arr['bank_holder']; ?>">
																</div>
															</div>
															<div class="col-sm-2">
																<div class="input-group mb-3">
																	<input type="text" class="form-control" placeholder="Bank Name" aria-label="bank_name" aria-describedby="Bank Name" name="bank_name" value = "<?php echo $rs_arr['bank_name']; ?>" >
																</div>
															</div>
															<div class="col-sm-2">
																<div class="input-group mb-3">
																	<input type="text" class="form-control" placeholder="Account Number" aria-label="acc_no" aria-describedby="Account Number" name="bank_ac_no" value = "<?php echo $rs_arr['bank_ac_no']; ?>">
																</div>
															</div>
															<div class="col-sm-2">
																<div class="input-group mb-3">
																	<input type="text" class="form-control" placeholder="IFSC Code" aria-label="ifsc_code" aria-describedby="IFSC Code" name="ifsc" value = "<?php echo $rs_arr['ifsc']; ?>">
																</div>
															</div>
															<div class="col-sm-2">
																<label for="fileUpload" class="file-upload btn btn-primary btn-block"><i class="fa fa-upload mr-2"></i>Browse Document ...<input id="fileUpload" type="file" name="bank_file" value = "<?php echo $rs_arr['bank_file']; ?>">
																<input  type="hidden" name="bankfile" value = "<?php echo $rs_arr['id_file']; ?>"></label>
															</div>
														</div>
														<div class="form-group row">
															<div class="col-sm-10">
																<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab_default_2">
									<div class="card-content" id="profile">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<form method="post" action="links-update.php"  enctype="multipart/form-data">
														<div class="form-group col-sm-12">
															<div class="input-group  mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fab  h5 mr-2 fa-facebook-f"></i></span>
																</div>
																<input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook Link" aria-label="Facebook Link" aria-describedby="basic-addon1" value = "<?php echo $rs_arr1['facebook']; ?>">
															</div>
														</div>
														<div class="form-group col-sm-12">
															<div class="input-group  mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fab  h5 mr-2 fa-instagram"></i></span>
																</div>
																<input type="text" name="instagram" id="instagram" class="form-control" placeholder="Instagram Link" aria-label="Instagram Link" aria-describedby="basic-addon1" value = "<?php echo $rs_arr1['instagram']; ?>">
															</div>
														</div>
														<div class="form-group col-sm-12">
															<div class="input-group  mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fab  h5 mr-2 fa-linkedin-in"></i></span>
																</div>
																<input type="text" name="linkedin" id="linkedin" class="form-control" placeholder="Linkedin Link" aria-label="Linkedin Link" aria-describedby="basic-addon1" value = "<?php echo $rs_arr1['linkedin']; ?>">
															</div>
														</div>
														<div class="form-group col-sm-12">
															<div class="input-group  mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="fab  h5 mr-2 fa-twitter"></i></span>
																</div>
																<input type="text" name="twitter" id="facebook" class="form-control" placeholder="Twitter Link" aria-label="Twitter Link" aria-describedby="basic-addon1" value = "<?php echo $rs_arr1['twitter']; ?>">
															</div>
														</div>
														<div class="col-sm-10">
															<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php 
									$user_detail = "select * from user WHERE id = '$rs_arr[user_id]'";
									$user_detail_rs = mysqli_query($con, $user_detail);
									$user_detail_arr = mysqli_fetch_array($user_detail_rs);
								?>
								<div class="tab-pane" id="tab_default_3">
									<div class="card-content" id="profile">
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<form method="post" action="account-update.php"  enctype="multipart/form-data">
													<div class="form-group col-sm-4">
															<label for="userid">Username</label>
															<div class="input-group mb-3">                                                
																<input type="text" class="form-control" placeholder="username" aria-label="username" aria-describedby="username" id="username" name="username" value = "<?php echo $user_detail_arr['username']; ?>" required = "true">
																<div class="input-group-append">
																	<span class="input-group-text bg-transparent border-left-0" ><i class="icon-user"></i></span>
																</div>
															</div>
														</div>
														<div class="form-group col-sm-4">
															<label for="email">Email-Id</label>
															<div class="input-group mb-3">                                                
																<input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-email" id="email" name="email" value = "<?php echo $user_detail_arr['email']; ?>" required = "true">
																<div class="input-group-append">
																	<span class="input-group-text bg-transparent border-left-0" ><i class="icon-envelope"></i></span>
																</div>
															</div>
														</div>
														<div class="form-group col-sm-4">
															<label for="email">Contact</label>
															<div class="input-group mb-3">                                                
																<input type="text" class="form-control" placeholder="Contact Number" aria-label="Contact" aria-describedby="basic-Contact" id="mobile" name="mobile" value = "<?php echo $user_detail_arr['mobile']; ?>">
																<div class="input-group-append">
																	<span class="input-group-text bg-transparent border-left-0" ><i class="icon-envelope"></i></span>
																</div>
															</div>
														</div>
														
														<div class="form-group col-sm-4">
															<label for="new password">New Password</label>
															<div class="input-group mb-3">          
																<input type = "hidden" name = "opassword" value = "<?php echo $user_detail_arr['password'] ?>">
																<input id="password-field1" type="password" class="form-control" placeholder="New Password" name="npassword" value = "">
																<div class="input-group-append">
																	<!-- <i toggle="#password-field" class="mdi h5 mr-2 mdi-eye-circle-outline "></i> -->
																	<span  class="input-group-text bg-transparent border-left-0 ">
																		<i toggle="#password-field1" class=" far fa-eye toggle-password"></i>
																	</span>
																</div>	
															</div>
														</div>
														<div class="col-sm-10">
															<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
														</div>
													</form>
												</div>
											</div>
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
		<script>
			//Profile Image Upload
			const profileOverlay = document.getElementById('profile-overlay')
			const profileImage = document.getElementById('profileImage')
			const uploadProfile = document.getElementById('uploadProfile')
			const updBtn = document.getElementById('updateProfileButton')
			//imitate click on picture towards file input
			profileOverlay.addEventListener('click', ()=>{
			uploadProfile.click();
			})
			const fastPreview = ( uploader ) => {
			
			         document.getElementById("ppupload").submit();
			}
		</script>
		<script>
			$(".toggle-password").click(function() {
				$(this).toggleClass("fa-eye-slash");
				var input = $($(this).attr("toggle"));
				if (input.attr("type") == "password") 
				{
					input.attr("type", "text");
				} else {
					input.attr("type", "password");
				}
			});
		</script>
		
