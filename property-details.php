<?php
	include "include/main-inc.php";
?>

<?php
	$selmeta = "select * from metaTags where filename='$filename'";
	$selmetaquery = mysql_query($selmeta);
	
	$metadata = mysql_fetch_array($selmetaquery);
	
	$ptitle=$metadata['MetaTitle'];
	
	$desc=$metadata['MetaDisc'];
	$kwords=$metadata['MetaKwd'];	
	$pageName=$filename;
	$canonicalurl= "http://www.theperch.in/".$filename.".html";
	$othercode=$metadata['othercode'];	
					
	desktopHeader($ptitle,$kwords,$desc,$pageName,$canonicalurl,$othercode);
?>

<?php
	$tableName = "propertyTable";
	$conditions = "propertyURL='$filename' && status='Y' and customerID='2'";
	$propdetdata = sqlqueryfetch($tableName,$conditions);
	$propid = $propdetdata['propertyID'];
	$propnam = $propdetdata['propertyName'];
	// echo $propnam;
	$bookingurl = $propdetdata['bookingURL'];
	
	$address = $propdetdata['address'].", ".$propdetdata['subCity'].", ".$propdetdata['cityName'].", &nbsp ".$propdetdata['state'].", &nbsp ".$propdetdata['country'];
?>

<?php
	$imgsel = "select * from propertyImages where propertyID='$propid' and 	featureStat='Y' and imageType='property' and type='home' order by imagesID desc limit 1";
	$imquery = mysql_query($imgsel);
	$imdata = mysql_fetch_array($imquery);
	$featureimg = $imdata['imageURL'];
?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slidesjs/3.0/jquery.slides.min.js"></script>
	<script>
		$(function() {
		  $('#slidesx').slidesjs({
			width: 940,
			height: 358,
		  });
		});
	</script>
	  
	<style>
		body
			{
				overflow:hidden;
			}
		input.ng-invalid {
		   box-shadow: inset 0px 4px 0px #f05454 ! important;
		}

		input.ng-valid {
			box-shadow: inset 0px 4px 0px #40bb44 ! important;
		}
		input.ng-untouched {
			box-shadow: inset 0px 4px 0px #acabab ! important;
		}

	</style>
	  
	
	<div id="spyDiv" data-spy="scroll" data-target="#scrlSpyNav" data-offset="0" style="position: absolute;overflow: scroll;height: 100%;width: 100%;">
		<section class="TopPropImg" ng-app="">
			<img src="http://res.cloudinary.com/the-perch/image/upload/w_1500,h_560,c_fill/reputize/property/<?php echo $featureimg; ?>.jpg" alt="<?php echo $featureimg; ?>" title="<?php echo $featureimg; ?>" width="100%" height="100%;">
			
			<a class="theme_bg_color proptyFltBtn" style="text-align:right;">
				<span ><i class="fa fa-ticket pull-left"></i>
				<small><small>&nbsp;Starts From</small></small><br>
				<?php
					$roomsel = "select * from propertyRoom where propertyID='$propid' and status='Y' and customerID='2' order by roomPriceINR asc limit 1";
					$roomquery = mysql_query($roomsel);
					$rownum = mysql_num_rows($roomquery);
					while($roomdata = mysql_fetch_array($roomquery))
						{
							$roomid = $roomdata['roomID'];
							$sliderroom .= $roomid.",";
							$org_roomprice = $roomdata['roomPriceINR'];
							$dailyroomdisc = $roomdata['dailyroomDiscount'];
							
					
							$datetoday1 = date('d');
							$datetoday1++;
							$datetoday = $datetoday1-1;
							
							$monthtoday = date('m');
							$yeartoday = date('Y');
							$priceshowsel = "select `$datetoday` from manage_rate where room_id='$roomid' and property_id='$propid' and month='$monthtoday' and year='$yeartoday'";
							// echo $priceshowsel;
							// die;
							$priceshowquery = mysql_query($priceshowsel);
							$priceshownum = mysql_num_rows($priceshowquery);
							$priceshowdata = mysql_fetch_array($priceshowquery);
							
							//------------------- Discount Calculation Starts -----------------------------------//
							$fororgprice = ($dailyroomdisc/100)*$org_roomprice;
							$fororgfinalprice = $org_roomprice-$fororgprice;
							
							$forinventoryprice = ($dailyroomdisc/100)*$priceshowdata[$datetoday];
							$forinventoryfinalprice = $priceshowdata[$datetoday]-$forinventoryprice;
							
							// echo $forinventoryfinalprice;
							
							if($priceshownum=="0" || $priceshowdata[$datetoday]==null)
								{
									echo '<del><i class="fa fa-inr rsIcn"></i> '.$org_roomprice.'</del>';
									echo ' <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="priceCurrency" content="INR">  <i class="fa fa-inr rsIcn" aria-hidden="true"></i> <span itemprop="price">'.$fororgfinalprice.' / night*</span></div>';
								}
							else
								{
									echo '<del><i class="fa fa-inr rsIcn"></i> '.$priceshowdata[$datetoday].'</del>';
									echo '<div itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="priceCurrency" content="INR">  <i class="fa fa-inr rsIcn" aria-hidden="true"></i> <span itemprop="price">'.$forinventoryfinalprice.' / night*</span></div>';
								}
						}
				?>
				
			</a>
			
			<div class="PropFrm">
				<div class="propFrmWrap">
					<form  name="myForm">
						<!--<ul>
							<li>
								<label>Check In <i class="fa fa-check clrGrn" ng-show="myForm.myName.$valid" ></i></label><br>
								<input type="text" placeholder="DD-MM-YYYY" class="" name="myName" ng-model="chck_In" required />
							</li>
							
							<li>
								<label>Check Out <i class="fa fa-check clrGrn" ng-show="myForm.chck_Out.$valid" ></i></label><br>
								<input type="text" placeholder="DD-MM-YYYY" name="chck_Out" ng-model="chck_Out" required/>
							</li>
						</ul>-->
						
						<label>Guest Name <i class="fa fa-check clrGrn" ng-show="myForm.gName.$valid" ></i></label><br>
						<input type="text" placeholder="Enter guest name"  class="txtLft" name="gName" ng-model="gName" required/>
						
						<label>Email <i class="fa fa-check clrGrn" ng-show="myForm.gEmail.$valid" ></i></label><br>
						<input type="email" placeholder="Enter email" class="txtLft" name="gEmail" ng-model="gEmail" required/>
						
						<label>Phone No <i class="fa fa-check clrGrn" ng-show="myForm.gPhone.$valid" ></i></label><br>
						<input type="text" placeholder="10 digit number" class="txtLft" name="gPhone" ng-model="gPhone" required/>					
						
						<input type="submit" name="submit" value="Request to book" ng-disabled="myForm.$invalid " />
					</form>
				</div>
			</div>
			<div class="viewPropPic" onClick="opnPropSlidr('propSliderOvrley');">View Photos</div>
		</section>
		
		<section class="fram_width addressSec">
			<h1 class="theme_txt_color"><?php echo $propdetdata['propertyName']; ?></h1>
			<span><?php echo $address; ?></span><br>
			<span><?php echo $propdetdata['propertyPhone']; ?></span>
		</section>

		<script>
			function opnPropSlidr(idOvrly){
			document.getElementById(idOvrly).style.height = "100%";
			}
			 
			function closPropSlidr() {
				$(".PropSlidr4Sngl").css({'height':0});
			}
		</script>
     
		
		<!-- Slider on over ley for property page  -->
      
		<div id="propSliderOvrley" class="PropSlidr4Sngl" >
			<a href="javascript:void(0)" class="closebtn4Sngl" onclick="closPropSlidr();" >&times;</a>
			
			<center>
				<div class="slider-content4Sngl">
					<div class="container4Sngl swipe">
						<div class="slider_wrapper4Sngl2">
							<ul id="slides" class="porpSldrLst" >
								<?php
									$propslidersel = "select * from propertyImages where propertyID='$propid' and roomID='0' and imageType='property' and type='home' order by imagesID desc";
									$propsliderquery = mysql_query($propslidersel);
									while($propsliderdata = mysql_fetch_array($propsliderquery))
										{
								?>
											<li><img itemprop="photo" src="http://res.cloudinary.com/the-perch/image/upload/w_800,h_475,c_fill/reputize/property/<?php echo $propsliderdata['imageURL']; ?>.jpg" alt="<?php echo $propsliderdata['imageAlt']; ?>" title="<?php echo $propsliderdata['imageAlt']; ?>"></li>
								<?php
										}
								?>					
							</ul>
						</div>
					</div>
				</div>
			</center>
		</div>

		<div class="forFix">
			<div style="background:#fff; width:100% ! important; height:80px;" class="clear stic">
				<nav class="featrLst stic fram_width  navbar-default" id='scrlSpyNav' style="box-shadow:none ! important;" >					
					<ul class="clear nav navbar-nav">
						<li class="flot_lft	theme_bg_color color_white dsplN" id="showMenu"><span class="fa fa-bars"></span></li>
						<li class="flot_lft featrLstCrd "><a href="#section1"><i class="fa fa-hotel"></i>Room Type</a></li>
						<li class="flot_lft featrLstCrd "><a href="#section2"><i class="fa fa-building-o"></i>Property Info</a></li>
						<li class="flot_lft featrLstCrd "><a href="#section3"><i class="fa fa-cutlery"></i>Amenities</a></li>
						<li class="flot_lft featrLstCrd "><a href="#section4"><i class="fa fa-map-marker"></i>Location</a></li>
						<li class="flot_lft featrLstCrd "><a href="#section5"><i class="fa fa-comment-o"></i>Reviews</a></li>
						<li class="flot_lft featrLstCrd "><a href="#section6"><i class="fa fa-volume-down"></i>Q & A</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<hr>	
	
		<div id='section1'>
			<div class="fram_width headTab">
				<span class="propHeding"><i class="fa fa-hotel"></i>Room Information</span>
			</div>
			<br>
		
			<section class="roomInfo fram_width">
				<table>
					<tr class='theme_bg_color'>
						<td></td>
						<td>Apartment Type</td>
						<td>Occupancy</td>
						<td>Price</td>
					</tr>
					
					<?php
						$count = 1;
						$sliderroom = '';
						$roomsel = "select * from propertyRoom where propertyID='$propid' and status='Y' and customerID='2'";
						$roomquery = mysql_query($roomsel);
						$rownum = mysql_num_rows($roomquery);
						while($roomdata = mysql_fetch_array($roomquery))
							{
								$roomid = $roomdata['roomID'];
								$sliderroom .= $roomid.",";
								$org_roomprice = $roomdata['roomPriceINR'];
								$dailyroomdisc = $roomdata['dailyroomDiscount'];
								$roomdispimgsel = "select * from propertyImages where roomID='$roomid' and propertyID='$propid' and imageType='room' order by imagesID desc limit 1";
								$roomdispimgquery = mysql_query($roomdispimgsel);
								$roomdispimgdata = mysql_fetch_array($roomdispimgquery);
								
								
								//------------------------ Rate Calculation -------------//
								
								/*$date_conc = '';
								for($i=0;$i<$diff;$i++)
									{
										$today = $checkin;
										$nextday = date("m/d/Y", strtotime("$today +$i day"));
										$date_br = explode("/",$nextday);
										
										$curdate = $date_br[1];
										$curdate++;
										$curdate_org = $curdate-1;
										$curmonth = $date_br[0];
										$curyear = $date_br[2];
										
										$datesel = "select `$curdate_org` from manage_rate where month='$curmonth' and year='$curyear' and property_id='$propid' and room_id='$roomid'";
										$datequery = mysql_query($datesel);
										$datedata = mysql_fetch_array($datequery);
										$datedata_org = $datedata[$curdate_org];
										if($datedata_org==null)
											{
												$currroomprice = $org_roomprice;
											}
										else
											{
												$currroomprice = $datedata_org;
											}
										$date_conc .= $currroomprice.",";
									}
								 // echo $date_conc;
								$selecteddate_br = explode(",",$date_conc);
								$selecteddaterate = array_sum($selecteddate_br);
								// echo $selecteddaterate;*/
											
							//------------------------ Rate Calculation -------------//			
									
								
					?>
								<tr>
									<td onclick="opnPropSlidr('propSliderOvrley<?php echo $count; ?>');">
										<img src="http://res.cloudinary.com/the-perch/image/upload/w_160,h_100,c_fill/reputize/room/<?php echo $roomdispimgdata['imageURL']; ?>.jpg" alt="<?php echo $roomdispimgdata['imageAlt']; ?>" title="<?php echo $roomdispimgdata['imageAlt']; ?>" width="150px" height="80px" />
									</td>
									
									<td>
										<?php echo $roomdata['roomType']; ?><br>
										<?php
											$amenity = $roomdata['roomAmenties'];
											$amenitybr = explode("^",$amenity);
											foreach($amenitybr as $amenities)
												{
													$iconsel = "select * from roomAmenties where roomAmenties_name='$amenities'";
													$iconquer = mysql_query($iconsel);
													$icondata = mysql_fetch_array($iconquer);
													$iconpath = $icondata['htmlCode'];
													$iconName = $icondata['roomAmenties_name'];
													if($iconpath=='')
														{}
													else
														{	
										?>
															<img src="images/icon/<?php echo $iconpath; ?>" alt="<?php echo $iconName; ?>" title="<?php echo $iconName; ?>"/>
										<?php
														}
												}
										?>				
									</td>
									
									<td>
										<?php
											$occupancy = $roomdata['occupancy'];
										?>
										<span itemprop="occupancy" itemscope itemtype="http://schema.org/QuantitativeValue"><meta itemprop="unitCode" content="C62"> <span itemprop="maxValue"> <p data-toggle="tooltip" data-placement="top" title="Maximum Occupancy <?php echo $occupancy;?>!"> </span></span>  
										<?php
											for($i=1;$i<=$occupancy;$i++)
												{
										?>
													<i class="fa fa-user"></i>
										<?php
												}
										?>
									</td>
									
									<td>
										<?php
											$datetoday1 = date('d');
											$datetoday1++;
											$datetoday = $datetoday1-1;
											
											$monthtoday = date('m');
											$yeartoday = date('Y');
											$priceshowsel = "select `$datetoday` from manage_rate where room_id='$roomid' and property_id='$propid' and month='$monthtoday' and year='$yeartoday'";
											// echo $priceshowsel;
											// die;
											$priceshowquery = mysql_query($priceshowsel);
											$priceshownum = mysql_num_rows($priceshowquery);
											$priceshowdata = mysql_fetch_array($priceshowquery);
											
											//------------------- Discount Calculation Starts -----------------------------------//
											$fororgprice = ($dailyroomdisc/100)*$org_roomprice;
											$fororgfinalprice = $org_roomprice-$fororgprice;
											
											$forinventoryprice = ($dailyroomdisc/100)*$priceshowdata[$datetoday];
											$forinventoryfinalprice = $priceshowdata[$datetoday]-$forinventoryprice;
											
											// echo $forinventoryfinalprice;
											
											if($priceshownum=="0" || $priceshowdata[$datetoday]==null)
												{
													echo '<del><i class="fa fa-inr" aria-hidden="true"></i> '.$org_roomprice.'</del><br><br>';
													echo ' <div itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="priceCurrency" content="INR">  <i class="fa fa-inr" aria-hidden="true"></i> <span itemprop="price">'.$fororgfinalprice.'</span></div>';
												}
											else
												{
													echo '<del>  <i class="fa fa-inr" aria-hidden="true"></i> '.$priceshowdata[$datetoday].'</del><br><br>';
													echo '<div itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="priceCurrency" content="INR">  <i class="fa fa-inr" aria-hidden="true"></i> <span itemprop="price">'.$forinventoryfinalprice.'</span></div>';
												}
										?>
									</td>
								</tr>
					<?php
								$count++;
							}
					?>				
				</table>				
			</section>
		</div>
	
		<!-- Slider on over ley for property page  -->
		
		<?php
			$roomcount = 1;
			$sliderroom_br = explode(",",$sliderroom);
			foreach($sliderroom_br as $roomslide)
				{
					if($roomslide=='')
						{}
					else
						{
		?>
							<div id="propSliderOvrley<?php echo $roomcount; ?>" class="PropSlidr4Sngl" >
								<a href="javascript:void(0)" class="closebtn4Sngl" onclick="closPropSlidr();" >&times;</a>
								<center>
									<div class="slider-content4Sngl">
										<div class="container4Sngl swipe">
											<div class="slider_wrapper4Sngl2">
												<ul id="slides<?php echo $roomcount; ?>" class="porpSldrLst" >
													<?php
														$roomslidersel = "select * from propertyImages where propertyID='$propid' and roomID='$roomslide' and imageType='room' and type='home' order by imagesID desc";
														$roomsliderquery = mysql_query($roomslidersel);
														while($roomsliderdata = mysql_fetch_array($roomsliderquery))
															{
													?>
																<li>
																   <img itemprop="photo" src="http://res.cloudinary.com/the-perch/image/upload/w_800,h_475,c_fill/reputize/room/<?php echo $roomsliderdata['imageURL']; ?>.jpg" alt="<?php echo $roomsliderdata['imageAlt']; ?>" title="<?php echo $roomsliderdata['imageAlt']; ?>" >
																</li>
													<?php
															}
													?>
												</ul>
												
												<?php
													$roomslidessel = "select * from propertyRoom where propertyID='$propid' and roomID='$roomslide' and status='Y'";
													$roomslidesquery = mysql_query($roomslidessel);
													$roomslidesdata = mysql_fetch_array($roomslidesquery);
												?>
												<div class="sliderBtm" id="paragrap">
													<h3 style="color:#202021 ! important;"><?php echo $roomslidesdata['roomType']; ?></h3>
													<h4>
														<?php
															$rooamenty = $roomslidesdata['roomAmenties'];
															$roomamnty_br = explode("^",$rooamenty);
															foreach($roomamnty_br as $roomamenitiesicn)
																{
																	$roomamenityiconsel = "select * from roomAmenties where roomAmenties_name='$roomamenitiesicn'";
																	$roomamenityiconquery = mysql_query($roomamenityiconsel);
																	while($roomamenityicondata = mysql_fetch_array($roomamenityiconquery))
																		{
																			$iconpath = $roomamenityicondata['htmlCode'];
																			$iconName = $roomamenityicondata['roomAmenties_name'];
																			if($iconpath=='')
																				{}
																			else
																				{	
														?>
																					<img src="images/icon/<?php echo $iconpath; ?>" alt="<?php echo $iconName; ?>" title="<?php echo $iconName; ?>"/>
														<?php
																				}
																		}
																}
														?>
													</h4>
													
													<font style="font-size: 14px !important;"><?php echo html_entity_decode($roomslidesdata['roomOverview']); ?></font>
												</div>
											</div>
										</div>
									</div>
								</center>
							</div>	
		<?php
						}
					$roomcount++;
				}
		?>
		<hr>	
		<?php
			$slideloop = "<script>
			$(function() {
			  $('#slides ";
			
			for($i=1;$i<=$roomcount;$i++)
				{
					$slideloop .= ", #slides".$i;
				}
			$slideloop .= "').slidesjs({
				width: 940,
				height: 528,
			  });
			});
			</script>";
			
			echo $slideloop;
		?>
		
		<div id='section2'>
			<div class="fram_width headTab">
				<span class="propHeding"><i class="fa fa-building-o"></i>Property Information</span>
			</div>
		
			<section class="propDetail fram_width">
				<div class="textLft flot_lft">
					<p><?php echo $propdetdata['propertyInfo']; ?></p>
				</div>
				
				<div class="vidSec flot_lft">
					<?php
						$video = $propdetdata['videoURL'];
						if($video=='')
							{}
						else
							{
					?>
								<center><iframe width="90%" height="auto" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe><center>
					<?php
							}
					?>
				</div>
			</section>
		</div>
		<hr>
	
		<div id='section3'>
			<div class="fram_width headTab" id="">
				<span class="propHeding"><i class="fa fa-cutlery black"></i>Service Apartments Amenities & Features</span>
			</div>
			
			<div class="amntisSec fram_width">
				<?php
					$propfeature = $propdetdata['propertyfeatures'];
					if($propfeature=='')
						{}
					else
						{
				?>
							<ul class="textList flot_lft">
								<li><b><i class="fa fa-building-o black"></i> Property Features</b></li>
								<li><?php echo $propdetdata['propertyfeatures']; ?></li>
							</ul>
				<?php
						}
				?>
				
				<?php
					$propservamenity = $propdetdata['servicesnamenities'];
					if($propservamenity=='')
						{}
					else
						{
				?>
							<ul class="textList flot_lft">
								<li><b><i class="fa fa-building-o black"></i> Services & Amenities</b></li>
								<li><?php echo $propservamenity; ?></li>
							</ul>
				<?php
						}
				?>
				
				<?php
					$propsecurity = $propdetdata['safetynsecurity'];
					if($propsecurity=='')
						{}
					else
						{
				?>
							<ul class="textList flot_lft">
								<li><b><i class="fa fa-building-o black"></i> Safety &amp; Security</b></li>
								<li><?php echo $propsecurity; ?></li>
							</ul>
				<?php
						}
				?>
				
				<?php
					$propinaptfacility = $propdetdata['inapartmentfacilities'];
					if($propinaptfacility=='')
						{}
					else
						{
				?>
							<ul class="textList flot_lft">
								<li><b><i class="fa fa-building-o black"></i> In-Apartment Facilities</b></li>
								<li><?php echo $propinaptfacility; ?></li>
							</ul>
				<?php
						}
				?>
			</div>
			
			<div class="amntisSec fram_width">
				<?php
					$propkitchen = $propdetdata['kitchenfeatures'];
					if($propkitchen=='')
						{}
					else
						{
				?>
							<ul class="textList flot_lft">
								<li><b><i class="fa fa-building-o black"></i>Kitchen Features</b></li>
								<li><?php echo $propkitchen; ?></li>
							</ul>
				<?php
						}
				?>
				
				<?php
					$propentertainment = $propdetdata['entertainmentleisure'];
					if($propentertainment=='')
						{}
					else
						{
				?>
							<ul class="textList flot_lft">
								<li><b><i class="fa fa-building-o black"></i> Entertainment &amp; Leisure</b></li>
								<li><?php echo $propentertainment; ?></li>
							</ul>
				<?php
						}
				?>
			
				<div class="chckTim flot_lft" style="border-right:1px solid #ccc;">
					<div class="clock flot_lft">
						<i class="fa fa-clock-o"></i>
					</div>
					<div class="clckDtl flot_lft">
						<p>Check In</p>
						<p>12:00 PM</p>
					</div>
				</div>
			
				<div class="chckTim flot_lft">
					<div class="clock flot_lft">
						<i class="fa fa-clock-o"></i>
					</div>
					
					<div class="clckDtl flot_lft">
						<p>Check Out</p>
						<p>11:00 AM</p>
					</div>
				</div>
			</div>
		</div>
		<hr>
	
		<div id='section4'>	
			<div class="fram_width headTab" id="">
				<span class="propHeding"><i class="fa fa-map-marker"></i> Location Advantages</span>
			</div>	
		
			<div class="locnSec fram_width">
				<?php
					$proplocationadvantage = $propdetdata['nearBy'];
					if($proplocationadvantage=='')
						{}
					else
						{
				?>
							<ul>
								<li><p><?php echo $proplocationadvantage; ?></p></li>
							</ul>
							<br>
				<?php
						}
				?>
				
				<iframe width="100%" height="300" frameborder="0" allowfullscreen="" itemprop="hasMap" src="<?php echo $propdetdata['gmapurl']; ?>"></iframe>
			</div>
		</div>
	
		<?php
			$qasel = "select * from quesAns where propertyID='$propid' && status='Y' order by quesID desc";
			$qaquery = mysql_query($qasel);
			$qanum = mysql_num_rows($qaquery);
			if($qanum=="0")
				{}
			else
				{
		?>
					<div class="bgDiv" id="section6"><br><br>
						<div class="fram_width headTab" >
							<span class="propHeding"><i class="fa  fa-question-circle-o"></i> Q & A</span>
						</div>
						
						<div class="qaContnr fram_width">
							<!-- question one	 -->
							<?php
								$countques = 1;
								while($qarow = mysql_fetch_array($qaquery))
									{
							?>
										<p class="questn <?php if($countques=="1"){ ?>qaActiv<?php } ?>">Q. <?php echo html_entity_decode($qarow['question']); ?> <i class="fa fa-plus pull-right"></i></p>
										
										<div class="ans <?php if($countques!="1"){ ?>dsplN<?php } ?>"><?php echo html_entity_decode($qarow['answer']); ?></div>
							<?php
										$countques++;
									}
							?>
						</div>
					</div>
		<?php
				}
		?>
		
		<section class="aside">
			<div class="fram_width aside">
				<div class="BstTwoSec">
					<h3><b>Our Best Offer</b></h3>
					
					<div class="propName">
						10% off on Daily Tariff
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<p>Avail on website</p>
					</div>
					
					<div class="propName">
						15% off on monthly Tariff
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>			
				</div>
				
				<div class="BstTwoSec">
					<h3><b>Need help booking? Talk to us! </b></h3>
					
					<span class="contctNum">+917895846973</span>
					<br>
					
					<p></p>
					
					<div class="submitBtn">
						<button type="submit" class="theme_bg_color buttons rqstBck" data-toggle="modal" data-target="#myModal">Request Call You Back</button>
					</div>
				</div>
			</div>
		</section>
		
		
		
		<center><div class="head"><br><h1 class="head">Similar Properties</h1></div>
			<div class="botm">
				<div class="RCircle flot_lft"></div>
				<hr class="hedingHr flot_lft">
				<div class="RCircle flot_rt"></div>
			</div>
		</center>
		<br>	
		
		<section class="fram_width twoSecCntnr clear" id="slidesx">
			<div>
				<?php
					$count=1;
					$similarpropsel = "select * from propertyTable where status='Y' order by propertyID asc";
					// echo $similarpropsel;
					// die;
					$similarpropquery = mysql_query($similarpropsel);
					$similarpropnum = mysql_num_rows($similarpropquery);
					while($similarpropdata = mysql_fetch_array($similarpropquery))
						{
							// echo "jhfeg";
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
									<a href="<?php SITE_URL_PATH; ?>/<?php echo $similarpropdata['propertyURL']; ?>.html"><div class="twoSec">
										<center>	
											<img src="http://res.cloudinary.com/the-perch/image/upload/w_560,h_350,c_fill/reputize/room/<?php echo $similarroomimgdata['imageURL']; ?>.jpg" alt="<?php echo $similarroomimgdata['imageAlt']; ?>" title="<?php echo $similarroomimgdata['imageAlt']; ?>" />
											
											<h3 class="titleHead"><?php echo strip_tags(trim(ucfirst(substr($similarpropdata['propertyName'], 0, 16))));?>...</h3>
											
											<a class="them_btn theme_bg_color pull-right prop2Btn" href="<?php SITE_URL_PATH; ?>/<?php echo $similarpropdata['propertyURL']; ?>.html"><span><i class="fa fa-bolt"></i>&nbsp;&nbsp;Vist this</span></a>
										</center>
									</div></a>
				<?php
								}
							if($count%2==0)
								{
									// if($count==$similarpropnum)
										// {}
									// else
										// {
											echo "</div><div>";
										// }
								}
							$count++;
							if($count>$similarpropnum)
								{
									break;
								}
						}
				?>
			</div>
		</section>
		<br>	
		
		<!-- overLey popup open for call request	 -->

		<div class="modal fade" id="myModal" role="dialog" style="overflow: hidden;">
			<div class="modal-dialog modal-sm" style="width: 400px;">
				<div class="modal-content">
					<div class="modal-header theme_bg_color ">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="modal-title requestHead"><b>Request Call You Back</b></h2>
					</div>
				   
					<div class="modal-body">
						<h4 class="theme_text_color" style="width:190px;margin-left:30px;"><b>Enter Number</b></h4>
						<input type="text" class="inpt_frmOvly" style="width:50px;margin-left:25px;display:inline;" placeholder="ISD"/>
						<input type="text" class="inpt_frmOvly" style="width:230px;margin-left:10px;" placeholder="10 digit mob number"/>
						<br>
					</div>
				  
					<div class="modal-footer txt_center">
						<a class="buttons theme_bg_color rqstBck" data-dismiss="modal">Request Call Back</a>
					</div>
				</div>
			</div>
		</div>
		<!-- modal ends here  -->
		<!-- ends here -->
	
	
	
		<script>
		
			var togleStats =1;
			 $("#dropForm").click(function() {		
				 if ($('.topDropForm').css('display')=='none'){
				 $('#spyDiv').animate({					
					 scrollTop: $("#spyDiv").offset().top
				 }, 700);
				 $('.topDropForm').delay(720).slideToggle();
				return false;
				}else{
					$('.topDropForm').hide();
				}
			 });
		</script>
		
		<script>
			$('#spyDiv').scroll(function() {    
				var scroll = $('#spyDiv').scrollTop();
				if (scroll >=650) {	
					if($('.topDropForm').css('display')=='block'){			
					$(".topDropForm").fadeOut();
					}			
				}
			});
		</script>
		
		<script>
			$('#spyDiv').scroll(function() {    
				var scroll = $('#spyDiv').scrollTop();

				 //>=, not <=
				if (scroll >=650) {
					$('.navbr').css({'display':'none'});
					$(".stic").addClass("feterListStickOn");
					$("#showMenu").show();
					$(".stic").css({'top':'0px'});
				}else{
					$("#showMenu").hide();
					$(".stic").removeClass("feterListStickOn");
					$('.navbr').css({'display':'block','top':'0px'});
				}
			});
		</script>

		<script>
			$('#showMenu').click(function(){
				$('.stic').css({'top':'0px','box-shadow':'none','border-bottom':'1px solid #eaeaea'});
				$('.navbr').css({'position':'fixed','display':'block','top':'80px'});
			});
		</script>	
		
		<script>
			$('.questn').click(function(){
				var allQues = $('.questn');
				var allAns = $('.ans');
				var NavIcon = $('.questn i');
				allQues.removeClass('qaActiv');
				NavIcon.removeClass('fa-minus','fa-plus');
				$(allAns).slideUp();
				var CurntP = $(this);
				$(CurntP).children().addClass('fa-minus');
				$(this).toggleClass('qaActiv');
				$(this).next().slideDown("slow");
				<!-- .removeClass('dsplN'); -->
			});
		</script>

		<?php
			desktopFooter();
		?>	
	</div>
</body>
</html>

	