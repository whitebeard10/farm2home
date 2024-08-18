<?php include 'configure.php';

if(isset($_POST['rsubmit'])){
  $rname = mysqli_real_escape_string($conn, $_POST['rname']);
  $rmail = mysqli_real_escape_string($conn, $_POST['rmail']);
  $rpass = $_POST['rpass'];
  $rcpass = $_POST['rcpass'];

  if($rpass == $rcpass){
    
    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $rname, $rmail, $rpass);

    // Execute the statement
    if ($stmt->execute()) {
      // Use JavaScript to show alert and redirect
      echo "<script>
              alert('You are now registered.');
              window.location.href='../LoginIndex.html';
            </script>";
      exit(); // Ensure no further code is executed after redirection
    } else {
      echo "<script>alert('Registration failed. Please try again.')</script>";
    }

    // Close the statement
    $stmt->close();
  } else {
    echo "<script>alert('Password not matched!')</script>";
  }
}
?>
