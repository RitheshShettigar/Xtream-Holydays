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
								<h4 class="mb-0">Subscribers</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Subscribers</li>
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
												<th>S.no</th>
												<th>Email-Id</th>
                                                <th>Date</th>														
											</tr>
										</thead>
										<tbody>
                                            
                                            <?php
                                                $i = 1;
                                                 $sql_subs = "select * from subscribe order by id desc";
                                                $sql_subs_rs = mysqli_query($con, $sql_subs);
                                                while($sql_subs_arr = mysqli_fetch_array($sql_subs_rs))
                                                {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i++;  ?></td>
                                                            <td><?php  echo $sql_subs_arr['email']; ?></td>
                                                            <td><?php echo date('d-m-Y', strtotime($sql_subs_arr['created_at'])); ?></td>
                                                        </tr>
                                                    <?php
                                                }

                                            ?>
											
										</tbody>
										<tfoot>
                                            <tr>
												<th>S.no</th>
												<th>Email-Id</th>
                                                <th>Date</th>								
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