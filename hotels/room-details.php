<?php 
	include ("../includes/header/index.php");
	include ("../includes/contact-us/config.php");
	   date_default_timezone_set("Asia/Calcutta");
	   $id = $_REQUEST['id'];


	   $sql_room = "select * from room_master where status = 0 and id = '$id'";
	   $sql_room_rs = mysqli_query($con, $sql_room);
	   if($sql_room_arr = mysqli_fetch_array($sql_room_rs))
	   {
        
            $sql_hotel = "select * from hotel_master where status = 0 and id = '$sql_room_arr[hotel_id]'";
            $sql_hotel_rs = mysqli_query($con, $sql_hotel);
            $sql_hotel_arr = mysqli_fetch_array($sql_hotel_rs);
	       $url = "http://localhost/xtreamholiday/tour-offers/offer.php?id=$id";
	?>
        <title><?php echo $sql_hotel_arr['hotel_name'].' '.$sql_room_arr['room_heading']; ?></title>
        <meta charset="UTF-8">
        <meta name="description" content="Assam is famous for tea and Assam silk. Kaziranga national park is home to tigers, elements & the world’s largest population of Indian one-horned rhinoceroses.">
        <meta name="keywords" content="Best tour and travel agency in India, tour and travel agency, tour and travels near me, Best tour and travels, best travels agency, customized tour packages, best, places to visit on holiday, Best holiday packages, Best places to visit in summer, Best places to visit in winter best places to visit in a rainy season, Holiday packages, Two days holiday packages, Best holiday packages, India tour Packages, best international tour packages, about xtream holiday travel agency, best India tour packages, best north India tour packages, best south India tour packages, best east India tour packages, best west India tour packages, best Bhutan tour packages, Karnataka tour packages, best school tour packages, best honeymoon packages, best family tour packages, couple tour packages, solo trip packages, best tour and travel services.">
        <meta name="author" content="Scopycode">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="canonical" href="<?php echo $url; ?>" />
        <?php include ("../includes/header/index1.php"); ?>
        <section class="inner-page-banner" style="background-image:url(http://localhost/xtreamholiday/includes/img/india-tour-packages/natural-beauty-of-asam/natural-beauty-of-asam-banner.png)">
            <div class="page-banner-caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1><?php echo ucwords($sql_hotel_arr['hotel_name']); ?><small><?php echo ' ('.ucwords(strtolower($sql_room_arr['room_heading'])).')'; ?></small></h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://localhost/xtreamholiday">Home</a></li>
                                <li class="breadcrumb-item"><a href="http://localhost/xtreamholiday/india-tour-packages/">Hotels</a></li>
                                <li class="breadcrumb-item"><a href="http://localhost/xtreamholiday/hotels/hotel-details.php?id=<?php echo $sql_hotel_arr['id']; ?>"><?php echo ucwords($sql_hotel_arr['hotel_name']); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo ucwords(strtolower($sql_room_arr['room_heading'])); ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner -->
        <section class="section-spacing">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php
                            $img = "select * from hotel_images where hotel_id='$sql_room_arr[hotel_id]' and room_id='$id' and status=0";
                            $img_rs = mysqli_query($con, $img);

                        ?>
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                    $j=0;
                                    while($hotel_img_arr = mysqli_fetch_array($img_rs))
                                    {
                                        $j++;
                                        ?>
                                        
                                            <div class="carousel-item <?php if($j==1) { echo "active"; } ?>">
                                                <img src="../admin-panel/<?php if($hotel_img_arr['image_path']) { echo $hotel_img_arr['image_path'].''.$hotel_img_arr['image_name']; } else { echo "dist/images/image_not_found.png"; } ?>" alt="<?php echo $sql_hotel_arr['hotel_name']; ?>" class=" d-block w-100">
                                            </div>
                                        <?php
                                    }
                                    if($j == 0)
                                    {
                                        ?>
                                        <div class="carousel-item active">
                                            <img src="../admin-panel/dist/images/image_not_found.png" alt="Image Not Available" class=" d-block w-100">
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="news-details"> 
                            <div class="timeline-content">
                                <ul class="timeline">
                                    <?php
                                       
                                        $room_details = "select * from room_master where status = 0 and id = '$id'";
                                        $room_details_rs = mysqli_query($con, $room_details);
                                        while($room_details_arr = mysqli_fetch_array($room_details_rs))
                                        {
                                            ?>
                                                <div class="desc">
                                                <?php
                                                    $currancy = "select * from currancy where id = '$room_details_arr[currency_type]'";
                                                    $currancy_rs = mysqli_query($con, $currancy);
                                                    $currancy_arr = mysqli_fetch_array($currancy_rs);
                                                    if($room_details_arr['room_price'])
                                                    {
                                                        ?>
                                                        <h3>Room Price : <?php echo $currancy_arr['symbol']; ?> <?php echo $room_details_arr['room_price']; ?>/ Per Night</h3>
                                                        <?php
                                                    }
                                                ?> 
                                                    <strong>About  <?php echo ucwords($room_details_arr['room_heading']); ?></strong>
                                                    <p class="margin0"><?php echo ucfirst(strtolower(trim($room_details_arr['room_description']))); ?></p>
                                                </div>                                 
                                            <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                            <?php
                                $room_amen = "select * from room_amenities  where status = 0 and room_id = '$id'";
                                $room_amen_rs = mysqli_query($con, $room_amen); 
                                
                                    ?>
                                        <div class="content-block">
                                            <blockquote>
                                                <strong>Amenities: </strong>
                                                <?php
                                                    while($room_amen_arr=mysqli_fetch_array($room_amen_rs))
                                                    {
                                                        $amen = "select * from amenities where id = '$room_amen_arr[amenities_id]'";
                                                        $amen_rs = mysqli_query($con, $amen);
                                                        $amen_arr = mysqli_fetch_array($amen_rs)
                                                        ?>
                                                            <p class="margin0"><i class="fa fa-star-half-o" aria-hidden="true"></i> <?php echo $amen_arr['amenities'] ; ?></p>
                                                        <?php
                                                    }
                                                ?>
                                            </blockquote>
                                        </div>
                                    <?php
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar"  id="sidebar">
                            <div class="sidebar-inner">
                                <div class="book-tour">
                                    <h3><span class="t1">Book This Room</span></h3>
                                    <div class="sidebar-item sidebar-widget">
                                        <form action="hotel-request.php" method="post">
                                            <div class="form-group">
                                                <label> Name </label>
                                                <input type="text" class="form-control" name="name" required data-error="Please enter your name" placeholder="Name">
                                                <input type="hidden" name="url" value="<?php echo $url; ?>"> 
                                                <input type="hidden" name="stay_type" value="<?php echo $sql_room_arr['id'] ?>">
                                                <input type = "hidden" name = "hotel_id" value = "<?php echo $sql_hotel_arr['id']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label> Phone Number </label>
                                                <div class="row">
                                                    <div class="col-lg-6 col-xs-12 col-md-6 col-sm-12" style="padding-right: 0;">
                                                        <input list="text_editors" id="std_code" name="std_code" class="form-control" placeholder="Country Code">
                                                    </div>
                                                    <div class="col-lg-6 col-xs-12 col-md-6 col-sm-12">
                                                        <datalist id="text_editors">
                                                            <select multiple="" size="8" id="std_code" placeholder="Select Code" required data-error="Please enter your contact number">
                                                                <?php
                                                                    $sql="select name, phonecode from std_code";
                                                                    $rs=mysqli_query($con,$sql);
                                                                    while($arr=mysqli_fetch_array($rs))
                                                                    {
                                                                        ?>
                                                                        <option value="<?php echo "+".$arr['phonecode'].' ( '.$arr['name'].' )'; ?>"><?php echo "+".$arr['phonecode'].' ( '.$arr['name'].' )'; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>	
                                                            </select>
                                                        </datalist>
                                                        <input type="tel" class="form-control" name="phone" id="mobile" placeholder="Contact No.*" required data-error="Please enter your contact number" value="" tabindex="5" minlength="10" maxlength="10" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Email </label>
                                                <input type="email" class="form-control" name="email" placeholder="Email Address"> 
                                            </div>
                                            <div class="form-group">
                                                <label>No of Persons </label>
                                                <input name="persons" min="0" type="number"  class="form-control" placeholder="Enter No. of Persons">
                                            </div>
                                            <div class="form-group">
                                                <label>No of Rooms </label>
                                                <input name="rooms" min="0" type="number"  class="form-control" placeholder="Enter No. of Rooms">
                                            </div>
                                            <div class="form-group">
                                                <label> Check-In-Date </label>
                                                <input type="date"  id="Check-In-Date" name="check_in" class="form-control"> 
                                            </div>
                                            <div class="form-group">
                                                <label> Check-Out-Date </label>
                                                <input type="date" id="Check-Out-Date" name="check_out" class="form-control"> 
                                            </div>
                                            <div class="form-group">
                                                <label>Additional Comment</label>
                                                <textarea name="message"class="form-control" cols="15" rows="5"></textarea>
                                            </div>
                                            <input type="submit" value="Book Now" name="submit" class="btn btn-primary">

                                            <div class="form-group1">
                                            <a href="" class="btn btn-primary1"></a>
                                                        </div>

                                                        <div class="form-group">
                                            <a href="https://rzp.io/rzp/waH4kgws" class="btn btn-primary">Pay now</a>
                                                        </div>
                                            

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end blog-->
        <?php include ("../includes/footer/index.php"); ?>
    <?php
	}
	else
	{
	    ?>
        <script>
            window.location.href="index.php";
        </script>
        <?php
	}
?>