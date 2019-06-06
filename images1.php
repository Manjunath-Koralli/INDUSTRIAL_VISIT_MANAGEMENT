<html>
<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

<!--images-->
<div class="container">
	<h2>PACKAGE DETAILS</h2>
	<div class='card'>
		<div class='card-header'></div>
		<div class='card-body' style="width:auto">
				<?php
					include ('connection.php');
					$q=$_GET['id'];
					//echo $q;
					echo mysqli_error($dbc);
					$r1=mysqli_query($dbc,"SELECT * FROM images WHERE id=$q");
					if(mysqli_num_rows($r1)>0){
						while ($arr=mysqli_fetch_array($r1) ) {
							$imageURL = 'uploads/'.$arr["file_name"];
								echo"<img style=\"border-style: solid;border-radius:10px;\" src=$imageURL alt='' /> <br><br>";
						}
					}
				?>
		
		</div> 
		<div class='card-footer'>
			
		</div>
		</div>
		
	

</div>
</body>
</html>


