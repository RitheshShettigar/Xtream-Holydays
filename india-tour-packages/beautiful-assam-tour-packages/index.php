<?php 
	include ("../../includes/header/index.php");
	include ("../../includes/contact-us/config.php");
	
	$url = "http://localhost/xtreamholiday/india-tour-packages/beautiful-assam-tour-packages/";
	?>
<title>The Natural Beauty of Assam</title>
<meta charset="UTF-8">
<meta name="description" content="Assam is famous for tea and Assam silk. Kaziranga national park is home to tigers, elements & the world’s largest population of Indian one-horned rhinoceroses.">
<meta name="keywords" content="Best tour and travel agency in India, tour and travel agency, tour and travels near me, Best tour and travels, best travels agency, customized tour packages, best, places to visit on holiday, Best holiday packages, Best places to visit in summer, Best places to visit in winter best places to visit in a rainy season, Holiday packages, Two days holiday packages, Best holiday packages, India tour Packages, best international tour packages, about xtream holiday travel agency, best India tour packages, best north India tour packages, best south India tour packages, best east India tour packages, best west India tour packages, best Bhutan tour packages, Karnataka tour packages, best school tour packages, best honeymoon packages, best family tour packages, couple tour packages, solo trip packages, best tour and travel services.">
<meta name="author" content="Scopycode">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="canonical" href="<?php echo $url; ?>" />
<?php include ("../../includes/header/index1.php"); ?>
<section class="inner-page-banner" style="background-image:url(http://localhost/xtreamholiday/includes/img/india-tour-packages/natural-beauty-of-asam/natural-beauty-of-asam-banner.png)">
	<div class="page-banner-caption">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Tour Details</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="http://localhost/xtreamholiday">Home</a></li>
						<li class="breadcrumb-item active"><a href="http://localhost/xtreamholiday/india-tour-packages/">Domestic Tours</a></li>
						<li class="breadcrumb-item active">Assam</li>
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
						<img src="http://localhost/xtreamholiday/includes/img/india-tour-packages/natural-beauty-of-asam/natural-beauty-of-asam1.png" alt="">
					</div>
					<h3>Gauhati -  Kaziranga</h3>
					<div class="content-block">
						<blockquote><strong>Guwahati :</strong>The capital city of Assam & home to the world-famous one-horned rhinoceros, Guwahati is one of the best places to visit in Northeast India. It lies along the Brahmaputra River & is picturesquely situated with an amphitheater of wooded hills to the south.</blockquote>
						<blockquote><strong>Kaziranga :</strong>Kaziranga national park is a secure place in the Northeast Indian State of Assam. Spread across the floodplains of the Brahmaputra River, its forests, wetlands & grasslands are home to tigers, elephants & the world’s largest population of Indian one-horned rhinoceroses.</blockquote>
					</div>
					<div class="detail-title">
						<h3>Tour Timeline - <span class="comment-date">Gauhati - Kaziranga</span></h3>
					</div>
					<div class="timeline-content">
						<ul class="timeline">
							<li>
								<div class="direction-r">
									<div class="day-wrapper">
										<span>1</span>
									</div>
									<div class="flag-wrapper">
										<span class="flag">Day 1 </span>
									</div>
									<div class="desc">
										<p class="text-justify"> Arrival at Gauhati. Transfer to hotel at Kaziranga. Overnight at the Forest Lodge.</p>
									</div>
								</div>
							</li>
							<li>
								<div class="direction-r">
									<div class="day-wrapper">
										<span>2</span>
									</div>
									<div class="flag-wrapper">
										<span class="flag">Day 2 </span>
									</div>
									<div class="desc">
										<p class="text-justify">Morning Elephant ride to spot the Rhinos. After breakfast Jeep ride in the Jungle. Afternoon Jeep ride inside the Jungle.</p>
									</div>
								</div>
							</li>
							<li>
								<div class="direction-r">
									<div class="day-wrapper">
										<span>3</span>
									</div>
									<div class="flag-wrapper">
										<span class="flag">Day 3 </span>
									</div>
									<div class="desc">
										<p class="text-justify">Drive to Gauhati. Boating at Brahmaputra. Overnight at Gauhati.</p>
									</div>
								</div>
							</li>
							<li>
								<div class="direction-r">
									<div class="day-wrapper">
										<span>4</span>
									</div>
									<div class="flag-wrapper">
										<span class="flag">Day 4 </span>
									</div>
									<div class="desc">
										<p class="text-justify">Excursion to Hajo, Sualkuchi & Kamakhya Temple.</p>
									</div>
								</div>
							</li>
							<li>
								<div class="direction-r">
									<div class="day-wrapper">
										<span>5</span>
									</div>
									<div class="flag-wrapper">
										<span class="flag">Day 5  </span>
									</div>
									<div class="desc">
										<p class="text-justify">Board the flight/Train for onward connection.</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<?php include ("../../includes/request-form/sidebar_form.php"); ?>
			</div>
		</div>
	</div>
</section>
<!-- end blog-->
<?php include ("../../includes/footer/index.php"); ?>
<!-- end footer -->
<script language="javascript">
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0');
	var yyyy = today.getFullYear();
	
	today = yyyy + '-' + mm + '-' + dd;
	$('#Check-In-Date').attr('min',today);
	$('#Check-Out-Date').attr('min',today);
</script>