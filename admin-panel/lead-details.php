<?php include("config.php");
	$id = $_REQUEST['id'];
	$sql_fet = "select * from leads where id=$id";
	$rs_fet = mysqli_query($con, $sql_fet);
	if($arr_fet = mysqli_fetch_array($rs_fet))
    {
	
	?>
        <!DOCTYPE html>
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
                                        <h4 class="mb-0">Lead Details</h4>
                                    </div>
                                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                        <li class="breadcrumb-item">Home</li>
                                        <li class="breadcrumb-item">Page</li>
                                        <li class="breadcrumb-item active"><a href="#">Leads</a></li>
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
                                        <form method="post" action="lead-update.php"  enctype="multipart/form-data">
                                            <div class="row">
                                                <label for="emp_code" class="col-sm-2 col-form-label">Contact Person Name</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-user"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Contact Person Name" aria-label="person_name" aria-describedby="person_name" name="cp_name" id="cp_name" value="<?php echo ucwords(strtolower($arr_fet['cp_name'])); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="emp_name" class="col-sm-2 col-form-label">Contact Person Number</label>
                                                <div class="col-sm-5">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-phone"></i></span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Contact Person Number" aria-label="person_number" aria-describedby="person_number" name="cp_number" id="cp_number" value="<?php echo $arr_fet['cp_number']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-phone"></i></span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder=" Alternate Contact Number" aria-label="person_number" aria-describedby="person_number" name="cp_anumber" id="cp_anumber" value="<?php echo $arr_fet['cp_anumber']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="emp_phno" class="col-sm-2 col-form-label">Contact Person Email-Id</label>
                                                <div class="col-sm-5">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-envelope"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Contact Person Email-Id" aria-label="person_email" aria-describedby="person_email" name="cp_email" id="cp_email" value="<?php echo $arr_fet['cp_email']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-envelope"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Alternate Email-Id" aria-label="person_email" aria-describedby="person_email" name="cp_aemail" id="cp_aemail" value="<?php echo $arr_fet['cp_aemail']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="emp_name" class="col-sm-2 col-form-label">Location</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-map"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Location" aria-label="location" aria-describedby="location" name="location" id="location" value="<?php echo $arr_fet['location']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="position" class="col-sm-2 col-form-label">Website</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-globe"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder=" Website URL" aria-label="Website" aria-describedby="Website" name="website" id="website" value="<?php echo $arr_fet['website']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="position" class="col-sm-2 col-form-label">Requirment</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0" ><i class="icon-briefcase"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder=" Requirment" aria-label="requirment" aria-describedby="requirment" name="query" id="query" value="<?php echo $arr_fet['query']; ?>">
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
                                                        <input type="date" class="form-control" placeholder="date" aria-label="date" aria-describedby="date" name="date" id="date" value="<?php echo $arr_fet['date']; ?>" readonly = "true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="date" class="col-sm-2 col-form-label">Follow Up-date</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-transparent border-right-0"><i class="icon-calendar"></i></span>
                                                        </div>
                                                        <input type="datetime-local" class="form-control" placeholder=" Follow Up-date" aria-label="update" aria-describedby="update" name="follow_update" id="follow_update" value="<?php echo $arr_fet['follow_update']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="position" class="col-sm-2 col-form-label">Message</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-3">
                                                        <textarea rows = "4" column = "50" class="form-control" placeholder="Extra Details " aria-label="message" aria-describedby="message" name="comment" id="comment" ><?php echo $arr_fet['comment']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
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
                    window.location.href="leads-report.php";
                </script>
                <?php
            }
?>