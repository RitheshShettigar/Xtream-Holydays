<?php include ("config.php");
	error_reporting(0);
	?>
<?php
	if($_REQUEST['id'])
	{
	    $sql_package_fetch = "select * from package_master where id='$_REQUEST[id]'";
	    $sql_package_fetch_rs = mysqli_query($con, $sql_package_fetch);
	    $sql_package_fetch_arr = mysqli_fetch_array($sql_package_fetch_rs);
	    if($_REQUEST['view'] == 1)
	    {
	        $readonly = "readonly='true'";
	        $tex = "View";
	    }
	    else
	    {
	        $readonly="";
	        $tex = "Update";
	    }
	}
	else
	{
	    ?>
<script>
	window.location.href="package-report.php";
</script>
<?php
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
								<h4 class="mb-0"><?php echo $tex; ?> Package</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Packages</li>
								<li class="breadcrumb-item active"><a href="#"> <?php echo $tex; ?></a></li>
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
											<form method="post" action="package-insert.php"  enctype="multipart/form-data">
												<div class="row">
													<label for="pack_head" class="col-sm-2 col-form-label">Package Heading</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="pack_head"><i class="fas fa-highlighter"></i></span>
															</div>
															<input type = "hidden" name="id" value = "<?php echo $sql_package_fetch_arr['id']; ?>">
															<input type="text" class="form-control" placeholder="Package Heading" aria-label="pack_head" aria-describedby="Package Heading" name="pack_head" required="true" value="<?php echo $sql_package_fetch_arr['heading'] ?>" <?php echo $readonly; ?>>
														</div>
													</div>
												</div>
												<div class="row">
													<label for="desc" class="col-sm-2 col-form-label">Short Description</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="desc"><i class="fas fa-clipboard"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Package Short Description" aria-label="Package Description" aria-describedby="Package Description" name="desc" required = "true" value="<?php echo $sql_package_fetch_arr['description'] ?>" <?php echo $readonly; ?>>
														</div>
													</div>
												</div>
												<div class="row">
													<label for="destination" class="col-sm-2 col-form-label">Destination</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="destination"><i class="fas fa-location-arrow"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Destination" aria-label="Destination" aria-describedby="Destination" name="destination" required = "true" value="<?php echo $sql_package_fetch_arr['destination'] ?>" <?php echo $readonly; ?>>
														</div>
													</div>
												</div>
												<div class="row">
													<label for="currency_type" class="col-sm-2 col-form-label">Select Currency Type</label>
													<div class="col-sm-3">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="currency_type"><i class="fas fa-dollar-sign"></i></span>
															</div>
															<select class="form-control" name="currency_type">
																<option label="Choose Currency Type">Choose Currency Type</option>
																<?php
																	$currency = "select * from currancy order by country";
																	$currency_rs = mysqli_query($con, $currency);
																	while($currency_arr = mysqli_fetch_array($currency_rs))
																	{
																	    ?>
																			<option value="<?php echo $currency_arr['id']; ?>" <?php if($sql_package_fetch_arr['currency_type'] == $currency_arr['id']) { echo "selected"; } ?>><?php echo $currency_arr['country'].' ('.$currency_arr['code'].' )'; ?></option>
																		<?php
																	}
																	?>
															</select>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="cost"><i class="fas fa-rupee-sign"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Cost" aria-label="cost" aria-describedby="cost" name="cost" value="<?php echo $sql_package_fetch_arr['cost'] ?>" <?php echo $readonly; ?>>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="currency_type"><i class="far fa-money-bill-alt"></i></span>
															</div>
															<select class="form-control" class="cost_for" name="cost_for">
																<?php
																	$cost = "select * from type_of_cost order by type";
																	$cost_rs = mysqli_query($con, $cost);
																	while($cost_arr = mysqli_fetch_array($cost_rs))
																	{
																	    ?>
																			<option value="<?php echo $cost_arr['id']; ?>"<?php  if($cost_arr['id']== $sql_package_fetch_arr['cost_for']) { echo "selected"; } ?>><?php echo $cost_arr['type']; ?></option>
																		<?php
																	}
																	?>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<label for="offer" class="col-sm-2 col-form-label">Offer Validity</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="offer"><i class="far fa-calendar-alt"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="" aria-label="Offer Validity" aria-describedby="Offer Validity" name="daterange" id="daterange" value="<?php echo date('m/d/Y',strtotime($sql_package_fetch_arr['fdate'])).' - '.date('m/d/y',strtotime($sql_package_fetch_arr['tdate'])) ?>" <?php echo $readonly; ?>>
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_dob" class="col-sm-2 col-form-label">No of Days / Night</label>
													<div class="col-sm-5">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="days"><i class="fas fa-sun"></i></span>
															</div>
															<input type="number" class="form-control" placeholder="No of Days" aria-label="days" aria-describedby="Days" name="days" min = "0" value="<?php echo $sql_package_fetch_arr['days'] ?>" <?php echo $readonly; ?>>
														</div>
													</div>
													<div class="col-sm-5">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="nights"><i class="fas fa-moon"></i></span>
															</div>
															<input type="number" class="form-control" placeholder="No of Nights" aria-label="nights" aria-describedby="nights" name="nights" min = "0" value="<?php echo $sql_package_fetch_arr['nights'] ?>" <?php echo $readonly; ?>>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-sm-2">Images</div>
													<div class="col-sm-2">
														<img for="fileUpload" src="dist/images/packages/<?php echo $sql_package_fetch_arr['banner_image'] ?>" class="img-responsive"  style="max-width:100%;">
														<?php
															if($_REQUEST['view'] == 0 )
															{
															    ?>
														<label for="fileUpload" class="file-upload btn btn-primary btn-block"><i class="fa fa-upload mr-2"></i>Update Banner ...<input id="fileUpload" type="file" name="banner_image" ></label>
														<?php
															}
															?>
													</div>
													<div class="col-sm-2">
														<img src="dist/images/packages/<?php echo $sql_package_fetch_arr['inside_image'] ?>" class="img-responsive" style="max-width:100%;">
														<?php
															if($_REQUEST['view'] == 0 )
															{
															    ?>
														<label for="fileUpload1" class="file-upload btn btn-primary btn-block"><i class="fa fa-upload mr-2"></i>Update ...<input id="fileUpload1" type="file" name="inside_image"></label>
														<?php
															}
															?>
													</div>
												</div>
												<?php
													if($_REQUEST['view'] == 0 )
													{
													    ?>
												<div class="form-group row">
													<div class="col-sm-10">
														<button type="submit" id="submit" name="update_package" class="btn btn-primary">Update</button>
													</div>
												</div>
												<?php
													}
													?>
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