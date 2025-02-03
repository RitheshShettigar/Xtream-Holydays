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
								<h4 class="mb-0"> Lead Report</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Lead</li>
								<li class="breadcrumb-item active"><a href="#">Lead Details</a></li>
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
												<th>Name</th>
												<th>Contact No</th>
												<th>Email-Id</th>
												<!-- <th>Website</th> -->
												<!-- <th>Location</th> -->
												<th>Requirment</th>
												<th>Date</th>
                                                <th>Follow-Up</th>
												<th>Status</th>
												<th>Details</th>
												<th>Status</th>									
											</tr>
										</thead>
										<tbody>
											<?php
                                                if($_SESSION['cat']=='Admin')
                                                {
                                                    $sql = "SELECT * from leads  WHERE status = 0";
                                                }
                                                else
                                                {
                                                    $sql = "SELECT * from leads  WHERE status = 0 AND following_by = '$_SESSION[userid]'";
                                                }
                                                $sql_rs = mysqli_query($con, $sql);
												$i = 1;
                                                while($sql_rs_arr=mysqli_fetch_array($sql_rs))
                                                {
													$status = "select * from lead_status where lead_id=$sql_rs_arr[id] order by id desc limit 1";
													$status_rs = mysqli_query($con, $status);
													$status_arr = mysqli_fetch_assoc($status_rs);
                                                    ?>
                                                    <tr>
														<td><?php echo $i++; ?></td>
                                                        <td><?php echo ucwords(strtolower($sql_rs_arr['cp_name'])) ?></td>
                                                        <td><a href = "tel:<?php echo $sql_rs_arr['cp_number'] ?>"><?php echo $sql_rs_arr['cp_number'] ?></a></td>
                                                        <td><a href = "mailto:<?php echo $sql_rs_arr['cp_email'] ?>"><?php echo $sql_rs_arr['cp_email'] ?></a></td>
                                                        <!-- <td><a href = "<?php echo $sql_rs_arr['website'] ?>" target = "_blank"><?php echo $sql_rs_arr['website'] ?></a></td>
                                                        <td><?php echo $sql_rs_arr['location'] ?></td> -->
                                                        <td><?php echo $sql_rs_arr['query'] ?></td>
                                                        <td><?php if($sql_rs_arr['date']) { echo date('d-m-Y', strtotime($sql_rs_arr['date'])); } ?></td>
                                                        <td><?php if($sql_rs_arr['follow_update']) { echo date('d-m-Y h:i A', strtotime($sql_rs_arr['follow_update'])); } ?></td>
														<td><?php echo $status_arr['status']; ?></td>
														<td><?php if($status_arr['status'] != 'Completed') { ?><a href = "lead-details.php?id=<?php echo $sql_rs_arr['id'];?>" class = "btn btn-primary">Update</a><?php } ?></td>
														<td><?php if($status_arr['status'] != 'Completed') { ?><a href = "lead-status-update.php?id=<?php echo $sql_rs_arr['id'];?>" class = "btn btn-primary"> Update</a><?php } ?></td>
													</tr>
													<?php
                                                }

                                            ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Contact No</th>
												<th>Email-Id</th>
												<!-- <th>Website</th> -->
												<!-- <th>Location</th> -->
												<th>Requirment</th>
												<th>Date</th>
                                                <th>Follow-Up</th>
												<th>Status</th>
												<th>Details</th>
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