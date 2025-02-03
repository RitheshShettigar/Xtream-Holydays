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
								<h4 class="mb-0">Hotel Bookings Report</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Lead</li>
								<li class="breadcrumb-item active"><a href="#">Hotel Bookings Details</a></li>
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
												<th>Hotel Id</th>
												<th>Room Id</th>
                                                <th>Check In Date</th>
                                                <th>Check Out Date</th>
												<th>No. of persons</th>
												<th>No. of Rooms</th>
                                                											
											</tr>
										</thead>
										<tbody>
                                            <?php
                                                $i=1;
                                                $sql_fetch_web = "select * from hotel_request order by id desc";
                                                $sql_fetch_web_rs = mysqli_query($con, $sql_fetch_web);
                                                

                                                while($sql_fetch_web_arr = mysqli_fetch_array($sql_fetch_web_rs))
                                                {
													
                                                    ?>
                                                        <td><?php echo $i++; ?> </td>
                                                        <td><?php echo ucwords(strtolower($sql_fetch_web_arr['name']));?></td>
                                                        <td><?php echo $sql_fetch_web_arr['phone'] ?></td>
                                                        <td><a href ="mail.php?email=<?php echo $sql_fetch_web_arr['email'] ?>" target = "_blank"><?php echo $sql_fetch_web_arr['email'] ?></a></td>
                                                        <td><?php echo $sql_fetch_web_arr['hotel_id'] ?></td>
														<td><?php echo $sql_fetch_web_arr['room_id'] ?></td>
                                                        <td><?php echo $sql_fetch_web_arr['check_in'] ?></td>
                                                        <td><?php echo $sql_fetch_web_arr['check_out'] ?></td>
                                                        <td><?php echo $sql_fetch_web_arr['persons'] ?></td>
                                                        <td><?php echo $sql_fetch_web_arr['rooms'] ?></td>
														<td><?php if($status_fet_arr['followup_date']) { echo date('d-m-Y h:m a', strtotime($status_fet_arr['followup_date'])); } ?></td>
                                                        <td><a href = "lead-website.php?id=<?php echo $sql_fetch_web_arr['id'] ?>" class="btn btn-primary">Update</a></td>
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
												<th>Hotel Id</th>
												<th>Room Id</th>
                                                <th>Check In Date</th>
                                                <th>Check Out Date</th>
												<th>No. of persons</th>
												<th>No. of Rooms</th>
                                                											
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