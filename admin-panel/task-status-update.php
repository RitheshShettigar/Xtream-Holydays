<?php include ("config.php");
	error_reporting(0);
	?>
<?php
	if($_REQUEST['id'])
	{
	    
	    $sql = "select * from task where id = '$_REQUEST[id]'";
	    $sql_rs = mysqli_query($con, $sql);
	    $sql_arr = mysqli_fetch_array($sql_rs);
	
	    $task_status = "select * from task_status where task_id='$sql_arr[id]' order by id desc limit 1";
	    $task_status_rs = mysqli_query($con,$task_status);
	    $task_status_arr = mysqli_fetch_array($task_status_rs);
	
	    
	    $task_status1 = "select * from task_status where task_id='$sql_arr[id]' order by id desc";
	    $task_status_rs1 = mysqli_query($con,$task_status1);
	    
	}
	else
	{
	    ?>
        <script>
            window.location.href="task-report.php";
        </script>
        <?php
	}
	
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
								<h4 class="mb-0">Task Details</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Task Details</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- END: Breadcrumbs-->
				<!-- START: Card Data-->
				<div class="row">
					<div class="col-12 col-lg-12 mt-3">
						<div class="card">
							<!--<div class="card-header">                               
								<h4 class="card-title">Add New Employee Data</h4>                                
								</div>-->
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<form method="post" action="task-detail.php"  enctype="multipart/form-data">
												<div class="row">
													<label for="emp_code" class="col-sm-2 col-form-label">Assigned To</label>
													<div class="col-sm-10">
														<div class="input-group  mb-3">
															<select data-select2-id="3" tabindex="-1" class="form-control" aria-hidden="true" name="assigned_to" id="assigned_to" readonly="true">
																<?php 
																	$emp_sql = "select * from emp_master where status=0";
																	$emp_rs = mysqli_query($con, $emp_sql);
																	while($emp_arr = mysqli_fetch_array($emp_rs))
																	{
																	    
																	    ?>
																<option label="<?php echo ucwords(strtolower($emp_arr['name'])); ?>" data-select2-id="<?php echo $emp_arr['id']; ?>" value="<?php echo $emp_arr['id']; ?>" <?php if($emp_arr['user_id'] == $sql_arr['assigned_to']) { ?> selected <?php } ?>><?php echo $emp_arr['name']; ?></option>
																<?php
																	}
																	?>
															</select>
															<span class="select2 select2-container select2-container--bootstrap4 select2-container--below  select2-container--focus" dir="ltr" data-select2-id="4"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-t3pw-container"><span class="select2-selection__rendered" id="select2-t3pw-container" role="textbox" aria-readonly="true" title="Choose on thing"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>    
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_name" class="col-sm-2 col-form-label"> Heading</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="emp_code"><i class="icon-notebook"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Heading" aria-label="emp_name" aria-describedby="Employee Name" name="task_head" value="<?php echo ucwords(strtolower($sql_arr['task_head'])) ?>" readonly="true" >
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_phno" class="col-sm-2 col-form-label">  Description</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="emp_code"><i class="icon-docs"></i></span>
															</div>
															<input type="text" class="form-control" placeholder="Description" aria-label="emp_phno" aria-describedby="emp_phno" name="task_details" value="<?php echo $sql_arr['task_details'] ?>"readonly="true">
															<input type = "hidden" name = "task_id" value = "<?php echo $sql_arr[id] ?>" >
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_dob" class="col-sm-2 col-form-label">Assigned Date</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="emp_code"><i class="icon-calendar"></i></span>
															</div>
															<input type="date" class="form-control" placeholder="Assigned Date" aria-label="dob" aria-describedby="emp_dob" name="assign_date" value = "<?php echo $sql_arr['assign_date'] ?>"readonly="true">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_dob" class="col-sm-2 col-form-label">End Date</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="emp_code"><i class="icon-calendar"></i></span>
															</div>
															<input type="date" class="form-control" placeholder="End Date" aria-label="dob" aria-describedby="emp_dob" name="end_date" value = "<?php echo $sql_arr['end_date'] ?>" readonly="true">
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_addr" class="col-sm-2 col-form-label">Assigned By</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="assigned_by"><i class="icon-user-following"></i></span>
															</div>
															<?php
																$sql1 = "select * from user where id = $sql_arr[assigned_by]";
																$sql_rs1 = mysqli_query($con, $sql1);
																$sql_arr1 = mysqli_fetch_array($sql_rs1);
																?>
															<input type="text" class="form-control" placeholder="Assigned By" aria-label="emp_addr" aria-describedby="emp_addr" name="assigned_by" value = "<?php echo ucwords(strtolower($sql_arr1['name'])) ?>" readonly="true">
														</div>
													</div>
												</div>
												<div class = "row">
													<label for = "behaviour" class = "col-sm-2">Behaviour</label>
													<div class = "col-sm-10">
														<div class = "input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="emp_code"><i class="icon-chart"></i></span>
															</div>
                                                            <?php
                                                                $sql_behaviour = "select * from post_behaviour_master where id='$sql_arr[behaviour]'";
                                                                $sql_behaviour_rs = mysqli_query($con, $sql_behaviour);
                                                                $sql_behaviour_arr = mysqli_fetch_array($sql_behaviour_rs);
                                                            ?>
                                                            <input type="text" class="form-control" value="<?php echo $sql_behaviour_arr['behaviour']; ?>" readonly="true">
														</div>
													</div>
												</div>
												<?php
													if($sql_arr['behaviour'] == 5 or $sql_arr['behaviour'] == 4 )
													{
                                                        ?>
                                                            <div class="row">
                                                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-transparent border-right-0" id="emp_code"><i class="icon-calendar"></i></span>
                                                                        </div>
                                                                        <input type="date" class="form-control" placeholder="Assigned Date" aria-label="date" aria-describedby="date" name="assign_date" value = "<?php echo $sql_arr['date'] ?>"  readonly="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
													}
													if($sql_arr['behaviour'] == 5 )
													{
														?>
                                                        <div class="row">
                                                            <label for="fdate" class="col-sm-2 col-form-label">To Date</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text bg-transparent border-right-0" id="date2"><i class="icon-calendar"></i></span>
                                                                    </div>
                                                                    <input type="date" class="form-control" placeholder="Assigned Date" aria-label="date2" aria-describedby="date2" name="date2" value = "<?php echo $sql_arr['date2'] ?>"  readonly="true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
													}
													if($sql_arr['behaviour'] == 2 )
													{
														?>
                                                        <div class="row">
                                                            <label for="date" class="col-sm-2 col-form-label">Date</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text bg-transparent border-right-0" id="day"><i class="icon-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" value="<?php echo $sql_arr['date']; ?>" readonly="true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
													}
													if($sql_arr['behaviour'] == 3 )
													{
														?>
                                                        <div class="row">
                                                            <label for="date" class="col-sm-2 col-form-label">Days</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text bg-transparent border-right-0" id="day"><i class="icon-calendar"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" placeholder="Assigned Date" aria-label="date" aria-describedby="day" name="assign_date" value = "<?php echo $sql_arr['day'] ?>"  readonly="true" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
													}
													if($sql_arr['behaviour'] == 5 or $sql_arr['behaviour'] == 2 or $sql_arr['behaviour'] == 3 or $sql_arr['behaviour'] == 4 )
													{
														?>
                                                        <div class="row">
                                                            <label for="date" class="col-sm-2 col-form-label">Time</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text bg-transparent border-right-0" id="time"><i class="icon-calendar"></i></span>
                                                                    </div>
                                                                    <input type="time" class="form-control" placeholder="Assigned Date" aria-label="time" aria-describedby="time" name="time" value = "<?php echo $sql_arr['time'] ?>"  readonly="true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
													}
												?>
												<div class="row">
													<label for="emp_joindate" class="col-sm-2 col-form-label"> Status</label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="emp_code"><i class="icon-chart"></i></span>
															</div>
															<select name = "status" id = "status" class = "form-control">
																<option value ="Assigned" <?php if($task_status_arr['status'] == 'Assigned') { echo "selected"; } ?>>Assigned</option>
																<option value ="In-Process" <?php if($task_status_arr['status'] == 'In-Process') { echo "selected"; } ?>>In-Process</option>
																<option value ="On Hold" <?php if($task_status_arr['status'] == 'On Hold') { echo "selected"; } ?>>On Hold</option>
																<option value ="Completed" <?php if($task_status_arr['status'] == 'Completed') { echo "selected"; } ?>>Completed</option>
																<option value ="Cancelled" <?php if($task_status_arr['status'] == 'Cancelled') { echo "selected"; } ?>>Cancelled</option>
																<option value ="Pass To" <?php if($task_status_arr['status'] == 'Pass To') { echo "selected"; } ?>>Pass To</option>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<label for="emp_joindate" class="col-sm-2 col-form-label"> Comments </label>
													<div class="col-sm-10">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text bg-transparent border-right-0" id="emp_code"><i class="icon-note"></i></span>
															</div>
															<textarea class="form-control" placeholder="Write Comments" aria-label="emp_joindate" aria-describedby="doj" name="comment" id="comment"></textarea>
														</div>
													</div>
													<div class="col-sm-12">
														<div class = "row">
															<?php
																while($task_status_arr1 = mysqli_fetch_array($task_status_rs1))
																{
																    $sql_fetch = "select * from user where id = '$task_status_arr1[added_by]'";
																    $sql_fetch_rs = mysqli_query($con, $sql_fetch);
																    $sql_fetch_arr = mysqli_fetch_array($sql_fetch_rs)
																
																    ?>
															<div class="col-12 col-lg-6  col-xl-4 mt-3">
																<div class="card bg-light">
																	<div class="card-header"><?php echo date('d-M-Y h:i A', strtotime($task_status_arr1['created_at'])) ?></div>
																	<div class="card-body">
																		<h5 class="card-title"><?php echo $sql_fetch_arr['name'] ?></h5>
																		<p class="card-text"><?php echo $task_status_arr1['comment'] ?></p>
																		<p class="card-text"><?php echo $task_status_arr1['status'] ?></p>
																	</div>
																</div>
															</div>
															<?php
																}
																?>
														</div>
													</div>
												</div>
												<div class="form-group row mt-5">
													<div class="col-sm-10">
														<button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
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
			</div>
		</main>
		<!-- END: Content-->
		<?php include "dist/footer/index.php"; ?>
		<script>
			moment().format('DD/MM/YYYY');
		</script>