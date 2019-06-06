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
      <li><a href="home.php" ><i><b>Home</i></b></a></li>
      <li><a href="aboutus.php"><i><b>About</i></b></a></li>
      <li class="active"><a href="packages.php"><i><b>Packages</i></b></a></li>
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
<br>
<br>

 

<!--popular destinations-->
<div class="container1" style="background-color:#CC9933;">
<div class="container">
<h2 style="text-align:center"><b>Popular Destinations</b></h2>
	<?php
            $hostname="localhost";
			$username="root";
			$password1="";
			$dbname="ivweb";
			$dbc=new mysqli($hostname,$username,$password1,$dbname);
			if ($dbc->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$sql ="SELECT * FROM package WHERE status=1";
			$r=$dbc->query($sql);
			$rows = $r->num_rows; 
			if($rows > 0) {
				$cols = 3;    // Define number of columns
				$counter = 1;     // Counter used to identify if we need to start or end a row
				$nbsp = $cols - ($rows % $cols);
				//$container_class = 'container-fluid';  //Parent container class name
				$row_class = 'row';    // Row class name
				$col_class = 'col-sm-4'; // Column class name(grid sys)
				while ($item = $r->fetch_array()) {
					if(($counter % $cols) == 1) {    // Check if it's new row
						echo '<div class="'.$row_class.'">'; // Start a new row
					}
					echo   "<div class=\"col-sm-4\">
									<div class=\"card\" style=\"width:30rem;background-color:#DDDDDD;border-style: solid;border-radius:10px;\">
									<div class=\"card-body\">
										<br>
										<i><h5 class=\"card-title\" style=\"margin-left:10px;\"><b>Name</b> : $item[pack_name]</h5><hr>
										<p class=\"card-text\">
										<h5 style=\"margin-left:10px;\"><b>Duration</b>:$item[duration]</h5><hr><br>
										<h5 style=\"margin-left:10px;\"><b>Email_Id</b>:$item[email]</h5><hr><br>
										<h5 style=\"margin-left:10px;\"><b>Location</b>:$item[p_location]</h5><hr><br>
										<h5 style=\"margin-left:10px;\"><b>Price(per person)</b>:$item[price] </h5>
										</p><hr></i>
										<a href=\"view1.php?id=$item[p_id]\" class=\"btn btn-primary\" style=\"margin-left:120px\">View Complete details</a>
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
      <a href="https://mdbootstrap.com/bootstrap-tutorial/"> bingo.com</a>
    </div>
    <!-- Copyright -->
</div>

</div>
</body>
</html>