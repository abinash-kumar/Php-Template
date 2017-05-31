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
	$canonicalurl= "http://www.theperch.in/";
	$othercode=$metadata['othercode'];	
				
	desktopHeaderMobile($ptitle,$kwords,$desc,$pageName,$canonicalurl,$othercode);
?>
<?php
	$tableName = "propertyTable";
	$conditions = "customerID='2' and propertyURL='$filename' and status='Y'";
	$propdata = sqlqueryfetch($tableName,$conditions);
	
	$propid = $propdata['propertyID'];
	$propnam = $propdata['propertyName'];
	$proplinkurl = $propdata['propertyURL'];
	$bookingurl = $propdata['bookingURL'];
?>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slidesjs/3.0/jquery.slides.min.js"></script>
		<script>
			$(function(){
			  $("#property_image_slider").slidesjs({
				width: 390,
				height: 250,
				   play: {
					 auto: true,
					 interval: 3000
				   }
			  });
			});
		</script>
		
		<section clear="clear">
			<div class="propDtilimgCntainr ">
				<div class="PrpDtlTopBdg clear">
					<div class="btmBedgLft">
						<h1 class="pDtlName"><?php echo $propdata['propertyName']; ?></h1>
						<!--<span class="propAddr">Plot 375, Opp Medanta Hospital, Medicity, </span>-->
					</div>
					<div class="btmBedgRgt" id="shareIcon">
						<i class="fa fa-share-alt pShar" aria-hidden="true" id="shareSlect"></i>
						<div class="sharOption">
							<div class="sharOptionRgd">
								<ul>
									<a href="tel:+91-880-046-1053"><li><i class="fa fa-phone" style="color:#309be3"></i>&nbsp;Call</li></a>
									<hr class="hrSep">
									<a href="mailto:marketing@theperch.in"><li><i class="fa fa-envelope" style="color:#01bc8a"></i>&nbsp;Email</li></a>
									<hr class="hrSep">
									<a href="whatsapp://send?text=Visit <?php echo $propnam; ?> at http://www.theperch.in/<?php echo $proplinkurl; ?>.html" data-action="share/whatsapp/share"><li><i class="fa fa-whatsapp" style="color:#5dc153"></i>&nbsp;Whatsapp</li></a>
									<hr class="hrSep">
									<a href="https://www.facebook.com/theperch.in" target="_blank"><li><i class="fa fa-facebook" style="color:#3b5a9b"></i>&nbsp;Facebook</li></a>
								</ul>
							</div>
						</div>
					</div>
				</div>	
				
				<section id="property_image_slider">
					<?php
						$propid = $propdata['propertyID'];
						$propimgsel = "select * from propertyImages where propertyID='$propid' and roomID='0' and imageType='property' and type='home' order by imagesID desc";
						$propimgquery = mysql_query($propimgsel);
						while($propimgdata = mysql_fetch_array($propimgquery))
							{
								$imgurl = $propimgdata['imageURL'];
					?>
								<img src="http://res.cloudinary.com/the-perch/image/upload/h_240,c_fill/reputize/property/<?php echo $imgurl; ?>.jpg" class="img img-responsive" />
					<?php
							}
					?>
					<!--<a href="#" class="PTag">1 bhk<span style="color:#e24030;font-weight:bold;">/</span>2 bhk</a>-->
				</section>
			</div>
			<div class="blok">
				<div class="propBtnCntinr">
					<div class="prop3BtnCntinrInner">
						<ul>
							<li><a class="topProp3Btn colorWhite" href="tel:+91-880-046-1053"><i class="fa fa-phone"></i>Call</a></li>
							<li><a class="topProp3Btn colorWhite" href="mailto:marketing@theperch.in" style="padding-left: 49px;padding-right: 25px;"><i class="fa fa-envelope"></i>Mail Us</a></li>
							<li><a class="topProp3Btn colorWhite" onclick="openNav2()"><i class="fa fa-hotel"></i>Book Now</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		
		
		<script>
			$('#shareSlect').on('click',function(){
				$('.sharOption').css({'height':'215px','width':'150px','-webkit-transition': 'width .1s,height .15s','font-size':'18px'});
			});
		</script>
		
		<script>
			$(document).mouseup(function(e){  
			var containr = $(".sharOption");
				if (!containr.is(e.target) && (containr.has(e.target).length === 0)){
					$('.sharOption').css({'height':'0px','width':'0px',	'-webkit-transition': 'width .6s,height .2s'});
				}
			});
		</script>		
				
		<script>
			$(window).scroll(function() {    
				var scroll = $(window).scrollTop();
				 //>=, not <=
				if (scroll >=399) {
					$(".propBtnCntinr").addClass("propBtnCntinrFix");
				}else{
					$(".propBtnCntinr").removeClass("propBtnCntinrFix");
				}
			});
		</script>
	
		<section class="aboutProprty gcard bxShdw">
			<h3 class="PropHdgap"><?php echo $propdata['propertyName']; ?></h3>
			<div class="colorPGrey  fixHeight"><?php echo $propdata['propertyInfo']; ?></div>
			<p class="moreBtn" onclick="$(this).prev().toggleClass('hAuto'); $('.aboutProprty').toggleClass('bxShdw'); $(this).html($(this).text() == '+ more' ? '- less' : '+ more');">+ more</p>
		</section>
		
		<?php
			$count = 1;
			$sliderroom = '';
			$rooms = $propdata['roomType'];
			$room_br = explode("^",$rooms);
			foreach($room_br as $room)
				{
					$roomsel = "select * from propertyRoom where propertyID='$propid' and roomType='$room'";
					$roomquery = mysql_query($roomsel);
					while($roomdata = mysql_fetch_array($roomquery))
						{
							$roomid = $roomdata['roomID'];
							$sliderroom .= $roomid.",";
							$roomsingleimg = "select * from propertyImages where propertyID='$propid' and roomID='$roomid' and imageType='room' and type='home' order by imagesID desc limit 1";
							$roomsingleimgquery = mysql_query($roomsingleimg);
							$roomsingleimgdata = mysql_fetch_array($roomsingleimgquery);
							$singleimgurl = $roomsingleimgdata['imageURL'];
		?>
							<div class="bhk clear" onclick="opnPropSlidr('propSliderOvrley<?php echo $count; ?>'); init('image_slider<?php echo $count; ?>','image_sliderWdth<?php echo $count; ?>','prev<?php echo $count; ?>','next<?php echo $count; ?>');" >
								<img src="http://res.cloudinary.com/the-perch/image/upload/w_480,h_310,c_fill/reputize/room/<?php echo $singleimgurl; ?>.jpg" class="img img-responsive"/>
								<div class="bhkContent">
									<p class="pDtlName"><?php echo $roomdata['roomType']; ?></p>
									<p class="bhkText" >Occupancy : <?php echo $roomdata['occupancy']; ?> </p>
									<p class="bhkText grnClor">FREE cancellation </p>
									<span class="bhkBtn"><i class="fa fa-inr thmclr"></i>&nbsp;<?php echo $roomdata['roomPriceINR']; ?></span>
								</div>
							</div>
		<?php
						}
					$count++;
				}
		?>
		
		<section class="aboutProprty gcard bxShdw">
			<h3 class="PropHdgap">Amenities & Features</h3>
			<div class="colorPGrey  fixHeight">
				<?php
					if($propdata['mobservicesnamenities']!='')
						{
				?>
							<h5 style="font-size:1.2em;font-weight:bold;">Amenities</h5>
							<?php echo $propdata['mobservicesnamenities']; ?><br>
				<?php
						}
				?>
				
				<?php
					if($propdata['mobpropertyfeatures']!='')
						{
				?>
							<h5 style="font-size:1.2em;font-weight:bold;">Features</h5>
							<?php echo $propdata['mobpropertyfeatures']; ?><br>
				<?php
						}
				?>
				
				<?php
					if($propdata['mobsafetynsecurity']!='')
						{
				?>
							<h5 style="font-size:1.2em;font-weight:bold;">Safety & Security</h5>
							<?php echo $propdata['mobsafetynsecurity']; ?><br>
				<?php
						}
				?>
				
				<?php
					if($propdata['mobinapartmentfacilities']!='')
						{
				?>
							<h5 style="font-size:1.2em;font-weight:bold;">In-Apartment Facilities</h5>
							<?php echo $propdata['mobinapartmentfacilities']; ?><br>
				<?php
						}
				?>
				
				<?php
					if($propdata['mobkitchenfeatures']!='')
						{
				?>
							<h5 style="font-size:1.2em;font-weight:bold;">Kitchen Features</h5>
							<?php echo $propdata['mobkitchenfeatures']; ?><br>
				<?php
						}
				?>
				
				<?php
					if($propdata['mobentertainmentleisure']!='')
						{
				?>
							<h5 style="font-size:1.2em;font-weight:bold;">Entertainment & Leisure</h5>
							<?php echo $propdata['mobentertainmentleisure']; ?><br>
				<?php
						}
				?>
			</div>
			<p class="moreBtn" onclick="$(this).prev().toggleClass('hAuto'); $('.aboutProprty').toggleClass('bxShdw'); $(this).html($(this).text() == '+ more' ? '- less' : '+ more');">+ more</p>
		</section>
		
		<!--<section class="aminites gcard">
			<h3 class="PropHdgap">Amenities</h3>
			<table>
				<tr>
					<td><i class="fa fa-check"></i>&nbsp;Gated Community</td>
					<td><i class="fa fa-times"></i>&nbsp;Safety card</td>
				</tr>
				<tr>
					<td><i class="fa fa-check"></i>&nbsp;Free Parking</td>
					<td><i class="fa fa-check"></i>&nbsp;Smoke detector</td>
				</tr>
				<tr>
					<td><i class="fa fa-check"></i>&nbsp;Kitchen & Chef</td>
					<td><i class="fa fa-check"></i>&nbsp;Laptop friendly space</td>
				</tr>
			</table>
		</section>	-->
		<section class="gcard"  id="qA">
			<h3 class="PropHdgap"> Q&A Suggested for you</h3>
			<br>
			
			
			<?php
				$qacount = 1;
				$qasel = "select * from quesAns where propertyID='$propid' and customerID='2'";
				// echo $qasel;
				// die;
				$qaquery = mysql_query($qasel);
				while($qarow = mysql_fetch_array($qaquery))
					{
			?>
						<!-- question start  -->
						<p onclick=''><i class="fa fa-file-text-o" ></i>&nbsp; <?php echo html_entity_decode($qarow['question']); ?><i class="fa fa-plus pull-right"></i></p>
						<span class="colorPGrey dn"><?php echo html_entity_decode($qarow['answer']); ?></span>
						<!-- question end  -->
			<?php
					}
			?>	
		</section>			
			<script>
				$('#qA p').click(function(){
				$(this).children().toggleClass('fa-plus fa-minus');
				$(this).next().slideToggle(100);
				});
			</script>		
		
		
		<!-- HTML code for new slider by jquery -->
		
		<h3 class="PropHdgap" style="padding-left:10px;"> Similar Property</h3>
		<div id="slider">
			<a href="javascript:;" class="control_next">></a>
			<a href="javascript:;" class="control_prev"><</a>
			<ul id="similer">
				<?php
					$count=1;
					$similarpropsel = "select * from propertyTable where status='Y' order by propertyID asc";
					$similarpropquery = mysql_query($similarpropsel);
					while($similarpropdata = mysql_fetch_array($similarpropquery))
						{
							$similarpropid = $similarpropdata['propertyID'];
							$similarroomsel = "select * from propertyRoom where propertyID='$similarpropid' and status='Y' order by roomPriceINR asc limit 1";
							$similarroomquery = mysql_query($similarroomsel);
							while($similarroomdata = mysql_fetch_array($similarroomquery))
								{
									$similarroomid = $similarroomdata['roomID'];
									$similarroomimgsel = "select * from propertyImages where propertyID='$similarpropid' and roomID='$similarroomid' and imageType='room' and type='home' order by imagesID desc limit 1";
									$similarroomimgquery = mysql_query($similarroomimgsel);
									$similarroomimgdata = mysql_fetch_array($similarroomimgquery);
				?>	
									<li>
										<a href="<?php SITE_URL_PATH; ?>/<?php echo $similarpropdata['propertyURL']; ?>.html">
											<div class="propListCard ">
												<img src="http://res.cloudinary.com/the-perch/image/upload/w_350,h_200,c_fill/reputize/room/<?php echo $similarroomimgdata['imageURL']; ?>.jpg" class="img img-responsive" />
												<div class="btmBedg clear">
													<div class="btmBedgLft">
														<Span class="propName"><?php echo strip_tags(trim(ucfirst(substr($similarpropdata['propertyName'], 0, 19)))); ?>.. </span><br>
														<span class="propAddr"><?php echo $similarpropdata['cityName']; ?></span><br>
													</div>
													
													<div class="btmBedgRgt">
														<span class="starsRat">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</span><br>
														<span><small>starting at</small></span>
														<p><i class="fa fa-inr"></i> <?php echo $similarroomdata['roomPriceINR']; ?></p>
													</div>			
												</div>
											</div>	
										</a>
									</li>
				<?php
								}
						}
				?>
			</ul>  
		</div>
 
 
		<?php
			$roomcount = 1;
			$sliderroom_br = explode(",",$sliderroom);
			foreach($sliderroom_br as $roomslide)
				{
					if($roomslide=='')
						{}
					else
						{
							$roomdatsel = "select * from propertyRoom where propertyID='$propid' and roomID='$roomslide' and customerID='2'";
							$roomdatquer = mysql_query($roomdatsel);
							$roomdat = mysql_fetch_array($roomdatquer);
		?>
							<!-- Slider on over ley for property page  -->
							<div id="propSliderOvrley<?php echo $roomcount; ?>" class="PropSlidr dn" >
								<a href="javascript:void(0)" class="closebtn" onclick="closPropSlidr();" ><i class="fa fa-chevron-left"></i></a>
								<center> 
									<div class="slider-content">
										<h4 class="padding12"><?php echo $roomdat['roomType']; ?></h4>
										<div class="container" id='swipe<?php echo $roomcount; ?>'>
											<div class="slider_wrapper" id='image_sliderWdth<?php echo $roomcount; ?>'>
												<ul id="image_slider<?php echo $roomcount; ?>" class="imagList" >
													<?php	
														$roomslidersel = "select * from propertyImages where propertyID='$propid' and roomID='$roomslide' and imageType='room' and type='home' order by imagesID desc";
														$roomsliderquery = mysql_query($roomslidersel);
														while($roomsliderdata = mysql_fetch_array($roomsliderquery))
															{	
													?>
																<li><img src="http://res.cloudinary.com/the-perch/image/upload/w_375,h_270,c_fill/reputize/room/<?php echo $roomsliderdata['imageURL']; ?>.jpg"></li>
													<?php
															}
													?>
												</ul>					
												<span class="nvgt nvgtleft" id="prev<?php echo $roomcount; ?>"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
												<span class="nvgt nvgtright" id="next<?php echo $roomcount; ?>"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
											</div>
										</div>
										<p class="colorPGrey padding12 mrgnBtm0"><?php echo html_entity_decode($roomdat['roomOverview']); ?></p>
										<p class="padding12 clrBlck mrgnBtm0"><b>Amenites</b></p>
										<p class="ovrLyIcn padding12">
											<?php
												$amenity = $roomdat['roomAmenties'];
												$amenity_br = explode("^",$amenity);
												foreach($amenity_br as $amenities)
													{
														$roomamenitysel = "select * from roomAmenties where roomAmenties_name='$amenities'";
														$roomamenityquery = mysql_query($roomamenitysel);
														while($roomamenitydata = mysql_fetch_array($roomamenityquery))
															{
																$iconpath = $roomamenitydata['htmlCode'];
																$iconName = $roomamenitydata['roomAmenties_name'];
											?>
																<img src="images/icon/<?php echo $iconpath; ?>" alt="<?php echo $iconName; ?>" title="<?php echo $iconName; ?>"/>
											<?php
															}
													}
											?>
										</p>
										<span class="padding12 grnClor">Book Now at <i class="fa fa-inr"></i><?php echo $roomdat['roomPriceINR']; ?></span><a href="#" class="bkNwBtn pull-right" style="color: #fff ! important">Book Now</a>
									</div>
								</center>
							</div>
							<!-- full map on overley for property page  -->	
		<?php
						}
					$roomcount++;
				}
		?>
		<div id="myNav2" class="overlay_4_frm" >
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav2();"><i class="fa fa-chevron-left"></i></a>
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
	</body>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/hammer.min.js"></script>
	
	<script>
			function openNav2() {
				// document.getElementById("myNav2").style.height = "100%";
						
				$('#myNav2').fadeIn(100);
			}
			function closeNav2() {
				// document.getElementById("myNav2").style.height = "0%";
				$('#myNav2').fadeOut(100);
			}
	</script>	

	<script>
		
	<!-- js for on top property image slider starts here   -->
	function opnPropSlidr(roomid){
	document.getElementById(roomid).style.display = "block";
	}
	function closPropSlidr() {
			$('.PropSlidr').fadeOut();
	}
		
		
	</script>
	<script>
	jQuery(document).ready(function ($) { 
		var slideCount = $('#slider ul li').length;
		var slideWidth = $('#slider ul li').width();
		var slideHeight = $('#slider ul li').height();
		var sliderUlWidth = slideCount * slideWidth;
		
		$('#slider').css({ width: slideWidth, height: slideHeight });
		
		$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
		
		$('#slider ul li:last-child').prependTo('#slider ul');
		function moveLeft() {
			$('#slider ul').animate({
				left: + slideWidth
			}, 200, function () {
				$('#slider ul li:last-child').prependTo('#slider ul');
				$('#slider ul').css('left', '');
			});
		};
		function moveRight() {
			$('#slider ul').animate({
				left: - slideWidth
			}, 200, function () {
				$('#slider ul li:first-child').appendTo('#slider ul');
				$('#slider ul').css('left', '');
			});
		};
		$('a.control_prev').click(function () {
			moveLeft();
		});
		$('a.control_next').click(function () {
			moveRight();
		});
		var myElement = document.getElementById('similer');
			// create a simple instance
			// by default, it only adds horizontal recognizers
			var mc = new Hammer(myElement);
			// listen to events...
			mc.on("swipeleft swiperight", function(ev) {
			if(ev.type =='swiperight'){
				moveLeft();
			}
			if(ev.type =='swipeleft'){
				moveRight();
			}	
		});	
		
	});    
	</script>
<script src="../mobile-script/js/customSlider.js" type="text/javascript"></script>
<?php
	desktopFooterMobile();
	exit;
?>