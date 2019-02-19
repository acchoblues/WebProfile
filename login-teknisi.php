<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">

    <title>Login Admin | Kencana Daya Utama</title>

    <!-- pemanggilan direktory file bootstrap.css -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- pemanggilan direktory file css font-->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- pemanggilan direktori file css custom template -->
    <link href="css/style1.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
    		  <form class="form-login" method="post" action="proseslogin-teknisi.php">
		        <h2 class="form-login-heading"> <span class="glyphicon glyphicon-lock"></span> LOGIN TEKNISI</h2>
                <center><h5> <span class="glyphicon glyphicon-qrcode"></span> Kencana Daya Utama <span class="glyphicon glyphicon-qrcode"></span></h5></center>
		        <div class="login-wrap">
		            <input name="username" id="username" type="input" class="form-control" autocomplete="off" placeholder="Username" required  autofocus>
                    <br />
                    <input name="password" id="password" type="password" class="form-control" autocomplete="off" placeholder="Password" required>
                    <br />
                    <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
		           
          	  	
                         <hr>
		            <div class="login-social-link centered">
		            <p>atau login sebagai</p>
		                <a href="login-admin.php" class="btn btn-danger" type="submit"><i class="fa fa-user"></i> Admin</a>
		                <a href="login-member.html" class="btn btn-warning" type="submit"><i class="fa fa-user"></i> Member</a>
		            </div>
		            <div class="registration">
		                <a class="" href="http://www.hakkoblogs.com">
		                    Copyright &copy; Kencana Daya Utama 2016
		                </a>
		            </div>
		
		        </div>
		
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
    <!-- Pemanggilan Background Login Form-->
    <script>
        $.backstretch("img/2.jpg", {speed: 500});
    </script>


  </body>
</html>
