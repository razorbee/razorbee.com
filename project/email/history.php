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


$(function() {


    _history = localStorage.getItem('history');

    _history=JSON.parse(_history);
    _history.reverse();

    $.each(_history, function() {
        $("#listview").append('<li class="list-group-item">'+this.name +' ~ ' +this.email +' ~ ' + this.phonenumber+' ~ ' +this.time+'</li>');
      });

});
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


  <div class="container">


    <div class="container">
      <h2>History</h2>
      <ul id="listview" class="list-group">
      </ul>
    </div>


  </div>



</body>
</html>
