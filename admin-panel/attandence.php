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
								<h4 class="mb-0"> Employee Attandence</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Employee</li>
								<li class="breadcrumb-item active"><a href="#">Attandence</a></li>
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
								<div class="row">
									<div class="col-sm-6">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent border-right-0" id="today_date">Date</span>
											</div>
											<input type="date" class="form-control" aria-label="date" aria-describedby="today_date" name="today_date" value="<?php echo date('Y-m-d'); ?>" readonly="true">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent border-right-0" id="today_day">Day</span>
											</div>
											<input type="text" class="form-control" placeholder="Employee Code" aria-label="today_day" aria-describedby="today_day" name="today_day" value="<?php echo date('l'); ?>" readonly="true">
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table id="example" class="display table dataTable table-striped table-bordered" >
										<thead>
											<tr>
												<th>S.No</th>
												<th>Emp. Code</th>
												<th>Emp Name</th>
												<th>Check-In Time</th>
												<th>Check-Out Time</th>
												<th>Status</th>
												<th>Update</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$emp = "select * from emp_master where status=0";
												$emp_rs = mysqli_query($con, $emp);
												while($emp_arr= mysqli_fetch_array($emp_rs))
												{
													$date = date('Y-m-d');
													$att = "select * from attendance where emp_id='$emp_arr[id]' and date='$date'";
													$att_rs = mysqli_query($con, $att);
													$att_arr = mysqli_fetch_array($att_rs);
													?>
														<tr>
															<form action="attandence-update.php" method="post">
																<td><?php echo $i++; ?></td>
																<td><?php echo $emp_arr['emp_code']; ?></td>
																<td><?php echo ucwords(strtolower($emp_arr['name'])); ?></td>
																<td><input type="time" class="form-control" name="in_time" value="<?php if($att_arr['in_time']) { echo $att_arr['in_time']; } ?>"> </td>
																<td><input type="time" class="form-control" name="out_time" value="<?php if($att_arr['out_time']) { echo $att_arr['out_time']; } ?>"> </td>
																<td>
																	<?php
																		if($att_arr['in_time'] != '' && $att_arr['out_time'] != '')
																		{
																			echo "Present";
																		}
																		else if($att_arr['in_time'] != '' && $att_arr['out_time'] == '')
																		{
																			echo "Half-Day";
																		}
																		else
																		{
																			echo "Absent";
																		}
																	?>
																</td>
																<td>
																	<input type="hidden" name="emp_id" value="<?php echo $emp_arr['id']; ?>" required="true">
																	<input type="submit" class="btn btn-info" value="Update" name="update_att">
																</td>
															</form>
														</tr>
													<?php
													}
												?>
										</tbody>
										<tfoot>
											<tr>
												<th>S.No</th>
												<th>Emp. Code</th>
												<th>Emp Name</th>
												<th>Check-In Time</th>
												<th>Check-Out Time</th>
												<th>Status</th>
												<th>Update</th>
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