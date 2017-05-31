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
	$tableName = "static_page_clientmain";
	$conditions = "customerID='2'";
	$ourclient = sqlqueryfetch($tableName,$conditions);
?>

	<section class="contctTop clear">
		<div class="imgCtnrOurClints"></div>
		<div class="contctMsg">
			<span class="contctMsgHtxt">Our Clients</span>
		</div>
	</section>
	
	<section class="TextTwoSec fram_width clear">
		<div class="btmDsgn">
			<h2><b><?php echo $ourclient['h1']; ?></b></h2>
			<h5><span class="dsgn">#######</span></h5>
			
			<div class="OurClntTopPara"><?php echo $ourclient['h1content']; ?></div>			
		</div>
	</section><br>
	
	<section  class="AbtTxtCrd  clear">
		<div class="fram_width AbtTxtCrd">
			<?php
				if($ourclient['collapsehead1']!='')
					{
			?>
						<div class="AbttxtCard">
							<div class="H70">
								<h3 class="mrgn0"><?php echo $ourclient['collapsehead1']; ?></h3>
							</div>			
							<div class="Abttext"><?php echo $ourclient['collapsecont1']; ?></div>
						</div>
			<?php
					}
			?>
			
			<?php
				if($ourclient['collapsehead2']!='')
					{
			?>
						<div class="AbttxtCard">
							<div class="H70">
								<h3 class="mrgn0"><?php echo $ourclient['collapsehead2']; ?></h3>
							</div>			
							<div class="Abttext"><?php echo $ourclient['collapsecont2']; ?></div>		
						</div>
			<?php
					}
			?>
			
			<?php
				if($ourclient['collapsehead3']!='')
					{
			?>
						<div class="AbttxtCard">
							<div class="H70">
								<h3 class="mrgn0"><?php echo $ourclient['collapsehead3']; ?></h3>
							</div>				
							<div class="Abttext"><?php echo $ourclient['collapsecont3']; ?></div>		
						</div>
			<?php
					}
			?>
			
			<?php
				if($ourclient['collapsehead4']!='')
					{
			?>
						<div class="AbttxtCard">
							<div class="H70">
								<h3 class="mrgn0"><?php echo $ourclient['collapsehead4']; ?></h3>
							</div>				
							<div class="Abttext"><?php echo $ourclient['collapsecont4']; ?></div>		
						</div>
			<?php
					}
			?>
		</div>
	</section>
	
	<section class="abtOurTem fram_width clear">
		<h2><b><?php echo $ourclient['h2']; ?></b></h2>
		<h5><span class="dsgn">#######</span></h5>
	</section>
	
	<section class="abtOurTemCards fram_width clear">
		<div class="abtOurTemUser">
			<div class="innrCard txt_justyfy" style="margin: 30px;">
				<a href="corporate-clients.html"><center><img src="images/<?php echo $ourclient['divimg1']; ?>" /></center><a/>
				<a href="corporate-clients.html"><h3 class="txt_center"><?php echo $ourclient['divhead1']; ?></h3></a>
				<?php echo $ourclient['divcontent1']; ?>
			</div>
		</div>
		<div class="abtOurTemUser">
			<div class="innrCard txt_justyfy" style="margin: 30px;">
				<a href="japanese-guests.html"><center><img src="images/<?php echo $ourclient['divimg2']; ?>" /></center></a>
				<a href="japanese-guests.html"><h3 class="txt_center"><?php echo $ourclient['divhead2']; ?></h3></a>
				<?php echo $ourclient['divcontent2']; ?>
			</div>
		</div>
		<div class="abtOurTemUser">
			<div class="innrCard txt_justyfy" style="margin: 30px;">
				<a href="medical-tourists.html"><center><img src="images/<?php echo $ourclient['divimg3']; ?>" /></center></a>
				<a href="medical-tourists.html"><h3 class="txt_center"><?php echo $ourclient['divhead3']; ?></h3></a>
				<?php echo $ourclient['divcontent3']; ?>
			</div>
		</div>
	</section>

	<script>
		$('.myinputGrp > input,.myinputGrp > select,.myinputGrp > label').focus(function(){
			$(this).prev().css({'bottom':'20px','font-size':'12px','color':'#106cc8'},100);
			$(this).css({'border-color':'#106cc8','border-width': '2px'})
			$(this).blur(function(){
				if($(this).val()==''){
					$(this).prev().css({'bottom':'5px','font-size':'16px','color':'#a4a4a4'},100);
					$(this).css({'border-color':'#dd2c00','border-width': '1px'});					
				};
			});
		});
	</script>	
	<hr>
	
	<section class="aside">
		<div class="fram_width aside">
			<div class="BstTwoSec">
				<h3><b><?php echo $ourclient['sidedivheading']; ?></b></h3>
				<div class="propName">
					Perch Service Apartments, Gurgoan
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>
				
				<div class="propName">
					Perch Service Apartments, Gurgoan
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>
				
				<div class="propName">
					Perch Service Apartments, Gurgoan
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>			
			</div>
			
			<div class="BstTwoSec">
				<h3><b>Need help booking? Talk to us! </b></h3>
				<span class="contctNum">+917895846973</span><br>
				<p></p>
				
				<div class="submitBtn">
					<button type="submit" class="theme_bg_color buttons">Request Call You Back</button>
				</div>
			</div>
		</div>
	</section>
	<br><br>
	

	<?php
		desktopFooter();
	?>
	</body>
</html>