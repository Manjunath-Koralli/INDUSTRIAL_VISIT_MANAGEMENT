<?php
include ('connection.php');
	if(isset($_POST['update'])){
		$q = mysqli_real_escape_string($dbc, $_POST['id']);
		echo $q;
		$pname=$_POST['packname'];
		$powner=$_POST['ownername'];
		$email=$_POST['email-id'];
		$contact=$_POST['contact_no'];
		$address=$_POST['addr'];
		$p_location=$_POST['place'];
		$i_location=$_POST['intermediate_routes'];
		$price=$_POST['price'];
		$duration=$_POST['duration'];
		mysqli_query($dbc,"UPDATE `package` set pack_name='$pname' WHERE p_id=$q ");
		mysqli_query($dbc,"UPDATE `package` set powner_name='$powner' WHERE p_id=$q ");
		mysqli_query($dbc,"UPDATE `package` set email='$email' WHERE p_id_id=$q ");
		mysqli_query($dbc,"UPDATE `package` set contact='$contact' WHERE p_id=$q ");
		mysqli_query($dbc,"UPDATE `package` set address='$address' WHERE p_id=$q ");
		mysqli_query($dbc,"UPDATE `package` set p_location='$p_location' WHERE p_id=$q ");
		mysqli_query($dbc,"UPDATE `package` set i_locations='$i_location' WHERE p_id=$q ");
		mysqli_query($dbc,"UPDATE `package` set price='$price' WHERE p_id=$q ");
		mysqli_query($dbc,"UPDATE `package` set duration='$duration' WHERE p_id=$q ");
		
		header("Location:view.php");
	}

?>
<?php
	$q=$_GET['id'];
	//echo $q;
	echo mysqli_error($dbc);
	$sql="SELECT * FROM package WHERE p_id = '".$q."'";
	$result = mysqli_query($dbc,$sql);
	$row = mysqli_fetch_array($result);
	
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
   <ul class="nav navbar-nav" >
	  <li><a href="" style="color:white;font-size:25px;text-align:center" ><i><b>BINGO</i></b></a></li>
    </ul>
</div>
</nav>
<br>
<br>
 <div class="panel panel-default"  style="margin-top:10px;width:1000px;margin-left:200px;">
	<div class="panel-heading">
		<i><h2><p class="text-info" align="center"><span>UPDATE INFORMATION</span></p></h2></i>
	</div>
	<div class="panel-body">
		<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
		<form method='POST' action='update.php'>
					
			<div class='input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input type='text' name='packname' class='form-control' pattern='[A-Za-z ]*' size='30' maxlength='40' value="<?php echo $row['pack_name'];?>"  required>
			</div>
			<br>
			<div class='input-group'>
				<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
				<input type='text' name='ownername' class='form-control' pattern='[A-Za-z ]*' size="30" maxlength="40" value="<?php echo $row['powner_name'];?>" required>
			</div>
			<br>
			<div class="input-group">
				<span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>
				<input type='email' name='email-id' class='form-control' pattern='[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$'  size='30' maxlength='40' value="<?php echo $row['email'];?>" required>
			</div>
			<br>
			<div class="input-group">
				<span class='input-group-addon'><i class='glyphicon glyphicon-phone'></i></span>
				<input type='tel' name='contact_no' class='form-control'  size='30' minlength='10' maxlength='10' value="<?php echo $row['contact'];?>" required>
			</div>
			<br>
			<div class="input-group">
				<span class='input-group-addon'><i class='glyphicon glyphicon-globe'></i></span>
				<input type='text' name='addr' class='form-control'  size='30' maxlength='40' value="<?php echo $row['address'];?>" required>
			</div>
			<br>
			<div class="input-group">
				<span class='input-group-addon'><i class='glyphicon glyphicon-map-marker'></i></span>
				<input type='text' name='place' class='form-control' size='30'  pattern='[A-Za-z]*' maxlength='40' value="<?php echo $row['p_location'];?>" required>
			</div>
			<br>
			<div class="input-group">
				<span class='input-group-addon'><i class='glyphicon glyphicon-map-marker'></i></span>
				<input type='text' name='intermediate_routes' class='form-control'  size='30' maxlength='40' value="<?php echo $row['i_locations'];?>" required>
			</div>
			<br>
			<div class="input-group">
				<span class='input-group-addon'><i class='glyphicon glyphicon-credit-card'></i></span>
				<input type='text' name='price'  class='form-control'  size='30' maxlength=40' value="<?php echo $row['price'];?>" required>
			</div>
			<br>
			<div class="input-group">
				<span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>
				<input type='text' name='duration'  class='form-control' size='30' maxlength='40' value="<?php echo $row['duration'];?>" required>
			</div>
			<br>
			<input type="hidden" name="id" value='<?php echo $_GET['id'];?>' >
			<input type='submit' class='btn btn-danger' name="update" value='UPDATE'>
			<a href='view.php' class='btn btn-info' role='button' style='float:right;'>BACK</a>
			
			<br>
		</form>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>


</body>
</html>