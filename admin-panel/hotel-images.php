<?php include ("config.php"); 
	error_reporting(0);
    $id = $_REQUEST['id'];
    if($id)
    {
        $sql = "select * from hotel_master where id = '$id'";
        $sql_rs = mysqli_query($con, $sql);
        $sql_arr = mysqli_fetch_array($sql_rs);
    }
    else
    {
        ?>
            <script>
                window.location.href = "hotel-new.php";
            </script>
        <?php
    }
?>

<!DOCTYPE html>
<html lang="en">
	<!-- START: Head-->
	<head>
		<meta charset="UTF-8">
		<title>Xtream Holiday | Hotel Extra Details</title>
		<?php include ("dist/header/index.php"); ?>
		<?php include ("dist/navbar/sidebar.php"); ?>
        <link rel="stylesheet" href="dist/vendors/fancybox/jquery.fancybox.min.css">  

        <style>
            .drop-zone {
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
                height: 200px;
                border-width: 2px;
                margin-bottom: 20px;
                color: #646c7f;
                border-style: dashed;
                border-color: #0087f7;
                border-radius: 5px;
                line-height: 200px;
                cursor: pointer;
            }
            .drop-zone.is-dragover {
                color: #999;
                border-style: solid;
            }
            .drop-zone.has-images {
                justify-content: flex-start;
            }
            .drop-zone.has-images .msg {
                display: none;
            }
            .drop-zone input.has-image {
                opacity: 1;
                width: 0px;
                heigth: 0px;
            }
            .drop-zone input.receiver {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                cursor: pointer;
            }
            .drop-zone .preview {
                display: flex;
                align-items: center;
                position: relative;
                cursor: default;
                margin: 0 5px;
                height: 120px;
                border-radius: 5px;
            }
            .drop-zone .preview:hover .details {
                display: flex;
            }
            .drop-zone .preview img {
                max-width: 120px;
                max-height: 120px;
                border-radius: 5px;
            }
            .drop-zone .preview .details {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: none;
                align-items: center;
                justify-content: center;
            }
            .drop-zone .preview .remove {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 30px;
                width: 30px;
                border-radius: 50%;
                background-color: #e40000;
                cursor: pointer;
            }
            .drop-zone .preview .remove .fa {
                font-size: 20px;
                color: white;
            }
            
        </style>
		<!-- START: Main Content-->
        <main>
            <div class="container-fluid">
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Hotel Images</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Hotel</li>
                                <li class="breadcrumb-item active"><a href="#">Images</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="row">
                            <div class="col-12 col-md-12 mt-3">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">                               
                                        <!-- <h4 class="card-title">Dropzone Primary</h4> -->
                                    </div>
                                    <div class="card-body">
                                        <form action="hotel-images-upload.php" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-6 mt-3">
                                                    <span>Hotel Name</span>
                                                    <input type="text" class="form-control" name="hotel" value="<?php echo $sql_arr['hotel_name']; ?>">
                                                    <input type="hidden" name="hotel_id" value="<?php echo $sql_arr['id']; ?>" id="packageid">
                                                    <input type ="hidden" name="delete" value="0">
                                                </div>
                                                <?php
                                                    $room_master = "select * from  room_master where hotel_id = '$sql_arr[id]'";
                                                    $room_master_rs = mysqli_query($con, $room_master);
                                                    
                                                ?>
                                                <div class="col-6 mt-3">
                                                    <span>Select Room</span>
                                                    <select class="form-control" name="room_id" id="room_id">
                                                        <option value="#">Hotel Images</option>
                                                       <?php
                                                            while($room_master_arr = mysqli_fetch_array($room_master_rs))
                                                            {
                                                                ?>
                                                                    
                                                                    <option value="<?php echo $room_master_arr['id']; ?>" ><?php echo $room_master_arr['room_heading']; ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mt-3">
                                                    <div class="container">
                                                        <div class="drop-zone">
                                                            <div class="msg">Just drag and drop files here</div>
                                                            <input type="file" name="image_name[]"  class="receiver" multiple/>
                                                        </div>
                                                        <!-- <input type="file" name="image_name"> -->
                                                    </div>       
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mt-3">
                                                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                </div>
                                            </div>
                                        </form>
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
        <main>
            <div class="container-fluid">
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Gallery</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Page</li>
                                <li class="breadcrumb-item active"><a href="#">Gallery</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->
                <div class="col-12  mt-3">                          
                        <div class="card"> 

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <ul class="filter p-0">
                                            <li class="d-inline-block"><a class="filter-button active" href="#" data-group="all">All</a></li>
                                            <?php
                                                $img_fetch = "select * from room_master where hotel_id = $id and status = 0";
                                                $img_fetch_rs = mysqli_query($con, $img_fetch);
                                                while($img_fetch_arr = mysqli_fetch_array($img_fetch_rs))
                                                {
                                                    
                                                    ?>
                                                         <li class="d-inline-block"><a href="#" class="filter-button" data-group="<?php echo $img_fetch_arr['id']; ?>"><?php  echo $img_fetch_arr['room_heading']; ?></a></li>
                                                    <?php
                                                }


                                            ?>
                                        </ul>
                                    </div> 
                                    <div class="clearfix"></div>
                                </div>
                                <div id="grid" class="row">
                                    <?php
                                            $img = "select * from hotel_images where hotel_id = $id and status = 0";
                                            $img_rs = mysqli_query($con, $img);
                                            while($img_arr = mysqli_fetch_array($img_rs))
                                            {
                                                ?>
                                                    <div class="item col-12 col-md-6 col-lg-4 mb-4 text-center <?php if($img_arr['room_id']) { echo $img_arr['room_id']; } ?>">                                       
                                                        <img src="<?php echo $img_arr['image_path'].''.$img_arr['image_name']; ?>" alt="" class="portfolioImage img-fluid">
                                                        <div class="d-flex">
                                                            <a data-fancybox-group="gallery" href="dist/images/portfolio1.jpg" class="fancybox btn rounded-0 btn-dark w-50">View Large</a>
                                                            <a href="hotel-images-upload.php?id=<?php echo $img_arr['id']; ?>&delete=1&hotel_id=<?php echo $id; ?>" class="btn btn-primary rounded-0 w-50">Delete</a>                                                   
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                    ?>
                                        
                                </div>
                            </div>                                
                        </div>
                    </div>
                <!-- START: Card Data-->
            </div>
        </main>
		<?php include "dist/footer/index.php"; ?>

        <script>
                (function() {
                // WARNING: This solution doesn't work on IE. It was tested only on Chrome
                var DropZone;

                DropZone = class DropZone {
                    constructor() {
                    // TODO: .has-image has to be removed when remove all images
                    // TODO: Generate uniq id and add to input.has-image and .preview 
                    //       in order to remove them both when click on .remove

                    // Hide input.receiver and insert the new one
                    this.onchange = this.onchange.bind(this);
                    this.dropZone = $('.drop-zone');
                    // Add/Remove .is-dragover when hover/leave
                    this.dropZone.on('dragover dragenter', () => {
                        return this.dropZone.addClass('is-dragover');
                    });
                    this.dropZone.on('dragleave dragend drop', () => {
                        return this.dropZone.removeClass('is-dragover');
                    });
                    this.dropZone.on('change', this.onchange);
                    }

                    onchange(e) {
                    var $receiver, files;
                    this.dropZone.addClass('has-images');
                    
                    // Rename input.receiver => input.has-image
                    $receiver = $(e.target);
                    $receiver.removeClass('receiver');
                    $receiver.addClass('has-image');
                    // Add new .receiver
                    $('<input type="file" class="receiver" name="image_name[]" multiple>').prependTo(this.dropZone);
                    // Preview
                    files = $receiver[0].files;
                    return this.displayPreview(files);
                    }

                    displayPreview(files) {
                    var file, i, len, reader, results;
                    results = [];
                    for (i = 0, len = files.length; i < len; i++) {
                        file = files[i];
                        reader = new FileReader();
                        reader.onload = (e) => {
                        var url;
                        url = e.currentTarget.result;
                        return this.template(url).appendTo(this.dropZone);
                        };
                        results.push(reader.readAsDataURL(file));
                    }
                    return results;
                    }

                    template(url) {
                    return $(`<div class="preview">
                <div class="image">
                    <img src="${url}">
                </div>
                <div class="details">
                    <div class="remove">
                    <span class="fa fa-trash"></span>
                    </div>
                </div>
                </div>`);
                    }

                };

                new DropZone();

                }).call(this);

        </script>

<script src="dist/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="dist/vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="dist/vendors/moment/moment.js"></script>
        <script src="dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
        <script src="dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="dist/vendors/flag-select/js/jquery.flagstrap.min.js"></script> 
        <!-- END: Template JS-->
        
        <!-- START: APP JS-->
        <script src="dist/js/app.js"></script>
        <!-- END: APP JS-->

        <!-- START: Page Vendor JS-->
        <script src="dist/vendors/fancybox/jquery.fancybox.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- START: Page JS-->
        <script src="dist/js/gallery.script.js"></script>