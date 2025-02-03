<?php 
	session_start();
	include ("config.php"); 
// 	error_reporting(0);
	$today_date = date('Y-m-d');
	$time1 = '00:01';
	$time2 = '23:59';
	
	$f_date = $today_date.'T'.$time1;
	$t_date = $today_date.'T'.$time2;
	if($_SESSION['login']!= 'Success')
	{
		?>
		<script>
			alert("Login Please");
			window.location.href="login.php";
		</script>
		<?php
	}
	$idtask='';
	$task_st='';
	$itask=0;
	$id_task = "select max(id) as max from task_status group by task_id";
	$id_task_rs = mysqli_query($con, $id_task);
	while($id_task_arr = mysqli_fetch_array($id_task_rs))
	{
		if($itask == 0)
		{
			$idtask .= $id_task_arr['max'];
		}
		else
		{
			$idtask .= ','.$id_task_arr['max'];
		}
		$itask++;
		$task_st = 'group by ts.task_id in ('.$idtask.')';
	}
	$id11='';
	$leadcount12='';
	$i12=0;
	$id_lead = "select max(id) as max from lead_status group by lead_id";
	$id_lead_rs = mysqli_query($con, $id_lead);
	while($id_lead_arr = mysqli_fetch_array($id_lead_rs))
	{
		if($i12 == 0)
		{
			$id11 .= $id_lead_arr['max'];
		}
		else
		{
			$id11 .= ','.$id_lead_arr['max'];
		}
		$i12++;
		$leadcount12 ='group by ls.lead_id in ('.$id11.')';
	}
	if($_SESSION['cat'] == 'Admin')
	{
	    $task_count = "SELECT * from task as t join task_status as ts on t.id = ts.task_id where t.status = 0 and (ts.status!='Completed' or ts.status!='Cancelled') and t.end_date>='$today_date' $task_st";

		// $task_count = "SELECT * FROM `task` where assign_date<='2022-11-09' and end_date>='2022-11-09' and id in (select task_id from task_status where id in (select max(id) from task_status group by task_id) and status='In-Process')";

		$task_t_count = "SELECT * from task as t join task_status as ts on t.id = ts.task_id where t.status = 0 and (ts.status!='Completed' or ts.status!='Cancelled') and t.end_date='$today_date' $task_st";

		$task_e_count = "SELECT * from task as t join task_status as ts on t.id = ts.task_id where t.status = 0 and (ts.status!='Completed' or ts.status!='Cancelled') and t.end_date<'$today_date' $task_st";
		
		$leads_count = "SELECT * from leads as l join lead_status as ls on l.id=ls.lead_id where l.status = 0 and l.follow_update>='$f_date' $leadcount12";
	
		$lead_t_count = "SELECT * from leads as l join lead_status as ls on l.id=ls.lead_id where l.status=0 and l.follow_update>='$f_date' and l.follow_update<='$t_date' $leadcount12";

		$lead_e_count = "SELECT * from leads as l join lead_status as ls on l.id=ls.lead_id where l.status=0 and l.follow_update<'$f_date' $leadcount12";
	}
	else
	{
		$task_count = "SELECT * from task as t join task_status as ts on t.id=ts.task_id where t.assigned_to = '$_SESSION[userid]' and t.status = 0 and (ts.status!='Completed' or ts.status!='Cancelled') and t.end_date>='$today_date' $task_st";
	
		$task_t_count = "SELECT * from task as t join task_status as ts on t.id=ts.task_id where t.assigned_to = '$_SESSION[userid]' and t.status = 0 and (ts.status!='Completed' or ts.status!='Cancelled') and t.end_date='$today_date' $task_st";

		$task_e_count = "SELECT * from task as t join task_status as ts on t.id=ts.task_id where t.assigned_to = '$_SESSION[userid]' and t.status = 0 and (ts.status!='Completed' or ts.status!='Cancelled') and t.end_date<'$today_date' $task_st";
	
		$leads_count = "SELECT * from leads as l join lead_status as ls on l.id=ls.lead_id where l.status = 0 and l.follow_update>='$f_date' and following_by = '$_SESSION[userid]' $leadcount12";
	
		$lead_t_count = "SELECT * from leads as l join lead_status as ls on l.id=ls.lead_id where l.status = 0 and l.follow_update>='$f_date' and l.follow_update<='$t_date' and following_by = '$_SESSION[userid]' $leadcount12";

		$lead_e_count = "SELECT * from leads as l join lead_status as ls on l.id=ls.lead_id where l.status = 0 and l.follow_update<='$f_date' and following_by = '$_SESSION[userid]' $leadcount12";
	}
	

	
	
	$task_count_rs = mysqli_query($con, $task_count);
	// $task_count_arr = mysqli_fetch_array($task_count_rs);
	
	$task_t_count_rs = mysqli_query($con, $task_t_count);
	$task_t_count_tot = mysqli_num_rows($task_t_count_rs);

	$task_e_count_rs = mysqli_query($con, $task_e_count);
	$task_e_count_arr = mysqli_num_rows($task_e_count_rs);
	
	$leads_count_rs = mysqli_query($con, $leads_count);
	$leads_count_arr = mysqli_num_rows($leads_count_rs);
	
	
	$leads_t_count_rs = mysqli_query($con, $lead_t_count);
	$leads_t_count_arr = mysqli_num_rows($leads_t_count_rs);

	$leads_e_count_rs = mysqli_query($con, $lead_e_count);
	$leads_e_count_arr = mysqli_num_rows($leads_e_count_rs);
	

	$id12='';
	$cscont='';
	$i21=0;
	$id_contact = "select max(id) as max from contact_status group by contact_id";
	$id_contact_rs = mysqli_query($con, $id_contact);
	while($id_contact_arr = mysqli_fetch_array($id_contact_rs))
	{
		if($i21 == 0)
		{
			$id12 .= $id_contact_arr['max'];
		}
		else
		{
			$id12 .= ','.$id_contact_arr['max'];
		}
		$i21++;
		$cscont='and cs.id in ('.$id12.')';
	}

	$sql_contct1 = "select * from contact as c join  contact_status as cs on c.id = cs.contact_id where cs.followup_date>= '$f_date' $cscont";
	$sql_contact_rs1 = mysqli_query($con, $sql_contct1);
	// $sql_contct_arr1 = mysqli_fetch_array($sql_contact_rs1);
	$sql_contct_arr1 = mysqli_num_rows($sql_contact_rs1);
	
	$total_followup = $sql_contct_arr1;


	$sql_contct2 = "select * from contact as c join  contact_status as cs on c.id = cs.contact_id where cs.followup_date< '$f_date' $cscont";
	$sql_contact_rs2 = mysqli_query($con, $sql_contct2);
	$sql_contct_arr2 = mysqli_num_rows($sql_contact_rs2);
	
	
	$sql_contct = "select * from contact as c join  contact_status as cs on c.id = cs.contact_id where cs.followup_date>= '$f_date' and cs.followup_date <='$t_date' $cscont";
	$sql_contact_rs = mysqli_query($con, $sql_contct);
	$sql_contct_arr = mysqli_num_rows($sql_contact_rs);
	
	$today_followup = $sql_contct_arr;
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
				<div class="row">
					<div class="col-12  align-self-center">
						<div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
							<div class="w-sm-100 mr-auto">
								<h4 class="mb-0">Dashboard</h4>
								<b>Welcome to Xtream Holiday Admin panel</b>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- END: Breadcrumbs-->
				<!-- START: Card Data-->
				<div class="row">
					<div class="col-12 col-sm-6 col-xl-4 mt-3">
						<div class="card">
							<div class="card-body">
								<img src="dist/images/traffic.png" alt="traffic" class="float-right" />
								<h6 class="card-title font-weight-bold">Task</h6>
								<h6 class="card-subtitle mb-2 text-muted">On Going</h6>
								<h2><?php echo mysqli_num_rows($task_count_rs); ?></h2>
								<span class="text-success"><i class="ion ion-android-arrow-dropup"></i> Today's Submittion <?php  if($task_t_count_tot){ echo $task_t_count_tot; } else { echo "0"; } ?></span><br>
								<span class="text-danger"><i class="ion ion-android-arrow-dropup"></i> Dead Line Crossed  <?php if($task_e_count_arr){ echo $task_e_count_arr; } else { echo "0"; } ?></span>  
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-xl-4 mt-3">
						<div class="card">
							<div class="card-body">
								<img src="dist/images/cart.png" alt="cart" class="float-right" />
								<h6 class="card-title font-weight-bold"> Direct Leads</h6>
								<h6 class="card-subtitle mb-2 text-muted">Total</h6>
								<h2><?php echo $leads_count_arr; ?></h2>
								<span class="text-success"><i class="ion ion-android-arrow-dropdown"></i> Today's Direct Leads <?php if($leads_t_count_arr) { echo $leads_t_count_arr; } else { echo "0";} ?></span><br>
								<span class="text-danger"><i class="ion ion-android-arrow-dropup"></i> Expired Leads <?php if($leads_e_count_arr){ echo $leads_e_count_arr; } else { echo "0"; } ?></span>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-xl-4 mt-3">
						<div class="card">
							<div class="card-body">
								<img src="dist/images/money.png" alt="money" class="float-right" />
								<h6 class="card-title font-weight-bold"> Contact Follow Up</h6>
								<h6 class="card-subtitle mb-2 text-muted">Total</h6>
								<h2><?php echo $total_followup; ?></h2>
								<span class="text-success"><i class="ion ion-android-arrow-dropup"></i> Today's Contact Follow Up <?php if($today_followup) { echo $today_followup; } else { echo "0"; }?></span><br>
								<span class="text-danger"><i class="ion ion-android-arrow-dropup"></i> Expired Website Leads <?php if($sql_contct_arr2) { echo $sql_contct_arr2; } else { echo "0";} ?> </span>
							</div>
						</div>
					</div>
					<!-- <div class="col-12 col-sm-6 col-xl-3 mt-3">
						<div class="card">
							<div class="card-body">
								<img src="dist/images/wallet.png" alt="wallet" class="float-right" />
								<h6 class="card-title font-weight-bold">Total Profit</h6>
								<h6 class="card-subtitle mb-2 text-muted">In February-2019</h6>
								<h2>$78,245 </h2>
								<span class="text-success"><i class="ion ion-android-arrow-dropdown"></i> 18% higher</span> than last month
							</div>
						</div>
					</div> -->
					<div class="col-12  col-lg-12 mt-3" id="example3div">
						<div class="card" id="example3div">
							<div class="card-header d-flex justify-content-between align-items-center">
								<h4 class="card-title">Today Task Deadline</h4>
							</div>
							<div class="card-content">
								<div class="card-body pt-0">
									<div class="row">
										<div class="col-12">
											<div class="card-body">
												<div class="table-responsive">
													<table id="example3" class="display table dataTable table-striped table-bordered" >
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
																$date0 = date('Y-m-d');
																$date00 = date('Y-m-d');
																$date = $date0.' '."00:00";
																$date1 = $date00. ' '."23:59";
																
																if($_SESSION['cat']=='Admin')
																{
																	
																	$sql_task = "SELECT * from task as t join task_status as ts on t.id=ts.task_id where t.status = 0 and (ts.status!='Completed' or ts.status!='Cancelled') and t.end_date='$today_date' group by ts.task_id ";
																}
																else
																{
																	$sql_task = "SELECT * from task as t join task_status as ts on t.id=ts.task_id where t.status = 0  AND following_by = '$_SESSION[userid]' and (ts.status!='Completed' or ts.status!='Cancelled') and t.end_date='$today_date' group by ts.task_id";
																}
																$sql_task_rs = mysqli_query($con, $sql_task);
																$i = 1;
																while($sql_task_arr=mysqli_fetch_array($sql_task_rs))
																{

																	$sql1 = "select * from emp_master where user_id = $sql_task_arr[assigned_to]";
																	$sql_rs1 = mysqli_query($con, $sql1);
																	$sql_task_arr1 = mysqli_fetch_array($sql_rs1);
				
																	$sql3 = "select * from user where id = $sql_task_arr[assigned_by]";
																	$sql_rs3 = mysqli_query($con, $sql3);
																	$sql_task_arr3 = mysqli_fetch_array($sql_rs3);
																	
																	$sql_fetch = "select * from task_status where task_id = '$sql_task_arr[task_id]' order by id desc limit 1";
																	$sql_fetch_rs = mysqli_query($con, $sql_fetch);
																	$sql_fetch_arr = mysqli_fetch_array($sql_fetch_rs);

																	$sql_task_count = "select count(*) as stcnt from task_status where task_id = '$sql_task_arr[task_id]'";
																	$sql_count_rs = mysqli_query($con, $sql_task_count);
																	$sql_count_arr = mysqli_fetch_array($sql_count_rs);
																   
																	?>
																	<tr>
																		<td><?php echo $i++; ?></td>
																		<td><?php echo ucwords(strtolower($sql_task_arr1['name'])) ." (".$sql_task_arr1['emp_code'].")"; ?></td>
																		<td><?php echo ucwords(strtolower($sql_task_arr['task_head'])) ?></td>
																		<td><?php echo date('d-M-Y ', strtotime($sql_task_arr['assign_date'])); ?></td>
																		<td><?php echo ucwords(strtolower($sql_task_arr3['name'])) ?></td>
																		<td><?php echo date('d-M-Y', strtotime($sql_task_arr['end_date'])); ?></td>
																		<td><?php if($sql_fetch_arr['status']) {  echo $sql_fetch_arr['status']; } else { echo "Assigned"; } ?> </td>
																		<td><a href = "task-details.php?id=<?php echo $sql_task_arr['task_id'];?>" class = "btn btn-primary">Update</a></td>
																		<td><a href = "task-status-update.php?id=<?php echo $sql_task_arr['task_id'];?>" class = "btn btn-primary">Update <?php echo "(".$sql_count_arr['stcnt'].")"; ?></a></td>
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
							</div>
						</div>
					</div>
					<div class="col-12  col-lg-12 mt-3">
						<div class="card">
							<div class="card-header d-flex justify-content-between align-items-center">
								<h4 class="card-title">Today Leads Follow Ups</h4>
							</div>
							<div class="card-content">
								<div class="card-body pt-0">
									<div class="row">
										<div class="col-12">
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
																<th>Location</th>
																<th>Requirment</th>
																<th>Date</th>
																<th>Status</th>
																<th>Follow-Up Date</th>
																<th>Action</th>
																<th>Status</th>
															</tr>
														</thead>
														<tbody>
															<?php
																$date0 = date('Y-m-d');
																$date00 = date('Y-m-d');
																$date = $date0.' '."00:00";
																$date1 = $date00. ' '."23:59";
																
																if($_SESSION['cat']=='Admin')
																{
																	$sql_lead = "SELECT * from leads as l join lead_status as ls on l.id=ls.lead_id where l.status = 0 and l.follow_update>='$f_date' and l.follow_update<='$t_date' group by ls.lead_id";
																}
																else
																{
																	$sql_lead = "SELECT * from leads as l join lead_status as ls on l.id=ls.lead_id where l.status = 0 and l.follow_update>='$f_date' and l.follow_update<='$t_date' and following_by = '$_SESSION[userid]' group by ls.lead_id";
																}
																$sql_lead_rs = mysqli_query($con, $sql_lead);
																$i = 1;
																while($sql_lead_arr=mysqli_fetch_array($sql_lead_rs))
																{
																	$lead_status_count = "select count(*) as leadcnt from lead_status where lead_id='$sql_lead_arr[lead_id]'";
																	$lead_status_count_rs = mysqli_query($con, $lead_status_count);
																	$lead_status_count_arr = mysqli_fetch_array($lead_status_count_rs);
																	?>
																		<tr>
																			<td><?php echo $i++; ?></td>
																			<td><?php echo ucwords(strtolower($sql_lead_arr['cp_name'])) ?></td>
																			<td><a href = "tel:<?php echo $sql_lead_arr['cp_number'] ?>"><?php echo $sql_lead_arr['cp_number'] ?></a></td>
																			<td><a href = "mailto:<?php echo $sql_lead_arr['cp_email'] ?>"><?php echo $sql_lead_arr['cp_email'] ?></a></td>
																			<!-- <td><a href = "<?php echo $sql_lead_arr['website'] ?>" target = "_blank"><?php echo $sql_lead_arr['website'] ?></a></td> -->
																			<td><?php echo $sql_lead_arr['location'] ?></td>
																			<td><?php echo $sql_lead_arr['query'] ?></td>
																			<td><?php echo date('d-m-Y', strtotime($sql_lead_arr['date'])) ?></td>
																			<td><?php echo $sql_lead_arr['status'] ?></td>
																			<td><?php echo date('d-m-Y h:i A', strtotime($sql_lead_arr['follow_update'])) ?></td>
																			<td><a href = "lead-details.php?id=<?php echo $sql_lead_arr['lead_id'];?>" class = "btn btn-primary">Update</a></td>
																			<td><a href = "lead-status-update.php?id=<?php echo $sql_lead_arr['lead_id'];?>" class = "btn btn-primary"> Update <?php echo "(".$lead_status_count_arr['leadcnt'].")"; ?></a></td>
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
																<th>Location</th>
																<th>Requirment</th>
																<th>Date</th>
																<th>Status</th>
																<th>Follow-Up Date</th>
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
							</div>
						</div>
					</div>
					<div class="col-12  col-lg-12 mt-3">
						<div class="card">
							<div class="card-header d-flex justify-content-between align-items-center">
								<h4 class="card-title">Today Website Follow Ups</h4>
							</div>
							<div class="card-content">
								<div class="card-body pt-0">
									<div class="row">
										<div class="col-12">
											<div class="card-body">
												<div class="table-responsive">
													<table id="example1" class="display table dataTable table-striped table-bordered" >
														<thead>
															<tr>
																<th>S.No</th>
																<th>Name</th>
																<th>Contact No</th>
																<th>Email-Id</th>
																<th>Website</th>
																<th>Requirment</th>
																<th>Date</th>
																<th>Status</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php
																$i=1;
																
																$sql_cs = "select * from contact as c join  contact_status as cs on c.id = cs.contact_id where cs.followup_date>= '$f_date' and followup_date<= '$t_date' group by cs.contact_id";
																$sql_cs_rs = mysqli_query($con, $sql_cs);
																while($sql_cs_fs = mysqli_fetch_array($sql_cs_rs))
																{
																	$web_count_status = "select count(*) as cntc from contact_status where contact_id='$sql_cs_fs[contact_id]'";
																	$web_count_status_rs = mysqli_query($con, $web_count_status);
																	$web_count_status_arr = mysqli_fetch_array($web_count_status_rs);
																	?>
																		<tr>
																			<td><?php echo $i++?></td>
																			<td><?php echo $sql_cs_fs['name']; ?></td>
																			<td><?php echo $sql_cs_fs['contact']; ?></td>
																			<td><?php echo $sql_cs_fs['email']; ?></td>
																			<td><?php echo $sql_cs_fs['url']; ?></td>
																			<td><?php echo $sql_cs_fs['service']; ?></td>
																			<td><?php echo date('d-m-Y', strtotime($sql_cs_fs['created_at'])); ?></td>
																			<td><?php echo $sql_cs_fs['status']; ?></td>
																			<td><a href = "lead-website.php?id=<?php echo $sql_cs_fs['contact_id'] ?>" class = "btn btn-primary">Update <?php echo "(".$web_count_status_arr['cntc'].")"; ?></a></td>
																		</tr>
																	<?php
																}
																
																
																?>
														</tbody>
														<tfoot>
															<tr>
																<th>S.No</th>
																<th>Name</th>
																<th>Contact No</th>
																<th>Email-Id</th>
																<th>Website</th>
																<th>Requirment</th>
																<th>Date</th>
																<th>Status</th>
																<th>Action</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
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