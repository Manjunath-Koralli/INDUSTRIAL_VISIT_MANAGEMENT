<html>
<body>
<?php
	include ('connection.php');
	$q=$_GET['id'];
	//echo $q;
	$sql="UPDATE `package` SET status=0 WHERE p_id =$q";
	if(mysqli_query($dbc,$sql)){
		echo '<script language="javascript">';
        echo 'alert("Package removed")';
        echo '</script>';
	}
	header("Location:view.php");

?>
</body>
</html>