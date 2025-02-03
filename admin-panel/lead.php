<?php include ("config.php");
	error_reporting(0);
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
								<h4 class="mb-0">Add New Lead</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Lead</li>
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
											<form method="post" action="lead-database.php"  enctype="multipart/form-data">
												<div class="row">
													<label for="emp_code" class="col-sm-2 col-form-label">Contact Person Name</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" ><i class="icon-user"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Contact Person Name" aria-label="person_name" aria-describedby="person_name" name="cp_name" id="cp_name">
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
															<input type="number" class="form-control" placeholder="Contact Person Number" aria-label="person_number" aria-describedby="person_number" name="cp_number" id="cp_number">
															
														</div>
													</div>
                                                    <div class="col-sm-5">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" ><i class="icon-phone"></i></span>
															</div>
															<input type="number" class="form-control" placeholder=" Alternate Contact Number" aria-label="person_number" aria-describedby="person_number" name="cp_anumber" id="cp_anumber">
															
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
															<input type="text" class="form-control" placeholder="Contact Person Email-Id" aria-label="person_email" aria-describedby="person_email" name="cp_email" id="cp_email">
														</div>
													</div>
                                                    <div class="col-sm-5">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" ><i class="icon-envelope"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Alternate Email-Id" aria-label="person_email" aria-describedby="person_email" name="cp_aemail" id="cp_aemail">
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
															<input type="text" class="form-control" placeholder="Location" aria-label="location" aria-describedby="location" name="location" id="location">
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
															<input type="text" class="form-control" placeholder=" Website URL" aria-label="Website" aria-describedby="Website" name="website" id="website">
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
															<input type="text" class="form-control" placeholder=" Requirment" aria-label="requirment" aria-describedby="requirment" name="query" id="query">
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
															<input type="date" class="form-control" placeholder="date" aria-label="date" aria-describedby="date" name="date" id="date" value = "<?php echo date('Y-m-d')?>">
														</div>
													</div>
												</div>
                                                <div class="row">
													<label for="date" class="col-sm-2 col-form-label">Follow Up-date</label>
													<div class="col-sm-5">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
															</div>
															<input type="date" class="form-control" min = "<?php echo date('Y-m-d'); ?>" placeholder=" Follow Up-date" aria-label="update" aria-describedby="update" name="follow_update" id="follow_update">
														</div>
													</div>
													<div class="col-sm-5">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
															</div>
															<input type="time" class="form-control"  placeholder=" Follow Up-date" aria-label="update" aria-describedby="update" name="follow_uptime" id="follow_uptime">
														</div>
													</div>
												</div>
                                                <div class="row">
													<label for="position" class="col-sm-2 col-form-label">Message</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															
															<textarea rows = "4" column = "50" class="form-control" placeholder="Extra Details " aria-label="message" aria-describedby="message" name="comment" id="comment"></textarea>
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
			</div>
		</main>
		<!-- END: Content-->
		<?php include "dist/footer/index.php"; ?>

		<script>
			moment().format('DD/MM/YYYY');
		</script>