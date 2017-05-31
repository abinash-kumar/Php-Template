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
				
	desktopHeaderMobile($ptitle,$kwords,$desc,$pageName,$canonicalurl,$othercode);
?>

<?php
	$tableName = "static_page_clientmain";
	$conditions = "customerID='2'";
	$ourclient = sqlqueryfetch($tableName,$conditions);
?>
		
		<section class="propTop clear">
			<img src="../images/Book-Now.jpg" />
			<div class="propTopOverley"></div>
			<div class="propTopContainr">
				<span class="boldQuote">Book-Now</span>
			</div>
		</section>
		<h1 class="txtCenter mrgnTop30">Service Apartments Tariff - Weekly & Monthly Discout</h1>
	
		<?php
			$propsel = "select * from propertyTable where status='Y' and feature='Y' and customerID='2'";
			$propquery = mysql_query($propsel);
			$numb = mysql_num_rows($propquery);
			while($propdata = mysql_fetch_array($propquery))
				{
					$propid = $propdata['propertyID']; 
					$roomtypes = $propdata['roomType'];
					$room_br = explode("^",$roomtypes)
		?>
					<div class="txtCenter gcard">
						<h4 class="pdng10 h3_txt_size theme_text_color"><b><?php echo $propdata['propertyName']; ?></b></h4>	
						<div class="padding_25 txtCenter">
							<?php
								foreach($room_br as $rooms)
									{
										$roomsel = "select * from propertyRoom where propertyID='$propid' and roomType='$rooms'";
										$roomquery = mysql_query($roomsel);
										while($roomdata = mysql_fetch_array($roomquery))
											{
												$firstlinetag = $rooms." @".$roomdata['roomPriceINR']."/ Night | Discount: ".$roomdata['weeklyroomDiscount']."% @Weekly / ".$roomdata['monthlyroomDiscount']."% @Monthly";
							?>
												<span class="para"><?php echo $firstlinetag; ?></span>		
							<?php
											}
									}
							?>
						</div>
					</div>	
					<hr>
		<?php
				}
		?>
	
<?php
	desktopFooterMobile();
	exit;
?>