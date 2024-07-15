<?php
// Initialize session
session_start();

// Check if user is already logged in, redirect to dashboard if true
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: landing.php");
    exit;
}

// Include the database connection file
require("../connection.php");

// Define variables and initialize with empty values
$email = $username = $password = $confirmPassword = "";
$email_err = $username_err = $password_err = $confirmPassword_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirmPassword"]))) {
        $confirmPassword_err = "Please confirm password.";
    } else {
        $confirmPassword = trim($_POST["confirmPassword"]);
        if (empty($password_err) && ($password != $confirmPassword)) {
            $confirmPassword_err = "Passwords do not match.";
        }
    }

    // Check if email or username already exists in the database
    $sql_check_email = "SELECT id FROM users WHERE email = ?";
    $sql_check_username = "SELECT id FROM users WHERE username = ?";

    // Prepare and execute email check
    if ($stmt = $conn->prepare($sql_check_email)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $email_err = "This email is already taken.";
        }
        $stmt->close();
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Prepare and execute username check
    if ($stmt = $conn->prepare($sql_check_username)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $username_err = "This username is already taken.";
        }
        $stmt->close();
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Check input errors before inserting into database
    if (empty($email_err) && empty($username_err) && empty($password_err) && empty($confirmPassword_err)) {

        // Prepare SQL INSERT statement
        $sql_insert_user = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql_insert_user)) {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $email, $username, $hashed_password);

            // Execute the prepared statement
            if ($stmt->execute()) {
                // Registration successful, redirect to login page
                header("location: login.php");
                exit;
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS files/Register.css">
</head>
<body>
   <div class="wrapper">
    <form id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1 class="mb-3">Register</h1>
        <div class="input-box my-2">
            <input type="email" id="email" name="email" placeholder="Enter your E-mail" value="<?php echo $email; ?>" required>
            <span class="error"><?php echo $email_err; ?></span>
        </div>
        <div class="input-box my-2">
            <input type="text" id="username" name="username" placeholder="Enter your username" value="<?php echo $username; ?>" required>
            <span class="error"><?php echo $username_err; ?></span>
        </div>
        <div class="input-box my-2">
            <input id="password" name="password" type="password" placeholder="Enter your password" required>
            <span class="error"><?php echo $password_err; ?></span>
        </div>
        <div class="input-box my-2">
            <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm password" required>
            <span id="passwordMatch" style="display:none; color: green;">Passwords match!</span>
            <span id="passwordMismatch" style="display:none; color: red;"><?php echo $confirmPassword_err; ?></span>
        </div>
        <button type="submit" class="btn">Register</button>
        <div class="register-link">
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </form>
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script>
       $(document).ready(function () {
           $('#registerForm').on('submit', function (event) {
               var password = $('#password').val();
               var confirmPassword = $('#confirmPassword').val();
               var passwordMatchSpan = $('#passwordMatch');
               var passwordMismatchSpan = $('#passwordMismatch');

               if (password !== confirmPassword) {
                   passwordMatchSpan.hide();
                   passwordMismatchSpan.show();
                   alert('Passwords do not match.');
                   event.preventDefault(); // Prevent form submission
                   return false;
               } else {
                   passwordMatchSpan.show();
                   passwordMismatchSpan.hide();
                   // Proceed with registration
                   // You can submit the form here using AJAX or whatever method you prefer
                   // For demonstration, I'm just logging a message
                   console.log('Registration form submitted.');
               }
           });
       });
   </script>
</body>
</html>
