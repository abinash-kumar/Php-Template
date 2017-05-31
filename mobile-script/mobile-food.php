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
	$tableName = "static_page_food";
	$conditions = "customerID='2' order by s_no asc limit 1";
	$food = sqlqueryfetch($tableName,$conditions);
?>
	
		<section class="propTop clear">
			<img src="../images/IMG_5109.jpg" />
			<div class="propTopOverley"></div>
			<div class="propTopContainr">
				<span class="boldQuote">Food-Beverages</span>
			</div>
		</section>
		<h1 class="txtCenter mrgnTop30">Food @ The Perch</h1>

		<section class="propListCard gcard">
			<h2><?php echo $food['h1']; ?></h2>
			<div class="btmBedg clear">
				<div class="btmBedgLft" style="width:100%;padding:10px;">
					<i class="fa fa-quote-left Hname"></i>
					<?php echo $food['subhead1']; ?>
					<i class="fa fa-quote-right Hname"></i>
				</div>								
			</div>
			
			<div class=" txtLft">
				<p class="pdpnglft mrgn5 blt"><b><?php echo $food['box1head']; ?></b></p>
				<div class="para db mrgn5 pdng0"><?php echo $food['box1content']; ?></div>
			</div>
			
			<div class=" txtLft">
				<p class="pdpnglft mrgn5 blt"><b><?php echo $food['box2head']; ?></b></p>
				<div class="para db mrgn5 pdng0"><?php echo $food['box2content']; ?></div>
			</div>
			
			<div class=" txtLft">
				<p class="pdpnglft mrgn5 blt"><b><?php echo $food['box3head']; ?></b></p>
				<div class="para db mrgn5 pdng0"><?php echo $food['box3content']; ?></div>
			</div>					
		</section>		
		
		<!-- code for hide show links		 -->
	
		<?php
			$qasel = "select * from static_page_food where customerID='2' order by s_no asc";
			$qaquery = mysql_query($qasel);
			while($qarow = mysql_fetch_array($qaquery))
				{
		?>
					<section class="OurClnt gcard">
						<div class="OurClntDtl">
							<h3><?php echo html_entity_decode($qarow['question']); ?><span class="pull-right"><i class="fa fa-chevron-down"></i></span></h3>
							<div  class="dn">
								<p><?php echo html_entity_decode($qarow['answer']); ?></p>
								 
							</div>
						</div>
					</section>
		<?php
				}
		?>

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