<?php
include('connection.php');
session_start();
$pmail=$_SESSION['pemail-id'];
$r = mysqli_query($dbc, "SELECT * FROM useraccount where email LIKE '$pmail' ");
$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
$id=$row['p_id'];
$pname=$row['p_name'];
$email=$row['email'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	

	$msg=$_POST['comment'];
	
	if(!empty($pname) && !empty($email) && !empty($msg)){
		$query= "INSERT INTO contact_us(p_id,p_name,email,message) VALUES ($id,'$pname','$email','$msg')";
		if(mysqli_query($dbc,$query)){
			
			echo '<script language="javascript">';
			echo 'alert("Your msg has been sent")';
			echo '</script>';
		}
		
	}
	else{
		echo '<script language="javascript">';
        echo 'alert("Your msg couldnt be sent")';
        echo '</script>';
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
	</style>
</head>

<body>
<script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>

<!--navigation bar-->
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid"><br>
   <ul class="nav navbar-nav">
	  <li><a href="" style="color:white;font-size:25px;"><i><b>BINGO</i></b></a></li>
      <li><a href="home.php"><i><b>Home</i></b></a></li>
      <li ><a href="aboutus.php" ><i><b>About</i></b></a></li>
      <li><a href="packages.php"><i><b>Packages</i></b></a></li>
	  <li class="active"><a href="contactus.php"><i><b>Contact us</i></b></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right" style="margin-right:10px">
		<li><a href="profile.php"><span class="glyphicon glyphicon-user"></span><i><b>  Profile</i></b></a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span><i><b>  Logout</i></b></a></li>
    </ul>
</div>
</nav>
<br>
<br>
<br>
<br>

<!--carousel-->
<div class="container" >
<div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
	<div class="item active">
			<img src="infi1.jpg" alt="New york" style="width:100%;">
		</div>
		<div class="item">
			<img src="infi.jpg" alt="Los Angeles" style="width:100%;">
		</div>
	
		<div class="item">
			<img src="jcb.jpg" alt="New york" style="width:100%;">
		</div>
		
		<div class="item">
			<img src="infi4.jpg" alt="New york" style="width:100%;">
		</div>
		
		<div class="item">
			<img src="sap1.jpg" alt="New york" style="width:100%;">
		</div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</div>
<div class="container">
<br>
<br>
<br>
<br>

<!--contact us-->
<div class="container">
<div class="row">
	<div class="col-sm-4">
		<p>Contact us and we'll get back to you within 24 hours.</p>
		<p> <span class="glyphicon glyphicon-map-marker"></span> Mangalore</p>  
		<p> <span class="glyphicon glyphicon-phone"></span> 9449991174 </p> 
		<p> <span class="glyphicon glyphicon-envelope"></span> bingo@gmail.com</p>   
	</div>
	<div class="col-sm-8">
	<p style="text-align:center;">FEEDBACK</p>
		<form action="contactus.php" method="Post">
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
			<input type='text' class='form-control'  name='name'  value="<?php echo $pname;?>"  required disabled>
		</div>
			<br>
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>
			<input type='email' class='form-control' name='email'  value="<?php echo $email;?>" required disabled>
		</div>
			<br>
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>
			<textarea class="form-control" rows="5" name="comment"  placeholder="Message" required></textarea>
		</div>
			<br>
		<input type="submit" class="btn btn-primary"  value="SUBMIT" style="float:right;">
		</form>
	</div>
</div>
</div>
<br>
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