<?php
	include "include/main-inc.php";
?>
<?php
	
	if(isset($_POST['contactus_sub']))
		{
			$spcheck7 = $_POST['spcheck7'];
			if($spcheck7=='')
				{
					$name = $_POST['name'];
					$email = $_POST['email'];
					$mobile = $_POST['mobile'];
					$message = $_POST['message'];
					$properid = "0";
					$enqtype = "contactus";
					$recvDate = date('Y/m/d');
					$month = date('m');
					$year = date('Y');
					
					$ipTrack=get_client_ip_server();	
					
					$insertdet = "insert into inquiry(propertyID,name,email,mobile,message,inquiryType,ipTrack,recvDate,month,year) values('$properid','$name','$email','$mobile','$message','$enqtype','$ipTrack','$recvDate','$month','$year')";
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
									$from = $email;
									$mess2.= "Regarding :- Contact Us Inquiry(Contact Us Page) <br /><br />"; 
									$mess2.= "Name :- ".$name."<br /><br />";
									$mess2.= "Email : ".$email."<br /><br />";
									// $mess2.= "Country Code : ".$country."<br /><br />";
									$mess2.= "Mobile : ".$mobile."<br /><br /><br /><br />";
									$mess2.= "Message : ".$message."<br /><br /><br /><br />";
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
									$to_mail1 = $email;
								
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
	$tableName = "static_page_contactus";
	$conditions = "customerID='2'";
	$contactus = sqlqueryfetch($tableName,$conditions);
?>

	<section class="contctTop clear">
		<div class="imgCtnr"></div>
		<div class="contctMsg">
			<span class="contctMsgHtxt">Contact Us</span>
		</div>
	</section>
	

	<section class="cardFxCntrContct">
		<div class="fram_width setComn">
			<div class='cardFx'>
				<div class="flipr bxShdw">
					<div class="circle_icon theme_bg_color"> <i class="fa fa-map-marker fa_line_height"></i> </div>
					<div class="cardFxTxt">
						<p class="theme_text_color text_strach text_size_fa_card"><?php echo $contactus['address1head']; ?></p>
						<p class="fa_card_text"><?php echo $contactus['address1']; ?></p>
					</div>
				</div>
			</div>

			<div class='cardFx'>
				<div class="flipr bxShdw">
					<div class="circle_icon theme_bg_color"> <i class="fa fa-map-marker fa_line_height"></i> </div>
					<div class="cardFxTxt">
						<p class="theme_text_color text_strach text_size_fa_card"><?php echo $contactus['address2head']; ?></p>
						<p class="fa_card_text"><?php echo $contactus['address2']; ?></p>
					</div>
				</div>
			</div>
				
			<div class='cardFx'>
				<div class="flipr bxShdw">
					<div class="circle_icon theme_bg_color"> <i class="fa fa-envelope  fa_line_height"></i> </div>
					<div class="cardFxTxt">
						<p class="theme_text_color text_strach text_size_fa_card"><?php echo $contactus['emailhead']; ?></p>
						<p class="fa_card_text"><?php echo $contactus['email']; ?></p>
					</div>
				</div>
			</div>	
				
			<div class='cardFx'>
				<div class="flipr bxShdw">
					<div class="circle_icon theme_bg_color"> <i class="fa fa-phone fa_line_height"></i> </div>
					<div class="cardFxTxt">
						<p class="theme_text_color text_strach text_size_fa_card"><?php echo $contactus['phonehead']; ?></p>
						<p class="fa_card_text"><?php echo $contactus['phone']; ?></p>
					</div>
				</div>
			</div>					
		</div>
	</section>	
	<!-- <h2 class="loctinMap theme_bg_color">Location on map</h2> -->
	<br><br>
	
	<div class="wrapper2 fram_width">
		<div class="guest_form">
			<h2><?php echo $contactus['tab1_formName']; ?></h2>
			
			<form action="" method="post" class="formForGuest">
				<div>
					<input type="text" class="hireInput" name="name" placeholder="Name" required />
				</div>
				   
				<div>
					<input type="email" class="hireInput" name="email" placeholder="Email" required />
				</div>
				   
				<div>
					<input type="tel" class="hireInput" name="mobile" placeholder="Phone Number" required />
				</div>
				   
				<div>
					<textarea cols="40" name="message" class="hireInput" rows="5" placeholder="Message"></textarea>
				</div>
				   
				<input type="text" name="spcheck7" style="display:none;" />
				   
				<div class="g_submit">
					<button type="submit" name="contactus_sub" class="theme_bg_color" value="submit">submit</button>
				</div>
			</form> 
		</div>
		<div class="contact_map">
			<iframe width="100%" height="430" frameborder="0" style="border:0" src="<?php echo $contactus['map_url']; ?>" allowfullscreen></iframe>
		</div>
	</div>

	<?php
		desktopFooter();
	?>
	</body>
</html>