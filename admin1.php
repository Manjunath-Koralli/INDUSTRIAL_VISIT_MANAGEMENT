<?php
include('connection.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	session_start();
    $time_zone = date_default_timezone_get("indian/mahe");

    $amail = 'admin';
    $password = 'admin';

    $pmail = mysqli_real_escape_string($dbc, $_POST['adminusn']);
    $lgpassword = mysqli_real_escape_string($dbc, $_POST['apass']);

    if (!empty($pmail) && !empty($lgpassword)) {
        if (($pmail == $amail) && ($lgpassword == $password)) {
            header("Location:admin.php");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("login unsucessfull!!wrong password or username!!")';
            echo '</script>';
        }
    }
}
?>