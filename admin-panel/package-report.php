<?php include ("config.php"); 
	error_reporting(0);
	?>
<!DOCTYPE html>
<html lang="en">
	<!-- START: Head-->
	<head>
		<meta charset="UTF-8">
		<title>Xtream Holiday Package Report</title>
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
							<h4 class="mb-0">Available Package Report</h4>
						</div>
						<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item">Package</li>
							<li class="breadcrumb-item active"><a href="#">Package Report</a></li>
						</ol>
					</div>
				</div>
			</div>
			<!-- END: Breadcrumbs-->
			<!-- START: Card Data-->
			<div class="row">
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
											<th>Heading</th>
											<th>Destination</th>
											<th>Cost</th>
											<th>Offer Start From</th>
											<th>Offer End On</th>
											<th>No. of Days / Nights</th>
											<th>Banner</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$date = date('d-m-Y');
											$sql_package = "SELECT * from package_master  WHERE status = 0 and DATE(NOW()) between fdate and tdate order by id desc";
											$sql_package_rs = mysqli_query($con, $sql_package);
											while($sql_package_arr = mysqli_fetch_array($sql_package_rs))
											{
											
											    ?>
												<tr>
													<td ><?php echo $i++; ?></td>
													<td><?php echo ucwords(strtolower($sql_package_arr['heading'])); ?></td>
													<td><?php echo ucwords(strtolower($sql_package_arr['destination'])); ?></td>
													<?php
														$cur = "select * from currancy where id='$sql_package_arr[currency_type]'";
														$cur_rs = mysqli_query($con,$cur);
														$cur_arr = mysqli_fetch_assoc($cur_rs);

														$cost = "select * from type_of_cost where id = '$sql_package_arr[cost_for]'";
														$cost_rs = mysqli_query($con, $cost);
														$cost_arr = mysqli_fetch_array($cost_rs)
														
														// $date = (explode("-",$sql_package_arr['date']));
														?>
													<td><?php echo $cur_arr['code'].' '.$sql_package_arr['cost'].' /'.$cost_arr['type']; ?></td>
													<td><?php echo date('d-m-Y', strtotime($sql_package_arr['fdate'])); ?></td>
													<td><?php echo date('d-m-Y', strtotime($sql_package_arr['tdate'])); ?></td>
													<td><?php echo $sql_package_arr['days'].'d / '.$sql_package_arr['nights'].'n'; ?></td>
													<td><img src="dist/images/packages/<?php echo $sql_package_arr['banner_image']; ?>" class="zoom" style="max-width:50px;"></td>
													<td>
														<div class="btn-group">
															<button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
															<div class="dropdown-menu p-0">
																<a class="dropdown-item" href="package-view.php?id=<?php echo $sql_package_arr['id']; ?>&view=1">View</a>
																<a class="dropdown-item" href="package-view.php?id=<?php echo $sql_package_arr['id']; ?>&view=0">Edit</a>
																<a class="dropdown-item" href="package-iternity.php?id=<?php echo $sql_package_arr['id']; ?>">Iternity</a>
																<div class="dropdown-divider"></div>
																<a class="dropdown-item" href="package-extra-details.php?id=<?php echo $sql_package_arr['id']; ?>">Extra Details</a>
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
									<th>Heading</th>
									<th>Destination</th>
									<th>Cost</th>
									<th>Offer Start From</th>
									<th>Offer End On</th>
									<th>No. of Days / Nights</th>
									<th>Banner</th>
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
		</main>
		<!-- END: Content-->
		<?php include "dist/footer/index.php"; ?>