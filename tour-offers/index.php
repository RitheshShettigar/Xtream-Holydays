<?php 
	include ("../includes/header/index.php");
	include("../includes/contact-us/config.php");
	date_default_timezone_set("Asia/Calcutta");
	$date = date('d-m-Y');
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 6;
    $offset = ($page - 1) * $limit;
    $sql = "select * from package_master where status = 0 and DATE(NOW()) between fdate and tdate  LIMIT $limit OFFSET $offset";
	$sql_rs = mysqli_query($con, $sql);
	 
 ?>
<title>Offer Tour Packages</title>
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
					<h1>Offer Tour Packages</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="http://localhost/xtreamholiday">Home</a></li>
						<li class="breadcrumb-item active">Ongoing Offers</li>
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
				$j=0;
				while($arr = mysqli_fetch_array($sql_rs))
				{
					$j++;
					?>
						<div class="col-md-12 col-lg-12 col-xl-6">
							<div class="tour-item wow fadeIn">
								<div class="media offers">
									<div class="thumb">
										<a href="offer.php?id=<?php echo $arr['id']; ?>">
											<img src="../admin-panel/dist/images/packages/<?php if($arr['banner_image']) { echo $arr['banner_image']; } else { echo "image_not_found.png"; } ?>" alt="<?php echo $arr['heading']; ?>" class="offer-image">
										</a>
									</div>
									<div class="media-body offers">
										<div class="tour-info">
											<h3><a href="offer.php?id=<?php echo $arr['id']; ?>"><?php echo ucwords(strtolower($arr['heading'])); ?></a></h3>
											<p><?php echo substr($arr['description'],0, 150); echo "...."; ?></p>
										</div>
										<a href="offer.php?id=<?php echo $arr['id']; ?>" class="readmore btn btn-primary">Read More</a>
									</div>
								</div>
							</div>
						</div>
					<?php
				}
				// Pagination links
                $totalResults = mysqli_num_rows(mysqli_query($con, "select * from package_master where status = 0 and DATE(NOW()) between fdate and tdate order by id desc"));
                $totalPages = ceil($totalResults / $limit);
                
                // Display pagination links
                ?>
				<div class="col-md-12 col-lg-12 col-xl-12">
                    <ul class="pagination pagination-centered">
                        <?php
                            
                            for ($i = 1; $i <= $totalPages; $i++) 
                            {
                                ?>
                                    <li class='page-item' ><a class='page-link <?php if($_REQUEST['page'] == $i) { echo 'page-link-selected'; } if($i == 1 && !$_REQUEST['page']) { echo 'page-link-selected'; }  ?> ' href='index.php?page=<?php echo $i; ?>'><?php echo $i; ?></li></a>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
                <?php
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