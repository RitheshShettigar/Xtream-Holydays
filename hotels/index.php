<?php include ("../includes/header/index.php");
	include("../includes/contact-us/config.php");
	date_default_timezone_set("Asia/Calcutta");
	$date = date('d-m-Y');

	

	 $sql = "select * from hotel_master where status = 0";
	 $sql_rs = mysqli_query($con, $sql);
	 
 ?>
<title>Best Hotel Offers</title>
<meta charset="UTF-8">
<meta name="description" content="Looking for India tour packages? Choose your India holidays by interests like wildlife, adventure, beach & more. Avail of great discounts at Xtream Holiday!">
<meta name="keywords" content="Best tour and travel agency in India, tour and travel agency, tour and travels near me, Best tour and travels, best travels agency, customized tour packages, best, places to visit on holiday, Best holiday packages, Best places to visit in summer, Best places to visit in winter
Best places to visit in a rainy season, Holiday packages, Two days holiday packages, Best holiday packages, India tour Packages, best international tour packages, about xtream holiday travel agency, best India tour packages, best north India tour packages, best south India tour packages, best east India tour packages, best west India tour packages, best Bhutan tour packages, Karnataka tour packages, best school tour packages, best honeymoon packages, best family tour packages, couple tour packages, solo trip packages, best tour and travel services.">
<meta name="author" content="Scopycode">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="canonical" href=“http://localhost/xtreamholiday/tour-offers/” />
<?php include ("../includes/header/index1.php"); ?>
<section class="inner-page-banner" style="background-image:url(http://localhost/xtreamholiday/includes/img/india-tour-packages/india-tour-packages.png)">
	<div class="page-banner-caption">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Hotels</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="http://localhost/xtreamholiday">Home</a></li>
						<li class="breadcrumb-item active">Hotels</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end banner -->
<section class="section-spacing inverse-bg">
	<div class="container">
		<div class="row tours">
			<?php
				$i=0;
				while($arr = mysqli_fetch_array($sql_rs))
				{
					$hotel_img = "select * from hotel_images where status = 0 and hotel_id = '$arr[id]' and room_id=0";
					$hotel_img_rs = mysqli_query($con, $hotel_img);
					
					$i++;
					?>
						<div class="col-md-12 col-lg-12 col-xl-6">
							<div class="tour-item wow fadeIn">
								<div class="media offers">
									<div class="thumb">
										<a href="hotel-details.php?id=<?php echo $arr['id']; ?>">
										
											<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner">
													<?php
														$j=0;
														while($hotel_img_arr = mysqli_fetch_array($hotel_img_rs))
														{
															$j++;
															?>
															
																<div class="carousel-item mh170 <?php if($j==1) { echo "active"; } ?>">
																	<img src="../admin-panel/<?php if($hotel_img_arr['image_path']) { echo $hotel_img_arr['image_path'].''.$hotel_img_arr['image_name']; } else { echo "dist/images/image_not_found.png"; } ?>" alt="<?php echo $arr['hotel_name']; ?>" class=" d-block w-100">
																</div>
															<?php
														}
														if($j == 0)
														{
															?>
															<div class="carousel-item mh170 active">
																<img src="../admin-panel/dist/images/image_not_found.png" alt="Image Not Available" class=" d-block w-100">
															</div>
															<?php
														}
													?>
												</div>
											</div>
										</a>
									</div>
									<div class="media-body offers">
										<div class="tour-info">
											<h3 class="margin0">
												<a href="hotel-details.php?id=<?php echo $arr['id']; ?>"><?php echo ucwords(strtolower($arr['hotel_name'])); ?></a>
												<sup>
													<?php
														if($arr['star'] == 1)
														{
															?>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<?php
														}
														else if($arr['star'] == 2)
														{
															?>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<?php
														}
														else if($arr['star'] == 3)
														{
															?>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<?php
														}
														else if($arr['star'] == 4)
														{
															?>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<?php
														}
														else if($arr['star'] == 5)
														{
															?>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<?php
														}
													?>
												</sup>
											</h3>
											<p class="lh15">
												<small>
													<a href="<?php echo $arr['map']; ?>" target="_blank"><?php echo ucwords(strtolower($arr['address'])); ?></a>
												</small>
											</p>
											<p>
												<?php
													$sql_room = "select * from room_master where status = 0 and hotel_id = '$arr[id]' order by room_price ASC limit 1";
													$sql_room_rs = mysqli_query($con, $sql_room);
													$sql_room_arr = mysqli_fetch_array($sql_room_rs);

													$currancy = "select * from currancy where id = '$sql_room_arr[currency_type]'";
													$currancy_rs = mysqli_query($con, $currancy);
													$currancy_arr = mysqli_fetch_array($currancy_rs);
													if($sql_room_arr['room_price'])
													{
														?>
														<h3><?php echo $currancy_arr['symbol']; ?> <?php echo $sql_room_arr['room_price']; ?>/-</h3>
														<?php
													}
												?>
											</p>									
										</div>
										<a href="hotel-details.php?id=<?php echo $arr['id']; ?>" class="readmore btn btn-primary">Read More</a>
									</div>
								</div>
							</div>
						</div>
					<?php
				}
				if($i == 0)
				{
					echo "<h2 class='text-center'>New Offers Coming Soon!";
				}
			?>
		</div>
		
		
	</div>
</section>

<!-- Testimonials -->
<?php include ("../includes/footer/index.php"); ?>
<!-- end footer -->