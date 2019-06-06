<?php
//error_reporting(0);
include('connection.php');
session_start();

//userlogin
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
    $time_zone = date_default_timezone_get("indian/mahe");
    //include('connection.php');

    $pmail = mysqli_real_escape_string($dbc, $_POST['pemail-id']);
    $_SESSION['pemail-id'] = $pmail; //our details are stored like (email,nm)can be used in other.php's(i.e home.php)
    $lgpassword = mysqli_real_escape_string($dbc, $_POST['ppassword']);
    $_SESSION['ppassword'] = $lgpassword;
	
	if(!empty($pmail) && !empty($lgpassword)) {
        $check_database_query = mysqli_query($dbc, "SELECT *FROM useraccount WHERE email='$pmail' AND password='$lgpassword'");
        $check_login_query = mysqli_fetch_array($check_database_query, MYSQLI_ASSOC);
        $count = mysqli_num_rows($check_database_query);
        if ($count == 1) {
            $_SESSION['pemail-id'] = $pmail;
            header("Location:home.php");
        } else {
            echo '<script language="javascript">';
            echo 'alert("login unsucessfull!!wrong password or email!!")';
            echo '</script>';
        }
    }
}


?>

<html>
<head>
<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
		.card:hover{
			opacity: 0.5;
		}
		.footer {
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color:blue;
			color: white;
			text-align: center;
		}
		body{
			background-image: url("leaf.jpg");
			
		}
	</style>
</head>

<body >

<script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
<!--nav-->
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid"><br>
	
	<h2 style="text-align:center;color:white"><i>BINGO</i></h2>
</div>
</nav>
<br>
<br>
<br>
<br>
<br>
<br>
<!--tabs-->
<div class="container" >
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4" style="border-style: groove;">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#ulogin">User Login</a></li>
				<li><a data-toggle="tab" href="#usignin">User Sign in</a></li>
				<li><a data-toggle="tab" href="#alogin">Admin Login</a></li>
				
			</ul>
			
			<!--tabs-->
			<div class="tab-content">
			<div id="ulogin" class="tab-pane fade in active">
			<hr>
			<br>
			
				<form action="index.php" method="Post">
					<div class='input-group'>
						<span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>
						<input type="email" class="form-control" name="pemail-id" id="email" placeholder="Email">
					</div>
					<br>
					<div class="input-group">
						<span class='input-group-addon'> <i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" name="ppassword" placeholder="Password" id="pwd">
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Submit</button>
					
				</form>
				
			</div>
			<div id="usignin" class="tab-pane fade">
			<hr>
			<br>
				<form action="signin.php" method="Post">
					<div class="input-group">
						<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
						<input type="text" class="form-control" placeholder="User name" name="name" pattern="[A-Za-z ]*" required>
					</div>
					<br>
					<div class="input-group">
						<span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>
						<input type="email" class="form-control" name="email" placeholder="Email" required>
					</div>
					<br>
					<div class="input-group">
						<span class='input-group-addon'> <i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" placeholder="Password" name="pwd" required>
					</div>
					<br>
					<div class="input-group">
						<span class='input-group-addon'> <i class="glyphicon glyphicon-phone"></i></span>
						<input type="tel" class="form-control" name="phnum" placeholder="Contact" pattern="[0-9]{10}" maxlength="10"  required>
					</div>
					<br>
					<h4><p> Gender :    <input type="radio" name="gender" value="Male" />Male
                        <input type="radio" name="gender" value="Female"/> Female</p></h4>
					<br>
					<input type="submit" value="Submit" class="btn btn-primary">
				</form>
			</div>
			<div id="alogin" class="tab-pane fade">
			<hr>
			<br>
		
				<form action="admin1.php" method="Post">
					<div class="input-group">
						<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
						<input type="text" class="form-control" placeholder="Admin Name" id="email" name="adminusn" required>
					</div>
					<br>
					<div class="input-group">
						<span class='input-group-addon'> <i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" placeholder="password" name="apass" id="pwd" required>
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			
    </div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
<br>
<br>

<!--footer-->
<div class="footer">
	<!--links-->
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<ion-icon name="logo-facebook"></ion-icon>
			<ion-icon name="logo-whatsapp"></ion-icon>
			<ion-icon name="logo-instagram"></ion-icon>
		</div>
		<div class="col-sm-4"></div>
	</div>
	
  <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://mdbootstrap.com/bootstrap-tutorial/">bingo.com</a>
    </div>
    <!-- Copyright -->
</div>
</body>
</html>