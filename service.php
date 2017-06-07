<?php 
include('config.php');

	$selmeta = "select * from metaTags where filename='index'";
	$selmetaquery = mysql_query($selmeta);
	print_r($selmetaquery);



?>