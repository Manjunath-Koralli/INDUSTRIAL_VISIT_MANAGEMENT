<html>
<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body{
			background-image: url("leaf.jpg");
			
		}
	</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid"><br>
   <ul class="nav navbar-nav" >
	  <li><a href="" style="color:white;font-size:25px;text-align:center" ><i><b>BINGO</i></b></a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right" style="margin-right:10px">
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	</ul>
</div>
</nav>
<br>
<br>
<br>
<!--details-->
<div class="container">

<div class="panel panel-default"  style="margin-top:10px;width:1000px;margin-left:100px;">
	<div class="panel-heading">
	<i><h2><p class="text-info" align="center"><span></span></p></h2></i>
	</div>
	<div class="panel-body">
	<h2>PACKAGE DETAILS</h2>
	<?php
		include ('connection.php');
		$r = mysqli_query($dbc, "SELECT * FROM package WHERE status=1 ");
		if(mysqli_num_rows($r)>0){
            while ($arr=mysqli_fetch_array($r) ) {
				$id=$arr[0];
				$r1=mysqli_query($dbc,"SELECT * FROM images WHERE id=$id");
				echo "<div class='card'>
					<pre><div class='card-header'>Package Name:$arr[1]</div></pre>
						<div class='card-body'><h4><i>Details:</i></h4>
						
							<pre><p><b>Company name:$arr[1]	Email:$arr[3]	Contact:$arr[4]	Address:$arr[5]</b></p><br><p><b>Location:$arr[6]	Intermediate Locations:$arr[7]	Price(per person):$arr[8]	Duration:$arr[9]</b></p></pre>
							<a href='images.php?id=$id'>View Images</a>
						</div> 
						<br>
						<div class='card-footer'>
						<a href='update.php?id=$id' class='btn btn-info' value='$id'  role='button'>Update</a>
						<a href='delete.php?id=$id' class='btn btn-danger' value='$id'  role='button' style='margin-left:400px;'>Delete</a>
						<a href='admin.php' class='btn btn-info' role='button' style='float:right;'>Back</a>
						</div>
					</div>
					<hr style='height:2px;border:none;color:#333;background-color:#333;'>
					<br>";
				
			}
		}
		else{
			echo "<div class='card'>
					<div class='card-header'></div>
						<div class='card-body'><h4><i>No Posts</i></h4>
							
							
						</div> 
						<br>
						<div class='card-footer'>
						
						</div>
					</div>";
			
		}
		
	?>
	</div>
</div>
</body>
</html>


