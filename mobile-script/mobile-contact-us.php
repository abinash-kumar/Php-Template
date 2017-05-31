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
	$tableName = "static_page_contactus";
	$conditions = "customerID='2'";
	$contactus = sqlqueryfetch($tableName,$conditions);
?>

		<section class="propTop clear">
			<img src="../images/contactBg.jpg" />
			<div class="propTopOverley"></div>
			<div class="propTopContainr">
				<span class="boldQuote">Contact Us</span>
			</div>
		</section>
		
		<h1 class="txtCenter mrgnTop30"><?php echo $contactus['tab1_heading']; ?></h1>
		<section class="FormContact">
			<div class="hire gcard">
				<div class="hire_form">
					<form action="" method="post">
						<div class="myinputGrp">
							<label>Your Name</label>
							<input name="name" type='text' class="frnInput" />
						</div>
						<div class="myinputGrp">
							<label>Your Email</label>
							<input type="email" name="email" style="width: 100%;" class="frnInput" />
						</div>
						<div class="myinputGrp">
							<label>Phone Number</label>
							<input type="text" name="mobile" class="frnInput" style="width: 100%;"/>
						</div>
						<div class="myinputGrp">
							<label>Subject</label>
							<input type="text" name="subject" class="frnInput" style="width: 100%;"/>
						</div>
						<br>
						<div class="myinputGrp">
							<label>Message</label>
							<textarea type="text" name="message" class="frnInput" rows="5" style="width: 100%;"></textarea>
						</div>							
						<br>
						<div class="submitBtn">
						  <button type="submit" name="contactus_sub" class="viewBtn">Submit</button>
						</div>
					</form>
				</div>
			</div>		
		</section>

		<script>
			$('.myinputGrp > input,.myinputGrp > select,.myinputGrp > label, .myinputGrp > textarea').focus(function(){
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
		
		
		<br>
		<section id="contMap">
			<iframe width="100%" height="200" frameborder="0" style="border:0" src="<?php echo $contactus['map_url']; ?>" allowfullscreen=""></iframe>
		</section>	
		<br>


<?php
	desktopFooterMobile();
	exit;
?>