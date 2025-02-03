<?php 
	session_start();
	if($_SESSION['login'] == 'Success')
	{

	}
	else
	{
		?>
		<script>
			window.location.href = "login.php";
		</script>
		<?php
	}
?>

<link rel="shortcut icon" href="dist/images/favicon.ico" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- START: Template CSS-->
<link rel="stylesheet" href="dist/vendors/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.theme.min.css">
<link rel="stylesheet" href="dist/vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="dist/vendors/flags-icon/css/flag-icon.min.css">
<link rel="stylesheet" href="dist/vendors/flag-select/css/flags.css">
<!-- END Template CSS-->
<!-- START: Page CSS-->   
<link rel="stylesheet" href="dist/vendors/morris/morris.css">
<link rel="stylesheet" href="dist/vendors/weather-icons/css/pe-icon-set-weather.min.css">
<link rel="stylesheet" href="dist/vendors/chartjs/Chart.min.css">
<link rel="stylesheet" href="dist/vendors/starrr/starrr.css">
<link href="dist/vendors/bootstrap-tour/css/bootstrap-tour-standalone.min.css" rel="stylesheet">
<link rel="stylesheet" href="dist/vendors/fontawesome/css/all.min.css">
<link rel="stylesheet" href="dist/vendors/ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="dist/vendors/datatable/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css"/>
<!-- END: Page CSS-->
<!-- START: Custom CSS-->
<link rel="stylesheet" href="dist/css/main.css">
<link rel="stylesheet" href="dist/css/main.css">
<!-- END: Custom CSS-->
<!-- css page -->
<link rel="stylesheet" href="dist\vendors\summernote\summernote-bs4.css" />
<!-- css page -->

</head>
<!-- END Head-->
<!-- START: Body-->
<body id="main-container" class="default">
	<!-- START: Pre Loader-->
	<div class="se-pre-con">
		<img src="http://localhost/xtreamholiday/includes/img/logo.png" alt="logo" width="23" class="img-fluid"/>
	</div>
	<!-- END: Pre Loader-->
	<!-- START: Header-->
	<div id="header-fix" class="header fixed-top">
		<nav class="navbar navbar-expand-lg  p-0">
			<div class="navbar-header h4 mb-0 align-self-center d-flex">  
				<a href="index.php" class="horizontal-logo align-self-center d-flex d-lg-none">
				<img src="http://localhost/xtreamholiday/includes/img/logo.png" alt="logo" width="23" class="img-fluid"/> 
				</a>
				<a href="#" class="sidebarCollapse ml-2" id="collapse"><i class="icon-menu body-color"></i></a>
			</div>
			<div class="navbar-right ml-auto">
				<ul class="ml-auto p-0 m-0 list-unstyled d-flex">
					<li class="mr-1 d-inline-block my-auto d-block d-lg-none">
						<a href="#" class="nav-link px-2 mobilesearch" data-toggle="dropdown" aria-expanded="false"><i class="icon-magnifier h4"></i>                               
						</a>
					</li>
					
					
					<li class="dropdown user-profile d-inline-block py-1 mr-2">
						<a href="#" class="nav-link px-2 py-0" data-toggle="dropdown" aria-expanded="false">
							<div class="media">
								<div class="media-body align-self-center d-none d-sm-block mr-2">
									<p class="mb-0 text-uppercase line-height-1"><b><?php echo ucwords(strtolower($_SESSION['name'])); ?></b><br/><span> </span></p>
								</div>
								<?php
									 $sql_img = "select * from emp_master WHERE user_id = '$_SESSION[userid]'";
									$sql_img_rs = mysqli_query($con, $sql_img);
									$sql_img_arr = mysqli_fetch_array($sql_img_rs);
									
								?>
								<img src="dist/images/employee/<?php if($sql_img_arr['profile_pic']) { echo $sql_img_arr['profile_pic']; } else { echo "profile3.jpg"; } ?>" alt="" class="d-flex img-fluid rounded-circle img" id="profilep" >
							</div>
						</a>
						<div class="dropdown-menu  dropdown-menu-right p-0">
							<a href="edit-profile.php" class="dropdown-item px-2 align-self-center d-flex">
							<span class="icon-pencil mr-2 h6 mb-0"></span> Profile</a>
							
							<div class="dropdown-divider"></div>
							<a href="logout.php" class="dropdown-item px-2 text-danger align-self-center d-flex">
							<span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<!-- END: Header-->