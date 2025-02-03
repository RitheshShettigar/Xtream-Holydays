<?php include ("config.php");
	error_reporting(0);
	?>
<!DOCTYPE html>
<html lang="en">
	<!-- START: Head-->
	<head>
		<meta charset="UTF-8">
		<title>Xtream Holiday Amenities</title>
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
								<h4 class="mb-0">Amentites Master</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Hotel</li>
								<li class="breadcrumb-item active"><a href="#">Amenities</a></li>
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
											<form method="post" action="amenities-insert.php"  enctype="multipart/form-data">
												
                                                 <div class="row">
													<label for="country" class="col-sm-2 col-form-label">Amenities</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="amenities"><i class="fas fa-dollar-sign"></i></span>
                                                            </div>
                                                            <input type = "text" class="form-control" name="amenities" id="amenities" placeholder="Enter Amenities">
														</div>
													</div>
                                                </div>
												<div class="row">
													<div class="col-sm-12">
														<div class="input-group mb-3">
														    <button type="submit" id="submit" name="submit" class="btn btn-primary">Add Amenities</button>
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
								<h4 class="mb-0">Amenities List</h4>
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
                                                <th>Amenities</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$ami = "SELECT * from amenities";
												$ami_r = mysqli_query($con, $ami);
												while($ami_arr = mysqli_fetch_array($ami_r))
												{
                                                    ?>
                                                        <tr>
                                                            <form method="post" action="amenities-insert.php">
                                                                <td ><?php echo $i++; ?></td>
                                                                <td>
                                                                    <input type = "text" class="form-control" name="amenities" value="<?php echo $ami_arr['amenities']; ?>">
                                                                    <input type="hidden" name="id" value="<?php echo $ami_arr['id']; ?>" >
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
                                                <th>Amenities</th>
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
		<script src="dist/vendors/select2/js/select2.full.min.js"></script>
		<script src="dist/js/select2.script.js"></script>