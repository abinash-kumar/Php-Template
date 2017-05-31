<?php
	include "include/main-inc.php";
?>

<?php
	if(isset($_POST['jobOpening']))
		{
			$spcheck4 = $_POST['spcheck4'];
			if($spcheck4=='')
				{
					$name3 = $_POST['name3'];
					$email3 = $_POST['email3'];
					$mobile3 = $_POST['jobProfile'];
					$phone3 = $_POST['phone3'];
					$message3 = $_POST['message3'];
					$properid3 = "0";
					$enqtype3 = "jobOpening";
					$recvDate3 = date('Y/m/d');
					$month3 = date('m');
					$year3 = date('Y');
					
					$ipTrack3=get_client_ip_server();	
					
					$insertdet = "insert into inquiry(propertyID,name,email,subject,mobile,message,inquiryType,ipTrack,recvDate,month,year) values('$properid3','$name3','$email3','$mobile3','$phone3','$message3','$enqtype3','$ipTrack3','$recvDate3','$month3','$year3')";
					$insertdataquery = mysql_query($insertdet);
					
					$sele = "select * from mail_templates where user='admin' and type='For Admin' and reciever_status='Active' and form1='contact_us'";
					$quer = mysql_query($sele);
					if($quer==true)
						{
							while($r = mysql_fetch_array($quer))
								{
									$cc = $r['mail_cc'];
									$subject2 = $r['subject'];
									$mes = html_entity_decode($r['body']);
									$mess2.= $mes;
									$to_mail = $r['mail_to'];
									$from = $email3;
									$mess2.= "Regarding :- ".$enqtype3."<br /><br />"; 
									$mess2.= "Name :- ".$name3."<br /><br />";
									$mess2.= "Email : ".$email3."<br /><br />";
									// $mess2.= "Country Code : ".$country."<br /><br />";
									$mess2.= "Profile : ".$mobile3."<br /><br /><br /><br />";
									$mess2.= "Message : ".$message3."<br /><br /><br /><br />";
									$mess2.= html_entity_decode($r['signature'])."<br /><br />";
							
									$headers = "From:".$from."\r\n"; 
									$headers.= "Cc:".$cc."\r\n";
									$headers.= "MIME-Version: 1.0\r\n"; 
									$headers.= "Content-Type: text/html; charset=utf-8\r\n"; 
									$headers.= "X-Priority: 1\r\n"; 
									
									mail($to_mail, $subject2, $mess2, $headers);
								}
						}
					else
						{
							echo "Error";
						}
					
					$sele1 =  "select * from mail_templates where user='admin' and type='For User' and sender_status='Active' and form1='contact_us'";
					$quer1 = mysql_query($sele1);
					if($quer1==true)
						{
							while($r = mysql_fetch_array($quer1))
								{
									$cc = $r['mail_cc'];
									$subject3 = $r['subject'];
									$mes1 = html_entity_decode($r['body']);
									$mess3.= $mes1;
									$mess3.= html_entity_decode($r['signature']);
									
									$from1 = $r['mail_from'];
									$to_mail1 = $email3;
								
									$headers1 = "From:".$from1."\r\n"; 
									$headers1.= "Cc:".$cc."\r\n";
									$headers1.= "MIME-Version: 1.0\r\n"; 
									$headers1.= "Content-Type: text/html; charset=utf-8\r\n"; 
									$headers1.= "X-Priority: 1\r\n"; 
									
									mail($to_mail1, $subject3, $mess3, $headers1);
								}
						}
					echo "<script> alert('Your Inquiry has been successfully submitted. Thank You!'); </script>";
				}
			else
				{}
			
		}
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
	$tableName = "static_page_tbl";
	$conditions = "customerID='2'";
	$about = sqlqueryfetch($tableName,$conditions);
?>
	
	<section class="contctTop clear">
		<div class="imgCtnrAbutUs"></div>
		<div class="contctMsg">
			<span class="contctMsgHtxt">About Us</span>
		</div>
	</section>
	
	<section class="TextTwoSec fram_width clear">
		<div class="abutTwoSec">
			<h2 class="H70AbtTop"><b><?php echo $about['about_h1']; ?></b></h2>
			<h5><span class="dsgn">#######</span></h5>
			
			<div class="abutOneSecPara">
				<?php echo $about['about_h1_cont']; ?>
			</div>			
		</div>
		
		<div class="abutTwoSec">
			<h2 class="H70AbtTop"><b><?php echo $about['about_h2']; ?></b></h2>
			<h5><span class="dsgn">#######</span></h5>
			
			<div class="abutOneSecPara">
				<?php echo $about['about_h2_cont']; ?>
			</div>			
		</div>
	</section>	
	<br>
	
	<section  class="AbtTxtCrd  clear">
		<div class="fram_width AbtTxtCrd">
			<div class="AbttxtCard">
				<div class="H70">
					<h3 class="mrgn0"><?php echo $about['about_collapseh1']; ?><br><br></h3>
				</div>
				
				<div class="Abttext"><?php echo $about['about_collapseh1_cont']; ?></div>
			</div>
			
			<div class="AbttxtCard">
				<div class="H70">
					<h3 class="mrgn0"><?php echo $about['about_collapseh2']; ?></h3>
				</div>
				
				<div class="Abttext"><?php echo $about['about_collapseh2_cont']; ?></div>		
			</div>
			
			<div class="AbttxtCard">
				<div class="H70">
					<h3 class="mrgn0"><?php echo $about['about_collapseh3']; ?></h3>
				</div>
				
				<div class="Abttext"><?php echo $about['about_collapseh3_cont']; ?></div>		
			</div>
			
			<div class="AbttxtCard">
				<div class="H70">
					<h3 class="mrgn0"><?php echo $about['about_collapseh4']; ?><br><br></h3>
				</div>
				
				<div class="Abttext"><?php echo $about['about_collapseh4_cont']; ?></div>		
			</div>
		</div>
	</section>
	
	<section class="abtOurTem fram_width clear">
		<h2><b><?php echo $about['about_h3']; ?></b></h2>
		<h5><span class="dsgn">#######</span></h5>
	</section>
	
	<section class="abtOurTemCards fram_width clear">
		<?php
			$cnt = 1;
			$emp_sel = "select * from team_members where customerID='2' order by s_no asc";
			$emp_quer = mysql_query($emp_sel);
			while($emp = mysql_fetch_array($emp_quer))
				{
		?>
					<div class="abtOurTemUser">
						<div class="innrCard" style="margin: 30px;">
							<center><img src="images/<?php echo $emp['pic_url']; ?>.jpg" /></center>
							<h3><?php echo $emp['name']; ?></h3>
							<h5 class="them_color"><?php echo $emp['desig']; ?></h5>
							<p><?php echo html_entity_decode($emp['about']); ?></p>
							
							<h2><i class="fa fa-facebook"></i><i class="fa fa-twitter"></i><i class="fa fa-linkedin"></i><h2>
						</div>
					</div>
		<?php
					if($cnt%3=="0")
						{
							echo '</section><hr style="width: 50%;"><section class="abtOurTemCards fram_width clear">';
						}
					$cnt++;
				}
		?>
	</section>	
	<br>
	
	<div class="wrapper4 fram_width hireMe clear"><br>
		<div class="hire gcard">
            <div class="hire_deading theme_bg_color">
               <h2>We are Hiring</h2>
            </div>
            
			<div class="hire_form">
				<form action="" method="post">
					<div class="myinputGrp">
						<label>Your Name</label>
						<input type='text' name="name3" class="frnInput" />
					</div>
					
					<div class="myinputGrp">
						<label>Job Applied For:</label>
						<select class="frnInput" name="jobProfile" style="margin: 0px 0px;">
							<option></option>
							<option>Web Designer</option>
							<option>Front-End-Developer</option>
							<option>Php Developer</option>
							<option>Sales</option>
						</select>
					</div>
					
					<div class="myinputGrp">
						<label>Your Email</label>
						<input type="email" name="email3" style="width: 100%;" class="frnInput" />
					</div>
					
					<div class="myinputGrp">
						<label>Phone Number</label>
						<input type="text" class="frnInput" name="phone3" style="width: 100%;"/>
					</div><br>
					
					<input type="text" name="spcheck4" style="display:none;" />
					
					<div class="submitBtn">
					  <button type="submit" name="jobOpening" class="pull-right">Submit</button>
					</div>
				</form>
            </div>
		</div>
	</div>

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
	
	<?php
		desktopFooter();
	?>
	</body>
</html>