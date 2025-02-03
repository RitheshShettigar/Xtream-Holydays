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
								<h4 class="mb-0"> Task Report</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Task</li>
								<li class="breadcrumb-item active"><a href="#">Task Report</a></li>
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
												<th>Assigned To</th>
												<th>Title </th>
												<th>Assigned On</th>
												<th>Assigned By</th>
												<th>End Date</th>
												<th>Status</th>
												<th>Action</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
                                                if($_SESSION['cat']=='Admin')
                                                {
                                                   $sql = "SELECT * from task  WHERE status = 0 order by id desc";
                                                }
                                                else
                                                {
                                            
                                                    $sql2 = "select * from emp_master where user_id = $_SESSION[userid]";
                                                    $sql_rs2 = mysqli_query($con, $sql2);
                                                    $sql_rs_arr2 = mysqli_fetch_array($sql_rs2);


                                                    $sql = "SELECT * from task  WHERE  assigned_to = '$sql_rs_arr2[user_id]'  order by id desc";
                                                }
                                                $sql_rs = mysqli_query($con, $sql);
												$i = 1;
                                                while($sql_rs_arr=mysqli_fetch_array($sql_rs))
                                                {

                                                    $sql1 = "select * from emp_master where user_id = $sql_rs_arr[assigned_to]";
                                                    $sql_rs1 = mysqli_query($con, $sql1);
                                                    $sql_rs_arr1 = mysqli_fetch_array($sql_rs1);

                                                    $sql3 = "select * from user where id = $sql_rs_arr[assigned_by]";
                                                    $sql_rs3 = mysqli_query($con, $sql3);
                                                    $sql_rs_arr3 = mysqli_fetch_array($sql_rs3);
                                                    
													$sql_fetch = "select * from task_status where task_id = '$sql_rs_arr[id]' order by id desc limit 1";
													$sql_fetch_rs = mysqli_query($con, $sql_fetch);
													$sql_fetch_arr = mysqli_fetch_array($sql_fetch_rs);
                                                    ?>
													
                                                    <tr style="<?php if($sql_rs_arr['end_date'] < date('Y-m-d') and ($sql_fetch_arr['status'] != 'Cancelled' and $sql_fetch_arr['status'] != 'Completed')) { echo "color:red"; } ?>">
														<td ><?php echo $i++; ?></td>
                                                        <td><?php echo ucwords(strtolower($sql_rs_arr1['name'])) ." (".$sql_rs_arr1['emp_code'].")"; ?></td>
                                                        <td><?php echo ucwords(strtolower($sql_rs_arr['task_head'])) ?></td>
                                                        <td><?php echo date('d-M-Y ', strtotime($sql_rs_arr['assign_date'])); ?></td>
                                                        <td><?php echo ucwords(strtolower($sql_rs_arr3['name'])) ?></td>
                                                        <td><?php echo date('d-M-Y', strtotime($sql_rs_arr['end_date'])); ?></td>
														<td><?php if($sql_fetch_arr['status']) {  echo $sql_fetch_arr['status']; } else { echo "Assigned"; } ?> </td>
														<td><a href = "task-details.php?id=<?php echo $sql_rs_arr['id'];?>" class = "btn btn-primary">Update</a></td>
														<td><a href = "task-status-update.php?id=<?php echo $sql_rs_arr['id'];?>" class = "btn btn-primary">Update</a></td>
													</tr>
													<?php
                                                }

                                            ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>Assigned To</th>
												<th>Title </th>
												<th>Assigned On</th>
												<th>Assigned By</th>
												<th>End Date</th>
												<th>Status</th>
												<th>Action</th>
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