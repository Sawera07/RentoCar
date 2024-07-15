<?php
// Include database connection file
require('../connection.php');

// Initialize variables for error handling
$username = $password = "";
$username_err = $password_err = "";

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if username and password are set and not empty
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL injection prevention (better to use prepared statements)
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if the user exists and verify password
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if (password_verify($password, $row['password'])) {
        // Password verification passed
        session_start();
        $_SESSION['username'] = $username; // Store username in session for later use
        header("Location: ../HTML files/AdminPanel.php"); // Redirect to dashboard or any other page after login
        exit();
      } else {
        // Password verification failed
        $password_err = "Invalid password.";
      }
    } else {
      // User does not exist
      $username_err = "Username not found.";
    }
  } else {
    // Fields not properly set or empty
    $username_err = "Please enter username.";
    $password_err = "Please enter password.";
  }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../CSS files/loginstyle.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'/>
</head>
<body>
<div class="wrapper">
  <form id="loginForm" action="" method="post">
    <h1 class="mb-3">Login</h1>
    <div class="input-box">
      <input type="text" id="username" name="username" placeholder="Enter your username" required>
      <span class="text-danger"><?php echo $username_err; ?></span>
    </div>
    <div class="input-box my-2">
      <input id="password" name="password" type="password" placeholder="Enter your password" required>
      <span class="text-danger"><?php echo $password_err; ?></span>
    </div>
    <div class="remember-forget">
      <label><input type="checkbox" name="remember"> Remember Me</label>
      <a target="_blank" class="fw-bold" href="forgot_password.php">Forgot password?</a>
    </div>
    <button type="submit" class="btn">Login</button>
    <div class="register-link">
      <p>Don't have an account? <a href="Register.php">Register</a></p>
    </div>
  </form>
</div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    $('#loginForm').on('submit', function (event) {
      var username = $('#username').val();
      var password = $('#password').val();

      if (username === '' || password === '') {
        alert('Please fill in all fields.');
        event.preventDefault(); // Prevent form submission
        
 // Prevent form submission
                return false;
            }
        });
    });
</script>
</body>
</html>
