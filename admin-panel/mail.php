<?php include ("config.php");
	error_reporting(0);
	   session_start();
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
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">App Mail</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">App</li>
                                <li class="breadcrumb-item active"><a href="#">Mail</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">

                    <div class="col-12 col-lg-12 mb-4 mt-3 pl-lg-0">
                        <div class="card border border-left-0 h-100">
                            <div class="row m-0 border-bottom theme-border">
                                <div class="col-12 d-flex  py-2 font-weight-bold">
                                    New Message.

                                </div>

                            </div>
                            <?php
                              $email = $_REQUEST['email'];
                            ?>
                            <div class="card-body">
                                <form>
                                    <div class="input-group mb-4">
                                        <label class = "col-sm-1 col-form-label">To : </label>
                                        <input type="text" class="form-control" placeholder="To." value = "<?php if($email) { echo $email; } ?>">
                                    </div>
                                    <div class="input-group mb-4">
                                    <label class = "col-sm-1 col-form-label">From : </label>
                                        <input type="text" class="form-control" placeholder="From.">
                                    </div>
                                    <div class="input-group mb-4">
                                    <label class = "col-sm-1 col-form-label">Subject : </label>
                                        <input type="text" class="form-control" placeholder="Subject.">
                                    </div>
                                    <div class="form-group">
                                    <div class="summernote">summernote 1</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="file">
                                            <input type="file" id="file" aria-label="File browser example">
                                            <span class="file-custom"></span>
                                        </label>
                                    </div>



                                    <a href="#" class="btn btn-primary btn-sm">Send</a>
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
        
        <script>
            $('.summernote').summernote({
                airMode: true
            });
</script>