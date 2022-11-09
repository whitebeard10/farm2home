<?php
include 'configure.php';
if(isset($_POST['rsubmit'])){
  $rname = $_POST['rname'];
  $rmail = $_POST['rmail'];
  $rpass = $_POST['rpass'];
  $rcpass = $_POST['rcpass'];

  if($rpass == $rcpass){
    $sql = "INSERT INTO users(username,email, password )
            VALUES('$rname', '$rmail', '$rpass')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script>alert('You are now registered.')</script>";
    }

  } 
  else {
    echo "<script>alert('password not matched!')</script>";
  }
}
?>