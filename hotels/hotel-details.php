<?php 
	include ("../includes/header/index.php");
	include ("../includes/contact-us/config.php");
	   date_default_timezone_set("Asia/Calcutta");
	   $id = $_REQUEST['id'];
	   $today = date('d-m-Y');
	   $sql_hotel = "select * from hotel_master where status = 0 and id = '$id'";
	   $sql_hotel_rs = mysqli_query($con, $sql_hotel);
	   if($sql_hotel_arr = mysqli_fetch_array($sql_hotel_rs))
	   {
	       $url = "http://localhost/xtreamholiday/tour-offers/offer.php?id=$id";
	?>
        <title><?php echo $sql_hotel_arr['hotel_name'] ?></title>
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
                            <h1><?php echo ucwords(strtolower($sql_hotel_arr['hotel_name'])); ?></h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://localhost/xtreamholiday">Home</a></li>
                                <li class="breadcrumb-item active"><a href="http://localhost/xtreamholiday/hotels/">Hotels</a></li>
                                <li class="breadcrumb-item active"><?php echo ucwords(strtolower($sql_hotel_arr['hotel_name'])); ?></li>
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
                        <div class="news-details">
                            <div class="post-thumb">
                                <?php
                                    $img = "select * from hotel_images where status= 0 and hotel_id = '$sql_hotel_arr[id]' limit 1";
                                    $img_rs = mysqli_query($con, $img);
                                    $img_arr = mysqli_fetch_array($img_rs);
                                ?>
                                <img src="../admin-panel/dist/images/hotel-images/<?php echo $img_arr['image_name']; ?>" alt="" class = "img-responsive">

                                
                            </div> 
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                        $i=1;
                                        $hotel_desc = "select * from hotel_master where id = '$id' and status = 0";
                                        $hotel_desc_rs = mysqli_query($con, $hotel_desc);
                                        while($hotel_desc_arr = mysqli_fetch_array($hotel_desc_rs))
                                        {
                                            ?>
                                            <div class="content-block">
                                                    <strong>About  <?php echo ucwords($hotel_desc_arr['hotel_name']); ?></strong>
                                                    <p class="margin0"><?php echo $hotel_desc_arr['hotel_description']; ?></p>
                                                
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        <div class="card-deck row">
                            <?php
                                $room = "select * from room_master where status = 0 and hotel_id = '$sql_hotel_arr[id]' ORDER BY room_price";
                                $room_rs = mysqli_query($con, $room);
                                while($room_arr = mysqli_fetch_array($room_rs))
                                {
                                    $img = "select * from hotel_images where status= 0 and hotel_id = '$sql_hotel_arr[id]' and room_id='$room_arr[id]' limit 1";
                                    $img_rs = mysqli_query($con, $img);
                                    $img_arr = mysqli_fetch_array($img_rs);
                                    ?>
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                        <!-- Card -->
                                        <div class="card">
                                            <!--Card image-->
                                            <div class="view overlay">
                                                <img class="card-img-top" src="../admin-panel/dist/images/hotel-images/<?php echo $img_arr['image_name']; ?>" alt="<?php echo $room_arr['room_heading']; ?>">
                                            </div>
                                            <!--Card content-->
                                            <div class="card-body">
                                                <!--Title-->
                                                <h4 class="card-title"><strong><?php echo $room_arr['room_heading']; ?></strong></h4>
                                                <h4 class="card-title"><?php echo $room_arr['room_tagline']; ?></h4>
                                                <!--Text-->
                                                <?php
                                                    $currancy = "select * from currancy where id = '$room_arr[currency_type]'";
                                                    $currancy_rs = mysqli_query($con, $currancy);
                                                    $currancy_arr = mysqli_fetch_array($currancy_rs);
                                                    if($room_arr['room_price'])
                                                    {
                                                        ?>
                                                        <h3><?php echo $currancy_arr['symbol']; ?> <?php echo $room_arr['room_price']; ?>/-</h3>
                                                        <?php
                                                    }
                                                ?>
                                                <a href = "room-details.php?id=<?php echo $room_arr['id']; ?>" class="btn btn-primary btn2">Read more</a>
                                            </div>
                                        </div>
                                        <!-- Card -->
                                    </div>
                                <?php
                                }
                            ?>
                        </div>
                        <!-- Card deck -->
                                        
                        <section class="section-spacing">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                            $i=1;
                                            $hotel_details = "select * from hotel_details where hotel_id = '$id' and status = 0 and type = 'Extra-Details'";
                                            $hotel_details_rs = mysqli_query($con, $hotel_details);
                                            while($hotel_details_arr = mysqli_fetch_array($hotel_details_rs))
                                            {
                                                ?>
                                                <div class="content-block">
                                                    <blockquote>
                                                        <strong><?php echo $hotel_details_arr['type']; ?></strong>
                                                        <p class="margin0"><?php echo $hotel_details_arr['details']; ?></p>
                                                    </blockquote>
                                                </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                            
                                </div>
                            </div>
                        </section>
                                           
                        <section class="section-spacing">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                            $i=1;
                                            $hotel_terms = "select * from hotel_details where hotel_id = '$id' and status = 0 and type = 'T&C'";
                                            $hotel_terms_rs = mysqli_query($con, $hotel_terms);
                                            while($hotel_terms_arr = mysqli_fetch_array($hotel_terms_rs))
                                            {
                                                ?>
                                                <div class="content-block">
                                                    <blockquote>
                                                        <strong><?php echo $hotel_terms_arr['type']; ?></strong>
                                                        <p class="margin0"><?php echo $hotel_terms_arr['details']; ?></p>
                                                    </blockquote>
                                                </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                            
                                </div>
                            </div>
                        </section>
                        <section class="section-spacing">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                            $i=1;
                                            $hotel_rules = "select * from hotel_details where hotel_id = '$id' and status = 0 and type = 'Rules'";
                                            $hotel_rules_rs = mysqli_query($con, $hotel_rules);
                                            while($hotel_rules_arr = mysqli_fetch_array($hotel_rules_rs))
                                            {
                                                ?>
                                                <div class="content-block">
                                                    <blockquote>
                                                        <strong><?php echo $hotel_rules_arr['type']; ?></strong>
                                                        <p class="margin0"><?php echo $hotel_rules_arr['details']; ?></p>
                                                    </blockquote>
                                                </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                            
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar"  id="sidebar">
                            <div class="sidebar-inner">
                                <div class="book-tour">
                                    <h3><span class="t1">Book This Hotel</span></h3>
                                    <div class="sidebar-item sidebar-widget">
                                        <form action="hotel-request.php" method="post">
                                            <div class="form-group">
                                                <label> Name </label>
                                                <input type="text" class="form-control" name="name" required data-error="Please enter your name" placeholder="Name">
                                                <input type="hidden" name="url" value="<?php echo $url; ?>"> 
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
                                            <label >Room Type</label>
                                            <div class="form-control">
                                                <select name="stay_type">
                                                    <option value="">Select Room Type</option>
                                                    <?php
                                                            $room_type = "select * from room_master where status = 0 and  hotel_id = '$sql_hotel_arr[id]'";
                                                            $room_type_rs = mysqli_query($con, $room_type);
                                                            while($room_type_arr = mysqli_fetch_array($room_type_rs))
                                                            {
                                                                
                                                                ?>
                                                                    <option value="<?php echo $room_type_arr['id']; ?>"><?php echo $room_type_arr['room_heading']; ?></option>
                                                                <?php
                                                            }
                                                    ?>
                                                </select>
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
<script>
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    
    $('#Check-In-Date').attr('min', maxDate);
    $('#Check-Out-Date').attr('min', maxDate);
});
</script>