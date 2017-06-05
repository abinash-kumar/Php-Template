
<?php
	include "include/config.php";
	include "include/return_functions.php";
	
	error_reporting(E_ERROR | E_PARSE);
	function desktopHeader($ptitle="", $kwords="", $desc="", $pageName="", $canonicalurl="", $othercode="")
		{
			include_once "config.php";
?>
			<!DOCTYPE html>
			<html lang="en">
				
				<head>				
					<title><?php echo $ptitle;?></title>
					<link rel="shortcut icon" href="images/50.png" type="image/x-icon" />
					<meta name="description" content="<?php echo $desc;?>" />
					<meta name="keywords" content="<?php echo $kwords;?>" />
					<?php
						if($canonicalurl!='')
							{
					?>
								<link rel="canonical" href="<?php echo $canonicalurl; ?>" />
					<?php
							}
					?>
	
					<?php
						if($othercode!='')
							{
								echo html_entity_decode($othercode);
							}
					
						$Analyticres = "select * from tbl_analytic_code where pageID='1'";
						$analyticquery = mysql_query($Analyticres);
						$analyticdata = mysql_fetch_array($analyticquery);
						
						if($analyticdata['analyticcode']!='')
							{
								echo html_entity_decode($analyticdata['analyticcode'], ENT_QUOTES);
							}
					?>
					<link rel="shortcut icon" href="images/baikunhlogo.jpg" />
					<link rel="stylesheet" href="css/bootstrap.css">
					<link rel="stylesheet" href="css/style.css">
					<link rel="stylesheet" href="css/color3.css">
					<link href="css/animate.min.css" rel="stylesheet">
					<!-- Bootstrap Date-Picker Plugin -->
					<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
					<link href="https://fonts.googleapis.com/css?family=Maven+Pro|Quicksand:300" rel="stylesheet">
					<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
					<!-- <link rel="stylesheet" href="css/w3.css">  -->
					<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> 
					<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
					<script src="js/jquery-3.1.1.min.js"></script>
					<script src="js/bootstrap.min.js"></script>	 

				</head>
				
				<body id="topID">
					<div class="navbr">
						<div class="myNav fram_width">
							<a href=""><div class="logo   flotLft">
								<img src="images/baikunhlogo.png" />
							</div></a>
							
							<div class="ffrc flotRt homeContct w230px text_upper mrgn_top" id="dropForm">
								<a class="them_btn theme_bg_color"><span><i class="fa fa-bolt"></i>&nbsp;Book NOW</span></a>
							</div>
							
							<ul class="flotLft navLst">
								<li><a href="about-us.html">About Us<hr></a>
									<div class="dorpDwn">
										<a href="<?php SITE_URL_PATH; ?>/contact-us.html">Contact Us</a>
										<a href="<?php SITE_URL_PATH; ?>/food.html">Food & Beverages</a>
										<a href="<?php SITE_URL_PATH; ?>/our-clients.html">Our Clients</a>
										<a href="<?php SITE_URL_PATH; ?>/why-the-perch.html">Why Us</a>
									</div>			
								</li>
								
								<li><a href="">Our Facilities<hr></a></li>
								
								<li><a href="">Hotels in Himachal<hr></a>
									<div class="dorpDwn">
										<a href="service-apartments.php">Hotels in Manali</a>
										<a href="service-apartments.php">Hotels in Kasauli</a>
									</div>
								</li>
								
								<a href="<?php SITE_URL_PATH; ?>/"><li>Home<hr></li></a>
							</ul>
						</div>
					</div>
					
<?php
		}
	function desktopHeaderLang($ptitle="", $kwords="", $desc="", $pageName="", $canonicalurl="", $othercode="", $langua="")
		{
			include_once "config.php";
			
?>
			<html>
				
				<head>				
					<title><?php echo $ptitle;?></title>
					<link rel="shortcut icon" href="images/50.png" type="image/x-icon" />
					<meta name="description" content="<?php echo $desc;?>" />
					<meta name="keywords" content="<?php echo $kwords;?>" />
					<?php
						if($canonicalurl!='')
							{
					?>
								<link rel="canonical" href="<?php echo $canonicalurl; ?>" />
					<?php
							}
					?>
	
					<?php
						if($othercode!='')
							{
								echo html_entity_decode($othercode);
							}
					
						$Analyticres = "select * from tbl_analytic_code where pageID='1'";
						$analyticquery = mysql_query($Analyticres);
						$analyticdata = mysql_fetch_array($analyticquery);
						
						if($analyticdata['analyticcode']!='')
							{
								echo html_entity_decode($analyticdata['analyticcode'], ENT_QUOTES);
							}
					?>
				</head>
				
				<body>
					
					
<?php
		}
	function desktopFooter()
		{
			include_once "config.php";
?>
					<div class="footerTopImg"></div>
					<section class="footer " id="animate3">
						<div class="overley"></div>	
						<div class="navLnkLst">
							<div class="ftrCntnt clear">
								<div class="propContnr2">
									<div class="prop">
										<h3 class="themTxtColor2" style="padding-left:10px;font-size: 15px;">QUICK LINKS</h3>
										<ul class="footerList">
											<li><a href="<?php SITE_URL_PATH; ?>/">Home</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/corporate-clients.html">Corprate Guest</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/japanese-guests.html">Japanese Guests</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/medical-tourist.html">Medical Tourist</a></li>
										</ul>
									</div>				
								</div>

								<div class="propContnr2">
									<div class="prop">
										<h3 class="themTxtColor2" style="padding-left:10px;font-size: 15px;">VALUABLE CLIENTS<h3>
										<ul class="footerList">
											<li><a href="#">Our Blog</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/our-clients.html">Our  Clients</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/book-now.html">Book Now</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/policies.html">Privacy Policies & Terms</a></li>
										</ul>
									</div>				
								</div>
								<div class="propContnr2 ftrSeprater">
									<h3 class="themTxtColor2" style="font-size: 15px;">Contact details</h3>
									<div class="prop">
										<div class="colorWite"><p>Baikunth Resort, Kasauli: Village Chabbal, P.O. Garkhal, Tehsil - Kasauli, District - Solan, Himachal Pradesh - 173201, 9857166230 / 7807266230 / 9459494151 / 9459494152 , Email: ireservations@baikunth.com</p></div>
										<div class="colorWite"><p>Baikunth Magnolia, Manali: Circuit House Road, The Mall, Manali, Himachal Pradesh - 175131,  +9816792888 & 9459494161, Email: reservations@baikunth.com</p></div>
										
									</div>				
								</div>
							</div>
						</div>
						<p class="ftrCpyRt">&copy; Copyright 2014-2016 | All Rights Reserved | Powered by <span class="themTxtColor2"><b>NODAL</b></span> |Our Blog</p>
					</section>
					
					<!-- Html for the top dropdown form for all pages -->
					<div class="topDropForm">
						<div class="topDropFormOvly">
							<div class="fram_width topDropFormCntnr">
								<div class="hire NoBg">
									<div class="hire_form NoBg">
										<form>
											<div>
												<div class="myinputGrp">
													<label>Your Name</label>
													<input type='text' class="frnInput" />
												</div>
												
												<div class="myinputGrp">
													<label>Email</label>
													<select class="frnInput" style="margin: 0px 0px;">
														<option></option>
														<option>Web Designer</option>
													</select>
												</div>
											</div>
											
											<div>
												<div class="myinputGrp">
													<label>Your Email</label>
													<input type="email" style="width: 100%;" class="frnInput" />
												</div>
												
												<div class="myinputGrp">
													<label>Phone Number</label>
													<input type="text" class="frnInput" style="width: 100%;"/>
												</div>
											</div>
											
											<div>
												<div class="myinputGrp">
													<label>Your Email</label>
													<input type="email" style="width: 100%;" class="frnInput" />
												</div>
												
												<div class="myinputGrp">
													<label>Phone Number</label>
													<input type="text" class="frnInput" style="width: 100%;"/>
												</div>	
											</div>
											
											<div>
												<input type="submit" class="them_btn theme_bg_color pull-right bttoms" value="Continue >"></input>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>	
					</div>
				
				<script>
					$('.myinputGrp > input,.myinputGrp > select,.myinputGrp > label').focus(function(){
						$(this).prev().css({'bottom':'20px','font-size':'12px','color':'#106cc8'},100);
						$(this).css({'border-color':'#106cc8','border-width': '2px'})
						$(this).blur(function(){
							if($(this).val()==''){
								$(this).prev().css({'bottom':'5px','font-size':'16px','color':'#525252'},100);
								$(this).css({'border-color':'#dd2c00','border-width': '1px'});					
							};
						});
					});
				</script>
				
				<script>
					$(document).mouseup(function (e)
					{   var containr = $("#dropForm");
						var containr2 = $(".topDropForm");
						if ((!containr.is(e.target) && (containr.has(e.target).length === 0))
						&& (!containr2.is(e.target) && (containr2.has(e.target).length === 0))){
							if($('.topDropForm').css('display')=='block'){
							togleStats++;
							$(".topDropForm").fadeOut();
							}
						}
					});
				</script>
				
				<script>
					var togleStats =1;
					$("#dropForm").click(function() {			
						togleStats++;
						 if ($('.topDropForm').css('display')=='none'){
						 $('html, body').animate({					
							 scrollTop: $("#topID").offset().top
						 }, 700);
						 $('.topDropForm').delay(720).slideDown();
						return false;
						}else{
							$('.topDropForm').fadeOut();
						}
					});
				</script>
			
<?php
		}
	function desktopFooterLang($langua="")
		{
			include_once "config.php";
?>

				</body>
			</html>
<?php
		}
	function desktopHeaderMobile($ptitle="", $kwords="", $desc="", $pageName="", $canonicalurl="", $othercode="")
		{
			include_once "config.php";
?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				
				<head>
					<link rel="shortcut icon" href="images/50.png" type="image/x-icon" />
					<title><?php echo $ptitle;?></title>
					<meta name="description" content="<?php echo $desc;?>" />
					<meta name="keywords" content="<?php echo $kwords;?>" />
					<?php
						if($canonicalurl!='')
							{
					?>
								<link rel="canonical" href="<?php echo $canonicalurl; ?>" />
					<?php
							}
					?>
	
					<?php
						if($othercode!='')
							{
								echo html_entity_decode($othercode);
							}
					
						$Analyticres = "select * from tbl_analytic_code where pageID='1'";
						$analyticquery = mysql_query($Analyticres);
						$analyticdata = mysql_fetch_array($analyticquery);
						
						if($analyticdata['analyticcode']!='')
							{
								echo html_entity_decode($analyticdata['analyticcode'], ENT_QUOTES);
							}
					?>
					<!-- Chrome, Firefox OS and Opera -->
					<meta name="theme-color" content="#896633">
					<!-- Windows Phone -->
					<meta name="msapplication-navbutton-color" content="#896633">
					<!-- iOS Safari -->
					<meta name="apple-mobile-web-app-status-bar-style" content="#896633">
					<link rel="stylesheet" href="../mobile-script/css/Mstyle.css">
					<link rel="stylesheet" href="../mobile-script/css/color3.css">
					<link rel="stylesheet" href="../mobile-script/css/bootstrap.css">
					<link rel="stylesheet" type="text/css" href="../mobile-script/css/customSlider.css">
					<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css"> </head>
					<script src="../mobile-script/js/jquery-3.1.1.min.js"></script>
					<script src="../mobile-script/js/app.js"></script>
				</head>
				
				<body>
					<section class="headerTop">
						<div class="headerLogo">
							<a href="<?php SITE_URL_PATH; ?>/">
								<img src="../images/baikunhlogo.jpg" style="height: 70px;width: 82px;" />
							</a>
						</div>
						
						<div class="navIcon" onclick="openNav()">
							<i class="fa fa-bars"></i>
						</div>
					</section>
					
<?php
		}
	function desktopFooterMobile()
		{
?>
					<section class="footer clear">
						<img src="../mobile-script/images/footer.jpg" class="img img-responsive" />	
						<div class="FootrOverley them_bg_trnprt"></div>
						
						<div class="footerCntnt" >
							<h3> Call Us +91-9857166230 </h3>
							<div class="FootrIcon">
								<ul>
									<li><a class="fIcon colorWhite" href="#"><i class="fa fa-facebook"></i></a></li>
									<!--<li><a class="fIcon colorWhite" href="#" ><i class="fa fa-rss"></i></a></li>
									<li><a class="fIcon colorWhite" href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a class="fIcon colorWhite" href="#"><i class="fa fa-google-plus"></i></a></li>-->
									<li><a class="fIcon colorWhite" href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						
							<span class="lnklst"><a class="colorWhite" href="#">Home</a>|<a class="colorWhite" href="#">Privacy & Policy</a>|<a class="colorWhite" href="#">Contact Us</a> </span>
							
							<p><i><small>Copyright © 2016 The lorem All rights reserved.</small></i></p>
						</div>
					</section>
				
					<!-- navBar code starts from here -->
					<div class="navOverley" scroll="false">
						<div id="mySidenav" class="sidenav offEffect">
							<img src="../images/contactBg.jpg" />
							<a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="border:0;color:#fff !important;">&times;</a>
							<a href="<?php SITE_URL_PATH; ?>/"><i class="fa fa-home"></i>Home</a>
							<a href="<?php SITE_URL_PATH; ?>/resorts-in-manali.html"><i class="fa fa-location-arrow"></i>Hotels in Manali</a>
							<a href="<?php SITE_URL_PATH; ?>/resorts-in-kasauli.html"><i class="fa fa-location-arrow"></i>Hotels in Kasauli</a>
							<a href="<?php SITE_URL_PATH; ?>/about-us.html"><i class="fa fa-code"></i>About Us</a>
							<a href="<?php SITE_URL_PATH; ?>/contact-us.html"><i class="fa fa-vcard-o"></i>Contact Us</a>
						</div>	
					</div>
					<!-- Slider on over ley for property page  -->
				</body>
			</html>

<?php
		}
?>