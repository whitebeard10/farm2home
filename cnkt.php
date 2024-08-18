<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "cart_system";
 
$conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>