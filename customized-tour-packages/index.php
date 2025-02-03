
<?php 
	include ("../includes/header/index.php"); 
	include ("../includes/contact-us/config.php")
?>
<title> Best Customized Tour Packages - Xtream Holiday</title>
<meta charset="UTF-8">
<meta name="description" content="We provide customized tour packages book your holiday tour packages from Xtream Holiday & get great deals on customizing your holiday tour packages online.">
<meta name="keywords" content="Best tour and travel agency in India, tour and travel agency, tour and travels near me, Best tour and travels, best travels agency, customized tour packages, best, places to visit on holiday, Best holiday packages, Best places to visit in summer, Best places to visit in winter best places to visit in a rainy season, Holiday packages, Two days holiday packages, Best holiday packages, India tour Packages, best international tour packages, about xtream holiday travel agency, best India tour packages, best north India tour packages, best south India tour packages, best east India tour packages, best west India tour packages, best Bhutan tour packages, Karnataka tour packages, best school tour packages, best honeymoon packages, best family tour packages, couple tour packages, solo trip packages, best tour and travel services.">
<meta name="author" content="Scopycode">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel=“canonical” href=“http://localhost/xtreamholiday/customized-tour-packages/” />
<?php include ("../includes/header/index1.php"); ?>
<style>
    .fw9 {
        font-weight:900;
    }
</style>
<div class="container register">
	<div class="row register1">
		<div class="col-md-12 register-right">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<h3 class="register-heading">Customize Tour Package</h3>
					<form class="row register-form" action="http://localhost/xtreamholiday/includes/request-form/customized-request.php" method="post">
						<div class="col-md-6">
							<div class="form-group">
								<label class="fw9"> Name :</label>
								<input type="text"  name="name" id="name" class="form-control" placeholder="Your Name *" onkeypress="return /[a-z]/i.test(event.key)"  value="" tabindex="1"/>
								<input type="hidden" name="url" value="http://localhost/xtreamholiday/customized-tour-packages/">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="fw9"> Email :</label>
								<input type="email"  name="email" id="email" class="form-control" placeholder="Your Email *" value=""  tabindex="2"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="fw9">Check-In-Date :</label>
								<input type="date" value="enter date" name="check_in_date" id="date_picker1"  class="form-control" data-select="datepicker" tabindex="3">													
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="fw9"> Check-Out-Date :</label>
								<input type="date" value="enter date" name="check_out_date" id="date_picker2"  class="form-control" data-select="datepicker" tabindex="4">							
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="fw9"> Contact :</label>
								<div class="row">
									<div class="col-lg-3 col-xs-12 col-md-3 col-sm-12" style="padding-right: 0;">
										<input list="text_editors" id="currency" name="std_code" class="form-control" placeholder="Code">
									</div>
									<div class="col-lg-9 col-xs-12 col-md-8 col-sm-12">
										<datalist id="text_editors">
											<select multiple="" size="8" id="currency" placeholder="Select Code">
												<?php
													$sql="select name, phonecode from std_code";
													$rs=mysqli_query($con,$sql);
													while($arr=mysqli_fetch_array($rs))
													{
														?>
														<option value="<?php echo $arr['name'].' ( '.$arr['phonecode'].' )'; ?>"><?php echo $arr['name'].' ( '.$arr['phonecode'].' )'; ?></option>
														<?php
													}
												?>	
											</select>
										</datalist>
										<input type="text" class="form-control" name="contact" id="contact" placeholder="Your Contact Number*" value="" tabindex="5" minlength="10" maxlength="10" >
									</div>
								</div>
							</div> 
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="fw9">Budget :</label>
								<div class="row">
									<div class="col-lg-5 col-xs-12 col-md-4 col-sm-12" style="padding-right: 0;">
										<input list="text_editors1" id="currency1" name="currancycode" class="form-control" placeholder="Select Currancy">
									</div>
									<div class="col-lg-7 col-xs-12 col-md-8 col-sm-12">
										<datalist id="text_editors1">
											<select multiple="" size="8" id="currency1" placeholder="Select Currancy">
												<?php
													$sql1="select * from currancy";
													$rs1=mysqli_query($con,$sql1);
													while($arr1=mysqli_fetch_array($rs1))
													{
														?>
														<option value="<?php echo $arr1['country'].' ( '.$arr1['code'].' )'; ?>"><?php echo $arr1['country'].' ( '.$arr1['code'].' )'; ?></option>
														<?php
													}
												?>	
											</select>
										</datalist>
										<input type="text" class="form-control" name="budget" id="budget" placeholder=" Your Budget*" value="" tabindex="6">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="fw9"> No.of.Persons :</label>
								<input type="number" min="0" class="form-control" name="no_of_persons" id="no_of_persons"  placeholder=" No of Persons*" value="" tabindex="7">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="fw9"> Tour Type :</label>
								<select class="form-control" name="tour_ty" tabindex="8">
									<option class="hidden"  selected disabled>Select Your Tour Type</option>
									<option>Corporate/Business Tour</option>
									<option>Educational Tour</option>
									<option>Personal Tour</option>
									<option>Group Tour</option>
									<option>Solo Tour</option>
									<option>Honeymoon Tour</option>
									<option>Industrial Tour</option>
									<option>Bike Rider Tour</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="maxl">
									<label class="fw9"> VISA :  </label>
									<label class="radio inline"> 
									<input type="radio" name="visa" id="visa" value="yes" tabindex="9">
									<span> YES</span> 
									</label>
									<label class="radio inline"> 
									<input type="radio" name="visa" id="visa" value="no" checked tabindex="10">
									<span>NO </span> 
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="maxl">
									<label class="fw9"> Travel Insurance : </label>
									<label class="radio inline">   
									<input type="radio" name="travel_insurance" id="travel_insurance" value="yes" tabindex="11"/>
									<span> YES</span> 
									</label>
									<label class="radio inline"> 
									<input type="radio" name="travel_insurance" id="travel_insurance" value="no" checked tabindex="12">
									<span>NO </span> 
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="maxl">
									<label class="fw9"> Food Type :  </label>
									<label class="radio inline">
									<input type="checkbox" name="vegetables" id="vegetables" value="Vegetables" tabindex="13">
									<span>Vegetables</span> 
									</label>
									<label class="radio inline"> 
									<input type="checkbox" name="fruits" id="fruits" value="Fruits" tabindex="14">
									<span> Fruits</span> 
									</label>
									<label class="radio inline"> 
									<input type="checkbox" name="nuts" id="nuts" value="Grains, Nuts & Seeds" tabindex="15">
									<span>Nuts & Seeds</span> 
									</label>
									<label class="radio inline"> 
									<input type="checkbox" name="meat" id="meat" value="Meat & Poultry" tabindex="16">
									<span> Meat & Poultry</span> 
									</label>
									<label class="radio inline"> 
									<input type="checkbox" name="fish" id="fish" value="Fish & Seafood" tabindex="17">
									<span> Fish & Seafood</span> 
									</label>
									<label class="radio inline"> 
									<input type="checkbox" name="dairy" id="dairy" value="Dairy Foods" tabindex="18">
									<span> Dairy Foods</span> 
									</label>
									<label class="radio inline"> 
									<input type="checkbox" name="eggs" id="eggs" value="Eggs" tabindex="19">
									<span>Eggs</span> 
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="maxl">
									<label class="fw9">Ticket :</label>
									<label class="radio inline">   
									<input type="checkbox" name="bus" id="bus" value="Bus" tabindex="20">
									<span> Bus</span> 
									</label>
									<label class="radio inline"> 
									<input type="checkbox" name="flight" id="flight" value="flight" tabindex="21">
									<span> Flight</span> 
									</label>
								</div>
							</div>
							<fieldset class="question">
								<label for="coupon_question" class="radio inline fw9">Do you have a Health Issues?
								<input class="coupon_question" type="checkbox" name="health_issues" id="health_issues" value="" onchange="valueChanged()"/ tabindex="22">
								<span>Yes</span>
								</label>
							</fieldset>
							<fieldset class="answer">
								<div class="sendTo2" id="commaSep2">
									<label class="fw9"> Mention Health Issue :</label>
									<div class="form-group">
										<input type="text" name="health_issues" id="health_issues" class="form-control" placeholder="" />
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="fw9"> Type of Stay :</label>
								<select class="form-control"  name="stay_ty" tabindex="23">
									<option class="hidden"  selected disabled> Select Your Stay Type</option>
									<option>Hotels</option>
									<option>Bed & Breakfast</option>
									<option>Cottages</option>
									<option>Apartments</option>
									<option>Boats</option>
									<option>Log Cabins</option>
									<option>Caravans</option>
									<option>Camping-tents</option>
									<option>Hostels</option>
									<option>Guest Houses & Home-Stays</option>
								</select>
							</div>
							<div class="form-group">
								<label class="fw9"> Query :</label>
								<textarea placeholder="Your Query" id="message" rows="4"  name="message" class="form-control" required data-error="Please enter your comments" tabindex="25"></textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label class="fw9"> Location <small> (Separated by Comma)</small>:</label>
								<div class="sendTo" id="commaSep">
									<div class="form-control" >
										<input type="hidden" name="place" id="place">
										<input type="text"  name="location" id="location" placeholder="Paris, India" tabindex="24">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit" tabindex="26"/>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include ("../includes/footer/index.php"); ?>
<script>
	function valueChanged() {
	if($('.coupon_question').is(":checked"))   
	$(".answer").show();
	else
	$(".answer").hide();
	};
</script>
<script>
	(function ($) {
		    $.fn.commaSeparated = function () {
	
		        return this.each(function () {
	
		            var
		                block = $(this),
		                field = block.find('input[type="text"]');
	
		            field.keyup(function (e) {
		                if (e.keyCode == 188) {
		                    var $this = $(this);
		                    var n = $this.val().split(",");
		                    var str = n[n.length - 2];
		                    if (str) $(this).before('<span class="removeName">' + str + '<small>x</small></span>');
							var loc = $("#place").val();
							if(loc)
							{
								var loc1 = loc+', '+str;
							}
							else
							{
								 var loc1 = str;
							}
							$("#place").val(loc1);
		                    $this.val('');
		                }
		            });
		        });
	
		    };
	
		    $(document).on('click', 'span.removeName small', function () {
		        $(this).closest('span').remove();
		    });
	      //fire commaSeparated
		    $("#commaSep").commaSeparated();
		})(jQuery);
		
	(function ($) {
		    $.fn.commaSeparated2 = function () {
	
		        return this.each(function () {
	
		            var
		                block = $(this),
		                field = block.find('input[type="text"]');
	
		            field.keyup(function (e) {
		                if (e.keyCode == 188) {
		                    var $this = $(this);
		                    var n = $this.val().split(",");
		                    var str = n[n.length - 2];
		                    if (str) $(this).before('<span class="removeName2">' + str + '<small>x</small></span>');
							var loc = $("#healthissue").val();
							if(loc)
							{
								var loc1 = loc+', '+str;
							}
							else
							{
								 var loc1 = str;
							}
							$("#healthissue").val(loc1);
		                    $this.val('');
		                }
		            });
		        });
	
		    };
	
		    $(document).on('click', 'span.removeName2 small', function () {
		        $(this).closest('span').remove();
		    });
	      //fire commaSeparated
		    $("#commaSep2").commaSeparated2();
		})(jQuery);
</script>
<script>
	var show = true;
	
	function showCheckboxes() {
	    var checkboxes = 
	        document.getElementById("checkBoxes");
	
	    if (show) {
	        checkboxes.style.display = "block";
	        show = false;
	    } else {
	        checkboxes.style.display = "none";
	        show = true;
	    }
	}
</script>
<script language="javascript">
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0');
	var yyyy = today.getFullYear();
	
	today = yyyy + '-' + mm + '-' + dd;
	$('#date_picker1').attr('min',today);
	$('#date_picker2').attr('min',today);
</script>
<script>
	$('.input-group.date').datepicker({format: "dd.mm.yyyy"});
<script>