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
							<h4 class="mb-0">Bill Report</h4>
						</div>
						<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item">Bill</li>
							<li class="breadcrumb-item active"><a href="#">Bill Report</a></li>
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
											<th>Customer Details</th>
											<th>No. of Package</th>
											<th>Amount</th>
											<th>Tax</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$date = date('d-m-Y');
											$total_igst=0;
											$total_cgst=0;
											$total_sgst=0;
											$total_othertax=0;
											$total_amount=0;
											$amount=0;
											$cgst=0;
											$sgst=0;
											$igst=0;
											$other_tax=0;
											
											$bill = "SELECT * from bills  WHERE status = 0  and cust_id!=0 group by uid order by id DESC";
											$bill_rs = mysqli_query($con, $bill);
											while($bill_arr = mysqli_fetch_array($bill_rs))
											{
												$cust = "select * from customer_details where id = '$bill_arr[cust_id]';";
												$cust_rs = mysqli_query($con, $cust);
												$cust_arr = mysqli_fetch_array($cust_rs);

												$comp = "select * from company_details where id= '$bill_arr[company_id]'";
												$comp_rs = mysqli_query($con, $comp);
												$comp_arr = mysqli_fetch_array($comp_rs);
												
												$cnt = 0;
												$bill_amount = "select * from bills where uid='$bill_arr[uid]'";
												$bill_amount_rs = mysqli_query($con, $bill_amount);
												while($bill_amount_arr = mysqli_fetch_array($bill_amount_rs))
												{
												    
    											    $inv = "select * from invoice where bills_uid='$bill_arr[uid]'";
    											    $inv_rs = mysqli_query($con, $inv);
    											    $inv_arr = mysqli_fetch_array($inv_rs); 
    											    
												    $cnt++;
												    $amount = $bill_amount_arr['amount'];
    												if($bill_amount_arr['cgst'] > 0)
    												{
    													$cgst_p = $bill_amount_arr['cgst']/100;
    													$cgst += $cgst_p*$amount;
    												}
    												if($bill_amount_arr['sgst'] > 0)
    												{
    													$sgst_p = $bill_amount_arr['sgst']/100;
    													$sgst += $sgst_p*$amount;
    												}
    												if($bill_amount_arr['igst'] > 0)
    												{
    													$igst_p = $bill_amount_arr['igst']/100;
    													$igst += $igst_p*$amount;
    												}
    												if($bill_amount_arr['other_tax'] > 0)
    												{
    													$other_p = $bill_amount_arr['other_tax']/100;
    													$other += $other_p*$amount;
    												}
    												
												    $total_amount += $amount;
												}
												if($cust_arr['firm_name'])
                                                {
                                                    $name = $cust_arr['firm_name'];
                                                }
                                                else
                                                {
                                                    $name = $cust_arr['person_name'];
                                                }
											    ?>
												<tr>
													<td><?php echo $i++; ?></td>
													<td><?php echo ucwords(strtolower($name.' - ' .$cust_arr['contact']));?></td>
													<td class="text-center"><?php echo $cnt; ?></td>
													<td class="text-right"><?php echo $total_amount; ?></td>
													<td class="text-right"><?php $tt = $cgst + $sgst + $igst + $other; echo $tt; ?></td>
													<td  class="text-center"><?php echo date('d-m-Y', strtotime($bill_arr['date'])); ?></td>
													<td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                            <div class="dropdown-menu p-0">
																<?php
																    if($inv_arr['id'])
																    {
																        ?>
                                                                        <a class="dropdown-item" href="bill-invoice.php?id=<?php echo $bill_arr['uid']; ?>&generate=0">View Invoice</a>
                                                                        <?php
																    }
																    else
																    {
																        ?>
																        <a class="dropdown-item" href="bill-update.php?id=<?php echo $bill_arr['id']; ?>&view=0">Edit</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="bill-updatedb.php?id=<?php echo $bill_arr['uid']; ?>&delete=1">Delete</a>
        																<div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item" href="bill-invoice.php?id=<?php echo $bill_arr['uid']; ?>&generate=1">Generate Invoice</a>
                                                                        <?php
																    }
														        ?>
                                                            </div>
                                                        </div>
                                                    </td>
												</tr>
												<?php
												$tt =0;
												$total_amount =0;
												$other=0;
												$cgst=0;
												$sgst=0;
												$igst=0;
												$other_tax=0;
												$cgst_p=0;
												$sgst_p=0;
												$igst_p=0;
												$other_tax_p=0;
											}
											
										?>
									</tbody>
									<tfoot>
									    <tr>
											<th>#</th>
											<th>Customer Details</th>
											<th>No. of Package</th>
											<th>Amount</th>
											<th>Tax</th>
											<th>Date</th>
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