<?php
	error_reporting(E_ERROR | E_PARSE);
	
	$normal_year = array("01" => "31", "02" => "28", "03" => "31", "04" => "31", "05" => "31", "06" => "30", "07" => "31", "08" => "31", "09" => "30", "10" => "31", "11" => "30", "12" => "31");
	
	$leap_year = array("01" => "31", "02" => "29", "03" => "31", "04" => "31", "05" => "31", "06" => "30", "07" => "31", "08" => "31", "09" => "30", "10" => "31", "11" => "30", "12" => "31");
	
	$month_map = array("01" => "January", "02" => "February", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "November", "12" => "December");
	
	$admin_section = array("1" => "Dashboard", "2" => "Inquiry Panel", "3" => "Property Pages", "4" => "Static Pages", "5" => "Slider", "6" => "City / Sub City", "7" => "SEO", "8" => "Data Settings", "9" => "Blog Management", "10" => "Property Reviews", "11" => "Discounts & Offers", "12" => "Email Templates", "13" => "Inventory & Rates");
?>