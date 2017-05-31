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
	$tableName = "static_page_whyperch";
	$conditions = "customerID='2'";
	$whyperch = sqlqueryfetch($tableName,$conditions);
?>

	<section class="contctTop clear">
		<div class="imgCtnrFood1"></div>
		<div class="contctMsg">
			<span class="contctMsgHtxt">Why - Us</span>
		</div>
	</section>
	
	<section class="TextTwoSec fram_width clear">
		<div class="btmDsgn">
			<h2><b><?php echo $whyperch['h1']; ?></b></h2>		
		</div>
	</section><br>

	<section class="cardFxCntr">
		<div class="fram_width setComn">
			<?php
				$iconcount = 1;
				$iconcount2 = 0;
				for($i=1;$i<=6;$i++)
					{
						$bxicon = "box".$iconcount."_icon";
						$bxhead = "box".$iconcount."_head";
						$bxcont = "box".$iconcount."_content";
						if($whyperch[$bxicon]=='')
							{
								
							}
						else
							{
								$iconcount2++;
								$bxic1 = html_entity_decode($whyperch[$bxicon]);
			?>
								<div class='cardFx'>
									<div class="flipr">
										<div class="circle_icon theme_bg_color"> <?php print $bxic1; ?> </div>
										<div class="cardFxTxt">
											<p class="theme_text_color text_strach text_size_fa_card"><?php echo html_entity_decode($whyperch[$bxhead]); ?></p>
											<p class="fa_card_text"><?php echo html_entity_decode($whyperch[$bxcont]); ?></p>
										</div>
									</div>
								</div>
			<?php
							}
						if($iconcount2%3=='0')
							{
								echo '</div><div class="fram_width setComn">';
							}
						$iconcount++;
					}
			?>						
		</div>
		<br><br>
	</section>	
	
	<section class="TextTwoSec fram_width clear">
		<div class="btmDsgn">
			<h2><b><?php echo $whyperch['h2']; ?></b></h2>
			<span><?php echo $whyperch['subhead2']; ?></span>
			<h5 style="margin-bottom:0;"></h5>		
		</div>
	</section>
	
	<section  class="AbtTxtCrd  clear">
		<div class="fram_width AbtTxtCrd">
			<?php
				$imgboxcount = 1;
				for($i=1;$i<=4;$i++)
					{
						$imhead = "imgbox_h".$imgboxcount;
						$impath = "imgbox_img".$imgboxcount;
						$imcont = "imgbox_content".$imgboxcount;
						
						if($whyperch[$imhead]=='')
							{}
						else
							{
			?>
								<div class="AbttxtCard" style="width:50%;">
									<div class="H70">
										<h3 class="mrgn0"><?php echo html_entity_decode($whyperch[$imhead]); ?></h3>
									</div>			
									
									<img src="images/<?php echo $whyperch[$impath]; ?>" class="img img-responsive" style="height:300px;width:100%" alt="<?php echo html_entity_decode($whyperch[$imhead]); ?>" title="<?php echo html_entity_decode($whyperch[$imhead]); ?>">
									
									<div class="Abttext">
										<?php echo html_entity_decode($whyperch[$imcont]); ?>				
									</div>
								</div>
			<?php
							}
						if($imgboxcount%2=='0')
							{
								if($imgboxcount=="4")
									{}
								else
									{
										echo '</div></section><section  class="AbtTxtCrd  clear"><div class="fram_width AbtTxtCrd">';
									}
							}
						$imgboxcount++;
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