<?php



$email = '<p>Hello,&nbsp;</p>
<p><br />Welcome to Razorbee Online Solution Pvt Ltd! Thanks so much for joining us.&nbsp;</p>
<p>RazorBee is a fast growing company, provides sharp-edge solutions for all types of software development and software products &nbsp;and IT services that enhances a business worldwide prosperity.</p>
<p>Having the experience, it is consistently recognised for its fresh and innovative ideas and applications. It has two wings based on its activities&nbsp;<strong>&nbsp;Services and Products</strong></p>
<p><strong>Services:</strong></p>
<ul>
<li>mobile application development</li>
<li>responsive webdesign&nbsp;</li>
<li>CMS &amp; ecommerse webdesign</li>
<li>SEO&amp; digital marketing&nbsp;</li>
<li>graphic &amp; LOGO design</li>
</ul>
<p><strong>Product:</strong></p>
<ul>
<li><span style="font-size: 12pt;">digital darpan</span></li>
<li><span style="font-size: 12pt;">techyShiksha</span></li>
<li><span style="font-size: 12pt;">business management softwawe&nbsp;</span></li>
<li><span style="font-size: 12pt;">service ticket&nbsp;</span></li>
</ul>
<p>&nbsp;</p>
<p><span style="font-size: 12pt;">Please visit: <a href="http://www.razorbee.com">http://www.razorbee.com</a></span></p>
<p>Name: Mr. Saleem&nbsp;</p>
<p>Contact: <a href="mailto:saleem@razorbee.com">saleem@razorbee.com</a>&nbsp;/ &nbsp;+91 9148688883</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p style="margin-top: 0pt; margin-bottom: 0pt; margin-left: .31in; text-indent: -.31in; text-align: left; direction: ltr; unicode-bidi: embed; word-break: normal; punctuation-wrap: hanging;">&nbsp;</p>';

echo $email;
foreach($_POST as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
		$pos = strrpos($x, "phonenumber");
		if (strrpos($x, "phonenumber") === false) { // note: three equal signs
    	// not found...
		}else if(strrpos($x, "email") === false){

		}


}


?>
<html>
<head>
<title>Razorbee Online Solutions Pvt Ltd</title>

<script src="js/form.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<body>

	<div class="main">
	    <div class="header">
		<h1>Razorbee Online Solutions Pvt Ltd</h1>
		</div>
		<!--
		=================
		First Div for the buttons. Click on the button to add field on the forms.
		=================
		-->
		<div class="two">
		<button class="name" onclick="textBoxCreate()">phone numner</button><br/>
		<button class="email" onclick="emailBoxCreate()">Email</button>
		<a href="http://www.razorbee.com/"><img  src="razorbee.png" /></a>
		</div>
		<!--
		=================
		Form fields get added in the third div.Click on the button to add field on the forms.
		=================
		-->
		<div class="third">
		<form action="" method="post" id="mainform">
		<p id="myForm"></p>
		<input type="submit" value="Submit"/>
		</form>
		</div>
	</div>

</body>
</html>
