<?php
	include "include/main-inc.php";
?>

<?php
	$selmeta = "select * from metaTags where filename='resorts-in-manali'";
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
	$tableName = "city_url";
	$conditions = "cityUrl='resorts-in-manali' && status='Y' and customerID='2'";
	$servaptdata = sqlqueryfetch($tableName,$conditions);
	$cityname = $servaptdata['cityName'];
	$typ_nam = $servaptdata['property_type'];
	$hotel_typesel = "select * from tbl_property_type where type_name='$typ_nam'";
	$hotel_typquer = mysql_query($hotel_typesel);
	$hotel_typdat = mysql_fetch_array($hotel_typquer);
	
	$hotel_typ_id = $hotel_typdat['type_id'];
?>
	<script src="js/animateProprtyPage.js"></script>
	
	<section class="propTop" style="width:100% ! important">
		<img class="propTopImg" src="images/poptop.jpg" />
		<div class="topOverley"></div>
		<h1 class="Propheading"><?php echo $servaptdata['h1sa'];  ?><h1>
	
		<div class=" fram_width clear">
			<center class="clear">
				<ul class="topTxtUl clear" >
					<li>
						<div class="propTxt">
							<i class="fa fa-clock-o"></i><br>
							<span><?php echo $servaptdata['samainhead1']; ?><span>
						</div>			
						<div class="txtCard"></div>
					</li>
					
					<li>
						<div class="propTxt">
							<i class="fa  fa-headphones"></i><br>
							<span><?php echo $servaptdata['samainhead2']; ?><span>
						</div>
						<div class="txtCard"></div>				
					</li>
					
					<li>
						<div class="propTxt">
							<i class="fa fa-thumbs-o-up"></i><br>
							<span><?php echo $servaptdata['samainhead3']; ?><span>
						</div>	
						<div class="txtCard"></div>				
					</li>
				</ul>
			</center>
		</div>
	</section>
	
	<section class="fram_width" id="animate4">
		<ul class="propAminities clear">
			<li>
				<div>
					<div class="amnityFa"><i class="fa fa-phone"></i></div>
					<div class="amnityPara">
						<span class="paraHead"><?php echo $servaptdata['sasubhead1']; ?></span>
						<br>
						<div class="200pwdth"><?php echo $servaptdata['sasubheadcontent1']; ?></div>
					</div>
				</div>
			</li>
			
			<li>
				<div>
					<div class="amnityFa"><i class="fa fa-map-marker"></i></div>
					<div class="amnityPara">
						<span class="paraHead"><?php echo $servaptdata['sasubhead2']; ?></span>
						<br>
						<div class="200pwdth"><?php echo $servaptdata['sasubheadcontent2']; ?></div>
					</div>
				</div>
			</li>
		
			<li>
				<div>
					<div class="amnityFa"><i class="fa fa-cutlery"></i></div>
					<div class="amnityPara">
						<span class="paraHead"><?php echo $servaptdata['sasubhead3']; ?></span>
						<br>
						<div class="200pwdth"><?php echo $servaptdata['sasubheadcontent3']; ?></div>
					</div>
				</div>
			</li>
			
			<li>
				<div>
					<div class="amnityFa"><i class="fa fa-building-o"></i></div>
					<div class="amnityPara">
						<span class="paraHead"><?php echo $servaptdata['sasubhead4']; ?></span>
						<br>
						<div class="200pwdth"><?php echo $servaptdata['sasubheadcontent4']; ?></div>
					</div>
				</div>
			</li>		
		</ul>
	</section>
	<hr>
	
	<section class="heading" id="animate5"><br>
		<center>
			<div class="head"><h2 class="head"><?php echo $servaptdata['h2sa']; ?></h2></div>
			<div class="botm">
				<div class="RCircle flot_lft"></div>
				<hr class="hedingHr flot_lft">
				<div class="RCircle flot_rt"></div>
			</div>
		</center><br>
	</section>
	
	<section class="fram_width" >
		<?php
			// echo $cityname;
			$propsel = "select * from propertyTable where customerID='2' and cityName='$cityname' and status='Y' and tbl_property_type='$hotel_typ_id' order by propertyID asc";
			$propquery = mysql_query($propsel);
			while($propdata = mysql_fetch_array($propquery))
				{
					$propid = $propdata['propertyID'];
					$propimgsel = "select * from propertyImages where propertyID='$propid' and imageType='property' order by imagesID desc limit 1";
					$propimgquery = mysql_query($propimgsel);
					$propimgdata = mysql_fetch_array($propimgquery);
					
					$address = $propdata['address'].",".$propdata['subCity'].",".$propdata['cityName'].",".$propdata['state'].",".$propdata['country'];
					$rooms = $propdata['roomType'];
					$amenity = $propdata['roomAmenties'];
		?>
					<div class="propList">
						<div class="listDiv clear">
							<div class="toAnimate dn">
								<img class="listImg flot_lft"  src="http://res.cloudinary.com/the-perch/image/upload/w_383,h_250,c_fill/reputize/property/<?php echo $propimgdata['imageURL']; ?>.jpg" />
								<div class="imgCover"></div>
								
								<div class="listContent flot_lft">
									<h3><?php echo $propdata['propertyName']; ?></h3>
									<p><small><?php echo $address; ?></small></p>
								
									<p>
										<?php 
											$roombr = explode("^",$rooms);
											foreach($roombr as $roomdata)
												{
													if($roomdata=='')
														{}
													else
													{	
														echo $roomdata." &nbsp | ";
													}
												}
										?>
									</p>
								
									<p>
										<?php
											$amenitybr = explode("^",$amenity);
											foreach($amenitybr as $amenities)
												{
													$iconsel = "select * from roomAmenties where roomAmenties_name='$amenities'";
													$iconquer = mysql_query($iconsel);
													$icondata = mysql_fetch_array($iconquer);
													$iconpath = $icondata['htmlCode'];
													if($iconpath=='')
														{}
													else
														{	
										?>
															<img src="images/icon/<?php echo $iconpath; ?>" alt="<?php echo $icondata['roomAmenties_name']; ?>" title="<?php echo $icondata['roomAmenties_name']; ?>" />
										<?php
														}
												}
										?>
									</p><br><br>
								
									<div class="imgDiv">
										<table>
											<tr>
												<?php
													$propimgselshow = "select * from propertyImages where propertyID='$propid' and imageType='property' order by imagesID desc limit 4";
													$propimgqueryshow = mysql_query($propimgselshow);
													while($propimgdatashow = mysql_fetch_array($propimgqueryshow))
														{
												?>
															<td><img src="http://res.cloudinary.com/the-perch/image/upload/w_132,h_90,c_fill/reputize/property/<?php echo $propimgdatashow['imageURL']; ?>.jpg" class="" width="112px" height="60px"/></td>
												<?php
														}
												?>						
											</tr>
										</table>
									</div>
								</div>
								
								<div class="btndiv flot_lft">
									<div class="btnWrpr">
										<a href="<?php SITE_URL_PATH; ?>/<?php echo $propdata['propertyURL'];?>.html"><div class="listBtn theme_bg_color">Book Now</div></a>
										<p class="pull-right" style="border-bottom: 1px solid;color:green;"><small>Free Cancellation&nbsp;&nbsp;</small></p><br>
										<!--<p class="pull-right" style="border-bottom: 1px solid;"><small><i class="fa fa-inr"></i>&nbsp; 3000</small></p>-->
									</div>						
								</div>
							</div>
						</div>
					</div>	
		<?php
				}
		?>
	</section>
	<hr>
	
	<center>
		<div class="head"><h2 class="head" id="animate2"><?php echo $servaptdata['h3sa']; ?></h2></div>
		
		<div class="botm">
			<div class="RCircle flot_lft"></div>
			<hr class="hedingHr flot_lft">
			<div class="RCircle flot_rt"></div>
		</div>
	</center><br>
	
	<section class="fram_width relatve animat2 clear" >
		<div class="awardSecLft flot_lft">
			<div class="awrdRapDiv">
				<div class="certftDiv mydiv">
					<table>
						<tr>
							<td height="190px;" class="bgGrey"><?php echo $servaptdata['saimage1Name']; ?></td>
							<td height="190px;"><img class="" src="upload-images/<?php echo $servaptdata['saimage1']; ?>"  height="190px;" width="100%" /></td>						
						</tr>
						
						<tr>
							<td  height="190px;"><img class="" src="upload-images/<?php echo $servaptdata['saimage2']; ?>" height="190px;" width="100%" /></td>
							<td height="190px;" class=""><strong style="color:#000;"><?php echo $servaptdata['saimage2Name']; ?></span></td>			
						</tr>	
						
						<tr>
							<td height="190px;" class="bgGrey"><strong style="color:#000;"><?php echo $servaptdata['saimage3Name']; ?></span></td>
							<td height="190px;"><img class="" src="upload-images/<?php echo $servaptdata['saimage3']; ?>"  height="190px;" width="100%" /></td>						
						</tr>					
					</table>
				</div>
			</div>
		</div>	
		
		<div class="awardSecRt flot_lft">
			<div class="clear">
				<span><span class="awrd1head" style="color:#000;"><?php echo $servaptdata['saawardhead']; ?></span><br>
				
				<div class="paraDiv">
					<span style="color: #5f5f5f;" class="awrdPara">
						<?php echo $servaptdata['saawardcontent']; ?>
					</span><br>
					
					<strong style="color: #000;">
						<?php echo $servaptdata['savideocontent']; ?>
					</strong>
				</div><br>
				
				<?php
					if($servaptdata['savideourl']!='')
						{
				?>
							<iframe width="380" class="bdr p5px shdw" height="250" src="<?php echo $servaptdata['savideourl']; ?>" frameborder="0" allowfullscreen="" onclick="ga('send', 'event', { eventCategory: 'VideoPlay', eventAction: 'YouTubeServiceApartment', eventLabel: 'http://www.reputize.in/resorts-in-kasauli.html'});"></iframe>
				<?php
						}
				?>
			</div>	
		</div>
	</section>
	
	<hr>
	<section class="heading" id="animate5"><br>
		<center>
			<div class="head"><h2 class="head"><?php echo $servaptdata['sacontentheading']; ?></h2></div>
			<div class="botm">
				<div class="RCircle flot_lft"></div>
				<hr class="hedingHr flot_lft">
				<div class="RCircle flot_rt"></div>
			</div>
		</center><br>
	</section>
	
	<section class="fram_width" >
		<?php echo $servaptdata['sacontent']; ?>
	</section>
	<br><br><br><br>
	
	<?php
		desktopFooter();
	?>
	</body>
</html>