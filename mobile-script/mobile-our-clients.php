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
			<img src="../images/keyBrd.jpg" />
			<div class="propTopOverley"></div>
			<div class="propTopContainr">
				<span class="boldQuote">Our-Clients</span>
			</div>
		</section>
		<br>
		
		<section class="propListCard gcard">
			<h2><?php echo $ourclient['h1']; ?></h2>
			<div class="btmBedg clear">
				<div class="btmBedgLft" style="width:100%;padding:10px;">
					<i class="fa fa-quote-left Hname"></i>
					<?php echo $ourclient['h1content']; ?>
					<i class="fa fa-quote-right Hname"></i>
				</div>								
			</div>
		</section>
	
		<!-- code for hide show links		 -->
		<section class="OurClnt gcard">
			<div class="OurClntDtl">
				<h3><?php echo $ourclient['divhead1']; ?><span class="pull-right"><i class="fa fa-chevron-down"></i></span></h3>
				<div  class="dn">
					<center><img src="images/<?php echo $ourclient['divimg1']; ?>" width="75%" height="180px"/></center>
					<p><?php echo $ourclient['divcontent1']; ?></p>
					<a href="corporate-clients.html" class="theme_text_color">read more..</a>
				</div>
			</div>
		</section>
		
		<section class="OurClnt gcard">
			<div class="OurClntDtl">
				<h3><?php echo $ourclient['divhead2']; ?><span class="pull-right"><i class="fa fa-chevron-down"></i></span></h3>
				<div  class="dn">
					<center><img src="images/<?php echo $ourclient['divimg2']; ?>" width="75%" height="180px"/></center>
					<p><?php echo $ourclient['divcontent2']; ?></p>
					<a href="japanese-guests.html" class="theme_text_color">read more..</a>
				</div>
			</div>
		</section>
		
		<section class="OurClnt gcard">
			<div class="OurClntDtl">
				<h3><?php echo $ourclient['divhead3']; ?><span class="pull-right"><i class="fa fa-chevron-down"></i></span></h3>
				<div  class="dn">
					<center><img src="images/<?php echo $ourclient['divimg3']; ?>" width="75%" height="180px"/></center>
					<p><?php echo $ourclient['divcontent3']; ?></p>
					<a href="medical-tourists.html" class="theme_text_color">read more..</a>
				</div>
			</div>
		</section>
		<!-- hide show ends here  -->

		<script>
			$('.OurClntDtl h3').click(function(){
			<!-- $(this).children().animate({'transform':'rotate(90deg)'}); -->
			$('.OurClntDtl h3').children().removeClass('rotate');
			$(this).children().toggleClass('rotate');
			$('.OurClntDtl h3').next().hide();
			$(this).next().slideToggle();
			});
		</script>	


<?php
	desktopFooterMobile();
	exit;
?>