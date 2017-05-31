<?php
	include "include/main-inc.php";
?>
<?php
	$selmeta = "select * from metaTags where filename='index'";
	$selmetaquery = mysql_query($selmeta);
	
	$metadata = mysql_fetch_array($selmetaquery);
	
	$ptitle=$metadata['MetaTitle'];
	
	$desc=$metadata['MetaDisc'];
	$kwords=$metadata['MetaKwd'];	
	$pageName=$filename;
	$canonicalurl= "http://www.reputize.in/";
	$othercode=$metadata['othercode'];	
				
	desktopHeaderMobile($ptitle,$kwords,$desc,$pageName,$canonicalurl,$othercode);
?>

<?php
	$tableName = "homeContentMobile";
	$conditions = "customerID='2' and lan_code='en'";
	$indexdata = sqlqueryfetch($tableName,$conditions);
?>
		
		<section clear="clear">
			<div class="imgCntainr ">
				<?php
					$selslider = "select * from HomeSlider where customerID='2' and type='home' order by slno asc limit 1";
					$sliderquery = mysql_query($selslider);
					while($sliderrow = mysql_fetch_array($sliderquery))
						{
				?>
							<img src="http://res.cloudinary.com/the-perch/image/upload/h_320,c_fill/reputize/homepage-slider/<?php echo $sliderrow['hsimg']; ?>.jpg" class="img img-responsive" />
				<?php
						}
				?>
				<a href="#" class="btnTop colorWhite them_bg_trnprt btnTopL" onclick="openNav2()"><i class="fa fa-building"></i>&nbsp;By Property</a>
				<a href="#" class="btnTop colorWhite them_bg_trnprt btnTopR" onclick="openNav3()"><i class="fa fa-map-marker"></i>&nbsp;By Location</a>
			</div>
			<div class="top3BtnCntinr ">
				<div class="top3BtnCntinrInner">
					<ul>
						<li><a class="top3Btn colorWhite" href="tel:+91-880-046-1053"><i class="fa fa-phone"></i>Call</a></li>
						<li><a class="top3Btn colorWhite" href="mailto:tech@theperch.in" style="padding-left: 49px;padding-right: 25px;"><i class="fa fa-envelope"></i>Mail Us</a></li>
						<li><a class="top3Btn colorWhite" onclick="openNav4()"><i class="fa fa-hotel"></i>Book Now</a></li>
					</ul>
				</div>
			</div>
		</section><br>
		
		<h1 class="txtCenter mrgnTop30"><?php echo $indexdata['h1tag']; ?></h1>
		<section class="detailSec clear">		
			<div class="DetilSec">
				<div class="paragrf"><?php echo $indexdata['mainContent']; ?></div>
			</div>		
		</section>
		
		<h3 class="txtCenter mrgnTop30 mrgnBtm0"><?php echo $indexdata['awardHead']; ?></h3>
		
		<p class="txtCenter"><small><small><?php echo $indexdata['awardContent']; ?></small></small></p>
		
		<section class="awrd clear">
			<div class="awrdLeft">
				<div>
					<a>
						<div class="overLeyFrAwrd"><div class="awrdCText">manali Hotel</div></div>
						<img src="../mobile/images/<?php echo $indexdata['awardImage1']; ?>" class="img img-responsive" style="margin-bottom:10px;" />
					</a>	
				</div>
			</div>
			<div class="awrdRight">
				<div>
					<a>
						<div class="overLeyFrAwrd"><div class="awrdCText">manali Hotel</div></div>
						<img src="../mobile/images/<?php echo $indexdata['awardImage2']; ?>" class="img img-responsive" />
					</a>
				</div>
			</div>
		</section>
		
		
		<div id="myNav2" class="overlay1">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
			
			<!------------------------------- Tab1 Starts ----------------------------->
			<div class="overlay-content1" id="tab1_content" style="text-align:left;top: 14%;">
				<?php
					$servpopsel = "select * from propertyTable where customerID='2' and status='Y' and feature='Y' order by propertyID asc";
					$servpopquery = mysql_query($servpopsel);
					while($servpoprow = mysql_fetch_array($servpopquery))
						{
				?>
							<a href="<?php SITE_URL_PATH; ?>/<?php echo $servpoprow['propertyURL']; ?>.html"><?php echo $servpoprow['propertyName']; ?></a>
							<hr class="line_height"> 
				<?php
						}
				?>	
			</div>
			<!------------------------------- Tab1 Ends ----------------------------->
		</div>
		
		<div id="myNav3" class="overlay1">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav3()">&times;</a>
			
			<!------------------------------- Tab1 Starts ----------------------------->
			<div class="overlay-content1" id="tab2_content" style="text-align:left;top: 14%;">
				<?php
					$servpopsel = "select * from city_url where customerID='2' and status='Y' group by cityName order by cityID asc";
					$servpopquery = mysql_query($servpopsel);
					while($servpoprow = mysql_fetch_array($servpopquery))
						{
				?>
							<a href="<?php SITE_URL_PATH; ?>/<?php echo $servpoprow['cityUrl']; ?>.html"><?php echo $servpoprow['cityName']; ?></a>
							<hr class="line_height"> 
				<?php
						}
				?>	
			</div>
			<!------------------------------- Tab1 Ends ----------------------------->
		</div>
		
		<div id="myNav4" class="overlay_4_frm" >
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav4();"><i class="fa fa-chevron-left"></i></a>
			<center>
				<form action="" method="post" onsubmit="$('#cntryCode').val($('#getCntryFrm').attr ('title'));">
					<input type="hidden" name="properid" value="<?php echo $propid ; ?>" />
					<input type="hidden" name="propername" value="<?php echo $propnam ; ?>" /> 
					<input type="hidden" name="refURL" value="<?php echo $_SERVER["HTTP_REFERER"];?>" />
					<input type="hidden" name="bookingurl" value="<?php echo $bookingurl ; ?>" />
					
					<div class="form-content" id="tab1_content">
						<div class="mk_resvtn">
							<span id="tab1"  class="active theme_bg_color">Make a reservation</span>
						</div>
						
						<div class="inpt_div font5v">
							<label>Guest Name</label>
							<input class="inpt_frm" name="guest_name" type="text" required>
						</div>	
						
						<div class="inpt_div font5v">
							<label>Select Property</label>
							<select class="inpt_frm" name="prop_name" required>
								<?php
									$servpopsel10 = "select * from propertyTable where customerID='2' and status='Y' and feature='Y' order by propertyID asc";
									$servpopquery10 = mysql_query($servpopsel10);
									while($servpoprow10 = mysql_fetch_array($servpopquery10))
										{
								?>
											<option value="<?php echo $servpoprow10['propertyName']; ?>"><?php echo $servpoprow10['propertyName']; ?></option>
								<?php
										}
								?>
							</select>
						</div>
						
						<div class="inpt_div font5v">
							<label>Email</label>
							<input class="inpt_frm" name="guest_mail" type="email" required>
						</div>	
						
						<div class="inpt_div font5v">
							<label>Phone No</label><br>
							<input type="hidden" id="cntryCode" name='cnty' value=''>
							<input id="phone" name="phone" type='tel' class="inpt_frm" width="100%" required>
						</div>	
						
						<input type="text" name="spcheck8" style="display:none;" />
						
						<input type="submit" name="bookprop" class="para_heding theme_text_color fram_width sbmt_btn_4_frm font5v theme_bg_color" value="Procede To Book Now" />	
					</div>
				</form>
			</center>
		</div>
		
		<script>
			function openNav4() {
				// document.getElementById("myNav2").style.height = "100%";
						
				$('#myNav4').fadeIn(100);
			}
			function closeNav4() {
				// document.getElementById("myNav2").style.height = "0%";
				$('#myNav4').fadeOut(100);
			}
		</script>	
		
		<script>
			function openNav2() {
				document.getElementById("myNav2").style.width = "100%";
			}

			function closeNav2() {
				document.getElementById("myNav2").style.width = "0%";
			}
		</script>
		
		<script>
			function openNav3() {
				document.getElementById("myNav3").style.width = "100%";
			}

			function closeNav3() {
				document.getElementById("myNav3").style.width = "0%";
			}
		</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/hammer.min.js"></script>

<?php
	desktopFooterMobile();
	exit;
?>
