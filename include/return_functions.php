<?php
	error_reporting(E_ERROR | E_PARSE);
	
//------------------------------------------------- Deepanshu Functions Starts -----------------------------------------------//
	
	function sqlqueryinsert($tableName, $columns, $values, $redirect)
		{
			$sqlinsert = "insert into $tableName($columns) values($values)";
			$sqlinsertquery = mysql_query($sqlinsert);
			header("location:".$redirect);
			exit;
		}
		
	function sqlqueryfetch($tableName, $conditions)
		{
			$sqlfetch = "select * from $tableName where $conditions";
			$sqlfetchquery = mysql_query($sqlfetch);
			$sqlfetchdata = mysql_fetch_array($sqlfetchquery);
			$sqlfetchdata = ms_htmlentities_decode($sqlfetchdata);
			// if($sqlfetchquery==true)
				// {
					// echo "true";
				// }
			// else
				// {
					// echo "false".mysql_error();
				// }
			
			// print_r($sqlfetchdata);
			return $sqlfetchdata;
		}
		
//-------------------------------------------------- Deepanshu Functions Ends -----------------------------------------------//
	function getResult($tableName, $cond="", $fields="*") 
		{
			$sql=db_query("select $fields from $tableName $cond");
			$res=mysql_fetch_array($sql);
			$res=ms_htmlentities_decode($res);	
			return $res;
			}

	function checkpoint($from_start = false)
		{
			global $PREV_CHECKPOINT;
			if($PREV_CHECKPOINT=='') 
				{
					$PREV_CHECKPOINT = SCRIPT_START_TIME;
				}
			$cur_microtime = getmicrotime();
	
			if($from_start)
				{
					return $cur_microtime - SCRIPT_START_TIME;
				}
			else 
				{
					$time_taken = $cur_microtime - $PREV_CHECKPOINT;
					$PREV_CHECKPOINT = $cur_microtime;
					return $time_taken;
				}
		}
		
	function getmicrotime() 
		{
			list($usec,	$sec) =	explode(" ", microtime());
			return ((float)$usec + (float)$sec);
		}


	function ms_htmlentities($var) 
		{
			return is_array($var) ? array_map('ms_htmlentities', $var) : htmlentities(trim($var),ENT_QUOTES);
		}


	function ms_htmlentities_decode($var) 
		{
			return is_array($var) ? array_map('ms_htmlentities_decode', $var) : stripslashes(html_entity_decode(trim($var),ENT_QUOTES));
		}


	function ms_trim($var) 
		{
			return is_array($var) ? array_map('ms_trim', $var) : trim($var);
		}
		
	function connect_db() 
		{
			global $ARR_CFGS;
			if (!isset($GLOBALS['dbcon'])) 
				{
					$GLOBALS['dbcon'] = mysql_connect($ARR_CFGS["db_host"], $ARR_CFGS["db_user"], $ARR_CFGS["db_pass"]);
					mysql_select_db($ARR_CFGS["db_name"]) or die("Could not connect to database. Please check configuration and ensure MySQL is running.");
				}
		}


	function db_query($sql, $dbcon2 = null) 
		{
			if($dbcon2=='')
				{
					if(!isset($GLOBALS['dbcon'])) 
						{
							connect_db();
						}
					$dbcon2	= $GLOBALS['dbcon'];
				}
			$time_before_sql = checkpoint();
			$result	= mysql_query($sql,	$dbcon2) or	die(db_error($sql));
			return $result;
		}
	function NumRows($sql, $dbcon2 = null) 
		{
			if($dbcon2=='')
				{
					if(!isset($GLOBALS['dbcon'])) 
						{
							connect_db();
						}
					$dbcon2	= $GLOBALS['dbcon'];
				}
			$result	= mysql_num_rows($sql) ;
			if(!is_numeric($result))
				{
					return 0;
				}
			else
				{
					return $result;
				}
		}
	
	function db_fetch_object($sql, $dbcon2 = null) 
		{
			if($dbcon2=='')
				{
					if(!isset($GLOBALS['dbcon'])) 
						{
							connect_db();
						}
					$dbcon2	= $GLOBALS['dbcon'];
				}
			$result	= mysql_fetch_object($sql) or	die(mysql_error());	
			return $result;
		}
	
	function getAdminname() 
		{
			$res=getResult("admin_details"," where 1");
			return $res['name'];
		}
	function send_email($fromPerson, $fromEmail, $to, $subject, $message) 
		{
			$headers = "From:$fromPerson<$fromEmail> \n";
			$headers .= "Reply-To: $eMail \r\n";
			$headers .= "X-Mailer:PHP v".phpversion()."\r\n";
			$headers .= "X-Priority:3\n";
			$headers .= "MIME-version:1.0\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$msg=$message;
			@mail($to, $subject, $msg, $headers);
		}
	
	function getExtension($str) 
		{
			$i = strrpos($str,".");
			if (!$i) { return ""; }
			$l = strlen($str) - $i;
			$ext = substr($str,$i+1,$l);
			return $ext;
		}
		
	function upload_file($newname,$image,$folder) 
		{
			$folder=SITE_DIR_PATH."/".$folder;
			if (!file_exists($folder)) 
				{
					mkdir($folder, 0777);
					chmod($folder, 0777);
				}
	
			if($_FILES[$image]['name']!="")
				 {
					$extension=getExtension($_FILES[$image]['name']);
					$image_name=$newname.".".$extension;		
					$uploadedfile=$_FILES[$image]['tmp_name'];
					$tmp_imagename=$_FILES[$image]['name'];
					
					if($tmp_imagename<>"" && $uploadedfile<>"" && $image_name<>"")
						{		
							move_uploaded_file($uploadedfile, $folder."/".$image_name);
						}
				}
			
			return $image_name;
		}
		
	function get_client_ip_server() 
		{
			$ipaddress = '';
			
			if ($_SERVER['HTTP_CLIENT_IP'])
				{
					$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
				}
			else if($_SERVER['HTTP_X_FORWARDED_FOR'])
				{
					$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
				}
			else if($_SERVER['HTTP_X_FORWARDED'])
				{
					$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
				}
			else if($_SERVER['HTTP_FORWARDED_FOR'])
				{
					$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
				}
			else if($_SERVER['HTTP_FORWARDED'])
				{
					$ipaddress = $_SERVER['HTTP_FORWARDED'];
				}
			else if($_SERVER['REMOTE_ADDR'])
				{
					$ipaddress = $_SERVER['REMOTE_ADDR'];
				}
			else
				{
					$ipaddress = 'UNKNOWN';
				}

			return $ipaddress;
		}
	
	function pageNavigation($reccnt,$pagesize,$start,$link="") 
		{
			if($reccnt>$pagesize) 
				{
					$num_pages=$reccnt/$pagesize;
					$PHP_SELF=$_SERVER['PHP_SELF'];
					$qry_str=$_SERVER['argv'][0];
					$m=$_GET;
					unset($m['start']);
					$qry_str=qry_str($m);
					$j=$start/$pagesize-5;
					if($j<=0) 
						{
							$j=0;
						}
					$k=$j+10;
					if($k>$num_pages)	
						{
							$k=$num_pages;
						}
					$j=intval($j);
?>
		
					<div align="center">
						<table>
							<tr>
								<td>
									<?php
										if($start!=0) 
											{
												$s=$start-$pagesize;
												$newUrl=$PHP_SELF."".$qry_str."&start=".$s."&pagesize=".$pagesize.$link;
												$newUrl=str_replace("?&","?",$newUrl);
									?>
												<a href="<?=$newUrl?>" ><button type="button" class="btn btn-danger" style="border-radius:0px 0px 0px 0px ! important;margin:0px;padding:4px 10px;"> Previous </button></a>
									<?php
											}
										else 
											{
									?>
												<button type="button" class="btn btn-danger" style="border-radius:0px 0px 0px 0px ! important;margin:0px;padding:4px 10px;"> Previous </button>
									<?php
											}
									?>
								</td>
					
								<td>
									<div class="index">
										<?php 
											for($i=$j;$i<$k;$i++) 
												{
													if(($pagesize*$i)!=$start) 
														{
															$s=$pagesize*$i;
															$newUrl=$PHP_SELF."".$qry_str."&start=".$s."&pagesize=".$pagesize.$link;
															$newUrl=str_replace("?&","?",$newUrl);
										?>
															<a href="<?=$newUrl?>"   class="btn btn-icon-only green" style="height: 30px;"><?=$i+1?></a>
										<?php
														}
													else 
														{
										?>
															<span  class="btn btn-icon-only green" style="height: 30px;"><?=$i+1?></span>
										<?php
														}
												}
										?>
									</div>
								</td>
					
								<td>
									<?php
										if($start+$pagesize < $reccnt) 
											{
												 $s=$start+$pagesize;
												 $newUrl=$PHP_SELF."".$qry_str."&start=".$s."&pagesize=".$pagesize.$link;
												 $newUrl=str_replace("?&","?",$newUrl);
									?>
												<a href="<?=$newUrl?>"><button type="button" class="btn blue " style="border-radius:0px 0px 0px 0px ! important;margin:0px;padding:4px 10px;"> next </button></a>
									<?php
											}
										else 
											{
									?>
												<button type="button" class="btn blue " style="border-radius:0px 0px 0px 0px ! important;margin:0px;padding:4px 10px;"> next </button>
									<?php
											}
										$startfrom=$start+1;
										$end=$start+$pagesize;
										if($reccnt<$end) 
											{
												$end=$reccnt;
											}
									?>
								</td>
							</tr>
						</table>
					</div>
<?php
				}
		}
		
	function qry_str($arr, $skip = '') 
		{
			$s = "?";
			$i = 0;
			foreach($arr as	$key =>	$value)	
				{
					if ($key !=	$skip) 
						{
							if (is_array($value)) 
								{
									foreach($value as $value2) 
										{
											if ($i == 0) 
												{
													$s .= $key . '[]=' . $value2;
													$i = 1;
												}
											else 
												{
													$s .= '&' .	$key . '[]=' . $value2;
												}
										}
								}
							else 
								{
									if ($i == 0) 
										{
											$s .= "$key=$value";
											$i = 1;
										}
									else 
										{
											$s .= "&$key=$value";
										}
								}
						}
				}
			return $s;
		}
		
	function GetValidFileName($fname) 
		{
			$pattern="[?()\/&#\,\;\.$+%]";
			$valid_file=ereg_replace($pattern,"-",$fname);
			$valid_file = preg_replace('!\s+!', ' ', $valid_file);
			$valid_file=strtolower($valid_file);
			$valid_file=str_replace("  ","-",$valid_file);
			$valid_file=str_replace(" ","-",$valid_file);
			$valid_file=str_replace("_","-",$valid_file);
			$valid_file=str_replace("%","",$valid_file);
			$valid_file=str_replace("__","-",$valid_file);
			$valid_file=str_replace("--","-",$valid_file);
			return $valid_file;
		}
	
	function getCount($tableName, $cond="", $fields="*") 
		{
			$sql=db_query("select $fields from $tableName $cond");
			return mysql_num_rows($sql);
		}
		
	function updateTable($tableName,$cond="") 
		{
			db_query("update $tableName set $cond");
		}
	
	function checkHTTPREFERER() 
		{
			$baseurl=SITE_URL_PATH;
			$referer=$_SERVER['HTTP_REFERER'];	
			$srch=$_SERVER['HTTP_HOST'];
		
			if(!strstr($referer,$srch)) 
				{
?>
					<html>
						<head>
							<title>Error</title>
							<script language="javascript">
								function open_Window() {
									win = window.open("<?=$baseurl;?>/error.php?id=error","","width=480,height=40,top=0,left=0");
								}
							</script>
						</head>
						
						<body bgcolor="#ffffff" text="#000000" link="#0066FF" vlink="#666EB3" alink="#003399" onLoad="open_Window()">
						</body>
					</html>
<?php
					exit;
				}
		}
	function db_error($sql) 
		{
			echo "<div style='font-family: tahoma; font-size: 11px; color: #333333'><br>".mysql_error()."<br>";
			print_error();
			if(LOCAL_MODE) 
				{
					echo "<br>sql: $sql";
				}
			echo "</div>";
		}
	function print_error() 
		{
			$debug_backtrace = debug_backtrace();
			for ($i = 1; $i < count($debug_backtrace); $i++) 
				{
					$error = $debug_backtrace[$i];
					echo "<br>";
					echo "<div>";
					echo "<b>File:</b> ".$error['file']."<br>";
					echo "<b>Line:</b> ".$error['line']."<br>";
					echo "<b>Function:</b> ".$error['function']."<br>";
					echo "</div>";
				}
		}
?>