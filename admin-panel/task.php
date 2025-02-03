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
								<h4 class="mb-0">Add New Task</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Task</li>
								<li class="breadcrumb-item active"><a href="#">Add New Task</a></li>
							</ol>
						</div>
					</div>
				</div>
               
				<div class = "row">
					<div class="col-12 col-lg-12 mt-3">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<form method="post" action="task-database.php"  enctype="multipart/form-data">
												<label for="username"> Assigned To</label>
												<div class="input-group  mb-3">
													
													<select data-select2-id="3" tabindex="-1" class="form-control" aria-hidden="true" name="emp_name" id="emp_name">
                                                        <option label="Select Employee">Select Emp</option>
                                                        <?php 
                                                            $emp_sql = "select * from emp_master where status=0";
                                                            $emp_rs = mysqli_query($con, $emp_sql);
                                                            while($emp_arr = mysqli_fetch_array($emp_rs))
                                                            {

                                                                ?>
                                                                <option label="<?php echo ucwords(strtolower($emp_arr['name'])); ?>" data-select2-id="<?php echo $emp_arr['id']; ?>" value="<?php echo $emp_arr['user_id']; ?>"><?php echo $emp_arr['name']; ?></option>
                                                                <?php
                                                            }
                                                        ?>
													</select>
													<span class="select2 select2-container select2-container--bootstrap4 select2-container--below select2-container--focus" dir="ltr" data-select2-id="4"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-t3pw-container"><span class="select2-selection__rendered" id="select2-t3pw-container" role="textbox" aria-readonly="true" title="Choose on thing"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>    
												</div>
												<label for="task">Task Heading</label>
												<div class="input-group mb-3">
													
													<input type="text" class="form-control" placeholder="Task Heading" name="task_head" id="task_head">
												</div>
												<label for="Task">Task Details</label>
												<div class="input-group mb-3">
                                                    <textarea class="form-control height-20" placeholder="Task Details" name="task_details" id="task_details"></textarea>
												</div>
                                                <label for="dt">Assign date</label>
                                                <div class="input-group mb-3"> 
                                                    <input type="date" class="form-control" id="assign_date" name="assign_date" value = "<?php echo date('Y-m-d') ?>"> 
                                                </div>
                                                <label for="dt">End date</label>
                                                <div class="input-group mb-3"> 
                                                    <input type="date" class="form-control" id="end_date" name="end_date"> 
                                                </div>
												<label for="username">Post Behaviour</label>
												<div class="input-group  mb-3">
													
													<select data-select2-id="3" tabindex="-1" class="form-control" aria-hidden="true" name="behaviour" id="behaviour">
                                                        <option label="Select Behaviour">Select Behaviour</option>
                                                        <?php 
                                                            $sql_post = "select * from  post_behaviour_master";
                                                            $sql_post_rs = mysqli_query($con, $sql_post);
                                                            while($sql_post_arr = mysqli_fetch_array($sql_post_rs))
                                                            {

                                                                ?>
                                                                <option label="<?php echo ucwords(strtolower($sql_post_arr['behaviour'])); ?>" data-select2-id="<?php echo $sql_post_arr['id']; ?>" value="<?php echo $sql_post_arr['id']; ?>"></option>
                                                                <?php
                                                            }
                                                        ?>
													</select>
													<span class="select2 select2-container select2-container--bootstrap4 select2-container--below select2-container--focus" dir="ltr" data-select2-id="4"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-t3pw-container"><span class="select2-selection__rendered" id="select2-t3pw-container" role="textbox" aria-readonly="true" title="Choose on thing"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>    
												</div>
												
												<div class="bhm" id = "bhidm">
													<label for="task">Date</label>
													<div class="input-group mb-3">
														<select class="form-control">
															<?php
																for($i=1; $i<=31; $i++)
																{
																	?>
																	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
																	<?php
																}
															?>
														</select>
														<!-- <input type="date" class="form-control" placeholder="Date" name="onlydate" id="onlydate"> -->
													</div>
												</div>
												
												<div class="bh" id = "bhid">
													<label for="task">Date</label>
													<div class="input-group mb-3">
														
														<input type="date" class="form-control" placeholder="Date" name="date" id="date">
													</div>
												</div>
												<div class="bh4" id = "bhid4">
													<label for="task">From Date</label>
													<div class="input-group mb-3">
														
														<input type="date" class="form-control" placeholder="Task Heading" name="fdate" id="fdate">
													</div>
												</div>
												<div class="bh1" id = "bhid1">
													<label for="task">Time</label>
													<div class="input-group mb-3">
														
														<input type="time" class="form-control" placeholder="Task Heading" name="time" id="time">
													</div>
												</div>
												<div class="bh2" id = "bhid2">
													<label for="task">Days</label>
													<div class="input-group mb-3">
														
														<select class ="form-control" id="days" 	name="days">
															<option value="">Select Day</option>
															<option value="Sunday">Sunday</option>
															<option value="Monday">Monday</option>
															<option value="Tuesday">Tuesday</option>
															<option value="Wednesday">Wednesday</option>
															<option value="Thrusday">Thrusday</option>
															<option value="Friday">Friday</option>
															<option value="Saturday">Saturday</option>

														</select>
													</div>
												</div>
												
												
												<div class="form-group">
													<button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- END: Content-->
		<?php include ("dist/footer/index.php"); ?>

        <script language="javascript">
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
            $('#assign_date').attr('min',today);
            $('#end_date').attr('min',today);
        </script>

		<script>
					jQuery(document).ready(function($) {
			$("#behaviour").on('change', function() {
				var behaviour = $(this).val();
				if(behaviour){ 
					//alert(behaviour);
					$.ajax ({
						type: 'POST',
						url: 'post-behaviour.php',
						data: { hps_level: '' + behaviour + '' },
						success : function(htmlresponse) {

							if(htmlresponse == 1)
							{
								$("#bhidm").addClass("bhm");
								$("#bhid").addClass("bh");
								$("#bhid1").addClass("bh1");
								$("#bhid2").addClass("bh2");
								$("#bhid4").addClass("bh4");
					
							}
							else if(htmlresponse == 2)
							{
								$("#bhidm").removeClass("bhm");
								$("#bhid").addClass("bh");
								$("#bhid1").removeClass("bh1");
								$("#bhid2").addClass("bh2");
								$("#bhid4").addClass("bh4");
					
							}
							else if(htmlresponse == 3)
							{
								$("#bhidm").addClass("bhm");
								$("#bhid").addClass("bh");
								$("#bhid1").removeClass("bh1");
								$("#bhid2").removeClass("bh2");
								$("#bhid4").addClass("bh4");
							}
							else if(htmlresponse == 4)
							{
								$("#bhidm").addClass("bhm");
								$("#bhid").removeClass("bh");
								$("#bhid1").removeClass("bh1");
								$("#bhid2").addClass("bh2");
								$("#bhid4").addClass("bh4");
							}
							else if(htmlresponse == 5)
							{
								$("#bhidm").addClass("bhm");
								$("#bhid").removeClass("bh");
								$("#bhid1").removeClass("bh1");
								$("#bhid2").addClass("bh2");
								$("#bhid4").removeClass("bh4");
							}
						}
					});
				}
			});
		});
	</script>