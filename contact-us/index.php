<?php 
	include ("../includes/header/index.php"); 
	include ("../includes/contact-us/config.php")
?>
<title>Contact Us for Tour & Travel Packages</title>
<meta charset="UTF-8">
<meta name="description" content="Xtream Holiday Tour and Travel partner are here to answer your all question. Contact us for more information about tour packages or send a mail.">
<meta name="keywords" content="Best tour and travel agency in India, tour and travel agency, tour and travels near me, Best tour and travels, best travels agency, customized tour packages, best, places to visit on holiday, Best holiday packages, Best places to visit in summer, Best places to visit in winter best places to visit in a rainy season, Holiday packages, Two days holiday packages, Best holiday packages, India tour Packages, best international tour packages, about xtream holiday travel agency, best India tour packages, best north India tour packages, best south India tour packages, best east India tour packages, best west India tour packages, best Bhutan tour packages, Karnataka tour packages, best school tour packages, best honeymoon packages, best family tour packages, couple tour packages, solo trip packages, best tour and travel services.">
<meta name="author" content="Scopycode">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel=“canonical” href=“http://localhost/xtreamholiday/contact-us/” />
<?php include ("../includes/header/index1.php"); ?>
<section class="inner-page-banner" style="background-image:url(http://localhost/xtreamholiday/includes/img/banner/contact-us.png)">
	<div class="page-banner-caption">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Contact Us</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="http://localhost/xtreamholiday">Home</a></li>
						<li class="breadcrumb-item active">Contact Us</li>
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
			<div class="col-md-4">
				<div class="contact-info text-center wow fadeIn">
					<i class="fa fa-phone-square"></i>
					<h3>Make a Call</h3>
					<p><a href="tel:+919945285922">+91 9945285922</a></p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="contact-info text-center wow fadeIn">
					<i class="fa fa-envelope-open-o"></i>
					<h3>Send a Mail</h3>
					<p><a href="mailto:askme@xtreamholiday.com">askme@xtreamholiday.com</a></p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="contact-info text-center wow fadeIn">
					<i class="fa fa-map-marker"></i>
					<h3>Find Us</h3>
					<p>#55, BM Arcade, 3rd Floor Geddalahalli,Sanjay Nagar Main Rd, opp. Geddalahalli Bus Stop,Near Anjaneya Temple, R.M.V. 2nd Stage,Bengaluru, Karnataka 560094</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-ms-6 col-sm-12 col-xs-12">
				<div class="col-md-12">
					<div class="section-title section-title-contact text-center">
						<h2><span>Have Any Question?</span></h2>
					</div>
				</div>
				<form id="" class="contact-form wow fadeIn" action="http://localhost/xtreamholiday/includes/contact-us/contact-request.php" method="post">
					<div class="form-group">
						<lable> Name :</lable>
						<input placeholder="Name" id="name" class="form-control" name="name" type="text" required data-error="Please enter your name">
						<div class="help-block with-errors"></div>
						<input type="hidden" name="url" value="http://localhost/xtreamholiday/contact-us/">
					</div>
					<div class="form-group">
					<lable> Email :</lable>
						<input placeholder="Email Address" id="email" class="form-control" name="email" type="email" required data-error="Please enter your valid email address"> 
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
					    <lable> Contact :</lable>
						<div class="row">
							<div class="col-lg-4 col-xs-12 col-md-4 col-sm-12" style="padding-right: 0;">
                                <select id="currency" class="form-control">
                                    <option value="">Select Country Code (+91)</option>
                                    <?php
                                        $sql = "select name, phonecode from std_code";
                                        $rs = mysqli_query($con, $sql);
                                        while ($arr = mysqli_fetch_array($rs)) {
                                            ?>
                                            <option value="<?php echo $arr['phonecode']; ?>"><?php echo $arr['name'] . ' ( ' . $arr['phonecode'] . ' )'; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-8 col-xs-12 col-md-8 col-sm-12">
                                <input type="tel" class="form-control" name="contact" id="contact" placeholder="Your Contact Number*" value="" tabindex="5">
                            </div>
						</div>						
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<lable> Date :</lable>
						<input type="date" value="enter date" name="date" id="date"  class="form-control" data-select="datepicker" required data-error="Please enter date">
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<lable> Message :</lable>
						<textarea placeholder="Your Query" id="message" rows="4"  name="message" class="form-control" required data-error="Please enter your comments"></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="text-center">
						<input value="Send Message" name="submit" class="btn btn-primary"  id="submit" type="submit">
						<div id="msgSubmit" class="hidden"></div>
					</div>
				</form>
			</div>
			<div class="col-lg-6 col-ms-6 col-sm-12 col-xs-3">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15548.316501130785!2d77.5773975!3d13.0306331!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc576f83ee57f65e9!2sXtream%20Holiday!5e0!3m2!1sen!2sin!4v1659422353222!5m2!1sen!2sin" class="iframemap" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</div>
</section>
<?php include ("../includes/footer/index.php"); ?>
<!-- end footer -->

<script language="javascript">
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0');
	var yyyy = today.getFullYear();
	
	today = yyyy + '-' + mm + '-' + dd;
	$('#date').attr('min',today);
</script>