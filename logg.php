<?php 

include 'configure.php';

session_start();

error_reporting(0);



if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: home-soft.html");
	} 
	else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>