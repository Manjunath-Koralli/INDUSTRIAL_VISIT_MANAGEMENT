<?php

include ('connection.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
	$pname=$_POST['packname'];
	$powner=$_POST['ownername'];
	$email=$_POST['email-id'];
	$contact=$_POST['contact_no'];
	$address=$_POST['addr'];
	$p_location=$_POST['place'];
	$i_location=$_POST['intermediate_routes'];
	$price=$_POST['price'];
	$duration=$_POST['duration'];
	$abtcompany=$_POST['aboutcompany'];
	
	// File upload configuration(for uploading img.)
    $targetDir = "uploads/";
    $allowTypes = array('jpg','png','jpeg','gif');
	$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
	
	if(!empty($pname) && !empty($powner) && !empty($email)  && !empty($contact) && !empty($address) 
		&& !empty($p_location) && !empty($i_location) && !empty($price) && !empty($duration) && !empty($abtcompany)  
			&& !empty(array_filter($_FILES['files']['name']))){
        //include ('connection.php');
        mysqli_query($dbc,"INSERT INTO package(pack_name,powner_name,email,contact,address,p_location,i_locations,price,duration,about)
			VALUES ('$pname','$powner','$email','$contact','$address','$p_location','$i_location','$price','$duration','$abtcompany')");
		$last_id=$dbc->insert_id;
		
		 foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "($last_id,'".$fileName."', NOW()),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }
        
        if(!empty($insertValuesSQL)){
            $insertValuesSQL = trim($insertValuesSQL,',');
            // Insert image file name into database
            $insert = mysqli_query($dbc,"INSERT INTO images (id,file_name, uploaded_on) VALUES $insertValuesSQL");
			echo $insertValuesSQL;
			
            if($insert){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = "Files are uploaded successfully.".$errorMsg;
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
		 echo $statusMsg;
		echo '<script language="javascript">';
		echo 'alert("values inserted successfully")';
		echo '</script>';
		header("Location:view.php");
    }else{
        $statusMsg = 'Please select a file to upload.';
		
        echo '<script language="javascript">';
        echo 'alert("ERROR:You left some values blank!!")';
        echo '</script>';


    }
    
    // Display status message
   	
		
		
		
}

		
	

		


?>

<html>
<head>
<title></title>
	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body{
			background-image: url("h5.png");
			
		}
	</style>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid"><br>
	<ul class="nav navbar-nav">
		<li><a href="" style="color:white;font-size:25px;"><i><b>BINGO</i></b></a></li>
		<li><a href="admin.php"><i><b>Package Registration</i></b></a></li>
		<li><a href="view.php"><i><b>View</i></b></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right" style="margin-right:10px">
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
</div>
</nav>
<br>
<br>
<br>
<br>
<!--form-->
<div class="container">
<div class="jumbotron">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><p>Package Registration Form</p>
		<form action="admin.php" method="post" enctype="multipart/form-data">
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
			<input type="text" name="packname" class="form-control" pattern="[A-Za-z ]*" placeholder="Company Name" size="30" maxlength="40" required>
		</div>
		<br>
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
			<input type="text" name="ownername" class="form-control" pattern="[A-Za-z ]*" placeholder="Tours and Traveller  Name" size="30" maxlength="40" required>
		</div>
		<br>
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>
			<input type="email" name="email-id" class="form-control" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$" placeholder="Email-Id" size="30" maxlength="40" required>
		</div>
		<br>
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-phone'></i></span>
			<input type="tel" name="contact_no" class="form-control" placeholder="Contact" size="30" minlength="10" maxlength="10" required>
		</div>
		<br>
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-globe'></i></span>
			<input type="text" name="addr" class="form-control" placeholder="Address"  size="30" maxlength="40" required>
		</div>
		<br>
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-map-marker'></i></span>
			<input type="text" name="place"  class="form-control" placeholder="Location" size="30"  pattern="[A-Za-z]*" maxlength="40" required>
		</div>
		<br>
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-map-marker'></i></span>
			<input type="text" name="intermediate_routes" placeholder="Intermediate_routes/Locations"   class="form-control"  size="30" maxlength="40" required>
		</div>
		<br>
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-credit-card'></i></span>
			<input type="text" name="price" placeholder="Price(estimated-per person)" class="form-control"  size="30" maxlength="40" required>
		</div>
		<br>
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span>
			<input type="text" name="duration" placeholder="Duration" class="form-control" size="30" maxlength="40" required>
		</div>
		<br>
		<div class="input-group">
			<span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
			<textarea name="aboutcompany" placeholder="About the company" class="form-control" rows="5" required></textarea>
		</div>
		<br>
		
		<div class="input-group">
			Select Image Files to Upload:
			<input type="file" name="files[]"  multiple="multiple" required>
		</div>
		<br>
		<div class="input-group">
			<input type="submit" name="Submit" value="Submit"  >
		</div>
		</form>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</div>		
</body>
</html>





