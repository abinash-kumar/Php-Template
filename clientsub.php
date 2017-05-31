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
	$pgurl = $filename;
	$tableName = "static_page_clientsub";
	$conditions = "customerID='2' and page_url='$pgurl'";
	$client = sqlqueryfetch($tableName,$conditions);
?>

	<section class="propTop" style="width:100% ! important">
		<img class="propTopImg" src="images/poptop.jpg" />
		<div class="topOverley"></div>
		<div class=" fram_width clear">
			<center class="clear">
				<ul class="topTxtUl clear" style="margin-top: 125px;">
					<li>
						<div class="propTxt">
							<i class="fa fa-clock-o"></i><br>
							<span>INSTANT BOOKING<span>
						</div>			
						<div class="txtCard">
						</div>
					</li>
			
					<li>
						<div class="propTxt">
							<i class="fa  fa-headphones"></i><br>
							<span>24H CUSTOMER SERVICE<span>
						</div>
						<div class="txtCard">
						</div>				
					</li>
			
					<li>
						<div class="propTxt">
							<i class="fa fa-thumbs-o-up"></i><br>
							<span>WE ARE EXPERTS<span>
						</div>	
						<div class="txtCard">
						</div>				
					</li>
				</ul>
			</center>
		</div>
	</section>
	
	<section class="TextTwoSec fram_width clear">
		<div class="btmDsgn">
			<h2><b><?php echo $client['client_h1']; ?></b></h2>
			<span><?php echo $client['client_h1_cont']; ?></span>		
		</div>
	</section><br>
	
	<section class="cardFxCntr">
		<div class="fram_width setComn">
			<div class='cardFx'>
				<div class="flipr">
					<div class="circle_icon theme_bg_color"> <i class="fa fa-thumbs-up fa_line_height"></i> </div>
					<div class="cardFxTxt">
						<p class="theme_text_color text_strach text_size_fa_card"><?php echo $client['client_box1']; ?></p>
						<p class="fa_card_text"><?php echo $client['client_box1_cont']; ?></p>
					</div>
				</div>
			</div>

			<div class='cardFx'>
				<div class="flipr">
					<div class="circle_icon theme_bg_color"> <i class="fa fa-map-marker fa_line_height"></i> </div>
					<div class="cardFxTxt">
						<p class="theme_text_color text_strach text_size_fa_card"><?php echo $client['client_box2']; ?></p>
						<p class="fa_card_text"><?php echo $client['client_box2_cont']; ?></p>
					</div>
				</div>
			</div>
				
			<div class='cardFx'>
				<div class="flipr">
					<div class="circle_icon theme_bg_color"> <i class="fa fa-map-marker fa_line_height"></i> </div>
					<div class="cardFxTxt">
						<p class="theme_text_color text_strach text_size_fa_card"><?php echo $client['client_box3']; ?></p>
						<p class="fa_card_text"><?php echo $client['client_box3_cont']; ?></p>
					</div>
				</div>
			</div>
				
			<div class='cardFx'>
				<div class="flipr">
					<div class="circle_icon theme_bg_color"> <i class="fa fa-cutlery  fa_line_height"></i> </div>
					<div class="cardFxTxt">
						<p class="theme_text_color text_strach text_size_fa_card"><?php echo $client['client_box4']; ?></p>
						<p class="fa_card_text"><?php echo $client['client_box4_cont']; ?></p>
					</div>
				</div>
			</div>						
		</div><br><br>
	</section>	
	
	<section class="TextTwoSec fram_width clear">
		<div class="btmDsgn">
			<h2><b><?php echo $client['client_h2']; ?></b></h2>
			<h5 style="margin-bottom:0;"></h5>		
		</div>
	</section>
	<section  class="AbtTxtCrd  clear">
		<div class="fram_width AbtTxtCrd">
			<div class="AbttxtCard" style="width:50%;">
			<div class="H70">
				<h3 class="mrgn0"><?php echo $client['client_h2_subhead1']; ?></h3>
			</div>
			<div  class="Abttext" style="padding-bottom: 40px;"><?php echo $client['client_h2_subhead1_cont']; ?></div>
			<div class="ClintBtnDiv">
				<a class="them_btn theme_bg_color" style="width: 250px;"><span><i class="fa fa-bolt" style="text-align:left;"></i>&nbsp;Request Call You Back</span></a>
			</div>
			<br>			
			</div>	
			
			<div class="AbttxtCard" style="width:50%;">
				<div class="H70">
					<h3 class="mrgn0"><?php echo $client['client_h2_subhead2']; ?></h3>
				</div>
				<div  class="Abttext"><?php echo $client['client_h2_subhead2_cont']; ?></div>
				<ul class="twoImgClint">
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
								<a href="<?php echo $prodata['propertyURL']; ?>.html"><li>
									<img src="http://res.cloudinary.com/the-perch/image/upload/w_256,h_144,c_fill/reputize/property/<?php echo $proimgpath; ?>.jpg" alt="<?php echo $proimgalt; ?>" class="img img-responsive">
									
									<div class="dtlSec">
										<b><p><?php echo $prodata['propertyName']; ?></p></b>
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
									</div>
								</li></a>
					<?php
							}
					?>
				</ul>
				<br>				
			</div>
		</div>
	</section>	
	
	<?php
		if($client['client_h3']!='')
			{
	?>
				<section class="TextTwoSec fram_width clear">
					<div class="btmDsgn">
						<h2><b><?php echo $client['client_h3']; ?></b></h2>
						<h5></h5>		
					</div>
				</section><br>	
				
				<section class="videoWrapper clear">
					<section class="video1">
						<embed width="490" height="315" src="<?php echo $client['client_h3_video1']; ?>">
					</section>
					<section class="video2">
						<embed width="490" height="315" src="<?php echo $client['client_h3_video2']; ?>">
					</section>
				</section>	
				<br><br>
	<?php
			}
	?>

	<?php
		desktopFooter();
	?>
	</body>
</html>