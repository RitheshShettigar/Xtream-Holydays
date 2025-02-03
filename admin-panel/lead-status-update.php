<?php include("config.php");
	error_reporting(0);
	if($_REQUEST['id'])
	{
	    
	    $lead = "select * from leads where id = '$_REQUEST[id]'";
	    $lead_rs = mysqli_query($con, $lead);
	    $lead_arr = mysqli_fetch_array($lead_rs);
	
	    $lead_status = "select * from lead_status where lead_id='$lead_arr[id]' order by id desc limit 1";
	    $lead_status_rs = mysqli_query($con,$lead_status);
	    $lead_status_arr = mysqli_fetch_array($lead_status_rs);
	
	    
	    $lead_status1 = "select * from lead_status where lead_id='$lead_arr[id]' order by id desc";
	    $lead_status_rs1 = mysqli_query($con,$lead_status1);
	    
	}
	else
	{
	    ?>
		<script>
			window.location.href="leads-report.php";
		</script>
		<?php
	}
	
	?>
<!DOCTYPE html>
<html lang="en">
	<!-- START: Head-->
	<head>
		<meta charset="UTF-8">
		<title>Xtream Holiday Admin</title>
		<?php include ("dist/header/index.php"); ?>
		<?php include ("dist/navbar/sidebar.php"); ?>
		<main>
			<div class="container-fluid">
				<!-- START: Breadcrumbs-->
				<div class="row ">
					<div class="col-12  align-self-center">
						<div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
							<div class="w-sm-100 mr-auto">
								<h4 class="mb-0">Website Lead Details</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Leads</li>
								<li class="breadcrumb-item active"><a href="#">Website Leads</a></li>
							</ol>
						</div>
					</div>
				</div>
				<!-- END: Breadcrumbs-->
				<!-- START: Card Data-->
				<div class="row">
					<div class="col-12 col-md-12 mt-4">
						<div class="card">
							<div class="card-body">
								<form method="post" action="lead-status-database.php"  enctype="multipart/form-data">
									<div class="row">
										<label for="emp_code" class="col-sm-2 col-form-label">Contact Person Name</label>
										<div class="col-sm-10">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0" ><i class="icon-user"></i></span>
												</div>
												<input type="text" class="form-control" placeholder="Contact Person Name" aria-label="person_name" aria-describedby="person_name" name="cp_name" id="cp_name" value="<?php echo ucwords(strtolower($lead_arr['cp_name'])); ?>" readonly="true">
											</div>
										</div>
									</div>
									<div class="row">
										<label for="emp_name" class="col-sm-2 col-form-label">Contact Person Number</label>
										<div class="col-sm-5">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0" ><i class="icon-phone"></i></span>
												</div>
												<input type="number" class="form-control" placeholder="Contact Person Number" aria-label="person_number" aria-describedby="person_number" name="cp_number" id="cp_number" value="<?php echo $lead_arr['cp_number']; ?>"  readonly="true">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0" ><i class="icon-phone"></i></span>
												</div>
												<input type="number" class="form-control" placeholder=" Alternate Contact Number" aria-label="person_number" aria-describedby="person_number" name="cp_anumber" id="cp_anumber" value="<?php echo $lead_arr['cp_anumber']; ?>"  readonly="true">
											</div>
										</div>
									</div>
									<div class="row">
										<label for="emp_phno" class="col-sm-2 col-form-label">Contact Person Email-Id</label>
										<div class="col-sm-5">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0" ><i class="icon-envelope"></i></span>
												</div>
												<input type="text" class="form-control" placeholder="Contact Person Email-Id" aria-label="person_email" aria-describedby="person_email" name="cp_email" id="cp_email" value="<?php echo $lead_arr['cp_email']; ?>"  readonly="true">
											</div>
										</div>
										<div class="col-sm-5">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0" ><i class="icon-envelope"></i></span>
												</div>
												<input type="text" class="form-control" placeholder="Alternate Email-Id" aria-label="person_email" aria-describedby="person_email" name="cp_aemail" id="cp_aemail" value="<?php echo $lead_arr['cp_aemail']; ?>"  readonly="true">
											</div>
										</div>
									</div>
									<div class="row">
										<label for="emp_name" class="col-sm-2 col-form-label">Location</label>
										<div class="col-sm-10">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0" ><i class="icon-map"></i></span>
												</div>
												<input type="text" class="form-control" placeholder="Location" aria-label="location" aria-describedby="location" name="location" id="location" value="<?php echo $lead_arr['location']; ?>"  readonly="true">
											</div>
										</div>
									</div>
									<div class="row">
										<label for="position" class="col-sm-2 col-form-label">Website</label>
										<div class="col-sm-10">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0" ><i class="icon-globe"></i></span>
												</div>
												<input type="text" class="form-control" placeholder=" Website URL" aria-label="Website" aria-describedby="Website" name="website" id="website" value="<?php echo $lead_arr['website']; ?>"  readonly="true">
											</div>
										</div>
									</div>
									<div class="row">
										<label for="position" class="col-sm-2 col-form-label">Requirment</label>
										<div class="col-sm-10">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0" ><i class="icon-briefcase"></i></span>
												</div>
												<input type="text" class="form-control" placeholder=" Requirment" aria-label="requirment" aria-describedby="requirment" name="query" id="query" value="<?php echo $lead_arr['query']; ?>"  readonly="true">
											</div>
										</div>
									</div>
									<div class="row">
										<label for="date" class="col-sm-2 col-form-label">Date</label>
										<div class="col-sm-10">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
												</div>
												<input type="date" class="form-control" placeholder="date" aria-label="date" aria-describedby="date" name="date" id="date" value="<?php echo $lead_arr['date']; ?>" readonly = "true"  readonly="true">
											</div>
										</div>
									</div>
									<!--<div class="row">
										<label for="date" class="col-sm-2 col-form-label">Follow Up-date</label>
										<div class="col-sm-10">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
												</div>
												<input type="datetime-local" class="form-control" placeholder=" Follow Up-date" aria-label="update" aria-describedby="update" name="follow_update" id="follow_update" value="<?php echo $lead_arr['follow_update']; ?>">
											</div>
										</div>
									</div>-->
									<div class="row">
										<label for="position" class="col-sm-2 col-form-label">Message</label>
										<div class="col-sm-10">
											<div class="input-group mb-3">
												<textarea rows = "4" column = "50" class="form-control" placeholder="Extra Details " aria-label="message" aria-describedby="message" name="comment" id="comment"  readonly="true"><?php echo $lead_arr['comment']; ?> </textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<label for="date" class="col-sm-2 col-form-label">Follow-Up Date</label>
										<div class="col-sm-10">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
												</div>
												<input type="datetime-local" class="form-control" placeholder="date" aria-label="date" aria-describedby="date" name="date1" id="date1" value="<?php echo $lead_arr['follow_update'] ?>" min="<?php echo date('Y-m-d').'T'.date('H:m'); ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<label for="position" class="col-sm-2 col-form-label">Status</label>
										<div class="col-sm-10">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text bg-transparent border-right-0" ><i class="icon-options"></i></span>
												</div>
												<select name = "status" id = "status" class = "form-control">
                                                    <option>Select Status</option>
													<option value ="Assigned" <?php if($lead_status_arr['status'] == 'Assigned') { echo "selected"; } ?>>Assigned</option>
													<option value ="In-Process" <?php if($lead_status_arr['status'] == 'In-Process') { echo "selected"; } ?>>In-Process</option>
													<option value ="On Hold" <?php if($lead_status_arr['status'] == 'On Hold') { echo "selected"; } ?>>On Hold</option>
													<option value ="Completed" <?php if($lead_status_arr['status'] == 'Completed') { echo "selected"; } ?>>Completed</option>
													<option value ="Cancelled" <?php if($lead_status_arr['status'] == 'Cancelled') { echo "selected"; } ?>>Cancelled</option>
													<option value ="Pass To" <?php if($lead_status_arr['status'] == 'Pass To') { echo "selected"; } ?>>Pass To</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<label for="position" class="col-sm-2 col-form-label">Comment</label>
										<div class="col-sm-10">
											<div class="input-group mb-3">
												<textarea rows = "4" column = "50" class="form-control" placeholder="Extra Details " aria-label="message" aria-describedby="message" name="comment" id="comment" ></textarea>
											</div>
										</div>
										<div class="col-sm-12">
											<div class = "row">
												<?php
													while($lead_status_arr1 = mysqli_fetch_array($lead_status_rs1))
													{
													    $sql_fetch = "select * from user where id = '$lead_status_arr1[added_by]'";
													    $sql_fetch_rs = mysqli_query($con, $sql_fetch);
													    $sql_fetch_arr = mysqli_fetch_array($sql_fetch_rs)
													
													    ?>
												<div class="col-12 col-lg-6  col-xl-4 mt-3">
													<div class="card bg-light">
														<div class="card-header"><?php echo date('d-M-Y h:i A', strtotime($lead_status_arr1['created_at'])) ?></div>
														<div class="card-body">
															<h5 class="card-title"><?php echo $sql_fetch_arr['name'] ?></h5>
															<p class="card-text"><?php echo $lead_status_arr1['comment'] ?></p>
															<p class="card-text"><?php echo $lead_status_arr1['status'] ?></p>
														</div>
													</div>
												</div>
												<?php
													}
													?>
											</div>
										</div>
									</div>
									<div class="form-group row mt-5">
										<div class="col-sm-10">
											<input type = "hidden" name = "lead_id" value = "<?php echo $lead_arr['id'] ?>" >
											<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
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
		<?php include ("dist/footer/index.php"); ?>

		<script language="javascript">
            
			var today = new Date().toISOString().slice(0,16);
			document.getElementById('#date1')[0].min=today;
          
        </script>