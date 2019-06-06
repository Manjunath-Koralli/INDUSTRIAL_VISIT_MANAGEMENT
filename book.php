<?php
	include ('connection.php');
	$q=isset($_GET['id']) ? $_GET['id'] : '';
	$sql="SELECT * FROM package WHERE p_id = '".$q."'";
	$result = mysqli_query($dbc,$sql);
	$rows = mysqli_fetch_array($result);
	
	$packagename=$rows['pack_name'];
	$packageid=$rows['p_id'];
?>
<?php
	include ('connection.php');

	$date=date("Y-m-d");
	session_start();


	$pmail=$_SESSION['pemail-id'];
	$r = mysqli_query($dbc, "SELECT * FROM useraccount where email LIKE '$pmail' ");
	$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
	$id=$row['p_id'];
	$pname=$row['p_name'];
	$email=$row['email'];
	$contact=$row['contact'];
	//echo $packagename,$packageid;


if(isset($_POST['submit'])){
	//if($_SERVER['REQUEST_METHOD']=='POST'){
		$ddate=$_POST['date1'];
		$rdate=$_POST['date2'];
		$noppl=$_POST['ppl'];
		$addreq=$_POST['requirements'];
		$packname=isset($_POST['packname'])? $_POST['packname'] : '';
		$packid=isset($_POST['packid'])? $_POST['packid'] : '';
		
		
		if(!empty($ddate)  && !empty($rdate) && !empty($noppl) && !empty($addreq) &&!empty($pname) &&  !empty($email) 
			&& !empty($contact)){
			mysqli_query($dbc,"INSERT INTO booking(personal_id,p_name,email,contact,d_date,r_date,no_ppl,add_req) 
				VALUES ($id,'$pname','$email','$contact','$ddate','$rdate','$noppl','$addreq')");
			$last1_id=$dbc->insert_id;
			mysqli_query($dbc,"INSERT INTO bookandpack(book_id,packageid,packagename) 
				VALUES ($last1_id,$packid,'$packname')");
			echo '<script language="javascript">';
			echo 'alert("Your  Booking Succesfull")';
			echo '</script>';
			header("Location:profile.php");
			
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Couldnt Book")';
			echo '</script>';
		}
	
}


?>
<html>
<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<!--<nav class="navbar navbar-expand-sm bg-dark justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a href="" style="color:white;font-size:25px;text-align:center"><i><b>BINGO</i></b></a>
    </li>
    
  </ul>
</nav>-->
<br>
<br>
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<div class="card" style="width:100%;background-color:white;align:center;margin-top:10px;">
				<div class="card-body">
					<h5 class="card-title" style="text-align:center">Booking Form</h5>
					<br>
					<hr>
					<form action="book.php" method="Post">
						<div class="input-group">
							<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
							<input type="text" class="form-control"  name="name" pattern="[A-Za-z]*" value="<?php echo $pname; ?>" required disabled>
						</div>
						<br>
						<div class='input-group'>
							<span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>
							<input type="email" class="form-control" id="" name="email" value="<?php echo $email; ?>" disabled>
						</div>
						<br>
						<div class="input-group">
							<span class='input-group-addon'> <i class="glyphicon glyphicon-phone"></i></span>
							<input type="tel" class="form-control" name="phnum"  pattern="[0-9]{10}" maxlength="10" value="<?php echo $contact; ?>" required disabled>
						</div>
						<br>
						<div class="input-group">
							<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
							<input type='text' class='form-control'  name='packname'  pattern='[A-Za-z ]*' value="<?php echo $packagename; ?>" required readonly>
						</div>
						<br>
						<div class="input-group">
							<label>Package ID</label>
								<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
							<input type='text' class='form-control'  name='packid'  value="<?php echo $packageid; ?>" required readonly>
						</div>
						<br>
						<div class="form-group">
							<label>Departure Date</label>
							<span class='input-group-addon'> <i class="glyphicon glyphicon-calendar"></i></span>
							<input type="text" class="form-control" name="date1" placeholder="yyyy-mm-dd" required>
						</div>
						
						<div class="form-group">
							<label> Return Date </label>
							<span class='input-group-addon'> <i class="glyphicon glyphicon-calendar"></i></span>
							<input type="text" class="form-control" name="date2" placeholder="yyyy-mm-dd"   required>
						</div>
						<br>
						
						<div class="input-group">
							<span class='input-group-addon'> <i class="glyphicon glyphicon-map-marker"></i></span>
							<input type="number" class="form-control" name="ppl" placeholder="No. of People" min="10" max="1000"  required>
						</div>
						<br>
						<div class="input-group">
							<textarea class="form-control" rows="5" name="requirements" placeholder="Additional requirements"></textarea>
						</div>
						<br>
						<input type="hidden" name="id" value='<?php echo $_GET['id'];?>' >
						<input type="submit" name="submit" class="btn btn-primary" value="submit"/>
						<a href='packages.php' class='btn btn-info' role='button' style='float:right;'>Back</a>
					</form>
					
					
				</div>
		</div>
		<br>
	</div>
	<div class="col-sm-3"></div>
</div>
</body>
</html>