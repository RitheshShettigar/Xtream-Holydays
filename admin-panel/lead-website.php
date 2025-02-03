<?php include("config.php");
	$id = $_REQUEST['id'];
	$sql_fet = "select * from contact where id=$id";
	$rs_fet = mysqli_query($con, $sql_fet);
	if($arr_fet = mysqli_fetch_array($rs_fet))
    {
        $st_co_sql = "select * from contact_status where contact_id='$arr_fet[id]' order by id desc limit 1";
        $st_co_rs = mysqli_query($con, $st_co_sql);
        $st_co_arr = mysqli_fetch_array($st_co_rs);

        $st_co_sql1 = "select * from contact_status where contact_id='$arr_fet[id]' order by id desc";
        $st_co_rs1 = mysqli_query($con, $st_co_sql1);
	?>
        <!DOCTYPE htm>
        <html lang="en">
            <!-- START: Head-->
            <head>
                <meta charset="UTF-8">
                <title>Xtream Holiday Admin</title>
                <?php include ("dist/header/index.php"); ?>
                <?php include ("dist/navbar/sidebar.php"); ?>
                <main>
                    <div class="container-fluid">
                        <!-- START: Breadcrumbs-->
                        <div class="row ">
                            <div class="col-12  align-self-center">
                                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                                    <div class="w-sm-100 mr-auto">
                                        <h4 class="mb-0">Website Lead Details</h4>
                                    </div>
                                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                        <li class="breadcrumb-item">Home</li>
                                        <li class="breadcrumb-item">Leads</li>
                                        <li class="breadcrumb-item active"><a href="#">Website Leads</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END: Breadcrumbs-->
                        <!-- START: Card Data-->
                        <div class="row">
                            <div class="col-12 col-md-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" action="lead-website-update.php"  enctype="multipart/form-data">
                                            <div class="row">
                                                <label for="emp_code" class="col-sm-2 col-form-label"> Name</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-user"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder=" Name" aria-label="person_name" aria-describedby="person_name" name="name" id="name" value="<?php echo ucwords(strtolower($arr_fet['name'])); ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="emp_name" class="col-sm-2 col-form-label">Contact  Number</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-phone"></i></span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Contact  Number" aria-label="person_number" aria-describedby="person_number" name="contact" id="contact" value="<?php echo $arr_fet['contact']; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="emp_phno" class="col-sm-2 col-form-label"> Email-Id</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-envelope"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder=" Email-Id" aria-label="person_email" aria-describedby="person_email" name="email" id="email" value="<?php echo $arr_fet['email']; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="emp_name" class="col-sm-2 col-form-label">Website</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-map"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Location" aria-label="location" aria-describedby="location" name="url" id="url" value="<?php echo $arr_fet['url']; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="position" class="col-sm-2 col-form-label">Company</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-globe"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder=" Website URL" aria-label="Website" aria-describedby="Website" name="company" id="company" value="<?php echo $arr_fet['company']; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="position" class="col-sm-2 col-form-label">Service</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-briefcase"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder=" Requirment" aria-label="requirment" aria-describedby="requirment" name="service" id="service" value="<?php echo $arr_fet['service']; ?>" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
                                                        </div>
                                                        <input type="date" class="form-control" placeholder="date" aria-label="date" aria-describedby="date" name="date" id="date" value="<?php echo date('Y-m-d', strtotime($arr_fet['created_at'])); ?>" readonly = "true" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <label for="position" class="col-sm-2 col-form-label">Message</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <textarea rows = "4" column = "50" class="form-control" placeholder="Extra Details " aria-label="message" aria-describedby="message" name="message" id="message" readonly="true" ><?php echo $arr_fet['message'];?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="date" class="col-sm-2 col-form-label">Follow-Up Date</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
                                                        </div>
                                                        <input type="datetime-local" class="form-control" placeholder="date" aria-label="date" aria-describedby="date" name="date1" id="date1" value="<?php echo $st_co_arr['followup_date']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="position" class="col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-options"></i></span>
                                                        </div>
                                                        <select name = "status" id = "status" class = "form-control">
                                                            <option>Select Status</option>
                                                            <option value ="Assigned" <?php if($st_co_arr['status'] == 'Assigned') { echo "selected"; } ?>>Assigned</option>
                                                            <option value ="In-Process" <?php if($st_co_arr['status'] == 'In-Process') { echo "selected"; } ?>>In-Process</option>
                                                            <option value ="On Hold" <?php if($st_co_arr['status'] == 'On Hold') { echo "selected"; } ?>>On Hold</option>
                                                            <option value ="Completed" <?php if($st_co_arr['status'] == 'Completed') { echo "selected"; } ?>>Completed</option>
                                                            <option value ="Cancelled" <?php if($st_co_arr['status'] == 'Cancelled') { echo "selected"; } ?>>Cancelled</option>
                                                            <option value ="Pass To" <?php if($st_co_arr['status'] == 'Pass To') { echo "selected"; } ?>>Pass To</option>
												        </select>                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="position" class="col-sm-2 col-form-label">Comment</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <textarea rows = "4" column = "50" class="form-control" placeholder="Extra Details " aria-label="message" aria-describedby="message" name="comment" id="comment" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class = "row">
                                                        <?php
                                                            while($st_co_arr1 = mysqli_fetch_array($st_co_rs1))
                                                            {
                                                                $sql_fetch = "select * from user where id = '$st_co_arr1[added_by]'";
                                                                $sql_fetch_rs = mysqli_query($con, $sql_fetch);
                                                                $sql_fetch_arr = mysqli_fetch_array($sql_fetch_rs)
                                                            
                                                                ?>
                                                                <div class="col-12 col-lg-6  col-xl-4 mt-3">
                                                                    <div class="card bg-light">
                                                                        <div class="card-header"><?php echo date('d-M-Y h:i A', strtotime($st_co_arr1['created_at'])) ?></div>
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"><?php echo $sql_fetch_arr['name'] ?></h5>
                                                                            <p class="card-text"><?php echo $st_co_arr1['comment'] ?></p>
                                                                            <p class="card-text"><?php echo $st_co_arr1['status'] ?></p>
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
                                                    <input type = "hidden" name = "id" value = "<?php echo $id ?>" >
                                                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Card DATA-->
                    </div>
                </main>
                <!-- END: Content-->
            <?php include ("dist/footer/index.php"); ?>
	<?php
    }
        else
            {
                ?>
                <script>
                    window.location.href="leads-website.php";
                </script>
                <?php
            }
?>