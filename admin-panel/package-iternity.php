<?php include ("config.php");
	error_reporting(0);
	$id = $_REQUEST['id'];
	if($id)
	{
		$pac = "select * from package_master where id = '$id'";
		$pac_rs = mysqli_query($con, $pac);
		$pac_arr = mysqli_fetch_array($pac_rs);
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
								<h4 class="mb-0">Update Iternities of <b><?php echo ucwords(strtolower($pac_arr['heading'])); ?></b> </h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Iternity</li>
								<li class="breadcrumb-item active"><a href="#">Add Iternity</a></li>
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
										<div class="col-12 col-lg-12 mt-3">
											<p>&nbsp;</p>
											<section class="container">
												<form method = "post" action = "package-iternity-insert.php">
													<div class="table-responsive">
														<table class="display table dataTable table-striped table-bordered">
															<thead>
																<tr>
																	<td>Text</td>
																	<td>Type</td>
																	<td>Action</td>
																</tr>
															</thead>
															<tbody id="TextBoxContainer">
															</tbody>
															<tfoot>
																<tr>
																	<th colspan="3">
																		<button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add more"><i class="fas fa-plus-square"></i>&nbsp; Add&nbsp;</button>
																		<input type="hidden" name="package_id" value="<?php echo $id; ?>">
																		<button type="submit" name="submit" class="btn btn-primary" >Submit</button>
																	</th>
																</tr>
															</tfoot>
														</table>
													</div>
												</form>
											</section>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12  align-self-center">
						<div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
							<div class="w-sm-100 mr-auto">
								<h4 class="mb-0">Added Iternities, Inclusions and Exclusions </h4>
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
												<th>Description</th>
												<th>Type</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$sql_iternity = "SELECT * from iternity  WHERE status = 0  and package_id='$id' order by type,description desc";
												$sql_iternity_rs = mysqli_query($con, $sql_iternity);
												while($sql_iternity_arr = mysqli_fetch_array($sql_iternity_rs))
												{
												
												    ?>
														<tr>
															<form method="post" action="package-iternity-update.php">
																<td ><?php echo $i++; ?></td>
																<td><input type="text" class="form-control" name="description" value="<?php echo ucwords(strtolower($sql_iternity_arr['description'])); ?>"></td>
																<td>
																	<select class="form-control" name="type">
																		<option value="Iternity" <?php if($sql_iternity_arr['type'] == 'Iternity') { echo "selected"; }; ?>>Iternity</option>
																		<option value="Inclusion" <?php if($sql_iternity_arr['type'] == 'Inclusion') { echo "selected"; }; ?>>Inclusion</option>
																		<option value="Exclusion" <?php if($sql_iternity_arr['type'] == 'Exclusion') { echo "selected"; }; ?>>Exclusion</option>
																	</select>
																</td>
																<td>
																	<input type="hidden" name="id" value="<?php echo $sql_iternity_arr['id']; ?>">
																	<input type="hidden" name="package_id" value="<?php echo $id; ?>">
																	<input type="submit" name="submit" class="btn btn-primary" value="Update">
																	<a href = "package-iternity-update.php?id=<?php echo $sql_iternity_arr['id']; ?>&delete=1&package_id=<?php echo $id; ?>"  class="btn btn-danger" >Delete</a>
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
										<th>Description</th>
										<th>Type</th>
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
				<!-- END: Card DATA-->
			</div>
		</main>
		<!-- END: Content-->
		<?php include "dist/footer/index.php"; ?>
		<script src="https://code.jquery.com/jquery-latest.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
			$(function () {
			    $("#btnAdd").bind("click", function () {
			        var div = $("<tr />");
			        div.html(GetDynamicTextBox(""));
			        $("#TextBoxContainer").append(div);
			    });
			    $("body").on("click", ".remove", function () {
			        $(this).closest("tr").remove();
			    });
			});
			function GetDynamicTextBox(value) {
			    return '<td><input name = "desc[]" type="text" value = "' + value + '" class="form-control" /></td>' + '<td><select name="type[]" class="form-control"><option value="Iternity"> Iternity</option><option value="Inclusion"> Inclusion</option><option value="Exclusion"> Exclusion</option></select></td>' + '<td><button type="button" class="btn btn-danger remove"><i class="fas fa-minus-square">&nbsp Remove </i></button></td>'
			}
		</script>