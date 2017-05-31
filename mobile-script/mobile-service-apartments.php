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
	$tableName = "city_url";
	$conditions = "customerID='2' and cityUrl='$filename' and status='Y'";
	$servdata = sqlqueryfetch($tableName,$conditions);
	$cityname = $servdata['cityName'];
	$prop_type = $servdata['property_type'];
	
	$tableName = "tbl_property_type";
	$conditions = "customerID='2' and type_name='$prop_type'";
	$sersel = sqlqueryfetch($tableName,$conditions);
	
	$aptid = $sersel['type_id'];
	
	
?>

		
		<section class="propTop clear">
			<img src="../mobile-script/images/headBg.jpg" />
			<div class="propTopOverley" style="background:rgba(255, 255, 255, 0.83);"></div>
			<div class="propTopContainr">
				<span class="propQoute" style="font-size: 22px;"><span class="boldQuote">Live there.</span>Book unique<br>hotels and experience the city 
				like a local.</span>
			</div>
		</section>
		
		<h1 class="txtCenter mrgnTop30"><?php echo $servdata['h1sa']; ?></h1>
		<section class="listContnr clear">			
			<?php
				$servpropsel = "select * from propertyTable where cityName='$cityname' and tbl_property_type='$aptid' and status='Y' order by propertyID asc";
				$servpropquery = mysql_query($servpropsel);
				while($servproprow = mysql_fetch_array($servpropquery))
					{
						$propid = $servproprow['propertyID'];
						$propimgsel = "select * from propertyImages where propertyID='$propid' and roomID='0' and imageType='property' and type='home' order by imagesID desc limit 1";
						$propimgquery = mysql_query($propimgsel);
						$propimgdata = mysql_fetch_array($propimgquery);
						$imgurl = $propimgdata['imageURL'];
						
						$address = $servproprow['address'].", ".$servproprow['subCity'].", ".$servproprow['cityName'].", ".$servproprow['state'].", ".$servproprow['country'];
			?>
						<section class="propListCard gcard">
							<img src="http://res.cloudinary.com/the-perch/image/upload/h_200,c_fill/reputize/property/<?php echo $imgurl; ?>.jpg" class="img img-responsive" />
							<div class="btmBedg clear">
								<div class="btmBedgLft">
									<Span class="propName"><?php echo $servproprow['propertyName']; ?></span><br>
									<span class="propAddr"><?php echo $address; ?></span><br>
									<span class="propAddr"><?php echo $servproprow['tagLine']; ?></span><br>
								</div>
								<div class="btmBedgRgt">
									<span class="starsRat">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</span><br>
									<?php
										$lowpricesel = "select roomPriceINR from propertyRoom where propertyID='$propid'  and status='Y' order by roomPriceINR asc limit 1";
										$lowpricequery = mysql_query($lowpricesel);
										$lowpricedata = mysql_fetch_array($lowpricequery);
									?>
									<span><small>Starting at</small></span>
									<p><i class="fa fa-inr"></i><?php echo $lowpricedata['roomPriceINR']; ?></p>
								</div>			
							</div>
							<div class="viewBtn">
								<a href="<?php SITE_URL_PATH; ?>/<?php echo $servproprow['propertyURL']; ?>.html" class="colorWhite">View Property</a>
							</div>
						</section>
			<?php
					}
			?>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/hammer.min.js"></script>
<?php
	desktopFooterMobile();
	exit;
?>