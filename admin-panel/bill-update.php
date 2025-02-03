<?php include ("config.php");
	error_reporting(0);
	
	if($_REQUEST['id'])
	{
        $id = $_REQUEST['id'];        
		$bill_fetch = "select * from bills where id = '$id'";
		$bill_fetch_rs = mysqli_query($con, $bill_fetch);
		$bill_fetch_arr = mysqli_fetch_array($bill_fetch_rs);
	}
    else
    {
        ?>
            <script>
                window.location.href="bill-report.php";
            </script>
        <?php
    }
	?>
<!DOCTYPE html>
<html lang="en">
	<!-- START: Head-->
	<head>
		<meta charset="UTF-8">
		<title>Xtream Holiday Packages</title>
		<?php include ("dist/header/index.php"); ?>
		<?php include ("dist/navbar/sidebar.php"); ?>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" href="dist/vendors/select2/css/select2.min.css"/>
		<link rel="stylesheet" href="dist/vendors/select2/css/select2-bootstrap.min.css"/>
		<!-- START: Main Content-->
        <style>
            .mh60 {
                min-height:60px;

            }
        </style>
		<main>
			<div class="container-fluid">
				<!-- START: Breadcrumbs-->
				<div class="row ">
					<div class="col-12  align-self-center">
						<div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
							<div class="w-sm-100 mr-auto">
								<h4 class="mb-0">Update Bill</h4>
							</div>
							<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
								<li class="breadcrumb-item">Home</li>
								<li class="breadcrumb-item">Bill</li>
								<li class="breadcrumb-item active">Update Bill</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- END: Breadcrumbs-->
				<!-- START: Card Data-->
				<div class="row">
					<div class="col-12 col-lg-12 mt-3">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="col-12 col-lg-12 mt-3">
											<section class="container">
												<form method = "post" action = "bill-updatedb.php">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text bg-transparent border-right-0" id="date"><i class="fas fa-file-invoice-dollar	"></i></span>
                                                                </div>
                                                                <input type ="date" class="form-control" value="<?php if($bill_fetch_arr['date']) { echo date('Y-m-d', strtotime($bill_fetch_arr['date'])); } else { echo date('Y-m-d'); } ?>" min="2023-01-01" max="2025-12-31" name="date" id="date">														
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text bg-transparent border-right-0" id="bank_details"><i class="fas fa-file-invoice-dollar	"></i></span>
                                                                </div>
                                                                <select class="form-control" name="bank_details" id="bank_details">
                                                                    <option label="Select Bank Details" value="">Select Bank Details</option>
                                                                    <?php
                                                                            $bank = "select * from bank_details where status = 0";
                                                                            $ban_rs = mysqli_query($con, $bank);
                                                                            while($bank_arr = mysqli_fetch_array($ban_rs))
                                                                            { 
                                                                                ?>
                                                                                    <option value="<?php echo $bank_arr['id']; ?>"<?php if($_REQUEST['id']) { if($bank_arr['id'] == $bill_fetch_arr['bank_id']) { echo "selected"; } } ?>><?php echo $bank_arr['acc_holder_name']. ' - ' .$bank_arr['bank_name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                </select>														
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text bg-transparent border-right-0" id="cust_details"><i class="fas fa-file-invoice-dollar	"></i></span>
                                                                </div>
                                                                <select class="form-control"  name="cust_details" id="cust_details">
                                                                    <option label="Select Customer" value="">Select Customer</option>
                                                                        <?php
                                                                            $cust = "select * from customer_details where status = 0";
                                                                            $cust_rs = mysqli_query($con, $cust);
                                                                            while($cust_arr = mysqli_fetch_array($cust_rs))
                                                                            { 
                                                                                if($cust_arr['firm_name'])
                                                                                {
                                                                                    $name = $cust_arr['firm_name'];
                                                                                }
                                                                                else
                                                                                {
                                                                                    $name = $cust_arr['person_name'];
                                                                                }
                                                                                ?>
                                                                                    <option value="<?php echo $cust_arr['id']; ?>" <?php if($_REQUEST['id']) { if($cust_arr['id'] == $bill_fetch_arr['cust_id']) { echo "selected"; } } ?>><?php echo $name. ' - ' .$cust_arr['contact']; ?></option>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                </select>														
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text bg-transparent border-right-0" id="comp_details"><i class="fas fa-file-invoice-dollar	"></i></span>
                                                                </div>
                                                                <select  class="form-control" name="comp_details" id="comp_details">
                                                                    <option label="Select Company Details" value="">Select Company Details</option>
                                                                    <?php
                                                                            $comp = "select * from company_details where status = 0";
                                                                            $comp_rs = mysqli_query($con, $comp);
                                                                            while($comp_arr = mysqli_fetch_array($comp_rs))
                                                                            { 
                                                                                ?>
                                                                                    <option value="<?php echo $comp_arr['id']; ?>"<?php if($_REQUEST['id']) { if($comp_arr['id'] == $bill_fetch_arr['company_id']) { echo "selected"; } } ?>><?php echo $comp_arr['firm_name']. ' - ' .$comp_arr['gst_no']; ?></option>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                </select>														
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
														<table class="display table dataTable table-striped table-bordered">
															<thead>
																<tr>
																	<td style="min-width: 350px;">Name of Product / Service</td>
																	<td style="min-width: 150px;">Amount</td>
																	<td>SGST</td>
																	<td>CGST</td>
																	<td>IGST</td>
																	<td>Other Tax</td>
																	<td>Action</td>
																</tr>
															</thead>
															<tbody id="TextBoxContainer">
                                                                <?php
                                                                    $bill = "select * from `bills` where status= 0 and uid='$bill_fetch_arr[uid]'";
                                                                    $bill_rs = mysqli_query($con, $bill);
                                                                    while($bill_arr = mysqli_fetch_array($bill_rs))
                                                                    {
                                                                        ?>
                                                                            <tr>
                                                                                <td><textarea name = "desc[]" placeholder="Name of Product / Service" class="form-control" ><?php echo $bill_arr['description']; ?></textarea></td>
                                                                                <td><input type="number" name="amount[]" placeholder="Enter Amount" value = "<?php echo $bill_arr['amount']; ?>" class="form-control mh60" /></td>
                                                                                <td><input type="number" name="sgst[]" placeholder="Enter SGST" value = "<?php echo $bill_arr['sgst']; ?>" class="form-control mh60" /></td>
                                                                                <td><input type="number" name="cgst[]" placeholder="Enter CGST" value = "<?php echo $bill_arr['cgst']; ?>" class="form-control mh60" /></td>
                                                                                <td><input type="number" name="igst[]" placeholder="Enter Amount" value = "<?php echo $bill_arr['igst']; ?>" class="form-control mh60" /></td>
                                                                                <td><input type="number" name="other_tax[]" placeholder="Enter Amount" value = "<?php echo $bill_arr['other_tax']; ?>" class="form-control mh60" /></td>
                                                                                <td><button type="button" class="btn btn-danger remove"><i class="fas fa-minus-square">&nbsp Remove </i></button></td>
                                                                            <tr>
                                                                        <?php
                                                                    }
                                                                ?>
															</tbody>
															<tfoot>
																<tr>
																	<th colspan="3">
																		<button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add more"><i class="fas fa-plus-square"></i>&nbsp; Add&nbsp;</button>
																		<input type="hidden" name="bill_id" value="<?php echo $id; ?>">
																		<button type="submit" name="submit" class="btn btn-primary" >Submit</button>
																	</th>
																</tr>
															</tfoot>
														</table>
													</div>
												</form>
											</section>
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
		<script src="https://code.jquery.com/jquery-latest.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
			$(function () {
			    $("#btnAdd").bind("click", function () {
			        var div = $("<tr />");
			        div.html(GetDynamicTextBox(""));
			        $("#TextBoxContainer").append(div);
			    });
			    $("body").on("click", ".remove", function () {
			        $(this).closest("tr").remove();
			    });
			});
			function GetDynamicTextBox(value) {
			    return '<td><textarea name = "desc[]" placeholder="Name of Product / Service" value = "' + value + '" class="form-control" /></textarea></td>' + '<td><input type="number" name="amount[]" placeholder="Enter Amount" value = "' + value + '" class="form-control mh60" /></td>' + '<td><input type="text" name="sgst[]" value = "' + value + '" class="form-control mh60" placeholder="%"></td>' + '<td><input type="text" name="cgst[]" value = "' + value + '" class="form-control mh60" placeholder="%"></td>' + '<td><input type="text" name="igst[]" value = "' + value + '" class="form-control mh60" placeholder="%"></td>' + '<td><input type="text" name="other_tax[]" value = "' + value + '" class="form-control mh60" placeholder="%"></td>' + '<td><button type="button" class="btn btn-danger remove"><i class="fas fa-minus-square">&nbsp Remove </i></button></td>'
			}
            moment().format('DD/MM/YYYY');
		</script>
        <script src="dist/vendors/select2/js/select2.full.min.js"></script>
		<script src="dist/js/select2.script.js"></script>
        