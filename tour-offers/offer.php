<?php 
	include ("../includes/header/index.php");
	include ("../includes/contact-us/config.php");
    date_default_timezone_set("Asia/Calcutta");
    $id = $_REQUEST['id'];
    $today = date('d-m-Y');
    $sql_offer = "select * from package_master where status = 0 and id = '$id' and tdate>=DATE(NOW())";
    $sql_offer_rs = mysqli_query($con, $sql_offer);
    if($sql_offer_arr = mysqli_fetch_array($sql_offer_rs))
    {
        $url = "http://localhost/xtreamholiday/tour-offers/offer.php?id=$id";
	    ?>
        <title><?php echo $sql_offer_arr['heading'] ?></title>
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
                            <h1><?php echo ucwords(strtolower($sql_offer_arr['heading'])); ?></h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://localhost/xtreamholiday">Home</a></li>
                                <li class="breadcrumb-item active"><a href="http://localhost/xtreamholiday/india-tour-packages/"> Tour Package</a></li>
                                <li class="breadcrumb-item active"><?php echo ucwords(strtolower($sql_offer_arr['heading'])); ?></li>
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
                                <img src="../admin-panel/dist/images/packages/<?php echo $sql_offer_arr['inside_image']; ?>" alt="" class = "img-responsive">
                            </div>
                            <?php
                                $sql_currency = "select * from currancy where id = '$sql_offer_arr[currency_type]'";
                                $sql_currency_rs = mysqli_query($con, $sql_currency);
                                $sql_currency_arr = mysqli_fetch_array($sql_currency_rs);
                                
                                $cost = "select * from type_of_cost where id = '$sql_offer_arr[cost_for]'";
                                $cost_rs = mysqli_query($con, $cost);
                                $cost_arr = mysqli_fetch_array($cost_rs);
                                
                                ?>
                            <h3>
                                <?php if($sql_offer_arr['days']) { echo $sql_offer_arr['days'].' Days'; } ?><?php if($sql_offer_arr['nights']) { if($sql_offer_arr['days']) { echo " / "; } echo $sql_offer_arr['nights'].' Nights'; } ?>
                            </h3>
                            <h2> <?php echo $sql_currency_arr['code'].' '.$sql_offer_arr['cost'].' '. $cost_arr['type']; ?> </h2>
                            <h3>Hurry Up! this offer is valid till 
                                <?php
                                    if($today == $sql_offer_arr['tdate'])
                                    {
                                        echo "today night";
                                    }
                                    else
                                    {
                                        echo date('d-M-Y', strtotime($sql_offer_arr['tdate'])); 
                                        
                                    }
                                    ?>
                            </h3>
                            <?php
                                if($sql_offer_arr['description'])
                                {
                                    ?>
                                    <div class="content-block">
                                        <blockquote><strong>Description: </strong><?php echo ucwords(strtolower(trim($sql_offer_arr['description']))); ?></blockquote>
                                    </div>
                                    <?php
                                }
                                
                                $sql_iternity1 = "select * from iternity where package_id = '$id' and status = 0 and type = 'Iternity'";
                                $sql_iternity_rs1 = mysqli_query($con, $sql_iternity1);
                                if(mysqli_fetch_array($sql_iternity_rs1))
                                {
                                    ?>
                                        <div class="detail-title">
                                            <h3>Tour Timeline - <span class="comment-date"><?php echo ucwords(strtolower($sql_offer_arr['destination'])); ?></span></h3>
                                        </div>
                                    <?php
                                }
                            ?>
                            
                            <?php
                                $sql_iternity = "select * from iternity where status = 0 and package_id = '$id' and type = 'Iternity'";
                                $sql_iternity_rs = mysqli_query($con, $sql_iternity);
                                
                                $sql_count_iternity = mysqli_num_rows($sql_iternity_rs);
                                if($sql_count_iternity > 0)
                                {
                                    ?>
                                    <div class="content-block">
                                        <blockquote>
                                            <strong>Iternity: </strong>
                                            <?php
                                                $j=1;
                                                while($sql_iternity_arr = mysqli_fetch_array($sql_iternity_rs))
                                                {
                                                    ?>
                                                    <p class="margin0"><?php echo $j++.': '.ucfirst(strtolower(trim($sql_iternity_arr['description']))); ?></p>
                                                    <?php
                                                }
                                            ?>
                                        </blockquote>
                                    </div>
                                    <?php
                                }
                                $sql_inclusion = "select * from iternity where status = 0 and package_id = '$id' and type = 'Inclusion'";
                                $sql_inclusion_rs = mysqli_query($con, $sql_inclusion);
                                
                                $sql_count = mysqli_num_rows($sql_inclusion_rs);
                                if($sql_count > 0)
                                {
                                    ?>
                                    <div class="content-block">
                                        <blockquote>
                                            <strong>Inclusions: </strong>
                                            <?php
                                                $j=1;
                                                while($sql_inclusion_arr = mysqli_fetch_array($sql_inclusion_rs))
                                                {
                                                    ?>
                                                    <p class="margin0"><?php echo $j++.': '.ucfirst(strtolower(trim($sql_inclusion_arr['description']))); ?></p>
                                                    <?php
                                                }
                                            ?>
                                        </blockquote>
                                    </div>
                                    <?php
                                }
                                $sql_exclusion = "select * from iternity  where status = 0 and package_id = '$id' and type = 'Exclusion'";
                                $sql_exclusion_rs = mysqli_query($con, $sql_exclusion); 
                                $sql_exclusion_count = mysqli_num_rows($sql_exclusion_rs);
                                if($sql_exclusion_count>0)
                                {
                                    ?>
                                        <div class="content-block">
                                            <blockquote>
                                                <strong>Exclusions: </strong>
                                                <?php
                                                    $k = 1;
                                                    while($sql_exclusion_arr=mysqli_fetch_array($sql_exclusion_rs))
                                                    {
                                                        ?>
                                                        <p class="margin0"><?php echo $k++.'. '.ucfirst(strtolower(trim($sql_exclusion_arr['description']))); ?></p>
                                                        <?php
                                                    }
                                                    ?>
                                            </blockquote>
                                        </div>
                                    <?php
                                }
                                $flight_details = "select * from package_details where package_id ='$id' and type= 'Flight'";
                                $flight_details_rs = mysqli_query($con, $flight_details);
                                $flight_details_count = mysqli_num_rows($flight_details_rs);
                                if($flight_details_count>0)
                                {
                                    ?>
                                        <div class="content-block">
                                            <blockquote>
                                                <strong>Flight Details: </strong>
                                                <?php
                                                    while($flight_details_arr=mysqli_fetch_array($flight_details_rs))
                                                    {
                                                        ?>
                                                        <p class="margin0"><?php echo ucfirst(strtolower(trim($flight_details_arr['details']))); ?></p>
                                                        <?php
                                                    }
                                                ?>
                                            </blockquote>
                                        </div>
                                    <?php
                                }
                                $extra_details = "select * from package_details where package_id ='$id' and type= 'Extra-Details'";
                                $extra_details_rs = mysqli_query($con, $extra_details);
                                $extra_details_count = mysqli_num_rows($extra_details_rs);
                                if($extra_details_count>0)
                                {
                                    ?>
                                        <div class="content-block">
                                            <blockquote>
                                                <strong>Extra Details: </strong>
                                                <?php
                                                    while($extra_details_arr=mysqli_fetch_array($extra_details_rs))
                                                    {
                                                        ?>
                                                        <p class="margin0"><?php echo ucfirst(strtolower(trim($extra_details_arr['details']))); ?></p>
                                                        <?php
                                                    }
                                                ?>
                                            </blockquote>
                                        </div>
                                    <?php
                                }
                                $terms_details = "select * from package_details where package_id ='$id' and type= 'T&C'";
                                $terms_details_rs = mysqli_query($con, $terms_details);
                                $terms_details_count = mysqli_num_rows($terms_details_rs);
                                if($terms_details_count>0)
                                {
                                    ?>
                                        <div class="content-block">
                                            <blockquote>
                                                <strong>Terms And Conditions Details: </strong>
                                                <?php
                                                    while($terms_details_arr=mysqli_fetch_array($terms_details_rs))
                                                    {
                                                        ?>
                                                        <p class="margin0"><?php echo ucfirst(strtolower(trim($terms_details_arr['details']))); ?></p>
                                                        <?php
                                                    }
                                                ?>
                                            </blockquote>
                                        </div>
                                    <?php
                                }

                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar"  id="sidebar">
                            <div class="sidebar-inner">
                                <div class="book-tour">
                                    <h3><span class="t1">Book This Package</span></h3>
                                    <div class="sidebar-item sidebar-widget">
                                        <form action="tour-offer-request.php" method="post">
                                            <div class="form-group">
                                                <label> Name </label>
                                                <input type="text" class="form-control" name="name" required data-error="Please enter your name" placeholder="Name">
                                                <input type="hidden" name="url" value="<?php echo $url; ?>"> 
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
                                                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Contact No.*" required data-error="Please enter your contact number" value="" tabindex="5" minlength="10" maxlength="10" >
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