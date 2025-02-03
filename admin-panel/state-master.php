<?php include ("config.php");
	error_reporting(0);
	?>
<!DOCTYPE html>
<html lang="en">
	<!-- START: Head-->
	<head>
		<meta charset="UTF-8">
		<title>Xtream Holiday States</title>
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
								<h4 class="mb-0">State Master</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Hotel</li>
								<li class="breadcrumb-item active"><a href="#">State </a></li>
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
											<form method="post" action="state-insert.php"  enctype="multipart/form-data">
												<div class="row">
													<label for="country" class="col-sm-2 col-form-label">Select Country</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="country"><i class="fas fa-dollar-sign"></i></span>
															</div>
															<select class="form-control" name="country">
																<option label="Choose Country">Choose Country </option>
                                                                <?php
                                                                    $country = "select * from country";
                                                                    $country_rs = mysqli_query($con, $country);
                                                                    while($country_arr = mysqli_fetch_array($country_rs))
                                                                    { 
                                                                        ?>
                                                                            <option value="<?php echo $country_arr['id']; ?>"><?php echo $country_arr['country']; ?></option>
                                                                        <?php
                                                                    }
                                                                ?>
															</select>
														</div>
													</div>
                                                </div>
                                                 <div class="row">
													<label for="State" class="col-sm-2 col-form-label">State Name</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="state"><i class="fas fa-dollar-sign"></i></span>
                                                            </div>
                                                            <input type = "text" class="form-control" name="state" id="state" placeholder="Enter State Name">
														</div>
													</div>
                                                </div>
                                                 <div class="row">
													<label for="statecode" class="col-sm-2 col-form-label">State Code</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="statecode"><i class="fas fa-dollar-sign"></i></span>
                                                            </div>
                                                            <input type = "number" class="form-control" name="statecode" id="statecode" placeholder="Enter State Code">
														</div>
													</div>
                                                </div>
                                                 <div class="row">
													<label for="stateform" class="col-sm-2 col-form-label">State Short Form</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="stateform"><i class="fas fa-dollar-sign"></i></span>
                                                            </div>
                                                            <input type = "text" class="form-control" name="stateform" id="stateform" placeholder="Enter State Short Form">
														</div>
													</div>
                                                </div>
												<div class="row">
													<div class="col-sm-12">
														<div class="input-group mb-3">
														    <button type="submit" id="submit" name="submit" class="btn btn-primary">Add State</button>
                                                        </div>
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
								<h4 class="mb-0">Available States</h4>
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
												<th>Country</th>
												<th>State</th>
												<th>State Code</th>
												<th>State Form</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$sql_state_fetch = "SELECT * from state_master  WHERE status = 0";
												$sql_state_fetch_rs = mysqli_query($con, $sql_state_fetch);
												while($sql_state_fetch_arr = mysqli_fetch_array($sql_state_fetch_rs))
												{
                                                    $sql_country_fetch = "select * from country where id='$sql_state_fetch_arr[country_id]'";
                                                    $sql_country_fetch_rs = mysqli_query($con, $sql_country_fetch);
                                                    $sql_country_fetch_arr = mysqli_fetch_array($sql_country_fetch_rs);
                                                    ?>
                                                        <tr>
                                                            <form method="post" action="state-update.php">
                                                                <td ><?php echo $i++; ?></td>
                                                                <td><?php echo $sql_country_fetch_arr['country']; ?></td>
                                                                <td>
                                                                    <input type = "text" class="form-control" name="state" value="<?php echo $sql_state_fetch_arr['state_name']; ?>">
                                                                    <input type="hidden" name="id" value="<?php echo $sql_state_fetch_arr['id']; ?>" >
                                                                </td>
																<td>
                                                                    <input type = "number" class="form-control" name="statecode" value="<?php echo $sql_state_fetch_arr['state_code']; ?>">
                                                                </td>
																<td>
                                                                    <input type = "text" class="form-control" name="stateform" value="<?php echo $sql_state_fetch_arr['state_form']; ?>">
                                                                </td>

                                                                <td>
                                                                    <input type="submit" name="update" class="btn btn-primary" value="Update">
                                                                </td>																
                                                            </form>
														</tr>
													<?php
												}	
											?>
										</tbody>
										<tfoot>
										    <tr>
												<th>#</th>
												<th>Country</th>
												<th>State</th>
												<th>State Code</th>
												<th>State Form</th>
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