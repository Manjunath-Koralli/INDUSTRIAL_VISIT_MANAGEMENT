<html>
<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a href="" style="color:black;font-size:25px;text-align:center"><i><b>BINGO</i></b></a>
    </li>
    
  </ul>
</nav>

<br>
<!--details-->
<div class="container">
	<h2>PACKAGE DETAILS</h2>
	<?php
		include ('connection.php');
		$q=$_GET['id'];
		$r = mysqli_query($dbc, "SELECT * FROM package WHERE p_id=$q; ");
		if(mysqli_num_rows($r)>0){
            while ($arr=mysqli_fetch_array($r) ) {
				$id=$arr[0];
				
				echo "<div class='card'>
					<div class='card-header'>Package Name:$arr[1]<br>Package ID:$arr[0]</div>
						<div class='card-body'>Details:
							<pre><p><b>Company name:$arr[1]	Email:$arr[3]	Contact:$arr[4]	Address:$arr[5]</b></p><br><p><b>Location:$arr[6]	Intermediate Locations:$arr[7]	Price(per person):$arr[8]	Duration:$arr[9]</b></p></pre>
							<pre><p><b>About the company:$arr[10]</p></b></pre>
							<a href='images1.php?id=$id'>View Images</a>
						</div> 
						<div class='card-footer'>
						<a href='book.php?id=$id' class='btn btn-info' role='button' value='$id' style='float:left;'>Book</a>
						<a href='packages.php' class='btn btn-info' role='button' style='float:right;'>Back</a>
						</div>
					</div>";
				
			}
		}
	?>
</div>
</body>
</html>


