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
								<h4 class="mb-0"> Employee Details</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Employee</li>
								<li class="breadcrumb-item active"><a href="#">Details</a></li>
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
												<th>S.No</th>
												<th>Emp. Code</th>
												<th>Emp. Category</th>
												<th>Emp Name</th>
												<th>Contact</th>
												<th>Email Id</th>
												<th>BG</th>
												<th>DOB</th>
												<th>Gender</th>
												<th>Position</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												$emp = "select * from emp_master";
												$emp_rs = mysqli_query($con, $emp);
												while($emp_arr= mysqli_fetch_array($emp_rs))
												{
													?>
													<tr>
														<td><?php echo $i++; ?></td>
														<td><?php echo $emp_arr['emp_code']; ?></td>
														<td><?php echo $emp_arr['emp_cat']; ?></td>
														<td><?php echo ucwords(strtolower($emp_arr['name'])); ?></td>
														<td><a href="tel:<?php echo $emp_arr['contact']; ?>"><?php echo $emp_arr['contact']; ?></a></td>
														<td><a href="<?php echo $emp_arr['email']; ?>"><?php echo $emp_arr['email']; ?></a></td>
														<td><?php echo $emp_arr['bg']; ?></td>
														<td><?php echo $emp_arr['dob']; ?></td>
														<td><?php echo $emp_arr['gender']; ?></td>
														<td><?php echo $emp_arr['position']; ?></td>
														<td>
															<?php
																if($emp_arr['status']==0)
																{
																	?>

																	<a href = "emp_status_upd.php?id=<?php echo $emp_arr['user_id']; ?>&status=<?php echo '1'; ?>" class = "btn btn-info">Active</a></td>
																	<?php
																}
																else
																{
																	?>

																	<a href = "emp_status_upd.php?id=<?php echo $emp_arr['user_id']; ?>&status=<?php echo '0'; ?>" class = "btn btn-danger">In-active</a></td>
																	<?php
																}
															?>
													</tr>
													<?php
												}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th>S.No</th>
												<th>Emp. Code</th>
												<th>Emp. Category</th>
												<th>Emp Name</th>
												<th>Contact</th>
												<th>Email Id</th>
												<th>BG</th>
												<th>DOB</th>
												<th>Gender</th>
												<th>Position</th>
												<th>Status</th>
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