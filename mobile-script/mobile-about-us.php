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
	$tableName = "static_page_tbl";
	$conditions = "customerID='2'";
	$about = sqlqueryfetch($tableName,$conditions);
?>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slidesjs/3.0/jquery.slides.min.js"></script>

		<script>
			$(function(){
			  $("#slides").slidesjs({
				width: 360,
				height: 300
			  });
			});
		</script>
		
		<section class="propTop clear">
			<img src="../images/IMG_5119.jpg"/>
			
			<div class="propTopContainr">
				<span class="boldQuote">About Us</span>
			</div>
		</section>
		<br>
		<section class="listContnr clear">			
			<section class="propListCard gcard">
				<h2><?php echo $about['about_h1']; ?></h2>
				<div class="btmBedg clear">
					<div class="btmBedgLft" style="width:100%;padding:10px;">
						<i class="fa fa-quote-left Hname"></i>
						<?php echo $about['about_h1_cont']; ?>
						<i class="fa fa-quote-right Hname"></i>
					</div>								
				</div>
			</section>		
			
			<section class="propListCard gcard">
				<h2><?php echo $about['about_h2']; ?></h2>
				<div class="btmBedg clear">
					<div class="btmBedgLft" style="width:100%;padding:10px;">
						<i class="fa fa-quote-left Hname"></i>
						<?php echo $about['about_h2_cont']; ?>
						<i class="fa fa-quote-right Hname"></i>
					</div>								
				</div>
	
				<section class=""  id="qA"><br>
					<!-- question start  -->
			
					<p onclick=''><i class="fa fa-file-text-o" ></i>&nbsp;<?php echo $about['about_collapseh1']; ?><i class="fa fa-plus pull-right"></i></p>
					<span class="colorPGrey dn"><?php echo $about['about_collapseh1_cont']; ?></span>

					<!-- question end  -->
			
					<!-- question start  -->
			
					<p><i class="fa fa-file-text-o" ></i>&nbsp;<?php echo $about['about_collapseh2']; ?><i class="fa fa-plus pull-right"></i></p>
					<span class="colorPGrey dn"><?php echo $about['about_collapseh2_cont']; ?></span>
			
					<!-- question end  -->

					<!-- question start  -->
			
					<p><i class="fa fa-file-text-o" ></i>&nbsp;<?php echo $about['about_collapseh3']; ?><i class="fa fa-plus pull-right"></i></p>
					<span class="colorPGrey dn"><?php echo $about['about_collapseh3_cont']; ?></span>
			
					<!-- question end  -->

					<!-- question start  -->
					
					<p><i class="fa fa-file-text-o" ></i>&nbsp;<?php echo $about['about_collapseh4']; ?><i class="fa fa-plus pull-right"></i></p>
					<span class="colorPGrey dn"><?php echo $about['about_collapseh4_cont']; ?></span>
			
					<!-- question end  -->
				</section>			
				
				<script>
					$('#qA p').click(function(){
					$(this).children().toggleClass('fa-plus fa-minus');
					$(this).next().slideToggle(100);
					});
				</script>					
			</section>
		</section>
		
		
		<h3 class="mrgnTop30"><?php echo $about['about_h3']; ?></h3>
		<section class="OurTeam txtCenter" id="slides">
			<?php
				$emp_cnt = 1;
				$emp_sel = "select * from team_members where customerID='2' order by s_no asc";
				$emp_quer = mysql_query($emp_sel);
				while($emp = mysql_fetch_array($emp_quer))
					{
			?>
						<div class="gcard ourTemInner" onclick="OpnUserModal('user<?php echo $emp_cnt; ?>');">
							<center><img src="images/<?php echo $emp['pic_url']; ?>.jpg"/></center>
							<h3><?php echo $emp['name']; ?></h3>
							<p class="designation"><?php echo $emp['desig']; ?></p>
						</div>
			<?php
						$emp_cnt++;
					}
			?>
			
			<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left"></i></a>
			<a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right"></i></a>	
		</section>	
		<?php
			$emp_cnt1 = 1;
			$emp_quer1 = mysql_query($emp_sel);
			while($emp1 = mysql_fetch_array($emp_quer1))
				{
		?>
					<div id="user<?php echo $emp_cnt1; ?>" class="overlayUserModal theme_bg_color" >
						<center> 
							<div class="form-content cardUser" id="tab1_content">
								<div class="innerWrpr">
									<a href="javascript:void(0)" class="closebtn" onclick="closemodal()">&times;</a>
									<img src="images/<?php echo $emp1['pic_url']; ?>.jpg" class="usrImg flotLeft" />
									<h2 class="flotLeft headingUser"><?php echo $emp1['name']; ?></h2>
									
									<p class="usrDesng"><?php echo $emp1['desig']; ?></p>
									<p class="UserDetail"><?php echo $emp1['about']; ?></p>
								</div>
							</div>
						</center>
					</div>
		<?php
					$emp_cnt1++;
				}
		?>
		<br>
		
		
	
		<script>
			// js by abinsh for form overley

			function OpnUserModal(modal) {
				$("#"+modal).show();
			}

			function closemodal() {
				$(".overlayUserModal").hide();
			}
		</script>
		<br>

<?php
	desktopFooterMobile();
	exit;
?>