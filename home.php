<?php

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
			background-color: blue;
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
      <li class="active"><a href="home.php" ><i><b>Home</i></b></a></li>
      <li><a href="aboutus.php"><i><b>About</i></b></a></li>
      <li><a href="packages.php"><i><b>Packages</i></b></a></li>
	  <li><a href="contactus.php"><i><b>Contact us</i></b></a></li>
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
			<img src="jcb.jpg" alt="New york" style="width:100%;">
		</div>
		
		<div class="item ">
			<img src="infi.jpg" alt="Los Angeles" style="width:100%;">
		</div>
		
		<div class="item">
			<img src="infi4.jpg" alt="New york" style="width:100%;">
		</div>
		
		<div class="item">
			<img src="infi1.jpg" alt="New york" style="width:100%;">
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
<br>
<br>
<!--feedback-->
<div class="container1" style="background-color:#999999;">
<div class="container">
	<h2 style="text-align:center"><b><i>We Provide Affordable Prices</i></b></h2>
	<h3 style="text-align:center"><i>Well educated, intellectual people, especially scientists at all times demonstrate considerably.</i></h3>
	<br><br><br>
	<i><h4 style="text-align:center;color:#124181;">Our Members Love Us</h4></i>
	<br>
	<?php
            $hostname="localhost";
			$username="root";
			$password1="";
			$dbname="ivweb";
			$dbc=new mysqli($hostname,$username,$password1,$dbname);
			if ($dbc->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$sql ="SELECT * FROM contact_us";
			$r=$dbc->query($sql);
			$rows = $r->num_rows;
			if($rows > 0) {
				$cols = 3;    // Define number of columns
				$counter = 1;     // Counter used to identify if we need to start or end a row
				$nbsp = $cols - ($rows % $cols);
				//$container_class = 'container-fluid';  //Parent container class name
				$row_class = 'row';    // Row class name
				$col_class = 'col-sm-4'; // Column class name
				while ($item = $r->fetch_array()) {
					if(($counter % $cols) == 1) {    // Check if it's new row
						echo '<div class="'.$row_class.'">'; // Start a new row
					}
					echo   "<div class=\"col-sm-4\">
									<div class=\"card\" style=\"width:30rem;background-color:#CCCCCC;\">
									<div class=\"card-body\">
										<br>
										<h5 class=\"card-title\" style=\"margin-left:20px\"><i>$item[p_name]</i></h5>
										<p style=\"margin-left:5px\">--------------------------------------------------------------</p>
										<p class=\"card-text\" style=\"margin-left:20px\">$item[message]<br></p>
										
									</div>
									<br>
									</div><br><br>
								
							</div>";
					if(($counter % $cols)== 0) { // If it's last column in each row then counter remainder will be zero
						echo '</div>'; //  Close the row
					}
					$counter++;    // Increase the counter
				}
				if($nbsp > 0) { // Adjustment to add unused column in last row if they exist
					for ($i = 0; $i < $nbsp; $i++) { 
						echo '<div class="'.$col_class.'">&nbsp;</div>'; 
					}
					echo '</div>';  // Close the row
				}
				echo '</div>';  // Close the container
			}
				
			
		?>
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