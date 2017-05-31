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
		<div class="imgCtnrFood2"></div>
		<div class="contctMsg">
			<span class="contctMsgHtxt">Privacy Policies</span>
		</div>
	</section>
	
	<section class="TextTwoSec fram_width clear">
		<div class="btmDsgn">
			<h2><b>Privacy Policies and Terms</b></h2>
			<h5 style="margin-bottom:0;"></h5>				
		</div>
	</section>
	
	<div class="bgDiv" id="section6">
		<div class="qaContnr fram_width">
	
			<!-- question one	 -->
			
			<?php
				$tabcount = 1;
				$sectionsel = "select * from static_page_policy where customerID='2' order by s_no asc";
				$sectionquery = mysql_query($sectionsel);
				while($sectionrow = mysql_fetch_array($sectionquery))
					{
						if($tabcount==1)
							{
			?>	
								<p class="questn qaActiv"><?php echo html_entity_decode($sectionrow['tab_heading']); ?><i class="fa fa-plus pull-right"></i></p>
			
								<div class="ans"><?php echo html_entity_decode($sectionrow['tab_content']); ?></div>	
			<?php
							}
						else
							{
			?>
								<p class="questn"><?php echo html_entity_decode($sectionrow['tab_heading']); ?><i class="fa fa-plus pull-right"></i></p>
			
								<div class="ans dsplN"><?php echo html_entity_decode($sectionrow['tab_content']); ?></div>
			<?php
							}
						$tabcount++;
					}
			?>
		</div>
	</div>
	<br>
	
	<script>
	
		$('.questn').click(function(){
			var allQues = $('.questn');
			var allAns = $('.ans');
			var NavIcon = $('.questn i');
			allQues.removeClass('qaActiv');
			NavIcon.removeClass('fa-minus','fa-plus');
			$(allAns).slideUp();
			var CurntP = $(this);
			$(CurntP).children().addClass('fa-minus');
			$(this).toggleClass('qaActiv');
			$(this).next().slideDown("slow");
			<!-- .removeClass('dsplN'); -->
		});
	
	</script>
	<!-- question two  -->
	
	<?php
		desktopFooter();
	?>
	</body>
</html>