
<?php
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
					
					<link rel="shortcut icon" href="../images/logo.png" />
					<link rel="stylesheet" href="../css/bootstrap.css">
					<link rel="stylesheet" href="../css/style.css">
					<link rel="stylesheet" href="../css/color3.css">
					<link href="css/animate.min.css" rel="stylesheet">
					<!-- Bootstrap Date-Picker Plugin -->
					<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
					<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Sansita+One" rel="stylesheet">
					<link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">
					<!-- <link rel="stylesheet" href="css/w3.css">  -->
					<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css"> 
					<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
					<script src="../js/jquery-3.1.1.min.js"></script>
					<script src="../js/bootstrap.min.js"></script>	  
				</head>
				
				<body>
					<div class="navbr">
						<div class="myNav fram_width">
							<a href="<?php SITE_URL_PATH; ?>/"><div class="logo   flotLft">
								<h1 class="navH1" style="font-family: 'Lobster', cursive; ">Hotel</h1>
								<small class="">Service Apartment & Suites</small>
							</div></a>
							
							<div class="ffrc flotRt homeContct w230px text_upper mrgn_top">
								<a class="them_btn theme_bg_color"><span><i class="fa fa-bolt"></i>&nbsp;Book NOW</span></a>
							</div>
							
							<ul class="flotLft navLst">
								<li><!--<a href="<?php SITE_URL_PATH; ?>/about-us.html">-->About Us<hr><!--</a>-->
									<div class="dorpDwn">
										<!--<a href="<?php SITE_URL_PATH; ?>/contact-us.html">-->Contact Us<!--</a>-->
									<!--	<a href="<?php SITE_URL_PATH; ?>/food.html">-->Food & Beverages<!--</a>-->
									<!--	<a href="<?php SITE_URL_PATH; ?>/our-clients.html">-->Our Clients<!--</a>-->
									<!--	<a href="<?php SITE_URL_PATH; ?>/why-the-perch.html">-->Why Us<!--</a>-->
									</div>			
								</li>
								
								<li><a href="">Our Facilities<hr></a></li>
								
								<li><a href="">Hotels in Himachal<hr></a>
									<div class="dorpDwn">
									<!--	<a href="<?php SITE_URL_PATH; ?>/hotels-in-manali.html">-->Hotels in Manali<!--</a>-->
									<!--	<a href="<?php SITE_URL_PATH; ?>/hotels-in-kasauli.html">-->Hotels in Kasauli<!--</a>-->
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
					<link rel="shortcut icon" href="../images/50.png" type="image/x-icon" />
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
					<!-- bottom form -->
						<section class="p7px them_color2 sec7" >
							<div class="fram_width sec7_form">
								<ul class="">
									<li class="flot_lft width_300px"><span class="form_logo_text_color font_h1_size"><i class="fa fa-envelope-o"></i> &nbspGet Updates</span><span class="font_t2_size form_logo_text_color"> <br>Subscribe to perch Communications !</li>
									<li class=" flot_lft width_650px pdng_tp_7px">
										<form>
											<input type="text"  placeholder="Subscribe Newsletter">
											<button type="button" class="footer_bg_color buttons">SUBSCRIBE</button>
										</form>
									</li>
								</ul>
							</div>
						</section>
					<!-- ends here -->
					<section class="footer " id="animate3">
						<div class="overley"></div>	
						<div class="navLnkLst">
							<div class="ftrCntnt clear">
								<div class="propContnr2">
									<div class="prop">
										<h3 style="color: #fff;">QUICK LINKS</h3>
										<ul class="footerList">
											<li><a href="<?php SITE_URL_PATH; ?>/">Home</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/corporate-clients.html">Corporate Guest</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/japanese-guests.html">Japanese Guests</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/medical-tourists.html">Medical Tourist</a></li>
										</ul>
									</div>				
								</div>

								<div class="propContnr2">
									<div class="prop">
										<h3 style="color: #000;">.</h3>
										<ul class="footerList">
											<li><a href="#">Our Blog</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/our-clients.html">Our  Clients</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/book-now.html">Book Now</a></li>
											<li><a href="<?php SITE_URL_PATH; ?>/policies.html">Privacy Policies & Terms</a></li>
										</ul>
									</div>				
								</div>
								
								<div class="propContnr2">
									<div class="prop">
										<ul class="shareIcon share">
											<li><i style="padding: 5px 10px;" class="fa fa-facebook "></i></li>
											<li><i style="padding: 5px 8px;" class="fa fa-phone "></i></li>
											<li><i style="padding: 5px 7px;" class="fa fa-whatsapp "></i></li>
											<li><i style="padding: 5px 6px;" class="fa fa-envelope "></i></li>
										</ul>
									</div>				
								</div>
							</div>
						</div>
					</section>
				</body>
			</html>
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
							<span>The <span class="Hname"><b>Hotel</b></span></span>
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
						<img src="images/footer.jpg" class="img img-responsive" />	
						<div class="FootrOverley them_bg_trnprt"></div>
						
						<div class="footerCntnt" >
							<h3> Call Us +91-5894685794 </h3>
							<div class="FootrIcon">
								<ul>
									<li><a class="fIcon" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="fIcon" href="#" ><i class="fa fa-rss"></i></a></li>
									<li><a class="fIcon" href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a class="fIcon" href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						
							<span class="lnklst"><a href="#">Home</a>|<a href="#">Privacy & Policy</a>|<a href="#">Contact Us</a> </span>
							
							<p><i><small>Copyright © 2016 The lorem All rights reserved.</small></i></p>
						</div>
					</section>
				
					<!-- navBar code starts from here -->
					<div class="navOverley" scroll="false">
						<div id="mySidenav" class="sidenav offEffect">
							<a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="border:0;">&times;</a>
							<a href="<?php SITE_URL_PATH; ?>/"><i class="fa fa-home"></i>Home</a>
							<!--<a href="<?php SITE_URL_PATH; ?>/hotels-in-manali.html">--><i class="fa fa-location-arrow"></i>Hotels in Manali<!--</a>-->
						<!--	<a href="<?php SITE_URL_PATH; ?>/hotels-in-kasauli.html">--><i class="fa fa-location-arrow"></i>Hotels in Kasauli<!--</a>-->
							<a href=""><i class="fa fa-code"></i>About Us</a>
							<a href=""><i class="fa fa-vcard-o"></i>Contact Us</a>
						</div>	
					</div>
					<!-- Slider on over ley for property page  -->
				</body>
			</html>

<?php
		}
?>