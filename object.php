<?php
$obj=array(100=>"http://projects.razorbee.com/nagaraja",101=>"http://maf.razorbee.com",102=>"http://projects.razorbee.com/kayaka");
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$url = $actual_link;
$str = substr(strrchr($url, '/'), 1);
foreach ( $obj as $key=>$val ){
	if($key==$str)
	{
		header("location: $val");
		exit;
	}
	else{

	    }
}
?>
