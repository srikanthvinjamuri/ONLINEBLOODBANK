<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html ng-app="Demo">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-route.min.js" ></script>
        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/animate.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/footer-distributed.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/main.css" rel="stylesheet" type="text/css"/>
        <script src="js/script.js" type="text/javascript"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           <link href="CSS/app.css" rel="stylesheet" type="text/css"/>
           <script src="../login/login.controller.js" type="text/javascript"></script>
        <script src="../register/register.controller.js" type="text/javascript"></script>
        <script src="js/flash.service.js" type="text/javascript"></script>
        <script src="js/authentication.service.js" type="text/javascript"></script>
        <script src="js/user.service.js" type="text/javascript"></script>
        <script src="js/user.service.local-storage.js" type="text/javascript"></script>
         
    </head>
  
    <body>
   <?php
   include ('session.php');
?>
         <div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
        <img  src="Images/pro.jpg" class="img-responsive" style="width:100%; height:110px;"  />     
    </div>
    <div class="col-sm-2">
    </div> 
     </div>
    </div>

        <nav class="navbar navbar-inverse my-navbar"  style="border-bottom: thin solid red; width:100%;  border-width:5px;">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a class="navbar-brand" href="#/" style="font-size: 15px; font-weight: 900; ">HOME</a>
    <a class="navbar-brand" href="#/search" style="font-size: 15px; font-weight: 900; ">SEARCH DONORS</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"  ng-controller="loginCtrl" >
      <ul class="nav navbar-nav" id="ul1">
        <li style="font-size: 15px; font-weight: 900; "><a href="#/bloodtips">BLOOD TIPS</a>
        </li>
        <li style="font-size: 15px; font-weight: 900; "><a href="#">ABOUT US</a>
        </li>
     </ul>
      <ul class="nav navbar-nav navbar-right">
         
<!--      <li style="font-size: 15px; font-weight: 900; "><a href="#/login" ng-show="!isUserLoggedIn"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
      <li style="font-size: 15px; font-weight: 900; "><a href="#/login" ng-show="isUserLoggedIn"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>-->
      <?php
		if($login_session!="")
			{?>
			<div class="mainmenu pull-left">
				<ul class="nav navbar-nav collapse navbar-collapse">
					<li class="dropdown"><a href="#"><?php echo $login_session; ?>
				<i class="fa fa-angle-down"></i></a>
			<ul role="menu" class="sub-menu">
			<li><a style="background: transparent" href="logout.php">Logout</a></li>
				</ul>
				</li> 
			</ul>
			</div>
								
		<?php	}
				else
				{	?>
	         <li style="font-size: 15px; font-weight: 900; " ><a href="#/register"  ><span class="glyphicon glyphicon-user"></span> REGISTER AS DONAR</a></li>			
          <li><a href="#/login"><i class="fa fa-lock"></i> Login</a></li>
				<?php	}	?>
    </ul>
    </div>
  </div>
 
</nav>
        
        <div class="container-fluid" >        
            <div class="row" ng-view>
                
            </div>

    
     
        </div>
        <?php
        // put your code here
        ?>
       
        
<!--   <footer>
 <a class="navbar-brand" href="#" >HOME</a>
  <a class="navbar-brand" href="#" >|</a>
<a class="navbar-brand" href="#"  >SEARCH DONORS</a>
  <a class="navbar-brand" href="#" >|</a>
<a class="navbar-brand" href="#" >BLOOD TIPS</a>
  <a class="navbar-brand" href="#" >|</a>
<a class="navbar-brand" href="#" >ABOUT US</a>
  <a class="navbar-brand" href="#" >|</a>
<a class="navbar-brand" href="#" >REGISTER AS DONOR</a>
  <a class="navbar-brand" href="#" >|</a>
<a class="navbar-brand" href="#" >LOGIN</a>
&emsp; &emsp; &emsp; &emsp;&emsp; &emsp; &emsp; &emsp;
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-linkedin"></a>
<a href="#" class="fa fa-youtube"></a>
       

    </footer>-->
    </body>
    <div>
    <footer class="footer-distributed">

			<div class="footer-right">

				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>

			</div>

			<div class="footer-left">

				<p class="footer-links">
					<a href="#">HOME</a>
					·
					<a href="#">SEARCH DON0RS</a>
					·
					<a href="#">BLOOD TIPS</a>
					·
					<a href="#">ABOUT US</a>
					·
					<a href="#">REGISTER AS DONOR</a>
					·
					
				</p>

			</div>

		</footer> 
    </div>
</html>

<?php
if(isset($_POST["submit1"])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
 session_start();
 if($_SERVER["REQUEST_METHOD"] == "POST") 
 {
      $error = "";
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM registration WHERE email_id = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) 
      {
         $_SESSION['username'] = $username;
         //echo $_SESSION['username'];
//		 if($_SESSION['username']!="jaggu@gmail.com")
//			header("location: index.php");
////		else
//////			header("location: adminindex.php");
  }
      else {
         $error = "Your Login Name or Password is invalid";
      }
   }
   $conn->close();
}
?>

