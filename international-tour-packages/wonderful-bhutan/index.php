<?php 
	include ("../../includes/header/index.php");
	include ("../../includes/contact-us/config.php");

	$url="http://localhost/xtreamholiday/international-tour-packages/wounderful-bhutan-tour-package/"
	?>
<title> Wonderful Bhutan - Xtream Holiday </title>
<meta charset="UTF-8">
<meta name="description" content=" Bhutan is the most wonderful place in the world. there are plenty of joyful things to do in Bhutan for everybody. like trekking, hiking, paragliding, and more. ">
<meta name="keywords" content="Best tour and travel agency in India, tour and travel agency, tour and travels near me, Best tour and travels, best travels agency, customized tour packages, best, places to visit on holiday, Best holiday packages, Best places to visit in summer, Best places to visit in winter best places to visit in a rainy season, Holiday packages, Two days holiday packages, Best holiday packages, India tour Packages, best international tour packages, about xtream holiday travel agency, best India tour packages, best north India tour packages, best south India tour packages, best east India tour packages, best west India tour packages, best Bhutan tour packages, Karnataka tour packages, best school tour packages, best honeymoon packages, best family tour packages, couple tour packages, solo trip packages, best tour and travel services.">
<meta name="author" content="Scopycode">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="canonical" href="<?php echo $url; ?>" />
<?php include ("../../includes/header/index1.php"); ?>
<section class="inner-page-banner" style="background-image:url(http://localhost/xtreamholiday/includes/img/international-tour-packages/wonderful-bhutan/wonderful-bhutan-banner.png)">
	<div class="page-banner-caption">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Wonderful Bhutan</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="http://localhost/xtreamholiday">Home</a></li>
						<li class="breadcrumb-item active"><a href="http://localhost/xtreamholiday/international-tour-packages/">International Tour</a></li>
						<li class="breadcrumb-item active">Wonderful Bhutan</li>
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
						<img src="http://localhost/xtreamholiday/includes/img/international-tour-packages/wonderful-bhutan/wonderful-bhutan11.png" alt="">
					</div>
					<h3>Wonderful Bhutan</h3>
					<div class="content-block">
						<blockquote><strong>Bhutan </strong>is one of the most wonderful places in the world. The breathtaking views & the majestic monasteries are very beautiful. It is difficult to describe the natural beauty of Bhutan but each word used for this gorgeous country stands true. Beauty Bhutan is known for its natural beauty, forest conservation, gross national happiness, great culture, & heritage.</blockquote>
					</div>
					<div class="detail-title">
						<h3>Tour Timeline - <span class="comment-date">Wonderful Bhutan (7 Days)</span></h3>
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
										<p class="text-justify"> Paro</p>
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
										<p class="text-justify">Paro – Thimphu</p>
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
										<p class="text-justify">Thimphu – Punakha / Wangdue Travel & Tour</p>
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
										<p class="text-justify">Wangdue – Thimphu</p>
									</div>
								</div>
							</li>
							<li>
								<div class="direction-r">
									<div class="day-wrapper">
										<span>5</span>
									</div>
									<div class="flag-wrapper">
										<span class="flag">Day 5 </span>
									</div>
									<div class="desc">
										<p class="text-justify">Thimphu – Haa – Paro</p>
									</div>
								</div>
							</li>
							<li>
								<div class="direction-r">
									<div class="day-wrapper">
										<span>6</span>
									</div>
									<div class="flag-wrapper">
										<span class="flag">Day 6 </span>
									</div>
									<div class="desc">
										<p class="text-justify">Paro Hike to Taksang (Tiger Nest Monastry)</p>
									</div>
								</div>
							</li>
							<li>
								<div class="direction-r">
									<div class="day-wrapper">
										<span>7</span>
									</div>
									<div class="flag-wrapper">
										<span class="flag">Day 7 </span>
									</div>
									<div class="desc">
										<p class="text-justify">Paro – Departure</p>
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