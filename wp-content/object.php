<?php
$obj=array("100"=>"http://projects.razorbee.com/nagaraja",
"101"=>"http://maf.razorbee.com",
"102"=>"http://projects.razorbee.com/kayaka");
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	echo "<br> <br>" .$actual_link;
	$url = $actual_link;
$str = substr(strrchr($url, '/'), 1);
$uur=array_search($str,$obj,true);
header("location: $uur");
?>