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
	$tableName = "static_page_clientsub";
	$conditions = "customerID='2'";
	$client = sqlqueryfetch($tableName,$conditions);
?>
	
		<section class="propTop clear">
			<img src="../mobile-script/images/headBg.jpg" />
			<div class="propTopOverley"></div>
			<div class="propTopContainr">
				<span class="boldQuote">Corporate - Clients</span>
			</div>
		</section>
		
		<h1 class="txtCenter mrgnTop30"><?php echo $client['client_h2']; ?></h1>
		<section class="propListCard gcard">
			<h2><?php echo $client['client_h2_subhead1']; ?></h2>
			<div class="btmBedg clear">
				<div class="btmBedgLft" style="width:100%;padding:10px;">
					<i class="fa fa-quote-left Hname"></i>	<?php echo $client['client_h2_subhead1_cont']; ?>	<i class="fa fa-quote-right Hname"></i>
				</div>								
			</div>
		</section>
			
		<section class="propListCard gcard">
			<h2><?php echo $client['client_h2_subhead2']; ?></h2>
			<div class="btmBedg clear">
				<div class="btmBedgLft" style="width:100%;padding:10px;">
					<i class="fa fa-quote-left Hname"></i> <?php echo $client['client_h2_subhead2_cont']; ?> <i class="fa fa-quote-right Hname"></i>
				</div>								
			</div>
			<ul class="twoCads">
				<?php
					$prosel = "select * from propertyTable where feature='Y' and status='Y' order by propertyID asc limit 2";
					$proquery = mysql_query($prosel);
					while($prodata = mysql_fetch_array($proquery))
						{
							$proid = $prodata['propertyID'];
							$proimgsel = "select * from propertyImages where propertyID='$proid' and imageType='property' and roomID='0' and type='home' order by imagesID desc";
							$proimgquer = mysql_query($proimgsel);
							$proimgdata = mysql_fetch_array($proimgquer);
							$proimgpath = $proimgdata['imageURL'];
							$proimgalt = $proimgdata['imageAlt'];
				?>
							<li>
								<img src="http://res.cloudinary.com/the-perch/image/upload/w_164,h_100,c_fill/reputize/property/<?php echo $proimgpath; ?>.jpg" height="150px">
								<h4><?php echo $prodata['propertyName']; ?></h4>
								<?php
									$clintsubrooms = $prodata['roomType']; 
									$clintsubroom_br = explode("^",$clintsubrooms);
									foreach($clintsubroom_br as $roomnam)
										{
											if($roomnam=='')
												{}
											else
												{
								?>
													<p><?php echo $roomnam; ?></p>
								<?php
												}
										}
								?>
							</li>
				<?php
						}
				?>						
			</ul>
		</section>			
			
		<?php
			if($client['client_h3']!='')
				{
		?>
					<h3 class="txtCenter mrgnTop30"><?php echo $client['client_h3']; ?></h3>		
					<center><embed width="350" class="yTube" height="215"  src="<?php echo $client['client_h3_video1']; ?>">
						<hr>
						<embed width="350" class="yTube" height="215" src="<?php echo $client['client_h3_video2']; ?>">
					</center>
		<?php
				}
		?>
<?php
	desktopFooterMobile();
	exit;
?>