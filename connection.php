<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "carapp";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
