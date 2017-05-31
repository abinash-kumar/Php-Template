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


	<section class="contctTop clear">
		<div class="imgBokNow"></div>
		<div class="contctMsg">
			<span class="contctMsgHtxt">Book-Now</span>
		</div>
	</section>
	
	<section class="TextTwoSec fram_width clear">
		<div class="btmDsgn">
			<h2><b>Self Cooking, Room Service and Chefs at the Perch</b></h2>
			<span>There are several dining options at our service apartments & guest houses. The quality of our food is comparable to good restaurants in Gurgaon and Delhi</span>		
		</div>
	</section><br>

	<section class="cardFxCntr">
		<div class="fram_width setComn">
			<div class='cardFx'>
				<div class="flipr">
					<div class="circle_icon theme_bg_color"> <i class="fa fa-thumbs-up fa_line_height"></i> </div>
					<div class="cardFxTxt">
						<p class="theme_text_color text_strach text_size_fa_card">Multiple Locations </p>
						<p class="fa_card_text">HUDA Metro, Golf Course Road, Near Medanta, Sohna Road, Unitech Cyber Park</p>
					</div>
				</div>
			</div>

			<div class='cardFx'>
				<div class="flipr">
					<div class="circle_icon theme_bg_color"> <i class="fa fa-map-marker fa_line_height"></i> </div>
					<div class="cardFxTxt">
						<p class="theme_text_color text_strach text_size_fa_card">Family Apartments </p>
						<p class="fa_card_text">3 Bedroom Apartments with Living ,Dining, Balcony and Kitchen</p>
					</div>
				</div>
			</div>
				
			<div class='cardFx'>
				<div class="flipr">
					<div class="circle_icon theme_bg_color"> <i class="fa fa-cutlery  fa_line_height"></i> </div>
					<div class="cardFxTxt">
						<p class="theme_text_color text_strach text_size_fa_card">Studio Apartments</p>
						<p class="fa_card_text">Studio Apartments on Sohna Road for rent Great long term deals</p>
					</div>
				</div>
			</div>						
		</div>
		<br><br>
	</section>	
	
	<section class="TextTwoSec fram_width clear">
		<div class="btmDsgn">
			<h2><b>Cooking & Food Options at our Properties</b></h2>
			<span>Looking for the best luxury Guest houses in Gurgaon or close to Delhi? Our properties in Gurgaon have different sized rooms & suites, suitable for.</span>
			<h5 style="margin-bottom:0;"></h5>		
		</div>
	</section>
	
	<section  class="AbtTxtCrd  clear">
		<div class="fram_width AbtTxtCrd">
			<?php
				$bookcnt = 1;
				$propsel = "select * from propertyTable where customerID='2' and status='Y' and feature='Y'";
				$propquery = mysql_query($propsel);
				$numb = mysql_num_rows($propquery);
				while($propdata = mysql_fetch_array($propquery))
					{
						$propid = $propdata['propertyID']; 
						$propimgsel = "select * from propertyImages where propertyID='$propid' and imageType='property' order by imagesID desc limit 1";
						$propimgquery = mysql_query($propimgsel);
						$propimgdata = mysql_fetch_array($propimgquery);
						
						$roomtypes = $propdata['roomType'];
						$room_br = explode("^",$roomtypes)
			?>
						<div class="AbttxtCard" style="width:50%;">
							<div class="H70">
								<h3 class="mrgn0"><?php echo $propdata['propertyName'].", ".$propdata['cityName']; ?></h3>
							</div>
							
							<img src="http://res.cloudinary.com/the-perch/image/upload/w_552,h_300,c_fill/reputize/property/<?php echo $propimgdata['imageURL']; ?>.jpg" class="img img-responsive" style="height:300px;width:100%" alt="<?php echo $propimgdata['imageURL']; ?>">
							
							<div class="Abttext">
								<?php
									foreach($room_br as $rooms)
										{
											$roomsel = "select * from propertyRoom where customerID='2' and propertyID='$propid' and roomType='$rooms'";
											$roomquery = mysql_query($roomsel);
											while($roomdata = mysql_fetch_array($roomquery))
												{
													$firstlinetag = $rooms." @".$roomdata['roomPriceINR']."/ Night | Discount: ".$roomdata['weeklyroomDiscount']."% @Weekly / ".$roomdata['monthlyroomDiscount']."% @Monthly";
								?>
													<div class="bkpara"><?php echo $firstlinetag; ?></div>
								<?php
												}
										}
								?>			
							</div>
							
							<div class="txt_center">
								<a class="them_btn theme_bg_color propBtn" href="<?php SITE_URL_PATH; ?>/<?php echo $propdata['propertyURL'];?>.html"><span><i class="fa fa-bolt" style="text-align:left;"></i>&nbsp;visit</span></a>
							</div>
							<br>			
						</div>	
			<?php
						if($bookcnt%2=='0')
							{
								if($bookcnt==$numb)
									{}
								else
									{
										echo '</div></section><section  class="AbtTxtCrd  clear"><div class="fram_width AbtTxtCrd">';
									}
							}
						$bookcnt++;
					}
			?>
		</div>
	</section>	
	<br>


	<?php
		desktopFooter();
	?>
	</body>
</html>