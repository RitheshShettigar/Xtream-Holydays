<!-- START: Main Menu-->
<div class="sidebar">
	<a href="#" class="sidebarCollapse float-right h6 dropdown-menu-right mr-2 mt-2 position-absolute d-block d-lg-none">
	<i class="icon-close"></i>
	</a>
	<!-- START: Logo-->
	<a href="index.php" class="sidebar-logo d-flex">
	    <img src="http://localhost/xtreamholiday/includes/img/logo.png" alt="logo" class="img-fluid mr-2"/>
	      
	</a>
	<!-- END: Logo-->
	<!-- START: Menu-->
	<ul id="side-menu" class="sidebar-menu">
		<li class="dropdown active">
			<a href="index.php"><i class="icon-speedometer"></i>Dashboard</a> 
		</li>
		<li class="dropdown"><a href="#"><i class="fas fa-box-open"></i>Packages</a> 
			<div>
				<ul>
					<li><a href="package-new.php"><i class="fas fa-box"></i> Add New Package</a></li>
					<li><a href="package-report.php"><i class="fas fa-gift"></i> Available Packages</a></li>
					<li><a href="package-expired.php"><i class="fas fa-boxes"></i> Expired Packages</a></li>
					<li><a href="User Booking-Packages.php"><i class="fas fa-boxes"></i> User Booking Packages</a></li>
				</ul>
			</div>
		</li>
		<li class="dropdown"><a href="#"><i class="fas fa-hotel"></i>Hotels</a> 
			<div>
				<ul>
					<li><a href="hotel-new.php"><i class="fas fa-plus-circle"></i> Hotels</a></li>
					<li><a href="amenities.php"><i class="fas fa-list-alt"></i>Amenities</a></li>
					<li><a href="hotel_report.php"><i class="fas fa-list-alt"></i>Hotels Booking Report</a></li>
				</ul>
			</div>
		</li>
		<li class="dropdown"><a href="#"><i class="fas fa-city"></i>Area</a> 
			<div>
				<ul>
					<li><a href="city-master.php"><i class="fas fa-list-alt"></i> City</a></li>
					<li><a href="state-master.php"><i class="fas fa-list-alt"></i> State</a></li>
				</ul>
			</div>
		</li>
		<?php 
			if($_SESSION['cat'] == 'Admin')
			{
				?>

				<li class="dropdown"><a href="#"><i class="fa fa-users"></i>Employee</a> 
					<div>
						<ul>
							<li><a href="employee-master.php"><i class="icon-plus"></i> Add New Emp</a></li>
							<li><a href="employee-master-report.php"><i class="icon-rocket"></i> Emp Report</a></li>
						</ul>
					</div>
				</li>
				<?php
			}
			else
			{
				?>
				<li class="dropdown">
					<a href="edit-profile.php"><i class="icon-user"></i>Profile</a>
				</li>
				<?php
			}
		?>
		<li class="dropdown"><a href="#"><i class="icon-calendar"></i>Attandence</a> 
			<div>
				<ul>
					<li><a href="index-2.html"><i class="icon-plus"></i> Add </a></li>
					<li><a href="index-cryptocurrency.html"><i class="icon-rocket"></i> Report</a></li>
				</ul>
			</div>
		</li>
		<li class="dropdown"><a href="#"><i class="icon-grid"></i>Task</a> 
			<div>
				<ul>
					<li><a href="task.php"><i class="icon-plus"></i> Add New Task</a></li>
					<li><a href="task-report.php"><i class="icon-hourglass"></i> Assigned Tasks</a></li>
					<li><a href="task-pending.php"><i class="icon-check"></i> Pending Tasks</a></li>
				</ul>
			</div>
		</li>
		<li class="dropdown"><a href="#"><i class="icon-chart"></i>Leads</a> 
			<div>
				<ul>
					<li><a href="lead.php"><i class="icon-plus"></i> Add</a></li>
					<li><a href="leads-report.php"><i class="icon-rocket"></i> Report</a></li>
					<li><a href="leads-website.php"><i class="icon-rocket"></i> Website Leads</a></li>
				</ul>
			</div>
		</li>
		<?php 
			if($_SESSION['cat'] == 'Admin')
			{
				?>

				<li class="dropdown"><a href="#"><i class="fa fa-book"></i>Invoice</a> 
					<div>
						<ul>
							<li><a href="customer-details.php"><i class="icon-plus"></i>Customer Details</a></li>
							<li><a href="bill.php"><i class="icon-plus"></i>Add Bill</a></li>
							<li><a href="bill-report.php"><i class="icon-rocket"></i> Bill Report</a></li>
						</ul>
					</div>
				</li>
				<?php
			}
		?>
		<!--<li class="dropdown"><a href="#"><i class="icon-people"></i>Customers</a> 
			<div>
				<ul>
					<li><a href="index-2.html"><i class="icon-plus"></i> Add </a></li>
					<li><a href="#"><i class="icon-list"></i>Customer List</a></li>
					<li><a href="index-cryptocurrency.html"><i class="icon-rocket"></i>  Report</a></li>
				</ul>
			</div>
		</li>-->
		<li class="dropdown">
			<a href="subscribers.php"><i class="icon-film"></i>Subscribers</a>
		</li>
		<?php 
			if($_SESSION['cat'] == 'Admin')
			{
				?>

				<li class="dropdown"><a href="#"><i class="fas fa-piggy-bank"></i>Bank</a> 
					<div>
						<ul>
							<li><a href="Bank-details.php"><i class="fas fa-hand-holding-usd"></i>Bank Details</a></li>
							<li><a href="company-details.php"><i class="fas fa-industry"></i> Company Details</a></li>
						</ul>
					</div>
				</li>
				<?php
			}
		?>

		<li class="dropdown">
			<a href="logout.php"><i class="icon-menu"></i>Logout</a>
		</li>		
	</ul>
	<!-- END: Menu-->
</div>
<!-- END: Main Menu-->