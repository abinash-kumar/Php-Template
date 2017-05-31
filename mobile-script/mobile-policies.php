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
			<img src="../images/privacy.jpg" />
			<div class="propTopOverley"></div>
			<div class="propTopContainr">
				<span class="boldQuote">Our - Policies</span>
			</div>
		</section>
		
		<h1 class="txtCenter mrgnTop30">Policies @ The Perch</h1>
		<!-- code for hide show links		 -->
		<?php
			$sectioncount = 1;
			$sectionsel = "select * from static_page_policy where customerID='2' order by s_no asc";
			$sectionquery = mysql_query($sectionsel);
			while($sectionrow = mysql_fetch_array($sectionquery))
				{
		?>	
					<section class="OurClnt gcard">
						<div class="OurClntDtl">
							<h3><?php echo html_entity_decode($sectionrow['tab_heading']); ?><span class="pull-right"><i class="fa fa-chevron-down"></i></span></h3>
							<div  class="dn">
								<p><?php echo html_entity_decode($sectionrow['tab_content']); ?></p>
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