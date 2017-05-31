<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$wdt=date("Ymd");
if ($_SERVER['HTTP_HOST'] == "localhost") {
    define('LOCAL_MODE', true);
}
else {
 	define('LOCAL_MODE', false);
}

// File system path
$tmp = dirname(__FILE__);
$tmp = str_replace('\\' ,'/',$tmp);
$tmp = substr($tmp, 0, strrpos($tmp, '/'));

define('SITE_DIR_PATH', $tmp);

// include all the library files needed here
require_once(SITE_DIR_PATH."/include/config.php");
require_once(SITE_DIR_PATH."/include/return_functions.php");
require_once(SITE_DIR_PATH."/include/common-functions.php");
require_once(SITE_DIR_PATH."/include/arrays.inc.php");

if(strstr($_SERVER[PHP_SELF],"/".ADMIN_DIR)){
	require_once(SITE_DIR_PATH."/".ADMIN_DIR."/admin-function.php");
}
if(strstr($_SERVER[PHP_SELF],"/".DEMO_DIR)){
	require_once(SITE_DIR_PATH."/".DEMO_DIR."/admin-function.php");
}

$adminRes=getResult("admin_details"," where 1");
if (strlen($adminRes['email'])) {
	$admin_email=$adminRes['email'];
}
else {
	$admin_email="tech@theperch.in";
}

if (strlen($adminRes['companyName'])) {
	$website_name=$adminRes['companyName'];
}
else {
	$website_name="The Perch";
}

if (strlen($adminRes['name'])) {
	$admin_name=$adminRes['name'];
}
else {
	$admin_name="Admin";
}

if (strlen($adminRes['address'])) {
	$admin_address=$adminRes['address'];
}
else {
	$admin_address="";
}

define('WEBSITE_NAME',$website_name);
define('ADMINHEAD',"Admin Panel Of ".WEBSITE_NAME);
define('SCRIPT_START_TIME', getmicrotime());
define('SITE_EMAIL',$admin_email);
define('ADMIN_EMAIL',$admin_email);
define('ADMIN_NAME',$admin_name);
define('ADMIN_ADDRESS',$admin_address);
define('CURRENCY', "USD");
define('CURRENCY_SYMBOL', "$");

$_GET = ms_htmlentities(ms_trim($_GET));
$_POST = ms_htmlentities(ms_trim($_POST));
$_COOKIE = ms_htmlentities(ms_trim($_COOKIE));
$_REQUEST = ms_htmlentities(ms_trim($_REQUEST));
@extract($_GET);
@extract($_POST);

// magic_quotes_runtime needs to be "off"
if(get_magic_quotes_runtime()) {
	set_magic_quotes_runtime(0);
}

if ($handle = opendir(SITE_DIR_PATH.'/'.PLUGINS_DIR)) {
	while (false !== ($file = readdir($handle))) { 
		if ($file != "." && $file != "..") { 
			$curr_dir = SITE_DIR_PATH.'/'.PLUGINS_DIR.'/'.$file;
			if(is_dir($curr_dir)) {
				if(file_exists($curr_dir.'/plugin.php')) {
					require_once($curr_dir.'/plugin.php');
				}
			}
		}
	}
	closedir($handle);
}

$PHP_SELF = $_SERVER['PHP_SELF'];
$cur_page = basename($_SERVER['PHP_SELF']);
$admin_pos  = strpos($PHP_SELF, '/'.ADMIN_DIR.'/');
?>