<?php

$server="localhost";
$username="root";
$password="";
$database="login_register";

$conn=mysqli_connect($server, $username, $password, $database);

if(!$conn){
    die( "<script>alert('connection failed.')</script>");

}

?>