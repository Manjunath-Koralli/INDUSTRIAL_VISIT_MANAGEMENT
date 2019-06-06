<?php
include ('connection.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	$check_email = mysqli_query($dbc, "SELECT FROM useraccount WHERE email=$email ");
	if(mysqli_num_rows($check_email) == 1){
		$sql="UPDATE `useraccount` SET password='$pwd' WHERE email='$check_email' ";
		if(mysqli_query($dbc,$sql)){
			echo '<script language="javascript">';
			echo 'alert("Password Changed")';
			echo '</script>';
			header("Location:index.php");
		}
	}
	else{
		echo '<script language="javascript">';
			echo 'alert("Not registered")';
			echo '</script>';
			header("Location:index.php");
		
	}
		
}


?>


<html>
<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid"><br>
   <ul class="nav navbar-nav" style="align:center">
	  <li ><a href="" style="color:white;font-size:25px;text-align:center" ><i><b>BINGO</i></b></a></li>
    </ul>
</div>
</nav>
<br>
<br>
<br>
<br>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<div class="panel panel-default"  style="margin-top:10px;width:500px;">
	<div class="panel-heading">
		<h2><p class="text-info" align="center"><span>Forgot Password</span></p></h2>
	</div>
	<div class="panel-body">
		<form method='POST' action='forgotpassword.php'>
			<div class='input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>
				<input type="email" class="form-control" name="email" id="email" placeholder="Email">
			</div>
			<br>
			<div class="input-group">
				<span class='input-group-addon'> <i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" class="form-control" name="pwd" placeholder="Password" id="pwd">
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href='index.php' class='btn btn-info' role='button' style='float:right;'>Back</a>
		</form>
			
	</div>
</div>
</div>
<div class="col-sm-4"></div>
</body>
</html>