<?php 
	include ("../../includes/header/index.php");
	include ("../../includes/contact-us/config.php");

	$url="http://localhost/xtreamholiday/india-tour-packages/ladakh-tour-packages/"
	?>
<title>Ladakh Tour</title>
<meta charset="UTF-8">
<meta name="description" content="It has many tourist attractions to visit, Pangong Lake, Khardungla Pass, Nubra Valley, etc. You will have a wonderful time on your Glimpse of Ladakh Tour.">
<meta name="keywords" content="Best tour and travel agency in India, tour and travel agency, tour and travels near me, Best tour and travels, best travels agency, customized tour packages, best, places to visit on holiday, Best holiday packages, Best places to visit in summer, Best places to visit in winter best places to visit in a rainy season, Holiday packages, Two days holiday packages, Best holiday packages, India tour Packages, best international tour packages, about xtream holiday travel agency, best India tour packages, best north India tour packages, best south India tour packages, best east India tour packages, best west India tour packages, best Bhutan tour packages, Karnataka tour packages, best school tour packages, best honeymoon packages, best family tour packages, couple tour packages, solo trip packages, best tour and travel services.">
<meta name="author" content="Scopycode">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="canonical" href="<?php echo $url; ?>" />
<?php include ("../../includes/header/index1.php"); ?>
<section class="inner-page-banner" style="background-image:url(http://localhost/xtreamholiday/includes/img/india-tour-packages/ladakh/ladakh1-banner.png)">
	<div class="page-banner-caption">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Ladakh Tour</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="http://localhost/xtreamholiday">Home</a></li>
						<li class="breadcrumb-item active"><a href="http://localhost/xtreamholiday/india-tour-packages/">Domestic Tours</a></li>
						<li class="breadcrumb-item active">Ladakh Tour</li>
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
						<img src="http://localhost/xtreamholiday/includes/img/india-tour-packages/ladakh/ladakh11.png" alt="">
					</div>
					<h3>Ladakh</h3>
					<div class="content-block">
						<blockquote><strong>Ladakh :</strong>The landscape of Ladakh, a high-altitude desert, is defined by craggy, barren cliffs & plateaus. Ladakh is a favorite among adventure sports enthusiasts, offering unique adventures in trekking, mountaineering & white water rafting options available on both Indus & Zanskar rivers, the Zanskar course is more difficult & exciting. The trekking options range from short, Day- long walks to visit monuments or monastic settlements to long, trans-mountain treks involving weeks of walking & camping in the wilderness.</blockquote>
					</div>
					<div class="detail-title">
						<h3>Tour Timeline - <span class="comment-date">Ladakh</span></h3>
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
										<p class="text-justify"> Arrival at Leh. Acclimatize for 24hrs minimum is compulsory.Evening at the Cultural Programmes.</p>
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
										<p class="text-justify">Afternoon sightseeing Shanti Stupa, Leh Palace & Shankar Gompa.</p>
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
										<p class="text-justify">Excursion to Pangong Lake en route visiting Hemis Gompa.</p>
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
										<p class="text-justify">Excursion to Thikshey Monastery, Shey & Stok Palace.</p>
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
										<p class="text-justify">  Fly out.</p>
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