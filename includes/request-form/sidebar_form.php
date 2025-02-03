<div class="sidebar"  id="sidebar">
	<div class="sidebar-inner">
		<div class="book-tour">
			<h3><span class="t1">Plan Your Trip</span></h3>
			<div class="sidebar-item sidebar-widget">
				<form action="http://localhost/xtreamholiday/includes/request-form/tour-request.php" method="post">
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
								<input type="tel" class="form-control" name="contact" id="contact" placeholder="Contact No.*" required data-error="Please enter your contact number" value="" tabindex="5">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label> Email </label>
						<input type="email" class="form-control" name="email" placeholder="Email Address"> 
					</div>
					<div class="form-group">
						<label >No of Days</label>
						<input type="number" name="days"  min="0" class="form-control" placeholder="Enter No. Of Days">
					</div>
					<div class="form-group">
						<label> Check-In-Date </label>
						<input type="date"  id="Check-In-Date" name="check_in_dt" class="form-control"> 
					</div>
					<div class="form-group">
						<label> Check-Out-Date </label>
						<input type="date" id="Check-Out-Date" name="check_out_dt" class="form-control"> 
					</div>
					<div class="form-group">
						<label >Arrival city</label>
						<input type="text" name="arrival" class="form-control" placeholder="Enter Arrival City"> 
					</div>
					<div class="form-group">
						<label >Departure city </label>
						<input type="text" name="departure" class="form-control" placeholder="Enter Departure City"> 
					</div>
					<div class="form-group">
						<label>No of Persons </label>
						<input name="persons" min="0" type="number"  class="form-control" placeholder="Enter No. Of Persons">
					</div>
					<label >Type of Stay</label>
					<div class="form-control">
						<select name="ty_stay">
							<option value="">Select Stay Type</option>
							<option value="Resort">Resort</option>
							<option value="Hotel">Hotel</option>
							<option value="Beach House">Beach House</option>
							<option value="Other">Other</option>
						</select>
					</div>
					<label >Category</label>
					<div class="form-control">
						<select name="cat" >
							<option value="0">Select category</option>
							<option value="Persnol">Personal</option>
							<option value="Educational">Educational</option>
							<option value="Corporate">Corporate</option>
						</select>
					</div>
					<label >Travel Type</label>
					<div class="form-control">
						<select name="travel_ty">
							<option value="0">Select Travel Type</option>
							<option value="Adventure">Adventure</option>
							<option value="Hiking">Hiking</option>
							<option value="Suffing">Suffing</option>
						</select>
					</div>
					<div class="form-group">
						<label >Budget </label>
						<div class="row">
							<div class="col-lg-5 col-xs-12 col-md-4 col-sm-12" style="padding-right: 0;">
								<input list="text_editors1" id="currency" name="currency" class="form-control" placeholder="Currancy">
							</div>
							<div class="col-lg-7 col-xs-12 col-md-8 col-sm-12">
								<datalist id="text_editors1">
									<select multiple="" size="8" id="currency" placeholder="Select Currancy">
										<?php
											$sql="select * from currancy";
											$rs=mysqli_query($con,$sql);
											while($arr=mysqli_fetch_array($rs))
											{
												?>
										<option value="<?php echo $arr['code'].' ( '.$arr['country'].' )'; ?>"><?php echo $arr['code'].' ( '.$arr['country'].' )'; ?></option>
										<?php
											}
											?>
									</select>
								</datalist>
								<input type="text" class="form-control" name="budget" id="budget" placeholder=" Your Budget*" value="" tabindex="6">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Additional Comment</label>
						<textarea name="message"class="form-control" cols="15" rows="5"></textarea>
					</div>
					<input type="submit" value="Book Now" name="submit" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
</div>