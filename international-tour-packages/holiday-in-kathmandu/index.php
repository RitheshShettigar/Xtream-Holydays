<?php 
	include ("../../includes/header/index.php");
	include ("../../includes/contact-us/config.php");

	$url="http://localhost/xtreamholiday/international-tour-packages/holiday-in-kathmandu/"
	?>
<title>Nepal Tour (Holiday in Kathmandu ) - Xtream Holiday</title>
<meta charset="UTF-8">
<meta name="description" content="Kathmandu tour is delightful of surprises & exploration of the vast expanses of the Himalayan Mountains and green valleys. It gives you a chance to experience the holistic & divinity of the nation which is full of serenity and peace.">
<meta name="author" content="Scopycode">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="canonical" href="<?php echo $url; ?>" />
<?php include ("../../includes/header/index1.php"); ?>
<section class="inner-page-banner" style="background-image:url(http://localhost/xtreamholiday/includes/img/international-tour-packages/holidays-in-kathmandu/kathmandu-tour.png)">
	<div class="page-banner-caption">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Holiday in Kathmandu </h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="http://localhost/xtreamholiday">Home</a></li>
						<li class="breadcrumb-item active"><a href="http://localhost/xtreamholiday/international-tour-packages/">International Tour</a></li>
						<li class="breadcrumb-item active">Holiday in Kathmandu </li>
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
						<img src="http://localhost/xtreamholiday/includes/img/international-tour-packages/holidays-in-kathmandu/kathmandu.png" alt="">
					</div>
					<h3>Holiday in Kathmandu </h3>
					<div class="content-block">
						<blockquote><strong></strong>Surrounding the varied & attractive country of India, Nepal one of the popular mountain tourist destinations in the world, lovely Himalayan country where the snow-capped mountains go away right into the clouds like a set of steps to paradise on earth. Nepal is a major religious hub where you get followers of both Buddhism & Hinduism, apart from the mountains that comes under the limelight. Book the best Kathmandu & Pokhara tour packages at the budget price by Xtream Holiday Tours and Travel.
						</blockquote>
					</div>
					<div class="detail-title">
						<h3>Tour Timeline - <span class="comment-date">Kathmandu Tour (5 Nights & 6 Days)</span></h3>
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
										<p class="text-justify"> Kathmandu Arrival</p>
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
										<p class="text-justify"> Drive to Pokhara (205km / 6 to 7 hrs).</p>
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
										<p class="text-justify">Full day sightseeing of Pokhara(Sarangkot, Bindabasini, Davis fall, Gupteshwor cave, Fewalake, Seti gorge, etc)</p>
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
										<p class="text-justify">Drive back to Kathmandu (205km / 6 to 7 hrs.)</p>
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
										<p class="text-justify">Full day Kathmandu sightseeing & rest is free for individual activities like shopping.</p>
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
										<p class="text-justify">Departure</p>
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