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
	// echo "fgbhf";
	$tableName = "static_page_whyperch";
	$conditions = "customerID='2'";
	$whyperch = sqlqueryfetch($tableName,$conditions);
?>
		
		<section class="propTop clear">
			<img src="../images/IMG_5108.jpg" />
			<div class="propTopOverley"></div>
			<div class="propTopContainr">
				<span class="boldQuote">Why-Us</span>
			</div>
		</section>
		
		<h1 class="txtCenter mrgnTop30"><?php echo $whyperch['h1']; ?> </h1>
		<section class="propListCard gcard">
			<h2><?php echo $whyperch['h2']; ?></h2>
			<div class="btmBedg clear">
				<div class="btmBedgLft" style="width:100%;padding:10px;">
					<i class="fa fa-quote-left Hname"></i><?php echo $whyperch['subhead2']; ?><i class="fa fa-quote-right Hname"></i>
				</div>								
			</div>
		</section>
			
			
	
		<!-- code for hide show links		 -->
		<?php
			$iconcount = 1;
			$iconcount2 = 0;
			for($i=1;$i<=6;$i++)
				{
					$bxicon = "box".$iconcount."_icon";
					$bxhead = "box".$iconcount."_head";
					$bxcont = "box".$iconcount."_content";
					if($whyperch[$bxicon]=='')
						{}
					else
						{
							$iconcount2++;
							$bxic1 = html_entity_decode($whyperch[$bxicon]);
		?>	
							<section class="OurClnt gcard">
								<div class="OurClntDtl">
									<h3><?php echo $whyperch[$bxhead]; ?><span class="pull-right"><i class="fa fa-chevron-down"></i></span></h3>
									<div  class="dn" style="color:grey;">
										<p style="font-size:18px !important;"><?php echo $whyperch[$bxcont]; ?></p>
									</div>
								</div>
							</section>
		<?php
						}
					$iconcount++;
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