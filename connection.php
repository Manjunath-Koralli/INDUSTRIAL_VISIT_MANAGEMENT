<?php

$hostname="localhost";
$username="root";
$password1="";
$dbname="ivweb";
$dbc=mysqli_connect($hostname,$username,$password1,$dbname) or die("could not connect");
//var_dump($dbc);
mysqli_set_charset($dbc,"utf8");
?>