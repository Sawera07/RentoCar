<?php
require('../connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM admin_cars WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Car deleted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
    header("Location: manage_cars.php"); // Redirect back to manage cars page
}
?>
