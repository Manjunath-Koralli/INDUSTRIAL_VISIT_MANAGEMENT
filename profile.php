<?php
include('connection.php');
session_start();
$pmail=$_SESSION['pemail-id'];
$r = mysqli_query($dbc, "SELECT * FROM useraccount where email LIKE '$pmail' ");
$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
$id=$row['p_id'];
$pname=$row['p_name'];
$email=$row['email'];
$contact=$row['contact'];
$gender=$row['gender'];

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif;}

.sidebar {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 80px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 12px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
	margin-left:370px;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
    padding: 2px 16px;
}
</style>
</head>
<body>
<!--navigation bar-->
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid"><br>
   <ul class="nav navbar-nav">
	  <li><a href="" style="color:white;font-size:25px;"><i><b>BINGO</i></b></a></li>
      <li><a href="home.php" ><i><b>Home</i></b></a></li>
      <li><a href="aboutus.php"><i><b>About</i></b></a></li>
      <li><a href="packages.php"><i><b>Packages</i></b></a></li>
	  <li><a href="contactus.php"><i><b>Contact us</i></b></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right" style="margin-right:10px">
		
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span><i><b>  Logout</i></b></a></li>
    </ul>
</div>
</nav>
<br>
<br>
<br>
<!--side bar-->
<div class="sidebar">
  <i><a href="#profile">Profile</a></i>
  <i><a href="#book">Your Bookings</a></i>
  
</div>
<br>
<div class="main">
	<div id="profile" >
		<i><h2 style="margin-left:370px;">Your Profile</h2></i>
		<div class="card" >
			<?php
				if($gender == 'Male' ){
					echo "<img src='img_avatar1.png' alt='Avatar' style='width:100%'>";
				}
				if($gender == 'Female' ){
					echo "<img src='img_avatar2.png' alt='Avatar' style='width:100%'>";
				}
			?>
			<div class="container" >
			
				<h4><b><?php echo $pname;?></b></h4> 
				<p><?php echo $email;?></p> 
				<p><?php echo $contact;?></p> 
				
			</div>
		</div>
	</div>
	<hr style='height:2px;border:none;color:#333;background-color:#333;'>
	<div id="book">
		<div class="panel panel-default"  style="margin-top:10px;width:1000px;margin-left:30px;">
			<div class="panel-heading">
				<i><h2><p class="text-info" align="center"><span>Your Bookings</span></p></h2></i>
			</div>
			<div class="panel-body">
			<?php
				include ('connection.php');
				$r = mysqli_query($dbc, "SELECT * FROM booking WHERE email LIKE '$pmail'  ");
				if(mysqli_num_rows($r)>0){
					while ($arr=mysqli_fetch_array($r) ) {
						$id=$arr[0];
						
						$s=mysqli_query($dbc, "SELECT * FROM bookandpack WHERE book_id=$id  ");
						while ($arr1=mysqli_fetch_array($s) ) {
							echo "<pre><p>Package Name:$arr1[2]</p><p>Departure Date:$arr[5]</p><p>Return Date:$arr[6]</p><p>No of people:$arr[7]</p><p>Additional Requirements:$arr[8]</p></pre>
									<hr style='height:2px;border:none;color:#333;background-color:#333;'>";
						}
					}
				}
				else{
					echo "<pre><p>No Bookings yet</p></pre>" ;
					
				}
				
		
			?>
			</div>
		</div>
	</div>
  
</div>
     
</body>
</html> 
