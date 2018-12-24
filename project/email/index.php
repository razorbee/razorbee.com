<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Razorbee keep-in-touch</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

function notcheck(s){
	if (s=="null" || s=="undefined"){
		return "";
	}
	return s;

}
$(function() {

    name = notcheck(localStorage.getItem('name'));
    email = notcheck(localStorage.getItem('email'));
    subject =  notcheck(localStorage.getItem('subject'));
    message =  notcheck(localStorage.getItem('message'));
    sms =  notcheck(localStorage.getItem('sms'));

    if (!name || name =="null"){
          name = 'saleem kuder';

    }


    if (!email){
          email = 'saleem@razorbee.com';
    }

    if (!message){

          message = '<p>Hello,&nbsp;</p><p><br />Welcome to Razorbee Online Solution Pvt Ltd! Thanks so much for joining us.&nbsp;</p><p>RazorBee is a fast growing company, provides sharp-edge solutions for all types of software development and software products &nbsp;and IT services that enhances a business worldwide prosperity.</p> <p>Having the experience, it is consistently recognised for its fresh and innovative ideas and applications. It has two wings based on its activities&nbsp;<strong>&nbsp;Services and Products</strong></p> <p><strong>Services:</strong></p> <ul> <li>mobile application development</li> <li>responsive webdesign&nbsp;</li> <li>CMS &amp; ecommerse webdesign</li> <li>SEO&amp; digital marketing&nbsp;</li> <li>graphic &amp; LOGO design</li> </ul> <p><strong>Product:</strong></p> <ul> <li><span style="font-size: 12pt;">digital darpan</span></li> <li><span style="font-size: 12pt;">techyShiksha</span></li> <li><span style="font-size: 12pt;">business management softwawe&nbsp;</span></li> <li><span style="font-size: 12pt;">service ticket&nbsp;</span></li> </ul> <p>&nbsp;</p> <p><span style="font-size: 12pt;">Please visit: <a href="http://www.razorbee.com">http://www.razorbee.com</a></span></p> <p>Name: Mr. Saleem&nbsp;</p> <p>Contact: <a href="mailto:saleem@razorbee.com">saleem@razorbee.com</a>&nbsp;/ &nbsp;+91 9148688883</p> <p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p> <p style="margin-top: 0pt; margin-bottom: 0pt; margin-left: .31in; text-indent: -.31in; text-align: left; direction: ltr; unicode-bidi: embed; word-break: normal; punctuation-wrap: hanging;">&nbsp;</p>';

    }

    if (!subject){
          subject = 'So nice to meet you, Razorbee Online Solutions Pvt Ltd';
    }
    if (!sms){
          sms = 'So nice to meet you, Razorbee Online Solutions Pvt Ltd. connect: saleem@razorbee.com / +91 9148688883 / www.razorbee.com /';
    }
	name =localStorage.setItem('name', name);
  	email =localStorage.setItem('email',email);
  	subject =localStorage.setItem('subject',subject );
  	message =localStorage.setItem('message', message);
  	sms =localStorage.setItem('sms', sms);



 });



var room = 1;
function education_fields() {

    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "contact_block form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="name" name="name[]" value="" placeholder="name"></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="email" name="email[]" value="" placeholder="email"></div></div><div class="col-sm-3 nopadding"></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="input-group"> <input type="text" class="form-control" id="phonenumber" name="phonenumber[]" value="" placeholder="phone number"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div><hr/>';

    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="./" class="navbar-brand">
              <img src="image/razorbee_logo.png"  width="110" >

            </a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="./">Home</a></li>
                <li><a href="./history.php">History</a></li>
                <li><a href="./settings.php">Settings</a></li>
            </ul>

        </div>
    </div>
</nav>
<form>
  <div id="formelem">

<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">

    <div id="education_fields">

          </div>
          <div class="contact_block">
  <div class="col-sm-3 nopadding">
    <div class="form-group">
      <input type="text" class="form-control" id="name" name="name[]" value="" placeholder="name">
    </div>
  </div>
  <div class="col-sm-3 nopadding">
    <div class="form-group">
      <input type="text" class="form-control" id="email" name="email[]" value="" placeholder="email">
    </div>
  </div>
  <div class="col-sm-3 nopadding">
    <div class="form-group">
      <input type="text" class="form-control" id="phonenumber" name="phonenumber[]" value="" placeholder="phone number">
    </div>
  </div>
</div>
  <div class="col-sm-3 nopadding">
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-btn">
          <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add</button>
          <br/>
          <button style="margin-top:30px; width:100%" type="submit" class="btn btn-primary">Submit</button>

        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>

    </div>
    <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small></div>
    <div class="panel-footer"><small><em><a href="http://www.razorbee.com">develop by Razorbee online solutions pvt ltd</a></em></em></small></div>
  </div>
</div>
</div>

</form>
<script>

var formelem = $("#formelem").html();

if (typeof Android!="undefined"){
}
$( "form" ).submit(function( event ) {

  event.preventDefault();
  name = localStorage.getItem('name');
  email = localStorage.getItem('email');
  subject =  localStorage.getItem('subject');
  message =  localStorage.getItem('message');
  sms =  localStorage.getItem('sms');


  $(".modal").modal();

  $('.modal').bind('hide', function () {
      window.location.reload();
   });
   $('.modal').on('hidden.bs.modal', function () {
     //window.location.reload();
     $("#formelem").html(formelem)
 })


  $(".contact_block").each(function( index ) {


    debugger;
    var obj = {name:$(this).find("#name").val() , email:$(this).find("#email").val(), phonenumber:$(this).find("#phonenumber").val() };

      var _history = localStorage.getItem('history');
      if (!_history){
        _history = [];
      }
      else{
        _history=JSON.parse(_history);
      }


      var currentdate = new Date();
      var datetime =  currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/"
                + currentdate.getFullYear() + "  "
                + currentdate.getHours() + ":"
                + currentdate.getMinutes() + ":"
                + currentdate.getSeconds();

      obj.time = datetime;

      _history.push(obj);



      localStorage.setItem('history', JSON.stringify(_history));


  //  console.log( index + ": " + $( this ).text() );
    if ($(this).find("#email").val()){

      $.ajax({
          url: 'email.php',
          type: "POST",
          data: {name:$(this).find("#name").val() , email:$(this).find("#email").val(), email_from: email,subject:subject, body:message},
          dataType: "json",
          success: function(result) {
            debugger;
 	            //Write your code here
          },
          error:function(e){debugger;}

    });

}

//

    if ($(this).find("#phonenumber").val()){
      if (typeof Android!="undefined"){
          //Android.sendSMS($(this).find("#phonenumber").val());
          sms =  localStorage.getItem('sms');

          var obj = { phonenumber : $(this).find("#phonenumber").val(), message: sms};
          var str = JSON.stringify(obj);
          Android.getJSONTData(str);

      }

    }

  });
  $(".modal").modal();

});

</script>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
               <span class="glyphicon glyphicon-ok"></span> <strong>Success</strong>
                <hr class="message-inner-separator">
                <p>
                    Your message has been send successfully.</p>
            </div>
        </div>
      </div>
</div>
</div>
</div>

</body>
</html>
