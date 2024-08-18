<?php 

include 'configure.php';
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        
        // Regenerate session ID for security
        session_regenerate_id(true);
        
        header("Location: ../html/index.html");
        exit();
    } else {
        header("Location: ../LoginIndex.html?error=invalid_credentials");
        exit();
    }

    // Close the statement
    $stmt->close();
}
?>
