//user registration
<?php

include ('connection.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
	$name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phnum'];
	$password=$_POST['pwd'];
	$gender=$_POST['gender'];
	if(!empty($name) && !empty($email) && !empty($phone)  && !empty($password) && !empty($gender)){
        //include ('connection.php');
        mysqli_query($dbc,"INSERT INTO useraccount(p_name,email,password,contact,gender) VALUES ('$name','$email','$password','$phone','$gender')");
    

		echo '<script language="javascript">';
        echo 'alert("values inserted successfully")';
        echo '</script>';

        header("Location:profile.php");
    }

    else{
        echo '<script language="javascript">';
        echo 'alert("ERROR:You left some values blank!!")';
        echo '</script>';
    }
}
?>